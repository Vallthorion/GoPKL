<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Masuk | GOPKL</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}

:root{
  --blue:#1E3A5F;
  --blue-mid:#2C5282;
  --blue-deep:#0F2142;
  --teal:#2A9D8F;
  --teal-light:#E6F7F5;
  --teal-dim:rgba(42,157,143,0.18);
  --white:#FFFFFF;
  --gray-50:#F8FAFC;
  --gray-100:#F0F4F8;
  --gray-200:#E2E8F0;
  --gray-400:#94A3B8;
  --gray-600:#475569;
  --gray-800:#1E293B;
  --font:'Plus Jakarta Sans',sans-serif;
  --bg-primary:#FFFFFF;
  --bg-secondary:#F4F7FB;
  --text-primary:#1E293B;
  --text-secondary:#475569;
  --border-color:#E2E8F0;
}

@keyframes fadeUp{from{opacity:0;transform:translateY(18px)}to{opacity:1;transform:translateY(0)}}
@keyframes fadeRight{from{opacity:0;transform:translateX(-18px)}to{opacity:1;transform:translateX(0)}}
@keyframes pulse{0%,100%{opacity:1}50%{opacity:.35}}
@keyframes floatA{0%,100%{transform:translateY(0) rotate(0deg)}50%{transform:translateY(-10px) rotate(2deg)}}
@keyframes floatB{0%,100%{transform:translateY(0) rotate(0deg)}50%{transform:translateY(8px) rotate(-2deg)}}
@keyframes shimmer{0%{transform:translateX(-100%)}100%{transform:translateX(100%)}}
@keyframes scanline{0%{top:-100%}100%{top:200%}}
@keyframes slideDown{from{opacity:0;transform:translateY(-12px)}to{opacity:1;transform:translateY(0)}}

html,body{
  font-family:var(--font);
  background:var(--bg-secondary);
  min-height:100vh;
}

body{
  display:flex;
  align-items:stretch;
  overflow:hidden;
}

/* ═══════ LEFT PANEL ═══════ */
.left-panel{
  width:480px;flex-shrink:0;
  background:var(--blue-deep);
  padding:44px 48px;
  display:flex;flex-direction:column;
  position:relative;overflow:hidden;
  animation:fadeRight .8s cubic-bezier(.22,1,.36,1) both;
}

.left-panel::before{
  content:'';
  position:absolute;inset:0;
  background-image:
    linear-gradient(rgba(42,157,143,0.07) 1px,transparent 1px),
    linear-gradient(90deg,rgba(42,157,143,0.07) 1px,transparent 1px);
  background-size:32px 32px;
  pointer-events:none;
}

.lp-glow{
  position:absolute;
  top:-80px;right:-80px;
  width:420px;height:420px;
  border-radius:50%;
  background:radial-gradient(circle,rgba(42,157,143,0.25) 0%,transparent 65%);
  pointer-events:none;
  animation:floatA 8s ease-in-out infinite;
}
.lp-glow2{
  position:absolute;
  bottom:-100px;left:-60px;
  width:320px;height:320px;
  border-radius:50%;
  background:radial-gradient(circle,rgba(44,82,130,0.4) 0%,transparent 65%);
  pointer-events:none;
  animation:floatB 9s ease-in-out infinite;
}

.lp-stripe{
  position:absolute;
  top:0;right:0;bottom:0;
  width:3px;
  background:linear-gradient(to bottom,transparent 0%,var(--teal) 30%,rgba(42,157,143,0.3) 70%,transparent 100%);
}

.lp-scan{
  position:absolute;
  left:0;right:0;
  height:80px;
  background:linear-gradient(to bottom,transparent,rgba(42,157,143,0.04),transparent);
  pointer-events:none;
  animation:scanline 6s linear infinite;
}

.lp-brand{
  display:flex;align-items:center;gap:11px;
  text-decoration:none;position:relative;z-index:2;
  animation:fadeUp .6s ease both .1s;
}
.lp-icon{
  width:40px;height:40px;
  background:linear-gradient(135deg,var(--teal),rgba(42,157,143,0.5));
  border:1.5px solid rgba(255,255,255,0.2);
  border-radius:11px;
  display:flex;align-items:center;justify-content:center;
  font-weight:800;font-size:17px;color:var(--white);
  box-shadow:0 4px 16px rgba(42,157,143,0.35);
}
.lp-brand-name{font-weight:800;font-size:19px;color:var(--white);letter-spacing:.5px}
.lp-brand-name span{color:rgba(255,255,255,.45)}

.lp-center{
  flex:1;display:flex;flex-direction:column;justify-content:center;
  padding:48px 0 32px;position:relative;z-index:2;
}

.lp-tag{
  display:inline-flex;align-items:center;gap:7px;
  background:rgba(42,157,143,0.15);
  border:1px solid rgba(42,157,143,0.35);
  color:rgba(255,255,255,.9);
  font-size:10.5px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;
  padding:5px 14px;border-radius:100px;margin-bottom:22px;width:fit-content;
  animation:fadeUp .6s ease both .2s;
}
.lp-tag::before{content:'';width:6px;height:6px;background:var(--teal);border-radius:50%;animation:pulse 2s infinite}

.lp-title{
  font-size:clamp(28px,2.8vw,42px);font-weight:800;
  color:var(--white);line-height:1.08;letter-spacing:-1.5px;margin-bottom:16px;
  animation:fadeUp .6s ease both .3s;
}
.lp-title span{color:rgba(255,255,255,.35)}
.lp-title em{font-style:normal;color:var(--teal)}

.lp-desc{
  font-size:14.5px;color:rgba(255,255,255,.6);
  line-height:1.8;margin-bottom:40px;max-width:320px;
  animation:fadeUp .6s ease both .4s;
}

.pkl-scene{
  position:relative;
  background:rgba(255,255,255,0.04);
  border:1px solid rgba(255,255,255,0.09);
  border-radius:16px;
  padding:20px;
  margin-bottom:28px;
  overflow:hidden;
  animation:fadeUp .6s ease both .35s;
}
.pkl-scene::before{
  content:'';
  position:absolute;inset:0;
  background:linear-gradient(135deg,rgba(42,157,143,0.06),transparent 60%);
  pointer-events:none;
}

.feat-list{display:flex;flex-direction:column;gap:10px;position:relative;z-index:1}
.feat-item{
  display:flex;align-items:center;gap:13px;
  background:rgba(255,255,255,0.055);
  border:1px solid rgba(255,255,255,0.09);
  border-radius:12px;padding:13px 15px;
  transition:all .3s;cursor:pointer;
  position:relative;overflow:hidden;
}
.feat-item::after{
  content:'';
  position:absolute;
  left:0;top:0;bottom:0;width:3px;
  background:var(--teal);
  opacity:0;border-radius:0 3px 3px 0;
  transition:opacity .3s;
}
.feat-item:hover{
  background:rgba(255,255,255,0.1);
  border-color:rgba(255,255,255,0.15);
  transform:translateX(5px);
}
.feat-item:hover::after{opacity:1}
.fi-icon{
  width:36px;height:36px;border-radius:9px;flex-shrink:0;
  display:flex;align-items:center;justify-content:center;font-size:14px;
}
.fi-teal{background:rgba(42,157,143,0.25);color:var(--teal)}
.fi-white{background:rgba(255,255,255,0.12);color:rgba(255,255,255,.9)}
.fi-title{font-size:12.5px;font-weight:700;color:var(--white)}
.fi-sub{font-size:10.5px;color:rgba(255,255,255,.45);margin-top:2px}
.fi-chip{
  margin-left:auto;flex-shrink:0;
  font-size:9.5px;font-weight:800;letter-spacing:.06em;
  padding:3px 9px;border-radius:6px;text-transform:uppercase;
}
.chip-teal{background:rgba(42,157,143,.2);color:var(--teal)}
.chip-white{background:rgba(255,255,255,.12);color:rgba(255,255,255,.65)}

.stats-row{
  display:flex;gap:12px;margin-bottom:28px;
  animation:fadeUp .6s ease both .45s;
}
.stat-card{
  flex:1;
  background:rgba(255,255,255,0.06);
  border:1px solid rgba(255,255,255,0.1);
  border-radius:12px;padding:12px 14px;
  text-align:center;
  transition:all .3s;
}
.stat-card:hover{background:rgba(255,255,255,0.1)}
.stat-num{font-size:20px;font-weight:800;color:var(--white);line-height:1}
.stat-num span{font-size:13px;color:var(--teal)}
.stat-label{font-size:10px;color:rgba(255,255,255,.45);margin-top:3px;letter-spacing:.03em}

.lp-footer{
  font-size:11px;color:rgba(255,255,255,.3);padding-top:24px;margin-top:auto;
  position:relative;z-index:2;border-top:1px solid rgba(255,255,255,0.07);
}

/* ═══════ RIGHT PANEL ═══════ */
.right-panel{
  flex:1;
  display:flex;align-items:center;justify-content:center;
  padding:40px 60px;
  background:var(--bg-primary);
  position:relative;overflow:hidden;
  animation:fadeUp .8s cubic-bezier(.22,1,.36,1) .15s both;
}

.right-panel::before{
  content:'';
  position:absolute;inset:0;
  background-image:radial-gradient(circle,rgba(30,58,95,0.06) 1px,transparent 1px);
  background-size:24px 24px;
  pointer-events:none;
}

.right-panel::after{
  content:'';
  position:absolute;
  bottom:-60px;right:-60px;
  width:280px;height:280px;
  border-radius:50%;
  background:radial-gradient(circle,rgba(42,157,143,0.07) 0%,transparent 65%);
  pointer-events:none;
}

.bg-pattern{
  position:absolute;
  top:0;left:0;right:0;bottom:0;
  pointer-events:none;
  overflow:hidden;
  z-index:0;
}

.form-box{
  width:100%;max-width:390px;
  position:relative;z-index:1;
}

.form-header{
  margin-bottom:32px;
  animation:fadeUp .6s ease both .3s;
}
.back-link{
  display:inline-flex;align-items:center;gap:7px;
  font-size:12.5px;color:var(--text-secondary);text-decoration:none;
  transition:all .2s;margin-bottom:28px;font-weight:600;
  padding:6px 12px;border-radius:8px;
  border:1px solid var(--border-color);
  background:var(--bg-secondary);
}
.back-link:hover{
  color:var(--blue);
  border-color:var(--gray-400);
  transform:translateX(-3px);
}
.form-badge{
  display:inline-flex;align-items:center;gap:6px;
  background:var(--teal-light);
  border:1px solid rgba(42,157,143,0.25);
  color:var(--teal);
  font-size:10.5px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;
  padding:4px 12px;border-radius:100px;margin-bottom:14px;
}
.form-title{
  font-size:26px;font-weight:800;color:var(--text-primary);
  letter-spacing:-1px;margin-bottom:6px;line-height:1.1;
}
.form-title em{font-style:normal;color:var(--blue)}
.form-sub{font-size:13.5px;color:var(--text-secondary);line-height:1.65}

.error-box{
  background:#FFF5F5;border:1.5px solid #FED7D7;
  border-radius:10px;padding:11px 14px;
  display:flex;align-items:center;gap:10px;
  font-size:13px;color:#C53030;margin-bottom:18px;font-weight:600;
}

.field{margin-bottom:18px;animation:fadeUp .6s ease both}
.field:nth-child(1){animation-delay:.35s}
.field:nth-child(2){animation-delay:.42s}
.field label{
  display:block;font-size:11.5px;font-weight:700;
  color:var(--text-secondary);letter-spacing:.07em;text-transform:uppercase;
  margin-bottom:7px;
}
.input-wrap{position:relative}
.input-wrap i.field-icon{
  position:absolute;left:14px;top:50%;transform:translateY(-50%);
  color:var(--gray-400);font-size:14px;pointer-events:none;
  transition:color .2s;
}
.input-wrap input{
  width:100%;
  background:var(--bg-secondary);
  border:1.5px solid var(--border-color);
  border-radius:11px;padding:13px 13px 13px 42px;
  font-size:14.5px;color:var(--text-primary);
  font-family:var(--font);outline:none;
  transition:all .25s;
  /* Prevent zoom on iOS */
  font-size:16px;
}
.input-wrap input::placeholder{color:var(--gray-400)}
.input-wrap input:focus{
  border-color:var(--blue);
  background:var(--white);
  box-shadow:0 0 0 4px rgba(30,58,95,0.08);
}
.input-wrap input:focus ~ i.field-icon,
.input-wrap:focus-within i.field-icon{color:var(--blue)}
.eye-btn{
  position:absolute;right:13px;top:50%;transform:translateY(-50%);
  background:none;border:none;color:var(--gray-400);
  cursor:pointer;font-size:14px;padding:5px;border-radius:6px;
  transition:all .2s;
}
.eye-btn:hover{color:var(--blue);background:rgba(30,58,95,0.06)}

.form-options{
  display:flex;justify-content:space-between;align-items:center;
  margin:6px 0 22px;
  animation:fadeUp .6s ease both .5s;
}
.remember{
  display:flex;align-items:center;gap:8px;
  font-size:13px;color:var(--text-secondary);cursor:pointer;user-select:none;font-weight:600;
}
.remember input{width:16px;height:16px;accent-color:var(--teal);cursor:pointer;border-radius:5px}
.forgot{
  font-size:12.5px;color:var(--blue);text-decoration:none;font-weight:700;
  transition:all .2s;padding:4px 8px;border-radius:7px;
}
.forgot:hover{background:rgba(30,58,95,0.07)}

.btn-submit{
  width:100%;padding:13px;
  background:var(--blue);
  color:var(--white);
  border:none;border-radius:11px;
  font-family:var(--font);font-size:14.5px;font-weight:800;
  cursor:pointer;display:flex;align-items:center;justify-content:center;gap:10px;
  transition:all .25s;
  box-shadow:0 6px 20px rgba(30,58,95,0.28),0 1px 3px rgba(30,58,95,0.15);
  position:relative;overflow:hidden;
  animation:fadeUp .6s ease both .55s;
  letter-spacing:.3px;
  /* Proper tap target on mobile */
  min-height:48px;
  -webkit-tap-highlight-color:transparent;
}
.btn-submit::before{
  content:'';
  position:absolute;
  top:0;left:-100%;
  width:100%;height:100%;
  background:linear-gradient(90deg,transparent,rgba(255,255,255,0.12),transparent);
  transition:none;
}
.btn-submit:hover{
  background:var(--blue-mid);
  transform:translateY(-2px);
  box-shadow:0 10px 28px rgba(30,58,95,0.35);
}
.btn-submit:hover::before{animation:shimmer .6s ease}
.btn-submit:active{transform:translateY(0);box-shadow:0 4px 12px rgba(30,58,95,0.2)}

.divider{
  display:flex;align-items:center;gap:12px;margin:24px 0;
  animation:fadeUp .6s ease both .6s;
}
.divider hr{flex:1;border:none;border-top:1.5px solid var(--border-color)}
.divider span{font-size:11.5px;color:var(--gray-400);font-weight:700;white-space:nowrap;letter-spacing:.06em;text-transform:uppercase}

.info-box{
  background:linear-gradient(135deg,rgba(30,58,95,0.04),rgba(42,157,143,0.04));
  border:1.5px solid rgba(42,157,143,0.18);
  border-radius:12px;padding:14px 16px;
  display:flex;gap:12px;
  animation:fadeUp .6s ease both .65s;
  transition:all .3s;
}
.info-box:hover{border-color:rgba(42,157,143,0.35);box-shadow:0 4px 16px rgba(42,157,143,0.07)}
.info-box i{color:var(--teal);font-size:16px;margin-top:1px;flex-shrink:0}
.info-box p{font-size:12.5px;color:var(--text-secondary);line-height:1.65}
.info-box strong{color:var(--blue);font-weight:700}

.form-footer{
  text-align:center;margin-top:20px;
  font-size:11.5px;color:var(--gray-400);
  animation:fadeUp .6s ease both .7s;
  display:flex;align-items:center;justify-content:center;gap:5px;
}
.form-footer span{
  width:4px;height:4px;background:var(--gray-200);border-radius:50%;display:inline-block;
}

/* ══════════════════════════════════════════
   MOBILE — sticky top header + bottom sheet
══════════════════════════════════════════ */

/* Mobile top bar (hidden on desktop) */
.mobile-topbar{
  display:none;
  position:sticky;top:0;z-index:100;
  background:var(--blue-deep);
  padding:12px 20px;
  align-items:center;justify-content:space-between;
  border-bottom:1px solid rgba(255,255,255,0.08);
  animation:slideDown .5s ease both;
}
.mobile-topbar .lp-brand{margin:0}
.mobile-topbar .mob-stats{
  display:flex;gap:16px;
}
.mobile-topbar .mob-stat{
  text-align:center;
}
.mobile-topbar .mob-stat-num{
  font-size:13px;font-weight:800;color:var(--white);line-height:1;
}
.mobile-topbar .mob-stat-num span{font-size:10px;color:var(--teal)}
.mobile-topbar .mob-stat-label{font-size:9px;color:rgba(255,255,255,.4);margin-top:1px}

/* Mobile benefits strip (hidden on desktop) */
.mobile-benefits{
  display:none;
  background:var(--blue-deep);
  padding:10px 20px 14px;
  gap:8px;
  overflow-x:auto;
  -webkit-overflow-scrolling:touch;
  scrollbar-width:none;
  border-bottom:3px solid var(--teal);
}
.mobile-benefits::-webkit-scrollbar{display:none}
.mob-feat{
  flex-shrink:0;
  display:flex;align-items:center;gap:8px;
  background:rgba(255,255,255,0.06);
  border:1px solid rgba(255,255,255,0.1);
  border-radius:10px;
  padding:8px 12px;
  white-space:nowrap;
}
.mob-feat-icon{
  width:26px;height:26px;border-radius:7px;
  display:flex;align-items:center;justify-content:center;
  font-size:12px;
  background:rgba(42,157,143,0.25);color:var(--teal);
  flex-shrink:0;
}
.mob-feat-text{
  font-size:11.5px;font-weight:700;color:rgba(255,255,255,.85);
}
.mob-feat-sub{
  font-size:10px;color:rgba(255,255,255,.4);margin-top:1px;
}

/* Mobile form container */
.mobile-form-wrap{
  display:none;
  flex:1;
  overflow-y:auto;
  -webkit-overflow-scrolling:touch;
  padding:24px 20px 40px;
  background:var(--bg-primary);
  animation:fadeUp .6s ease both .2s;
}

/* ═══ RESPONSIVE BREAKPOINTS ═══ */

/* Tablet: hide left panel, show all in right */
@media(max-width:900px){
  body{overflow:auto}
  .left-panel{
    width:200px;
    padding:28px 20px;
  }
  .left-panel .lp-title{font-size:20px;letter-spacing:-.5px}
  .left-panel .lp-desc{display:none}
  .pkl-scene{display:none}
  .stats-row{display:none}
  .feat-list .fi-chip{display:none}
  .feat-item{padding:10px 12px}
  .fi-sub{display:none}
  .lp-footer{display:none}
  .right-panel{padding:28px 32px}
}

/* Mobile: full mobile layout */
@media(max-width:640px){
  body{
    flex-direction:column;
    overflow:auto;
    min-height:100vh;
    background:var(--bg-primary);
  }
  .left-panel{display:none !important}
  .right-panel{display:none !important}

  .mobile-topbar{display:flex}
  .mobile-benefits{display:flex}
  .mobile-form-wrap{display:block}

  /* Inside the mobile form, tweak form-box */
  .mobile-form-wrap .form-box{
    max-width:100%;
  }

  /* Smaller back link on mobile */
  .mobile-form-wrap .back-link{
    display:none; /* Already have mobile top bar for branding */
  }

  .mobile-form-wrap .form-header{
    margin-bottom:24px;
  }

  .mobile-form-wrap .form-title{
    font-size:22px;
  }

  /* Inputs: prevent iOS zoom (font-size ≥ 16px already set) */
  .mobile-form-wrap .input-wrap input{
    padding:14px 14px 14px 44px;
    border-radius:13px;
  }

  /* Bigger submit button for thumb */
  .mobile-form-wrap .btn-submit{
    padding:15px;
    font-size:15px;
    border-radius:13px;
    min-height:52px;
  }

  /* Compact options row */
  .mobile-form-wrap .form-options{
    margin:8px 0 20px;
  }
  .mobile-form-wrap .remember{font-size:13px}

  /* Info box more compact */
  .mobile-form-wrap .info-box p{font-size:12px}

  /* Footer padding */
  .mobile-form-wrap .form-footer{
    margin-top:24px;
    margin-bottom:8px;
  }
}

/* Very small phones */
@media(max-width:380px){
  .mobile-topbar{padding:10px 16px}
  .mobile-benefits{padding:8px 16px 12px}
  .mobile-form-wrap{padding:20px 16px 36px}
  .mobile-topbar .mob-stats{gap:10px}
  .mobile-topbar .mob-stat-num{font-size:12px}
}
</style>
</head>
<body>

<!-- ░░░ MOBILE TOP BAR ░░░ -->
<div class="mobile-topbar">
  <a href="/" class="lp-brand">
    <div class="lp-icon">G</div>
    <span class="lp-brand-name">GO<span>PKL</span></span>
  </a>
  <div class="mob-stats">
    <div class="mob-stat">
      <div class="mob-stat-num">85<span>+</span></div>
      <div class="mob-stat-label">Perusahaan</div>
    </div>
    <div class="mob-stat">
      <div class="mob-stat-num">1.2<span>k</span></div>
      <div class="mob-stat-label">Siswa</div>
    </div>
    <div class="mob-stat">
      <div class="mob-stat-num">98<span>%</span></div>
      <div class="mob-stat-label">Puas</div>
    </div>
  </div>
</div>

<!-- ░░░ MOBILE BENEFITS STRIP ░░░ -->
<div class="mobile-benefits">
  <div class="mob-feat">
    <div class="mob-feat-icon"><i class="fa-solid fa-building"></i></div>
    <div>
      <div class="mob-feat-text">85+ Mitra</div>
      <div class="mob-feat-sub">Berbagai industri</div>
    </div>
  </div>
  <div class="mob-feat">
    <div class="mob-feat-icon"><i class="fa-solid fa-file-circle-check"></i></div>
    <div>
      <div class="mob-feat-text">Pengajuan Instan</div>
      <div class="mob-feat-sub">Tanpa surat fisik</div>
    </div>
  </div>
  <div class="mob-feat">
    <div class="mob-feat-icon"><i class="fa-solid fa-chart-line"></i></div>
    <div>
      <div class="mob-feat-text">Pantau Real-time</div>
      <div class="mob-feat-sub">Status live</div>
    </div>
  </div>
  <div class="mob-feat">
    <div class="mob-feat-icon"><i class="fa-solid fa-bolt"></i></div>
    <div>
      <div class="mob-feat-text">100% Digital</div>
      <div class="mob-feat-sub">Portal PKL 2026</div>
    </div>
  </div>
</div>

<!-- ░░░ MOBILE FORM CONTAINER ░░░ -->
<div class="mobile-form-wrap">
  <div class="form-box">
    <div class="form-header">
      <a href="/" class="back-link">
        <i class="fa-solid fa-arrow-left" style="font-size:11px"></i> Kembali ke Beranda
      </a>
      <div class="form-badge">
        <i class="fa-solid fa-graduation-cap" style="font-size:11px"></i>&nbsp;Portal Siswa PKL
      </div>
      <div class="form-title">Masuk ke <em>GOPKL</em></div>
      <div class="form-sub">Gunakan NIS (siswa) atau username yang diberikan sekolah untuk mengakses portal PKL digital</div>
    </div>

    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="field">
        <label>Username / NIS</label>
        <div class="input-wrap">
          <i class="fa-solid fa-user field-icon"></i>
          <input type="text" name="login" placeholder="Contoh: 12345 atau username_anda" required autocomplete="username">
        </div>
      </div>
      <div class="field">
        <label>Password PKL</label>
        <div class="input-wrap">
          <i class="fa-solid fa-lock field-icon"></i>
          <input type="password" name="password" id="pwdInputMob" placeholder="Masukkan password Anda" required autocomplete="current-password">
          <button type="button" class="eye-btn" id="eyeBtnMob" aria-label="Tampilkan password">
            <i class="fa-solid fa-eye" id="eyeIconMob"></i>
          </button>
        </div>
      </div>
      <div class="form-options">
        <label class="remember">
          <input type="checkbox" name="remember"> Ingat saya
        </label>
        <a href="#" class="forgot">Lupa Password?</a>
      </div>
      <button type="submit" class="btn-submit">
        <i class="fa-solid fa-right-to-bracket"></i>
        Masuk ke Portal PKL
      </button>
    </form>

    <div class="divider"><hr><span>Panduan Login</span><hr></div>
    <div class="info-box">
      <i class="fa-solid fa-circle-info"></i>
      <p>
        <strong>👤 Siswa</strong>: masuk dengan <strong>NIS</strong> Anda.&nbsp;
        <strong>👨‍🏫 Guru/Admin</strong>: gunakan <strong>username</strong> dari pihak sekolah.
        Belum punya akun? Hubungi admin sekolah Anda.
      </p>
    </div>
    <div class="form-footer">
      <i class="fa-solid fa-shield-halved" style="color:var(--teal)"></i>
      &nbsp;GOPKL
      <span></span>
      Portal PKL Digital SMK/SMA Indonesia
    </div>
  </div>
</div>

<!-- ░░░ LEFT PANEL (Desktop) ░░░ -->
<div class="left-panel">
  <div class="lp-glow"></div>
  <div class="lp-glow2"></div>
  <div class="lp-stripe"></div>
  <div class="lp-scan"></div>

  <a href="/" class="lp-brand">
    <div class="lp-icon">G</div>
    <span class="lp-brand-name">GO<span>PKL</span></span>
  </a>

  <div class="lp-center">
    <div class="lp-tag">
      <i class="fa-solid fa-bolt"></i>&nbsp;Portal PKL Digital 2026
    </div>
    <h1 class="lp-title">
      Masuk ke<br><em>Platform</em><br><span>GOPKL</span>
    </h1>
    <p class="lp-desc">
      Kelola praktik kerja lapangan dengan lebih mudah. Platform terpadu untuk siswa, guru, dan admin sekolah.
    </p>

    <div class="pkl-scene">
      <svg viewBox="0 0 384 110" width="100%" xmlns="http://www.w3.org/2000/svg">
        <circle cx="52" cy="55" r="34" fill="rgba(42,157,143,0.1)" stroke="rgba(42,157,143,0.2)" stroke-width="1"/>
        <circle cx="192" cy="55" r="34" fill="rgba(255,255,255,0.04)" stroke="rgba(255,255,255,0.1)" stroke-width="1"/>
        <circle cx="332" cy="55" r="34" fill="rgba(42,157,143,0.1)" stroke="rgba(42,157,143,0.2)" stroke-width="1"/>
        <line x1="88" y1="55" x2="156" y2="55" stroke="rgba(42,157,143,0.5)" stroke-width="1.5" stroke-dasharray="5,4"/>
        <polygon points="160,55 152,50 152,60" fill="rgba(42,157,143,0.8)"/>
        <line x1="228" y1="55" x2="296" y2="55" stroke="rgba(42,157,143,0.5)" stroke-width="1.5" stroke-dasharray="5,4"/>
        <polygon points="300,55 292,50 292,60" fill="rgba(42,157,143,0.8)"/>
        <circle cx="52" cy="32" r="9" fill="#2A9D8F"/>
        <rect x="44" y="42" width="16" height="10" rx="2" fill="#2A9D8F" opacity=".8"/>
        <rect x="34" y="57" width="36" height="22" rx="3" fill="none" stroke="#2A9D8F" stroke-width="1.5"/>
        <rect x="36" y="59" width="32" height="14" rx="1" fill="rgba(42,157,143,0.3)"/>
        <line x1="39" y1="63" x2="47" y2="63" stroke="rgba(255,255,255,0.5)" stroke-width="1"/>
        <line x1="39" y1="66" x2="53" y2="66" stroke="rgba(255,255,255,0.3)" stroke-width="1"/>
        <line x1="39" y1="69" x2="50" y2="69" stroke="rgba(255,255,255,0.3)" stroke-width="1"/>
        <text x="52" y="96" font-size="9.5" font-weight="700" text-anchor="middle" fill="rgba(255,255,255,0.7)" letter-spacing=".05em">DAFTAR</text>
        <rect x="174" y="34" width="18" height="28" fill="rgba(255,255,255,0.2)" rx="1"/>
        <rect x="196" y="28" width="14" height="34" fill="rgba(255,255,255,0.15)" rx="1"/>
        <rect x="177" y="38" width="4" height="4" fill="#2A9D8F" opacity=".8"/>
        <rect x="184" y="38" width="4" height="4" fill="#2A9D8F" opacity=".8"/>
        <rect x="177" y="45" width="4" height="4" fill="#2A9D8F" opacity=".6"/>
        <rect x="184" y="45" width="4" height="4" fill="#2A9D8F" opacity=".8"/>
        <rect x="198" y="33" width="4" height="4" fill="#2A9D8F" opacity=".7"/>
        <rect x="205" y="33" width="4" height="4" fill="#2A9D8F" opacity=".9"/>
        <rect x="198" y="41" width="4" height="4" fill="#2A9D8F" opacity=".7"/>
        <rect x="205" y="41" width="4" height="4" fill="#2A9D8F" opacity=".6"/>
        <circle cx="185" cy="72" r="6" fill="none" stroke="#2A9D8F" stroke-width="1.5"/>
        <line x1="189.5" y1="76.5" x2="193" y2="80" stroke="#2A9D8F" stroke-width="1.5" stroke-linecap="round"/>
        <text x="192" y="96" font-size="9.5" font-weight="700" text-anchor="middle" fill="rgba(255,255,255,0.7)" letter-spacing=".05em">PILIH MITRA</text>
        <circle cx="332" cy="50" r="20" fill="rgba(42,157,143,0.2)" stroke="#2A9D8F" stroke-width="2"/>
        <path d="M 322 50 L 328 58 L 344 39" stroke="#2A9D8F" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
        <text x="332" y="96" font-size="9.5" font-weight="700" text-anchor="middle" fill="rgba(255,255,255,0.7)" letter-spacing=".05em">MULAI PKL</text>
        <rect x="290" y="4" width="82" height="18" rx="9" fill="rgba(42,157,143,0.2)" stroke="rgba(42,157,143,0.4)" stroke-width="1"/>
        <circle cx="300" cy="13" r="3" fill="#2A9D8F"/>
        <text x="324" y="17" font-size="9" font-weight="700" text-anchor="middle" fill="#2A9D8F">100% Digital</text>
      </svg>
    </div>

    <div class="stats-row">
      <div class="stat-card">
        <div class="stat-num">85<span>+</span></div>
        <div class="stat-label">Perusahaan</div>
      </div>
      <div class="stat-card">
        <div class="stat-num">1.2<span>k</span></div>
        <div class="stat-label">Siswa Aktif</div>
      </div>
      <div class="stat-card">
        <div class="stat-num">98<span>%</span></div>
        <div class="stat-label">Puas</div>
      </div>
    </div>

    <div class="feat-list">
      <div class="feat-item">
        <div class="fi-icon fi-teal"><i class="fa-solid fa-building"></i></div>
        <div class="fi-text">
          <div class="fi-title">85+ Perusahaan Mitra</div>
          <div class="fi-sub">Berbagai bidang industri</div>
        </div>
        <div class="fi-chip chip-teal">PILIH</div>
      </div>
      <div class="feat-item">
        <div class="fi-icon fi-teal"><i class="fa-solid fa-file-circle-check"></i></div>
        <div class="fi-text">
          <div class="fi-title">Pengajuan Instan</div>
          <div class="fi-sub">Proses digital tanpa surat fisik</div>
        </div>
        <div class="fi-chip chip-teal">CEPAT</div>
      </div>
      <div class="feat-item">
        <div class="fi-icon fi-white"><i class="fa-solid fa-chart-line"></i></div>
        <div class="fi-text">
          <div class="fi-title">Pantau Real-time</div>
          <div class="fi-sub">Status PKL terupdate live</div>
        </div>
        <div class="fi-chip chip-white">LIVE</div>
      </div>
    </div>
  </div>

  <div class="lp-footer">
    © 2026 GOPKL &nbsp;·&nbsp; Praktik Kerja Lapangan Digital &nbsp;·&nbsp; SMK/SMA Indonesia
  </div>
</div>

<!-- ░░░ RIGHT PANEL (Desktop) ░░░ -->
<div class="right-panel">
  <div class="bg-pattern">
    <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" style="position:absolute;inset:0">
      <g opacity=".045" transform="translate(220, -20)">
        <rect x="80" y="60" width="60" height="120" fill="#1E3A5F"/>
        <rect x="40" y="80" width="50" height="100" fill="#1E3A5F"/>
        <rect x="150" y="50" width="40" height="130" fill="#1E3A5F"/>
        <rect x="85" y="70" width="10" height="10" fill="#2A9D8F"/><rect x="100" y="70" width="10" height="10" fill="#2A9D8F"/><rect x="115" y="70" width="10" height="10" fill="#2A9D8F"/>
        <rect x="85" y="90" width="10" height="10" fill="#2A9D8F"/><rect x="100" y="90" width="10" height="10" fill="#2A9D8F"/><rect x="115" y="90" width="10" height="10" fill="#2A9D8F"/>
        <rect x="45" y="95" width="8" height="8" fill="#2A9D8F"/><rect x="60" y="95" width="8" height="8" fill="#2A9D8F"/>
        <rect x="155" y="65" width="8" height="8" fill="#2A9D8F"/><rect x="168" y="65" width="8" height="8" fill="#2A9D8F"/>
        <rect x="20" y="180" width="200" height="3" fill="#1E3A5F"/>
        <circle cx="250" cy="130" r="12" fill="#2A9D8F"/>
        <rect x="242" y="143" width="16" height="20" rx="2" fill="#2A9D8F"/>
        <rect x="230" y="168" width="40" height="14" rx="3" fill="#1E3A5F"/>
        <rect x="232" y="170" width="36" height="8" rx="1" fill="#2A9D8F"/>
      </g>
      <text x="50%" y="52%" font-size="110" font-weight="800" text-anchor="middle" dominant-baseline="middle"
        fill="#1E3A5F" opacity=".018" font-family="Plus Jakarta Sans, sans-serif" letter-spacing="-5px">PKL</text>
    </svg>
  </div>

  <div class="form-box">
    <div class="form-header">
      <a href="/" class="back-link">
        <i class="fa-solid fa-arrow-left" style="font-size:11px"></i> Kembali ke Beranda
      </a>
      <div class="form-badge">
        <i class="fa-solid fa-graduation-cap" style="font-size:11px"></i>&nbsp;Portal Siswa PKL
      </div>
      <div class="form-title">Masuk ke <em>GOPKL</em></div>
      <div class="form-sub">Gunakan NIS (siswa) atau username yang diberikan sekolah untuk mengakses portal PKL digital</div>
    </div>

    <form method="POST" action="{{ route('login') }}">
      @csrf

      @if ($errors->any())
      <div class="error-box">
        <i class="fa-solid fa-circle-exclamation"></i>
        {{ $errors->first() }}
      </div>
      @endif

      <div class="field">
        <label>Username / NIS</label>
        <div class="input-wrap">
          <i class="fa-solid fa-user field-icon"></i>
          <input type="text" name="login" placeholder="Contoh: 12345 atau username_anda" required autocomplete="username">
        </div>
      </div>

      <div class="field">
        <label>Password PKL</label>
        <div class="input-wrap">
          <i class="fa-solid fa-lock field-icon"></i>
          <input type="password" name="password" id="pwdInput" placeholder="Masukkan password Anda" required autocomplete="current-password">
          <button type="button" class="eye-btn" id="eyeBtn" aria-label="Tampilkan password">
            <i class="fa-solid fa-eye" id="eyeIcon"></i>
          </button>
        </div>
      </div>

      <div class="form-options">
        <label class="remember">
          <input type="checkbox" name="remember"> Ingat saya
        </label>
        <a href="#" class="forgot">Lupa Password?</a>
      </div>

      <button type="submit" class="btn-submit">
        <i class="fa-solid fa-right-to-bracket"></i>
        Masuk ke Portal PKL
      </button>
    </form>

    <div class="divider"><hr><span>Panduan Login</span><hr></div>

    <div class="info-box">
      <i class="fa-solid fa-circle-info"></i>
      <p>
        <strong>👤 Siswa</strong>: masuk dengan <strong>NIS</strong> Anda.&nbsp;
        <strong>👨‍🏫 Guru/Admin</strong>: gunakan <strong>username</strong> dari pihak sekolah.
        Belum punya akun? Hubungi admin sekolah Anda.
      </p>
    </div>

    <div class="form-footer">
      <i class="fa-solid fa-shield-halved" style="color:var(--teal)"></i>
      &nbsp;GOPKL
      <span></span>
      Portal PKL Digital SMK/SMA Indonesia
    </div>
  </div>
</div>

<script>
// Desktop eye btn
const pwdInput = document.getElementById('pwdInput');
const eyeIcon  = document.getElementById('eyeIcon');
const eyeBtn   = document.getElementById('eyeBtn');
if(eyeBtn){
  eyeBtn.addEventListener('mousedown', e => { e.preventDefault(); pwdInput.type='text'; eyeIcon.className='fa-solid fa-eye-slash'; });
  eyeBtn.addEventListener('touchstart', e => { e.preventDefault(); pwdInput.type='text'; eyeIcon.className='fa-solid fa-eye-slash'; });
  eyeBtn.addEventListener('mouseup',    () => { pwdInput.type='password'; eyeIcon.className='fa-solid fa-eye'; });
  eyeBtn.addEventListener('mouseleave', () => { pwdInput.type='password'; eyeIcon.className='fa-solid fa-eye'; });
  eyeBtn.addEventListener('touchend',   () => { pwdInput.type='password'; eyeIcon.className='fa-solid fa-eye'; });
}

// Mobile eye btn
const pwdInputMob = document.getElementById('pwdInputMob');
const eyeIconMob  = document.getElementById('eyeIconMob');
const eyeBtnMob   = document.getElementById('eyeBtnMob');
if(eyeBtnMob){
  eyeBtnMob.addEventListener('mousedown', e => { e.preventDefault(); pwdInputMob.type='text'; eyeIconMob.className='fa-solid fa-eye-slash'; });
  eyeBtnMob.addEventListener('touchstart', e => { e.preventDefault(); pwdInputMob.type='text'; eyeIconMob.className='fa-solid fa-eye-slash'; });
  eyeBtnMob.addEventListener('mouseup',    () => { pwdInputMob.type='password'; eyeIconMob.className='fa-solid fa-eye'; });
  eyeBtnMob.addEventListener('mouseleave', () => { pwdInputMob.type='password'; eyeIconMob.className='fa-solid fa-eye'; });
  eyeBtnMob.addEventListener('touchend',   () => { pwdInputMob.type='password'; eyeIconMob.className='fa-solid fa-eye'; });
}

// Feat item stagger (desktop)
document.querySelectorAll('.left-panel .feat-item').forEach((el,i) => {
  el.style.animationDelay = (0.5 + i * 0.07) + 's';
  el.style.animation = 'fadeUp .6s ease both';
});
</script>
</body>
</html>