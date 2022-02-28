<div>
    <!--================Banner Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_text_inner">
                <h4>{{ env('APP_DESC') }}</h4>
                {{--                <ul>--}}
                {{--                    <li><a href="index.html"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>--}}
                {{--                    <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Archive</a></li>--}}
                {{--                    <li><a href="static.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Static Page</a></li>--}}
                {{--                </ul>--}}
            </div>
        </div>
    </section>
    <!--================End Banner Area =================-->

    <!--================Static Area =================-->
    <section class="static_area">
        <div class="container">
            <div class="static_inner">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="static_main_content">
                            <div class="d-flex flex-column">
                                <div class="mb-2">
                                    <h3 class="text-white bg-info p-2">{{ $video['title'] }}</h3>
                                </div>
                                <div class="d-flex flex-column">
                                    <iframe width="100%" height="420" src="{{ str_replace('/d/', '/e/', $video['download_url']) }}" scrolling="no" frameborder="0"
                                            allowfullscreen="true">
                                        Your browser does not support the video tag.
                                    </iframe>
                                    <a href="{{ route('video', ['video' => $video['id'], 'slug' => $video['slug']]) }}"
                                       class="d-flex flex-column m-3">
                                        <label class="text-white">
                                            <i class="fa fa-eye"></i> {{ $video['views'] }} &nbsp;
                                            <i class="fa fa-clock-o"></i> {{  Carbon\Carbon::parse($video['created_at'])->longAbsoluteDiffForHumans() }}
                                        </label>
                                        <label class="text-white">
                                            Uploaded By: {{ $video['uploader']['name'] }}
                                        </label>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="right_sidebar_area">
                            <aside class="right_widget r_tag_widget">
                                <div class="r_w_title">
                                    <h3 class="text-white bg-info p-2">Popular Tags</h3>
                                </div>
                                <ul>
                                    {{--                                    <li><a href="#">Creative</a></li>--}}
                                    {{--                                    <li><a href="#">Unique</a></li>--}}
                                    {{--                                    <li><a href="#">Photography</a></li>--}}
                                    {{--                                    <li><a href="#">Music</a></li>--}}
                                    {{--                                    <li><a href="#">Wordpress Template</a></li>--}}
                                    {{--                                    <li><a href="#">Ideas</a></li>--}}
                                </ul>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Static Area =================-->

</div>
