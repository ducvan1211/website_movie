<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Movie_Genre;
use App\Models\Resolution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::orderBy('title')->where('status', '1')->get();
        $genres = Genre::orderBy('title')->where('status', '1')->get();
        $countries = Country::orderBy('title')->where('status', '1')->get();
        $resolutions = Resolution::orderBy('title')->get();
        $movies = Movie::with('genres')->orderBy('id', 'DESC')->paginate(10);
        foreach ($movies as $movie) {
            $movie['title'] = Str::limit($movie['title'], 20, '...');
            $movie['slug'] = Str::limit($movie['slug'], 20, '...');
            $movie['desc'] = Str::limit($movie['desc'], 20, '...');
        }
        $list = Movie::where('status', '1')->orderBy('id', 'DESC')->get();
        $path = public_path() . '/json';
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        File::put($path . '/movies.json', json_encode($list));
        return view('admin.movies.index', compact('movies', 'cats', 'genres', 'countries', 'resolutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resolutions = Resolution::orderBy('title')->get();
        $cats = Category::orderBy('title')->where('status', '1')->get();
        $genres = Genre::orderBy('title')->where('status', '1')->get();
        $countries = Country::orderBy('title')->where('status', '1')->get();
        return view('admin.movies.create', compact('cats', 'genres', 'countries', 'resolutions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate(
            [
                'title' => 'required',
                'desc' => 'required',
                'genre' => 'required',
                'cat' => 'required'
            ],
            [
                'required' => ':attribute không được để trống'
            ],
            [
                'unique' => 'Dữ liệu đã tồn tại trong hệ thống',
                'title' => 'Tiêu đề',
                'desc' => "Mô tả",
                'genre' => 'Danh mục phim',
                'cat' => 'Thể loại phim'
            ]
        );
        $data = $request->all();
        // return $data['genre'][0];
        $data['genre_id'] = $data['genre'][0];
        $data['cat_id'] = $data['cat'][0];
        $data['slug'] = Str::slug($data['title'], '-');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . "_" . $file->getClientOriginalName();
            $file->move('uploads/', $name);
            $data['image'] = 'uploads/' . $name;
        } else {
            $data['image'] = 'uploads/default.jpg';
        }
        $movie = Movie::create($data);
        // $arr = array();
        foreach ($data['genre'] as $genre) {
            $genre = (int) $genre;
        }
        foreach ($data['cat'] as $cat) {
            $cat = (int) $cat;
        }
        $movie->Cats()->attach($data['cat']);
        return redirect()->route('movie.index')->with('status', 'Thêm dữ liệu thành công');
        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resolutions = Resolution::orderBy('title')->get();
        $cats = Category::orderBy('title')->where('status', '1')->get();
        $genres = Genre::orderBy('title')->where('status', '1')->get();
        $countries = Country::orderBy('title')->where('status', '1')->get();
        $movie = Movie::with('Genres')->where('id', $id)->first();
        return view('admin.movies.edit', compact('movie', 'cats', 'genres', 'countries', 'resolutions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);
        $request->validate(
            [
                'title' => 'required',
                'desc' => 'required',
                'duration' => 'required',
                'cat' => 'required'
            ],
            [
                'required' => ':attribute không được để trống'
            ],
            [
                'unique' => 'Dữ liệu đã tồn tại trong hệ thống',
                'title' => 'Tiêu đề',
                'desc' => "Mô tả",
                'duration' => 'Thời lượng phim',
                'cat' => 'Thể loại',
            ]
        );
        $data = $request->all();
        $data['genre_id'] = $data['genre'][0];
        $data['slug'] = Str::slug($data['title'], '-');
        if ($request->hasFile('image')) {
            if (!($movie->image == 'uploads/default.jpg')) {
                unlink($movie->image);
            }
            $file = $request->file('image');
            $name = time() . "_" . $file->getClientOriginalName();
            $file->move('uploads/', $name);
            $data['image'] = 'uploads/' . $name;
        }
        $movie->update($data);
        foreach ($data['genre'] as $genre) {
            $genre = (int) $genre;
        }
        foreach ($data['cat'] as $cat) {
            $cat = (int) $cat;
        }
        $movie->Genres()->sync($data['genre']);
        $movie->Cats()->sync($data['cat']);
        return redirect()->route('movie.index')->with('status', 'Cập nhật dữ liệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        if (!($movie->image == 'uploads/default.jpg')) {
            unlink($movie->image);
        }
        $movie->delete();
        return redirect()->route('movie.index')->with('status', 'Xóa dữ liệu thành công');
    }
}
