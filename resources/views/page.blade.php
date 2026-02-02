@extends('template')

@section('contents')
    <h1 class="text-center">Daftar Data Produk</h1>
    <br />
    {{-- PHP --}}
    @php
        // This session came from `->with()` in different controller
        if (session('success')) {
            // DataController
            $status = 'success';
            $message = session('success');
        } elseif (session('status')) {
            // MainController
            $status = session('status');
            $message = session('message');
        }
    @endphp
    {{-- Show alert after get data --}}
    @if (isset($status))
        <div @class([
            'alert',
            'alert-success' => $status == 'success',
            'alert-warning' => $status == 'fail' && count($data) > 0,
            'alert-danger' =>
                $status != 'success' && !($status == 'fail' && count($data) > 0),
            'alert-dismissible fade show',
        ]) role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Buttons --}}
    <div class="mb-2">
        {{-- Get / refresh data --}}
        <button type="button" @class([
            'btn',
            'btn-success' => count($data) == 0,
            'btn-warning' => count($data) > 0,
        ]) data-bs-toggle="modal" data-bs-target="#modal-get">
            @if (count($data) > 0)
                <i class="bi bi-arrow-clockwise"></i>
                Reset Data
            @else
                <i class="bi bi-database-down"></i>
                Ambil Data
            @endif
        </button>
        {{-- Add data --}}
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-add"
            @disabled(count($data) == 0)>
            <i class="bi bi-plus-lg"></i>
            Tambah Data
        </button>
        {{-- Delete all data --}}
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-all"
            @disabled(count($data) == 0)>
            <i class="bi bi-trash3-fill"></i>
            Hapus Semua Data
        </button>
    </div>

    @if (count($data) > 0)
        {{-- Table --}}
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Produk</th>
                    <th scope="col" class="col-2">Harga</th>
                    <th scope="col" class="col-3">Kategori</th>
                    <th scope="col" class="col-1">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->nama_produk }}</td>
                        <td>Rp.{{ $item->harga }}</td>
                        <td>{{ $item->kategori->nama_kategori }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="bi bi-menu-app-fill"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#modal-update-{{ $item->id_produk }}">
                                            <i class="bi bi-pencil-fill"></i>
                                            Ubah Data</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#modal-delete-{{ $item->id_produk }}">
                                            <i class="bi bi-trash3-fill"></i>
                                            Hapus Data</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info" role="alert">
            Data belum diambil. Untuk mengambil data dari API, ikuti langkah berikut ini:
            <ol>
                <li>Buka halaman <strong>Pengaturan</strong> di sebelah kiri (Sidebar)</li>
                <li>Isi username dan password API, lalu klik simpan. Petunjuk pengisian data ini dapat dilihat pada halaman
                    tersebut</li>
                <li>Kembali ke halaman ini (Klik <strong>Data Produk</strong>)</li>
                <li>Klik <strong>Ambil Data</strong>, lalu klik ya</li>
                <li>Jika terdapat pesan sukses (Warna hijau), maka data API berhasil dibaca dan disimpan di database. Jika
                    tidak, mohon cek kembali username dan password API</li>
            </ol>
        </div>
    @endif
@endsection

@section('modals')
    @include('modal')
@endsection
