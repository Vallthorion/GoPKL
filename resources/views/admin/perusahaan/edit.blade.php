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
  width:240px;flex-shrink:0;
  background:var(--white);
  border-right:1.5px solid var(--gray-200);
  display:flex;flex-direction:column;
  position:sticky;top:0;height:100vh;overflow-y:auto;
}
.sidebar-logo-wrap{padding:20px 20px 0;border-bottom:1.5px solid var(--gray-200)}
.logo{display:flex;align-items:center;gap:9px;text-decoration:none;padding-bottom:18px}
.logo-icon{
  width:32px;height:32px;background:var(--blue);border-radius:8px;
  display:flex;align-items:center;justify-content:center;
  font-weight:800;font-size:13px;color:var(--white);flex-shrink:0;
}
.logo-name{font-weight:800;font-size:16px;color:var(--blue)}
.logo-name span{color:var(--teal)}

.admin-profile{
  margin:16px 16px 20px;
  background:var(--white);border:1.5px solid var(--gray-200);
  border-radius:14px;padding:14px 16px;
  display:flex;align-items:center;gap:12px;
  box-shadow:0 1px 3px rgba(30,58,95,.06);
}
.admin-avatar{
  width:42px;height:42px;border-radius:14px;flex-shrink:0;
  background:linear-gradient(135deg,var(--blue),var(--teal));
  display:flex;align-items:center;justify-content:center;
  font-weight:800;font-size:15px;color:var(--white);
}
.admin-name{font-size:13px;font-weight:800;color:var(--blue)}
.admin-role{font-size:11px;color:var(--gray-400);margin-top:2px}

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

/* GLASS CARD */
.glass-card{background:var(--white);border:1.5px solid var(--gray-200);border-radius:var(--radius-lg);padding:24px;animation:fadeUp .4s ease-out .1s both}

/* FORM STYLES */
.form-section{margin-bottom:24px}
.form-section-title{font-size:12px;font-weight:700;letter-spacing:.08em;color:var(--gray-400);text-transform:uppercase;margin-bottom:16px}
.field{margin-bottom:20px}
.field label{display:block;font-size:12px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:var(--gray-600);margin-bottom:8px}
.input-wrap{position:relative}
.input-wrap i{position:absolute;left:12px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:13px;pointer-events:none}
.input-wrap input,.input-wrap select,.input-wrap textarea{width:100%;padding:11px 12px 11px 36px;background:var(--gray-50);border:1.5px solid var(--gray-200);border-radius:var(--radius);font-family:var(--font);font-size:13px;color:var(--gray-800);outline:none;transition:border-color .15s,box-shadow .15s}
.input-wrap input:focus,.input-wrap select:focus,.input-wrap textarea:focus{border-color:var(--blue);box-shadow:0 0 0 3px rgba(30,58,95,0.08)}
.input-wrap input::placeholder,.input-wrap textarea::placeholder{color:var(--gray-400)}
.input-wrap select{background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6'%3E%3Cpath d='M0 0l5 6 5-6z' fill='%2394A3B8'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:calc(100% - 12px) center;padding-right:32px}
.input-wrap textarea{resize:vertical;min-height:80px;padding-top:11px;padding-bottom:11px}
.field-hint{font-size:11px;color:var(--gray-500);margin-top:6px}
.field-row{display:grid;grid-template-columns:1fr 1fr;gap:16px}

.checkbox-group{display:flex;flex-direction:column;gap:10px;padding:14px;background:var(--gray-50);border:1.5px solid var(--gray-200);border-radius:var(--radius)}
.checkbox-item{display:flex;align-items:center;gap:10px}
.checkbox-item input[type=checkbox]{appearance:none;width:18px;height:18px;border:1.5px solid var(--gray-200);border-radius:4px;background:var(--white);cursor:pointer;flex-shrink:0;transition:all .15s}
.checkbox-item input[type=checkbox]:checked{background:var(--blue);border-color:var(--blue)}
.checkbox-item input[type=checkbox]:checked::after{content:'✓';position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);color:var(--white);font-size:11px;font-weight:800}
.checkbox-item input[type=checkbox]:disabled{opacity:.5;cursor:not-allowed}
.checkbox-item label{font-size:13px;color:var(--gray-700);cursor:pointer;font-weight:500}

.form-actions{display:flex;gap:12px;margin-top:32px}
.btn-submit{flex:1;padding:12px;background:var(--blue);color:var(--white);border:none;border-radius:var(--radius);font-family:var(--font);font-size:13px;font-weight:700;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:8px;transition:transform .15s,box-shadow .15s}
.btn-submit:hover{transform:translateY(-1px);box-shadow:0 4px 12px rgba(30,58,95,0.3)}
.btn-cancel{padding:12px 20px;background:var(--white);border:1.5px solid var(--gray-200);border-radius:var(--radius);color:var(--gray-600);font-size:13px;font-weight:600;text-decoration:none;display:inline-flex;align-items:center;gap:8px;transition:all .15s}
.btn-cancel:hover{border-color:var(--blue);color:var(--blue);background:var(--blue-light)}

/* COMPANY BANNER */
.company-banner{background:var(--blue-light);border:1.5px solid rgba(30,58,95,0.12);border-radius:var(--radius-lg);padding:18px 20px;display:flex;align-items:center;gap:16px;margin-bottom:20px;animation:fadeUp .4s ease-out .05s both}
.cb-icon{width:48px;height:48px;border-radius:12px;background:linear-gradient(135deg,var(--blue),var(--teal));border:1.5px solid rgba(30,58,95,0.12);display:flex;align-items:center;justify-content:center;font-size:18px;color:var(--white);flex-shrink:0}
.cb-info{}
.cb-name{font-size:16px;font-weight:800;color:var(--blue)}
.cb-addr{font-size:12px;color:var(--gray-600);margin-top:2px;display:flex;align-items:center;gap:5px}
.cb-addr i{font-size:10px;color:var(--teal)}
.cb-badge{margin-left:auto;font-size:11px;font-weight:700;padding:5px 13px;border-radius:100px;background:var(--teal-light);color:var(--teal);border:1.5px solid rgba(42,157,143,0.2);flex-shrink:0}

/* DANGER ZONE */
.danger-zone{background:var(--red-light);border:1.5px solid #FED7D7;border-radius:var(--radius-lg);padding:18px 20px;margin-top:16px;display:flex;align-items:center;justify-content:space-between;gap:12px;animation:fadeUp .4s ease-out .3s both}
.dz-title{font-size:13px;font-weight:700;color:var(--red);margin-bottom:2px}
.dz-sub{font-size:12px;color:var(--gray-600)}
.btn-delete{display:inline-flex;align-items:center;gap:7px;padding:9px 18px;background:var(--red-light);border:1.5px solid #FED7D7;border-radius:10px;color:var(--red);font-size:12px;font-weight:600;cursor:pointer;font-family:var(--font);transition:all .15s;flex-shrink:0}
.btn-delete:hover{background:#FED7D7;border-color:var(--red)}

/* ALERT */
.alert-error{background:var(--red-light);border:1.5px solid #FED7D7;border-radius:var(--radius-lg);padding:14px 16px;margin-bottom:24px;display:flex;align-items:flex-start;gap:12px}
.alert-error i{color:var(--red);font-size:16px;margin-top:1px;flex-shrink:0}
.alert-error-title{font-size:13px;font-weight:700;color:var(--red)}

@keyframes fadeUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}

@media(max-width:900px){
  .sidebar{display:none}
  .main-inner{padding:20px 16px 40px}
  .field-row{grid-template-columns:1fr}
}
</style>

<div class="wrapper">

  <!-- SIDEBAR (UNCHANGED) -->
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
          <div class="page-tag"><i class="fa-solid fa-pen-to-square"></i> Edit Data</div>
          <div class="page-title">Edit Data Perusahaan</div>
          <div class="page-sub">Perbarui informasi perusahaan mitra</div>
        </div>
        <div class="topbar-actions">
          <a href="{{ route('admin.perusahaan.index') }}" class="btn-outline">
            <i class="fa-solid fa-arrow-left"></i> Kembali
          </a>
        </div>
      </div>

      {{-- COMPANY BANNER --}}
      <div class="company-banner">
        <div class="cb-icon"><i class="fa-solid fa-building"></i></div>
        <div class="cb-info">
          <div class="cb-name">{{ $perusahaan->nama_perusahaan }}</div>
          <div class="cb-addr">
            <i class="fa-solid fa-location-dot"></i>
            {{ Str::limit($perusahaan->alamat, 50) }}
          </div>
        </div>
        <div class="cb-badge">{{ $perusahaan->bidang }}</div>
      </div>

      <!-- FORM CARD -->
      <div class="glass-card">
        <form method="POST" action="{{ route('admin.perusahaan.update', $perusahaan->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          @if($errors->any())
          <div class="alert-error">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <div>
              <div class="alert-error-title">Error!</div>
              <div style="font-size:13px;color:var(--red);margin-top:2px">{{ $errors->first() }}</div>
            </div>
          </div>
          @endif

          <div class="form-section">
            <div class="form-section-title">Identitas Perusahaan</div>

            <div class="field">
              <label>Nama Perusahaan</label>
              <div class="input-wrap">
                <i class="fa-solid fa-building"></i>
                <input type="text" name="nama_perusahaan" value="{{ $perusahaan->nama_perusahaan }}" required>
              </div>
            </div>

            <div class="field">
              <label>Alamat</label>
              <div class="input-wrap">
                <i class="fa-solid fa-location-dot"></i>
                <textarea name="alamat" required>{{ $perusahaan->alamat }}</textarea>
              </div>
            </div>

            <div class="field-row">
              <div class="field">
                <label>Kota</label>
                <div class="input-wrap">
                  <i class="fa-solid fa-city"></i>
                  <input type="text" name="kota" placeholder="Contoh: Surabaya" value="{{ $perusahaan->kota }}" required>
                </div>
              </div>
              <div class="field">
                <label>Provinsi</label>
                <div class="input-wrap">
                  <i class="fa-solid fa-map"></i>
                  <input type="text" name="provinsi" placeholder="Contoh: Jawa Timur" value="{{ $perusahaan->provinsi }}" required>
                </div>
              </div>
            </div>

            <div class="field">
              <label>Logo / Gambar Perusahaan <span style="color:var(--gray-500);font-size:10px;font-weight:400;text-transform:none;letter-spacing:0">(opsional)</span></label>
              <div class="input-wrap">
                <i class="fa-solid fa-image"></i>
                <input type="file" name="gambar" accept="image/*">
              </div>
              <div class="field-hint">Format JPG, PNG, WebP. Maksimal 2MB.</div>
            </div>

            <div class="field">
              <label>Preview Saat Ini</label>
              <div style="display:flex;align-items:center;gap:14px;">
                <img src="{{ $perusahaan->getLogoUrl() }}" alt="Logo perusahaan" style="width:100px;height:100px;object-fit:cover;border-radius:12px;border:1.5px solid var(--gray-200);">
                @if($perusahaan->gambar)
                  <span style="color:var(--gray-600);font-size:13px;">Nama file: {{ $perusahaan->gambar }}</span>
                @else
                  <span style="color:var(--gray-500);font-size:13px;font-style:italic;">Logo placeholder (otomatis dibuat dari nama perusahaan)</span>
                @endif
              </div>
            </div>
          </div>

          <div class="form-section">
            <div class="form-section-title">Detail PKL</div>

            <div class="field">
              <label>Bidang Pekerjaan</label>
              <div class="input-wrap">
                <i class="fa-solid fa-briefcase"></i>
                <input type="text" name="bidang" placeholder="Contoh: IT, Manufaktur, Retail" value="{{ $perusahaan->bidang }}" required>
              </div>
            </div>

            <div class="field-row">
              <div class="field">
                <label>Jurusan Dibutuhkan</label>
                <div class="input-wrap">
                  <i class="fa-solid fa-graduation-cap fi"></i>
                  @php
                    $selectedJurusans = [];
                    if (is_array($perusahaan->jurusan_dibutuhkan)) {
                      $selectedJurusans = $perusahaan->jurusan_dibutuhkan;
                    } elseif (is_string($perusahaan->jurusan_dibutuhkan)) {
                      $decoded = json_decode($perusahaan->jurusan_dibutuhkan, true);
                      $selectedJurusans = is_array($decoded) ? $decoded : [];
                    }
                  @endphp
                  <select name="jurusan_dibutuhkan[]" id="jurusanInput" required>
                    <option value="">-- Pilih Jurusan --</option>
                    <option value="SIJA" {{ in_array('SIJA', $selectedJurusans) ? 'selected' : '' }}>SIJA - Sistem Informasi Jaringan dan Aplikasi</option>
                  </select>
                </div>
                <div class="field-hint">
                  <i class="fa-solid fa-circle-info" style="margin-right:6px;color:var(--teal)"></i>
                  Pilih jurusan yang sesuai dengan kebutuhan perusahaan
                </div>
              </div>
              <div class="field">
                <label>Kuota Peserta</label>
                <div class="input-wrap">
                  <i class="fa-solid fa-users"></i>
                  <input type="number" name="kuota" value="{{ $perusahaan->kuota }}" min="1" required>
                </div>
              </div>
            </div>

            <div class="field">
              <label>Deskripsi <span style="color:var(--gray-500);font-size:10px;font-weight:400;text-transform:none;letter-spacing:0">(opsional)</span></label>
              <div class="input-wrap">
                <i class="fa-solid fa-list-check"></i>
                <textarea name="deskripsi">{{ $perusahaan->deskripsi }}</textarea>
              </div>
            </div>
          </div>

          <div class="form-actions">
            <a href="{{ route('admin.perusahaan.index') }}" class="btn-cancel">
              <i class="fa-solid fa-xmark"></i> Batal
            </a>
            <button type="submit" class="btn-submit">
              <i class="fa-solid fa-check"></i> Simpan Perubahan
            </button>
          </div>
        </form>
      </div>

      {{-- DANGER ZONE --}}
      <div class="danger-zone">
        <div>
          <div class="dz-title"><i class="fa-solid fa-triangle-exclamation"></i> Hapus Perusahaan</div>
          <div class="dz-sub">Tindakan ini tidak dapat dibatalkan. Seluruh data akan terhapus.</div>
        </div>
        <form action="{{ route('admin.perusahaan.destroy', $perusahaan->id) }}" method="POST" id="deleteForm">
          @csrf @method('DELETE')
          <button type="button" class="btn-delete" onclick="confirmDelete()">
            <i class="fa-solid fa-trash"></i> Hapus
          </button>
        </form>
      </div>
    </div>
  </main>
</div>

<script>
function confirmDelete(){
  if(confirm('Yakin ingin menghapus perusahaan ini?\nTindakan ini tidak dapat dibatalkan.')){
    document.getElementById('deleteForm').submit();
  }
}
</script>

@endsection 