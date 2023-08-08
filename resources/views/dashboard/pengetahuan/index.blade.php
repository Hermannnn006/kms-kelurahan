@extends('dashboard.layouts.main')
@section('body')

<div class="container py-4">
    <div class="p-4 rounded bg-white">
        <h3>Data Pengetahuan</h3>
        <a href="/dashboard/pengetahuan/create" class="btn btn-primary mb-3"><i class="fa-solid fa-plus"></i> Pengetahuan</a>
        <div class="table-responsive mx-auto">
            <table class="table table-sm">
              <thead>
                <tr class="table-primary">
                  <th>#</th>
                  <th>Pemilik</th>
                  <th>Judul</th>
                  <th>Tanggal</th>
                  <th>View</th>
                  <th class="col-2">Action</th>
                </tr>
              </thead>
              <tbody>
                @if($pengetahuans->count())
                @foreach($pengetahuans as $pengetahuan)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $pengetahuan->pengetahuan_user->name }}</td>
                  <td>{{ $pengetahuan->judul }}</td>
                  <td>{{ \Carbon\Carbon::parse($pengetahuan->created_at)->format('d-m-Y')}}</td>
                  <td>{{ $pengetahuan->view }}</td>
                  <td>
                    <form method="post" action="/increment-pengetahuan-view" class="d-inline">
                      @csrf
                      <input type="hidden" value="{{ $pengetahuan->id }}" name="pengetahuan_id">
                      <button class="border-0 badge bg-primary" type="submit"><i class="bi bi-eye"></i></button>
                    </form>
                    {{-- <a href="/dashboard/pengetahuan/{{ $pengetahuan->id }}" class="badge bg-primary"><i class="fa-regular fa-eye"></i></a> --}}
                    <a href="/dashboard/pengetahuan/{{ $pengetahuan->id }}/edit" class="badge bg-warning"><i class="bi bi-pen"></i></a>
                    <form action="/dashboard/pengetahuan/{{ $pengetahuan->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onClick="return confirm('Yakin ingin menghapus data pengetahuan?')"><i class="bi bi-eraser-fill"></i></button>
                      </form>
                  </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6" class="text-center">Belum ada data</td>
                </tr>
                @endif
              </tbody>
            </table>
          </div>
    </div> 
</div>

@endsection