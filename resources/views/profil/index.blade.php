@extends('layouts.main')

@section('body')
<div class="container">
{{-- @dd($user) --}}
    <div class="d-flex justify-content-center">
        <div class="col-lg-4">
            <div class="text-center card-box">
                <div class="thumb-lg member-thumb mx-auto"><img src="{{ $user->foto }}" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                <div class="">
                    <h4>{{ $user->name }}</h4>
                    <p>{{ $user->level }}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <div><h6 class="mb-0">NIP</h6></div>
                      <div>{{ $user->nip }}</div>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <div><h6 class="mb-0">Nama</h6></div>
                      <div>{{ $user->name }}</div>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <div><h6 class="mb-0">Email</h6></div>
                      <div>{{ $user->email }}</div>
                </div>
                <hr>
                <a href="/profil/{{ $user->id }}/edit" class="btn-edit text-dark">Ubah Profil</a>
            </div>
        </div>
    </div>
</div>

@endsection