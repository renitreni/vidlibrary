<?php

namespace App\Http\Livewire;

use App\Models\MyVideos;
use Livewire\Component;

class SearchPage extends Component
{
    public $tag;
    public $title;
    public $uploader;

    protected $queryString = ['tag', 'title', 'uploader'];

    public function render()
    {
        return view('livewire.search-page',
            [
                'videos' => MyVideos::query()
                    ->orderBy('updated_at', 'desc')
                    ->where('is_published', 1)
                    ->when($this->tag, function ($q){
                        $q->withAllTags([$this->tag]);
                    })
                    ->paginate(20),
            ])->layout('layouts.guest');
    }
}
