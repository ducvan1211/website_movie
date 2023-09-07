<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gens = Genre::orderBy('id', 'DESC')->get();
        return view('admin.genres.index', compact('gens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.genres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'title' => 'required',
                'desc' => 'required',
            ],
            [
                'required' => ':attribute không được để trống'
            ],
            [
                'unique' => 'Dữ liệu đã tồn tại trong hệ thống',
                'title' => 'Tiêu đề',
                'desc' => "Mô tả"
            ]
        );
        $data = $request->all();
        $data['slug'] = Str::slug($data['title'], '-');
        Genre::create($data);
        return redirect()->route('genre.index')->with('status', 'Thêm dữ liệu thành công');
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
        $gen = Genre::find($id);
        return view('admin.genres.edit', compact('gen'));
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
        $gen = Genre::find($id);
        $request->validate(
            [
                'title' => 'required',
                'desc' => 'required',
            ],
            [
                'required' => ':attribute không được để trống'
            ],
            [
                'title' => 'Tiêu đề',
                'desc' => "Mô tả"
            ]
        );
        $data = $request->all();
        $data['slug'] = Str::slug($data['title'], '-');
        $gen->update($data);
        return redirect()->route('genre.index')->with('status', 'Cập nhật dữ liệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gen = Genre::find($id);
        $gen->delete();
        return redirect()->route('genre.index')->with('status', 'Xóa dữ liệu thành công');
    }
}
