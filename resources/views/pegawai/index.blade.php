@extends('layouts.main')

@section('body')
  <div class="container">
    <div class="mt-3 d-flex justify-content-center">
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session()->has('danger'))
            <div class="alert alert-danger alert-dismissible fade show col-lg-8" role="alert">
              {{ session('danger') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <h3 class="text-center py-3">Data Pegawai Kelurah Pulo Brayan Kota</h1>
    <div class="table-responsive col-lg-8 mx-auto">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>NIP</th>
              <th>Email</th>
              <th>Foto</th>
              <th class="col-2">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($pegawais as $pegawai)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $pegawai->name }}</td>
              <td>{{ $pegawai->nip }}</td>
              <td>{{ $pegawai->email }}</td>
              <td><img src="{{ asset('storage/'. $pegawai->foto) }}" alt="img" class="img-fluid img-thumbnail"></td>
              <td>
                <a href="/pegawai/{{ $pegawai->id }}/edit" class="badge bg-warning"><i class="bi bi-pen"></i></a>
                <form action="/pegawai/{{ $pegawai->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onClick="return confirm('Yakin Ingin Menghapus Data User?')"><i class="bi bi-eraser-fill"></i></button>
                  </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
</div>

@endsection