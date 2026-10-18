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
.gp-avatar{
  width:40px;height:40px;border-radius:50%;flex-shrink:0;
  background:linear-gradient(135deg,var(--blue),var(--teal));
  display:flex;align-items:center;justify-content:center;
  font-weight:800;font-size:14px;color:var(--white);
}
.gp-info h4{font-size:13px;font-weight:700;color:var(--gray-800);line-height:1.3}
.gp-info p{font-size:11px;color:var(--gray-400);margin-top:1px}
.gp-name{font-size:13px;font-weight:700;color:var(--gray-800);line-height:1.3}
.gp-role{font-size:11px;color:var(--gray-400);margin-top:1px}
.gp-badge{margin-left:auto;flex-shrink:0;background:var(--teal-light);color:var(--teal);font-size:10px;font-weight:700;padding:3px 9px;border-radius:100px}

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

/* BACK BUTTON */
.btn-back{display:inline-flex;align-items:center;gap:8px;padding:10px 16px;border-radius:var(--radius);background:var(--white);border:1.5px solid var(--gray-200);color:var(--blue);text-decoration:none;font-size:13px;font-weight:600;transition:all .15s;margin-bottom:20px}
.btn-back:hover{background:var(--blue-light);border-color:var(--blue)}

/* CARD */
.card{background:var(--white);border:1.5px solid var(--gray-200);border-radius:var(--radius-lg);padding:24px;transition:border-color .2s}
.card-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:20px}
.card-title-wrap{display:flex;align-items:center;gap:10px}
.card-icon-sm{width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:12px}
.cis-blue{background:var(--blue-light);color:var(--blue)}
.cis-teal{background:var(--teal-light);color:var(--teal)}
.card-title{font-size:15px;font-weight:700;color:var(--blue)}

/* PROFILE INFO */
.profile-section{display:grid;grid-template-columns:repeat(2,1fr);gap:20px;margin-bottom:24px}
.info-block{display:flex;flex-direction:column}
.info-label{font-size:11px;font-weight:700;color:var(--gray-400);text-transform:uppercase;letter-spacing:.06em;margin-bottom:6px}
.info-value{font-size:14px;font-weight:600;color:var(--gray-800)}
.info-divider{height:1.5px;background:var(--gray-200);margin:20px 0}

/* TABLE */
.table-wrap{overflow-x:auto;margin:0 -4px}
table{width:100%;border-collapse:collapse;min-width:640px}
thead tr{border-bottom:1.5px solid var(--gray-200)}
th{padding:11px 14px;text-align:left;font-size:11px;font-weight:700;color:var(--gray-400);letter-spacing:.06em;text-transform:uppercase;white-space:nowrap}
tbody tr{border-bottom:1.5px solid var(--gray-100);transition:background .12s}
tbody tr:last-child{border-bottom:none}
tbody tr:hover{background:var(--gray-50)}
td{padding:13px 14px;font-size:13px;color:var(--gray-800);vertical-align:middle}
td strong{font-weight:700;color:var(--blue)}

/* BADGES */
.badge{display:inline-flex;align-items:center;gap:5px;padding:4px 11px;border-radius:100px;font-size:11px;font-weight:700;letter-spacing:.03em}
.b-wait{background:var(--amber-light);color:var(--amber);border:1.5px solid #FDE68A}
.b-ok{background:var(--teal-light);color:var(--teal);border:1.5px solid rgba(42,157,143,.25)}
.b-reject{background:var(--red-light);color:var(--red);border:1.5px solid #FED7D7}
.b-gray{background:var(--gray-100);color:var(--gray-600);border:1.5px solid var(--gray-200)}

/* EMPTY STATE */
.empty-state{text-align:center;padding:52px 20px}
.empty-icon{
  width:64px;height:64px;border-radius:16px;
  background:var(--gray-100);
  display:flex;align-items:center;justify-content:center;
  font-size:26px;color:var(--gray-400);
  margin:0 auto 16px;
}
.empty-title{font-size:15px;font-weight:700;color:var(--gray-800);margin-bottom:6px}
.empty-sub{font-size:13px;color:var(--gray-400)}

/* ANIMATIONS */
@keyframes fadeUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
.fade-up{animation:fadeUp .4s ease-out both}
.d1{animation-delay:.05s}.d2{animation-delay:.1s}

/* MOBILE */
@media(max-width:900px){
  .sidebar{display:none}
  .main-inner{padding:20px 16px 40px}
  .topbar{flex-direction:column}
  .profile-section{grid-template-columns:1fr}
}
</style>

<div class="wrapper">

  <!-- SIDEBAR -->
  <div class="sidebar">
    <div class="sidebar-logo-wrap">
      <a href="{{ route('guru.dashboard') }}" class="logo">
        <div class="logo-icon">G</div>
        <span class="logo-name">GO<span>PKL</span></span>
      </a>
    </div>

    <div class="guru-profile">
      <div class="gp-avatar">{{ strtoupper(substr($guru->nama, 0, 1)) }}</div>
      <div>
        <div class="gp-name">{{ $guru->nama }}</div>
        <div class="gp-role">{{ $guru->type === 'wali_kelas' ? 'Wali Kelas' : 'Kakomsli' }}</div>
      </div>
      <div class="gp-badge">Guru</div>
    </div>

    <div class="nav-section">
      <span class="nav-label">Menu Utama</span>
      <div class="menu">
        <a href="{{ route('guru.dashboard') }}" class="{{ request()->routeIs('guru.dashboard') ? 'active' : '' }}">
          <i class="fa-solid fa-chart-pie"></i> Dashboard
        </a>
        <a href="{{ route('guru.siswa.index') }}" class="{{ request()->routeIs('guru.siswa.*') ? 'active' : '' }}">
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
          <div class="topbar-tag">Detail Siswa</div>
          <div class="topbar-title">{{ $siswa->nama }}</div>
          <div class="topbar-sub">Informasi lengkap dan riwayat PKL</div>
        </div>
      </div>

      <!-- PROFILE CARD -->
      <div class="card fade-up d1">
        <div class="profile-section">
          <div class="info-block">
            <span class="info-label">Nama</span>
            <span class="info-value">{{ $siswa->nama }}</span>
          </div>
          <div class="info-block">
            <span class="info-label">NIS</span>
            <span class="info-value">{{ $siswa->nis }}</span>
          </div>
          <div class="info-block">
            <span class="info-label">Kelas</span>
            <span class="info-value">{{ $siswa->kelas }}</span>
          </div>
          <div class="info-block">
            <span class="info-label">Jurusan</span>
            <span class="info-value">{{ $siswa->jurusan }}</span>
          </div>
        </div>

        <div class="info-divider"></div>

        <!-- BOOKINGS SECTION -->
        <h3 style="font-size:15px;font-weight:700;margin-bottom:16px;color:var(--blue);">Riwayat Pengajuan PKL</h3>

        @if($bookings->count() > 0)
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
                $status = strtolower($booking->status);
                $badgeClass = match($status) {
                  'menunggu' => 'b-wait',
                  'diterima' => 'b-ok',
                  'ditolak' => 'b-reject',
                  default => 'b-gray',
                };
              @endphp
              <tr>
                <td><strong>{{ $booking->perusahaan->nama_perusahaan }}</strong></td>
                <td>{{ $booking->perusahaan->alamat }}</td>
                <td>
                  <span class="badge {{ $badgeClass }}">{{ ucfirst($booking->status) }}</span>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        @else
        <div class="empty-state">
          <div class="empty-icon"><i class="fa-solid fa-inbox"></i></div>
          <div class="empty-title">Belum ada pengajuan</div>
          <div class="empty-sub">Belum ada pengajuan PKL dari siswa ini.</div>
        </div>
        @endif
      </div>

    </div>
  </main>
</div>
@endsection
