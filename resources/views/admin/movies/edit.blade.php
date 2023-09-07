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
                        <form action="{{ route('movie.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" value="{{ $movie->title }}" name="title">
                                @error('title')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="desc" class="form-label">Mô tả</label>
                                <textarea name="desc" id="desc" cols="30" rows="5"
                                    class="form-control @error('desc') is-invalid @enderror">{{ $movie->desc }}</textarea>
                                @error('desc')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tags" class="form-label">Tag phim</label>
                                <textarea name="tags" id="tags" cols="30" rows="5"
                                    class="form-control @error('tags') is-invalid @enderror">{{ $movie->tags }}</textarea>
                                @error('tags')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="trailer" class="form-label">Trailer</label>
                                <input type="text" class="form-control " id="trailer" value="{{ $movie->trailer }}"
                                    name="trailer">
                            </div>
                            <div class="form-group">
                                <label for="episode" class="form-label">Số tập</label>
                                <input type="number" class="form-control @error('episode') is-invalid @enderror"
                                    id="episode" value="{{ $movie->episode }}" name="episode">
                                @error('episode')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="duration" class="form-label">Thời lượng</label>
                                <input type="text" class="form-control @error('duration') is-invalid @enderror"
                                    id="duration" value="{{ $movie->duration }}" name="duration">
                                @error('duration')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Hình ảnh</label>
                                <input class="form-control" type="file" name="image" id="formFile">
                                <img class="mt-3" style="width: 250px;height:180px;object-fit:cover;"
                                    src="{{ asset($movie->image) }}" alt="">
                            </div>
                            <div class="form-group">
                                <label for="resolution" class="form-label">Chất lượng phim</label>
                                <select class="form-select" name="resolution_id" id="resolution">
                                    @foreach ($resolutions as $resolution)
                                        <option value="{{ $resolution->id }}"
                                            {{ $movie->resolution_id === $resolution->id ? 'selected' : '' }}>
                                            {{ $resolution->title }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="genre" class="form-label">Danh mục</label>
                            </div>
                            <div class="form-group">
                                @foreach ($genres as $genre)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="genre[]"
                                            id="{{ $genre->id }}" value="{{ $genre->id }}"
                                            @foreach ($movie->genres as $item)
                                            {{ $item->id === $genre->id ? 'Checked' : '' }} @endforeach>
                                        <label class="form-check-label"
                                            for="{{ $genre->id }}">{{ $genre->title }}</label>
                                    </div>
                                @endforeach
                                @error('genre')
                                    <p>
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="genre" class="form-label">Danh mục</label>
                            </div>
                            <div class="form-group">
                                @foreach ($cats as $cat)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="cat[]"
                                            id="{{ $cat->id }}" value="{{ $cat->id }}"
                                            @foreach ($movie->cats as $item)
                                            {{ $item->id === $cat->id ? 'Checked' : '' }} @endforeach>
                                        <label class="form-check-label"
                                            for="{{ $cat->id }}">{{ $cat->title }}</label>
                                    </div>
                                @endforeach
                                @error('cat')
                                    <p>
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="country" class="form-label">Quốc gia</label>
                                <select class="form-select" name="country_id" id="country">
                                    @foreach ($countries as $country)
                                        <option {{ $movie->country_id === $country->id ? 'selected' : '' }}
                                            value="{{ $country->id }}">{{ $country->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="movie_hot" class="form-label">Phim Hot</label>
                                <select class="form-select" name="movie_hot" id="movie_hot">
                                    <option {{ $movie->movie_hot === '1' ? 'selected' : '' }} value="1">Có</option>
                                    <option {{ $movie->movie_hot === '0' ? 'selected' : '' }} value="0">Không
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="subline" class="form-label">Phụ đề</label>
                                <select class="form-select" name="subline" id="subline">
                                    <option {{ $movie->subline === '1' ? 'selected' : '' }} value="1">Vietsub
                                    </option>
                                    <option {{ $movie->subline === '0' ? 'selected' : '' }} value="0">Thuyết minh
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status" class="form-label">Trạng thái</label>
                                <select class="form-select" name="status" id="status">
                                    <option {{ $movie->status === '1' ? 'selected' : '' }} value="1">Hiển
                                        thị</option>
                                    <option {{ $movie->status === '0' ? 'selected' : '' }} value="0">Không hiển thị
                                    </option>
                                </select>
                            </div>
                            <input type="submit" class="btn btn-primary mt-3" name="add" value="Cập nhật dữ liệu">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
