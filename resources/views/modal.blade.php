{{-- Get / Reset data --}}
<div class="modal modal-sheet fade p-4 py-md-5" tabindex="-1" role="dialog" id="modal-get">
    <div class="modal-dialog">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header border-bottom-0">
                <h1 class="modal-title fs-5">
                    @if (count($data) > 0)
                        Reset data
                    @else
                        Ambil data
                    @endif
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body py-0">
                @if (count($data) > 0)
                    <div class="alert alert-warning" role="alert">
                        Data yang sebelumnya sudah disimpan dan telah dimodifikasi di database ini akan di digantikan
                        (Overwrite) oleh data API (Kecuali data yang tidak ada di data API)
                    </div>
                @endif
                <p>Apakah anda ingin mengambil data dari API? Pastikan data Auth telah sesuai</p>
            </div>
            <form action="{{ route('main.refresh') }}" method="POST">
                @csrf @method('POST')
                <div class="modal-footer flex-column align-items-stretch w-100 gap-2 pb-3 border-top-0">
                    <button type="submit" class="btn btn-lg btn-primary">Ya</button>
                    <button type="button" class="btn btn-lg btn-secondary" data-bs-dismiss="modal">Tidak</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Create data --}}
<div class="modal fade" id="modal-add" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('data.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalAddLabel">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp.</span>
                            <input type="number" class="form-control" id="harga" name="harga" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="kategori_id" class="form-label">Kategori</label>
                        <select class="form-select" id="kategori_id" name="kategori_id" required>
                            <option value="" selected disabled>Pilih Kategori</option>
                            @foreach ($kategori as $kat)
                                <option value="{{ $kat->id_kategori }}">{{ $kat->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status_id" class="form-label">Status</label>
                        <select class="form-select" id="status_id" name="status_id" required>
                            <option value="" selected disabled>Pilih Status</option>
                            @foreach ($statuses as $stat)
                                <option value="{{ $stat->id_status }}">{{ $stat->nama_status }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Delete all data --}}
<div class="modal modal-sheet fade p-4 py-md-5" tabindex="-1" role="dialog" id="modal-delete-all">
    <div class="modal-dialog">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header border-bottom-0">
                <h1 class="modal-title fs-5">Hapus Semua Data</h1> <button type="button" class="btn-close"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-0">
                <p>Apakah anda ingin menghapus seluruh data yang ada?</p>
            </div>
            <form action="{{ route('data.delete-all') }}" method="POST">
                @csrf @method('POST')
                <div class="modal-footer flex-column align-items-stretch w-100 gap-2 pb-3 border-top-0">
                    <button type="submit" class="btn btn-lg btn-primary">Ya</button>
                    <button type="button" class="btn btn-lg btn-secondary" data-bs-dismiss="modal">Tidak</button>
                </div>
            </form>
        </div>
    </div>
</div>
@foreach ($data as $item)
    {{-- Update data --}}
    <div class="modal fade" id="modal-update-{{ $item->id_produk }}" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('data.update', $item->id_produk) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                value="{{ $item->nama_produk }}" aria-describedby="nama_produk_help" required>
                            <div id="nama_produk_help" class="form-text">{{ $item->nama_produk }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp.</span>
                                <input type="number" class="form-control" id="harga" name="harga"
                                    value="{{ $item->harga }}" aria-describedby="harga_help" required>
                            </div>
                            <div id="harga_help" class="form-text">Rp. {{ $item->harga }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="kategori_id" class="form-label">Kategori</label>
                            <select class="form-select" id="kategori_id" name="kategori_id"
                                aria-describedby="kategori_help" required>
                                <option value="" disabled>Pilih Kategori</option>
                                @foreach ($kategori as $kat)
                                    <option value="{{ $kat->id_kategori }}" @selected($item->kategori_id == $kat->id_kategori)>
                                        {{ $kat->nama_kategori }}</option>
                                @endforeach
                            </select>
                            <div id="kategori_help" class="form-text">{{ $item->kategori->nama_kategori }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="status_id" class="form-label">Status</label>
                            <select class="form-select" id="status_id" name="status_id"
                                aria-describedby="status_help" required>
                                <option value="" disabled>Pilih Status</option>
                                @foreach ($statuses as $stat)
                                    <option value="{{ $stat->id_status }}" @selected($item->status_id == $stat->id_status)>
                                        {{ $stat->nama_status }}</option>
                                @endforeach
                            </select>
                            <div id="status_help" class="form-text">{{ $item->status->nama_status }}</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Delete data --}}
    <div class="modal modal-sheet fade p-4 py-md-5" tabindex="-1" role="dialog"
        id="modal-delete-{{ $item->id_produk }}">
        <div class="modal-dialog">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header border-bottom-0">
                    <h1 class="modal-title fs-5">Hapus Data</h1> <button type="button" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <p>Apakah anda ingin menghapus data ini?</p>
                    <p>Data yang akan dihapus: <br />
                        <strong>{{ $item->nama_produk }}</strong>
                    </p>
                </div>
                <form action="{{ route('data.destroy', $item->id_produk) }}" method="POST">
                    @csrf @method('DELETE')
                    <div class="modal-footer flex-column align-items-stretch w-100 gap-2 pb-3 border-top-0">
                        <button type="submit" class="btn btn-lg btn-primary">Ya</button>
                        <button type="button" class="btn btn-lg btn-secondary"
                            data-bs-dismiss="modal">Tidak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
