<aside class="news-sidebar-widget">
    <div class="widget sidebar-widget widget-search mrb-30">
            <form method="get" class="search-form" id="searchform" action="{{route('searchBlog')}}">
            <label>
                <input type="search" id="s"
                       name="s" class="search-field" placeholder="Search Blogs..."   oninvalid="this.setCustomValidity('Type a keyword')" oninput="this.setCustomValidity('')" required>
            </label>
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <div class="widget sidebar-widget widget-categories">
        <h4 class="mrb-30 single-blog-widget-title">Categories</h4>
        <ul class="list">
            @foreach(@$bcategories as $bcategory)
                <li><i class="fas fa-caret-right vertical-align-middle text-primary-color mrr-10"></i>
                    <a href="{{route('blog.category',$bcategory->slug)}}">  {{ucwords(@$bcategory->name)}}
                        <span class="f-right">({{$bcategory->blogs->count()}})</span></a></li>
            @endforeach
        </ul>
    </div>
    <div class="widget sidebar-widget widget-popular-posts">
        <h4 class="mrb-30 single-blog-widget-title">Popular Posts</h4>
        @foreach($latestPosts as $index => $latest)
            <div class="single-post media mrb-20">
            <div class="post-image mrr-20">
                <img class="lazy" data-src="{{(@$latest->image) ? asset('/images/blog/thumb/thumb_'.@$latest->image):''}}" alt="" style="max-width: 75%;">
            </div>
            <div class="post-content media-body align-self-center">
                <h5 class="mrb-5">
                    <a href="{{route('blog.single',$latest->slug)}}">
                        {{ucwords(@$latest->title)}}
                    </a></h5>
                <span class="post-date"><i class="fa fa-clock-o mrr-5"></i>
                {{date('j M, Y',strtotime(@$latest->created_at))}}
                </span>
            </div>
        </div>
        @endforeach
    </div>
</aside>
