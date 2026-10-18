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
.main-inner{padding:clamp(20px,3vh,32px) clamp(16px,3vw,36px) clamp(40px,6vh,60px);max-width:1000px}

/* PAGE HEADER */
.page-header{margin-bottom:clamp(20px,4vh,28px);animation:fadeUp .4s ease-out both}
.back-link{display:inline-flex;align-items:center;gap:7px;color:var(--gray-600);font-size:clamp(12px,1.5vw,13px);text-decoration:none;margin-bottom:12px;transition:color .15s}
.back-link:hover{color:var(--blue)}
.page-tag{display:inline-flex;align-items:center;gap:6px;background:var(--blue-light);color:var(--blue);font-size:clamp(9px,1.2vw,11px);font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:clamp(3px,0.5vh,4px) clamp(8px,1.5vw,12px);border-radius:100px;margin-bottom:clamp(6px,1.2vh,8px)}
.page-title{font-size:clamp(20px,4vw,26px);font-weight:800;color:var(--blue);letter-spacing:-.5px}
.page-sub{font-size:clamp(12px,2vw,14px);color:var(--gray-600);margin-top:clamp(2px,0.5vh,4px)}

/* FORM CARD */
.form-card{background:var(--white);border:1.5px solid var(--gray-200);border-radius:var(--radius-lg);padding:clamp(16px,2.5vh,28px);animation:fadeUp .4s ease-out .1s both}

/* FORM SECTIONS */
.form-section-title{font-size:clamp(9px,1.2vw,11px);font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:var(--gray-400);margin-bottom:clamp(12px,2vh,16px)}
.form-divider{height:1.5px;background:var(--gray-200);margin:clamp(16px,3vh,24px) 0}

/* FIELD */
.field{margin-bottom:clamp(14px,2.5vh,20px)}
.field label{display:block;font-size:clamp(9px,1.2vw,11px);font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:var(--gray-400);margin-bottom:clamp(6px,1.2vh,8px)}
.input-wrap{position:relative}
.input-wrap i{position:absolute;left:clamp(10px,1.5vw,12px);top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:clamp(11px,1.5vw,13px);pointer-events:none;transition:color .15s}
.input-wrap input,
.input-wrap select{width:100%;padding:clamp(9px,1.5vh,11px) clamp(10px,1.5vw,12px) clamp(9px,1.5vh,11px) clamp(36px,5vw,38px);background:var(--gray-50);border:1.5px solid var(--gray-200);border-radius:var(--radius);font-size:clamp(12px,1.5vw,13px);color:var(--gray-800);font-family:var(--font);outline:none;transition:border-color .15s,box-shadow .15s;appearance:none}
.input-wrap select{background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6'%3E%3Cpath d='M0 0l5 6 5-6z' fill='%2394A3B8'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:calc(100% - 10px) center;background-color:var(--gray-50)}
.input-wrap input::placeholder{color:var(--gray-400)}
.input-wrap input:focus,
.input-wrap select:focus{border-color:var(--blue);box-shadow:0 0 0 3px rgba(30,58,95,0.08);background:var(--white)}
.input-wrap:focus-within i{color:var(--blue)}
.input-wrap select option{background:var(--white);color:var(--gray-800)}

/* 2-COL */
.field-row{display:grid;grid-template-columns:1fr 1fr;gap:clamp(12px,2vw,16px)}

/* HINT */
.field-hint{font-size:clamp(9px,1.2vw,11px);color:var(--gray-500);margin-top:6px}

/* ACTIONS */
.form-actions{display:flex;gap:clamp(8px,1.5vw,12px);margin-top:clamp(20px,3.5vh,28px)}
.btn-submit{flex:1;padding:clamp(10px,1.8vh,12px);background:var(--blue);color:var(--white);border:none;border-radius:var(--radius);font-size:clamp(12px,1.5vw,13px);font-weight:700;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:8px;transition:all .15s;box-shadow:0 2px 8px rgba(30,58,95,0.2)}
.btn-submit:hover{background:var(--blue-mid);transform:translateY(-1px);box-shadow:0 6px 16px rgba(30,58,95,0.28)}
.btn-cancel{padding:clamp(10px,1.8vh,12px) clamp(14px,2.5vw,18px);background:var(--white);border:1.5px solid var(--gray-200);border-radius:var(--radius);color:var(--gray-600);font-size:clamp(12px,1.5vw,13px);font-weight:600;text-decoration:none;display:inline-flex;align-items:center;gap:8px;transition:all .15s}
.btn-cancel:hover{border-color:var(--blue);color:var(--blue);background:var(--blue-light)}

/* ERROR BOX */
.err-box{background:var(--red-light);border:1.5px solid #FED7D7;border-radius:var(--radius);padding:clamp(10px,1.5vh,12px) clamp(10px,1.5vw,14px);font-size:clamp(12px,1.5vw,13px);color:var(--red);margin-bottom:clamp(14px,2.5vh,20px);display:flex;align-items:flex-start;gap:10px}

/* FILE UPLOAD */
.file-upload-wrap{position:relative;display:block;width:100%;cursor:pointer}
.file-upload-wrap input[type="file"]{display:none}
.file-upload-label{display:flex;align-items:center;justify-content:center;gap:clamp(12px,2vw,16px);flex-direction:column;padding:clamp(24px,4vh,40px);border:2px dashed var(--blue-light);border-radius:var(--radius-lg);background:rgba(30,58,95,0.03);transition:all .3s;text-align:center}
.file-upload-label:hover{border-color:var(--blue);background:rgba(30,58,95,0.06)}
.file-upload-label.active{border-color:var(--blue);background:var(--blue-light)}
.file-upload-icon{font-size:clamp(32px,8vw,40px);color:var(--blue)}
.file-upload-text h3{font-size:clamp(12px,2vw,14px);font-weight:700;color:var(--gray-800);margin-bottom:clamp(2px,0.5vh,4px)}
.file-upload-text p{font-size:clamp(11px,1.5vw,12px);color:var(--gray-600)}
.file-name-display{font-size:clamp(11px,1.5vw,12px);color:var(--teal);margin-top:clamp(6px,1.2vh,8px);padding:clamp(6px,1vh,8px) clamp(10px,1.5vw,12px);background:var(--teal-light);border-radius:var(--radius);border:1px solid rgba(42,157,143,0.3)}

/* INFO BOX */
.info-box{background:var(--gray-50);border:1.5px solid var(--gray-200);border-radius:var(--radius-lg);padding:clamp(12px,1.5vh,16px);margin-top:clamp(14px,2.5vh,20px)}
.info-box h4{font-size:clamp(11px,1.5vw,13px);font-weight:700;color:var(--blue);margin-bottom:clamp(8px,1.5vh,12px);display:flex;align-items:center;gap:8px}
.info-box p{font-size:clamp(11px,1.5vw,12px);color:var(--gray-600);line-height:1.6;margin:clamp(4px,1vh,6px) 0}
.info-box ul{font-size:clamp(11px,1.5vw,12px);color:var(--gray-600);margin:clamp(6px,1.2vh,8px) 0 0 clamp(16px,2vw,20px);list-style:disc}
.info-box li{margin:4px 0}

/* ─────────────────────────────────────────────────────────────── */
/* RESPONSIVE DESIGN - MULTIPLE BREAKPOINTS */
/* ─────────────────────────────────────────────────────────────── */

@media(max-width:480px){
  .sidebar{display:none}
  .main-inner{padding:clamp(12px,3vh,20px) clamp(12px,3vw,16px) 30px}
  .page-tag{font-size:9px;padding:3px 9px}
  .page-title{font-size:clamp(18px,4vw,22px)}
  .page-sub{font-size:12px}
  .form-card{border-radius:12px;padding:16px}
  .form-section-title{font-size:9px}
  .field label{font-size:10px}
  .field{margin-bottom:14px}
  .input-wrap input,.input-wrap select{padding:10px 12px 10px 36px;font-size:12px}
  .file-upload-label{padding:24px;flex-direction:column}
  .file-upload-icon{font-size:32px}
  .file-upload-text h3{font-size:13px}
  .file-upload-text p{font-size:11px}
  .form-actions{flex-direction:column;gap:8px}
  .btn-submit,.btn-cancel{width:100%;padding:10px}
  .info-box{font-size:12px;padding:12px}
  .info-box h4{font-size:12px}
  .info-box p,.info-box ul{font-size:11px}
}

@media(min-width:481px) and (max-width:768px){
  .sidebar{display:none}
  .main-inner{padding:20px 16px 40px}
  .page-title{font-size:clamp(20px,4vw,24px)}
  .form-card{padding:20px}
}

@media(min-width:769px) and (max-width:1024px){
  .sidebar{width:200px}
  .main-inner{padding:24px 20px 40px}
}

@media(min-width:1025px){
  .main-inner{max-width:900px}
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
      <div class="page-header">
        <a href="{{ route('admin.siswa.index') }}" class="back-link">
          <i class="fa-solid fa-arrow-left"></i> Kembali ke Data Siswa
        </a>
        <div class="page-tag">Import Data</div>
        <div class="page-title">Import Data Siswa</div>
        <div class="page-sub">Tambahkan siswa secara massal menggunakan file CSV</div>
      </div>

      <div class="form-card">
        <form action="{{ route('admin.siswa.storeImport') }}" method="POST" enctype="multipart/form-data" id="import-form">
          @csrf

          @if($errors->any())
          <div class="err-box">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <div>
              <strong>Terjadi Kesalahan:</strong>
              <ul style="margin-top:8px;margin-left:20px;font-size:12px;list-style:disc">
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          </div>
          @endif

          <div class="form-section-title">Pilih File untuk Diimport</div>

          <div class="field">
            <label>File CSV</label>
            <div class="file-upload-wrap">
              <input type="file" id="file-input" name="file" accept=".csv,.txt" required>
              <label for="file-input" class="file-upload-label" id="file-label">
                <div class="file-upload-icon">
                  <i class="fa-solid fa-cloud-arrow-up"></i>
                </div>
                <div class="file-upload-text">
                  <h3>Pilih file atau drag & drop</h3>
                  <p>CSV (.csv) atau TXT — Maksimal 5MB</p>
                </div>
              </label>
              <div class="file-name-display" id="file-name" style="display:none;"></div>
            </div>
            <div class="field-hint">
              <i class="fa-solid fa-info-circle"></i>
              Download template terlebih dahulu untuk memastikan format file sesuai dengan kebutuhan
            </div>
          </div>

          <div class="form-divider"></div>

          <div class="info-box">
            <h4><i class="fa-solid fa-list"></i> Cara Menggunakan</h4>
            <ul>
              <li>Download template dari halaman Data Siswa</li>
              <li>Isi data siswa: NIS, Nama, Kelas, Jurusan</li>
              <li>Pastikan setiap NIS unik (tidak ada duplikat)</li>
              <li>Simpan file dengan format CSV (gunakan semicolon ; sebagai pemisah kolom)</li>
              <li>Upload file di sini</li>
            </ul>
          </div>

          <div class="info-box">
            <h4><i class="fa-solid fa-lightbulb"></i> Format File CSV</h4>
            <p><strong>Header (Baris Pertama):</strong> NIS; Nama; Kelas; Jurusan</p>
            <p style="margin-top:8px;"><strong>Data (Baris Berikutnya):</strong> Diisi dengan data siswa sesuai format</p>
            <p style="margin-top:8px;"><strong>Delimiter:</strong> Semicolon (;) sebagai pemisah kolom</p>
          </div>

          <div class="form-actions">
            <button type="submit" class="btn-submit" id="submit-btn">
              <i class="fa-solid fa-upload"></i> Import Data
            </button>
            <a href="{{ route('admin.siswa.index') }}" class="btn-cancel">
              <i class="fa-solid fa-times"></i> Batal
            </a>
          </div>
        </form>
      </div>
    </div>
  </main>
</div>

<script>
  const fileInput = document.getElementById('file-input');
  const fileLabel = document.getElementById('file-label');
  const fileNameDisplay = document.getElementById('file-name');
  const importForm = document.getElementById('import-form');

  // Handle file selection
  fileInput.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
      fileLabel.style.display = 'none';
      fileNameDisplay.textContent = `📎 ${file.name} (${(file.size / 1024).toFixed(2)} KB)`;
      fileNameDisplay.style.display = 'block';
    }
  });

  // Handle drag and drop
  fileLabel.addEventListener('dragover', function(e) {
    e.preventDefault();
    fileLabel.classList.add('active');
  });

  fileLabel.addEventListener('dragleave', function() {
    fileLabel.classList.remove('active');
  });

  fileLabel.addEventListener('drop', function(e) {
    e.preventDefault();
    fileLabel.classList.remove('active');
    
    const files = e.dataTransfer.files;
    if (files.length > 0) {
      fileInput.files = files;
      const event = new Event('change', { bubbles: true });
      fileInput.dispatchEvent(event);
    }
  });

  // Form submission validation
  importForm.addEventListener('submit', function(e) {
    if (!fileInput.files.length) {
      e.preventDefault();
      alert('Silakan pilih file terlebih dahulu');
    }
  });
</script>

@endsection
