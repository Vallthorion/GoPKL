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
  --amber:#D97706;
  --amber-light:#FFFBEB;
  --red:#DC2626;
  --red-light:#FFF5F5;
  --green:#16A34A;
  --green-light:#F0FDF4;
  --font:'Plus Jakarta Sans',sans-serif;
  --radius:10px;
  --radius-lg:16px;
  --shadow:0 1px 3px rgba(30,58,95,0.06),0 4px 12px rgba(30,58,95,0.05);
}

*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
body{font-family:var(--font);background:var(--gray-50);color:var(--gray-800);min-height:100vh}
.wrapper{display:flex;min-height:100vh}

/* ── SIDEBAR ── */
.sidebar{width:256px;flex-shrink:0;background:var(--white);border-right:1.5px solid var(--gray-200);display:flex;flex-direction:column;position:sticky;top:0;height:100vh;overflow-y:auto}
.sidebar-logo-wrap{padding:clamp(14px,2vh,20px) clamp(14px,2vw,20px) 0;border-bottom:1.5px solid var(--gray-200)}
.logo{display:flex;align-items:center;gap:9px;text-decoration:none;padding-bottom:18px}
.logo-icon{width:clamp(28px,5vw,32px);height:clamp(28px,5vw,32px);background:var(--blue);border-radius:8px;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:clamp(11px,1.5vw,13px);color:var(--white);flex-shrink:0}
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

.nav-section{padding:16px 20px 0}
.nav-label{font-size:10px;font-weight:700;letter-spacing:.08em;color:var(--gray-400);text-transform:uppercase;padding:0 4px;margin-bottom:6px}
.menu{display:flex;flex-direction:column;gap:2px;padding-bottom:16px}
.menu a{display:flex;align-items:center;gap:10px;padding:10px 12px;border-radius:var(--radius);color:var(--gray-600);text-decoration:none;font-size:13px;font-weight:500;transition:all .15s}
.menu a:hover{background:var(--gray-100);color:var(--gray-800)}
.menu a.active{background:var(--blue-light);color:var(--blue);font-weight:700}
.menu a i{width:16px;text-align:center;font-size:13px}
.menu-divider{height:1.5px;background:var(--gray-200);margin:8px 20px}

.sidebar-footer{margin-top:auto;padding:16px 20px;border-top:1.5px solid var(--gray-200)}
.logout-btn{width:100%;display:flex;align-items:center;gap:9px;padding:10px 12px;border-radius:var(--radius);background:var(--red-light);border:1.5px solid #FED7D7;color:var(--red);font-size:13px;font-weight:600;cursor:pointer;font-family:var(--font);transition:all .15s}
.logout-btn:hover{background:#FED7D7}

/* ── MAIN ── */
.main{flex:1;min-width:0}
.main-inner{padding:32px 36px 60px}

/* PAGE HEADER */
.page-header{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:28px;animation:fadeUp .4s ease-out both;flex-wrap:wrap;gap:16px}
.page-tag{display:inline-flex;align-items:center;gap:6px;background:var(--blue-light);color:var(--blue);font-size:11px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:4px 12px;border-radius:100px;margin-bottom:8px}
.page-title{font-size:28px;font-weight:800;color:var(--blue);letter-spacing:-.5px}
.page-sub{font-size:14px;color:var(--gray-600);margin-top:4px}
.topbar-actions{display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-top:8px}

/* BUTTONS */
.btn-primary{display:inline-flex;align-items:center;gap:7px;background:var(--blue);color:var(--white);padding:10px 18px;border-radius:var(--radius);font-size:13px;font-weight:700;text-decoration:none;transition:all .15s;box-shadow:0 2px 8px rgba(30,58,95,0.2)}
.btn-primary:hover{background:var(--blue-mid);transform:translateY(-1px);box-shadow:0 6px 16px rgba(30,58,95,0.28)}
.btn-outline{display:inline-flex;align-items:center;gap:7px;background:var(--white);color:var(--gray-600);border:1.5px solid var(--gray-200);padding:9px 16px;border-radius:var(--radius);font-size:13px;font-weight:600;text-decoration:none;transition:all .15s}
.btn-outline:hover{border-color:var(--blue);color:var(--blue);background:var(--blue-light)}

/* ALERT */
.alert-success{background:var(--green-light);border:1.5px solid #BBF7D0;border-radius:var(--radius-lg);padding:14px 16px;margin-bottom:24px;display:flex;align-items:flex-start;gap:12px}
.alert-success i{color:var(--green);font-size:16px;margin-top:1px;flex-shrink:0}
.alert-success-title{font-size:13px;font-weight:700;color:var(--green)}

/* GLASS CARD */
.glass-card{background:var(--white);border:1.5px solid var(--gray-200);border-radius:var(--radius-lg);padding:24px;animation:fadeUp .4s ease-out .1s both}

/* STATS ROW */
.stats-row{display:grid;grid-template-columns:repeat(auto-fit,minmax(160px,1fr));gap:14px;margin-bottom:24px;animation:fadeUp .4s ease-out .05s both}
.stat-card{background:var(--white);border:1.5px solid var(--gray-200);border-radius:var(--radius-lg);padding:18px 20px;display:flex;align-items:center;gap:14px;transition:all .2s}
.stat-card:hover{border-color:var(--blue);box-shadow:var(--shadow)}
.stat-icon{width:42px;height:42px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:16px;flex-shrink:0}
.stat-icon.blue{background:var(--blue-light);color:var(--blue)}
.stat-icon.teal{background:var(--teal-light);color:var(--teal)}
.stat-icon.amber{background:var(--amber-light);color:var(--amber)}
.stat-icon.green{background:var(--green-light);color:var(--green)}
.stat-val{font-size:22px;font-weight:800;color:var(--blue);line-height:1}
.stat-lbl{font-size:11px;color:var(--gray-600);margin-top:3px;font-weight:500}

/* TOOLBAR */
.toolbar{display:flex;gap:12px;margin-bottom:20px;flex-wrap:wrap;align-items:center}
.search-wrap{position:relative;flex:1;min-width:200px;max-width:400px}
.search-wrap i{position:absolute;left:12px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:13px;pointer-events:none}
.search-wrap input{width:100%;padding:9px 12px 9px 36px;background:var(--gray-50);border:1.5px solid var(--gray-200);border-radius:var(--radius);font-family:var(--font);font-size:13px;color:var(--gray-800);outline:none;transition:border-color .15s}
.search-wrap input::placeholder{color:var(--gray-400)}
.search-wrap input:focus{border-color:var(--blue);box-shadow:0 0 0 3px rgba(30,58,95,0.08)}

.view-toggle{display:flex;background:var(--gray-100);border-radius:var(--radius);padding:3px;gap:2px}
.view-btn{width:32px;height:32px;border-radius:8px;border:none;background:transparent;color:var(--gray-400);font-size:13px;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all .15s;font-family:var(--font)}
.view-btn.active{background:var(--white);color:var(--blue);box-shadow:0 1px 4px rgba(30,58,95,0.12)}

.toolbar-right{display:flex;align-items:center;gap:8px;margin-left:auto}

/* LOADING BAR */
.loading-bar{height:2.5px;background:linear-gradient(90deg,var(--blue),var(--teal));border-radius:2px;width:0;margin-bottom:16px;display:none}
.loading-bar.active{display:block;animation:loadAnim 1s ease-in-out infinite}
@keyframes loadAnim{0%{width:20%;margin-left:0}50%{width:40%;margin-left:30%}100%{width:20%;margin-left:0}}

/* ── COMPANY GRID (CARD VIEW) ── */
.company-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:18px}

.company-card{
  background:var(--white);
  border:1.5px solid var(--gray-200);
  border-radius:var(--radius-lg);
  overflow:hidden;
  transition:all .22s cubic-bezier(.25,.8,.25,1);
  position:relative;
  display:flex;
  flex-direction:column;
}
.company-card:hover{
  border-color:rgba(30,58,95,0.25);
  box-shadow:0 12px 32px rgba(30,58,95,0.1),0 2px 8px rgba(30,58,95,0.06);
  transform:translateY(-3px);
}

/* Colored top accent */
.card-accent{
  height:4px;
  background:linear-gradient(90deg,var(--blue),var(--teal));
  width:100%;
}

/* Card header area */
.card-head{
  padding:16px 18px 14px;
  display:flex;
  align-items:flex-start;
  gap:12px;
  border-bottom:1.5px solid var(--gray-100);
}
.company-logo{
  width:38px;
  height:38px;
  border-radius:12px;
  background:linear-gradient(135deg,var(--blue) 0%,var(--teal) 100%);
  display:flex;
  align-items:center;
  justify-content:center;
  font-weight:800;
  font-size:13px;
  color:var(--white);
  flex-shrink:0;
  letter-spacing:-.5px;
}
.company-logo img,
.list-logo img{
  width:100%;
  height:100%;
  object-fit:cover;
  border-radius:12px;
}
.company-head-info{flex:1;min-width:0}
.company-name{font-size:14px;font-weight:800;color:var(--blue);margin:0 0 3px;line-height:1.3;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.company-location{font-size:12px;color:var(--gray-600);display:flex;align-items:center;gap:5px}
.company-location i{font-size:11px;color:var(--teal)}

/* Card body */
.card-body{padding:16px 20px;flex:1}
.info-row{display:flex;align-items:center;gap:10px;padding:7px 0;border-bottom:1px dashed var(--gray-100)}
.info-row:last-child{border-bottom:none}
.info-icon{width:26px;height:26px;border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:11px;flex-shrink:0}
.info-icon.blue{background:var(--blue-light);color:var(--blue)}
.info-icon.teal{background:var(--teal-light);color:var(--teal)}
.info-icon.amber{background:var(--amber-light);color:var(--amber)}
.info-label{font-size:11px;color:var(--gray-400);font-weight:500;flex:1}
.info-value{font-size:12px;font-weight:700;color:var(--blue)}

/* Badge */
.company-badge{display:inline-flex;align-items:center;gap:4px;padding:3px 10px;border-radius:100px;font-size:11px;font-weight:700}
.b-blue{background:var(--blue-light);color:var(--blue);border:1.5px solid rgba(30,58,95,0.12)}
.b-teal{background:var(--teal-light);color:var(--teal);border:1.5px solid rgba(42,157,143,0.2)}
.b-amber{background:var(--amber-light);color:var(--amber);border:1.5px solid #FDE68A}

/* Card footer */
.card-foot{
  padding:12px 16px;
  background:var(--gray-50);
  border-top:1.5px solid var(--gray-100);
  display:flex;
  align-items:center;
  justify-content:space-between;
}
.card-foot-left{font-size:11px;color:var(--gray-400)}
.card-foot-actions{display:flex;gap:6px}

.act-btn{
  width:30px;height:30px;
  border-radius:8px;
  display:flex;align-items:center;justify-content:center;
  font-size:12px;
  text-decoration:none;
  border:1.5px solid transparent;
  transition:all .15s;
  cursor:pointer;
  background:none;
  color:var(--gray-600);
}
.act-view{background:var(--blue-light);color:var(--blue);border-color:rgba(30,58,95,0.12)}
.act-view:hover{background:var(--blue);color:var(--white);transform:scale(1.05)}
.act-edit{background:var(--teal-light);color:var(--teal);border-color:rgba(42,157,143,0.2)}
.act-edit:hover{background:var(--teal);color:var(--white);transform:scale(1.05)}
.act-del{background:var(--red-light);color:var(--red);border-color:#FED7D7}
.act-del:hover{background:var(--red);color:var(--white);transform:scale(1.05)}

/* ── LIST VIEW ── */
.company-list{display:none;flex-direction:column;gap:10px}
.company-list.active,.company-grid.active{display:grid}
.company-list.active{display:flex}

.list-item{
  background:var(--white);
  border:1.5px solid var(--gray-200);
  border-radius:var(--radius);
  padding:14px 18px;
  display:flex;
  align-items:center;
  gap:16px;
  transition:all .18s;
}
.list-item:hover{border-color:var(--blue);box-shadow:0 4px 16px rgba(30,58,95,0.08)}
.list-logo{width:44px;height:44px;border-radius:50%;background:linear-gradient(135deg,var(--blue),var(--teal));display:flex;align-items:center;justify-content:center;font-weight:800;font-size:14px;color:var(--white);flex-shrink:0;overflow:hidden}
.list-logo img{width:100%;height:100%;object-fit:cover;display:block}
.list-main{flex:1;min-width:0}
.list-name{font-size:13px;font-weight:800;color:var(--blue)}
.list-sub{font-size:12px;color:var(--gray-600);margin-top:2px}
.list-meta{display:flex;gap:16px;align-items:center}
.list-meta-item{font-size:12px;color:var(--gray-600);white-space:nowrap}
.list-meta-item strong{color:var(--blue);font-weight:700}
.list-actions{display:flex;gap:6px;flex-shrink:0}

/* EMPTY STATE */
.empty-card{
  grid-column:1/-1;
  text-align:center;
  padding:64px 24px;
  background:var(--gray-50);
  border:2px dashed var(--gray-200);
  border-radius:var(--radius-lg);
}
.empty-icon{
  width:64px;height:64px;
  border-radius:16px;
  background:var(--gray-100);
  display:flex;align-items:center;justify-content:center;
  font-size:26px;color:var(--gray-400);
  margin:0 auto 16px;
}
.empty-title{font-size:15px;font-weight:700;color:var(--gray-800);margin-bottom:6px}
.empty-sub{font-size:13px;color:var(--gray-600)}

/* PAGINATION */
.pag-wrap{display:flex;align-items:center;justify-content:space-between;margin-top:20px;padding-top:20px;border-top:1.5px solid var(--gray-200);flex-wrap:wrap;gap:12px}
.pag-info{font-size:12px;color:var(--gray-600)}
.pag-info strong{color:var(--gray-800);font-weight:700}
.pag-btns{display:flex;gap:6px}
.pag-btn{display:inline-flex;align-items:center;gap:6px;padding:8px 14px;border-radius:var(--radius);font-size:12px;font-weight:600;text-decoration:none;transition:all .15s;border:1.5px solid var(--gray-200);color:var(--gray-600);background:var(--white)}
.pag-btn:hover{border-color:var(--blue);color:var(--blue);background:var(--blue-light)}
.pag-btn.disabled{opacity:.4;pointer-events:none}

@keyframes fadeUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}

@media(max-width:900px){
  .sidebar{display:none}
  .main-inner{padding:20px 16px 40px}
  .company-grid{grid-template-columns:1fr}
  .stats-row{grid-template-columns:repeat(2,1fr)}
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

      <!-- PAGE HEADER -->
      <div class="page-header">
        <div>
          <div class="page-tag"><i class="fa-solid fa-building"></i> Manajemen Data</div>
          <div class="page-title">Data Perusahaan</div>
          <div class="page-sub">Kelola seluruh perusahaan mitra program PKL</div>
        </div>
        <div class="topbar-actions">
          <a href="{{ route('admin.perusahaan.exportPdf') }}" class="btn-outline">
            <i class="fa-solid fa-file-pdf"></i> Export PDF
          </a>
          <a href="{{ route('admin.perusahaan.create') }}" class="btn-primary">
            <i class="fa-solid fa-plus"></i> Tambah Perusahaan
          </a>
        </div>
      </div>

      <!-- STATS ROW -->
      <div class="stats-row">
        <div class="stat-card">
          <div class="stat-icon blue"><i class="fa-solid fa-building"></i></div>
          <div>
            <div class="stat-val">{{ $totalPerusahaan ?? 0 }}</div>
            <div class="stat-lbl">Total Perusahaan</div>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon amber"><i class="fa-solid fa-users"></i></div>
          <div>
            <div class="stat-val">{{ number_format($totalKuota ?? 0, 0, '', '') }}</div>
            <div class="stat-lbl">Total Kuota</div>
          </div>
        </div>
      </div>

      <!-- ALERT -->
      @if (session('success'))
      <div class="alert-success">
        <i class="fa-solid fa-check-circle"></i>
        <div>
          <div class="alert-success-title">Berhasil!</div>
          <div style="font-size:13px;color:var(--green);margin-top:2px">{{ session('success') }}</div>
        </div>
      </div>
      @endif

      <!-- MAIN CARD -->
      <div class="glass-card">

        <!-- TOOLBAR -->
        <div class="toolbar">
          <div class="search-wrap">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="search" placeholder="Cari nama perusahaan atau lokasi...">
          </div>
        </div>

        <div class="loading-bar" id="loading"></div>

        <!-- LIST VIEW -->
        <div class="company-list active" id="perusahaan-list">
          @include('admin.perusahaan.table-list', ['perusahaans' => $perusahaans])
        </div>

        <!-- PAGINATION -->
        @if ($perusahaans->hasPages())
        <div class="pag-wrap">
          <div class="pag-info">
            Menampilkan <strong>{{ $perusahaans->count() }}</strong> dari <strong>{{ $perusahaans->total() }}</strong> perusahaan
          </div>
          <div class="pag-btns">
            @if ($perusahaans->onFirstPage())
            <span class="pag-btn disabled"><i class="fa-solid fa-chevron-left"></i> Sebelumnya</span>
            @else
            <a href="{{ $perusahaans->previousPageUrl() }}" class="pag-btn"><i class="fa-solid fa-chevron-left"></i> Sebelumnya</a>
            @endif
            @if ($perusahaans->hasMorePages())
            <a href="{{ $perusahaans->nextPageUrl() }}" class="pag-btn">Selanjutnya <i class="fa-solid fa-chevron-right"></i></a>
            @else
            <span class="pag-btn disabled">Selanjutnya <i class="fa-solid fa-chevron-right"></i></span>
            @endif
          </div>
        </div>
        @endif

      </div>
    </div>
  </main>
</div>

<script>
  let timeout;
  const searchInput = document.getElementById('search');
  const loadingBar  = document.getElementById('loading');
  const listView    = document.getElementById('perusahaan-list');

  /* SEARCH */
  searchInput.addEventListener('keyup', function() {
    clearTimeout(timeout);
    loadingBar.classList.add('active');
    const keyword = this.value.trim();
    timeout = setTimeout(() => {
      fetch(`/admin/perusahaan?search=${encodeURIComponent(keyword)}`, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
      })
      .then(r => r.text())
      .then(html => {
        listView.innerHTML = html;
        loadingBar.classList.remove('active');
      })
      .catch(() => loadingBar.classList.remove('active'));
    }, 300);
  });

  /* DELETE CONFIRM */
  document.addEventListener('click', function(e) {
    const btn = e.target.closest('.delete-btn');
    if (!btn) return;
    e.preventDefault();
    if (confirm('Yakin ingin menghapus perusahaan ini? Tindakan ini tidak dapat dibatalkan.')) {
      const form = btn.closest('form');
      if (form) form.submit();
    }
  });
</script>

@endsection