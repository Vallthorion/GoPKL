{{-- ================================================================
     FILE: admin/pengajuan/index.blade.php  (Pengajuan PKL)
     ================================================================ --}}
@extends('layouts.app')
@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
:root{
  --blue:#1E3A5F;--blue-mid:#2C5282;--blue-light:#EBF4FF;
  --teal:#2A9D8F;--teal-light:#E6F7F5;
  --white:#FFFFFF;--gray-50:#F8FAFC;--gray-100:#F0F4F8;
  --gray-200:#E2E8F0;--gray-400:#94A3B8;--gray-500:#64748B;
  --gray-600:#475569;--gray-800:#1E293B;
  --amber:#D97706;--amber-light:#FFFBEB;
  --red:#DC2626;--red-light:#FFF5F5;--green:#16A34A;--green-light:#F0FDF4;
  --font:'Plus Jakarta Sans',sans-serif;--radius:10px;--radius-lg:16px;
  --shadow:0 1px 3px rgba(30,58,95,.06),0 4px 12px rgba(30,58,95,.05);
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
body{font-family:var(--font);background:var(--gray-50);color:var(--gray-800);min-height:100vh}
.wrapper{display:flex;min-height:100vh}
/* SIDEBAR — identical */
.sidebar{width:240px;flex-shrink:0;background:var(--white);border-right:1.5px solid var(--gray-200);display:flex;flex-direction:column;position:sticky;top:0;height:100vh;overflow-y:auto}
.sidebar-logo-wrap{padding:20px 20px 0;border-bottom:1.5px solid var(--gray-200)}
.logo{display:flex;align-items:center;gap:9px;text-decoration:none;padding-bottom:18px}
.logo-icon{width:32px;height:32px;background:var(--blue);border-radius:8px;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:13px;color:var(--white)}
.logo-name{font-weight:800;font-size:16px;color:var(--blue)}.logo-name span{color:var(--teal)}
.admin-profile{margin:16px 16px 20px;background:var(--white);border:1.5px solid var(--gray-200);border-radius:14px;padding:14px 16px;display:flex;align-items:center;gap:12px}
.admin-avatar{width:42px;height:42px;border-radius:14px;background:linear-gradient(135deg,var(--blue),var(--teal));display:flex;align-items:center;justify-content:center;font-weight:800;font-size:15px;color:var(--white);flex-shrink:0}
.admin-name{font-size:13px;font-weight:800;color:var(--blue)}.admin-role{font-size:11px;color:var(--gray-400);margin-top:2px}
.nav-section{padding:0 12px}.nav-label{font-size:10px;font-weight:700;letter-spacing:.09em;color:var(--gray-400);text-transform:uppercase;padding:0 6px;margin-bottom:5px;margin-top:16px;display:block}
.menu{display:flex;flex-direction:column;gap:1px;margin-bottom:8px}
.menu a{display:flex;align-items:center;gap:10px;padding:9px 10px;border-radius:9px;color:var(--gray-600);text-decoration:none;font-size:13px;font-weight:500;transition:all .15s}
.menu a:hover{background:var(--gray-100);color:var(--gray-800)}.menu a.active{background:var(--blue-light);color:var(--blue);font-weight:700}
.menu a i{width:15px;text-align:center;font-size:12px;flex-shrink:0}.menu-divider{height:1.5px;background:var(--gray-200);margin:10px 12px}
.sidebar-footer{margin-top:auto;padding:14px 12px;border-top:1.5px solid var(--gray-200)}
.logout-btn{width:100%;display:flex;align-items:center;gap:9px;padding:9px 10px;border-radius:9px;background:var(--red-light);border:1.5px solid #FED7D7;color:var(--red);font-size:13px;font-weight:600;cursor:pointer;font-family:var(--font);transition:all .15s}
.logout-btn:hover{background:#FED7D7}
/* MAIN */
.main{flex:1;min-width:0;background:var(--gray-50)}
.main-inner{padding:32px 36px 60px;max-width:1100px}
/* TOPBAR */
.topbar{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:28px;gap:20px;padding-bottom:24px;border-bottom:1.5px solid var(--gray-200)}
.topbar-tag{display:inline-flex;align-items:center;gap:7px;background:var(--blue-light);color:var(--blue);font-size:11px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:4px 12px;border-radius:100px;margin-bottom:10px}
.topbar-title{font-size:clamp(22px,2.5vw,28px);font-weight:800;color:var(--blue);letter-spacing:-.5px}
.topbar-sub{font-size:14px;color:var(--gray-500);margin-top:4px}
.topbar-right{display:flex;align-items:center;gap:10px;flex-shrink:0}
.btn-aktif{display:inline-flex;align-items:center;gap:7px;background:var(--teal-light);color:var(--teal);border:1.5px solid rgba(42,157,143,.2);padding:9px 16px;border-radius:var(--radius);font-size:13px;font-weight:700;text-decoration:none;transition:all .15s}
.btn-aktif:hover{background:var(--teal);color:var(--white);border-color:var(--teal)}
/* STAT CARDS */
.stats-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:24px}
.stat-card{background:var(--white);border:1.5px solid var(--gray-200);border-radius:var(--radius-lg);padding:20px;transition:border-color .2s,box-shadow .2s}
.stat-card:hover{border-color:var(--teal);box-shadow:var(--shadow)}
.sc-head{display:flex;align-items:center;justify-content:space-between;margin-bottom:12px}
.sc-icon{width:38px;height:38px;border-radius:9px;display:flex;align-items:center;justify-content:center;font-size:15px}
.si-blue{background:var(--blue-light);color:var(--blue)}.si-teal{background:var(--teal-light);color:var(--teal)}.si-amber{background:var(--amber-light);color:var(--amber)}
.sc-num{font-size:30px;font-weight:800;color:var(--blue);letter-spacing:-1px;line-height:1;margin-bottom:3px}
.sc-label{font-size:12px;color:var(--gray-500);font-weight:500}
/* ALERT */
.alert{display:flex;align-items:center;gap:10px;border-radius:var(--radius);padding:12px 16px;font-size:13px;margin-bottom:18px;border:1.5px solid}
.alert-success{background:var(--green-light);border-color:#BBF7D0;color:var(--green)}
.alert-error{background:var(--red-light);border-color:#FED7D7;color:var(--red)}
/* TABLE CARD */
.card{background:var(--white);border:1.5px solid var(--gray-200);border-radius:var(--radius-lg);padding:24px;transition:border-color .2s}
.card-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:20px}
.card-title-wrap{display:flex;align-items:center;gap:10px}
.card-icon-sm{width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:12px}
.cis-blue{background:var(--blue-light);color:var(--blue)}
.card-title{font-size:15px;font-weight:700;color:var(--blue)}
.live-chip{font-size:10px;font-weight:700;padding:3px 9px;border-radius:100px;background:var(--amber-light);color:var(--amber);border:1.5px solid #FDE68A;display:flex;align-items:center;gap:5px}
/* TABLE */
.table-wrap{overflow-x:auto;margin:0 -4px}
table{width:100%;border-collapse:collapse;min-width:680px}
thead tr{border-bottom:1.5px solid var(--gray-200)}
th{padding:11px 14px;text-align:left;font-size:11px;font-weight:700;color:var(--gray-400);letter-spacing:.06em;text-transform:uppercase;white-space:nowrap}
tbody tr{border-bottom:1.5px solid var(--gray-100);transition:background .12s}
tbody tr:last-child{border-bottom:none}
tbody tr:hover{background:var(--gray-50)}
td{padding:13px 14px;font-size:13px;color:var(--gray-800);vertical-align:middle}
/* Cells */
.siswa-cell{display:flex;align-items:center;gap:10px}
.s-ava{width:32px;height:32px;border-radius:50%;background:linear-gradient(135deg,var(--blue),var(--teal));display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;color:var(--white);flex-shrink:0}
.s-name{font-size:13px;font-weight:700;color:var(--blue)}
.co-name{font-size:13px;font-weight:600;color:var(--gray-800)}
.co-addr{font-size:11px;color:var(--gray-400);margin-top:1px;max-width:160px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.kuota-val{font-size:15px;font-weight:800;color:var(--blue)}
/* BADGES */
.badge{display:inline-flex;align-items:center;gap:4px;padding:4px 10px;border-radius:100px;font-size:11px;font-weight:700;letter-spacing:.02em}
.b-wait{background:var(--amber-light);color:var(--amber);border:1.5px solid #FDE68A}
.b-ok{background:var(--teal-light);color:var(--teal);border:1.5px solid rgba(42,157,143,.25)}
.b-reject{background:var(--red-light);color:var(--red);border:1.5px solid #FED7D7}
.b-gray{background:var(--gray-100);color:var(--gray-400);border:1.5px solid var(--gray-200)}
/* ACTION BTNS */
.action-group{display:flex;gap:7px}
.btn-terima{display:inline-flex;align-items:center;gap:6px;padding:7px 13px;border-radius:8px;font-size:12px;font-weight:700;border:none;cursor:pointer;font-family:var(--font);background:var(--blue);color:var(--white);transition:all .15s}
.btn-terima:hover{background:var(--blue-mid);transform:translateY(-1px)}
.btn-tolak{display:inline-flex;align-items:center;gap:6px;padding:7px 13px;border-radius:8px;font-size:12px;font-weight:700;cursor:pointer;font-family:var(--font);background:var(--red-light);color:var(--red);border:1.5px solid #FED7D7;transition:all .15s}
.btn-tolak:hover{background:#FED7D7;border-color:var(--red)}
/* EMPTY */
.empty-state{text-align:center;padding:56px 20px}
.empty-icon{width:64px;height:64px;border-radius:16px;background:var(--gray-100);display:flex;align-items:center;justify-content:center;font-size:26px;color:var(--gray-400);margin:0 auto 14px}
.empty-title{font-size:15px;font-weight:700;color:var(--gray-800);margin-bottom:5px}
.empty-sub{font-size:13px;color:var(--gray-400)}
@keyframes fadeUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
.fu{animation:fadeUp .4s ease-out both}.fu-1{animation-delay:.05s}.fu-2{animation-delay:.1s}.fu-3{animation-delay:.15s}
@media(max-width:900px){.sidebar{display:none}.main-inner{padding:20px 16px 40px}.stats-grid{grid-template-columns:1fr}.topbar{flex-direction:column}}
</style>

<div class="wrapper">
  <div class="sidebar">
    <div class="sidebar-logo-wrap">
      <a href="{{ route('admin.dashboard') }}" class="logo"><div class="logo-icon">G</div><span class="logo-name">GO<span>PKL</span></span></a>
    </div>
    <div class="admin-profile">
      <div class="admin-avatar">{{ strtoupper(substr(Auth::user()->name ?? Auth::user()->username ?? 'A', 0, 1)) }}</div>
      <div><div class="admin-name">{{ Auth::user()->name ?? Auth::user()->username ?? 'Admin' }}</div><div class="admin-role">Administrator</div></div>
    </div>
    <div class="nav-section">
      <span class="nav-label">Menu Utama</span>
      <div class="menu">
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="fa-solid fa-chart-pie"></i> Dashboard</a>
        <a href="{{ route('admin.siswa.index') }}" class="{{ request()->routeIs('admin.siswa.*') ? 'active' : '' }}"><i class="fa-solid fa-users"></i> Data Siswa</a>
        <a href="{{ route('admin.guru.index') }}" class="{{ request()->routeIs('admin.guru.*') ? 'active' : '' }}"><i class="fa-solid fa-chalkboard-user"></i> Data Guru</a>
        <a href="{{ route('admin.perusahaan.index') }}" class="{{ request()->is('admin/perusahaan*') ? 'active' : '' }}"><i class="fa-solid fa-building"></i> Data Perusahaan</a>
        <a href="{{ route('admin.pengajuan.index') }}" class="{{ request()->is('admin/pengajuan*') ? 'active' : '' }}"><i class="fa-solid fa-file-lines"></i> Pengajuan PKL</a>
        <a href="{{ route('admin.pengajuan.aktif') }}" class="{{ request()->routeIs('admin.pengajuan.aktif') ? 'active' : '' }}"><i class="fa-solid fa-check-circle"></i> Siswa Sedang PKL</a>
      </div>
    </div>
    <div class="menu-divider"></div>
    <div class="sidebar-footer">
      <form action="/logout" method="POST">@csrf<button type="submit" class="logout-btn"><i class="fa-solid fa-right-from-bracket"></i> Keluar</button></form>
    </div>
  </div>

  <main class="main">
    <div class="main-inner">
      <div class="topbar fu">
        <div>
          <div class="topbar-tag">Manajemen PKL</div>
          <div class="topbar-title">Pengajuan PKL</div>
          <div class="topbar-sub">Tinjau dan kelola pengajuan PKL dari seluruh siswa</div>
        </div>
        <div class="topbar-right">
          <a href="{{ route('admin.pengajuan.aktif') }}" class="btn-aktif">
            <i class="fa-solid fa-circle-check"></i> Siswa Sedang PKL
          </a>
        </div>
      </div>

      @if(session('error'))
      <div class="alert alert-error fu"><i class="fa-solid fa-circle-exclamation"></i> {{ session('error') }}</div>
      @endif
      @if(session('success'))
      <div class="alert alert-success fu"><i class="fa-solid fa-circle-check"></i> {{ session('success') }}</div>
      @endif

      <!-- STATS -->
      <div class="stats-grid fu fu-1">
        <div class="stat-card">
          <div class="sc-head"><div class="sc-icon si-amber"><i class="fa-solid fa-clock"></i></div></div>
          <div class="sc-num">{{ $bookings->count() }}</div>
          <div class="sc-label">Menunggu Konfirmasi</div>
        </div>
        <div class="stat-card">
          <div class="sc-head"><div class="sc-icon si-teal"><i class="fa-solid fa-circle-check"></i></div></div>
          <div class="sc-num">{{ $diterima }}</div>
          <div class="sc-label">Sudah Diterima</div>
        </div>
        <div class="stat-card">
          <div class="sc-head"><div class="sc-icon si-blue"><i class="fa-solid fa-users"></i></div></div>
          <div class="sc-num">{{ $totalPengajuan }}</div>
          <div class="sc-label">Total Pengaju</div>
        </div>
      </div>

      <!-- TABLE -->
      <div class="card fu fu-2">
        <div class="card-header">
          <div class="card-title-wrap">
            <div class="card-icon-sm cis-blue"><i class="fa-solid fa-file-lines"></i></div>
            <div class="card-title">Daftar Pengajuan</div>
          </div>
          @if($bookings->count() > 0)
          <div class="live-chip"><i class="fa-solid fa-circle" style="font-size:6px"></i> {{ $bookings->count() }} Menunggu</div>
          @endif
        </div>

        @if($bookings->count() > 0)
        <div class="table-wrap">
          <table>
            <thead>
              <tr>
                <th>Siswa</th>
                <th>Perusahaan</th>
                <th>Kuota</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($bookings as $booking)
              @php
                $nama  = $booking->siswa->nama ?? '-';
                $inits = collect(explode(' ',$nama))->map(fn($w)=>strtoupper(substr($w,0,1)))->take(2)->join('');
                $status = strtolower($booking->status);
                $pill = match($status){'pending'=>'b-wait','diterima'=>'b-ok','ditolak'=>'b-reject',default=>'b-gray'};
              @endphp
              <tr>
                <td>
                  <div class="siswa-cell">
                    <div class="s-ava">{{ $inits }}</div>
                    <div class="s-name">{{ $nama }}</div>
                  </div>
                </td>
                <td>
                  <div class="co-name">{{ $booking->perusahaan->nama_perusahaan ?? '-' }}</div>
                  <div class="co-addr">{{ $booking->perusahaan->alamat ?? '-' }}</div>
                </td>
                <td><span class="kuota-val">{{ $booking->perusahaan->kuota ?? '-' }}</span> <span style="font-size:11px;color:var(--gray-400)">slot</span></td>
                <td><span class="badge {{ $pill }}">{{ ucfirst($booking->status) }}</span></td>
                <td>
                  <form method="POST" action="{{ route('admin.pengajuan.update', $booking->id) }}" style="display:inline">
                    @csrf @method('PUT')
                    <div class="action-group">
                      <button name="status" value="diterima" class="btn-terima" onclick="return confirm('Konfirmasi terima pengajuan ini?')">
                        <i class="fa-solid fa-check"></i> Terima
                      </button>
                      <button name="status" value="ditolak" class="btn-tolak" onclick="return confirm('Yakin tolak pengajuan ini?')">
                        <i class="fa-solid fa-xmark"></i> Tolak
                      </button>
                    </div>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        @else
        <div class="empty-state">
          <div class="empty-icon"><i class="fa-solid fa-inbox"></i></div>
          <div class="empty-title">Tidak Ada Pengajuan</div>
          <div class="empty-sub">Semua pengajuan telah diproses. Pengajuan baru akan muncul di sini.</div>
        </div>
        @endif
      </div>
    </div>
  </main>
</div>
<script>
  let d = 0;
  document.querySelectorAll('tbody tr').forEach(r => {
    const b = r.querySelector('.badge');
    if (b && b.textContent.trim().toLowerCase().startsWith('diterima')) d++;
  });
  document.getElementById('totalDiterima').textContent = d;
</script>
@endsection

{{-- ================================================================
     SAVE THIS AS: admin/pengajuan/aktif.blade.php
     Just update the page header section. All CSS and sidebar identical.
     Key changes: page title, stat card labels, table columns, action button
     ================================================================ --}}