@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">About</h4>
    <div class="row">
        <div class="col-md-2 text-center">
            <img src="{{ asset('storage/assets/foto_profile.jpeg') }}" alt="Profile" class="img-fluid border p-2 rounded">
        </div>
        <div class="col-md-10">
            <p>Aplikasi ini dibuat oleh:</p>
            <table class="table table-borderless">
                <tr>
                    <th style="width: 120px;">Nama</th>
                    <td>: Raden Rizki</td>
                </tr>
                <tr>
                    <th>Prodi</th>
                    <td>: D4 - Teknik Informatika</td>
                </tr>
                <tr>
                    <th>NIM</th>
                    <td>: 2141720064</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>: 30 September 2025</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
