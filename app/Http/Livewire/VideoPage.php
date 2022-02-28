<?php

namespace App\Http\Livewire;

use App\Doodstream\DoodstreamAPI;
use App\Models\MyVideos;
use Livewire\Component;

class VideoPage extends Component
{
    public $video;

    public function mount($video, $slug)
    {
        $this->video = MyVideos::where('slug', $slug)->where('id', $video)->with(['uploader'])->first()->toArray();

        $info = json_decode((new DoodstreamAPI())->FileInfo($this->video['filecode']));
        MyVideos::where('id', $video)->update([
            'views' => $info->result[0]->views,
        ]);
    }

    public function render()
    {
        return view('livewire.video-page')->layout('layouts.guest');
    }
}
