<?php

namespace App\Http\Controllers;

use App\Models\Resolution;
use Illuminate\Http\Request;

class ResolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resolutions = Resolution::orderBy('id', 'DESC')->get();
        return view('admin.resolutions.index', compact('resolutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.resolutions.create');
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

                'title' => 'Tiêu đề',
                'desc' => "Mô tả"
            ]
        );
        $data = $request->all();
        Resolution::create($data);
        return redirect()->route('resolution.index')->with('status', 'Thêm dữ liệu thành công');
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
        $resolution = Resolution::find($id);
        return view('admin.resolutions.edit', compact('resolution'));
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

        $resolution = Resolution::find($id);
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
        $resolution->update($data);
        return redirect()->route('resolution.index')->with('status', 'Cập nhật dữ liệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resolution = Resolution::find($id);
        $resolution->delete();
        return redirect()->route('resolution.index')->with('status', 'Xóa dữ liệu thành công');
    }
}
