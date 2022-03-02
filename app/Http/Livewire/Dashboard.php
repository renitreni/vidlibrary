<?php

namespace App\Http\Livewire;

use App\Models\PayoutHistory;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Doodstream\DoodstreamAPI;
use Livewire\WithFileUploads;
use App\Models\MyVideos;

class Dashboard extends Component
{
    use WithFileUploads;

    public $tempfile;
    public $title;
    public $myVideos;
    public $totalViews;
    public $canPayout;

    public function mount()
    {
        $this->canPayout = 0;
        $this->updateDetails();
    }

    public function render()
    {
        $totalRequest = PayoutHistory::where('user_id', auth()->id())->sum('billed_views');

//        $this->totalViews = 12342;
//        $totalRequest     = 0;

        $total = $this->totalViews - $totalRequest;

        if ($total >= 10000) {
            $this->canPayout = 1;
        }

        return view('livewire.dashboard', [
            'myvideos' => MyVideos::query()
                ->where('uploaded_by', auth()->id())
                ->paginate(15),
        ]);
    }

    public function uploadAPI()
    {
        $this->validate([
            'tempfile' => 'required|file|mimes:mp4,mov,ogg,qt|max:102400',
            'title'    => 'required|max:225',
        ]);

        $filename  = $this->tempfile->getClientOriginalName();
        $extension = $this->tempfile->extension();
        $path      = $this->tempfile->getRealPath();

        $ds       = new DoodstreamAPI();
        $response = $ds->Upload($path, $extension, $filename);
        $response = collect(json_decode($response))->toArray();

        if (isset($response['result'])) {
            $params = [
                'title'           => $this->title,
                'extension'       => $extension,
                'slug'            => str_slug($this->title),
                'filecode'        => $response['result'][0]->filecode,
                'length'          => $response['result'][0]->length,
                'size'            => $response['result'][0]->size,
                'download_url'    => $response['result'][0]->download_url,
                'single_img'      => $response['result'][0]->single_img,
                'protected_embed' => $response['result'][0]->protected_embed,
                'protected_dl'    => $response['result'][0]->protected_dl,
                'uploaded_by'     => auth()->id(),
                'views'           => 0,
                'is_published'    => 0,
            ];
            MyVideos::create($params);

            $this->tempfile = null;
            $this->title    = null;

            session()->flash('message', 'Video successfully uploaded. Please wait for our Approval.');
        }
    }

    public function updateDetails()
    {
        $results = MyVideos::find(auth()->id());
        $results = $results ? $results->get() : [];
        foreach ($results as $result) {
            $info = json_decode((new DoodstreamAPI())->FileInfo($result['filecode']));
            MyVideos::where('id', $result['id'])->update([
                'views' => $info->result[0]->views,
            ]);
        }
        $this->totalViews = MyVideos::where('uploaded_by', auth()->id())->sum('views');
    }

    public function requestPayout()
    {
        $totalRequest = PayoutHistory::where('user_id', auth()->id())->sum('billed_views');

        PayoutHistory::insert([
            'user_id'      => auth()->id(),
            'recent_views' => $this->totalViews,
            'is_approved'  => 0,
            'billed_views' => 10000,
        ]);
        session()->flash('message',
            "Your Pay Out has been submitted. Please wait for the confirmation receipt. $totalRequest");
        $this->emit('refreshDatatable');
    }
}
