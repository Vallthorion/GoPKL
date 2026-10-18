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
  width:240px;flex-shrink:0;
  background:var(--white);
  border-right:1.5px solid var(--gray-200);
  display:flex;flex-direction:column;
  position:sticky;top:0;height:100vh;overflow-y:auto;
}
.sidebar-top{padding:24px 20px 0;border-bottom:1.5px solid var(--gray-200)}
.logo{display:flex;align-items:center;gap:9px;text-decoration:none;padding-bottom:20px}
.logo-icon{width:32px;height:32px;background:var(--blue);border-radius:8px;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:13px;color:var(--white);flex-shrink:0}
.logo-name{font-weight:800;font-size:16px;color:var(--blue)}
.logo-name span{color:var(--teal)}

.guru-profile{padding:16px 20px;display:flex;align-items:center;gap:12px;border-bottom:1.5px solid var(--gray-200)}
.gp-avatar{width:40px;height:40px;border-radius:50%;flex-shrink:0;background:linear-gradient(135deg,var(--blue),var(--teal));display:flex;align-items:center;justify-content:center;font-weight:800;font-size:14px;color:var(--white)}
.gp-info h4{font-size:13px;font-weight:700;color:var(--gray-800);line-height:1.3}
.gp-info p{font-size:11px;color:var(--gray-400);margin-top:1px}
.gp-badge{margin-left:auto;flex-shrink:0;background:var(--teal-light);color:var(--teal);font-size:10px;font-weight:700;padding:3px 9px;border-radius:100px}

.nav-section{padding:16px 20px 0}
.nav-label{font-size:10px;font-weight:700;letter-spacing:.08em;color:var(--gray-400);text-transform:uppercase;padding:0 4px;margin-bottom:6px}
.menu{display:flex;flex-direction:column;gap:2px;padding-bottom:16px}
.menu a{display:flex;align-items:center;gap:10px;padding:10px 12px;border-radius:var(--radius);color:var(--gray-600);text-decoration:none;font-size:13px;font-weight:500;transition:all .15s}
.menu a:hover{background:var(--gray-100);color:var(--gray-800)}
.menu a.active{background:var(--blue-light);color:var(--blue);font-weight:700}
.menu a i{width:16px;text-align:center;font-size:13px}

.sidebar-footer{margin-top:auto;padding:16px 20px;border-top:1.5px solid var(--gray-200)}
.logout-btn{width:100%;display:flex;align-items:center;gap:9px;padding:10px 12px;border-radius:var(--radius);background:var(--red-light);border:1.5px solid #FED7D7;color:var(--red);font-size:13px;font-weight:600;cursor:pointer;font-family:var(--font);transition:all .15s}
.logout-btn:hover{background:#FED7D7}

/* ── MAIN ── */
.main{flex:1;min-width:0}
.main-inner{padding:32px 36px 60px;max-width:1100px}

/* TOPBAR */
.topbar{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:28px;gap:20px;padding-bottom:24px;border-bottom:1.5px solid var(--gray-200)}
.topbar-tag{display:inline-flex;align-items:center;gap:7px;background:var(--teal-light);color:var(--teal);font-size:11px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:4px 12px;border-radius:100px;margin-bottom:10px}
.topbar-tag::before{content:'';width:5px;height:5px;background:var(--teal);border-radius:50%;animation:pulse 2s infinite}
@keyframes pulse{0%,100%{opacity:1}50%{opacity:.3}}
.topbar-title{font-size:clamp(22px,2.5vw,30px);font-weight:800;color:var(--blue);letter-spacing:-.5px}
.topbar-title .teal{color:var(--teal)}
.topbar-sub{font-size:14px;color:var(--gray-600);margin-top:4px}

/* CARD */
.card{background:var(--white);border:1.5px solid var(--gray-200);border-radius:var(--radius-lg);padding:24px;transition:border-color .2s}
.card-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:20px}
.card-title-wrap{display:flex;align-items:center;gap:10px}
.card-icon-sm{width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:12px}
.cis-blue{background:var(--blue-light);color:var(--blue)}
.card-title{font-size:15px;font-weight:700;color:var(--blue)}
.card-count{font-size:11px;font-weight:700;padding:3px 9px;border-radius:100px;background:var(--gray-100);color:var(--gray-600)}

/* TOOLBAR */
.toolbar{display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;gap:12px;flex-wrap:wrap}
.filter-wrap{display:flex;align-items:center;gap:8px;flex-wrap:wrap}
.filter-label{font-size:13px;font-weight:600;color:var(--gray-600)}
.filter-select{padding:8px 12px;background:var(--gray-50);border:1.5px solid var(--gray-200);border-radius:var(--radius);font-family:var(--font);font-size:13px;color:var(--gray-800);outline:none;transition:border-color .2s;cursor:pointer}
.filter-select:focus{border-color:var(--blue)}
.search-wrap{position:relative;flex:1;max-width:300px}
.search-wrap i{position:absolute;left:12px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:13px;pointer-events:none}
.search-input{width:100%;padding:9px 12px 9px 36px;background:var(--gray-50);border:1.5px solid var(--gray-200);border-radius:var(--radius);font-family:var(--font);font-size:13px;color:var(--gray-800);outline:none;transition:border-color .2s}
.search-input::placeholder{color:var(--gray-400)}
.search-input:focus{border-color:var(--blue)}

/* TABLE */
.table-wrap{overflow-x:auto;margin:0 -4px}
table{width:100%;border-collapse:collapse;min-width:560px}
thead tr{border-bottom:1.5px solid var(--gray-200)}
th{padding:11px 14px;text-align:left;font-size:11px;font-weight:700;color:var(--gray-400);letter-spacing:.06em;text-transform:uppercase;white-space:nowrap}
tbody tr{border-bottom:1.5px solid var(--gray-100);transition:background .12s}
tbody tr:last-child{border-bottom:none}
tbody tr:hover{background:var(--gray-50)}
td{padding:13px 14px;font-size:13px;color:var(--gray-800);vertical-align:middle}
td strong{font-weight:700;color:var(--blue)}

/* STATUS BADGES */
.badge{display:inline-flex;align-items:center;gap:5px;padding:4px 11px;border-radius:100px;font-size:11px;font-weight:700;letter-spacing:.03em}
.b-wait{background:var(--amber-light);color:var(--amber);border:1.5px solid #FDE68A}
.b-ok{background:var(--teal-light);color:var(--teal);border:1.5px solid rgba(42,157,143,.25)}
.b-reject{background:var(--red-light);color:var(--red);border:1.5px solid #FED7D7}

/* ACTION BTN */
.btn-detail{
  display:inline-flex;align-items:center;gap:6px;
  padding:7px 14px;border-radius:8px;
  font-size:12px;font-weight:700;
  background:var(--blue-light);color:var(--blue);
  border:1.5px solid rgba(30,58,95,.15);
  text-decoration:none;
  transition:background .15s,border-color .15s,transform .12s;
}
.btn-detail:hover{background:var(--blue);color:var(--white);border-color:var(--blue);transform:translateY(-1px)}

/* EMPTY STATE */
.empty-state{text-align:center;padding:52px 20px}
.empty-icon{width:64px;height:64px;border-radius:16px;background:var(--gray-100);display:flex;align-items:center;justify-content:center;font-size:26px;color:var(--gray-400);margin:0 auto 16px}
.empty-title{font-size:15px;font-weight:700;color:var(--gray-800);margin-bottom:6px}
.empty-sub{font-size:13px;color:var(--gray-400)}

/* PAGINATION */
.pagination {
  display: flex !important;
  align-items: center !important;
  justify-content: center !important;
  gap: 4px !important;
  flex-wrap: wrap !important;
  margin: 28px 0 0 0 !important;
  padding: 0 !important;
  list-style: none !important;
}
.pagination li {
  list-style: none !important;
}
.pagination li a,
.pagination li span {
  display: inline-flex !important;
  align-items: center !important;
  justify-content: center !important;
  width: 36px !important;
  height: 36px !important;
  min-width: 36px !important;
  padding: 0 !important;
  border-radius: 8px !important;
  font-size: 13px !important;
  font-weight: 600 !important;
  color: var(--gray-600) !important;
  background: var(--white) !important;
  border: 1.5px solid var(--gray-200) !important;
  text-decoration: none !important;
  transition: all 0.15s ease !important;
  font-family: var(--font) !important;
}
.pagination li a:hover {
  background: var(--blue-light) !important;
  color: var(--blue) !important;
  border-color: var(--blue) !important;
  transform: translateY(-2px) !important;
}
.pagination li.active span {
  background: var(--blue) !important;
  color: var(--white) !important;
  border-color: var(--blue) !important;
  font-weight: 700 !important;
}
.pagination li.disabled span {
  color: var(--gray-400) !important;
  background: var(--gray-50) !important;
  border-color: var(--gray-200) !important;
  cursor: not-allowed !important;
}

/* ANIMATIONS */
@keyframes fadeUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
.fade-up{animation:fadeUp .4s ease-out both}
.d1{animation-delay:.05s}.d2{animation-delay:.1s}.d3{animation-delay:.15s}.d4{animation-delay:.2s}

/* MOBILE */
@media(max-width:900px){
  .sidebar{display:none}
  .main-inner{padding:20px 16px 40px}
  .toolbar{flex-direction:column;align-items:flex-start}
  .search-wrap{max-width:100%;width:100%}
}
</style>

<div class="wrapper">
  <!-- SIDEBAR -->
  <div class="sidebar">
    <div class="sidebar-top">
      <a href="{{ route('kaprog_pplg.dashboard') }}" class="logo">
        <div class="logo-icon">G</div>
        <span class="logo-name">GO<span>PKL</span></span>
      </a>
    </div>

    <div class="guru-profile">
      <div class="gp-avatar">{{ strtoupper(substr($guru->nama, 0, 1)) }}</div>
      <div class="gp-info">
        <h4>{{ $guru->nama }}</h4>
        <p>Kaprog PPLG</p>
      </div>
      <div class="gp-badge">Guru</div>
    </div>

    <div class="nav-section">
      <span class="nav-label">Menu Utama</span>
      <div class="menu">
        <a href="{{ route('kaprog_pplg.dashboard') }}" class="{{ request()->routeIs('kaprog_pplg.dashboard') ? 'active' : '' }}">
          <i class="fa-solid fa-chart-pie"></i> Dashboard
        </a>
        <a href="{{ route('kaprog_pplg.siswa.index') }}" class="{{ request()->routeIs('kaprog_pplg.siswa.*') ? 'active' : '' }}">
          <i class="fa-solid fa-users"></i> Data Siswa
        </a>
      </div>
    </div>

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
          <div class="topbar-tag">Data Siswa</div>
          <div class="topbar-title">Daftar <span class="teal">Siswa</span></div>
          <div class="topbar-sub">Kelola dan monitor semua siswa PPLG dari semua kelas</div>
        </div>
      </div>

      <!-- TABLE CARD -->
      <div class="card fade-up d1">
        <div class="card-header">
          <div class="card-title-wrap">
            <div class="card-icon-sm cis-blue"><i class="fa-solid fa-users"></i></div>
            <div class="card-title">Daftar Siswa</div>
          </div>
        </div>

        <div class="toolbar">
          <div class="filter-wrap">
            <label class="filter-label">Filter Kelas:</label>
            <select class="filter-select" id="filterKelas">
              <option value="">Semua Kelas</option>
              @foreach($allClasses as $kelas)
                <option value="{{ $kelas }}" {{ $selectedKelas === $kelas ? 'selected' : '' }}>{{ $kelas }}</option>
              @endforeach
            </select>
          </div>
          <div class="filter-wrap">
            <label class="filter-label">Filter Status PKL:</label>
            <select class="filter-select" id="filterStatus">
              <option value="">Semua Status</option>
              <option value="active" {{ $pklStatus === 'active' ? 'selected' : '' }}>Active</option>
              <option value="inactive" {{ $pklStatus === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
          </div>
          <div class="search-wrap">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" class="search-input" id="searchInput" placeholder="Cari nama atau NIS siswa...">
          </div>
          <a href="{{ route('kaprog_pplg.siswa.exportPdf', array_filter(['kelas' => request('kelas'), 'status' => request('status')])) }}" 
             class="btn-detail" target="_blank" title="Export PDF">
            <i class="fa-solid fa-file-pdf"></i> Export PDF
          </a>
        </div>

        @if($siswas->count() > 0)
        <div class="table-wrap">
          <table id="siswaTable">
            <thead>
              <tr>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Wali Kelas</th>
                <th>Status PKL</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($siswas as $siswa)
              @php
                $booking = $siswa->bookings()->latest()->first();
                $status = $booking ? $booking->status : 'belum apply';
                $badgeClass = match(strtolower($status)) {
                  'menunggu' => 'b-wait',
                  'diterima' => 'b-ok',
                  'ditolak' => 'b-reject',
                  default => 'b-wait',
                };
              @endphp
              <tr data-kelas="{{ $siswa->kelas }}">
                <td>{{ $siswa->nis }}</td>
                <td><strong>{{ $siswa->nama }}</strong></td>
                <td>{{ $siswa->kelas }}</td>
                <td>{{ $siswa->jurusan }}</td>
                <td>{{ $siswa->guru ? $siswa->guru->nama : '-' }}</td>
                <td>
                  <span class="badge {{ $badgeClass }}">{{ ucfirst($status) }}</span>
                </td>
                <td>
                  <a href="{{ route('kaprog_pplg.siswa.detail', $siswa->id) }}" class="btn-detail">
                    <i class="fa-solid fa-eye"></i> Detail
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        @if($siswas->hasPages())
        <div style="display: flex; justify-content: center;">
          {{ $siswas->links('vendor.pagination.custom') }}
        </div>
        @endif
        @else
        <div class="empty-state">
          <div class="empty-icon"><i class="fa-solid fa-inbox"></i></div>
          <div class="empty-title">Belum ada siswa</div>
          <div class="empty-sub">Belum ada data siswa yang tersedia.</div>
        </div>
        @endif
      </div>

    </div>
  </main>
</div>

<script>
  const filterKelas = document.getElementById('filterKelas');
  const filterStatus = document.getElementById('filterStatus');
  const searchInput = document.getElementById('searchInput');
  
  // Filter kelas dan status - server-side (redirect dengan parameter)
  function updateFilters() {
    const selectedKelas = filterKelas ? filterKelas.value : '';
    const selectedStatus = filterStatus ? filterStatus.value : '';
    const url = new URL(window.location);
    
    if (selectedKelas) {
      url.searchParams.set('kelas', selectedKelas);
    } else {
      url.searchParams.delete('kelas');
    }
    
    if (selectedStatus) {
      url.searchParams.set('status', selectedStatus);
    } else {
      url.searchParams.delete('status');
    }
    
    window.location = url.toString();
  }
  
  if (filterKelas) filterKelas.addEventListener('change', updateFilters);
  if (filterStatus) filterStatus.addEventListener('change', updateFilters);
  
  // Search - client-side (live filter)
  function searchTable() {
    const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';
    
    document.querySelectorAll('#siswaTable tbody tr').forEach(row => {
      const text = row.textContent.toLowerCase();
      row.style.display = !searchTerm || text.includes(searchTerm) ? '' : 'none';
    });
  }
  
  if (searchInput) searchInput.addEventListener('input', searchTable);
</script>
@endsection
