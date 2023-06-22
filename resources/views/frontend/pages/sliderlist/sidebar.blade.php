<aside class="news-sidebar-widget">
    <div class="widget sidebar-widget widget-popular-posts">
        <h4 class="mrb-30 single-blog-widget-title">Recent List</h4>
        @foreach($slider_lists as $index => $latest)
            <div class="single-post media mrb-20">
                <div class="post-content media-body align-self-center">
                    <img class="lazy"
                         data-src="{{ asset('/images/section_elements/list_1/thumb/thumb_'.$latest->list_image) }}" alt="">
                    <h5 class="mrb-5" style="padding-top: 10px;">
                        <a href="{{url('/slider-list/'.$latest->subheading)}}">
                            {{ucwords(@$latest->list_header)}}
                        </a></h5>
                    <span class="post-date"><i class="fa fa-clock-o mrr-5"></i>
                {{date('j M, Y',strtotime(@$latest->created_at))}}
                </span>
                </div>
            </div>
        @endforeach
    </div>
</aside>
