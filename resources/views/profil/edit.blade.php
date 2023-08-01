@extends('layouts.main')

@section('body')
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-lg-4">
            <div class="text-center card-box">
                
                <form method="post" action="/profil" class="mb-5" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <div>
                            <input type="hidden" name="oldImage" value="{{ $user->foto }}">
                            <img src="{{ $user->foto }}" class="rounded-circle mb-2" id="img" style="height: 150px">
                        </div>
                        <div class="btn btn-primary btn-rounded">
                            <label class="form-label text-white m-1" for="input">Unggah foto</label>
                            <input type="file" class="form-control d-none @error('foto') is-invalid @enderror" id="input" name="foto" />
                        </div>
                        @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection