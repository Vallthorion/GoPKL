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
.gp-badge{margin-left:auto;flex-shrink:0;background:var(--blue-light);color:var(--blue);font-size:10px;font-weight:700;padding:3px 9px;border-radius:100px}

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
.main-inner{padding:32px 36px 60px;max-width:1100px}

/* TOPBAR */
.topbar{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:28px;gap:20px;padding-bottom:24px;border-bottom:1.5px solid var(--gray-200)}
.topbar-tag{display:inline-flex;align-items:center;gap:7px;background:var(--teal-light);color:var(--teal);font-size:11px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:4px 12px;border-radius:100px;margin-bottom:10px}
.topbar-tag::before{content:'';width:5px;height:5px;background:var(--teal);border-radius:50%;animation:pulse 2s infinite}
@keyframes pulse{0%,100%{opacity:1}50%{opacity:.3}}
.topbar-title{font-size:clamp(22px,2.5vw,30px);font-weight:800;color:var(--blue);letter-spacing:-.5px}
.topbar-title .teal{color:var(--teal)}
.topbar-sub{font-size:14px;color:var(--gray-600);margin-top:4px}
.date-chip{background:var(--white);border:1.5px solid var(--gray-200);border-radius:var(--radius);padding:9px 14px;font-size:13px;color:var(--gray-600);display:flex;align-items:center;gap:8px;flex-shrink:0}
.date-chip i{color:var(--teal);font-size:12px}

/* STAT CARDS */
.stats-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:24px}
.stat-card{background:var(--white);border:1.5px solid var(--gray-200);border-radius:var(--radius-lg);padding:22px;transition:border-color .2s,box-shadow .2s}
.stat-card:hover{border-color:var(--teal);box-shadow:var(--shadow)}
.sc-head{display:flex;align-items:center;justify-content:space-between;margin-bottom:14px}
.sc-icon{width:40px;height:40px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:16px}
.si-blue{background:var(--blue-light);color:var(--blue)}
.si-teal{background:var(--teal-light);color:var(--teal)}
.si-amber{background:var(--amber-light);color:var(--amber)}
.sc-num{font-size:32px;font-weight:800;color:var(--blue);letter-spacing:-1px;line-height:1;margin-bottom:4px}
.sc-label{font-size:12px;color:var(--gray-600);font-weight:500}

/* SEARCH & FILTER BAR */
.toolbar{
  display:flex;align-items:center;justify-content:space-between;
  margin-bottom:20px;gap:12px;flex-wrap:wrap;
}
.search-wrap{position:relative;flex:1;max-width:300px}
.search-wrap i{position:absolute;left:12px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:13px;pointer-events:none}
.search-input{
  width:100%;padding:9px 12px 9px 36px;
  background:var(--gray-50);border:1.5px solid var(--gray-200);
  border-radius:var(--radius);font-family:var(--font);font-size:13px;
  color:var(--gray-800);outline:none;transition:border-color .2s;
}
.search-input::placeholder{color:var(--gray-400)}
.search-input:focus{border-color:var(--blue)}

/* TABLE CARD */
.card{background:var(--white);border:1.5px solid var(--gray-200);border-radius:var(--radius-lg);padding:24px;transition:border-color .2s}
.card-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:20px}
.card-title-wrap{display:flex;align-items:center;gap:10px}
.card-icon-sm{width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:12px}
.cis-blue{background:var(--blue-light);color:var(--blue)}
.cis-teal{background:var(--teal-light);color:var(--teal)}
.card-title{font-size:15px;font-weight:700;color:var(--blue)}
.card-count{font-size:11px;font-weight:700;padding:3px 9px;border-radius:100px;background:var(--gray-100);color:var(--gray-600)}

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
.nis-text{font-size:12px;color:var(--gray-400);font-family:monospace;font-weight:600}

/* STATUS BADGES */
.badge{display:inline-flex;align-items:center;gap:5px;padding:4px 11px;border-radius:100px;font-size:11px;font-weight:700;letter-spacing:.03em}
.b-wait{background:var(--amber-light);color:var(--amber);border:1.5px solid #FDE68A}
.b-ok{background:var(--teal-light);color:var(--teal);border:1.5px solid rgba(42,157,143,.25)}
.b-reject{background:var(--red-light);color:var(--red);border:1.5px solid #FED7D7}
.b-gray{background:var(--gray-100);color:var(--gray-400);border:1.5px solid var(--gray-200)}

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

/* ANIMATIONS */
@keyframes fadeUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
.fade-up{animation:fadeUp .4s ease-out both}
.d1{animation-delay:.05s}.d2{animation-delay:.1s}.d3{animation-delay:.15s}.d4{animation-delay:.2s}

/* MOBILE */
@media(max-width:900px){
  .sidebar{display:none}
  .main-inner{padding:20px 16px 40px}
  .stats-grid{grid-template-columns:1fr}
  .topbar{flex-direction:column}
}
</style>

<div class="wrapper">

  <!-- SIDEBAR -->
  <div class="sidebar">
    <div class="sidebar-top">
      <a href="{{ route('kakomsli.dashboard') }}" class="logo">
        <div class="logo-icon">G</div>
        <span class="logo-name">GO<span>PKL</span></span>
      </a>
    </div>

    <div class="guru-profile">
      <div class="gp-avatar">{{ strtoupper(substr($guru->nama, 0, 1)) }}</div>
      <div class="gp-info">
        <h4>{{ $guru->nama }}</h4>
        <p>Kakomsli</p>
      </div>
      <div class="gp-badge">Guru</div>
    </div>

    <div class="nav-section">
      <span class="nav-label">Menu Utama</span>
      <div class="menu">
        <a href="{{ route('kakomsli.dashboard') }}" class="{{ request()->routeIs('kakomsli.dashboard') ? 'active' : '' }}">
          <i class="fa-solid fa-chart-pie"></i> Dashboard
        </a>
        <a href="{{ route('kakomsli.siswa.index') }}" class="{{ request()->routeIs('kakomsli.siswa.*') ? 'active' : '' }}">
          <i class="fa-solid fa-users"></i> Data Siswa
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
          <div class="topbar-tag">Monitoring PKL</div>
          <div class="topbar-title">Dashboard <span class="teal">KAKONSLI</span></div>
          <div class="topbar-sub">Pantau progress PKL semua siswa</div>
        </div>
        <div class="date-chip">
          <i class="fa-solid fa-calendar-days"></i>
          <span id="dateDisplay"></span>
        </div>
      </div>

      <!-- STAT CARDS -->
      <div class="stats-grid">
        <div class="stat-card fade-up d1">
          <div class="sc-head">
            <div class="sc-icon si-blue"><i class="fa-solid fa-users"></i></div>
          </div>
          <div class="sc-num">{{ $jumlahSiswa }}</div>
          <div class="sc-label">Total Siswa</div>
        </div>
        <div class="stat-card fade-up d2">
          <div class="sc-head">
            <div class="sc-icon si-teal"><i class="fa-solid fa-circle-check"></i></div>
          </div>
          <div class="sc-num">{{ $jumlahSedangPKL }}</div>
          <div class="sc-label">Sedang PKL</div>
        </div>
        <div class="stat-card fade-up d3">
          <div class="sc-head">
            <div class="sc-icon si-amber"><i class="fa-solid fa-briefcase"></i></div>
          </div>
          <div class="sc-num">{{ $totalBooking }}</div>
          <div class="sc-label">Total Booking</div>
        </div>
      </div>

      <!-- CHARTS SECTION -->
      <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:16px;margin-bottom:24px">
        <!-- Chart: Status Booking -->
        <div class="card fade-up d4" style="min-height:400px">
          <div class="card-header">
            <div class="card-title-wrap">
              <div class="card-icon-sm cis-teal"><i class="fa-solid fa-chart-pie"></i></div>
              <div class="card-title">Status Pengajuan PKL</div>
            </div>
          </div>
          <div style="position:relative;height:320px">
            <canvas id="statusChart"></canvas>
          </div>
        </div>

        <!-- Chart: Distribusi Siswa per Kelas -->
        <div class="card fade-up d4" style="min-height:400px">
          <div class="card-header">
            <div class="card-title-wrap">
              <div class="card-icon-sm cis-teal"><i class="fa-solid fa-chart-bar"></i></div>
              <div class="card-title">Distribusi Siswa per Kelas</div>
            </div>
          </div>
          <div style="position:relative;height:320px">
            <canvas id="kelasChart"></canvas>
          </div>
        </div>

        <!-- Chart: Status PKL Siswa -->
        <div class="card fade-up d4" style="min-height:400px">
          <div class="card-header">
            <div class="card-title-wrap">
              <div class="card-icon-sm cis-teal"><i class="fa-solid fa-chart-line"></i></div>
              <div class="card-title">Status PKL Semua Siswa</div>
            </div>
          </div>
          <div style="position:relative;height:320px">
            <canvas id="pklStatusChart"></canvas>
          </div>
        </div>
      </div>

      <!-- TABLE CARD -->
      <div class="card fade-up d4">
        <div class="card-header">
          <div class="card-title-wrap">
            <div class="card-icon-sm cis-blue"><i class="fa-solid fa-list"></i></div>
            <div class="card-title">Daftar Siswa</div>
          </div>
          <div class="card-count">{{ $siswas->count() }} Siswa</div>
        </div>

        <div class="toolbar">
          <div class="search-wrap">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" class="search-input" id="searchInput" placeholder="Cari nama atau NIS siswa...">
          </div>
        </div>

        @if(count($siswas) > 0)
        <div class="table-wrap">
          <table id="siswaTable">
            <thead>
              <tr>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Status PKL</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($siswas as $siswa)
              @php
                $booking = $siswa->bookings()->latest()->first();
                $status  = $booking ? $booking->status : 'belum apply';
                $pillClass = match(strtolower($status)) {
                  'menunggu' => 'b-wait',
                  'diterima' => 'b-ok',
                  'ditolak'  => 'b-reject',
                  default    => 'b-gray',
                };
              @endphp
              <tr>
                <td><span class="nis-text">{{ $siswa->nis }}</span></td>
                <td><strong>{{ $siswa->nama }}</strong></td>
                <td>{{ $siswa->kelas }}</td>
                <td><span class="badge {{ $pillClass }}">{{ ucfirst($status) }}</span></td>
                <td>
                  <a href="{{ route('kakomsli.siswa.detail', $siswa->id) }}" class="btn-detail">
                    <i class="fa-solid fa-eye"></i> Detail
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <!-- PAGINATION -->
        @if($siswas->hasPages())
        <div style="margin-top: 20px; padding-top: 20px; border-top: 1.5px solid var(--gray-200); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px;">
          <div style="font-size: 12px; color: var(--gray-600);">
            Menampilkan <strong>{{ $siswas->count() }}</strong> dari <strong>{{ $jumlahSiswa }}</strong> siswa
          </div>
          <div style="display: flex; gap: 6px;">
            @if ($siswas->onFirstPage())
              <span style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 14px; border-radius: 8px; font-size: 12px; font-weight: 600; border: 1.5px solid var(--gray-200); color: var(--gray-400); opacity: 0.5; pointer-events: none;"><i class="fa-solid fa-chevron-left"></i> Sebelumnya</span>
            @else
              <a href="{{ $siswas->previousPageUrl() }}" style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 14px; border-radius: 8px; font-size: 12px; font-weight: 600; border: 1.5px solid var(--gray-200); color: var(--gray-600); background: var(--white); text-decoration: none; transition: all .15s;" onmouseover="this.style.borderColor='var(--teal)'; this.style.color='var(--teal)'; this.style.background='rgba(42,157,143,0.05)';" onmouseout="this.style.borderColor='var(--gray-200)'; this.style.color='var(--gray-600)'; this.style.background='var(--white)';"><i class="fa-solid fa-chevron-left"></i> Sebelumnya</a>
            @endif
            @if ($siswas->hasMorePages())
              <a href="{{ $siswas->nextPageUrl() }}" style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 14px; border-radius: 8px; font-size: 12px; font-weight: 600; border: 1.5px solid var(--gray-200); color: var(--gray-600); background: var(--white); text-decoration: none; transition: all .15s;" onmouseover="this.style.borderColor='var(--teal)'; this.style.color='var(--teal)'; this.style.background='rgba(42,157,143,0.05)';" onmouseout="this.style.borderColor='var(--gray-200)'; this.style.color='var(--gray-600)'; this.style.background='var(--white)';">Selanjutnya <i class="fa-solid fa-chevron-right"></i></a>
            @else
              <span style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 14px; border-radius: 8px; font-size: 12px; font-weight: 600; border: 1.5px solid var(--gray-200); color: var(--gray-400); opacity: 0.5; pointer-events: none;">Selanjutnya <i class="fa-solid fa-chevron-right"></i></span>
            @endif
          </div>
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

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>
<script>
  // Date display
  const d = new Date();
  const days   = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
  const months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
  document.getElementById('dateDisplay').textContent =
    days[d.getDay()] + ', ' + d.getDate() + ' ' + months[d.getMonth()] + ' ' + d.getFullYear();

  // Live search
  const searchInput = document.getElementById('searchInput');
  if (searchInput) {
    searchInput.addEventListener('input', function() {
      const q = this.value.toLowerCase();
      document.querySelectorAll('#siswaTable tbody tr').forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(q) ? '' : 'none';
      });
    });
  }

  function countUp(el, target) {
    let v = 0, step = target / (600 / 16);
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

  // ========== CHARTS ==========
  const chartConfig = {
    font: { family: "'Plus Jakarta Sans', sans-serif", size: 13, weight: 600, color: '#475569' },
    colors: { blue: '#1E3A5F', teal: '#2A9D8F', amber: '#D97706', red: '#DC2626', gray: '#94A3B8' }
  };

  // 1. Status Booking Chart (Pie)
  const statusCtx = document.getElementById('statusChart');
  if (statusCtx) {
    new Chart(statusCtx, {
      type: 'doughnut',
      data: {
        labels: ['Pending', 'Diterima', 'Ditolak'],
        datasets: [{
          data: [{{ $statusCounts['pending'] ?? 0 }}, {{ $statusCounts['diterima'] ?? 0 }}, {{ $statusCounts['ditolak'] ?? 0 }}],
          backgroundColor: ['#FCD34D', '#2A9D8F', '#FCA5A5'],
          borderColor: ['#FFFBEB', '#E6F7F5', '#FFF5F5'],
          borderWidth: 3,
          hoverOffset: 8
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { 
            position: 'bottom',
            labels: { font: chartConfig.font, padding: 16, usePointStyle: true }
          }
        }
      }
    });
  }

  // 2. Kelas Distribution Chart (Bar)
  const kelasCtx = document.getElementById('kelasChart');
  if (kelasCtx) {
    new Chart(kelasCtx, {
      type: 'bar',
      data: {
        labels: {!! json_encode($kelasLabels ?? []) !!},
        datasets: [{
          label: 'Jumlah Siswa',
          data: {!! json_encode($kelasData ?? []) !!},
          backgroundColor: '#2A9D8F',
          borderColor: 'rgba(42, 157, 143, 0.2)',
          borderWidth: 2,
          borderRadius: 8,
          hoverBackgroundColor: '#1E3A5F'
        }]
      },
      options: {
        indexAxis: 'y',
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { display: false }
        },
        scales: {
          x: { beginAtZero: true, grid: { drawBorder: false, color: '#E2E8F0' }, ticks: { font: chartConfig.font } },
          y: { grid: { display: false }, ticks: { font: chartConfig.font } }
        }
      }
    });
  }

  // 3. PKL Status Chart (Bar)
  const pklStatusCtx = document.getElementById('pklStatusChart');
  if (pklStatusCtx) {
    new Chart(pklStatusCtx, {
      type: 'bar',
      data: {
        labels: ['Pending', 'Diterima', 'Ditolak', 'Belum Apply'],
        datasets: [{
          label: 'Jumlah Siswa',
          data: [{{ $pklStatus['pending'] ?? 0 }}, {{ $pklStatus['diterima'] ?? 0 }}, {{ $pklStatus['ditolak'] ?? 0 }}, {{ $pklStatus['belum'] ?? 0 }}],
          backgroundColor: ['#FCD34D', '#86EFAC', '#FCA5A5', '#D1D5DB'],
          borderColor: ['#FFFBEB', '#F0FDF4', '#FFF5F5', '#F3F4F6'],
          borderWidth: 2,
          borderRadius: 8,
          hoverBackgroundColor: '#1E3A5F'
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { 
            position: 'top',
            labels: { font: chartConfig.font, padding: 16, usePointStyle: true }
          }
        },
        scales: {
          y: { beginAtZero: true, grid: { drawBorder: false, color: '#E2E8F0' }, ticks: { font: chartConfig.font } },
          x: { grid: { display: false }, ticks: { font: chartConfig.font } }
        }
      }
    });
  }
</script>
@endsection