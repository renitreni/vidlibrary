<x-livewire-tables::bs5.table.cell>
    {{ Carbon\Carbon::parse($row->created_at)->longAbsoluteDiffForHumans() }}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    @if($row->is_approved == 1)
        <span class="badge badge-pill bg-success">Approved</span>
    @else
        <span class="badge badge-pill bg-warning text-black">Pending</span>
    @endif
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    @if($row->receipt_path)
        <a href="{{ $row->receipt_path }}">View</a>
    @endif
</x-livewire-tables::bs5.table.cell>
