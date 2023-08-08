@extends('layouts.main')

@section('body')

<div class="container py-4">
  <div class="p-4 rounded border">
      <h3 class="mb-3 text-center">Data Pegawai Kelurahan Pulo Brayan Kota</h3>
      <div class="table-responsive mx-auto">
          <table class="table table-sm">
            <thead>
              <tr class="table-info">
                <th>#</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>
              @foreach($pegawais as $pegawai)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img src="{{ asset('storage/'. $pegawai->foto) }}" alt="img" class="img-fluid img-thumbnail"></td>
                <td>{{ $pegawai->name }}</td>
                <td>{{ $pegawai->nip }}</td>
                <td>{{ $pegawai->email }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center">
          {{ $pegawais->links() }}
      </div>
  </div> 
</div>

@endsection