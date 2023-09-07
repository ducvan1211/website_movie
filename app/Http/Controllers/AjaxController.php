<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    function update_year(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id']);
        $movie->year = $data['year'];
        $movie->save();
        echo $movie['year'];
    }
    function top_view(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id']);
        $movie->top_view = $data['top_view'];
        $movie->save();
        echo $data['top_view'];
    }
    function movie_view(Request $request)
    {
        $data = $request->all();
        $movies = Movie::with('resolution')->where('top_view', $data['view_id'])->where('status', '1')->get();
        $html = '';
        foreach ($movies as $movie) {
            $html .= '
            <div class="item post-37176">
            <a href="' . route('detail', $movie->slug) . '" title="' . $movie->title . '">
                <div class="item-link">
                    <img style="object-fit: cover"
                        src="' . asset($movie->image) . '" class="lazy post-thumb"
                        alt="' . $movie->title . '" title="' . $movie->title . '" />
                    <span class="is_trailer">' . $movie->resolution->title . '</span>
                </div>
                <p class="title">' . $movie->title . '</p>
            </a>
            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
            <div style="float: left;">
                <span class="user-rate-image post-large-rate stars-large-vang"
                    style="display: block;/* width: 100%; */">
                    <span style="width: 0%"></span>
                </span>
            </div>
        </div>
            ';
        }
        echo $html;
    }
    function movie_view_default(Request $request)
    {
        $data = $request->all();
        $movies = Movie::with('resolution')->where('top_view', $data['view_id'])->where('status', '1')->get();
        $html = '';
        foreach ($movies as $movie) {
            $html .= '
            <div class="item post-37176">
            <a href="' . route('detail', $movie->slug) . '" title="' . $movie->title . '">
                <div class="item-link">
                    <img style="object-fit: cover"
                        src="' . asset($movie->image) . '" class="lazy post-thumb"
                        alt="' . $movie->title . '" title="' . $movie->title . '" />
                    <span class="is_trailer">' . $movie->resolution->title . '</span>
                </div>
                <p class="title">' . $movie->title . '</p>
            </a>
            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
            <div style="float: left;">
                <span class="user-rate-image post-large-rate stars-large-vang"
                    style="display: block;/* width: 100%; */">
                    <span style="width: 0%"></span>
                </span>
            </div>
        </div>
            ';
        }
        echo $html;
    }
    function select_movie(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['movie_id']);
        $output = '';
        for ($i = 1; $i <= $movie->episode; $i++) {
            $output .= '<option value="' . $i . '">Tập ' . $i . '</option>';
        }
        echo $output;
    }
}
