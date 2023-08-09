@extends('layouts.main')

@section('body')
<div class="container py-4">
    <div class="p-4 rounded border bg-slate">
        <div class="d-flex flex-row">
            <div class="img-thumbnail me-3">
                <img src="{{ asset('storage/' . $pertanyaan->forum_user->foto); }}" class="img-fluid rounded-start" alt="...">
            </div>
            <div>
                <span class="d-block text-capitalize">{{ $pertanyaan->forum_user->name }}</span>
                <small class="text-muted">{{ $pertanyaan->created_at->diffForHumans() }}  <i class="bi bi-eye-fill"></i> {{ $pertanyaan->view }}</small>
                <p class="fs-5 bg-secondary py-1 px-2 text-white rounded text-capitalize">Pertanyaan: {{ $pertanyaan->pertanyaan }}</p>
            </div>
        </div>

        <div class="bg-green p-4 rounded">
            <article>
                {{ $pertanyaan->deskripsi }}
            </article>
        </div>
        <hr>
        <h5>Jawaban</h5>
        @if ($komentar->count())
        @foreach ($komentar as $komen)      
            <small class="bg-success rounded px-2 text-white mb-1">{{ $komen->komentar_user->name }}</small>
            <div class="message-box rounded mb-3 border">
                {{ $komen->komentar }}
            </div>
        @endforeach
        @else
            <p class="text-center fs-4">Belum ada jawaban.</p>
        @endif
    </div>
</div>
<div class="container">
    <div class="p-4 rounded border bg-slate">
        <form action="/kirim-pesan" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Kirim pesan" name="komentar">
                <input type="hidden" name="forum_id" value="{{ $pertanyaan->id }}">
                <button class="btn btn-success" type="submit"><i class="bi bi-send-fill"></i></button>
            </div>
        </form>
    </div>
</div>

@endsection