<aside class="news-sidebar-widget">
    <div class="widget sidebar-widget widget-search mrb-30">
        <form method="get" class="search-form" id="searchform" action="{{route('searchJob')}}">
            <label>
                <input type="search" id="s"
                       name="s" class="search-field" placeholder="Search Jobs..."   oninvalid="this.setCustomValidity('Type a keyword')" oninput="this.setCustomValidity('')" required>
            </label>
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <div class="widget sidebar-widget widget-popular-posts">
        <h4 class="mrb-30 single-blog-widget-title">Latest Jobs</h4>
        <div class="service-nav-menu mrb-30">
            <div class="service-link-list mb-30">
                <ul class="">
                    @foreach($latestJobs as $index => $latest)
                        <li>
                            <a href="{{route('job.single',@$latest->slug)}}">
                                <i class="fa fa-chevron-right"></i>
                                {{ucwords(@$latest->name)}}
                                <br/>
                                <i class="fa fa-calendar-alt"></i>
                                @if(@$latest->end_date >= $today)
                                    Expires on - {{date('M j, Y',strtotime(@$latest->end_date))}}
                                @else
                                    Expired
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</aside>
