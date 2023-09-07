<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::orderBy('id', 'DESC')->get();
        return view('admin.countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.countries.create');
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
        Country::create($data);
        return redirect()->route('country.index')->with('status', 'Thêm dữ liệu thành công');
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
        $country = Country::find($id);
        return view('admin.countries.edit', compact('country'));
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
        $country = Country::find($id);
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
        $country->update($data);
        return redirect()->route('country.index')->with('status', 'Cập nhật dữ liệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::find($id);
        $country->delete();
        return redirect()->route('country.index')->with('status', 'Xóa dữ liệu thành công');
    }
}
