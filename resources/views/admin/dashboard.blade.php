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
body{font-family:var(--font);background:var(--gray-50);color:var(--gray-800);min-height:100vh}

.wrapper{display:flex;min-height:100vh}

/* ── SIDEBAR ── */
.sidebar{
  width:clamp(200px,15vw,240px);flex-shrink:0;
  background:var(--white);
  border-right:1.5px solid var(--gray-200);
  display:flex;flex-direction:column;
  position:sticky;top:0;height:100vh;overflow-y:auto;
}
.sidebar-logo-wrap{padding:clamp(14px,2vh,20px) clamp(14px,2vw,20px) 0;border-bottom:1.5px solid var(--gray-200)}
.logo{display:flex;align-items:center;gap:9px;text-decoration:none;padding-bottom:18px}
.logo-icon{
  width:clamp(28px,5vw,32px);height:clamp(28px,5vw,32px);background:var(--blue);border-radius:8px;
  display:flex;align-items:center;justify-content:center;
  font-weight:800;font-size:clamp(11px,1.5vw,13px);color:var(--white);flex-shrink:0;
}
.logo-name{font-weight:800;font-size:clamp(13px,2vw,16px);color:var(--blue)}
.logo-name span{color:var(--teal)}

.admin-profile{
  margin:clamp(12px,2vh,16px) clamp(12px,2vw,16px) clamp(14px,2.5vh,20px);
  background:var(--white);border:1.5px solid var(--gray-200);
  border-radius:14px;padding:clamp(10px,1.5vh,14px) clamp(10px,1.5vw,16px);
  display:flex;align-items:center;gap:clamp(8px,1.5vw,12px);
  box-shadow:0 1px 3px rgba(30,58,95,.06);
}
.admin-avatar{
  width:clamp(36px,6vw,42px);height:clamp(36px,6vw,42px);border-radius:14px;flex-shrink:0;
  background:linear-gradient(135deg,var(--blue),var(--teal));
  display:flex;align-items:center;justify-content:center;
  font-weight:800;font-size:clamp(12px,1.5vw,15px);color:var(--white);
}
.admin-name{font-size:clamp(11px,1.8vw,13px);font-weight:800;color:var(--blue)}
.admin-role{font-size:clamp(9px,1.2vw,11px);color:var(--gray-400);margin-top:2px}

.nav-section{padding:0 12px}
.nav-label{
  font-size:10px;font-weight:700;letter-spacing:.09em;
  color:var(--gray-400);text-transform:uppercase;
  padding:0 6px;margin-bottom:5px;margin-top:16px;display:block;
}
.menu{display:flex;flex-direction:column;gap:1px;margin-bottom:8px}
.menu a{
  display:flex;align-items:center;gap:10px;
  padding:9px 10px;border-radius:9px;
  color:var(--gray-600);text-decoration:none;
  font-size:13px;font-weight:500;transition:all .15s;
}
.menu a:hover{background:var(--gray-100);color:var(--gray-800)}
.menu a.active{background:var(--blue-light);color:var(--blue);font-weight:700}
.menu a i{width:15px;text-align:center;font-size:12px;flex-shrink:0}
.menu-divider{height:1.5px;background:var(--gray-200);margin:10px 12px}

.sidebar-footer{margin-top:auto;padding:14px 12px;border-top:1.5px solid var(--gray-200)}
.logout-btn{
  width:100%;display:flex;align-items:center;gap:9px;
  padding:9px 10px;border-radius:9px;
  background:var(--red-light);border:1.5px solid #FED7D7;
  color:var(--red);font-size:13px;font-weight:600;
  cursor:pointer;font-family:var(--font);transition:all .15s;
}
.logout-btn:hover{background:#FED7D7}
/* ── MAIN ── */
.main{flex:1;min-width:0}
.main-inner{padding:clamp(20px,3vh,32px) clamp(16px,3vw,36px) clamp(40px,6vh,60px);max-width:1100px}

/* TOPBAR */
.topbar{
  display:flex;align-items:flex-start;justify-content:space-between;
  margin-bottom:clamp(20px,4vh,32px);gap:clamp(12px,2vw,20px);
  padding-bottom:clamp(16px,3vh,24px);border-bottom:1.5px solid var(--gray-200);
}
.topbar-tag{
  display:inline-flex;align-items:center;gap:7px;
  background:var(--teal-light);color:var(--teal);
  font-size:clamp(9px,1.2vw,11px);font-weight:700;letter-spacing:.06em;text-transform:uppercase;
  padding:clamp(3px,0.5vh,4px) clamp(8px,1.5vw,12px);border-radius:100px;margin-bottom:clamp(6px,1.2vh,10px);
}
.topbar-tag::before{content:'';width:5px;height:5px;background:var(--teal);border-radius:50%;animation:pulse 2s infinite}
@keyframes pulse{0%,100%{opacity:1}50%{opacity:.3}}
.topbar-title{font-size:clamp(20px,3.5vw,30px);font-weight:800;color:var(--blue);letter-spacing:-.5px}
.topbar-title .teal{color:var(--teal)}
.topbar-sub{font-size:clamp(12px,2vw,14px);color:var(--gray-600);margin-top:clamp(2px,0.5vh,4px)}
.topbar-right{display:flex;align-items:center;gap:clamp(6px,1.2vw,10px);flex-shrink:0}
.date-chip{
  background:var(--white);border:1.5px solid var(--gray-200);
  border-radius:var(--radius);padding:clamp(8px,1.5vh,9px) clamp(10px,1.5vw,14px);
  font-size:clamp(11px,1.5vw,13px);color:var(--gray-600);
  display:flex;align-items:center;gap:clamp(6px,1vw,8px);
}
.date-chip i{color:var(--teal);font-size:clamp(10px,1.5vw,12px)}
.refresh-btn{
  width:clamp(34px,6vw,38px);height:clamp(34px,6vw,38px);
  background:var(--white);border:1.5px solid var(--gray-200);
  border-radius:var(--radius);display:flex;align-items:center;justify-content:center;
  color:var(--gray-600);cursor:pointer;transition:all .2s;font-size:clamp(12px,1.8vw,14px);
}
.refresh-btn:hover{border-color:var(--blue);color:var(--blue)}

/* STAT CARDS */
.stats-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:clamp(12px,2vw,16px);margin-bottom:clamp(16px,3vh,24px)}
.stat-card{
  background:var(--white);border:1.5px solid var(--gray-200);
  border-radius:var(--radius-lg);padding:clamp(16px,2.5vh,24px);
  transition:border-color .2s,box-shadow .2s;
}
.stat-card:hover{border-color:var(--teal);box-shadow:var(--shadow)}
.sc-head{display:flex;align-items:center;justify-content:space-between;margin-bottom:clamp(12px,2vh,16px)}
.sc-icon{
  width:clamp(36px,6vw,42px);height:clamp(36px,6vw,42px);border-radius:10px;
  display:flex;align-items:center;justify-content:center;font-size:clamp(12px,2vw,16px);
}
.si-blue{background:var(--blue-light);color:var(--blue)}
.si-teal{background:var(--teal-light);color:var(--teal)}
.si-gray{background:var(--gray-100);color:var(--gray-600)}
.sc-trend{
  font-size:clamp(9px,1.2vw,11px);font-weight:700;padding:clamp(2px,0.5vh,3px) clamp(7px,1.2vw,9px);border-radius:100px;
  display:flex;align-items:center;gap:5px;
}
.trend-blue{background:var(--blue-light);color:var(--blue)}
.trend-teal{background:var(--teal-light);color:var(--teal)}
.trend-gray{background:var(--gray-100);color:var(--gray-600)}
.sc-num{font-size:clamp(28px,5vw,38px);font-weight:800;color:var(--blue);letter-spacing:-1px;line-height:1;margin-bottom:clamp(2px,0.5vh,5px)}
.sc-label{font-size:clamp(11px,1.5vw,13px);color:var(--gray-600);font-weight:500}

/* BAR MICRO */
.micro-bars{display:flex;align-items:flex-end;gap:3px;height:24px;margin-top:clamp(10px,2vh,14px)}
.mbar{border-radius:3px 3px 0 0;width:7px;transition:opacity .2s}
.mbar-blue{background:var(--blue);opacity:.3}
.mbar-teal{background:var(--teal);opacity:.3}
.stat-card:hover .mbar{opacity:.7}

/* MAIN GRID */
.content-grid{display:grid;grid-template-columns:3fr 2fr;gap:clamp(12px,2vw,16px);margin-bottom:clamp(12px,2vw,16px)}

/* GLASS CARD */
.card{
  background:var(--white);border:1.5px solid var(--gray-200);
  border-radius:var(--radius-lg);padding:clamp(16px,2.5vh,24px);
  transition:border-color .2s;
}
.card:hover{border-color:rgba(30,58,95,0.2)}
.card-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:clamp(14px,2.5vh,20px)}
.card-title-wrap{display:flex;align-items:center;gap:clamp(8px,1.5vw,10px)}
.card-icon-sm{
  width:clamp(28px,5vw,32px);height:clamp(28px,5vw,32px);border-radius:8px;
  display:flex;align-items:center;justify-content:center;font-size:clamp(10px,1.5vw,12px);
}
.cis-blue{background:var(--blue-light);color:var(--blue)}
.cis-teal{background:var(--teal-light);color:var(--teal)}
.card-title{font-size:clamp(13px,1.8vw,15px);font-weight:700;color:var(--blue)}
.card-count{
  font-size:clamp(9px,1.2vw,11px);font-weight:700;padding:clamp(2px,0.5vh,3px) clamp(7px,1.2vw,9px);border-radius:100px;
  background:var(--gray-100);color:var(--gray-600);
}

/* JURUSAN */
.jurusan-list{display:flex;flex-direction:column;gap:clamp(10px,2vh,14px)}
.jur-row{display:flex;align-items:center;gap:clamp(8px,1.5vw,12px)}
.jur-rank{
  width:clamp(20px,3vw,22px);height:clamp(20px,3vw,22px);border-radius:6px;
  background:var(--blue-light);color:var(--blue);
  font-size:clamp(9px,1.2vw,11px);font-weight:700;
  display:flex;align-items:center;justify-content:center;flex-shrink:0;
}
.jur-info{flex:1}
.jur-name{font-size:clamp(11px,1.5vw,13px);font-weight:600;color:var(--gray-800);margin-bottom:clamp(3px,0.8vh,5px)}
.jur-bar-bg{height:5px;background:var(--gray-100);border-radius:10px;overflow:hidden}
.jur-bar-fill{height:100%;background:linear-gradient(90deg,var(--blue),var(--teal));border-radius:10px;animation:growBar .8s ease-out both}
@keyframes growBar{from{width:0}}
.jur-num{font-size:clamp(12px,1.8vw,15px);font-weight:800;color:var(--blue);flex-shrink:0;min-width:20px;text-align:right}

/* PENGAJUAN LIST */
.peng-list{display:flex;flex-direction:column;gap:clamp(6px,1.2vw,8px)}
.peng-row{
  display:flex;align-items:center;gap:clamp(8px,1.5vw,12px);
  padding:clamp(8px,1.5vh,11px) clamp(8px,1.5vw,12px);border-radius:var(--radius);
  border:1.5px solid var(--gray-200);background:var(--gray-50);
  transition:border-color .2s;
}
.peng-row:hover{border-color:var(--teal)}
.peng-avatar{
  width:clamp(30px,5vw,34px);height:clamp(30px,5vw,34px);border-radius:50%;flex-shrink:0;
  background:var(--blue);
  display:flex;align-items:center;justify-content:center;
  font-size:clamp(9px,1.2vw,11px);font-weight:700;color:var(--white);
}
.peng-info{flex:1;min-width:0}
.peng-name{font-size:clamp(11px,1.5vw,13px);font-weight:600;color:var(--gray-800);white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.peng-company{font-size:clamp(9px,1.2vw,11px);color:var(--gray-400);margin-top:2px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.status-pill{
  font-size:clamp(9px,1.2vw,10px);font-weight:700;padding:clamp(2px,0.5vh,4px) clamp(8px,1.2vw,10px);border-radius:100px;
  flex-shrink:0;letter-spacing:.03em;
}
.s-menunggu{background:#FFF9DB;color:#92400E;border:1.5px solid #FDE68A}
.s-disetujui{background:var(--teal-light);color:var(--teal);border:1.5px solid rgba(42,157,143,.25)}
.s-ditolak{background:var(--red-light);color:var(--red);border:1.5px solid #FED7D7}
.s-default{background:var(--gray-100);color:var(--gray-600);border:1.5px solid var(--gray-200)}

/* BOTTOM GRID */
.bottom-grid{display:grid;grid-template-columns:1fr 1fr;gap:clamp(12px,2vw,16px)}

/* ACTIVITY */
.activity-list{display:flex;flex-direction:column}
.act-row{display:flex;gap:clamp(10px,1.8vw,14px);padding-bottom:clamp(12px,2vh,16px)}
.act-line{display:flex;flex-direction:column;align-items:center}
.act-dot{width:9px;height:9px;border-radius:50%;flex-shrink:0;margin-top:3px}
.act-connector{width:1.5px;flex:1;min-height:20px;background:var(--gray-200)}
.act-body{flex:1}
.act-text{font-size:clamp(11px,1.5vw,13px);color:var(--gray-600);line-height:1.5}
.act-text strong{color:var(--gray-800);font-weight:600}
.act-time{font-size:clamp(10px,1.2vw,11px);color:var(--gray-400);margin-top:clamp(2px,0.5vh,3px)}

/* QUICK ACTIONS */
.qa-grid{display:grid;grid-template-columns:1fr 1fr;gap:clamp(8px,1.5vw,10px)}
.qa-btn{
  background:var(--gray-50);border:1.5px solid var(--gray-200);
  border-radius:var(--radius);padding:clamp(12px,2vh,16px) clamp(10px,1.5vw,14px);
  display:flex;flex-direction:column;gap:clamp(6px,1.2vh,8px);
  text-decoration:none;
  transition:border-color .2s,background .2s,transform .15s;
}
.qa-btn:hover{border-color:var(--blue);background:var(--blue-light);transform:translateY(-2px)}
.qa-icon{width:clamp(30px,5vw,34px);height:clamp(30px,5vw,34px);border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:clamp(12px,1.8vw,14px)}
.qi-blue{background:var(--blue-light);color:var(--blue)}
.qi-purple{background:#E6DEFF;color:#9333EA}
.qi-teal{background:var(--teal-light);color:var(--teal)}
.qi-red{background:var(--red-light);color:var(--red)}
.qa-label{font-size:clamp(11px,1.5vw,13px);font-weight:700;color:var(--gray-800)}
.qa-sub{font-size:clamp(10px,1.2vw,11px);color:var(--gray-400)}

/* ANIMATIONS */
@keyframes fadeUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
.fade-up{animation:fadeUp .4s ease-out both}
.d1{animation-delay:.05s}.d2{animation-delay:.1s}.d3{animation-delay:.15s}
.d4{animation-delay:.2s}.d5{animation-delay:.25s}.d6{animation-delay:.3s}

.reveal{opacity:0;transform:translateY(20px);transition:opacity .6s ease,transform .6s ease}
.reveal.visible{opacity:1;transform:none}

/* ────────────────────────── RESPONSIVE DESIGN ────────────────── */

/* Extra Small (360px - 480px) */
@media(max-width:480px){
  .sidebar{display:none}
  .main-inner{padding:clamp(12px,3vh,20px) clamp(12px,3vw,16px) 30px}
  .topbar{margin-bottom:16px;padding-bottom:12px;flex-direction:column;gap:12px}
  .topbar-title{font-size:clamp(18px,4vw,22px)}
  .topbar-sub{font-size:clamp(11px,1.5vw,12px)}
  .topbar-right{flex-direction:column;width:100%;gap:8px}
  .date-chip,.refresh-btn{width:100%;justify-content:center}
  .stats-grid{grid-template-columns:1fr;gap:12px}
  .stat-card{padding:clamp(14px,2vh,18px)}
  .sc-num{font-size:clamp(24px,5vw,30px)}
  .sc-label{font-size:clamp(10px,1.2vw,11px)}
  .content-grid{grid-template-columns:1fr;gap:12px}
  .card{padding:clamp(14px,2vh,18px)}
  .card-title{font-size:clamp(12px,1.5vw,13px)}
  .bottom-grid{grid-template-columns:1fr;gap:12px}
  .qa-grid{grid-template-columns:1fr}
  .jur-list{gap:10px}
  .jur-row{gap:8px}
  .peng-list{gap:6px}
}

/* Small (481px - 768px) */
@media(min-width:481px) and (max-width:768px){
  .sidebar{display:none}
  .main-inner{padding:20px 16px 40px}
  .stats-grid{grid-template-columns:1fr;gap:14px}
  .content-grid{grid-template-columns:1fr}
  .bottom-grid{grid-template-columns:1fr}
  .topbar{flex-direction:column;gap:14px}
}

/* Tablet (769px - 1024px) */
@media(min-width:769px) and (max-width:1024px){
  .sidebar{width:200px}
  .main-inner{padding:24px 20px 40px}
  .stats-grid{grid-template-columns:repeat(2,1fr);gap:14px}
  .content-grid{grid-template-columns:1fr}
  .bottom-grid{grid-template-columns:1fr}
}

/* Desktop (1025px - 1440px) */
@media(min-width:1025px) and (max-width:1440px){
  .sidebar{width:240px}
  .stats-grid{grid-template-columns:repeat(3,1fr)}
}

/* Large Desktop (1441px+) */
@media(min-width:1441px){
  .main-inner{max-width:1300px;margin:0 auto}
}
</style>

<div class="wrapper">

  <!-- SIDEBAR -->
  <!-- SIDEBAR -->
  <div class="sidebar">
    <div class="sidebar-logo-wrap">
      <a href="{{ route('admin.dashboard') }}" class="logo">
        <div class="logo-icon">G</div>
        <span class="logo-name">GO<span>PKL</span></span>
      </a>
    </div>

    <div class="admin-profile">
      <div class="admin-avatar">
        {{ strtoupper(substr(Auth::user()->name ?? Auth::user()->username ?? 'A', 0, 1)) }}
      </div>
      <div>
        <div class="admin-name">{{ Auth::user()->name ?? Auth::user()->username ?? 'Admin' }}</div>
        <div class="admin-role">Administrator</div>
      </div>
    </div>

    <div class="nav-section">
      <span class="nav-label">Menu Utama</span>
      <div class="menu">
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
          <i class="fa-solid fa-chart-pie"></i> Dashboard
        </a>
        <a href="{{ route('admin.siswa.index') }}" class="{{ request()->routeIs('admin.siswa.*') ? 'active' : '' }}">
          <i class="fa-solid fa-users"></i> Data Siswa
        </a>
        <a href="{{ route('admin.guru.index') }}" class="{{ request()->routeIs('admin.guru.*') ? 'active' : '' }}">
          <i class="fa-solid fa-chalkboard-user"></i> Data Guru
        </a>
        <a href="{{ route('admin.perusahaan.index') }}" class="{{ request()->is('admin/perusahaan*') ? 'active' : '' }}">
          <i class="fa-solid fa-building"></i> Data Perusahaan
        </a>
        <a href="{{ route('admin.pengajuan.index') }}" class="{{ request()->routeIs('admin.pengajuan.index') ? 'active' : '' }}">
          <i class="fa-solid fa-file-lines"></i> Pengajuan PKL
        </a>
        <a href="{{ route('admin.pengajuan.aktif') }}" class="{{ request()->routeIs('admin.pengajuan.aktif') ? 'active' : '' }}">
          <i class="fa-solid fa-check-circle"></i> Siswa Sedang PKL
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

      <!-- TOPBAR -->
      <div class="topbar fade-up">
        <div>
          <div class="topbar-tag">Dashboard Admin</div>
          <div class="topbar-title">Selamat Datang, <span class="teal">Admin</span></div>
          <div class="topbar-sub">Ringkasan data & aktivitas GOPKL hari ini</div>
        </div>
        <div class="topbar-right">
          <div class="date-chip">
            <i class="fa-solid fa-calendar-days"></i>
            <span id="dateDisplay"></span>
          </div>
          <button class="refresh-btn" onclick="window.location.reload()" title="Refresh">
            <i class="fa-solid fa-rotate-right"></i>
          </button>
        </div>
      </div>

      <!-- STAT CARDS -->
      <div class="stats-grid">
        <div class="stat-card fade-up d1">
          <div class="sc-head">
            <div class="sc-icon si-blue"><i class="fa-solid fa-users"></i></div>
            <div class="sc-trend trend-blue"><i class="fa-solid fa-arrow-trend-up"></i> Aktif</div>
          </div>
          <div class="sc-num">{{ $totalSiswa }}</div>
          <div class="sc-label">Total Siswa Terdaftar</div>
          <div class="micro-bars">
            <div class="mbar mbar-blue" style="height:40%"></div>
            <div class="mbar mbar-blue" style="height:60%"></div>
            <div class="mbar mbar-blue" style="height:50%"></div>
            <div class="mbar mbar-blue" style="height:80%"></div>
            <div class="mbar mbar-blue" style="height:70%"></div>
            <div class="mbar mbar-blue" style="height:100%"></div>
            <div class="mbar mbar-blue" style="height:85%"></div>
          </div>
        </div>

        <div class="stat-card fade-up d2">
          <div class="sc-head">
            <div class="sc-icon si-teal"><i class="fa-solid fa-building"></i></div>
            <div class="sc-trend trend-teal"><i class="fa-solid fa-handshake"></i> Mitra</div>
          </div>
          <div class="sc-num">{{ $totalPerusahaan }}</div>
          <div class="sc-label">Perusahaan Mitra</div>
          <div class="micro-bars">
            <div class="mbar mbar-teal" style="height:55%"></div>
            <div class="mbar mbar-teal" style="height:70%"></div>
            <div class="mbar mbar-teal" style="height:45%"></div>
            <div class="mbar mbar-teal" style="height:90%"></div>
            <div class="mbar mbar-teal" style="height:60%"></div>
            <div class="mbar mbar-teal" style="height:75%"></div>
            <div class="mbar mbar-teal" style="height:100%"></div>
          </div>
        </div>

        <div class="stat-card fade-up d3">
          <div class="sc-head">
            <div class="sc-icon si-gray"><i class="fa-solid fa-file-circle-check"></i></div>
            <div class="sc-trend trend-gray"><i class="fa-solid fa-layer-group"></i> Semua</div>
          </div>
          <div class="sc-num">{{ $totalPengajuan }}</div>
          <div class="sc-label">Total Pengajuan PKL</div>
          <div class="micro-bars">
            <div class="mbar mbar-blue" style="height:30%"></div>
            <div class="mbar mbar-blue" style="height:50%"></div>
            <div class="mbar mbar-blue" style="height:75%"></div>
            <div class="mbar mbar-blue" style="height:60%"></div>
            <div class="mbar mbar-teal" style="height:85%"></div>
            <div class="mbar mbar-teal" style="height:95%"></div>
            <div class="mbar mbar-teal" style="height:100%"></div>
          </div>
        </div>
      </div>

      <!-- MAIN GRID -->
      <div class="content-grid">
        <!-- Statistik Jurusan -->
        <div class="card reveal fade-up d4">
          <div class="card-header">
            <div class="card-title-wrap">
              <div class="card-icon-sm cis-blue"><i class="fa-solid fa-chart-bar"></i></div>
              <div class="card-title">Statistik per Jurusan</div>
            </div>
            <div class="card-count">{{ $statJurusan->count() }} Jurusan</div>
          </div>
          <div class="jurusan-list">
            @php $maxJur = $statJurusan->max('total') ?: 1; $rank = 1; @endphp
            @foreach($statJurusan as $jurusan)
            <div class="jur-row">
              <div class="jur-rank">{{ $rank++ }}</div>
              <div class="jur-info">
                <div class="jur-name">{{ $jurusan->jurusan }}</div>
                <div class="jur-bar-bg">
                  <div class="jur-bar-fill" style="width:{{ round(($jurusan->total / $maxJur) * 100) }}%"></div>
                </div>
              </div>
              <div class="jur-num">{{ $jurusan->total }}</div>
            </div>
            @endforeach
          </div>
        </div>

        <!-- Pengajuan Terbaru -->
        <div class="card reveal fade-up d5">
          <div class="card-header">
            <div class="card-title-wrap">
              <div class="card-icon-sm cis-teal"><i class="fa-solid fa-clock-rotate-left"></i></div>
              <div class="card-title">Pengajuan Terbaru</div>
            </div>
            <div class="card-count" style="background:var(--teal-light);color:var(--teal)">Live</div>
          </div>
          <div class="peng-list">
            @foreach($pengajuanTerbaru as $pengajuan)
            @php
              $nama  = $pengajuan->siswa->nama ?? '-';
              $inits = collect(explode(' ', $nama))->map(fn($w) => strtoupper(substr($w,0,1)))->take(2)->join('');
              $status = strtolower($pengajuan->status);
              $pillClass = match($status) {
                'menunggu'  => 's-menunggu',
                'disetujui' => 's-disetujui',
                'ditolak'   => 's-ditolak',
                default     => 's-default',
              };
            @endphp
            <div class="peng-row">
              <div class="peng-avatar">{{ $inits }}</div>
              <div class="peng-info">
                <div class="peng-name">{{ $nama }}</div>
                <div class="peng-company">{{ $pengajuan->perusahaan->nama_perusahaan ?? '-' }}</div>
              </div>
              <div class="status-pill {{ $pillClass }}">{{ ucfirst($pengajuan->status) }}</div>
            </div>
            @endforeach
          </div>
        </div>
      </div>

      <!-- BOTTOM GRID -->
      <div class="bottom-grid">
        <!-- Aktivitas -->
        <div class="card reveal fade-up d6">
          <div class="card-header">
            <div class="card-title-wrap">
              <div class="card-icon-sm cis-blue"><i class="fa-solid fa-bolt"></i></div>
              <div class="card-title">Aktivitas Terkini</div>
            </div>
          </div>
          <div class="activity-list">
            @foreach($pengajuanTerbaru->take(4) as $pengajuan)
            @php
              $nama  = $pengajuan->siswa->nama ?? '-';
              $st    = strtolower($pengajuan->status);
              $dotBg = match($st) {
                'disetujui' => 'var(--teal)',
                'ditolak'   => 'var(--red)',
                default     => 'var(--blue)',
              };
            @endphp
            <div class="act-row">
              <div class="act-line">
                <div class="act-dot" style="background:{{ $dotBg }}"></div>
                @if(!$loop->last)<div class="act-connector"></div>@endif
              </div>
              <div class="act-body">
                <div class="act-text">
                  <strong>{{ $nama }}</strong> mengajukan PKL ke
                  <strong>{{ $pengajuan->perusahaan->nama_perusahaan ?? '-' }}</strong>
                </div>
                <div class="act-time">Status: {{ ucfirst($pengajuan->status) }}</div>
              </div>
            </div>
            @endforeach
          </div>
        </div>

        <!-- Aksi Cepat -->
        <div class="card reveal fade-up d6">
          <div class="card-header">
            <div class="card-title-wrap">
              <div class="card-icon-sm cis-teal"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
              <div class="card-title">Aksi Cepat</div>
            </div>
          </div>
          <div class="qa-grid">
            <a href="{{ route('admin.siswa.index') }}" class="qa-btn">
              <div class="qa-icon qi-blue"><i class="fa-solid fa-users"></i></div>
              <div class="qa-label">Kelola Siswa</div>
              <div class="qa-sub">Lihat semua data</div>
            </a>
            <a href="{{ route('admin.guru.index') }}" class="qa-btn">
              <div class="qa-icon qi-purple"><i class="fa-solid fa-chalkboard-user"></i></div>
              <div class="qa-label">Kelola Guru</div>
              <div class="qa-sub">Wali & Kakonsli</div>
            </a>
            <a href="{{ route('admin.perusahaan.index') }}" class="qa-btn">
              <div class="qa-icon qi-teal"><i class="fa-solid fa-building"></i></div>
              <div class="qa-label">Perusahaan</div>
              <div class="qa-sub">Mitra PKL</div>
            </a>
            <a href="{{ route('admin.pengajuan.index') }}" class="qa-btn">
              <div class="qa-icon qi-blue"><i class="fa-solid fa-file-lines"></i></div>
              <div class="qa-label">Pengajuan</div>
              <div class="qa-sub">Review & setujui</div>
            </a>
            <a href="{{ route('admin.laporan') }}" class="qa-btn">
              <div class="qa-icon qi-red"><i class="fa-solid fa-chart-pie"></i></div>
              <div class="qa-label">Laporan</div>
              <div class="qa-sub">Export & cetak</div>
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

  const obs = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
  }, { threshold:.1 });
  document.querySelectorAll('.reveal').forEach(r => obs.observe(r));

  function countUp(el, target) {
    let v = 0, step = target / (700 / 16);
    const iv = setInterval(() => {
      v = Math.min(v + step, target);
      el.textContent = Math.floor(v);
      if (v >= target) clearInterval(iv);
    }, 16);
  }
  document.querySelectorAll('.sc-num').forEach(el => {
    const val = parseInt(el.textContent);
    if (!isNaN(val)) { el.textContent = '0'; setTimeout(() => countUp(el, val), 300); }
  });
</script>
@endsection