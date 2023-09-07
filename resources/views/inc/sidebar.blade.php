<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Phim Hot</span>

            </div>
        </div>
        <section>
            <div class="tab-pane active halim-ajax-popular-post">
                <div class="halim-ajax-popular-post-loading hidden"></div>
                <div id="halim-ajax-popular-post" class="popular-post">
                    @foreach ($movie_hot_sidebar as $movie)
                        <div class="item post-37176">
                            <a href="{{ route('detail', $movie->slug) }}" title="{{ $movie->title }}">
                                <div class="item-link">
                                    <img style="object-fit: cover" src="{{ asset($movie->image) }}"
                                        class="lazy post-thumb" alt="{{ $movie->title }}" title="{{ $movie->title }}" />
                                    <span class="is_trailer">{{ $movie->resolution->title }}</span>
                                </div>
                                <p class="title">{{ $movie->title }}</p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                            <div style="float: left;">
                                <span class="user-rate-image post-large-rate stars-large-vang"
                                    style="display: block;/* width: 100%; */">
                                    <span style="width: 0%"></span>
                                </span>
                            </div>
                        </div>
                    @endforeach



                </div>
            </div>
        </section>
        <div class="clearfix"></div>
    </div>
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Top Views</span>
            </div>
        </div>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link movie_view active" id="pills-home-tab" data-toggle="pill" href="#ngay"
                    role="tab" aria-controls="pills-home" aria-selected="true">Ngày</a>
            </li>
            <li class="nav-item">
                <a class="nav-link movie_view" id="pills-profile-tab" data-toggle="pill" href="#tuan" role="tab"
                    aria-controls="pills-profile" aria-selected="false">Tuần</a>
            </li>
            <li class="nav-item">
                <a class="nav-link movie_view" id="pills-contact-tab" data-toggle="pill" href="#thang" role="tab"
                    aria-controls="pills-contact" aria-selected="false">Tháng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link movie_view" id="pills-contact-tab" data-toggle="pill" href="#nam" role="tab"
                    aria-controls="pills-contact" aria-selected="false">Năm</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane active" id="ngay" role="tabpanel">
                <div id="halim-ajax-popular-post " class="popular-post">
                    <div id="show_1">

                    </div>

                </div>
            </div>
            <div class="tab-pane fade" id="tuan" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div id="halim-ajax-popular-post" class="popular-post">
                    <div id="show_2"></div>

                </div>
            </div>
            <div class="tab-pane fade" id="thang" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div id="halim-ajax-popular-post" class="popular-post">
                    <div id="show_3"></div>

                </div>
            </div>
            <div class="tab-pane fade" id="nam" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div id="halim-ajax-popular-post" class="popular-post">
                    <div id="show_4"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</aside>
