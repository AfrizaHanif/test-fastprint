@extends('template')

@section('contents')
    <h1 class="text-center">Pengaturan</h1>
    <br />
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="row align-items-md-stretch mb-3">
        <div class="col-md-6">
            <div class="h-100 p-5 bg-body-tertiary border rounded-3">
                <h2>Auth API</h2>
                <form action="{{ route('settings.store') }}" method="POST">
                    @csrf @method('POST')
                    <div class="mb-3">
                        <label for="api_url" class="form-label">API URL</label>
                        <input type="text" class="form-control @error('api_url') is-invalid @enderror" name="api_url"
                            id="api_url" value="{{ old('api_url', $api_url) }}" aria-describedby="api_urlHelp">
                        <div id="api_urlHelp" class="form-text">Link API:
                            https://recruitment.fastprint.co.id/tes/api_tes_programmer</div>
                        @error('api_url')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="api_username" class="form-label">Username</label>
                        <input type="text" class="form-control @error('api_username') is-invalid @enderror"
                            name="api_username" id="api_username" value="{{ old('api_username', $username) }}"
                            aria-describedby="api_usernameHelp">
                        <div id="api_usernameHelp" class="form-text">Username akan berubah2 mengikuti waktu server (Contoh:
                            tesprogrammer010226C14)</div>
                        @error('api_username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="api_password" class="form-label">Password</label>
                        <input type="text" class="form-control @error('api_password') is-invalid @enderror"
                            name="api_password" id="api_password" value="{{ old('api_password', $password) }}"
                            aria-describedby="api_passwordHelp">
                        <div id="api_passwordHelp" class="form-text">bisacoding-tanggal sekarang (angka)-bulan sekarang
                            (angka)-2 digit terakhir tahun sekarang (angka), Contoh : bisacoding-12-20-21</div>
                        @error('api_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    {{-- <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Pengaturan API</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('settings.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="api_username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                <input type="text" name="api_username" id="api_username" value="{{ old('api_username', $username) }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
            </div>

            <div class="mb-6">
                <label for="api_password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="text" name="api_password" id="api_password" value="{{ old('api_password', $password) }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
                <p class="text-xs text-gray-500 mt-1">Masukkan password plain text (akan di-MD5 otomatis oleh sistem
                    saat request API).</p>
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ url('/') }}" class="text-blue-500 hover:text-blue-800 text-sm">
                    &larr; Kembali ke Home
                </a>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Simpan
                </button>
            </div>
        </form>
    </div> --}}
@endsection
