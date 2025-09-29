@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
        <h1 class="h3 mb-0 text-gray-800">Arsip Surat >> Unggah</h1>
    </div>
    <p><strong>Nomor:</strong> {{ $archive->letter_number }}</p>
    <p><strong>Kategori:</strong> {{ $archive->category->name ?? '-' }}</p>
    <p><strong>Judul:</strong> {{ $archive->title }}</p>
    <p><strong>Waktu Unggah:</strong> {{ $archive->created_at->format('Y-m-d H:i:s') }}</p>

    <div class="mb-3" style="border:1px solid #ccc; height:600px;">
        <iframe src="{{ asset('storage/' . $archive->file_path) }}" width="100%" height="100%">
        </iframe>
    </div>

    <div class="mb-4">
        <a href="{{ url('/archive') }}" class="btn btn-secondary">
            << Kembali</a>
                <a href="{{ asset('storage/' . $archive->file_path) }}" class="btn btn-success" download>Unduh</a>
                <a href="/archive/{{ $archive->id }}/edit" class="btn btn-primary">Edit/Ganti File</a>
    </div>
@endsection
