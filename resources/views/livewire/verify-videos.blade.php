<div>
    <x-slot name="header">
        <h2>Verify Videos</h2>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <livewire:my-videos-table/>
        </div>
    </div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="editApproval" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div clas="row">
                        <div class="mb-3">
                            <label>Title</label>
                            <input class="form-control" wire:model="title">
                        </div>
                        <div class="mb-3">
                            <label>Status</label>
                            <select class="form-select" wire:model="is_published">
                                <option value="0">Pending</option>
                                <option value="1">Approved</option>
                                <option value="2">Declined</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Input Tag</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" wire:model="tag">
                                <button class="btn btn-success" type="button" id="button-addon2"
                                        wire:click="tagAttach">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            @foreach($tags as $tagname)
                                <span class="border bg-praimry p-2">
                                    <button class="btn btn-sm btn-link p-0"
                                            wire:click="tagDetach('{{ $tagname['name']['en'] }}')">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    {{ $tagname['name']['en'] }}
                                </span>
                            @endforeach
                        </div>
                        <div>
                            <iframe width="100%" height="420" src="{{ $protectedEmbed }}" scrolling="no" frameborder="0"
                                    allowfullscreen="true">
                                Your browser does not support the video tag.
                            </iframe>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="update">Save
                        changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
