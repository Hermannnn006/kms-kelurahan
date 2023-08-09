@extends('layouts.main')
@section('body')
<div class="container">
    @if ($mime == "application/pdf")
        <div class="container-iframe">
            <iframe class="responsive-iframe" src="{{ asset('storage/' . $pengetahuan->file); }}"></iframe>
        </div>
    @elseif ($mime == "video/mp4")
        <div class="d-flex align-items-center flex-column">
            <div class="section-title">
                <h2 class="mt-3">{{ $pengetahuan->judul }}</h2>
            </div>
            <video id="my-video" class="video-js vjs-theme-city" controls preload="auto" width="740" height="364" poster="https://cdn.wallpapersafari.com/77/89/ms3kKF.jpg" data-setup="{}">
            <source src="{{ asset('storage/' . $pengetahuan->file); }}" type="video/mp4" />
            <p class="vjs-no-js">
                To view this video please enable JavaScript, and consider upgrading to a web browser that
                <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
            </p>
          </video>
        </div>
    @else
        <div class="d-flex align-items-center flex-column">
            <div class="section-title">
                <h2 class="mt-3">{{ $pengetahuan->judul }}</h2>
            </div>
            <div class="bg-secondary">
                <img class="img-fluid p-1" src="{{ asset('storage/' . $pengetahuan->file); }}" alt="">
            </div>
        </div>
    @endif
    <div class="mt-3 text-center">
        <a href="/pengetahuan" class="btn btn-danger">Kembali</a>
    </div>
</div>
@endsection