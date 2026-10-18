<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Edit Siswa - GOPKL</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
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
            --gray-500:#64748B;
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

        .sidebar{width:240px;flex-shrink:0;background:var(--white);border-right:1.5px solid var(--gray-200);display:flex;flex-direction:column;position:sticky;top:0;height:100vh;overflow-y:auto}
        .sidebar-logo-wrap{padding:clamp(14px,2vh,20px) clamp(14px,2vw,20px) 0;border-bottom:1.5px solid var(--gray-200)}
        .logo{display:flex;align-items:center;gap:9px;text-decoration:none;padding-bottom:18px}
        .logo-icon{width:32px;height:32px;background:var(--blue);border-radius:8px;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:13px;color:var(--white);flex-shrink:0}
        .logo-name{font-weight:800;font-size:16px;color:var(--blue)}
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
        .menu-divider{height:1.5px;background:var(--gray-200);margin:8px 20px}

        .sidebar-footer{margin-top:auto;padding:16px 20px;border-top:1.5px solid var(--gray-200)}
        .logout-btn{width:100%;display:flex;align-items:center;gap:9px;padding:10px 12px;border-radius:var(--radius);background:var(--red-light);border:1.5px solid #FED7D7;color:var(--red);font-size:13px;font-weight:600;cursor:pointer;font-family:var(--font);transition:all .15s}
        .logout-btn:hover{background:#FED7D7}

        .main{flex:1;min-width:0}
        .main-inner{padding:32px 36px 60px;max-width:1000px}

        .topbar{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:28px;gap:20px;padding-bottom:24px;border-bottom:1.5px solid var(--gray-200)}
        .topbar-tag{display:inline-flex;align-items:center;gap:7px;background:var(--blue-light);color:var(--blue);font-size:11px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:4px 12px;border-radius:100px;margin-bottom:10px}
        .topbar-title{font-size:clamp(22px,2.5vw,28px);font-weight:800;color:var(--blue);letter-spacing:-.5px}
        .topbar-sub{font-size:14px;color:var(--gray-600);margin-top:4px}
        .topbar-actions{display:flex;align-items:center;gap:8px;flex-wrap:wrap;flex-shrink:0}

        .card{background:var(--white);border:1.5px solid var(--gray-200);border-radius:var(--radius-lg);padding:24px}
        .form-card-top{display:flex;align-items:center;justify-content:space-between;gap:16px;margin-bottom:18px;flex-wrap:wrap}
        .form-card-title{font-size:16px;font-weight:700;color:var(--blue)}
        .form-card-badge{display:inline-flex;align-items:center;gap:6px;padding:6px 14px;border-radius:999px;background:var(--teal-light);color:var(--teal);font-size:11px;font-weight:700;border:1.5px solid rgba(42,157,143,.25)}
        .hint-box{display:flex;align-items:flex-start;gap:10px;padding:14px 16px;margin-bottom:20px;background:rgba(59,130,246,.06);border:1.5px solid rgba(59,130,246,.18);border-radius:var(--radius);color:var(--blue);font-size:13px;line-height:1.6}
        .hint-box i{font-size:16px;margin-top:2px}
        .field{margin-bottom:20px}
        .field label{display:block;font-size:11px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:var(--gray-400);margin-bottom:8px}
        .input-wrap{position:relative}
        .input-wrap i.icon{position:absolute;left:14px;top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:13px;pointer-events:none;transition:color .2s}
        .input-wrap input,
        .input-wrap select{width:100%;padding:13px 14px 13px 42px;background:var(--gray-50);border:1.5px solid var(--gray-200);border-radius:var(--radius);font-size:13px;color:var(--gray-800);font-family:var(--font);outline:none;transition:border-color .2s,box-shadow .2s;appearance:none}
        .input-wrap select{background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6'%3E%3Cpath d='M0 0l5 6 5-6z' fill='%2394A3B8'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:calc(100% - 10px) center;background-color:var(--gray-50)}
        .input-wrap input::placeholder{color:var(--gray-400)}
        .input-wrap input:focus,
        .input-wrap select:focus{border-color:var(--blue);box-shadow:0 0 0 3px rgba(59,130,246,.12);background:var(--white)}
        .input-wrap:focus-within i.icon{color:var(--blue)}
        .field-row{display:grid;grid-template-columns:1fr 1fr;gap:16px}

        .form-actions{display:flex;align-items:center;gap:12px;margin-top:24px;flex-wrap:wrap}
        .btn-primary{display:inline-flex;align-items:center;gap:7px;background:var(--blue);color:var(--white);padding:10px 18px;border-radius:var(--radius);font-size:13px;font-weight:700;text-decoration:none;transition:background .15s,transform .12s,box-shadow .15s;box-shadow:0 2px 8px rgba(30,58,95,0.2)}
        .btn-primary:hover{background:var(--blue-mid);transform:translateY(-1px);box-shadow:0 6px 16px rgba(30,58,95,0.28)}
        .btn-outline{display:inline-flex;align-items:center;gap:7px;background:var(--white);color:var(--gray-600);border:1.5px solid var(--gray-200);padding:10px 18px;border-radius:var(--radius);font-size:13px;font-weight:600;text-decoration:none;transition:all .15s}
        .btn-outline:hover{border-color:var(--blue);color:var(--blue);background:var(--blue-light)}
        .btn-teal{display:inline-flex;align-items:center;gap:7px;background:var(--teal-light);color:var(--teal);border:1.5px solid rgba(42,157,143,.25);padding:10px 18px;border-radius:var(--radius);font-size:13px;font-weight:700;text-decoration:none;transition:all .15s}
        .btn-teal:hover{background:var(--teal);color:var(--white);border-color:var(--teal)}

        .err-box{background:var(--red-light);border:1.5px solid #FECACA;border-radius:var(--radius);padding:14px 16px;font-size:13px;color:var(--red);display:flex;align-items:center;gap:10px;margin-bottom:20px}

        .form-divider{height:1.5px;background:var(--gray-200);margin:24px 0}
        .form-section-title{font-size:14px;font-weight:700;color:var(--blue);margin-bottom:16px}
        .field-hint{font-size:12px;color:var(--gray-500);margin-top:6px}

        @media(max-width:900px){.sidebar{display:none}.main-inner{padding:20px 16px 40px}.topbar{flex-direction:column;align-items:flex-start}.field-row{grid-template-columns:1fr}.topbar-actions{width:100%}}
    </style>
</head>
<body>

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

            <div class="topbar">
                <div>
                    <div class="topbar-tag">Manajemen Data</div>
                    <div class="topbar-title">Edit Data Siswa</div>
                    <div class="topbar-sub">Perbarui informasi siswa yang sudah terdaftar</div>
                </div>
                <div class="topbar-actions">
                    <a href="{{ route('admin.siswa.index') }}" class="btn-outline">
                        <i class="fa-solid fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="form-card-top">
                    <div class="form-card-title">Detail siswa</div>
                    <span class="form-card-badge"><i class="fa-solid fa-check"></i> Pastikan data benar</span>
                </div>
                <div class="hint-box">
                    <i class="fa-solid fa-info-circle"></i>
                    Periksa kembali NIS, nama, jurusan, dan kelas sebelum menyimpan. Data ini akan digunakan untuk laporan dan proses PKL siswa.
                </div>
                <form method="POST" action="{{ route('admin.siswa.update', $siswa->id) }}">
                    @csrf
                    @method('PUT')

                    @if($errors->any())
                        <div class="err-box">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <div class="field">
                        <label>NIS</label>
                        <div class="input-wrap">
                            <i class="fa-solid fa-id-card icon"></i>
                            <input type="text" name="nis" value="{{ $siswa->nis }}" required>
                        </div>
                    </div>

                    <div class="field">
                        <label>Nama Lengkap</label>
                        <div class="input-wrap">
                            <i class="fa-solid fa-user icon"></i>
                            <input type="text" name="nama" value="{{ $siswa->nama }}" required>
                        </div>
                    </div>

                    <div class="field">
                        <label>Jenis Kelamin</label>
                        <div class="input-wrap">
                            <i class="fa-solid fa-venus-mars icon"></i>
                            <select name="jenis_kelamin" required>
                                <option value="">Pilih jenis kelamin</option>
                                <option value="Laki-laki" {{ $siswa->jenis_kelamin=='Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ $siswa->jenis_kelamin=='Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="field-row">
                        <div class="field">
                            <label>Jurusan</label>
                            <div class="input-wrap">
                                <i class="fa-solid fa-graduation-cap icon"></i>
                                <select name="jurusan" id="jurusan" required>
                                    <option value="">Pilih jurusan</option>
                                    @foreach(['SIJA','RPL','TKJ'] as $j)
                                        <option value="{{ $j }}" {{ $siswa->jurusan==$j ? 'selected' : '' }}>{{ $j }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="field">
                            <label>Kelas</label>
                            <div class="input-wrap">
                                <i class="fa-solid fa-door-open icon"></i>
                                <select name="kelas" id="kelas" required></select>
                            </div>
                        </div>
                    </div>

                    <div class="form-divider"></div>
                    <div class="form-section-title">Wali Kelas</div>

                    <div class="field">
                        <label>Wali Kelas</label>
                        <div class="input-wrap">
                            <i class="fa-solid fa-person-chalkboard icon"></i>
                            <select name="guru_id" id="guru_id">
                                <option value="">Pilih wali kelas</option>
                                @foreach($waliKelas as $guru)
                                    <option value="{{ $guru->id }}" data-kelas="{{ $guru->kelas }}" {{ ($siswa->guru_id == $guru->id ? 'selected' : '') }}>
                                        {{ $guru->nama }} ({{ $guru->kelas ?? 'Belum ditentukan' }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="field-hint">Pilih wali kelas sesuai dengan kelas siswa</div>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('admin.siswa.index') }}" class="btn-outline">
                            <i class="fa-solid fa-xmark"></i> Batal
                        </a>
                        <button type="submit" class="btn-primary">
                            <i class="fa-solid fa-check"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </main>
</div>

<script>
    const dataKelas={SIJA:['XII SIJA 1','XII SIJA 2'],RPL:['XII RPL 1','XII RPL 2','XII RPL 3'],TKJ:['XII TKJ 1','XII TKJ 2']};
    const jurusanSel=document.getElementById('jurusan');
    const kelasSel=document.getElementById('kelas');
    const guruSel=document.getElementById('guru_id');

    function loadKelas(jur, selected=null){
        kelasSel.innerHTML='<option value="">Pilih kelas</option>';
        (dataKelas[jur]||[]).forEach(k=>{
            const opt=document.createElement('option');
            opt.value=k; opt.textContent=k;
            if(k===selected) opt.selected=true;
            kelasSel.appendChild(opt);
        });
    }

    function filterGuruByKelas(kelas) {
        const options = guruSel.querySelectorAll('option');
        options.forEach(opt => {
            if (opt.value === '') {
                opt.style.display = 'block';
            } else {
                const guruKelas = opt.getAttribute('data-kelas');
                if (kelas && guruKelas === kelas) {
                    opt.style.display = 'block';
                } else if (!kelas) {
                    opt.style.display = 'block';
                } else {
                    opt.style.display = 'none';
                }
            }
        });
    }

    loadKelas(jurusanSel.value, "{{ $siswa->kelas }}");
    kelasSel.addEventListener('change', function() {
        filterGuruByKelas(this.value);
    });
    jurusanSel.addEventListener('change', function(){ 
        loadKelas(this.value);
        filterGuruByKelas('');
    });
    
    // Initial filter based on current kelas
    if (kelasSel.value) {
        filterGuruByKelas(kelasSel.value);
    }
</script>
</body>
</html>
