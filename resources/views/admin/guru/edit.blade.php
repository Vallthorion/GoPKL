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
  --green:#16A34A;
  --green-light:#F0FDF4;
  --font:'Plus Jakarta Sans',sans-serif;
  --radius:10px;
  --radius-lg:16px;
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
.menu{display:flex;flex-direction:column;gap:2px;padding-bottom:16px}
.menu a{
  display:flex;align-items:center;gap:10px;
  padding:9px 10px;border-radius:var(--radius);
  color:var(--gray-600);text-decoration:none;
  font-size:13px;font-weight:500;transition:all .15s;
}
.menu a:hover{background:var(--gray-100);color:var(--gray-800)}
.menu a.active{background:var(--blue-light);color:var(--blue);font-weight:700}
.menu a i{width:15px;text-align:center;font-size:12px;flex-shrink:0}
.menu-divider{height:1.5px;background:var(--gray-200);margin:8px 20px}

.sidebar-footer{margin-top:auto;padding:16px 20px;border-top:1.5px solid var(--gray-200)}
.logout-btn{
  width:100%;display:flex;align-items:center;gap:9px;
  padding:9px 10px;border-radius:var(--radius);
  background:var(--red-light);border:1.5px solid #FED7D7;
  color:var(--red);font-size:13px;font-weight:600;
  cursor:pointer;font-family:var(--font);transition:all .15s;
}
.logout-btn:hover{background:#FED7D7}

/* ── MAIN ── */
.main{flex:1;min-width:0;background:linear-gradient(135deg,rgba(229,243,255,0.3),rgba(230,247,245,0.2))}
.main-inner{
  padding:clamp(24px,4vh,36px) clamp(20px,3.5vw,40px) clamp(48px,8vh,64px);
  max-width:1000px;
}

/* PAGE HEADER */
.page-header{margin-bottom:clamp(24px,4.5vh,32px);animation:fadeUp .4s ease-out both}
.back-link{
  display:inline-flex;
  align-items:center;
  gap:7px;
  color:var(--gray-500);
  font-size:clamp(12px,1.5vw,13px);
  text-decoration:none;
  margin-bottom:clamp(12px,2vh,16px);
  transition:color .2s;
  font-weight:500;
}
.back-link:hover{color:var(--teal)}
.page-tag{
  display:inline-flex;
  align-items:center;
  gap:6px;
  background:linear-gradient(135deg,rgba(42,157,143,0.1),rgba(42,157,143,0.05));
  color:var(--teal);
  font-size:clamp(9px,1.2vw,11px);
  font-weight:700;
  letter-spacing:.08em;
  text-transform:uppercase;
  padding:clamp(4px,0.8vh,5px) clamp(10px,1.8vw,14px);
  border-radius:100px;
  margin-bottom:clamp(8px,1.5vh,12px);
  border:1px solid rgba(42,157,143,0.2);
}
.page-title{
  font-size:clamp(22px,4.5vw,28px);
  font-weight:800;
  color:var(--blue);
  letter-spacing:-.6px;
  line-height:1.15;
}
.page-sub{
  font-size:clamp(13px,2vw,15px);
  color:var(--gray-600);
  margin-top:clamp(4px,1vh,6px);
  line-height:1.6;
}

/* FORM CARD */
.form-card{
  background:var(--white);
  border:1.5px solid var(--gray-200);
  border-radius:var(--radius-lg);
  padding:clamp(20px,3vh,32px);
  animation:fadeUp .4s ease-out .1s both;
  box-shadow:0 2px 8px rgba(30,58,95,0.06);
}

/* FORM SECTIONS */
.form-section-title{
  font-size:clamp(10px,1.3vw,12px);
  font-weight:700;
  letter-spacing:.08em;
  text-transform:uppercase;
  color:var(--blue);
  margin-bottom:clamp(14px,2.5vh,20px);
  display:flex;align-items:center;gap:10px;
}
.form-section-title::before{
  content:'';width:24px;height:24px;border-radius:8px;
  background:var(--blue-light);display:flex;align-items:center;justify-content:center;
  font-size:11px;flex-shrink:0;
}
.form-divider{height:1.5px;background:linear-gradient(90deg,var(--gray-200),transparent);margin:clamp(18px,3.5vh,28px) 0}

/* FIELD */
.field{margin-bottom:clamp(16px,3vh,24px)}
.field label{
  display:block;
  font-size:clamp(10px,1.3vw,12px);
  font-weight:700;
  letter-spacing:.05em;
  color:var(--blue);
  margin-bottom:clamp(7px,1.2vh,10px);
  text-transform:uppercase;
}
.input-wrap{position:relative}
.input-wrap i{
  position:absolute;
  left:clamp(10px,1.5vw,12px);
  top:50%;
  transform:translateY(-50%);
  color:var(--teal);
  font-size:clamp(12px,1.6vw,14px);
  pointer-events:none;
  transition:color .2s;
}
.input-wrap input,
.input-wrap select{
  width:100%;
  padding:clamp(10px,1.7vh,12px) clamp(11px,1.7vw,13px) clamp(10px,1.7vh,12px) clamp(38px,6vw,42px);
  background:var(--gray-50);
  border:1.5px solid var(--gray-200);
  border-radius:var(--radius);
  font-size:clamp(13px,1.6vw,14px);
  color:var(--gray-800);
  font-family:var(--font);
  outline:none;
  transition:border-color .2s,box-shadow .2s,background .2s;
  appearance:none;
}
.input-wrap select{
  background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6'%3E%3Cpath d='M0 0l5 6 5-6z' fill='%232A9D8F'/%3E%3C/svg%3E");
  background-repeat:no-repeat;
  background-position:calc(100% - 12px) center;
  background-color:var(--gray-50);
  padding-right:36px;
}
.input-wrap input::placeholder{color:var(--gray-400)}
.input-wrap input:focus,
.input-wrap select:focus{
  border-color:var(--teal);
  box-shadow:0 0 0 3px rgba(42,157,143,0.12);
  background:var(--white);
}
.input-wrap:focus-within i{color:var(--teal)}
.input-wrap select option{background:var(--white);color:var(--gray-800)}
.input-wrap input:disabled,
.input-wrap select:disabled{
  background:var(--gray-100);
  cursor:not-allowed;
  opacity:.6;
}

/* HINT */
.field-hint{
  font-size:clamp(10px,1.3vw,12px);
  color:var(--gray-500);
  margin-top:clamp(6px,1vh,8px);
  line-height:1.5;
}

/* ACTIONS */
.form-actions{
  display:flex;
  gap:clamp(10px,2vw,14px);
  margin-top:clamp(24px,4vh,32px);
  padding-top:clamp(18px,3vh,24px);
  border-top:1.5px solid var(--gray-200);
}
.btn-submit{
  flex:1;
  padding:clamp(11px,2vh,14px);
  background:linear-gradient(135deg,var(--teal),#1f8876);
  color:var(--white);
  border:none;
  border-radius:var(--radius);
  font-size:clamp(13px,1.6vw,14px);
  font-weight:700;
  cursor:pointer;
  display:flex;
  align-items:center;
  justify-content:center;
  gap:9px;
  transition:all .2s;
  box-shadow:0 4px 12px rgba(42,157,143,0.25);
}
.btn-submit:hover{
  transform:translateY(-2px);
  box-shadow:0 8px 20px rgba(42,157,143,0.35);
}
.btn-submit:active{transform:translateY(0)}
.btn-cancel{
  padding:clamp(11px,2vh,14px) clamp(16px,3vw,20px);
  background:var(--white);
  border:1.5px solid var(--gray-200);
  border-radius:var(--radius);
  color:var(--gray-600);
  font-size:clamp(13px,1.6vw,14px);
  font-weight:600;
  text-decoration:none;
  display:inline-flex;
  align-items:center;
  gap:8px;
  transition:all .2s;
}
.btn-cancel:hover{
  border-color:var(--teal);
  color:var(--teal);
  background:rgba(42,157,143,0.05);
  transform:translateY(-1px);
}

/* ERROR BOX */
.err-box{
  background:linear-gradient(135deg,#FFF5F5,#FFEBEE);
  border:1.5px solid #FED7D7;
  border-radius:var(--radius);
  padding:clamp(12px,2vh,16px) clamp(14px,2.5vw,18px);
  font-size:clamp(12px,1.5vw,13px);
  color:var(--red);
  margin-bottom:clamp(16px,3vh,24px);
  display:flex;
  align-items:flex-start;
  gap:clamp(10px,1.5vw,12px);
  animation:slideDown .3s ease-out;
}
.err-box i{margin-top:2px;flex-shrink:0;font-size:14px}

/* TOAST NOTIFICATIONS */
.toast-container{
  position:fixed;
  top:clamp(16px,2vw,24px);
  right:clamp(16px,2vw,24px);
  z-index:99999;
  display:flex;
  flex-direction:column;
  gap:clamp(10px,1.5vw,12px);
  max-width:clamp(280px,90vw,400px);
  pointer-events:none;
}
.toast{
  display:flex;
  align-items:flex-start;
  gap:clamp(10px,1.5vw,12px);
  padding:clamp(12px,2vh,16px) clamp(14px,2.5vw,18px);
  border-radius:var(--radius);
  font-size:clamp(12px,1.5vw,13px);
  font-weight:600;
  animation:toastSlideIn .3s ease-out;
  box-shadow:0 8px 24px rgba(0,0,0,0.15);
  backdrop-filter:blur(10px);
  pointer-events:auto;
}
.toast.success{
  background:linear-gradient(135deg,#10b981,#059669);
  color:var(--white);
  border:1.5px solid rgba(16,185,129,0.3);
}
.toast.error{
  background:linear-gradient(135deg,#ef4444,#dc2626);
  color:var(--white);
  border:1.5px solid rgba(239,68,68,0.3);
}
.toast.info{
  background:linear-gradient(135deg,var(--blue),#1e40af);
  color:var(--white);
  border:1.5px solid rgba(30,58,95,0.3);
}
.toast.warning{
  background:linear-gradient(135deg,#f59e0b,#d97706);
  color:var(--white);
  border:1.5px solid rgba(245,158,11,0.3);
}
.toast-icon{font-size:clamp(14px,1.5vw,16px);flex-shrink:0}
.toast-message{line-height:1.5}
.toast-close{width:20px;height:20px;border:none;background:none;color:rgba(255,255,255,0.7);cursor:pointer;font-size:16px;flex-shrink:0;transition:color .15s}
.toast-close:hover{color:var(--white)}
@keyframes toastSlideIn{from{opacity:0;transform:translateX(400px)}to{opacity:1;transform:translateX(0)}}
@keyframes slideDown{from{opacity:0;transform:translateY(-10px)}to{opacity:1;transform:translateY(0)}}

@media(max-width:768px){
  .sidebar{display:none}
  .main-inner{padding:20px 16px 40px}
  .form-card{padding:16px}
  .form-actions{flex-direction:column}
  .btn-submit{width:100%;order:1}
  .btn-cancel{width:100%;order:2}
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
        <a href="{{ route('admin.guru.index') }}" class="back-link">
          <i class="fa-solid fa-chevron-left"></i> Kembali
        </a>
        <div class="page-tag"><i class="fa-solid fa-edit"></i> Edit Data</div>
        <h1 class="page-title">Edit Guru</h1>
        <p class="page-sub">Ubah informasi guru</p>
      </div>

      <!-- ERROR BOX -->
      @if($errors->any())
      <div class="err-box">
        <i class="fa-solid fa-circle-xmark"></i>
        <div>
          <strong>Terjadi kesalahan:</strong>
          <ul style="margin-top:8px;margin-left:16px;font-size:12px">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      </div>
      @endif

      <!-- FORM CARD -->
      <div class="form-card">
        <form action="{{ route('admin.guru.update', $guru->id) }}" method="POST">
          @csrf
          @method('PUT')

          <!-- SECTION 1: IDENTITAS GURU -->
          <div class="form-section-title">
            <i class="fa-solid fa-user"></i> Identitas Guru
          </div>

          <div class="field">
            <label for="nip">NIP (Nomor Induk Pegawai) *</label>
            <div class="input-wrap">
              <i class="fa-solid fa-id-card"></i>
              <input type="text" id="nip" name="nip" placeholder="Masukkan NIP guru" value="{{ old('nip', $guru->nip) }}" required>
            </div>
            <div class="field-hint">Contoh: 198712101234567890</div>
          </div>

          <div class="field">
            <label for="nama">Nama Lengkap *</label>
            <div class="input-wrap">
              <i class="fa-solid fa-person"></i>
              <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" value="{{ old('nama', $guru->nama) }}" required>
            </div>
            <div class="field-hint">Masukkan nama lengkap guru sesuai dengan data resmi</div>
          </div>

          <div class="form-divider"></div>

          <!-- SECTION 2: TIPE GURU -->
          <div class="form-section-title">
            <i class="fa-solid fa-tag"></i> Tipe Guru
          </div>

          <div class="field">
            <label for="type">Posisi / Tipe Guru *</label>
            <div class="input-wrap">
              <i class="fa-solid fa-briefcase"></i>
              <select id="type" name="type" required>
                <option value="">-- Pilih Tipe Guru --</option>
                <option value="wali_kelas" {{ old('type', $guru->type) === 'wali_kelas' ? 'selected' : '' }}>
                  Wali Kelas (Homeroom Teacher)
                </option>
                <option value="kakomsli" {{ old('type', $guru->type) === 'kakomsli' ? 'selected' : '' }}>
                  Kakonsli (School Counselor)
                </option>
                <option value="kaprog_pplg" {{ old('type', $guru->type) === 'kaprog_pplg' ? 'selected' : '' }}>
                  Kaprog PPLG (Program Coordinator)
                </option>
              </select>
            </div>
            <div class="field-hint">Pilih tipe guru sesuai dengan peran di sekolah</div>
          </div>

          <div class="field" id="kelas-field">
            <label for="kelas">Kelas (untuk Wali Kelas)</label>
            <div class="input-wrap">
              <i class="fa-solid fa-door-open"></i>
              <select id="kelas" name="kelas">
                <option value="">-- Pilih Kelas --</option>
                <option value="XII SIJA 1" {{ old('kelas', $guru->kelas) === 'XII SIJA 1' ? 'selected' : '' }}>XII SIJA 1</option>
                <option value="XII SIJA 2" {{ old('kelas', $guru->kelas) === 'XII SIJA 2' ? 'selected' : '' }}>XII SIJA 2</option>
              </select>
            </div>
            <div class="field-hint">Pilih kelas yang ditangani (hanya untuk Wali Kelas)</div>
          </div>

          <div class="form-divider"></div>

          <!-- SECTION 3: AKUN LOGIN -->
          <div class="form-section-title">
            <i class="fa-solid fa-lock"></i> Akun Login
          </div>

          <div class="field" style="background:var(--blue-light);padding:12px;border-radius:8px;border-left:4px solid var(--blue)">
            <p style="font-size:12px;color:var(--blue);margin:0">
              <i class="fa-solid fa-info-circle"></i> <strong>Username:</strong> <code style="background:rgba(255,255,255,0.5);padding:2px 6px;border-radius:4px">{{ $guru->user->username }}</code>
            </p>
          </div>

          <!-- FORM ACTIONS -->
          <div class="form-actions">
            <button type="submit" class="btn-submit">
              <i class="fa-solid fa-check"></i> Simpan Perubahan
            </button>
            <a href="{{ route('admin.guru.index') }}" class="btn-cancel">
              <i class="fa-solid fa-times"></i> Batal
            </a>
          </div>
        </form>
      </div>

    </div>
  </main>
</div>

<!-- TOAST NOTIFICATIONS -->
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
    <div class="toast-message">${message}</div>
    <button class="toast-close" onclick="this.closest('.toast').remove()">
      <i class="fa-solid fa-times"></i>
    </button>
  `;

  container.appendChild(toast);

  if (duration > 0) {
    setTimeout(() => {
      toast.style.animation = 'slideOut .3s ease-in forwards';
      setTimeout(() => toast.remove(), 300);
    }, duration);
  }
}

document.addEventListener('DOMContentLoaded', function() {
  // Handle kelas field visibility based on type selection
  const typeSelect = document.getElementById('type');
  const kelasField = document.getElementById('kelas-field');
  const kelasInput = document.getElementById('kelas');

  // Function to update visibility
  function updateKelasVisibility() {
    if (typeSelect.value === 'wali_kelas') {
      kelasField.style.display = 'block';
      kelasInput.removeAttribute('disabled');
    } else {
      kelasField.style.display = 'none';
      kelasInput.setAttribute('disabled', 'disabled');
      kelasInput.value = ''; // Clear the value when hidden
    }
  }

  // Initial state
  updateKelasVisibility();

  // Listen for changes
  typeSelect?.addEventListener('change', updateKelasVisibility);

  // Form validation on input
  const nipInput = document.getElementById('nip');
  const namaInput = document.getElementById('nama');

  nipInput?.addEventListener('change', function() {
    if (this.value.length >= 6) {
      showToast('✓ NIP valid: ' + this.value, 'success', 3000);
    } else {
      showToast('NIP terlalu pendek (minimal 6 karakter)', 'warning', 3000);
    }
  });

  namaInput?.addEventListener('change', function() {
    if (this.value.length >= 3) {
      showToast('✓ Nama: ' + this.value, 'success', 3000);
    } else {
      showToast('Nama terlalu pendek', 'warning', 3000);
    }
  });

  // Session flash messages
  @if(session('success'))
    setTimeout(() => {
      showToast('{{ session("success") }}', 'success', 5000);
    }, 500);
  @endif
});
</script>

@endsection
