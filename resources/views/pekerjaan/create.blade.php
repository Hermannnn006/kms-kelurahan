@extends('layouts.main')
@section('body')

<div class="container py-4">
    <div class="p-4 rounded bg-emerald col-md-8 border">
    <h3>Form input pekerjaan</h3>
        <form method="post" action="/pekerjaan" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" required autofocus value="{{ old('pekerjaan') }}">
                @error('pekerjaan')
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