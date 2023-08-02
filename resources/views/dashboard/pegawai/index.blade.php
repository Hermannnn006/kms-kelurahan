@extends('dashboard.layouts.main')
@section('body')

<div class="container py-4">
    <div class="p-4 rounded bg-white">
        <h3>Data Pegawai</h3>
        <a href="/dashboard/pegawai/create" class="btn btn-primary mb-3"><i class="fa-solid fa-plus"></i> Pegawai</a>
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session()->has('danger'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('danger') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        <div class="table-responsive mx-auto">
            <table class="table table-sm">
              <thead>
                <tr class="table-primary">
                  <th>#</th>
                  <th>Foto</th>
                  <th>Nama</th>
                  <th>NIP</th>
                  <th>Email</th>
                  <th class="col-2">Action</th>
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
                  <td>
                    <a href="/dashboard/pegawai/{{ $pegawai->id }}/edit" class="badge bg-warning"><i class="bi bi-pen"></i></a>
                    <form action="/dashboard/pegawai/{{ $pegawai->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onClick="return confirm('Yakin ingin menghapus data pegawai?')"><i class="bi bi-eraser-fill"></i></button>
                      </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

    </div> 
</div>

@endsection