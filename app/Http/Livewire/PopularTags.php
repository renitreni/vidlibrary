<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Tags\Tag;

class PopularTags extends Component
{
    public function render()
    {
        return view('livewire.popular-tags', [
            'tags' => Tag::inRandomOrder()->limit(8)->pluck('name')
        ]);
    }
}
