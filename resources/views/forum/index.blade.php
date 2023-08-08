@extends('layouts.main')

@section('body')
<div class="container py-4">
  {{-- @dd($pertanyaans) --}}
  <div class="p-4 rounded border bg-emerald">
    <div>
      @if(session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
      <h3>Forum</h3>
      <form method="post" action="/forum" class="mb-5">
        @csrf
      <div class="mb-3">
          <label for="pertanyaan" class="form-label">Ketikkan pertanyaanmu</label>
          <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" placeholder="Pertanyaan">
        </div>
        <div class="form-floating mb-3">
          <textarea class="form-control" placeholder="Deskripsi" id="deskripsi" name="deskripsi" style="height: 100px"></textarea>
          <label for="deskripsi">Deskripsi</label>
        </div>
        <button type="submit" class="btn btn-success mb-3">Kirim Pertanyaan</button>
      </form>
      <hr>
    </div>
    <div>
      <h3><i class="bi bi-question-diamond"></i> Daftar Pertanyaan</h3>
      <div class="d-flex flex-wrap gap-3 justify-content-center">
        @if ($pertanyaans->count())
        @foreach ($pertanyaans as $pertanyaan)
          <div class="card mb-3 bg-emerald" style="max-width: 500px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{ asset('storage/' . $pertanyaan->forum_user->foto); }}" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{ $pertanyaan->pertanyaan }}</h5>
                  <p class="card-text">{{ Str::limit($pertanyaan->deskripsi, 30) }}</p>
                    <p class="card-text d-inline me-3"><small class="text-muted">{{ $pertanyaan->forum_user->name }} {{ $pertanyaan->created_at->diffForHumans() }}</small></p>
                    {{-- <a href="/forum/{{ $pertanyaan->id }}" class="text-dark me-3"><i class="bi bi-chat-dots"> {{ $pertanyaan->komentars->count() }}</i></a> --}}
                    <form method="post" action="/increment-forum-view" class="d-inline">
                      @csrf
                      <input type="hidden" value="{{ $pertanyaan->id }}" name="pertanyaan_id">
                      <button class="border-0 bg-transparent" type="submit"><i class="bi bi-chat-dots"> {{ $pertanyaan->komentars->count() }}</i></button>
                    <button class="border-0 bg-transparent" type="submit"><i class="bi bi-eye"></i> {{ $pertanyaan->view }}</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        @else
          <p class="text-center fs-4">Belum ada pertanyaan.</p>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection