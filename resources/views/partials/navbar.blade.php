<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
      <a class="navbar-brand" href="/"><img src="/img/logo.png" class="logo" alt="logo"/></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav">
          <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Beranda</a>
          </li>
          <li class="nav-item">
          <a class="nav-link {{ Request::is('pegawai*')  ? 'active' : '' }}" href="/pegawai">Pegawai</a>
          </li>
          <li class="nav-item">
          <a class="nav-link {{ Request::is('joblist') ? 'active' : '' }}" href="/joblist">Joblist</a>
          </li>
          <li class="nav-item">
          <a class="nav-link {{ Request::is('pekerjaan*') ? 'active' : '' }}" href="/pekerjaan">Pekerjaan</a>
          </li>
          <li class="nav-item">
          <a class="nav-link {{ Request::is('forum*') ? 'active' : '' }}" href="/forum">Forum</a>
          </li>
          <li class="nav-item">
          <a class="nav-link {{ Request::is('pengetahuan*') ? 'active' : '' }}" href="/pengetahuan">Data Pengetahuan</a>
          </li>
    </ul>
    <ul class="navbar-nav ms-auto">
    @auth
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle bg-warning text-white px-3 py-2 rounded" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{ auth()->user()->name }}
      </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-clipboard-data-fill"></i> 
              Dashboard</a></li>
          <li><a class="dropdown-item" href="/profil"><i class="bi bi-person-circle"></i> 
              My Profil</a></li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <form action="/logout" method="post">
              @csrf
              <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
            </form>
            </li>
        </ul>
      </li>
    @else
    <li class="nav-item bg-warning rounded">
        <a href="/login" class="nav-link {{ Request::is('login') ? 'active' : '' }} text-white"><i class="bi bi-box-arrow-in-right"></i> Login</a>
    </li>
    @endauth
  </ul>
      </div>
    </div>
  </nav>