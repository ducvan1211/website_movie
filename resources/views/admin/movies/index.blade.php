@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Trang quản lý Admin</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a class="btn btn-success" href="{{ route('movie.create') }}">Thêm phim</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tiêu đề</th>
                                    {{-- <th scope="col">Slug</th> --}}
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Danh mục</th>
                                    <th scope="col">Thể loại</th>
                                    <th scope="col">Quốc gia</th>
                                    <th scope="col">Số tập</th>
                                    <th scope="col">Phụ đề</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Chất lượng phim</th>
                                    <th scope="col">Phim hot</th>
                                    <th scope="col">Năm phim</th>
                                    <th scope="col">Top view</th>
                                    <th scope="col">Thời lượng</th>
                                    <th scope="col">Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($movies as $movie)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <th scope="row">
                                            <div style="line-height: 100px">
                                                {{ $i }}
                                            </div>
                                        </th>
                                        <td>
                                            <div style="line-height: 100px">
                                                {{ $movie->title }}
                                            </div>
                                        </td>
                                        {{-- <td>
                                            <div style="line-height: 100px">
                                                {{ $movie->slug }}
                                            </div>
                                        </td> --}}

                                        <td><img class="image" src="{{ $movie->image }}" alt=""></td>
                                        <td>
                                            <div style="line-height: 100px">

                                                @foreach ($movie->genres as $genre)
                                                    <span class="badge text-bg-dark">{{ $genre->title }}</span>
                                                @endforeach

                                            </div>
                                        </td>
                                        <td>
                                            <div style="line-height: 100px">
                                                @foreach ($movie->cats as $cat)
                                                    <span class="badge text-bg-dark">{{ $cat->title }}</span>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td>
                                            <div style="line-height: 100px">
                                                @foreach ($countries as $country)
                                                    {{ $country->id === $movie->country_id ? $country->title : '' }}
                                                @endforeach
                                            </div>
                                        </td>
                                        <td>
                                            <div style="line-height: 100px">
                                                {{ $movie->episode }}
                                            </div>
                                        </td>
                                        <td>
                                            <div style="line-height: 100px">
                                                {{ $movie->subline === '1' ? 'Vietsub' : 'Thuyết minh' }}
                                            </div>
                                        </td>
                                        <td>
                                            <div style="line-height: 100px">
                                                {{ $movie->status === '1' ? 'Hiển thị' : 'Không hiển thị' }}
                                            </div>
                                        </td>
                                        <td>
                                            <div style="line-height: 100px">
                                                @foreach ($resolutions as $resolution)
                                                    {{ $resolution->id === $movie->resolution_id ? $resolution->title : '' }}
                                                @endforeach
                                            </div>
                                        </td>
                                        <td>
                                            <div style="line-height: 100px">
                                                {{ $movie->movie_hot === '1' ? 'Có' : 'Không' }}
                                            </div>
                                        </td>
                                        <td>
                                            <div style="line-height: 100px;height:110px" class="d-flex align-items-center">
                                                {!! Form::selectYear('year', 1900, 2025, isset($movie->year) ? $movie->year : '', [
                                                    'class' => 'select_year form-control',
                                                    'id' => $movie->id,
                                                ]) !!}
                                            </div>
                                        </td>
                                        <td>
                                            <div style="line-height: 100px;height:110px" class="d-flex align-items-center">
                                                <form action="" method="get">
                                                    <select class="form-control top_view" name="top_view"
                                                        id="{{ $movie->id }}">
                                                        <option {{ $movie->top_view === '0' ? 'selected' : '' }}
                                                            value="0">
                                                            Không</option>
                                                        <option {{ $movie->top_view === '1' ? 'selected' : '' }}
                                                            value="1">Ngày</option>
                                                        <option {{ $movie->top_view === '2' ? 'selected' : '' }}
                                                            value="2">Tuần</option>
                                                        <option {{ $movie->top_view === '3' ? 'selected' : '' }}
                                                            value="3">Tháng</option>
                                                        <option {{ $movie->top_view === '4' ? 'selected' : '' }}
                                                            value="4">Năm</option>
                                                    </select>
                                                </form>
                                            </div>

                                        </td>
                                        <td>
                                            <div style="line-height: 100px">
                                                {{ $movie->duration }}
                                            </div>
                                        </td>
                                        <td>
                                            <div style="line-height: 100px" class="d-flex">
                                                <form class="me-2" action="{{ route('movie.destroy', $movie->id) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('Bạn có chắc chắn xóa dữ liệu này ?')">Xóa</button>
                                                </form>
                                                <form action="{{ route('movie.edit', $movie->id) }}" method="GET">
                                                    <button class="btn btn-primary">Sửa</button>
                                                </form>
                                            </div>


                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        {{ $movies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
