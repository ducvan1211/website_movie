@extends('layouts.app')

@section('content')
    <div class="container">
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
                        <a class="btn btn-success" href="{{ route('category.create') }}">Thêm thể loại</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tiêu đề</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($cats as $cat)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <td>{{ $cat->title }}</td>
                                        <td>{{ $cat->slug }}</td>
                                        <td>{{ $cat->desc }}</td>
                                        <td>{{ $cat->status === '1' ? 'Hiển thị' : 'Không hiển thị' }}</td>
                                        <td class="d-flex">
                                            <form class="me-2" action="{{ route('category.destroy', $cat->id) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger"
                                                    onclick="return confirm('Bạn có chắc chắn xóa dữ liệu này ?')">Xóa</button>
                                            </form>
                                            <form action="{{ route('category.edit', $cat->id) }}" method="GET">
                                                <button class="btn btn-primary">Sửa</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
