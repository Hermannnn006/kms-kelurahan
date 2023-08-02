@extends('layouts.main')

@section('body')
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-lg-8">
            <div class="card-box">
                <form method="post" action="/pegawai/{{ $user->id }}" class="mb-5" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3 text-center">
                        <div>
                            <input type="hidden" name="oldImage" value="{{ $user->foto }}">
                            <img src="{{ asset('storage/' . $user->foto); }}" class="rounded-circle mb-2" id="img" style="height: 150px">
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
                    <div class="col-lg-8 mx-auto">
                    <div class="form-outline mb-4">
                        <label class="form-label">Nama</label>
                          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror form-control-lg" autofocus required value="{{ old('name', $user->name) }}"/>
                          @error('name')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div class="form-outline mb-4">
                        <label class="form-label">NIP</label>
                          <input type="number" name="nip" class="form-control @error('nip') is-invalid @enderror form-control-lg" required value="{{ old('nip', $user->nip) }}"/>
                          @error('nip')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                        <div class="form-outline mb-4">
                        <label class="form-label">Email</label>
                          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror form-control-lg" required value="{{ old('email', $user->email) }}"/>
                          @error('email')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                        <div class="pt-1 mb-4 text-center">
                          <button class="btn btn-primary btn-lg btn-block" type="submit">Edit User</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection