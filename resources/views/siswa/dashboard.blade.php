@extends('layouts.app')
@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

:root{
  --blue:#1E3A5F;
  --blue-mid:#2C5282;
  --blue-light:#EBF4FF;
  --teal:#2A9D8F;
  --teal-light:#E6F7F5;
  --white:#FFFFFF;
  --gray-50:#F8FAFC;
  --gray-100:#F0F4F8;
  --gray-200:#E2E8F0;
  --gray-400:#94A3B8;
  --gray-600:#475569;
  --gray-800:#1E293B;
  --red:#DC2626;
  --red-light:#FFF5F5;
  --font:'Plus Jakarta Sans',sans-serif;
  --radius:10px;
  --radius-lg:16px;
  --shadow:0 1px 3px rgba(30,58,95,0.06),0 4px 12px rgba(30,58,95,0.05);
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
.menu-badge{
  margin-left:auto;font-size:10px;font-weight:700;
  padding:2px 8px;border-radius:100px;
  background:var(--teal-light);color:var(--teal);
}
.menu-divider{height:1.5px;background:var(--gray-200);margin:10px 12px}
.sidebar-footer{margin-top:auto;padding:14px 12px;border-top:1.5px solid var(--gray-200)}
.logout-btn{width:100%;display:flex;align-items:center;gap:9px;padding:9px 10px;border-radius:9px;background:var(--red-light);border:1.5px solid #FED7D7;color:var(--red);font-size:13px;font-weight:600;cursor:pointer;font-family:var(--font);transition:all .15s}
.logout-btn:hover{background:#FED7D7}

/* ── MAIN ── */
.main{flex:1;min-width:0}
.main-inner{padding:32px 36px 60px;max-width:1100px}

/* TOPBAR */
.topbar{
  display:flex;align-items:flex-start;justify-content:space-between;
  margin-bottom:28px;gap:20px;
  padding-bottom:24px;border-bottom:1.5px solid var(--gray-200);
}
.topbar-tag{
  display:inline-flex;align-items:center;gap:7px;
  background:var(--teal-light);color:var(--teal);
  font-size:11px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;
  padding:4px 12px;border-radius:100px;margin-bottom:10px;
}
.topbar-tag::before{content:'';width:5px;height:5px;background:var(--teal);border-radius:50%;animation:pulse 2s infinite}
@keyframes pulse{0%,100%{opacity:1}50%{opacity:.3}}
.topbar-title{font-size:clamp(22px,2.5vw,30px);font-weight:800;color:var(--blue);letter-spacing:-.5px}
.topbar-title .teal{color:var(--teal)}
.topbar-sub{font-size:14px;color:var(--gray-600);margin-top:4px}
.date-chip{
  background:var(--white);border:1.5px solid var(--gray-200);
  border-radius:var(--radius);padding:9px 14px;
  font-size:13px;color:var(--gray-600);
  display:flex;align-items:center;gap:8px;flex-shrink:0;
}
.date-chip i{color:var(--teal);font-size:12px}

/* BANNER */
.banner{
  background:var(--blue);border-radius:var(--radius-lg);
  padding:24px 28px;margin-bottom:24px;
  display:flex;align-items:center;justify-content:space-between;gap:20px;
  position:relative;overflow:hidden;
}
.banner::before{
  content:'';position:absolute;right:-40px;top:-40px;
  width:180px;height:180px;border-radius:50%;
  background:rgba(42,157,143,0.15);pointer-events:none;
}
.banner-left{}
.banner-label{
  font-size:11px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;
  color:rgba(255,255,255,.6);margin-bottom:8px;
}
.banner-text{font-size:18px;font-weight:800;color:var(--white);margin-bottom:6px}
.banner-sub{font-size:13px;color:rgba(255,255,255,.65)}
.banner-btn{
  background:var(--white);color:var(--blue);
  padding:11px 22px;border-radius:var(--radius);
  font-size:14px;font-weight:700;text-decoration:none;
  display:inline-flex;align-items:center;gap:8px;
  transition:transform .15s;flex-shrink:0;
  white-space:nowrap;
}
.banner-btn:hover{transform:translateY(-2px)}

/* STAT CARDS */
.stats-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:24px}
.stat-card{
  background:var(--white);border:1.5px solid var(--gray-200);
  border-radius:var(--radius-lg);padding:22px;
  transition:border-color .2s,box-shadow .2s;
}
.stat-card:hover{border-color:var(--teal);box-shadow:var(--shadow)}
.sc-head{display:flex;align-items:center;justify-content:space-between;margin-bottom:14px}
.sc-icon{width:40px;height:40px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:16px}
.si-blue{background:var(--blue-light);color:var(--blue)}
.si-teal{background:var(--teal-light);color:var(--teal)}
.si-gray{background:var(--gray-100);color:var(--gray-600)}
.sc-chip{font-size:10px;font-weight:700;padding:3px 9px;border-radius:100px}
.chip-blue{background:var(--blue-light);color:var(--blue)}
.chip-teal{background:var(--teal-light);color:var(--teal)}
.chip-gray{background:var(--gray-100);color:var(--gray-600)}
.sc-num{font-size:34px;font-weight:800;color:var(--blue);letter-spacing:-1px;line-height:1;margin-bottom:4px}
.sc-label{font-size:13px;color:var(--gray-600);font-weight:500}

/* MAIN GRID */
.content-grid{display:grid;grid-template-columns:3fr 2fr;gap:16px}

/* CARD */
.card{
  background:var(--white);border:1.5px solid var(--gray-200);
  border-radius:var(--radius-lg);padding:24px;
  transition:border-color .2s;
}
.card:hover{border-color:rgba(30,58,95,0.2)}
.card-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:20px}
.card-title-wrap{display:flex;align-items:center;gap:10px}
.card-icon-sm{width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:12px}
.cis-blue{background:var(--blue-light);color:var(--blue)}
.cis-teal{background:var(--teal-light);color:var(--teal)}
.card-title{font-size:15px;font-weight:700;color:var(--blue)}

/* PROFIL ROWS */
.profil-grid{display:grid;grid-template-columns:1fr 1fr;gap:0}
.profil-item{padding:14px 0;border-bottom:1.5px solid var(--gray-200)}
.profil-item:nth-child(odd){padding-right:20px;border-right:1.5px solid var(--gray-200)}
.profil-item:nth-child(even){padding-left:20px}
.profil-item:nth-last-child(-n+2){border-bottom:none}
.profil-label{font-size:11px;font-weight:700;color:var(--gray-400);text-transform:uppercase;letter-spacing:.05em;margin-bottom:5px}
.profil-value{font-size:15px;font-weight:700;color:var(--blue);letter-spacing:-.2px}

.profil-footer{
  display:flex;gap:8px;margin-top:18px;padding-top:18px;
  border-top:1.5px solid var(--gray-200);
}
.pfill{
  display:inline-flex;align-items:center;gap:6px;
  font-size:12px;font-weight:700;padding:6px 14px;border-radius:100px;
}
.pf-blue{background:var(--blue-light);color:var(--blue);border:1.5px solid rgba(30,58,95,.15)}
.pf-teal{background:var(--teal-light);color:var(--teal);border:1.5px solid rgba(42,157,143,.2)}

/* QUICK ACTIONS */
.qa-list{display:flex;flex-direction:column;gap:10px}
.qa-item{
  display:flex;align-items:center;gap:14px;
  background:var(--gray-50);border:1.5px solid var(--gray-200);
  border-radius:var(--radius);padding:14px 16px;
  text-decoration:none;
  transition:border-color .2s,transform .15s,background .2s;
}
.qa-item:hover{border-color:var(--blue);background:var(--blue-light);transform:translateX(3px)}
.qa-icon{width:38px;height:38px;border-radius:10px;flex-shrink:0;display:flex;align-items:center;justify-content:center;font-size:15px}
.qi-blue{background:var(--blue-light);color:var(--blue)}
.qi-teal{background:var(--teal-light);color:var(--teal)}
.qi-gray{background:var(--gray-100);color:var(--gray-600)}
.qa-text{flex:1}
.qa-label{font-size:14px;font-weight:700;color:var(--gray-800)}
.qa-sub{font-size:12px;color:var(--gray-400);margin-top:2px}
.qa-arrow{color:var(--gray-400);font-size:12px;transition:transform .2s,color .2s}
.qa-item:hover .qa-arrow{transform:translateX(3px);color:var(--blue)}

/* ANIMATIONS */
@keyframes fadeUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
.fade-up{animation:fadeUp .4s ease-out both}
.d1{animation-delay:.05s}.d2{animation-delay:.1s}.d3{animation-delay:.15s}
.d4{animation-delay:.2s}.d5{animation-delay:.25s}

/* MOBILE */
@media(max-width:900px){
  .sidebar{display:none}
  .main-inner{padding:20px 16px 40px}
  .stats-grid{grid-template-columns:1fr}
  .content-grid{grid-template-columns:1fr}
  .topbar{flex-direction:column}
  .banner{flex-direction:column;align-items:flex-start}
}

/* TABLET */
@media(max-width:768px){
  .main-inner{padding:16px 14px 32px}
  .topbar-title{font-size:clamp(18px,5vw,24px)}
  .topbar-sub{font-size:13px}
  .topbar{margin-bottom:20px;padding-bottom:16px;gap:12px}
  .date-chip{font-size:12px;padding:7px 12px}
  .banner{padding:18px 20px;margin-bottom:20px;gap:16px}
  .banner-label{font-size:10px;margin-bottom:6px}
  .banner-text{font-size:16px;margin-bottom:4px}
  .banner-sub{font-size:12px}
  .banner-btn{padding:9px 16px;font-size:12px;gap:6px}
  .stats-grid{gap:12px;margin-bottom:18px}
  .stat-card{padding:16px}
  .sc-head{margin-bottom:10px}
  .sc-icon{width:36px;height:36px;font-size:14px}
  .sc-chip{font-size:9px;padding:2px 8px}
  .sc-num{font-size:28px;margin-bottom:2px}
  .sc-label{font-size:12px}
  .content-grid{gap:12px}
  .card{padding:16px}
  .card-header{margin-bottom:14px}
  .card-icon-sm{width:28px;height:28px;font-size:11px}
  .card-title{font-size:13px}
  .profil-grid{grid-template-columns:1fr}
  .profil-item{padding:10px 0;border-right:none !important;border-bottom:1.5px solid var(--gray-200) !important;padding-left:0 !important;padding-right:0 !important}
  .profil-item:nth-child(even){padding-left:0}
  .profil-label{font-size:10px}
  .profil-value{font-size:13px}
  .profil-footer{gap:6px;margin-top:12px;padding-top:12px}
  .pfill{font-size:11px;padding:5px 10px;gap:5px}
  .qa-list{gap:8px}
  .qa-item{gap:10px;padding:10px 12px;border-radius:var(--radius)}
  .qa-icon{width:32px;height:32px;font-size:13px;flex-shrink:0}
  .qa-label{font-size:12px}
  .qa-sub{font-size:11px}
  .qa-arrow{font-size:11px}
}

/* MOBILE PORTRAIT */
@media(max-width:480px){
  .main-inner{padding:12px 12px 28px}
  
  /* Topbar */
  .topbar{margin-bottom:14px;padding-bottom:12px;gap:8px;flex-direction:column}
  .topbar-tag{font-size:9px;padding:2px 8px;margin-bottom:4px}
  .topbar-tag::before{width:4px;height:4px}
  .topbar-title{font-size:clamp(16px,4vw,20px);margin-bottom:2px;font-weight:700}
  .topbar-title .teal{color:var(--teal)}
  .topbar-sub{font-size:12px}
  .date-chip{font-size:11px;padding:6px 10px;gap:6px}
  .date-chip i{font-size:11px}
  
  /* Banner */
  .banner{padding:14px 16px;margin-bottom:16px;border-radius:var(--radius);gap:12px;flex-direction:column;align-items:flex-start}
  .banner::before{display:none}
  .banner-left{}
  .banner-label{font-size:9px;margin-bottom:4px;letter-spacing:.03em}
  .banner-text{font-size:14px;font-weight:700;margin-bottom:3px}
  .banner-sub{font-size:11px;line-height:1.4}
  .banner-btn{padding:8px 14px;font-size:11px;gap:6px;width:100%;justify-content:center;white-space:normal}
  
  /* Stats Grid */
  .stats-grid{grid-template-columns:1fr;gap:10px;margin-bottom:14px}
  .stat-card{padding:12px;border-radius:8px;border:1px solid var(--gray-200)}
  .sc-head{margin-bottom:8px;gap:8px}
  .sc-icon{width:32px;height:32px;font-size:12px;border-radius:8px}
  .sc-chip{font-size:8px;padding:1px 6px}
  .sc-num{font-size:24px;margin-bottom:1px}
  .sc-label{font-size:11px;font-weight:400}
  
  /* Content Grid */
  .content-grid{grid-template-columns:1fr;gap:10px}
  
  /* Card */
  .card{padding:12px;border-radius:8px;border:1px solid var(--gray-200)}
  .card:hover{border-color:var(--gray-200)}
  .card-header{margin-bottom:10px;gap:6px}
  .card-title-wrap{gap:8px}
  .card-icon-sm{width:24px;height:24px;font-size:10px;border-radius:6px}
  .card-title{font-size:12px;font-weight:600}
  
  /* Profil Grid */
  .profil-grid{grid-template-columns:1fr;gap:0}
  .profil-item{padding:8px 0;border:none;border-bottom:1px solid var(--gray-200) !important}
  .profil-item:last-child{border-bottom:none !important}
  .profil-item:nth-child(odd){border-right:none !important;padding-right:0}
  .profil-label{font-size:9px;margin-bottom:3px;letter-spacing:.02em}
  .profil-value{font-size:12px;font-weight:600;color:var(--blue)}
  
  /* Profil Footer */
  .profil-footer{display:flex;gap:4px;margin-top:8px;padding-top:8px;flex-wrap:wrap}
  .pfill{font-size:10px;padding:4px 8px;gap:4px;flex-shrink:1}
  .pfill i{font-size:9px}
  
  /* QA List */
  .qa-list{gap:6px}
  .qa-item{gap:8px;padding:8px 10px;border-radius:var(--radius);border:1px solid var(--gray-200)}
  .qa-item:hover{border-color:var(--blue);background:var(--blue-light);transform:translateX(2px)}
  .qa-icon{width:28px;height:28px;font-size:11px;border-radius:6px;flex-shrink:0;min-width:28px}
  .qa-text{flex:1}
  .qa-label{font-size:11px;font-weight:600;color:var(--gray-800)}
  .qa-sub{font-size:10px;color:var(--gray-400);margin-top:1px}
  .qa-arrow{font-size:10px;transition:all .15s}
  
  /* Animations */
  .fade-up{animation:none;opacity:1;transform:none !important}
  .d1,.d2,.d3,.d4,.d5{animation-delay:0s !important}
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
          @if(isset($pengajuanAktif) && $pengajuanAktif > 0)
          <span class="menu-badge">{{ $pengajuanAktif }}</span>
          @endif
        </a>
      </div>
    </div>

    <div class="menu-divider"></div>

    <

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

      <!-- TOPBAR -->
      <div class="topbar fade-up">
        <div>
          <div class="topbar-tag">Portal Siswa</div>
          <div class="topbar-title">
            Halo, <span class="teal">{{ explode(' ', $siswa->nama)[0] }}</span> 👋
          </div>
          <div class="topbar-sub">Selamat datang di portal PKL-mu</div>
        </div>
        <div class="date-chip">
          <i class="fa-solid fa-calendar-days"></i>
          <span id="dateDisplay"></span>
        </div>
      </div>

      <!-- BANNER -->
      <div class="banner fade-up d1">
        <div class="banner-left">
          <div class="banner-label">Info PKL</div>
          @if(isset($approvedBooking))
            <div class="banner-text">Anda sudah diterima di perusahaan PKL.</div>
            <div class="banner-sub">Lihat status PKL dan jangan ajukan booking baru.</div>
          @else
            <div class="banner-text">Belum menemukan tempat PKL?</div>
            <div class="banner-sub">Tersedia {{ $perusahaans->count() }} perusahaan mitra yang siap menerimamu.</div>
          @endif
        </div>
        <a href="{{ isset($approvedBooking) ? route('siswa.booking.status') : route('siswa.booking.index') }}" class="banner-btn">
          <i class="fa-solid fa-{{ isset($approvedBooking) ? 'file-circle-check' : 'magnifying-glass' }}"></i>
          {{ isset($approvedBooking) ? 'Lihat Status PKL' : 'Cari Sekarang' }}
        </a>
      </div>

      <!-- STAT CARDS -->
      <div class="stats-grid">
        <div class="stat-card fade-up d2">
          <div class="sc-head">
            <div class="sc-icon si-teal"><i class="fa-solid fa-building"></i></div>
            <div class="sc-chip chip-teal">Tersedia</div>
          </div>
          <div class="sc-num">{{ $perusahaans->count() }}</div>
          <div class="sc-label">Perusahaan Tersedia</div>
        </div>

        <div class="stat-card fade-up d2" style="animation-delay:.12s">
          <div class="sc-head">
            <div class="sc-icon si-blue"><i class="fa-solid fa-circle-check"></i></div>
            <div class="sc-chip chip-blue">Status</div>
          </div>
          <div class="sc-num">{{ isset($approvedBooking) ? 1 : 0 }}</div>
          <div class="sc-label">PKL Diterima</div>
        </div>
      </div>

      <!-- CONTENT GRID -->
      <div class="content-grid">

        <!-- Profil Siswa -->
        <div class="card fade-up d4">
          <div class="card-header">
            <div class="card-title-wrap">
              <div class="card-icon-sm cis-blue"><i class="fa-solid fa-id-card"></i></div>
              <div class="card-title">Profil Siswa</div>
            </div>
          </div>
          <div class="profil-grid">
            <div class="profil-item">
              <div class="profil-label">NIS</div>
              <div class="profil-value">{{ $siswa->nis }}</div>
            </div>
            <div class="profil-item">
              <div class="profil-label">Nama Lengkap</div>
              <div class="profil-value" style="font-size:14px">{{ $siswa->nama }}</div>
            </div>
            <div class="profil-item">
              <div class="profil-label">Jurusan</div>
              <div class="profil-value">{{ $siswa->jurusan }}</div>
            </div>
            <div class="profil-item">
              <div class="profil-label">Kelas</div>
              <div class="profil-value">{{ $siswa->kelas }}</div>
            </div>
          </div>
          <div class="profil-footer">
            <span class="pfill pf-blue">
              <i class="fa-solid fa-graduation-cap"></i> {{ $siswa->jurusan }}
            </span>
            <span class="pfill pf-teal">
              <i class="fa-solid fa-door-open"></i> {{ $siswa->kelas }}
            </span>
          </div>
        </div>

        <!-- Aksi Cepat -->
        <div class="card fade-up d5">
          <div class="card-header">
            <div class="card-title-wrap">
              <div class="card-icon-sm cis-teal"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
              <div class="card-title">Aksi Cepat</div>
            </div>
          </div>
          <div class="qa-list">
            @if(isset($approvedBooking))
              <a href="{{ route('siswa.booking.status') }}" class="qa-item">
                <div class="qa-icon qi-blue"><i class="fa-solid fa-file-circle-check"></i></div>
                <div class="qa-text">
                  <div class="qa-label">Status PKL Saya</div>
                  <div class="qa-sub">Lihat detail status PKL yang diterima</div>
                </div>
                <i class="fa-solid fa-arrow-right qa-arrow"></i>
              </a>
            @else
              <a href="{{ route('siswa.booking.index') }}" class="qa-item">
                <div class="qa-icon qi-teal"><i class="fa-solid fa-magnifying-glass"></i></div>
                <div class="qa-text">
                  <div class="qa-label">Cari Tempat PKL</div>
                  <div class="qa-sub">{{ $perusahaans->count() }} perusahaan tersedia</div>
                </div>
                <i class="fa-solid fa-arrow-right qa-arrow"></i>
              </a>
              <a href="{{ route('siswa.booking.index') }}" class="qa-item">
                <div class="qa-icon qi-blue"><i class="fa-solid fa-file-circle-check"></i></div>
                <div class="qa-text">
                  <div class="qa-label">Status PKL Saya</div>
                  <div class="qa-sub">Cek progress pengajuan</div>
                </div>
                <i class="fa-solid fa-arrow-right qa-arrow"></i>
              </a>
            @endif
            <a href="#" class="qa-item">
              <div class="qa-icon qi-gray"><i class="fa-solid fa-user-circle"></i></div>
              <div class="qa-text">
                <div class="qa-label">Profil Saya</div>
                <div class="qa-sub">Lihat & edit data diri</div>
              </div>
              <i class="fa-solid fa-arrow-right qa-arrow"></i>
            </a>
          </div>
        </div>

      </div>
    </div>
  </main>
</div>

<script>
  const d = new Date();
  const days   = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
  const months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
  document.getElementById('dateDisplay').textContent =
    days[d.getDay()] + ', ' + d.getDate() + ' ' + months[d.getMonth()] + ' ' + d.getFullYear();
</script>
@endsection