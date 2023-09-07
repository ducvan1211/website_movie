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
                        <form action="{{ route('resolution.update', $resolution->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" value="{{ $resolution->title }}" name="title">
                                @error('title')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="desc" class="form-label">Mô tả</label>
                                <textarea name="desc" id="desc" cols="30" rows="5"
                                    class="form-control @error('desc') is-invalid @enderror">{{ $resolution->desc }}</textarea>
                                @error('desc')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <input type="submit" class="btn btn-primary mt-3" name="add" value="Cập nhật dữ liệu">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
