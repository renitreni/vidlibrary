<x-livewire-tables::bs5.table.cell>
    {{ $row->id }}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{ $row->requestor->name }} : {{ $row->requestor->phone }}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{ $row->recent_views }}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    <a data-bs-toggle="modal" data-bs-target="#payoutStatus" wire:click="edit({{ $row->id }})">
        @if($row->is_approved)
            <span class="badge badge-pill bg-success">
                Approved
            </span>
        @else
            <span class="badge badge-pill bg-warning text-black">
                Pending
            </span>
        @endif
    </a>
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{ $row->billed_views }}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    @if($row->receipt_path)
        <a href="{{ $row->receipt_path }}">View</a>
    @endif
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{ $row->approved_by }}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{ $row->created_at }}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{ $row->updated_at }}
</x-livewire-tables::bs5.table.cell>
