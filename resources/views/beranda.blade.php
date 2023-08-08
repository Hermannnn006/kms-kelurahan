@extends('layouts.main')

@section('body')

    <div class="d-flex align-items-center bg-emerald">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Knowledge Management System</h1>
          <p>Knowledge Management System adalah sistem yang digunakan untuk mengidentifikasi, mengumpulkan, menyimpan, menganalisis, dan membagikan pengetahuan di dalam suatu organisasi.</p>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="/pengetahuan" class="btn btn-success rounded px-2">Mulai</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="/img/pns.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
    </div>

    <div class="about mt-5">
        <div class="container">
          <div class="section-title">
            <h2 class="text-center">Apa Itu KMS</h2>
            <p class="text-justify">Knowledge management atau manajemen pengetahuan adalah suatu sistem dan proses yang terformat dan terarah yang dikembangkan dalam suatu organisasi untuk menciptakan, mencari, mengumpulkan, memilih, mengorganisir, mendokumentasikan, menyimpan, memelihara dan menyebarkan informasi dan pengetahuan dalam rangka mendukung kebutuhan masing-masing individu di dalam perusahaan sehingga dapat digunakan dalam pengambilan keputusan yang baik untuk mendukung strategi bisnis.</p>
        </div>
    </div>
</div>
@endsection