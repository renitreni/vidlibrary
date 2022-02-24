<div>
    <x-slot name="header">
        <h3>Pay Outs</h3>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <livewire:payouts-table/>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="payoutStatus" tabindex="-1" aria-labelledby="payoutStatusLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="payoutStatusLabel">Verification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <div>
                            <label>Status</label>
                            <select class="form-select" wire:model="is_approved">
                                <option value="1">Approved</option>
                                <option value="0">Pending</option>
                            </select>
                        </div>
                        <div>
                            <label>Receipt</label>
                            <input type="file" class="form-control" wire:model="receipt">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="update">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
