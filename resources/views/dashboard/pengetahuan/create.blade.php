@extends('dashboard.layouts.main')
@section('body')

<div class="container py-4">
    <div class="p-4 rounded bg-white">
        <h3>Form input pengetahuan</h3>
        <form method="post" action="/dashboard/pengetahuan" id="form-pengetahuan" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" autofocus value="{{ old('judul') }}">
                @error('judul')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
                <div class="form-group mb-3">
                    <input name="file" id="file" type="file" class="form-control @error('file') is-invalid @enderror">
                    @error('file')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

@endsection