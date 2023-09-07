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
                        <form action="{{ route('episode.update', $episode->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="movie_id" class="form-label">Phim</label>
                                <select disabled class="form-select" name="movie_id" id="movie_id">
                                    <option><strong>Chọn phim</strong></option>
                                    @foreach ($movies as $movie)
                                        <option {{ $movie->id === $episode->movie->id ? 'selected' : '' }}
                                            value="{{ $movie->id }}">
                                            {{ $movie->title }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="episode" class="form-label">Tập</label>
                                <select disabled class="form-select" name="episode" id="episode">
                                    <option value="{{ $episode->episode }}">Tập {{ $episode->episode }}</option>
                                    {{-- <option value="2">Tập 2</option> --}}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="link" class="form-label">Link phim</label>
                                <input type="text" class="form-control @error('link') is-invalid @enderror"
                                    id="link" value="{{ $episode->link }}" name="link">
                                @error('link')
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
