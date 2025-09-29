@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
        <h1 class="h3 mb-0 text-gray-800">Arsip Surat >> Unggah</h1>
    </div>

    <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan.<br>
        <small><i>Catatan: Gunakan file berformat PDF</i></small>
    </p>

    <div class="row">
        <div class="col">
            <form action="/archive" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">

                        {{-- Nomor Surat --}}
                        <div class="form-group mb-3">
                            <label for="letter_number">Nomor Surat</label>
                            <input type="text" name="letter_number" id="letter_number"
                                class="form-control @error('letter_number') is-invalid @enderror"
                                value="{{ old('letter_number') }}">
                            @error('letter_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Kategori --}}
                        <div class="form-group mb-3">
                            <label for="category_id">Kategori</label>
                            <select name="category_id" id="category_id"
                                class="form-control @error('category_id') is-invalid @enderror">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Judul --}}
                        <div class="form-group mb-3">
                            <label for="title">Judul</label>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- File Surat --}}
                        <div class="form-group mb-3">
                            <label for="file">File Surat (PDF)</label>
                            <input type="file" name="file" id="file"
                                class="form-control @error('file') is-invalid @enderror" accept="application/pdf">
                            @error('file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-start" style="gap: 10px">
                            <a href="/archive" class="btn btn-sm btn-secondary shadow-sm">
                                << Kembali</a>
                                    <button type="submit" class="btn btn-sm btn-primary shadow-sm">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
