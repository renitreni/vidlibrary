<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\PayoutHistory;

class PayoutsTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("User id", "user_id")
                ->sortable(),
            Column::make("Recent views", "recent_views")
                ->sortable(),
            Column::make("Is approved", "is_approved")
                ->sortable(),
            Column::make("Billed views", "billed_views")
                ->sortable(),
            Column::make("Receipt path", "receipt_path")
                ->sortable(),
            Column::make("Approved by", "approved_by")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return PayoutHistory::query()->with(['requestor']);
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.payouts_table';
    }

    public function edit($id)
    {
        $this->emit('bindEdit', $id);
    }
}
