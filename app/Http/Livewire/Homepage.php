<?php

namespace App\Http\Livewire;

use App\Models\MyVideos;
use Livewire\Component;

class Homepage extends Component
{
    public function render()
    {
        return view('livewire.homepage',
            [
                'videos' => MyVideos::query()->orderBy('id')->where('is_published', 1)->paginate(20),
            ])->layout('layouts.guest');
    }
}
