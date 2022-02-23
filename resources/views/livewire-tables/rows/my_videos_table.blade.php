<x-livewire-tables::bs5.table.cell>
    {{ $row->id }}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    @if($row->is_published == 1)
        <span class="badge rounded-pill bg-success">Verified</span>
    @elseif($row->is_published == 2)
        <span class="badge rounded-pill bg-danger">Declined</span>
    @else
        <span
            class="badge rounded-pill bg-warning text-dark">For approval</span>
    @endif
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editApproval"
            wire:click="callEdit({{ $row->id }})">
        Edit
    </button>
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{ $row->uploader->id }}:{{ $row->uploader->email }}:{{ $row->uploader->name }}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{ $row->created_at }}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{ $row->updated_at }}
</x-livewire-tables::bs5.table.cell>
