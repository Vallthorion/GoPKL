@extends('layouts.app')
@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

:root{
  --blue:#1E3A5F; --blue-mid:#2C5282; --blue-light:#EBF4FF;
  --teal:#2A9D8F; --teal-light:#E6F7F5;
  --white:#FFFFFF; --gray-50:#F8FAFC; --gray-100:#F0F4F8;
  --gray-200:#E2E8F0; --gray-400:#94A3B8;
  --gray-600:#475569; --gray-800:#1E293B;
  --green:#16A34A; --green-light:#F0FDF4;
  --red:#DC2626; --red-light:#FFF5F5;
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
.main-inner{padding:32px 36px 60px}

/* TOPBAR */
.topbar{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:28px;gap:20px;padding-bottom:24px;border-bottom:1.5px solid var(--gray-200)}
.topbar-tag{display:inline-flex;align-items:center;gap:7px;background:var(--green-light);color:var(--green);font-size:11px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:4px 12px;border-radius:100px;margin-bottom:10px}
.topbar-title{font-size:clamp(22px,2.5vw,28px);font-weight:800;color:var(--blue);letter-spacing:-.5px}
.topbar-sub{font-size:14px;color:var(--gray-600);margin-top:4px}

/* CARD */
.card{background:var(--white);border:1.5px solid var(--gray-200);border-radius:var(--radius-lg);padding:0;box-shadow:var(--shadow);overflow:hidden}
.card-section{padding:24px;border-bottom:1.5px solid var(--gray-200)}
.card-section:last-child{border-bottom:none}
.section-label{font-size:11px;font-weight:700;color:var(--blue);text-transform:uppercase;letter-spacing:.08em;margin-bottom:12px}
.section-title{font-size:18px;font-weight:800;margin-bottom:16px;color:var(--blue);display:flex;align-items:center;justify-content:space-between}
.info-row{display:flex;justify-content:space-between;align-items:center;padding:12px 0;border-bottom:1.5px solid var(--gray-200)}
.info-row:last-child{border-bottom:none}
.info-label{font-size:13px;color:var(--gray-600);font-weight:500}
.info-value{font-size:14px;font-weight:700;color:var(--gray-800)}
.status-badge{display:inline-flex;align-items:center;gap:6px;background:var(--green-light);border:1.5px solid #BBF7D0;color:var(--green);padding:6px 14px;border-radius:100px;font-size:12px;font-weight:700}

/* INFO CARD STYLES */
.info-card{background:var(--gray-50);border:1.5px solid var(--gray-200);border-radius:var(--radius-lg);padding:18px;margin-bottom:14px}
.info-card-label{font-size:10px;font-weight:700;color:var(--gray-400);text-transform:uppercase;letter-spacing:.06em;margin-bottom:8px;display:block}
.info-card-value{font-size:13px;color:var(--gray-800);line-height:1.6;font-weight:500}
.info-card-icon{font-size:16px;color:var(--teal);margin-right:8px;margin-bottom:4px;display:block}

/* JURUSAN BADGES */
.jurusan-badges{display:flex;flex-wrap:wrap;gap:8px;margin-top:8px}
.badge-jurusan{display:inline-flex;align-items:center;gap:6px;background:var(--blue-light);color:var(--blue);padding:6px 12px;border-radius:6px;font-size:12px;font-weight:700;border:1.5px solid rgba(30,58,95,.15)}
.badge-jurusan i{font-size:11px}

/* STATUS HEADER */
.status-header{text-align:center;background:linear-gradient(135deg,var(--green),#15803d);padding:40px 28px;color:var(--white)}
.status-icon{width:80px;height:80px;border-radius:50%;background:rgba(255,255,255,.2);border:2.5px solid var(--white);display:flex;align-items:center;justify-content:center;font-size:40px;margin:0 auto 16px;color:var(--white)}
.status-title{font-size:24px;font-weight:800;margin-bottom:8px;line-height:1.2}
.status-subtitle{font-size:14px;opacity:.92;font-weight:500}

/* BUTTONS */
.btn-back{display:inline-flex;align-items:center;gap:8px;background:var(--gray-200);color:var(--gray-800);padding:12px 24px;border-radius:var(--radius);font-size:14px;font-weight:700;text-decoration:none;transition:all .2s;border:1.5px solid var(--gray-300)}
.btn-back:hover{background:var(--gray-100)}

/* TABLET */
@media(max-width:900px){
  .sidebar{display:none}
  .main-inner{padding:20px 16px 40px}
  .topbar{flex-direction:column;align-items:flex-start}
}

/* MOBILE LANDSCAPE */
@media(max-width:768px){
  .main-inner{padding:16px 14px 32px}
  .topbar-title{font-size:clamp(18px,5vw,24px)}
  .topbar-sub{font-size:13px}
  .topbar{margin-bottom:18px;padding-bottom:14px}
  .card{border-radius:var(--radius)}
  .status-header{padding:24px 20px}
  .status-icon{width:60px;height:60px;font-size:32px;margin-bottom:12px}
  .status-title{font-size:18px}
  .status-subtitle{font-size:12px}
  .card-section{padding:16px;border-bottom:1px solid var(--gray-200)}
  .section-label{font-size:10px;margin-bottom:8px}
  .section-title{font-size:14px;margin-bottom:12px}
  .info-row{padding:8px 0;font-size:13px}
  .info-label{font-size:12px}
  .info-value{font-size:12px}
  .info-card{padding:12px;margin-bottom:10px;border-radius:var(--radius)}
  .info-card-label{font-size:9px;margin-bottom:6px}
  .info-card-value{font-size:12px;line-height:1.4}
  .badge-jurusan{font-size:11px;padding:4px 10px;gap:4px}
  .btn-back{padding:10px 16px;font-size:12px;gap:6px}
}

/* MOBILE PORTRAIT */
@media(max-width:480px){
  .main-inner{padding:12px 12px 24px}
  
  /* Topbar */
  .topbar{margin-bottom:12px;padding-bottom:10px;gap:6px}
  .topbar-tag{font-size:9px;padding:2px 8px;margin-bottom:4px}
  .topbar-title{font-size:clamp(16px,4vw,20px);margin-bottom:1px;font-weight:700}
  .topbar-sub{font-size:11px}
  
  /* Status Header */
  .status-header{padding:20px 16px;border-radius:8px 8px 0 0}
  .status-icon{width:52px;height:52px;font-size:28px;margin-bottom:10px}
  .status-title{font-size:16px;margin-bottom:6px}
  .status-subtitle{font-size:11px}
  
  /* Card */
  .card{border-radius:8px;border:1px solid var(--gray-200)}
  .card-section{padding:12px;border-bottom:1px solid var(--gray-200)}
  .card-section:last-child{border-bottom:none;padding-bottom:20px}
  
  /* Section */
  .section-label{font-size:8px;margin-bottom:6px;letter-spacing:.02em;font-weight:600}
  .section-title{font-size:12px;margin-bottom:8px;font-weight:700}
  
  /* Info Row */
  .info-row{padding:6px 0;display:flex;justify-content:space-between;align-items:center;border-bottom:1px solid var(--gray-100)}
  .info-row:last-child{border-bottom:none}
  .info-label{font-size:11px;color:var(--gray-600);font-weight:500}
  .info-value{font-size:11px;font-weight:600;color:var(--gray-800);text-align:right}
  
  /* Info Card */
  .info-card{padding:10px;margin-bottom:8px;border-radius:6px;border:1px solid var(--gray-200)}
  .info-card-label{font-size:8px;margin-bottom:4px;letter-spacing:.01em}
  .info-card-value{font-size:11px;line-height:1.3}
  .info-card-icon{font-size:14px;margin-right:6px;margin-bottom:2px}
  
  /* Badge */
  .status-badge{font-size:10px;padding:4px 10px;gap:4px}
  .jurusan-badges{gap:4px}
  .badge-jurusan{font-size:9px;padding:2px 6px;gap:2px}
  .badge-jurusan i{font-size:8px}
  
  /* Button */
  .btn-back{width:100%;justify-content:center;padding:9px 12px;font-size:11px;gap:6px;border:1px solid var(--gray-200)}
}
</style>

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
      <span class="nav-label">Menu Utama</span>
      <div class="menu">
        <a href="{{ route('siswa.dashboard') }}" class="{{ request()->routeIs('siswa.dashboard') ? 'active' : '' }}">
          <i class="fa-solid fa-chart-pie"></i> Dashboard
        </a>
        <a href="{{ route('siswa.booking.index') }}" class="{{ request()->routeIs('siswa.booking.index') ? 'active' : '' }}">
          <i class="fa-solid fa-search"></i> Booking perusahaan
        </a>
        <a href="{{ route('siswa.booking.status') }}" class="{{ request()->routeIs('siswa.booking.status') ? 'active' : '' }}">
          <i class="fa-solid fa-file-circle-check"></i> Status PKL
        </a>
       
      </div>
    </div>

    <div class="menu-divider"></div>

    <div class="sidebar-footer">
      <form action="/logout" method="POST">
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
      @if(session('error'))
        <div style="position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:9999;background:var(--red-light);color:var(--red);padding:24px 32px;border-radius:14px;box-shadow:0 8px 32px rgba(0,0,0,0.12);font-weight:700;font-size:18px;display:flex;align-items:center;gap:12px;min-width:320px;text-align:center;">
          <i class="fa-solid fa-circle-exclamation" style="font-size:28px;"></i>
          <span>{{ session('error') }}</span>
        </div>
        <script>
          setTimeout(function() {
            window.location.href = "{{ route('siswa.dashboard') }}";
          }, 2500);
        </script>
      @endif

      <!-- TOPBAR -->
      <div class="topbar">
        <div>
          <div class="topbar-tag"><i class="fa-solid fa-circle-check"></i> Diterima</div>
          <div class="topbar-title">Status PKL</div>
          <div class="topbar-sub">Lihat status pengajuan dan informasi PKL Anda</div>
        </div>
      </div>

      <!-- CARD -->
      <div class="card">
        <div class="status-header">
          <div class="status-icon">✓</div>
          <div class="status-title">Pengajuan PKL Diterima!</div>
          <div class="status-subtitle">Selamat, Anda telah diterima dan sedang melakukan PKL</div>
        </div>

        <div class="card-section">
          <div class="section-label">Status Pengajuan</div>
          <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:0;">
            <div class="section-title" style="margin:0;">Diterima</div>
            <div class="status-badge"><i class="fa-solid fa-check"></i> AKTIF</div>
          </div>
        </div>

        <div class="card-section">
          <div class="section-label">Lokasi PKL</div>
          <div class="section-title">{{ $approvedBooking->perusahaan->nama_perusahaan }}</div>
          <div class="info-row">
            <div class="info-label">Perusahaan</div>
            <div class="info-value">{{ $approvedBooking->perusahaan->nama_perusahaan }}</div>
          </div>
          <div class="info-row">
            <div class="info-label">Bidang</div>
            <div class="info-value">{{ $approvedBooking->perusahaan->bidang ?? '-' }}</div>
          </div>
        </div>

        <div class="card-section">
          <div class="section-label">Informasi Perusahaan</div>
          <div class="section-title">Kontak dan Alamat</div>
          
          <!-- ALAMAT -->
          <div class="info-card">
            <span class="info-card-label"><i class="fa-solid fa-location-dot" style="color:var(--teal)"></i> Alamat Perusahaan</span>
            <div class="info-card-value">
              {{ $approvedBooking->perusahaan->alamat }}
            </div>
          </div>

          <!-- JURUSAN DIBUTUHKAN -->
          <div class="info-card">
            <span class="info-card-label"><i class="fa-solid fa-graduation-cap" style="color:var(--teal)"></i> Jurusan yang Dibutuhkan</span>
            <div class="jurusan-badges">
              @php
                $jurusansData = $approvedBooking->perusahaan->jurusan_dibutuhkan;
                if (is_array($jurusansData)) {
                  $jurusans = $jurusansData;
                } elseif (is_string($jurusansData)) {
                  $jurusans = json_decode($jurusansData, true);
                  if (!is_array($jurusans)) $jurusans = [];
                } else {
                  $jurusans = [];
                }
              @endphp
              @foreach($jurusans as $jurusan)
                <span class="badge-jurusan">
                  <i class="fa-solid fa-check-circle"></i> 
                  {{ $jurusan }}
                </span>
              @endforeach
            </div>
          </div>

          <!-- DESKRIPSI (jika ada) -->
          @if($approvedBooking->perusahaan->deskripsi)
          <div class="info-card">
            <span class="info-card-label"><i class="fa-solid fa-file-text" style="color:var(--teal)"></i> Deskripsi Perusahaan</span>
            <div class="info-card-value">
              {{ $approvedBooking->perusahaan->deskripsi }}
            </div>
          </div>
          @endif
        </div>

        <div class="card-section">
          <div class="section-label">Status Peserta</div>
          <div class="section-title">Data Peserta PKL</div>
          <div class="info-row">
            <div class="info-label">Nama</div>
            <div class="info-value">{{ $siswa->nama }}</div>
          </div>
          <div class="info-row">
            <div class="info-label">NIS</div>
            <div class="info-value">{{ $siswa->nis }}</div>
          </div>
          <div class="info-row" style="border:none;">
            <div class="info-label">Kelas</div>
            <div class="info-value">{{ $siswa->kelas }}</div>
          </div>
        </div>

        <div class="card-section" style="border:none;padding-top:0;padding-bottom:30px;text-align:center;">
          <a href="{{ route('siswa.dashboard') }}" class="btn-back">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
          </a>
        </div>
      </div>
    </div>
  </main>
</div>
@endsection
