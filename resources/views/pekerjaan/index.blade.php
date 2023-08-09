@extends('layouts.main')
@section('body')
<div class="container py-4">
    <div class="p-4 rounded bg-white">
        <div class="section-title">
            <h2 class="text-center">Data Pekerjaan</h2>
        </div>
        @can('admin')    
            <a href="/pekerjaan/create" class="btn btn-primary mb-3"><i class="bi bi-calendar2-plus"></i> Pekerjaan</a>
        @endcan
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
                  <th>No</th>
                  <th>Pekerjaan</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  @can('admin') 
                  <th rowspan="2">Action</th>
                  @endcan
                </tr>
              </thead>
              <tbody>
                @if ($pekerjaans->count())
                @foreach($pekerjaans as $pekerjaan)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $pekerjaan->pekerjaan }}</td>
                  <td>{{ \Carbon\Carbon::parse($pekerjaan->created_at)->format('d-m-Y')}}</td> 
                  @if (auth()->user()->level == 'admin')    
                  <td>
                    <form action="/pekerjaan/{{ $pekerjaan->id }}" method="post" class="row">
                        @csrf
                        @method('put')
                          <div class="form-group col-8">
                              <select class="form-control" name="status">
                                  <option value="belum selesai" @selected($pekerjaan->status == 'belum selesai')>Belum Selesai</option>
                                  <option value="selesai" @selected($pekerjaan->status == 'selesai')>Selesai</option>
                              </select>
                          </div>
                      </td>
                      <td>
                        <div class="form-group d-inline">
                            <button class="btn btn-primary "><i class="bi bi-folder-symlink"></i></button>
                        </div>
                    </form>
                    <form action="/pekerjaan/{{ $pekerjaan->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <div class="form-group d-inline">
                            <button class="btn btn-danger " onClick="return confirm('Yakin ingin menghapus data?')"><i class="bi bi-eraser-fill"></i></button>
                        </div>
                    </form>
                 </td>
                 @else
                    <td>{{ $pekerjaan->status }}</td>
                 @endif
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5" class="text-center">Belum ada data</td>
                </tr>
                @endif
              </tbody>
            </table>
          </div>
    </div> 
</div>

@endsection