<div>
    <aside class="right_widget r_tag_widget">
        <div class="r_w_title">
            <h3 class="text-white bg-info p-2">Popular Tags</h3>
        </div>
        <ul>
            @foreach($tags as $tag)
                <li><a href="{{ route('search', ['tag'=>$tag ]) }}">{{ $tag }}</a></li>
            @endforeach
        </ul>
    </aside>
</div>
