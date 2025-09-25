@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
        <h1 class="h3 mb-0 text-gray-800">Kategori Surat >> Edit</h1>
    </div>

    <div class="row">
        <div class="col">
            <form action="/category/{{ $category->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="category_id">ID (Auto Increment)</label>
                            <input type="number" name="category_id" id="category_id" value="{{ $category->id }}" disabled class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Nama Kategori</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $category->name) }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Keterangan</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $category->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-start" style="gap: 10px">
                            <a href="/category" class="btn btn-sm btn-secondary shadow-sm">
                                << Kembali</a>
                                    <button type="submit" class="btn btn-sm btn-primary shadow-sm">Simpan Perubahan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
