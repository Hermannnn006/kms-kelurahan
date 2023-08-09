@extends('layouts.main')
@section('body')
<div class="container py-4">
    <div class="p-4 rounded bg-white">
        <div class="section-title">
            <h2 class="text-center">Data Pengetahuan</h2>
        </div>
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