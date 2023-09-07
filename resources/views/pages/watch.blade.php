@extends('layout')
@section('content')
    <div class="container">
        <div class="row container" id="wrapper">
            <div class="halim-panel-filter">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="yoast_breadcrumb hidden-xs">
                                <span>
                                    <span>
                                        <a href="{{ route('country', $movie->country->slug) }}">Phim
                                            {{ $movie->country->title }}</a> »
                                        <span class="breadcrumb_last" aria-current="page">{{ $movie->title }}</span>
                                    </span>
                                </span>
                            </div>
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

                        <iframe width="100%" height="500" src="https://www.youtube.com/embed/{{ $episode->link }}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>

                        <div class="button-watch">
                            <ul class="halim-social-plugin col-xs-4 hidden-xs">
                                <li class="fb-like" data-href="" data-layout="button_count" data-action="like"
                                    data-size="small" data-show-faces="true" data-share="true"></li>
                            </ul>
                            <ul class="col-xs-12 col-md-8">
                                <div id="autonext" class="btn-cs autonext">
                                    <i class="icon-autonext-sm"></i>
                                    <span><i class="hl-next"></i> Autonext: <span id="autonext-status">On</span></span>
                                </div>
                                <div id="explayer" class="hidden-xs"><i class="hl-resize-full"></i>
                                    Expand
                                </div>
                                <div id="toggle-light"><i class="hl-adjust"></i>
                                    Light Off
                                </div>
                                <div id="report" class="halim-switch"><i class="hl-attention"></i> Report</div>
                                <div class="luotxem"><i class="hl-eye"></i>
                                    <span>1K</span> lượt xem
                                </div>
                                <div class="luotxem">
                                    <a class="visible-xs-inline" data-toggle="collapse" href="#moretool"
                                        aria-expanded="false" aria-controls="moretool"><i class="hl-forward"></i> Share</a>
                                </div>
                            </ul>
                        </div>
                        <div class="collapse" id="moretool">
                            <ul class="nav nav-pills x-nav-justified">
                                <li class="fb-like" data-href="" data-layout="button_count" data-action="like"
                                    data-size="small" data-show-faces="true" data-share="true"></li>
                                <div class="fb-save" data-uri="" data-size="small"></div>
                            </ul>
                        </div>

                        <div class="clearfix"></div>
                        <div class="clearfix"></div>
                        <div class="title-block">
                            {{-- <a href="javascript:;" data-toggle="tooltip" title="Add to bookmark">
                                <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="37976">
                                    <div class="halim-pulse-ring"></div>
                                </div>
                            </a> --}}
                            <div class="title-wrapper-xem full" style="width: 100%">
                                <h1 class="entry-title">
                                    {{ $movie->title }} - Tập {{ $episode->episode }}
                                    {{-- <a href="" title="Tôi Và Chúng Ta Ở Bên Nhau" class="tl">Tôi Và Chúng Ta Ở
                                        Bên Nhau tập 1</a> --}}
                                </h1>
                            </div>
                        </div>
                        <div class="entry-content htmlwrap clearfix collapse" id="expand-post-content">
                            <article id="post-37976" class="item-content post-37976"></article>
                        </div>
                        <div class="clearfix"></div>
                        <div class="text-center">
                            <div id="halim-ajax-list-server"></div>
                        </div>
                        <div id="halim-list-server">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active server-1"><a href="#server-0" aria-controls="server-0"
                                        role="tab" data-toggle="tab"><i class="hl-server"></i>
                                        {{ $movie->resolution->title }}</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active server-1" id="server-0">
                                    <div class="halim-server">
                                        <ul class="halim-list-eps">
                                            @foreach ($movie->episodes as $episode)
                                                <li class="halim-episode"><span
                                                        class="halim-btn halim-btn-2 active halim-info-1-1 box-shadow"
                                                        data-post-id="37976" data-server="1" data-episode="1"
                                                        data-position="first" data-embed="0"
                                                        data-title="Xem phim Tôi Và Chúng Ta Ở Bên Nhau - Tập 1 - Be Together - vietsub + Thuyết Minh"
                                                        data-h1="Tôi Và Chúng Ta Ở Bên Nhau - tập 1">
                                                        <a
                                                            href="{{ route('watch', ['slug' => $movie->slug, 'ep' => $episode->episode]) }}">{{ $episode->episode }}</a>
                                                    </span>
                                                </li>
                                            @endforeach


                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="htmlwrap clearfix">
                            <div id="lightout"></div>
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
                        <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                            <article class="thumb grid-item post-38494">
                                <div class="halim-item">
                                    <a class="halim-thumb" href="chitiet.php" title="Câu Chuyện Kinh Dị Cổ Điển">
                                        <figure><img class="lazy img-responsive"
                                                src="https://images2-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&gadget=a&no_expand=1&refresh=604800&url=https://1.bp.blogspot.com/-Hp2tnGf-zNQ/YO68R-yZRcI/AAAAAAAAJqY/Nc9qNCLgBtcjeWjOEIrOW45H5Vvva4xNgCLcBGAsYHQ/s320/MV5BNzE1YjdmMWYtMDk5ZS00YzEzLWE4NjctYmFiZmIwNzU0MjQ5XkEyXkFqcGdeQXVyMTA3MDAxNDcw._V1_.jpg"
                                                alt="Câu Chuyện Kinh Dị Cổ Điển" title="Câu Chuyện Kinh Dị Cổ Điển">
                                        </figure>
                                        <span class="status">HD</span><span class="episode"><i class="fa fa-play"
                                                aria-hidden="true"></i>Vietsub</span>
                                        <div class="icon_overlay"></div>
                                        <div class="halim-post-title-box">
                                            <div class="halim-post-title ">
                                                <p class="entry-title">Câu Chuyện Kinh Dị Cổ Điển</p>
                                                <p class="original_title">A Classic Horror Story</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </article>
                            <article class="thumb grid-item post-38494">
                                <div class="halim-item">
                                    <a class="halim-thumb" href="chitiet.php" title="Câu Chuyện Kinh Dị Cổ Điển">
                                        <figure><img class="lazy img-responsive"
                                                src="https://images2-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&gadget=a&no_expand=1&refresh=604800&url=https://1.bp.blogspot.com/-Hp2tnGf-zNQ/YO68R-yZRcI/AAAAAAAAJqY/Nc9qNCLgBtcjeWjOEIrOW45H5Vvva4xNgCLcBGAsYHQ/s320/MV5BNzE1YjdmMWYtMDk5ZS00YzEzLWE4NjctYmFiZmIwNzU0MjQ5XkEyXkFqcGdeQXVyMTA3MDAxNDcw._V1_.jpg"
                                                alt="Câu Chuyện Kinh Dị Cổ Điển" title="Câu Chuyện Kinh Dị Cổ Điển">
                                        </figure>
                                        <span class="status">HD</span><span class="episode"><i class="fa fa-play"
                                                aria-hidden="true"></i>Vietsub</span>
                                        <div class="icon_overlay"></div>
                                        <div class="halim-post-title-box">
                                            <div class="halim-post-title ">
                                                <p class="entry-title">Câu Chuyện Kinh Dị Cổ Điển</p>
                                                <p class="original_title">A Classic Horror Story</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </article>
                            <article class="thumb grid-item post-38494">
                                <div class="halim-item">
                                    <a class="halim-thumb" href="chitiet.php" title="Câu Chuyện Kinh Dị Cổ Điển">
                                        <figure><img class="lazy img-responsive"
                                                src="https://images2-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&gadget=a&no_expand=1&refresh=604800&url=https://1.bp.blogspot.com/-Hp2tnGf-zNQ/YO68R-yZRcI/AAAAAAAAJqY/Nc9qNCLgBtcjeWjOEIrOW45H5Vvva4xNgCLcBGAsYHQ/s320/MV5BNzE1YjdmMWYtMDk5ZS00YzEzLWE4NjctYmFiZmIwNzU0MjQ5XkEyXkFqcGdeQXVyMTA3MDAxNDcw._V1_.jpg"
                                                alt="Câu Chuyện Kinh Dị Cổ Điển" title="Câu Chuyện Kinh Dị Cổ Điển">
                                        </figure>
                                        <span class="status">HD</span><span class="episode"><i class="fa fa-play"
                                                aria-hidden="true"></i>Vietsub</span>
                                        <div class="icon_overlay"></div>
                                        <div class="halim-post-title-box">
                                            <div class="halim-post-title ">
                                                <p class="entry-title">Câu Chuyện Kinh Dị Cổ Điển</p>
                                                <p class="original_title">A Classic Horror Story</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </article>
                            <article class="thumb grid-item post-38494">
                                <div class="halim-item">
                                    <a class="halim-thumb" href="chitiet.php" title="Câu Chuyện Kinh Dị Cổ Điển">
                                        <figure><img class="lazy img-responsive"
                                                src="https://images2-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&gadget=a&no_expand=1&refresh=604800&url=https://1.bp.blogspot.com/-Hp2tnGf-zNQ/YO68R-yZRcI/AAAAAAAAJqY/Nc9qNCLgBtcjeWjOEIrOW45H5Vvva4xNgCLcBGAsYHQ/s320/MV5BNzE1YjdmMWYtMDk5ZS00YzEzLWE4NjctYmFiZmIwNzU0MjQ5XkEyXkFqcGdeQXVyMTA3MDAxNDcw._V1_.jpg"
                                                alt="Câu Chuyện Kinh Dị Cổ Điển" title="Câu Chuyện Kinh Dị Cổ Điển">
                                        </figure>
                                        <span class="status">HD</span><span class="episode"><i class="fa fa-play"
                                                aria-hidden="true"></i>Vietsub</span>
                                        <div class="icon_overlay"></div>
                                        <div class="halim-post-title-box">
                                            <div class="halim-post-title ">
                                                <p class="entry-title">Câu Chuyện Kinh Dị Cổ Điển</p>
                                                <p class="original_title">A Classic Horror Story</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </article>
                            <article class="thumb grid-item post-38494">
                                <div class="halim-item">
                                    <a class="halim-thumb" href="chitiet.php" title="Câu Chuyện Kinh Dị Cổ Điển">
                                        <figure><img class="lazy img-responsive"
                                                src="https://images2-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&gadget=a&no_expand=1&refresh=604800&url=https://1.bp.blogspot.com/-Hp2tnGf-zNQ/YO68R-yZRcI/AAAAAAAAJqY/Nc9qNCLgBtcjeWjOEIrOW45H5Vvva4xNgCLcBGAsYHQ/s320/MV5BNzE1YjdmMWYtMDk5ZS00YzEzLWE4NjctYmFiZmIwNzU0MjQ5XkEyXkFqcGdeQXVyMTA3MDAxNDcw._V1_.jpg"
                                                alt="Câu Chuyện Kinh Dị Cổ Điển" title="Câu Chuyện Kinh Dị Cổ Điển">
                                        </figure>
                                        <span class="status">HD</span><span class="episode"><i class="fa fa-play"
                                                aria-hidden="true"></i>Vietsub</span>
                                        <div class="icon_overlay"></div>
                                        <div class="halim-post-title-box">
                                            <div class="halim-post-title ">
                                                <p class="entry-title">Câu Chuyện Kinh Dị Cổ Điển</p>
                                                <p class="original_title">A Classic Horror Story</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </article>

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
