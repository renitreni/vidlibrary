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
    public $tag;
    public $tags = [];

    public function render()
    {
        return view('livewire.verify-videos');
    }

    public function bindEdit($id)
    {
        $result               = MyVideos::find($id)->with(['tags'])->first();
        $this->protectedEmbed = str_replace('/d/', '/e/', $result['download_url']);
        $this->is_published   = $result['is_published'];
        $this->title          = $result['title'];
        $this->extension      = $result['extension'];
        $this->myVideoId      = $result['id'];
        $this->tags           = collect($result['tags'])->toArray();
    }

    public function update()
    {
        MyVideos::where('id', $this->myVideoId)->update([
            'is_published' => $this->is_published,
            'title'        => $this->title,
            'slug'         => str_slug($this->title),
        ]);

        $this->emit('refreshDatatable');
    }

    public function tagAttach()
    {
        $model = MyVideos::find($this->myVideoId);
        $model->attachTag($this->tag);
        $this->tag = '';
        $this->bindEdit($this->myVideoId);
    }

    public function tagDetach($tag)
    {
        $model = MyVideos::find($this->myVideoId);
        $model->detachTag($tag);
        $this->bindEdit($this->myVideoId);
    }
}
