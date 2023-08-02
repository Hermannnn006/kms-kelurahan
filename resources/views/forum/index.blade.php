@extends('layouts.main')

@section('body')

<div class="container py-4">
  <div class="p-4 rounded border">
    <h3>Forum</h3>
    <div class="mb-3">
        <label for="judul" class="form-label">Judul Forum</label>
        <input type="text" class="form-control" id="judul" placeholder="input judul forum">
      </div>
      <div class="form-floating mb-3">
        <textarea class="form-control" placeholder="Deskripsi" id="deskripsi" style="height: 100px"></textarea>
        <label for="deskripsi">Deskripsi</label>
      </div>
      <button type="button" class="btn btn-success mb-3">Buat Forum</button>
  </div>
</div>

@endsection