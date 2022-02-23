<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\MyVideos;

class MyVideosTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Status", "status")
                ->sortable(),
            Column::make("uploaded_by", "Uploaded By")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return MyVideos::query()->with(['uploader']);
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.my_videos_table';
    }

    public function callEdit($id)
    {
        $this->emit('bindEdit', $id);
    }
}
