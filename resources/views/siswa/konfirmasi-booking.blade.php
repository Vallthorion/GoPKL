@extends('layouts.app')

@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

:root{
  --blue:#1E3A5F; --blue-mid:#2C5282; --blue-light:#EBF4FF;
  --teal:#2A9D8F; --teal-light:#E6F7F5;
  --white:#FFFFFF; --gray-50:#F8FAFC; --gray-100:#F0F4F8;
  --gray-200:#E2E8F0; --gray-300:#CBD5E1; --gray-400:#94A3B8;
  --gray-500:#64748B; --gray-600:#475569; --gray-800:#1E293B;
  --red:#DC2626; --red-light:#FFF5F5;
  --green:#16A34A; --green-light:#F0FDF4;
  --font:'Plus Jakarta Sans',sans-serif;
  --radius:10px; --radius-lg:16px;
  --shadow:0 1px 3px rgba(30,58,95,.06),0 4px 12px rgba(30,58,95,.05);
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
body{font-family:var(--font);background:var(--gray-50);color:var(--gray-800);min-height:100vh;overflow-x:hidden}
.wrapper{display:flex;min-height:100vh;width:100%}

/* SIDEBAR */
.sidebar{width:240px;flex-shrink:0;background:var(--white);border-right:1.5px solid var(--gray-200);display:flex;flex-direction:column;position:sticky;top:0;height:100vh;overflow-y:auto}
.sidebar-logo-wrap{padding:20px 20px 0;border-bottom:1.5px solid var(--gray-200)}
.logo{display:flex;align-items:center;gap:9px;text-decoration:none;padding-bottom:18px}
.logo-icon{width:32px;height:32px;background:var(--blue);border-radius:8px;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:13px;color:var(--white);flex-shrink:0}
.logo-name{font-weight:800;font-size:16px;color:var(--blue)}.logo-name span{color:var(--teal)}
.student-profile{margin:16px 16px 20px;background:var(--white);border:1.5px solid var(--gray-200);border-radius:14px;padding:16px;display:flex;flex-direction:column;gap:12px;box-shadow:0 1px 3px rgba(30,58,95,.06)}
.sp-header{display:flex;align-items:center;gap:12px}
.sp-avatar{width:42px;height:42px;border-radius:14px;flex-shrink:0;background:linear-gradient(135deg,var(--blue),var(--teal));display:flex;align-items:center;justify-content:center;font-weight:800;font-size:15px;color:var(--white)}
.sp-info{flex:1}
.sp-name{font-size:13px;font-weight:800;color:var(--blue)}.sp-kelas{font-size:11px;color:var(--gray-400);margin-top:2px}
.sp-divider{height:1px;background:var(--gray-200)}
.sp-data{display:grid;grid-template-columns:1fr 1fr;gap:12px}
.sp-item{padding:8px 0}
.sp-label{font-size:9px;font-weight:700;color:var(--gray-400);text-transform:uppercase;letter-spacing:.04em;margin-bottom:3px}
.sp-value{font-size:12px;font-weight:700;color:var(--blue)}
.nav-section{padding:0 12px}
.nav-label{font-size:10px;font-weight:700;letter-spacing:.09em;color:var(--gray-400);text-transform:uppercase;padding:0 6px;margin-bottom:5px;margin-top:16px;display:block}
.menu{display:flex;flex-direction:column;gap:1px;margin-bottom:8px}
.menu a{display:flex;align-items:center;gap:10px;padding:9px 10px;border-radius:9px;color:var(--gray-600);text-decoration:none;font-size:13px;font-weight:500;transition:all .15s}
.menu a:hover{background:var(--gray-100);color:var(--gray-800)}
.menu a.active{background:var(--blue-light);color:var(--blue);font-weight:700}
.menu a i{width:15px;text-align:center;font-size:12px;flex-shrink:0}
.menu-divider{height:1.5px;background:var(--gray-200);margin:10px 12px}
.sidebar-footer{margin-top:auto;padding:14px 12px;border-top:1.5px solid var(--gray-200)}
.logout-btn{width:100%;display:flex;align-items:center;gap:9px;padding:9px 10px;border-radius:9px;background:var(--red-light);border:1.5px solid #FED7D7;color:var(--red);font-size:13px;font-weight:600;cursor:pointer;font-family:var(--font);transition:all .15s}
.logout-btn:hover{background:#FED7D7}

/* MAIN */
.main{flex:1;min-width:0;background:var(--gray-50)}
.main-inner{padding:32px 36px 60px;max-width:1000px}

/* TOPBAR */
.topbar{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:28px;gap:20px;padding-bottom:24px;border-bottom:1.5px solid var(--gray-200)}
.topbar-tag{display:inline-flex;align-items:center;gap:7px;background:var(--blue-light);color:var(--blue);font-size:11px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:4px 12px;border-radius:100px;margin-bottom:10px}
.topbar-title{font-size:clamp(22px,2.5vw,28px);font-weight:800;color:var(--blue);letter-spacing:-.5px}
.topbar-sub{font-size:14px;color:var(--gray-600);margin-top:4px}

/* CARD */
.card{background:var(--white);border:1.5px solid var(--gray-200);border-radius:var(--radius-lg);overflow:hidden;box-shadow:var(--shadow);margin-bottom:24px}

.card-header-confirm{
  background:linear-gradient(135deg,var(--blue),var(--blue-mid));
  color:var(--white);
  padding:24px;
  display:flex;align-items:center;gap:14px;
}
.card-header-confirm i{font-size:24px;flex-shrink:0}
.card-header-confirm-text h3{font-size:18px;font-weight:800;margin:0;line-height:1.2}
.card-header-confirm-text p{font-size:13px;opacity:.92;margin:4px 0 0 0;font-weight:500}

.card-body{padding:28px}

/* SECTION */
.confirmation-section{margin-bottom:24px}
.confirmation-section:last-of-type{margin-bottom:0}

.section-title{
  display:flex;align-items:center;gap:10px;
  font-size:16px;font-weight:800;color:var(--blue);
  margin-bottom:14px;
  padding-bottom:12px;
  border-bottom:1.5px solid var(--gray-200);
}
.section-title i{font-size:18px;flex-shrink:0}

.info-grid{
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:16px;
}
.info-item{padding:12px;background:var(--gray-50);border-radius:var(--radius);border:1.5px solid var(--gray-200)}
.info-label{font-size:11px;font-weight:700;color:var(--gray-400);text-transform:uppercase;letter-spacing:.05em;margin-bottom:6px;display:block}
.info-value{font-size:14px;font-weight:600;color:var(--gray-800);line-height:1.4}

.info-item.full{grid-column:1/-1}

/* DIVIDER */
.section-divider{
  height:2px;
  background:linear-gradient(90deg,transparent,var(--gray-200),transparent);
  margin:24px 0;
}

/* COMPANY SECTION */
.company-section-title{
  font-size:18px;font-weight:800;color:var(--blue);
  margin-bottom:18px;
  padding-bottom:12px;
  border-bottom:1.5px solid var(--gray-200);
}

.company-info-grid{
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:16px;
  margin-bottom:18px;
}
.company-info-item{
  padding:14px;
  background:var(--teal-light);
  border-radius:var(--radius);
  border:1.5px solid #C7F0E8;
}
.company-info-item .info-label{color:var(--teal)}
.company-info-item .info-value{color:var(--blue)}

/* BUTTONS */
.button-group{
  display:flex;
  gap:14px;
  margin-top:32px;
  justify-content:flex-end;
}

.btn-confirm{
  display:inline-flex;
  align-items:center;
  justify-content:center;
  gap:10px;
  padding:14px 32px;
  border-radius:var(--radius);
  font-family:var(--font);
  font-size:14px;
  font-weight:700;
  border:none;
  cursor:pointer;
  transition:all .2s;
  text-decoration:none;
  min-width:160px;
}

.btn-confirm.primary{
  background:linear-gradient(135deg,var(--blue),var(--blue-mid));
  color:var(--white);
  box-shadow:0 4px 12px rgba(30,58,95,.15);
}
.btn-confirm.primary:hover{
  transform:translateY(-2px);
  box-shadow:0 8px 20px rgba(30,58,95,.2);
}

.btn-confirm.secondary{
  background:var(--gray-200);
  color:var(--gray-800);
  border:1.5px solid var(--gray-300);
}
.btn-confirm.secondary:hover{
  background:var(--gray-100);
  border-color:var(--gray-400);
}

/* TOAST */
.toast-error{
  position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);
  z-index:9999;
  background:var(--red-light);border:1.5px solid #FED7D7;
  color:var(--red);padding:20px 28px;border-radius:var(--radius-lg);
  box-shadow:0 8px 32px rgba(0,0,0,.12);
  font-weight:700;font-size:15px;
  display:flex;align-items:center;gap:12px;min-width:300px;
}

/* JURUSAN BADGES */
.jurusan-badges{display:flex;flex-wrap:wrap;gap:8px;margin-top:8px}
.badge-jurusan{display:inline-flex;align-items:center;gap:6px;background:var(--teal-light);color:var(--teal);padding:6px 12px;border-radius:6px;font-size:12px;font-weight:700;border:1.5px solid rgba(42,157,143,.2)}
.badge-jurusan i{font-size:11px}

/* TABLET */
@media(max-width:900px){
  .sidebar{display:none}
  .main-inner{padding:20px 16px 40px}
  .info-grid{grid-template-columns:1fr}
  .company-info-grid{grid-template-columns:1fr}
  .topbar{flex-direction:column}
}

/* MOBILE LANDSCAPE */
@media(max-width:768px){
  .main-inner{padding:16px 14px 32px}
  .topbar-title{font-size:clamp(18px,5vw,24px)}
  .topbar-sub{font-size:13px}
  .topbar{margin-bottom:20px;padding-bottom:16px}
  .card{border-radius:var(--radius)}
  .card-header-confirm{padding:16px;gap:12px}
  .card-header-confirm i{font-size:20px}
  .card-header-confirm-text h3{font-size:16px}
  .card-header-confirm-text p{font-size:12px}
  .card-body{padding:18px}
  .confirmation-section{margin-bottom:16px}
  .section-title{font-size:14px;margin-bottom:10px;padding-bottom:8px}
  .section-title i{font-size:16px}
  .company-section-title{font-size:16px;margin-bottom:12px;padding-bottom:8px}
  .info-grid{gap:12px}
  .company-info-grid{gap:12px}
  .info-item{padding:10px;border-radius:var(--radius)}
  .company-info-item{padding:12px}
  .info-label{font-size:10px;margin-bottom:4px}
  .info-value{font-size:13px}
  .badge-jurusan{font-size:11px;padding:4px 10px;gap:4px}
  .button-group{gap:10px;margin-top:20px}
  .btn-confirm{padding:10px 16px;font-size:12px;gap:6px;min-width:100px}
}

/* MOBILE PORTRAIT */
@media(max-width:480px){
  .main-inner{padding:12px 12px 28px}
  
  /* Topbar */
  .topbar{margin-bottom:14px;padding-bottom:12px;gap:8px}
  .topbar-tag{font-size:9px;padding:2px 8px;margin-bottom:4px}
  .topbar-title{font-size:clamp(16px,4vw,20px);margin-bottom:2px}
  .topbar-sub{font-size:12px}
  
  /* Card */
  .card{border-radius:8px;border:1px solid var(--gray-200)}
  .card-header-confirm{padding:12px;gap:8px;border-radius:8px 8px 0 0}
  .card-header-confirm i{font-size:16px}
  .card-header-confirm-text h3{font-size:13px}
  .card-header-confirm-text p{font-size:10px}
  .card-body{padding:12px}
  
  /* Sections */
  .confirmation-section{margin-bottom:12px}
  .section-title{font-size:12px;margin-bottom:8px;padding-bottom:6px;gap:6px}
  .section-title i{font-size:14px}
  .company-section-title{font-size:14px;margin-bottom:10px;padding-bottom:6px}
  
  /* Grid */
  .info-grid{grid-template-columns:1fr;gap:8px}
  .company-info-grid{grid-template-columns:1fr;gap:8px}
  .info-item{padding:8px;border-radius:6px;border:1px solid var(--gray-200)}
  .company-info-item{padding:10px;border-radius:6px;border:1px solid rgba(42,157,143,.3)}
  .info-label{font-size:9px;margin-bottom:2px}
  .info-value{font-size:12px;line-height:1.3}
  
  /* Divider */
  .section-divider{margin:10px 0;height:1px}
  
  /* Badges */
  .jurusan-badges{gap:6px}
  .badge-jurusan{font-size:10px;padding:3px 8px;gap:3px;display:flex;flex-wrap:wrap}
  .badge-jurusan i{font-size:9px}
  
  /* Buttons */
  .button-group{flex-direction:column;gap:8px;margin-top:12px;justify-content:stretch}
  .btn-confirm{width:100%;padding:9px 12px;font-size:11px;gap:6px;min-width:auto}
}
</style>

@if(session('error'))
    <div class="toast-error">
        <i class="fa-solid fa-circle-exclamation" style="font-size:20px;flex-shrink:0;"></i>
        <span>{{ session('error') }}</span>
    </div>
    <script>
        setTimeout(function() {
            window.location.href = "{{ route('siswa.dashboard') }}";
        }, 2500);
    </script>
@endif

<div class="wrapper">
  <!-- SIDEBAR -->
  <div class="sidebar">
    <div class="sidebar-logo-wrap">
      <a href="{{ route('siswa.dashboard') }}" class="logo">
        <div class="logo-icon">G</div>
        <span class="logo-name">GO<span>PKL</span></span>
      </a>
    </div>

    @php
      $initials = collect(explode(' ', $siswa->nama))->map(fn($w) => strtoupper(substr($w,0,1)))->take(2)->join('');
    @endphp
    <div class="student-profile">
      <div class="sp-header">
        <div class="sp-avatar">{{ $initials }}</div>
        <div class="sp-info">
          <div class="sp-name">{{ $siswa->nama }}</div>
          <div class="sp-kelas">{{ $siswa->kelas }}</div>
        </div>
      </div>
      <div class="sp-divider"></div>
      <div class="sp-data">
        <div class="sp-item">
          <div class="sp-label">NIS</div>
          <div class="sp-value">{{ $siswa->nis }}</div>
        </div>
        <div class="sp-item">
          <div class="sp-label">Jurusan</div>
          <div class="sp-value">{{ $siswa->jurusan }}</div>
        </div>
      </div>
    </div>

    <div class="nav-section">
      <span class="nav-label">Menu</span>
      <div class="menu">
        <a href="{{ route('siswa.dashboard') }}" class="{{ request()->routeIs('siswa.dashboard') ? 'active' : '' }}">
          <i class="fa-solid fa-chart-pie"></i> Dashboard
        </a>
        <a href="{{ route('siswa.booking.index') }}" class="{{ request()->routeIs('siswa.booking.index') ? 'active' : '' }}">
          <i class="fa-solid fa-magnifying-glass"></i> Cari PKL
        </a>
        <a href="{{ route('siswa.booking.status') }}" class="{{ request()->routeIs('siswa.booking.status') ? 'active' : '' }}">
          <i class="fa-solid fa-file-circle-check"></i> Status PKL
        </a>
      </div>
    </div>

    <div class="menu-divider"></div>

    

    <div class="sidebar-footer">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">
          <i class="fa-solid fa-right-from-bracket"></i> Keluar
        </button>
      </form>
    </div>
  </div>

  <!-- MAIN -->
  <main class="main">
    <div class="main-inner">
      <!-- TOPBAR -->
      <div class="topbar">
        <div>
          <span class="topbar-tag"><i class="fa-solid fa-check"></i> Konfirmasi</span>
          <h1 class="topbar-title">Konfirmasi Booking <span style="color:var(--teal)">PKL</span></h1>
          <p class="topbar-sub">Pastikan seluruh data sudah benar sebelum mengajukan booking</p>
        </div>
      </div>

      <!-- CONFIRMATION CARD -->
      <div class="card">
        <div class="card-header-confirm">
          <i class="fa-solid fa-clipboard-check"></i>
          <div class="card-header-confirm-text">
            <h3>Verifikasi Data Booking</h3>
            <p>Silakan cek kembali semua data di bawah ini</p>
          </div>
        </div>

        <form action="{{ route('siswa.booking.ajukan', $perusahaan->id) }}" method="POST">
          @csrf
          <div class="card-body">
            <!-- Data Siswa Section -->
            <div class="confirmation-section">
              <div class="section-title">
                <i class="fa-solid fa-user-graduate"></i>
                Data Diri Siswa
              </div>
              <div class="info-grid">
                <div class="info-item">
                  <span class="info-label">NIS</span>
                  <div class="info-value">{{ $siswa->nis ?? '-' }}</div>
                </div>
                <div class="info-item">
                  <span class="info-label">Nama</span>
                  <div class="info-value">{{ $siswa->nama ?? (Auth::user()->name ?? '-') }}</div>
                </div>
                <div class="info-item">
                  <span class="info-label">Kelas</span>
                  <div class="info-value">{{ $siswa->kelas ?? '-' }}</div>
                </div>
                <div class="info-item">
                  <span class="info-label">Jurusan</span>
                  <div class="info-value">{{ $siswa->jurusan ?? '-' }}</div>
                </div>
              </div>
            </div>

            <div class="section-divider"></div>

            <!-- Data Perusahaan Section -->
            <div class="confirmation-section">
              <div class="company-section-title">
                <i class="fa-solid fa-building" style="margin-right:10px;"></i>{{ $perusahaan->nama }}
              </div>
              <div class="info-item full">
                <span class="info-label"><i class="fa-solid fa-location-dot" style="color:var(--teal);margin-right:6px"></i>Alamat</span>
                <div class="info-value">{{ $perusahaan->alamat }}</div>
              </div>
              <div class="company-info-grid">
                <div class="company-info-item">
                  <span class="info-label">Bidang</span>
                  <div class="info-value">{{ $perusahaan->bidang }}</div>
                </div>
                <div class="company-info-item">
                  <span class="info-label"><i class="fa-solid fa-graduation-cap" style="color:var(--teal);margin-right:6px"></i>Jurusan Dibutuhkan</span>
                  <div class="jurusan-badges">
                    @php
                      $jurusans = is_array($perusahaan->jurusan_dibutuhkan) 
                        ? $perusahaan->jurusan_dibutuhkan 
                        : [$perusahaan->jurusan_dibutuhkan];
                    @endphp
                    @foreach($jurusans as $jurusan)
                      <span class="badge-jurusan">
                        <i class="fa-solid fa-check-circle"></i> 
                        {{ $jurusan }}
                      </span>
                    @endforeach
                  </div>
                </div>
                <div class="company-info-item">
                  <span class="info-label">Kuota Tersedia</span>
                  <div class="info-value">{{ $perusahaan->kuota }} Siswa</div>
                </div>
                <div class="company-info-item">
                  <span class="info-label">Syarat & Ketentuan</span>
                  <div class="info-value">{{ $perusahaan->syarat }}</div>
                </div>
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="button-group">
              <a href="{{ route('siswa.booking.index') }}" class="btn-confirm secondary">
                <i class="fa-solid fa-xmark"></i> Batal
              </a>
              <button type="submit" class="btn-confirm primary">
                <i class="fa-solid fa-circle-check"></i> Konfirmasi Booking
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </main>
</div>

@endsection
