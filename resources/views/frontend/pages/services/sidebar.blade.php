<aside class="news-sidebar-widget">
    <div class="widget sidebar-widget widget-popular-posts">
        <h4 class="mrb-30 single-blog-widget-title">Latest Service</h4>
        @foreach($latestServices as $index => $latest)
            <div class="single-post media mrb-20">
                <div class="post-content media-body align-self-center">
                    <img class="sidebar-image lazy" data-src="{{($latest->banner_image !== null) ? asset('/images/service/thumb/thumb_'.@$latest->banner_image):""}}"
                         alt="">
                    <h5 class="mrb-5" style="padding-top: 10px;">
                        <a href="{{route('service.single',$latest->slug)}}">
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
