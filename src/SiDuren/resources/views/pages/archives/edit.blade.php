@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
        <h1 class="h3 mb-0 text-gray-800">Arsip Surat >> Edit</h1>
    </div>

    <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan.<br>
        <small><i>Catatan: Gunakan file berformat PDF</i></small>
    </p>

    <div class="row">
        <div class="col">
            <form action="/archive/{{ $archive->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="letter_number">Nomor Surat</label>
                            <input type="text" name="letter_number" id="letter_number"
                                class="form-control @error('letter_number') is-invalid @enderror"
                                value="{{ old('letter_number', $archive->letter_number) }}">
                            @error('letter_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="category_id">Kategori</label>
                            <select name="category_id" id="category_id"
                                class="form-control @error('category_id') is-invalid @enderror">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $archive->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="title">Judul</label>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title', $archive->title) }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="file">File Surat (PDF)</label>

                            {{-- Tampilkan file yang sudah tersimpan --}}
                            @if ($archive->file_path)
                                <p>
                                    File saat ini:
                                    <a href="{{ asset('storage/' . $archive->file_path) }}" target="_blank"
                                        class="btn btn-sm btn-info shadow-sm">
                                        Lihat PDF
                                    </a>
                                </p>
                            @endif

                            {{-- Input untuk upload file baru --}}
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
                                    <button type="submit" class="btn btn-sm btn-primary shadow-sm">Simpan
                                        Perubahan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
