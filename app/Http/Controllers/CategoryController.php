<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::orderBy('id', 'DESC')->get();
        return view('admin.categories.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
                'title' => 'required|unique:categories',
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
        Category::create($data);
        return redirect()->route('category.index')->with('status', 'Thêm dữ liệu thành công');
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
        $cat = Category::find($id);
        return view('admin.categories.edit', compact('cat'));
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
        $cat = Category::find($id);
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
        $cat->update($data);
        return redirect()->route('category.index')->with('status', 'Cập nhật dữ liệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::find($id);
        $cat->delete();
        return redirect()->route('category.index')->with('status', 'Xóa dữ liệu thành công');
    }
}
