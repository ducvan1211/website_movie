<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    function home()
    {
        $cats = Category::orderBy('title')->get();
        $genres = Genre::where('status', '1')->get();
        foreach ($genres as $genre) {
            $genre['movies'] = $genre->list_movie->where('status', '1')->take(8);
        }
        $countries = Country::orderBy('title')->get();
        $movie_hot = Movie::with('resolution')->where('movie_hot', '1')->orderBy('updated_at', 'DESC')->get();
        $movie_hot_sidebar = Movie::with('resolution')->where('movie_hot', '1')->orderBy('updated_at', 'DESC')->take(10)->get();
        return view('pages.home', compact('cats', 'genres', 'countries', 'movie_hot', 'movie_hot_sidebar'));
    }
    function genre($slug)
    {
        $cats = Category::orderBy('title')->get();
        $genres = Genre::where('status', '1')->get();
        $countries = Country::orderBy('title')->get();
        $genre_slug = Genre::where('slug', $slug)->where('status', '1')->first();
        $movies = $genre_slug->list_movie->where('status', '1');
        $movie_hot_sidebar = Movie::with('resolution')->where('movie_hot', '1')->orderBy('updated_at', 'DESC')->take(10)->get();

        foreach ($movies as $movie) {
            $movie['resolution'] = $movie->Resolution;
        }
        return view('pages.genre', compact('cats', 'genres', 'countries', 'genre_slug', 'movies', 'movie_hot_sidebar'));
    }
    function country($slug)
    {
        $cats = Category::orderBy('title')->get();
        $genres = Genre::where('status', '1')->get();
        $countries = Country::orderBy('title')->get();
        $country_slug = Country::where('slug', $slug)->first();
        $movies = $country_slug->Movies->where('status', '1');
        $movie_hot_sidebar = Movie::with('resolution')->where('movie_hot', '1')->orderBy('updated_at', 'DESC')->take(10)->get();

        foreach ($movies as $movie) {
            $movie['resolution'] = $movie->Resolution;
        }
        return view('pages.country', compact('cats', 'genres', 'countries', 'country_slug', 'movies', 'movie_hot_sidebar'));
    }
    function category($slug)
    {
        $cats = Category::orderBy('title')->get();
        $genres = Genre::where('status', '1')->get();
        $countries = Country::orderBy('title')->get();
        $cat_slug = Category::where('slug', $slug)->where('status', '1')->first();
        $movies = $cat_slug->list_movie->where('status', '1');
        $movie_hot_sidebar = Movie::with('resolution')->where('movie_hot', '1')->orderBy('updated_at', 'DESC')->take(10)->get();

        foreach ($movies as $movie) {
            $movie['resolution'] = $movie->Resolution;
        }
        return view('pages.category', compact('cats', 'genres', 'countries', 'cat_slug', 'movies', 'movie_hot_sidebar'));
    }
    function detail($slug)
    {
        $cats = Category::orderBy('title')->get();
        $genres = Genre::where('status', '1')->get();
        $countries = Country::orderBy('title')->get();
        $movie = Movie::with('Genres', 'Country', 'Resolution', 'Cats', 'Episodes')->where('slug', $slug)->first();
        $episodes = Episode::where('movie_id', $movie->id)->orderBy('episode', 'DESC')->get();
        // $movie = Movie::with('Genre', 'Country', 'Category', 'Resolution', 'Cats')->where('slug', $slug)->first();

        $movie['tags'] = explode(',', $movie->tags);
        $movie_hot = Movie::where('movie_hot', '1')->where('status', '1')->orderBy(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->get();
        $movie_hot_sidebar = Movie::with('resolution')->where('movie_hot', '1')->orderBy('updated_at', 'DESC')->take(10)->get();
        return view('pages.detail', compact('cats', 'genres', 'countries', 'movie', 'movie_hot', 'movie_hot_sidebar', 'episodes'));
    }
    function watch($slug, $ep)
    {
        $cats = Category::orderBy('title')->get();
        $genres = Genre::where('status', '1')->get();
        $countries = Country::orderBy('title')->get();
        $movie_hot = Movie::where('movie_hot', '1')->where('status', '1')->orderBy(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->get();
        $movie_hot_sidebar = Movie::with('resolution')->where('movie_hot', '1')->orderBy('updated_at', 'DESC')->take(10)->get();


        $movie = Movie::with('Genres', 'Country', 'Resolution', 'Cats', 'Episodes')->where('slug', $slug)->first();
        $episode = Episode::where('movie_id', $movie->id)->where('episode', $ep)->first();
        return view('pages.watch', compact('cats', 'genres', 'countries', 'movie_hot', 'movie_hot_sidebar', 'movie', 'episode'));
    }
    function year($year)
    {
        $cats = Category::orderBy('title')->get();
        $genres = Genre::where('status', '1')->get();
        $countries = Country::orderBy('title')->get();
        $movie_hot_sidebar = Movie::with('resolution')->where('movie_hot', '1')->orderBy('updated_at', 'DESC')->take(10)->get();
        $movies = Movie::where('year', $year)->where('status', '1')->get();
        return view('pages.year', compact('cats', 'genres', 'countries', 'movies', 'year', 'movie_hot_sidebar'));
    }
    function tag($tag)
    {
        $cats = Category::orderBy('title')->get();
        $genres = Genre::where('status', '1')->get();
        $countries = Country::orderBy('title')->get();
        $movies = Movie::where('tags', 'LIKE', "%$tag%")->where('status', '1')->get();
        $movie_hot_sidebar = Movie::with('resolution')->where('movie_hot', '1')->orderBy('updated_at', 'DESC')->take(10)->get();

        return view('pages.tag', compact('cats', 'genres', 'countries', 'movies', 'tag', 'movie_hot_sidebar'));
    }
    function search(Request $request)
    {
        $cats = Category::orderBy('title')->get();
        $genres = Genre::where('status', '1')->get();
        $countries = Country::orderBy('title')->get();
        $movie_hot_sidebar = Movie::with('resolution')->where('movie_hot', '1')->orderBy('updated_at', 'DESC')->take(10)->get();
        $data = $request->all();
        $s = $data['s'];
        $movies = Movie::where('title', 'LIKE', "%$s%")->where('status', '1')->get();
        return view('pages.search', compact('cats', 'genres', 'countries', 'movie_hot_sidebar', 'movies', 's'));
    }
}
