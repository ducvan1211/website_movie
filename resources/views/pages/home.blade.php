@extends('layout')
@section('content')
    <div class="container">
        <div class="row container" id="wrapper">
            <div class="halim-panel-filter">
                <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                    <div class="ajax"></div>
                </div>
            </div>
            <div class="col-xs-12 carausel-sliderWidget">
                <section id="halim-advanced-widget-4">
                    <div class="section-heading">
                        <a href="danhmuc.php" title="Phim Chiếu Rạp">
                            <span class="h-text">Phim Hot</span>
                        </a>
                        <ul class="heading-nav pull-right hidden-xs">
                            <li class="section-btn halim_ajax_get_post" data-catid="4" data-showpost="12"
                                data-widgetid="halim-advanced-widget-4" data-layout="6col"><span
                                    data-text="Chiếu Rạp"></span></li>
                        </ul>
                    </div>
                    <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                        @foreach ($movie_hot as $movie)
                            <article class="thumb grid-item post-38498">
                                <div class="halim-item">
                                    <a class="halim-thumb" href="{{ route('detail', $movie->slug) }}"
                                        title="Đại Thánh Vô Song">
                                        <figure><img style="object-fit: cover" class="lazy img-responsive"
                                                src="{{ asset($movie->image) }}" alt="{{ $movie->title }}"
                                                title="{{ $movie->title }}"></figure>
                                        <span class="status">{{ $movie->resolution->title }}</span><span class="episode"><i
                                                class="fa fa-play"
                                                aria-hidden="true"></i>{{ $movie->subline == '1' ? 'Vietsub' : 'Thuyết minh' }}</span>
                                        <div class="icon_overlay"></div>
                                        <div class="halim-post-title-box">
                                            <div class="halim-post-title ">
                                                <p class="entry-title">{{ $movie->title }}</p>
                                                <p class="original_title">{{ $movie->title }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </article>
                        @endforeach



                    </div>
                </section>
                <div class="clearfix"></div>
            </div>
            <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
                @foreach ($genres as $genre)
                    <section id="halim-advanced-widget-2">
                        <div class="section-heading">
                            <a href="danhmuc.php" title="{{ $genre->title }}">
                                <span class="h-text">{{ $genre->title }}</span>
                            </a>
                        </div>
                        <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
                            @foreach ($genre['movies'] as $movie)
                                <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                                    <div class="halim-item">
                                        <a class="halim-thumb" href="{{ route('detail', $movie->slug) }}">
                                            <figure><img style="object-fit:cover;" class="lazy img-responsive"
                                                    src="{{ asset($movie->image) }}" alt="{{ $movie->title }}"
                                                    title="{{ $movie->title }}"></figure>
                                            <span class="status">{{ $movie->resolution->title }}</span><span
                                                class="episode"><i class="fa fa-play"
                                                    aria-hidden="true"></i>{{ $movie->subline == '1' ? 'Vietsub' : 'Thuyết minh' }}</span>
                                            <div class="icon_overlay"></div>
                                            <div class="halim-post-title-box">
                                                <div class="halim-post-title ">
                                                    <p class="entry-title">{{ $movie->title }}</p>
                                                    <p class="original_title">{{ $movie->title }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </article>
                            @endforeach

                        </div>
                    </section>
                    <div class="clearfix"></div>
                @endforeach

            </main>
            @include('inc.sidebar')
      
        </div>
    </div>
@endsection
