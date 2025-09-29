@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
        <h1 class="h3 mb-0 text-gray-800">Arsip Surat</h1>
    </div>

    {{-- Table --}}
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hovered">
                            <thead>
                                <tr>
                                    <th>Nomor Surat</th>
                                    <th>Kategori</th>
                                    <th>Judul</th>
                                    <th>Waktu Pengarsipan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            @if ($archives->isEmpty())
                                <tbody>
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada data arsip.</td>
                                    </tr>
                                </tbody>
                            @else
                                <tbody>
                                    @foreach ($archives as $item)
                                        <tr>
                                            <td>{{ $item->letter_number }}</td>
                                            <td>{{ $item->category->name }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->created_at->format('Y-m-d H:i') }}</td>
                                            <td>
                                                <div>
                                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#confirmationDelete-{{ $item->id }}">
                                                        Hapus
                                                    </button>
                                                    <a href="/archive/{{ $item->id }}/edit"
                                                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                                            class="text-white-50"></i>Edit</a>
                                                    <a href="/archive/{{ $item->id }}" class="btn btn-sm btn-info shadow-sm">
                                                        Lihat
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @include('pages.archives.confirmation-delete')
                                    @endforeach
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Add Button --}}
    <div class="mt-4">
        <a href="archive/create" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i>&nbsp;&nbsp;Arsipkan Surat</a>
    </div>
@endsection
