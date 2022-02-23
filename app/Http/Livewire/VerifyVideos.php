<?php

namespace App\Http\Livewire;

use App\Models\MyVideos;
use Livewire\Component;

class VerifyVideos extends Component
{
    public $listeners = ['bindEdit'];
    public $is_published;
    public $protectedEmbed;
    public $extension;
    public $myVideoId;

    public function render()
    {
        return view('livewire.verify-videos');
    }

    public function bindEdit($id)
    {
        $result               = MyVideos::find($id)->first();
        $this->protectedEmbed = str_replace('/d/', '/e/', $result['download_url']);
        $this->is_published   = $result['is_published'];
        $this->extension      = $result['extension'];
        $this->myVideoId      = $result['id'];
    }

    public function update()
    {
        MyVideos::where('id', $this->myVideoId)->update(['is_published' => $this->is_published]);
        $this->emit('refreshDatatable');
    }
}
