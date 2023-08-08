@extends('layouts.main')

@section('body')
<div class="container py-4">
    <div class="p-4 rounded border">
        <h3 class="mb-3 text-center">Data Joblist</h3>
        <div class="table-responsive mx-auto col-md-10">
            <table class="table table-sm">
              <thead>
                <tr class="table-info">
                  <th class="p-2">No</th>
                  <th class="p-2">Jabatan</th>
                  <th class="p-2">Pekerjaan</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($joblists as $joblist)           
                <tr>
                  <td class="p-2">{{ $loop->iteration }}</td>
                  <td class="p-2">{{ $joblist->jabatan }}</td>
                  <td class="p-2">{!! $joblist->pekerjaan !!}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
    </div> 
  </div>

@endsection