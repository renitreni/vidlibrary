<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\PayoutHistory;

class PayoutHistoryTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Is approved", "is_approved")
                ->sortable(),
            Column::make("Receipt path", "receipt_path")
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return PayoutHistory::query()->where('user_id', auth()->id());
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.payout_history_table';
    }
}
