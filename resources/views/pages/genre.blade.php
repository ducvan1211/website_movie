@extends('layout')
@section('content')
    <div class="container">
        <div class="row container" id="wrapper">
            <div class="halim-panel-filter">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="yoast_breadcrumb hidden-xs"><span><span><a href="">{{ $genre_slug->title }}</a>
                                        » <span class="breadcrumb_last" aria-current="page">2020</span></span></span></div>
                        </div>
                    </div>
                </div>
                <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                    <div class="ajax"></div>
                </div>
            </div>
            <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
                <section>
                    <div class="section-bar clearfix">
                        <h1 class="section-title"><span>{{ $genre_slug->title }}</span></h1>
                    </div>
                    <div class="halim_box">
                        @foreach ($movies as $movie)
                            <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                                <div class="halim-item">
                                    <a class="halim-thumb" href="{{ route('detail', $movie->slug) }}">
                                        <figure><img style="object-fit:cover;" class="lazy img-responsive"
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
                    <div class="clearfix"></div>
                    {{-- <div class="text-center">
                        <ul class='page-numbers'>
                            <li><span aria-current="page" class="page-numbers current">1</span></li>
                            <li><a class="page-numbers" href="">2</a></li>
                            <li><a class="page-numbers" href="">3</a></li>
                            <li><span class="page-numbers dots">&hellip;</span></li>
                            <li><a class="page-numbers" href="">55</a></li>
                            <li><a class="next page-numbers" href=""><i class="hl-down-open rotate-right"></i></a>
                            </li>
                        </ul>
                    </div> --}}
                </section>
            </main>
            @include('inc.sidebar')
        </div>
    </div>
@endsection
