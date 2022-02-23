<div>
    <x-slot name="header">
        <h2>Dashboard</h2>
    </x-slot>

    <div class="row">
        <div class="col-md-3 d-flex flex-column">
            <div>
                <h4>3 Easy Steps on how to earn money with us:</h4>
                <ol>
                    <li><p>Upload a video and use an appropriate title.</p></li>
                    <li><p>Wait us to verify your uploaded video.</p></li>
                    <li>
                        <p>For every 10k views gained of your <strong>Total Views</strong>, you are eligible to
                            request payout of 250php. (e.g. 10K, 20K, 30k... and so on...)</p>
                    </li>
                </ol>
            </div>
            <div>
                <button class="btn btn-success">Request Payout</button>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="col-5 mb-2">
                            <input type="text" class="form-control" wire:model="title"
                                   placeholder="Type In your title ..">
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
                                <div class="invalid-feedback"
                                     style="display: block">{{ $errors->first('tempfile') }}</div>
                            @endif
                        </div>
                        <div class="mb-3 d-flex flex-row" wire:loading.attr="hidden">
                            <button class="btn btn-info me-3" wire:click="uploadAPI">Upload</button>
                            <h5 class="my-auto">Total Views: {{ $totalViews }}</h5>
                        </div>
                        <div class="mb-3" wire:loading>
                            Please Wait...
                        </div>
                        <div>
                            <div class="row">
                                @foreach ($myvideos as $video)
                                    <div class="col-3">
                                        <div class="card">
                                            <img src="{{ $video->single_img }}" class="card-img-top"
                                                 alt="{{ $video->title }}">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <a href="{{ $video->protected_embed }}"
                                                       target="_blank"
                                                       class="btn p-0 fw-bold btn-link">
                                                        {{ $video->title }}
                                                    </a>
                                                </h5>
                                                <p class="card-text">
                                                    <small><i class="fas fa-eye"></i> {{ $video->views }}</small>
                                                    @if($video->is_published == 1)
                                                        <span class="badge rounded-pill bg-success">Verified</span>
                                                    @elseif($video->is_published == 2)
                                                        <span class="badge rounded-pill bg-danger">Declined</span>
                                                    @else
                                                        <span
                                                            class="badge rounded-pill bg-warning text-dark">For approval</span>
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
        <div class="col-12">

        </div>
    </div>
