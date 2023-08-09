@extends('dashboard.layouts.main')
@section('body')

<div class="container py-4">
    <div class="p-4 rounded bg-white">
        <h3>Form edit pengetahuan</h3>
        <form method="post" action="/dashboard/pengetahuan/{{ $pengetahuan->id }}" id="form-pengetahuan" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" required autofocus value="{{ old('judul', $pengetahuan->judul) }}">
                @error('judul')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
                <div class="form-group mb-3">
                    <input type="hidden" name="oldFile" value="{{ $pengetahuan->file }}">
                    @if($pengetahuan->file)
                        <p>{{ $pengetahuan->file }}</p>
                    @endif
                    <input name="file" type="file" class="form-control">
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