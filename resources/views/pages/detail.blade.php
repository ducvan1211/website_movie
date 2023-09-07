@extends('layout')
@section('content')
    <div class="container">
        <div class="row container" id="wrapper">
            <div class="halim-panel-filter">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="yoast_breadcrumb hidden-xs"><span><span><a
                                            href="{{ route('genre', $movie->genre->slug) }}">{{ $movie->genre->title }}</a> »
                                        <span><a
                                                href="{{ route('country', $movie->country->slug) }}">{{ $movie->country->title }}</a>
                                            » <span class="breadcrumb_last"
                                                aria-current="page">{{ $movie->title }}</span></span></span></span></div>
                        </div>
                    </div>
                </div>
                <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                    <div class="ajax"></div>
                </div>
            </div>
            <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
                <section id="content" class="test">
                    <div class="clearfix wrap-content">

                        <div class="halim-movie-wrapper">
                            <div class="title-block">
                                <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                                    <div class="halim-pulse-ring"></div>
                                </div>
                                <div class="title-wrapper" style="font-weight: bold;">
                                    Bookmark
                                </div>
                            </div>
                            <div class="movie_info col-xs-12">
                                <div class="movie-poster col-md-3">
                                    <img style="object-fit:cover" class="movie-thumb" src="{{ asset($movie->image) }}"
                                        alt="{{ $movie->title }}">
                                    <div class="bwa-content">
                                        @if (!($movie->resolution_id == '5'))
                                            <div class="loader"></div>

                                            <a href="{{ route('watch', ['slug' => $movie->slug, 'ep' => 1]) }}"
                                                class="bwac-btn">
                                                <i class="fa fa-play"></i>
                                            </a>
                                        @endif

                                    </div>
                                </div>
                                <div class="film-poster col-md-9">
                                    <h1 class="movie-title title-1"
                                        style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">
                                        {{ $movie->title }}</h1>
                                    {{-- <h2 class="movie-title title-2" style="font-size: 12px;">Black Widow (2021)</h2> --}}
                                    <ul class="list-info-group">
                                        <li class="list-info-group-item"><span>Trạng Thái</span> : <span
                                                class="quality">{{ $movie->resolution->title }}</span><span
                                                class="episode">{{ $movie->subline == '1' ? 'Vietsub' : 'Thuyết minh' }}</span>
                                        </li>
                                        <li class="list-info-group-item"><span>Điểm IMDb</span> : <span
                                                class="imdb">7.2</span></li>
                                        <li class="list-info-group-item"><span>Năm</span> : {{ $movie->year }}</li>
                                        <li class="list-info-group-item"><span>Số tập</span> : {{ $movie->episode }} Tập
                                        </li>

                                        <li class="list-info-group-item"><span>Thời lượng</span> : {{ $movie->duration }}
                                        </li>
                                        <li class="list-info-group-item"><span>Thể loại</span> :
                                            @foreach ($movie->cats as $key => $cat)
                                                @if ($key + 1 === count($movie->cats))
                                                    <a href="{{ route('category', $cat->slug) }}"
                                                        rel="category tag">{{ $cat->title }}</a>
                                                @else
                                                    <a href="{{ route('category', $cat->slug) }}"
                                                        rel="category tag">{{ $cat->title }}</a>,
                                                @endif
                                            @endforeach

                                        </li>
                                        <li class="list-info-group-item"><span>Quốc gia</span> : <a
                                                href="{{ route('country', $movie->country->slug) }}"
                                                rel="tag">{{ $movie->country->title }}</a>
                                        </li>
                                        <li class="list-info-group-item">
                                            <span>Tập mới nhất</span> :
                                            @empty($episodes)
                                                <span>Sắp chiếu</span>
                                            @endisset
                                            @foreach ($episodes as $ep)
                                                <a href="{{ route('watch', ['slug' => $movie->slug, 'ep' => $ep->episode]) }}"
                                                    rel="tag"> Tập
                                                    {{ $ep->episode }}
                                                </a>
                                            @endforeach

                                        </li>

                                    </ul>
                                    <div class="movie-trailer hidden"></div>
                                </div>

                            </div>
                            @if ($movie->resolution_id == '5')
                                <div class="col-3">
                                    <a href="#trailer" class="btn btn-primary" style="width: 100%">Xem trailer</a>

                                </div>
                            @endif
                        </div>
                        <div class="clearfix"></div>
                        <div id="halim_trailer"></div>
                        <div class="clearfix"></div>
                        <div class="section-bar clearfix">
                            <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
                        </div>
                        <div class="entry-content htmlwrap clearfix">
                            <div class="video-item halim-entry-box">
                                <article id="post-38424" class="item-content">
                                    {{ $movie->desc }}
                                </article>
                            </div>
                        </div>
                        @if ($movie->trailer != null)
                            <div class="section-bar clearfix" id="trailer">
                                <h2 class="section-title"><span style="color:#ffed4d">Trailer phim</span></h2>
                            </div>
                            <div class="entry-content htmlwrap clearfix">
                                <div class="video-item halim-entry-box">
                                    <article id="post-38424" class="item-content">
                                        <iframe width="100%" height="350"
                                            src="https://www.youtube.com/embed/{{ $movie->trailer }}"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen></iframe>
                                    </article>
                                </div>
                            </div>
                        @endif
                        <div class="section-bar clearfix">
                            <h2 class="section-title"><span style="color:#ffed4d">Tag phim</span></h2>
                        </div>
                        <div class="entry-content htmlwrap clearfix">
                            <div class="video-item halim-entry-box">
                                <article id="post-38424" class="item-content">
                                    @foreach ($movie->tags as $tag)
                                        <a href="{{ route('tag', $tag) }}"> {{ $tag }}</a>
                                    @endforeach

                                </article>
                            </div>
                        </div>
                        <div class="section-bar clearfix">
                            <h2 class="section-title"><span style="color:#ffed4d">Bình luận</span></h2>
                        </div>
                        <div class="entry-content htmlwrap clearfix">
                            <div class="video-item halim-entry-box">
                                <article id="post-38424" class="item-content">
                                    <div style="color: white" class="fb-comments"
                                        data-href="http://127.0.0.1:8000/phim/{{ $movie->slug }}" data-width="100%"
                                        data-numposts="5"></div>

                                </article>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="related-movies">
                    <div id="halim_related_movies-2xx" class="wrap-slider">
                        <div class="section-bar clearfix">
                            <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
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
                                            <span class="status">HD</span><span class="episode"><i class="fa fa-play"
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
                        <script>
                            jQuery(document).ready(function($) {
                                var owl = $('#halim_related_movies-2');
                                owl.owlCarousel({
                                    loop: true,
                                    margin: 4,
                                    autoplay: true,
                                    autoplayTimeout: 4000,
                                    autoplayHoverPause: true,
                                    nav: true,
                                    navText: ['<i class="hl-down-open rotate-left"></i>',
                                        '<i class="hl-down-open rotate-right"></i>'
                                    ],
                                    responsiveClass: true,
                                    responsive: {
                                        0: {
                                            items: 2
                                        },
                                        480: {
                                            items: 3
                                        },
                                        600: {
                                            items: 4
                                        },
                                        1000: {
                                            items: 4
                                        }
                                    }
                                })
                            });
                        </script>
                    </div>
                </section>
            </main>
            @include('inc.sidebar')
        </div>
    </div>
@endsection
