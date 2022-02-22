<div>
    <x-slot name="header">
        <h2>Dashboard</h2>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
                <div class="col-7 mb-2">
                    <input type="text" class="form-control" wire:model="title" placeholder="Type In your title ..">
                    @if($errors->has('title'))
                        <div class="invalid-feedback" style="display: block">{{ $errors->first('title') }}</div>
                    @endif
                </div>
                <div class="col-5 mb-2">
                    <input type="file" class="form-control" wire:model="tempfile">
                    <div class="form-text">
                        After Upload, your file is subject for verification. Max File size is 100MB only.
                    </div>
                    @if($errors->has('tempfile'))
                        <div class="invalid-feedback" style="display: block">{{ $errors->first('tempfile') }}</div>
                    @endif
                </div>
                <div class="mb-3" wire:loading.attr="hidden">
                    <button class="btn btn-info" wire:click="uploadAPI">Upload</button>
                </div>
                <div class="mb-3" wire:loading>
                    Please Wait...
                </div>
                <div>
                    <div class="row">
                        @foreach ($myvideos as $video)
                            <div class="col-3">
                                <div class="card">
                                    <img src="{{ $video->single_img }}" class="card-img-top" alt="{{ $video->title }}">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="{{ $video->protected_embed }}"
                                               target="_blank"
                                               class="btn btn-link">
                                                {{ $video->title }}
                                            </a>
                                        </h5>
                                        <p class="card-text">
                                            <small><i class="fas fa-eye"></i> {{ $video->views }}</small>
                                            @if($video->is_published)
                                                <span class="badge rounded-pill bg-success">Verified</span>
                                            @elseif($video->is_published == 2)
                                                <span class="badge rounded-pill bg-danger">Declined</span>
                                            @else
                                                <span class="badge rounded-pill bg-warning text-dark">For approval</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{ $myvideos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
