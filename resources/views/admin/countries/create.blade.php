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
                        <form action="{{ route('country.store') }}" method="POST">
                            @method('POST')
                            @csrf
                            <div class="form-group">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" placeholder="Nhập dữ liệu..." name="title">
                                @error('title')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="desc" class="form-label">Mô tả</label>
                                <textarea name="desc" id="desc" cols="30" rows="5"
                                    class="form-control @error('desc') is-invalid @enderror" placeholder="Mô tả..."></textarea>
                                @error('desc')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status" class="form-label">Trạng thái</label>
                                <select class="form-select" name="status" id="status">
                                    <option value="1">Hiển thị</option>
                                    <option value="2">Không hiển thị</option>
                                </select>
                            </div>
                            <input type="submit" class="btn btn-primary mt-3" name="add" value="Thêm dữ liệu">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
