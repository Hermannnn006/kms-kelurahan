@extends('dashboard.layouts.main')
@section('body')
    <div class="container px-4">
        <h1 class="mt-4">Dashboard</h1>
        <div class="d-flex flex-wrap flex-md-wrap gap-3">
            <div class="p-3 bg-primary rounded col-12 col-md-3">
                <div><h5 class="text-white">Akun Terdaftar</h5></div>
                <hr>
                <div><p class="text-white">Jumlah {{ $sum_user }}</p></div>
            </div>
            <div class="p-3 bg-warning rounded col-12 col-md-3">
                <div><h5 class="text-white">Pengetahuan</h5></div>
                <hr>
                <div><p class="text-white">Data Pengetahuan {{ $sum_pengetahuan }}</p></div>
            </div>
        </div>
        <div class="d-flex flex-column flex-md-row gap-1">
        <div class="col-12 col-md-6 bg-white mt-4">
            <canvas id="user-chart"></canvas>
        </div>
        <div class="col-12 col-md-6 bg-white mt-4">
            <canvas id="pengetahuan-chart"></canvas>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('user-chart').getContext('2d');
        var userChart = new Chart(ctx,{
            type: 'bar',
            data:{
                labels: {!! json_encode($labels) !!},
                datasets: {!! json_encode($datasets) !!}
            },
        });

        var ctx = document.getElementById('pengetahuan-chart').getContext('2d');
        var pengetahuanChart = new Chart(ctx,{
            type: 'line',
            data:{
                labels: {!! json_encode($labels_pengetahuan) !!},
                datasets: {!! json_encode($datasets_pengetahuan) !!}
            },
        });
    </script>
@endsection