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
.topbar-title{font-size:clamp(20px,3.5vw,30px);font-weight:800;color:var(--blue);letter-spacing:-.5px}
.topbar-sub{font-size:clamp(12px,2vw,14px);color:var(--gray-600);margin-top:clamp(2px,0.5vh,4px)}

.card{
  background:var(--white);border:1.5px solid var(--gray-200);
  border-radius:var(--radius-lg);padding:clamp(16px,2.5vh,24px);
  transition:border-color .2s;
}
.card:hover{border-color:rgba(30,58,95,0.2)}
.card-content{font-size:14px;color:var(--gray-600);line-height:1.6}

@media(max-width:768px){
  .sidebar{display:none}
  .main-inner{padding:20px 16px 40px}
  .topbar{flex-direction:column;align-items:flex-start}
}
</style>

<div class="wrapper">
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
      <div class="topbar">
        <div>
          <div class="topbar-tag">Data Laporan</div>
          <div class="topbar-title">Laporan PKL</div>
          <div class="topbar-sub">Fitur laporan sedang dalam pengembangan</div>
        </div>
      </div>

      <div class="card">
        <div class="card-content">
          <p>Halaman laporan masih dalam pengembangan. Fitur ini akan segera tersedia untuk memberikan Anda laporan komprehensif mengenai data siswa, perusahaan, dan pengajuan PKL.</p>
        </div>
      </div>
    </div>
  </main>
</div>
@endsection
