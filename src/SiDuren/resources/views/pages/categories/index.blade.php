@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Kategori Surat</h1>
            <p class="mt-2">Berikut ini adalah kategori yang dapat digunakan untuk melebeli surat.<br>
                Klik <b>"Tambah"</b> pada kolom aksi untuk menambahkan kategori baru.</p>
        </div>
    </div>

    {{-- Search Form --}}
    <div class="mb-3">
        <form action="/category" method="GET" class="d-none d-sm-inline-block form-inline mr-auto mw-100 navbar-search">
            <div class="input-group" style="width: 440px">
                <input type="text" name="search" class="form-control bg-white shadow-sm border-0 small"
                    placeholder="Cari Nama Kategori atau Keterangan" value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-primary shadow-sm" type="submit">
                        <i class="fas fa-search fa-sm"></i> Cari
                    </button>
                </div>
            </div>
        </form>
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
                                    <th>ID Kategori</th>
                                    <th>Nama Kategori</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            @if ($categories->isEmpty())
                                <tbody>
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada data kategori.</td>
                                    </tr>
                                </tbody>
                            @else
                                <tbody>
                                    @foreach ($categories as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>
                                                <div>
                                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#confirmationDelete-{{ $item->id }}">
                                                        Hapus
                                                    </button>
                                                    <a href="/category/{{ $item->id }}/edit"
                                                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                                            class="text-white-50"></i>Edit</a>
                                                </div>
                                            </td>
                                        </tr>
                                        @include('pages.categories.confirmation-delete')
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
        <a href="category/create" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i>&nbsp;&nbsp;Tambah Kategori Baru</a>
    </div>
@endsection
