@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
        <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
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
                                                    <form id="delete-form-{{ $item->id }}"
                                                        action="{{ route('category.destroy', $item->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger shadow-sm">
                                                            <i class="text-white-50"></i> Hapus
                                                        </button>
                                                    </form>
                                                    <a href="/category/{{ $item->id }}/edit"
                                                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                                            class="text-white-50"></i>Edit</a>
                                                </div>
                                            </td>
                                        </tr>
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
