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
.sidebar{
  width:clamp(200px,15vw,280px);flex-shrink:0;
  background:var(--white);
  border-right:1.5px solid var(--gray-200);
  display:flex;flex-direction:column;
  position:sticky;top:0;height:100vh;overflow-y:auto;
}
.sidebar-logo-wrap{padding:clamp(14px,2vh,20px) clamp(14px,2vw,20px) 0;border-bottom:1.5px solid var(--gray-200)}
.logo{display:flex;align-items:center;gap:9px;text-decoration:none;padding-bottom:18px}
.logo-icon{
  width:clamp(28px,5vw,36px);height:clamp(28px,5vw,36px);background:var(--blue);border-radius:8px;
  display:flex;align-items:center;justify-content:center;
  font-weight:800;font-size:clamp(11px,1.5vw,15px);color:var(--white);flex-shrink:0;
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
.main-inner{padding:clamp(20px,3vh,32px) clamp(16px,3vw,36px) clamp(40px,6vh,60px);max-width:1400px}

/* TOPBAR */
.topbar{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:clamp(20px,4vh,28px);gap:clamp(12px,2vw,20px);padding-bottom:clamp(16px,3vh,24px);border-bottom:1.5px solid var(--gray-200)}
.topbar-tag{display:inline-flex;align-items:center;gap:7px;background:var(--blue-light);color:var(--blue);font-size:clamp(9px,1.2vw,11px);font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:clamp(3px,0.5vh,4px) clamp(8px,1.5vw,12px);border-radius:100px;margin-bottom:clamp(8px,1.5vh,10px)}
.topbar-title{font-size:clamp(20px,4vw,28px);font-weight:800;color:var(--blue);letter-spacing:-.5px}
.topbar-sub{font-size:clamp(12px,2vw,14px);color:var(--gray-600);margin-top:clamp(2px,0.5vh,4px)}
.topbar-actions{display:flex;align-items:center;gap:clamp(6px,1.5vw,8px);flex-wrap:wrap;flex-shrink:0}

/* BUTTONS */
.btn-primary{display:inline-flex;align-items:center;gap:7px;background:var(--blue);color:var(--white);padding:clamp(8px,1.5vh,10px) clamp(12px,2vw,18px);border-radius:var(--radius);font-size:clamp(12px,1.5vw,13px);font-weight:700;text-decoration:none;transition:background .15s,transform .12s,box-shadow .15s;box-shadow:0 2px 8px rgba(30,58,95,0.2)}
.btn-primary:hover{background:var(--blue-mid);transform:translateY(-1px);box-shadow:0 6px 16px rgba(30,58,95,0.28)}
.btn-teal{display:inline-flex;align-items:center;gap:7px;background:var(--teal-light);color:var(--teal);border:1.5px solid rgba(42,157,143,.25);padding:9px 16px;border-radius:var(--radius);font-size:13px;font-weight:700;text-decoration:none;transition:all .15s}
.btn-teal:hover{background:var(--teal);color:var(--white);border-color:var(--teal);transform:translateY(-1px)}
.btn-outline{display:inline-flex;align-items:center;gap:7px;background:var(--white);color:var(--gray-600);border:1.5px solid var(--gray-200);padding:9px 16px;border-radius:var(--radius);font-size:13px;font-weight:600;text-decoration:none;transition:all .15s}
.btn-outline:hover{border-color:var(--blue);color:var(--blue);background:var(--blue-light)}

/* TABLE CARD */
.card{background:var(--white);border:1.5px solid var(--gray-200);border-radius:var(--radius-lg);padding:clamp(16px,2.5vh,24px)}
.card-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:clamp(14px,2.5vh,20px)}
.card-title-wrap{display:flex;align-items:center;gap:clamp(8px,1.5vw,10px)}
.card-icon-sm{width:clamp(28px,5vw,32px);height:clamp(28px,5vw,32px);border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:clamp(10px,1.5vw,12px)}
.cis-purple{background:#E6DEFF;color:#9333EA}
.card-title{font-size:clamp(13px,2vw,15px);font-weight:700;color:var(--blue)}
.card-count{font-size:clamp(9px,1.2vw,11px);font-weight:700;padding:clamp(3px,0.5vh,3px) clamp(7px,1.2vw,9px);border-radius:100px;background:var(--gray-100);color:var(--gray-600)}

/* TOOLBAR */
.toolbar{display:flex;align-items:center;gap:clamp(8px,1.5vw,10px);margin-bottom:clamp(14px,2.5vh,20px);flex-wrap:wrap}
.search-wrap{position:relative;flex:1;min-width:clamp(160px,30vw,320px)}
.search-wrap i{position:absolute;left:clamp(10px,1.5vw,12px);top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:clamp(11px,1.5vw,13px);pointer-events:none}
.search-input{width:100%;padding:clamp(8px,1.5vh,9px) clamp(10px,1.5vw,12px) clamp(8px,1.5vh,9px) clamp(32px,5vw,36px);background:var(--gray-50);border:1.5px solid var(--gray-200);border-radius:var(--radius);font-family:var(--font);font-size:clamp(12px,1.5vw,13px);color:var(--gray-800);outline:none;transition:border-color .2s}
.search-input::placeholder{color:var(--gray-400)}
.search-input:focus{border-color:var(--blue)}
.filter-select{padding:9px 32px 9px 12px;background:var(--gray-50);border:1.5px solid var(--gray-200);border-radius:var(--radius);font-family:var(--font);font-size:13px;color:var(--gray-800);outline:none;transition:border-color .2s;cursor:pointer;appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6'%3E%3Cpath d='M0 0l5 6 5-6z' fill='%2394A3B8'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:calc(100% - 10px) center}
.filter-select:focus{border-color:var(--blue)}

/* TABLE */
.table-wrap{overflow-x:auto;margin:0 -4px}
table{width:100%;border-collapse:collapse;min-width:600px;font-size:clamp(11px,1.5vw,13px)}
thead tr{border-bottom:1.5px solid var(--gray-200)}
th{padding:clamp(9px,1.5vh,11px) clamp(10px,1.5vw,14px);text-align:left;font-size:clamp(9px,1.2vw,11px);font-weight:700;color:var(--gray-400);letter-spacing:.06em;text-transform:uppercase;white-space:nowrap}
tbody tr{border-bottom:1.5px solid var(--gray-100);transition:background .12s}
tbody tr:last-child{border-bottom:none}
tbody tr:hover{background:var(--gray-50)}
td{padding:clamp(10px,1.5vh,12px) clamp(10px,1.5vw,14px);color:var(--gray-800);vertical-align:middle}

/* AVATAR NAME CELL */
.avatar-name{display:flex;align-items:center;gap:11px}
.ava{width:clamp(30px,5vw,34px);height:clamp(30px,5vw,34px);border-radius:50%;background:linear-gradient(135deg,var(--blue),var(--teal));display:flex;align-items:center;justify-content:center;font-size:clamp(9px,1.2vw,11px);font-weight:700;color:var(--white);flex-shrink:0}
.ava-name{font-size:clamp(11px,1.8vw,13px);font-weight:700;color:var(--blue)}
.ava-nip{font-size:clamp(9px,1.2vw,11px);color:var(--gray-400);margin-top:1px;font-family:monospace}

/* BADGES */
.badge{display:inline-flex;align-items:center;gap:4px;padding:clamp(3px,0.5vh,4px) clamp(8px,1.5vw,10px);border-radius:100px;font-size:clamp(9px,1.2vw,11px);font-weight:700;letter-spacing:.02em}
.b-wali{background:#E6DEFF;color:#9333EA;border:1.5px solid #E9D5FF}
.b-kakomsli{background:#DCF5E3;color:#059669;border:1.5px solid #BBEF7F}
.b-kaprog{background:#FFF3CD;color:#856404;border:1.5px solid #FDE68A}

/* ACTIONS */
.actions{display:flex;align-items:center;gap:6px}
.act-btn{width:clamp(28px,5vw,32px);height:clamp(28px,5vw,32px);border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:clamp(10px,1.5vw,12px);text-decoration:none;border:1.5px solid transparent;transition:all .15s;cursor:pointer;background:none}
.act-edit{background:var(--blue-light);color:var(--blue);border-color:rgba(30,58,95,.12)}
.act-edit:hover{background:var(--blue);color:var(--white);border-color:var(--blue)}
.act-del{background:var(--red-light);color:var(--red);border-color:rgba(220,38,38,.15)}
.act-del:hover{background:var(--red);color:var(--white);border-color:var(--red)}

/* EMPTY STATE */
.empty-state{text-align:center;padding:clamp(32px,6vh,52px) clamp(16px,3vw,20px)}
.empty-icon{width:clamp(48px,8vw,64px);height:clamp(48px,8vw,64px);border-radius:16px;background:var(--gray-100);display:flex;align-items:center;justify-content:center;font-size:clamp(20px,3vw,26px);color:var(--gray-400);margin:0 auto clamp(12px,2vh,16px)}
.empty-title{font-size:clamp(13px,2vw,15px);font-weight:700;color:var(--gray-800);margin-bottom:6px}
.empty-sub{font-size:clamp(12px,1.8vw,13px);color:var(--gray-400)}

/* PAGINATION */
.pag-wrap{display:flex;align-items:center;justify-content:space-between;margin-top:clamp(14px,2.5vh,20px);padding-top:clamp(14px,2.5vh,20px);border-top:1.5px solid var(--gray-200);flex-wrap:wrap;gap:clamp(8px,1.5vw,12px)}
.pag-info{font-size:clamp(10px,1.5vw,12px);color:var(--gray-400)}
.pag-info strong{color:var(--gray-800);font-weight:700}
.pag-btns{display:flex;gap:clamp(4px,1vw,6px)}
.pag-btn{display:inline-flex;align-items:center;gap:6px;padding:clamp(6px,1.2vh,8px) clamp(10px,1.5vw,14px);border-radius:var(--radius);font-size:clamp(11px,1.3vw,12px);font-weight:600;text-decoration:none;transition:all .15s;border:1.5px solid var(--gray-200);color:var(--gray-600);background:var(--white)}
.pag-btn:hover{border-color:var(--blue);color:var(--blue);background:var(--blue-light)}
.pag-btn.disabled{opacity:.4;pointer-events:none}

/* ANIMATIONS */
@keyframes fadeUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
.fade-up{animation:fadeUp .4s ease-out both}
.d1{animation-delay:.05s}.d2{animation-delay:.1s}

/* ── RESPONSIVE DESIGN ── */
@media(max-width:480px){
  .wrapper{flex-direction:column}
  .sidebar{display:none}
  .main{width:100%}
  .main-inner{padding:clamp(12px,3vh,20px) clamp(12px,3vw,16px) 30px}
  .topbar{flex-direction:column;align-items:flex-start;gap:12px}
  .topbar-actions{width:100%;display:flex;gap:6px;flex-wrap:wrap}
  .topbar-actions .btn-primary{flex:1;min-width:120px;padding:8px 12px;font-size:12px}
  .toolbar{flex-direction:column}
  .search-wrap{max-width:100%}
  .filter-select{width:100%}
  table{font-size:12px;min-width:500px}
  th,td{padding:8px 10px}
}

@media(max-width:768px){
  .sidebar{display:none}
  .main-inner{padding:24px 20px 40px}
  .topbar{flex-direction:column;align-items:flex-start}
  .topbar-actions{width:100%;flex-wrap:wrap}
}

@media(min-width:769px) and (max-width:1024px){
  .sidebar{width:200px}
  .main-inner{padding:28px 24px 50px}
}

@media(min-width:1025px){
  .sidebar{width:240px}
  .main-inner{padding:32px 32px 60px;max-width:1200px}
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

      <!-- TOPBAR -->
      <div class="topbar fade-up">
        <div>
          <div class="topbar-tag">Manajemen Data</div>
          <div class="topbar-title">Data Guru</div>
          <div class="topbar-sub">Kelola seluruh data guru dan staff sekolah</div>
        </div>
        <div class="topbar-actions">
          <a href="{{ route('admin.guru.create') }}" class="btn-primary">
            <i class="fa-solid fa-plus"></i> Tambah Guru
          </a>
        </div>
      </div>

      <!-- TABLE CARD -->
      <div class="card fade-up d2">
        <div class="card-header">
          <div class="card-title-wrap">
            <div class="card-icon-sm cis-purple"><i class="fa-solid fa-chalkboard-user"></i></div>
            <div class="card-title">Daftar Guru</div>
          </div>
          <div class="card-count">{{ $gurus->total() }} guru</div>
        </div>

        <!-- TOOLBAR -->
        <div class="toolbar">
          <div class="search-wrap">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="search" class="search-input" placeholder="Cari nama atau NIP...">
          </div>
          <select id="type-filter" class="filter-select">
            <option value="">Semua Tipe</option>
            <option value="wali_kelas">Wali Kelas</option>
            <option value="kakomsli">Kakonsli</option>
            <option value="kaprog_pplg">Kaprog PPLG</option>
          </select>
          <a href="{{ route('admin.guru.exportPdf') }}" id="exportPdfBtn" class="btn-outline" target="_blank">
            <i class="fa-solid fa-file-pdf"></i> Export PDF
          </a>
        </div>

        <div class="table-wrap">
          <table>
            <thead>
              <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Tipe</th>
                <th>Username</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($gurus as $guru)
              <tr>
                <td><span style="font-family:monospace;font-weight:600;color:var(--blue)">{{ $guru->nip }}</span></td>
                <td>
                  <div class="avatar-name">
                    <div class="ava">{{ strtoupper(substr($guru->nama, 0, 1)) }}</div>
                    <div>
                      <div class="ava-name">{{ $guru->nama }}</div>
                    </div>
                  </div>
                </td>
                <td>
                  @if($guru->type === 'wali_kelas')
                    <span class="badge b-wali"><i class="fa-solid fa-person"></i> Wali Kelas</span>
                  @elseif($guru->type === 'kakomsli')
                    <span class="badge b-kakomsli"><i class="fa-solid fa-headset"></i> Kakonsli</span>
                  @elseif($guru->type === 'kaprog_pplg')
                    <span class="badge b-kaprog"><i class="fa-solid fa-graduation-cap"></i> Kaprog PPLG</span>
                  @endif
                </td>
                <td><code style="background:var(--gray-50);padding:4px 8px;border-radius:6px;font-size:12px;color:var(--gray-600)">{{ $guru->user->username }}</code></td>
                <td>
                  <div class="actions">
                    <a href="{{ route('admin.guru.edit', $guru->id) }}" class="act-btn act-edit" title="Edit">
                      <i class="fa-solid fa-pen"></i>
                    </a>
                    <form action="{{ route('admin.guru.destroy', $guru->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus {{ $guru->nama }}?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="act-btn act-del" title="Hapus">
                        <i class="fa-solid fa-trash"></i>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="5">
                  <div class="empty-state">
                    <div class="empty-icon"><i class="fa-solid fa-user-tie"></i></div>
                    <div class="empty-title">Belum Ada Data Guru</div>
                    <div class="empty-sub">Klik tombol "Tambah Guru" untuk menambahkan guru baru</div>
                  </div>
                </td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        @if($gurus->hasPages())
        <div class="pag-wrap">
          <div class="pag-info">
            Menampilkan <strong>{{ $gurus->firstItem() }}</strong> - <strong>{{ $gurus->lastItem() }}</strong> dari <strong>{{ $gurus->total() }}</strong> guru (Halaman {{ $gurus->currentPage() }} dari {{ $gurus->lastPage() }})
          </div>
          <div class="pag-btns">
            @if($gurus->onFirstPage())
              <span class="pag-btn disabled"><i class="fa-solid fa-chevron-left"></i> Sebelumnya</span>
            @else
              <a href="{{ $gurus->appends(request()->query())->previousPageUrl() }}" class="pag-btn"><i class="fa-solid fa-chevron-left"></i> Sebelumnya</a>
            @endif
            @if($gurus->hasMorePages())
              <a href="{{ $gurus->appends(request()->query())->nextPageUrl() }}" class="pag-btn">Selanjutnya <i class="fa-solid fa-chevron-right"></i></a>
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
  const searchInput = document.getElementById('search');
  const typeFilter = document.getElementById('type-filter');
  const exportPdfBtn = document.getElementById('exportPdfBtn');

  function updateSearch() {
    const search = searchInput.value.trim();
    const type = typeFilter.value;
    let url = '{{ route("admin.guru.index") }}';
    const params = [];
    if (search) params.push('search=' + encodeURIComponent(search));
    if (type) params.push('type=' + encodeURIComponent(type));
    if (params.length > 0) url += '?' + params.join('&');
    window.location.href = url;
  }

  function updateExportPdfUrl() {
    const type = typeFilter.value;
    let url = '{{ route("admin.guru.exportPdf") }}';
    const params = [];
    if (type) params.push('type=' + encodeURIComponent(type));
    if (params.length > 0) url += '?' + params.join('&');
    exportPdfBtn.href = url;
  }

  searchInput.addEventListener('keyup', function(e) {
    if (e.key === 'Enter') updateSearch();
  });

  typeFilter.addEventListener('change', function() {
    updateSearch();
    updateExportPdfUrl();
  });

  // Initialize export PDF URL on page load
  updateExportPdfUrl();

  // Load session flash message
  document.addEventListener('DOMContentLoaded', function() {
    @if(session('success'))
      setTimeout(() => {
        showToast('{{ session("success") }}', 'success', 5000);
      }, 300);
    @endif
  });
</script>

<!-- TOAST NOTIFICATIONS -->
<style>
.toast-container{position:fixed;top:20px;right:20px;z-index:99999;pointer-events:none}
.toast{display:flex;align-items:flex-start;gap:12px;background:var(--white);border-radius:10px;padding:14px 16px;margin-bottom:10px;box-shadow:0 10px 25px rgba(0,0,0,0.15);min-width:280px;max-width:420px;animation:slideIn .3s ease-out;pointer-events:auto}
.toast.success{border-left:4px solid var(--green);background:linear-gradient(135deg,#F0FDF4 0%,#FFFFFF 100%)}
.toast.error{border-left:4px solid var(--red);background:linear-gradient(135deg,#FFF5F5 0%,#FFFFFF 100%)}
.toast.info{border-left:4px solid var(--blue);background:linear-gradient(135deg,#EBF4FF 0%,#FFFFFF 100%)}
.toast.warning{border-left:4px solid var(--amber);background:linear-gradient(135deg,#FFFBEB 0%,#FFFFFF 100%)}
.toast-icon{font-size:18px;flex-shrink:0;margin-top:1px}
.toast.success .toast-icon{color:var(--green)}
.toast.error .toast-icon{color:var(--red)}
.toast.info .toast-icon{color:var(--blue)}
.toast.warning .toast-icon{color:var(--amber)}
.toast-content{flex:1;font-size:13px;font-weight:500;line-height:1.4;color:var(--gray-800)}
.toast-close{width:20px;height:20px;border:none;background:none;cursor:pointer;color:var(--gray-400);font-size:16px;flex-shrink:0;display:flex;align-items:center;justify-content:center;transition:color .15s}
.toast-close:hover{color:var(--gray-600)}
@keyframes slideIn{from{transform:translateX(400px);opacity:0}to{transform:translateX(0);opacity:1}}
@keyframes slideOut{from{transform:translateX(0);opacity:1}to{transform:translateX(400px);opacity:0}}
.toast.removing{animation:slideOut .3s ease-in forwards}
</style>

<div class="toast-container" id="toastContainer"></div>

<script>
function showToast(message, type = 'info', duration = 4000) {
  const container = document.getElementById('toastContainer');
  if (!container) return;

  const iconMap = {
    success: 'fa-circle-check',
    error: 'fa-circle-xmark',
    info: 'fa-circle-info',
    warning: 'fa-triangle-exclamation'
  };

  const toast = document.createElement('div');
  toast.className = `toast ${type}`;
  toast.innerHTML = `
    <i class="fa-solid ${iconMap[type]} toast-icon"></i>
    <div class="toast-content">${message}</div>
    <button class="toast-close" onclick="this.closest('.toast').remove()">
      <i class="fa-solid fa-times"></i>
    </button>
  `;

  container.appendChild(toast);

  if (duration > 0) {
    setTimeout(() => {
      toast.classList.add('removing');
      setTimeout(() => toast.remove(), 300);
    }, duration);
  }
}
</script>

@endsection
