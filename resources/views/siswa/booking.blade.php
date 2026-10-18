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
  --amber:#D97706; --amber-light:#FFFBEB;
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
.main-inner{padding:32px 36px 60px}

/* TOPBAR */
.topbar{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:28px;gap:20px;padding-bottom:24px;border-bottom:1.5px solid var(--gray-200)}
.topbar-tag{display:inline-flex;align-items:center;gap:7px;background:var(--blue-light);color:var(--blue);font-size:11px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:4px 12px;border-radius:100px;margin-bottom:10px}
.topbar-title{font-size:clamp(22px,2.5vw,28px);font-weight:800;color:var(--blue);letter-spacing:-.5px}
.topbar-sub{font-size:14px;color:var(--gray-500);margin-top:4px}

/* ALERT BANNER */
.banner-alert{
  background:var(--green-light);border:1.5px solid #BBF7D0;
  border-radius:var(--radius-lg);padding:16px 20px;
  display:flex;align-items:center;gap:14px;
  margin-bottom:24px;
}
.banner-alert i{color:var(--green);font-size:18px;flex-shrink:0}
.banner-alert-text{font-size:13px;color:var(--green);font-weight:500;line-height:1.6}
.banner-alert-text strong{font-weight:700}
.banner-alert-text a{color:var(--green);font-weight:700;text-decoration:underline}

/* NOTIF TOAST */
.toast-error{
  position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);
  z-index:9999;
  background:var(--red-light);border:1.5px solid #FED7D7;
  color:var(--red);padding:20px 28px;border-radius:var(--radius-lg);
  box-shadow:0 8px 32px rgba(0,0,0,.12);
  font-weight:700;font-size:15px;
  display:flex;align-items:center;gap:12px;min-width:300px;
}

/* COMPANY GRID */
.company-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:16px;margin-bottom:28px}

/* COMPANY CARD */
.company-card{
  background:var(--white);border:1.5px solid var(--gray-200);
  border-radius:var(--radius-lg);overflow:hidden;
  transition:border-color .2s,box-shadow .2s,transform .2s;
  display:flex;flex-direction:column;
  max-width:100%;
}
.company-card:hover{border-color:var(--teal);box-shadow:var(--shadow);transform:translateY(-2px)}
.company-card.disabled{opacity:.6;pointer-events:none}

.cc-header{padding:20px;display:flex;align-items:center;gap:14px;border-bottom:1.5px solid var(--gray-100)}
.cc-logo{
  width:52px;height:52px;border-radius:12px;
  object-fit:cover;flex-shrink:0;
  background:var(--blue-light);
  display:flex;align-items:center;justify-content:center;
  font-size:20px;color:var(--blue);font-weight:800;
  overflow:hidden;
  min-width:52px;
}
.cc-logo img{width:100%;height:100%;object-fit:cover}
.cc-name{font-size:15px;font-weight:800;color:var(--blue);line-height:1.3;margin-bottom:3px;word-break:break-word}
.cc-bidang{font-size:11px;color:var(--gray-400);font-weight:500;word-break:break-word}

.cc-body{padding:16px 20px;flex:1;display:flex;flex-direction:column;gap:10px}
.cc-row{display:flex;align-items:flex-start;gap:10px}
.cc-row-icon{
  width:26px;height:26px;border-radius:6px;flex-shrink:0;
  background:var(--gray-100);
  display:flex;align-items:center;justify-content:center;
  font-size:11px;color:var(--gray-500);margin-top:1px;
}
.cc-row-label{font-size:10px;font-weight:600;color:var(--gray-400);text-transform:uppercase;letter-spacing:.05em;margin-bottom:2px}
.cc-row-val{font-size:13px;font-weight:600;color:var(--gray-800)}

.cc-footer{padding:14px 20px;border-top:1.5px solid var(--gray-100)}

/* KUOTA CHIP */
.kuota-chip{
  display:inline-flex;align-items:center;gap:5px;
  font-size:11px;font-weight:700;padding:3px 10px;border-radius:100px;
  margin-bottom:12px;
}
.kuota-ok{background:var(--green-light);color:var(--green);border:1.5px solid #BBF7D0}
.kuota-habis{background:var(--red-light);color:var(--red);border:1.5px solid #FED7D7}

/* BUTTONS */
.btn-booking{
  width:100%;padding:11px;border-radius:var(--radius);
  background:var(--blue);color:var(--white);
  font-family:var(--font);font-size:13px;font-weight:700;
  border:none;cursor:pointer;
  display:flex;align-items:center;justify-content:center;gap:8px;
  text-decoration:none;
  transition:background .15s,transform .12s;
}
.btn-booking:hover{background:var(--blue-mid);transform:translateY(-1px)}
.btn-booking.disabled{background:var(--gray-300);color:var(--gray-500);cursor:not-allowed;pointer-events:none}
.btn-booking.view-only{background:var(--gray-100);color:var(--gray-500);cursor:default;pointer-events:none}

/* HISTORY TABLE CARD */
.card{background:var(--white);border:1.5px solid var(--gray-200);border-radius:var(--radius-lg);padding:24px}
.card-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:20px}
.card-title-wrap{display:flex;align-items:center;gap:10px}
.card-icon-sm{width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:12px}
.cis-blue{background:var(--blue-light);color:var(--blue)}
.card-title{font-size:15px;font-weight:700;color:var(--blue)}

/* TABLE */
.table-wrap{overflow-x:auto;margin:0 -4px}
table{width:100%;border-collapse:collapse;min-width:500px}
thead tr{border-bottom:1.5px solid var(--gray-200)}
th{padding:11px 14px;text-align:left;font-size:11px;font-weight:700;color:var(--gray-400);letter-spacing:.06em;text-transform:uppercase;white-space:nowrap}
tbody tr{border-bottom:1.5px solid var(--gray-100);transition:background .12s}
tbody tr:last-child{border-bottom:none}
tbody tr:hover{background:var(--gray-50)}
td{padding:13px 14px;font-size:13px;color:var(--gray-800);vertical-align:middle}
td strong{font-weight:700;color:var(--blue)}
.co-addr{font-size:11px;color:var(--gray-400);margin-top:1px}

.badge{display:inline-flex;align-items:center;gap:4px;padding:4px 10px;border-radius:100px;font-size:11px;font-weight:700;letter-spacing:.02em}
.b-wait{background:var(--amber-light);color:var(--amber);border:1.5px solid #FDE68A}
.b-ok{background:var(--green-light);color:var(--green);border:1.5px solid #BBF7D0}
.b-reject{background:var(--red-light);color:var(--red);border:1.5px solid #FED7D7}
.b-gray{background:var(--gray-100);color:var(--gray-400);border:1.5px solid var(--gray-200)}

/* Section title above grid */
.section-title{
  display:flex;align-items:center;gap:10px;
  margin-bottom:16px;
}
.section-title h3{font-size:16px;font-weight:800;color:var(--blue)}
.section-title span{font-size:12px;color:var(--gray-400);font-weight:500}

/* PAGINATION */
.pagination{
  display:flex;
  flex-direction:row;
  align-items:center;
  justify-content:flex-end;
  margin-top:clamp(14px,2.5vh,18px);
  margin-bottom:clamp(20px,3.5vh,28px);
  padding:clamp(10px,1.8vh,13px) clamp(12px,2.5vw,16px);
  border-left:2.5px solid var(--teal);
  gap:clamp(10px,2vw,14px);
  background:var(--gray-50);
  border-radius:8px;
}

.pagination-info{
  font-size:clamp(10px,1.1vw,11px);
  color:var(--gray-600);
  display:flex;
  align-items:center;
  gap:5px;
  white-space:nowrap;
  flex-shrink:0;
}

.pagination-info i{
  font-size:clamp(10px,1vw,11px);
}

.pagination-info strong{
  color:var(--teal);
  font-weight:600;
}

.pagination-wrapper{
  display:flex;
  gap:clamp(3px,0.5vw,5px);
  align-items:center;
  flex-wrap:nowrap;
}

.pagination .page-link{
  display:inline-flex;
  align-items:center;
  justify-content:center;
  padding:clamp(5px,1vh,7px) clamp(8px,1.8vw,11px);
  border-radius:6px;
  font-size:clamp(10px,1vw,11px);
  font-weight:500;
  text-decoration:none;
  transition:all .2s ease;
  border:1px solid var(--gray-200);
  color:var(--gray-600);
  background:var(--white);
  white-space:nowrap;
  cursor:pointer;
  box-shadow:none;
}

.pagination .page-link:hover:not(.disabled){
  border-color:var(--teal);
  color:var(--teal);
  background:rgba(42,157,143,0.08);
}

.pagination .page-link:active:not(.disabled){
  background:rgba(42,157,143,0.12);
}

.pagination .page-link.active{
  background:var(--teal);
  color:var(--white);
  border-color:var(--teal);
  pointer-events:none;
}

.pagination .page-link.disabled{
  opacity:.4;
  cursor:not-allowed;
  pointer-events:none;
}

.page-separator{
  display:none !important;
}

/* Override Laravel Pagination */
.pagination{list-style:none;padding:0;margin:0}
.pagination li{display:inline-flex;margin:0}

@keyframes fadeUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
.fu{animation:fadeUp .4s ease-out both}
.fu-1{animation-delay:.05s}.fu-2{animation-delay:.1s}.fu-3{animation-delay:.15s}

@media(max-width:480px){
  .pagination{
    padding:9px 10px;
    gap:8px;
    justify-content:flex-start;
    overflow-x:auto;
  }
  .pagination-info{
    font-size:9px;
    gap:3px;
  }
  .pagination .page-link{
    padding:5px 7px;
    font-size:9px;
  }
}

@media(min-width:481px) and (max-width:768px){
  .pagination{
    padding:10px 12px;
    gap:9px;
  }
  .pagination-info{
    font-size:10px;
  }
  .pagination .page-link{
    padding:5px 9px;
    font-size:10px;
  }
}

/* TABLET */
@media(max-width:900px){
  .sidebar{display:none}
  .main-inner{padding:20px 16px 40px}
  .company-grid{grid-template-columns:1fr}
  .topbar{flex-direction:column}
}

/* MOBILE LANDSCAPE */
@media(max-width:768px){
  .main-inner{padding:16px 14px 32px}
  .topbar-title{font-size:clamp(18px,5vw,24px)}
  .topbar-sub{font-size:13px}
  .topbar{margin-bottom:20px;padding-bottom:16px}
  .company-grid{gap:14px;margin-bottom:20px}
  .company-card{border-radius:var(--radius)}
  .cc-header{padding:16px;gap:12px}
  .cc-logo{width:48px;height:48px}
  .cc-name{font-size:14px}
  .cc-bidang{font-size:10px}
  .cc-body{padding:12px 16px;gap:8px}
  .cc-row-label{font-size:9px}
  .cc-row-val{font-size:12px}
  .cc-footer{padding:12px 16px}
  .kuota-chip{font-size:10px;padding:2px 8px;margin-bottom:10px}
  .btn-booking{padding:10px;font-size:12px;gap:6px}
  .card{padding:18px}
  .card-title{font-size:14px}
  .table-wrap{margin:0 -8px}
  table{min-width:100%;font-size:12px}
  th{padding:9px 10px;font-size:10px}
  td{padding:10px;font-size:12px}
}

/* MOBILE PORTRAIT */
@media(max-width:480px){
  .main-inner{padding:12px 12px 28px}
  
  /* Topbar */
  .topbar{margin-bottom:16px;padding-bottom:12px;gap:8px}
  .topbar-tag{font-size:10px;padding:3px 10px;margin-bottom:6px}
  .topbar-title{font-size:clamp(16px,4vw,20px);margin-bottom:2px}
  .topbar-sub{font-size:12px;color:var(--gray-500)}
  
  /* Alert Banner */
  .banner-alert{padding:12px 14px;gap:12px;margin-bottom:16px;border-radius:var(--radius)}
  .banner-alert i{font-size:16px}
  .banner-alert-text{font-size:12px;line-height:1.5}
  
  /* Section title */
  .section-title{margin-bottom:12px}
  .section-title h3{font-size:14px}
  .section-title span{font-size:11px}
  
  /* Company Grid */
  .company-grid{grid-template-columns:1fr;gap:12px;margin-bottom:16px}
  
  /* Company Card */
  .company-card{border-radius:8px;border:1px solid var(--gray-200)}
  .cc-header{padding:14px 12px;gap:10px}
  .cc-logo{width:44px;height:44px;font-size:18px}
  .cc-logo img{width:100%;height:100%;object-fit:cover}
  .cc-name{font-size:13px;font-weight:700}
  .cc-bidang{font-size:9px;margin-top:2px}
  
  .cc-body{padding:12px;gap:8px}
  .cc-row{gap:8px}
  .cc-row-icon{width:24px;height:24px;font-size:10px}
  .cc-row-label{font-size:9px;margin-bottom:1px}
  .cc-row-val{font-size:12px;line-height:1.3}
  
  .cc-footer{padding:12px;border-top:1px solid var(--gray-100)}
  
  /* Kuota Chip */
  .kuota-chip{font-size:10px;padding:2px 8px;margin-bottom:8px}
  .kuota-chip i{font-size:8px}
  
  /* Buttons */
  .btn-booking{padding:9px;border-radius:var(--radius);font-size:11px;font-weight:600;gap:6px}
  .btn-booking i{font-size:12px}
  
  /* Card */
  .card{padding:14px;margin-top:20px}
  .card-header{margin-bottom:14px;gap:8px}
  .card-icon-sm{width:28px;height:28px;font-size:11px}
  .card-title{font-size:13px}
  .card-header>span{font-size:10px}
  
  /* Table */
  .table-wrap{margin:0 -6px;border-radius:0}
  table{min-width:100%;font-size:11px}
  thead tr{border-bottom:1px solid var(--gray-200)}
  th{padding:8px 10px;font-size:9px;font-weight:600;letter-spacing:.02em}
  tbody tr{border-bottom:1px solid var(--gray-100)}
  td{padding:9px 10px;font-size:11px}
  .co-addr{font-size:10px;margin-top:0}
  
  /* Badge */
  .badge{font-size:10px;padding:3px 8px;gap:3px}
  .badge i{font-size:9px}
  
  /* Toast Error */
  .toast-error{min-width:280px;padding:16px 20px;font-size:13px;gap:10px}
  .toast-error i{font-size:18px}
  
  /* Pagination */
  .pagination{
    flex-direction:column;
    align-items:flex-start;
    justify-content:flex-start;
    gap:10px;
    padding:10px 12px;
    margin-bottom:16px;
  }
  .pagination-info{font-size:10px;flex-wrap:wrap}
  .pagination-info strong{font-weight:600}
  .pagination-wrapper{gap:4px;width:100%;overflow-x:auto;flex-wrap:nowrap}
  .pagination .page-link{padding:5px 6px;font-size:9px;min-width:auto}
  
  /* Override animations for mobile */
  .fu{animation:none;opacity:1;transform:none !important}
  
  /* Mobile Navigation */
  .hamburger-btn{display:flex}
  .sidebar{position:fixed;left:-100%;top:0;z-index:999;transition:left .3s ease}
  .mobile-nav-overlay{display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,.5);z-index:998;cursor:pointer}
  .mobile-nav-overlay.active{display:block}
  .sidebar.active{left:0}
  .topbar{flex-direction:row;justify-content:space-between}
}

/* HAMBURGER BUTTON */
.hamburger-btn{
  display:none;
  align-items:center;
  justify-content:center;
  width:36px;
  height:36px;
  background:var(--white);
  border:1.5px solid var(--gray-200);
  border-radius:8px;
  cursor:pointer;
  transition:all .2s;
  flex-shrink:0;
  padding:0;
}
.hamburger-btn:hover{
  background:var(--gray-100);
  border-color:var(--gray-300);
}
.hamburger-btn i{
  color:var(--blue);
  font-size:18px;
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

  <!-- MOBILE OVERLAY -->
  <div class="mobile-nav-overlay" id="mobileOverlay"></div>

  <!-- MAIN -->
  <main class="main">
    <div class="main-inner">

      <!-- HAMBURGER BUTTON -->
      <button class="hamburger-btn" id="hamburgerBtn">
        <i class="fa-solid fa-bars"></i>
      </button>

      <!-- ERROR TOAST -->
      @if(session('error'))
      <div class="toast-error" id="errorToast">
        <i class="fa-solid fa-circle-exclamation" style="font-size:20px"></i>
        <span>{{ session('error') }}</span>
      </div>
      <script>
        setTimeout(() => {
          const t = document.getElementById('errorToast');
          if(t) t.style.display = 'none';
        }, 2500);
      </script>
      @endif

      <!-- TOPBAR -->
      <div class="topbar fu">
        <div>
          <div class="topbar-tag"><i class="fa-solid fa-magnifying-glass" style="font-size:9px"></i> Cari Perusahaan</div>
          <div class="topbar-title">Booking PKL</div>
          <div class="topbar-sub">Pilih perusahaan dan ajukan booking PKL-mu</div>
        </div>
      </div>

      <!-- BANNER: SUDAH DITERIMA -->
      @if(isset($approvedBooking))
      <div class="banner-alert fu">
        <i class="fa-solid fa-circle-check"></i>
        <div class="banner-alert-text">
          <strong>Selamat! Kamu sudah diterima PKL.</strong>
          Kamu tidak bisa mengajukan booking baru. Pantau detail PKL-mu di halaman
          <a href="{{ route('siswa.booking.status') }}">Status PKL</a>.
        </div>
      </div>
      @endif

      <!-- COMPANY GRID -->
      <div class="section-title fu fu-1">
        <h3>Perusahaan Tersedia</h3>
        <span>{{ $perusahaans->total() }} perusahaan mitra</span>
      </div>

      <div class="company-grid fu fu-2">
        @foreach($perusahaans as $perusahaan)
        @php
          $logoInitial = strtoupper(substr($perusahaan->nama_perusahaan ?? $perusahaan->nama, 0, 1));
          $kuotaOk = $perusahaan->kuota > 0;
          $isLocked = isset($approvedBooking);
        @endphp
        <div class="company-card {{ $isLocked ? 'disabled' : '' }}">
          <div class="cc-header">
            <div class="cc-logo">
              <img src="{{ $perusahaan->getLogoUrl() }}" alt="Logo" style="width:100%;height:100%;object-fit:cover;">
            </div>
            <div>
              <div class="cc-name">{{ $perusahaan->nama_perusahaan ?? $perusahaan->nama }}</div>
              <div class="cc-bidang"><i class="fa-solid fa-briefcase" style="font-size:10px;margin-right:4px"></i>{{ $perusahaan->bidang ?? '-' }}</div>
            </div>
          </div>

          <div class="cc-body">
            <div class="cc-row">
              <div class="cc-row-icon"><i class="fa-solid fa-briefcase"></i></div>
              <div>
                <div class="cc-row-label">Bidang Pekerjaan</div>
                <div class="cc-row-val">{{ $perusahaan->bidang ?? '-' }}</div>
              </div>
            </div>
            <div class="cc-row">
              <div class="cc-row-icon"><i class="fa-solid fa-graduation-cap"></i></div>
              <div>
                <div class="cc-row-label">Jurusan Dibutuhkan</div>
                <div class="cc-row-val">
                  @php
                    $jurusansData = $perusahaan->jurusan_dibutuhkan;
                    if (is_array($jurusansData)) {
                      $jurusans = $jurusansData;
                    } elseif (is_string($jurusansData)) {
                      $jurusans = json_decode($jurusansData, true);
                      if (!is_array($jurusans)) $jurusans = [];
                    } else {
                      $jurusans = [];
                    }
                  @endphp
                  @if(is_array($jurusans) && count($jurusans) > 0)
                    @foreach($jurusans as $jurusan)
                      <span style="display:inline-block; background:#E6F7F5; color:#2A9D8F; padding:4px 8px; border-radius:4px; font-size:12px; font-weight:600; margin-right:4px;">
                        {{ $jurusan }}
                      </span>
                    @endforeach
                  @else
                    -
                  @endif
                </div>
              </div>
            </div>
            <div class="cc-row">
              <div class="cc-row-icon"><i class="fa-solid fa-list-check"></i></div>
              <div>
                <div class="cc-row-label">Syarat PKL</div>
                <div class="cc-row-val">{{ $perusahaan->deskripsi ?? '-' }}</div>
              </div>
            </div>
          </div>

          <div class="cc-footer">
            <div class="kuota-chip {{ $kuotaOk ? 'kuota-ok' : 'kuota-habis' }}">
              <i class="fa-solid fa-{{ $kuotaOk ? 'users' : 'ban' }}" style="font-size:9px"></i>
              Kuota: {{ $perusahaan->kuota }} slot{{ $kuotaOk ? ' tersisa' : ' — Penuh' }}
            </div>

            @if($isLocked)
              <div class="btn-booking view-only">
                <i class="fa-solid fa-lock"></i> Sudah Diterima
              </div>
            @elseif($kuotaOk)
              <a href="{{ route('siswa.booking.konfirmasi', $perusahaan->id) }}" class="btn-booking">
                <i class="fa-solid fa-paper-plane"></i> Ajukan Booking
              </a>
            @else
              <div class="btn-booking disabled">
                <i class="fa-solid fa-ban"></i> Kuota Habis
              </div>
            @endif
          </div>
        </div>
        @endforeach
      </div>

      <!-- PAGINATION -->
      @if($perusahaans->hasPages())
      <div class="pagination fu fu-3">
        <div class="pagination-info">
          <i class="fa-solid fa-database" style="color:var(--teal);font-size:clamp(13px,1.8vw,15px);flex-shrink:0"></i>
          <span>Menampilkan <strong>{{ $perusahaans->firstItem() }}</strong> - <strong>{{ $perusahaans->lastItem() }}</strong> dari <strong>{{ $perusahaans->total() }}</strong> perusahaan</span>
        </div>
        <div class="pagination-wrapper">
          {{ $perusahaans->links('vendor.pagination.custom') }}
        </div>
      </div>
      @endif

      <!-- RIWAYAT BOOKING -->
      @if($bookings->count() > 0)
      <div class="card fu fu-3" style="margin-top:clamp(32px,5vh,40px)">
        <div class="card-header">
          <div class="card-title-wrap">
            <div class="card-icon-sm cis-blue"><i class="fa-solid fa-clock-rotate-left"></i></div>
            <div class="card-title">Riwayat Booking</div>
          </div>
          <span style="font-size:11px;color:var(--gray-400)">{{ $bookings->count() }} pengajuan</span>
        </div>
        <div class="table-wrap">
          <table>
            <thead>
              <tr>
                <th>Perusahaan</th>
                <th>Alamat</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach($bookings as $booking)
              @php
                $st = strtolower($booking->status);
                $pill = match($st){
                  'menunggu'=>'b-wait','diterima'=>'b-ok','ditolak'=>'b-reject',default=>'b-gray'
                };
              @endphp
              <tr>
                <td><strong>{{ $booking->perusahaan->nama_perusahaan ?? $booking->perusahaan->nama }}</strong></td>
                <td>
                  <div>{{ $booking->perusahaan->alamat ?? '-' }}</div>
                </td>
                <td><span class="badge {{ $pill }}">{{ ucfirst($booking->status) }}</span></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="pagination" style="margin-top:16px">
          <div class="pagination-info">
            <i class="fa-solid fa-history" style="color:var(--teal);font-size:clamp(13px,1.8vw,15px);flex-shrink:0"></i>
            <span>Menampilkan <strong>{{ $bookings->firstItem() ?? 0 }}</strong> - <strong>{{ $bookings->lastItem() ?? 0 }}</strong> dari <strong>{{ $bookings->total() }}</strong> pengajuan</span>
          </div>
          <div class="pagination-wrapper">
            {{ $bookings->links('vendor.pagination.custom') }}
          </div>
        </div>
      </div>
      @endif

    </div>
  </main>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const hamburger = document.getElementById('hamburgerBtn');
  const sidebar = document.querySelector('.sidebar');
  const overlay = document.getElementById('mobileOverlay');
  
  if (hamburger) {
    hamburger.addEventListener('click', function(e) {
      e.preventDefault();
      sidebar.classList.toggle('active');
      overlay.classList.toggle('active');
    });
  }
  
  if (overlay) {
    overlay.addEventListener('click', function() {
      sidebar.classList.remove('active');
      overlay.classList.remove('active');
    });
  }
  
  // Close drawer when clicking nav links
  const navLinks = document.querySelectorAll('.sidebar .menu a, .sidebar .logo');
  navLinks.forEach(link => {
    link.addEventListener('click', function() {
      sidebar.classList.remove('active');
      overlay.classList.remove('active');
    });
  });
  
  // Close drawer when clicking logout
  const logoutBtn = document.querySelector('.sidebar .logout-btn');
  if (logoutBtn) {
    logoutBtn.addEventListener('click', function() {
      sidebar.classList.remove('active');
      overlay.classList.remove('active');
    });
  }
});
</script>

@endsection