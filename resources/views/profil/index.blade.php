@extends('layouts.main')

@section('body')
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="p-4 mt-4 border bg-box col-10 col-md-5 rounded">
            <div class="thumb-lg mx-auto"><img src="{{ asset('storage/' . $user->foto); }}" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                    <h4 class="text-center">{{ $user->name }}</h4>
                    <p class="text-center">{{ $user->level }}</p>
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
                <div class="text-center"> 
                    <a href="/profil/{{ $user->id }}/edit" class="btn-edit text-dark">Update Profil</a>
                </div>
        </div>
    </div>
</div>

@endsection