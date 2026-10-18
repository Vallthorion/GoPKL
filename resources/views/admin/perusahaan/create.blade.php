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
  --gray-300:#CBD5E1;
  --gray-400:#94A3B8;
  --gray-500:#64748B;
  --gray-600:#475569;
  --gray-800:#1E293B;
  --red:#DC2626;
  --red-light:#FFF5F5;
  --font:'Plus Jakarta Sans',sans-serif;
  --radius:10px;
  --radius-lg:16px;
  --shadow-sm:0 1px 3px rgba(30,58,95,0.06),0 2px 8px rgba(30,58,95,0.04);
  --shadow:0 4px 16px rgba(30,58,95,0.08);
}

*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
body{font-family:var(--font);background:var(--gray-50);color:var(--gray-800);min-height:100vh}
.wrapper{display:flex;min-height:100vh}

/* ── SIDEBAR (matches screenshot exactly) ── */
.sidebar{
  width:240px;flex-shrink:0;
  background:var(--white);
  border-right:1.5px solid var(--gray-200);
  display:flex;flex-direction:column;
  position:sticky;top:0;height:100vh;overflow-y:auto;
}

/* Logo area */
.sidebar-logo-wrap{
  padding:20px 20px 0;
  border-bottom:1.5px solid var(--gray-200);
}
.logo{
  display:flex;align-items:center;gap:9px;
  text-decoration:none;padding-bottom:18px;
}
.logo-icon{
  width:32px;height:32px;background:var(--blue);border-radius:8px;
  display:flex;align-items:center;justify-content:center;
  font-weight:800;font-size:13px;color:var(--white);flex-shrink:0;
}
.logo-name{font-weight:800;font-size:16px;color:var(--blue)}
.logo-name span{color:var(--teal)}

/* Profile block */
.admin-profile{
  margin:16px 16px 20px;
  background:var(--white);
  border:1.5px solid var(--gray-200);
  border-radius:14px;
  padding:14px 16px;
  display:flex;align-items:center;gap:12px;
  box-shadow:var(--shadow-sm);
}
.admin-avatar{
  width:42px;height:42px;border-radius:14px;
  background:linear-gradient(135deg,var(--blue),var(--teal));
  display:flex;align-items:center;justify-content:center;
  font-weight:800;font-size:15px;color:var(--white);flex-shrink:0;
}
.admin-name{font-size:13px;font-weight:800;color:var(--blue);line-height:1.3}
.admin-role{font-size:11px;color:var(--gray-400);margin-top:2px}

/* Nav sections */
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
.menu a.active{
  background:var(--blue-light);color:var(--blue);font-weight:700;
}
.menu a i{width:15px;text-align:center;font-size:12px;flex-shrink:0}
.menu-divider{height:1.5px;background:var(--gray-200);margin:10px 12px}

.sidebar-footer{
  margin-top:auto;padding:14px 12px;
  border-top:1.5px solid var(--gray-200);
}
.logout-btn{
  width:100%;display:flex;align-items:center;gap:9px;
  padding:9px 10px;border-radius:9px;
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

/* ── PAGE HEADER ── */
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
.back-link i{font-size:11px}

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
  margin-bottom:clamp(4px,1vh,6px);
}
.page-sub{
  font-size:clamp(13px,2vw,15px);
  color:var(--gray-600);
  line-height:1.6;
}

/* ── FORM LAYOUT — two column ── */
.form-outer{
  margin-top:28px;
  display:grid;
  grid-template-columns:1fr 280px;
  gap:20px;
  align-items:start;
}

/* LEFT: main form card */
.form-card{
  background:var(--white);
  border:1.5px solid var(--gray-200);
  border-radius:var(--radius-lg);
  overflow:hidden;
  box-shadow:0 2px 8px rgba(30,58,95,0.06);
}

.form-card-header{
  padding:clamp(16px,2.5vh,20px) clamp(20px,3vw,24px);
  border-bottom:1.5px solid var(--gray-200);
  display:flex;
  align-items:center;
  gap:12px;
  background:var(--white);
}
.fch-icon{
  width:40px;
  height:40px;
  border-radius:10px;
  background:linear-gradient(135deg,rgba(42,157,143,0.15),rgba(42,157,143,0.08));
  color:var(--teal);
  display:flex;
  align-items:center;
  justify-content:center;
  font-size:18px;
  flex-shrink:0;
}
.fch-title{
  font-size:clamp(14px,1.8vw,16px);
  font-weight:800;
  color:var(--blue);
}
.fch-sub{
  font-size:clamp(11px,1.3vw,12px);
  color:var(--gray-500);
  margin-top:2px;
}

.form-body{
  padding:clamp(20px,3.5vh,28px) clamp(20px,3vw,24px);
}

/* Section label */
.section-label{
  display:flex;
  align-items:center;
  gap:10px;
  font-size:clamp(9px,1.2vw,11px);
  font-weight:700;
  letter-spacing:.08em;
  text-transform:uppercase;
  color:var(--teal);
  margin-bottom:clamp(14px,2.5vh,18px);
  margin-top:clamp(8px,1.5vh,12px);
}
.section-label:first-of-type{margin-top:0}
.section-label::before{
  content:'';
  width:4px;
  height:4px;
  border-radius:50%;
  background:var(--teal);
  flex-shrink:0;
}
.section-label::after{
  content:'';
  flex:1;
  height:1.5px;
  background:linear-gradient(90deg,var(--gray-200),transparent);
}

/* FIELD */
.field{margin-bottom:clamp(16px,3vh,20px)}
.field label{
  display:block;
  font-size:clamp(10px,1.3vw,12px);
  font-weight:700;
  color:var(--blue);
  margin-bottom:clamp(7px,1.2vh,8px);
  letter-spacing:.05em;
  text-transform:uppercase;
}
.field-required{color:var(--red);margin-left:2px}
.input-wrap{position:relative}
.input-wrap i.fi{
  position:absolute;
  left:clamp(10px,1.5vw,12px);
  top:50%;
  transform:translateY(-50%);
  color:var(--teal);
  font-size:clamp(12px,1.6vw,14px);
  pointer-events:none;
  transition:color .2s;
  flex-shrink:0;
}
.input-wrap input,
.input-wrap select{
  width:100%;
  padding:clamp(10px,1.7vh,12px) clamp(11px,1.7vw,13px) clamp(10px,1.7vh,12px) clamp(38px,6vw,42px);
  background:var(--gray-50);
  border:1.5px solid var(--gray-200);
  border-radius:var(--radius);
  font-family:var(--font);
  font-size:clamp(13px,1.6vw,14px);
  color:var(--gray-800);
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
  background:var(--white);
  box-shadow:0 0 0 3px rgba(42,157,143,0.12);
}
.input-wrap:focus-within i.fi{color:var(--teal)}
.input-wrap select option{background:var(--white);color:var(--gray-800)}
.field-hint{
  font-size:clamp(10px,1.3vw,12px);
  color:var(--gray-500);
  margin-top:clamp(6px,1vh,8px);
  line-height:1.5;
}

/* TEXTAREA STYLING */
textarea{
  width:100%;
  padding:clamp(12px,2vh,16px);
  background:var(--gray-50);
  border:1.5px solid var(--gray-200);
  border-radius:var(--radius);
  font-family:var(--font);
  font-size:clamp(13px,1.6vw,14px);
  color:var(--gray-800);
  outline:none;
  transition:border-color .2s,box-shadow .2s,background .2s;
  resize:vertical;
  min-height:120px;
  line-height:1.6;
}
textarea::placeholder{color:var(--gray-400)}
textarea:focus{
  border-color:var(--teal);
  background:var(--white);
  box-shadow:0 0 0 3px rgba(42,157,143,0.12);
}

/* ENHANCED JURUSAN SELECT */
.jurusan-select-wrapper{
  position:relative;
}
.jurusan-select-wrapper select{
  appearance:none;
}
.jurusan-selected-badges{
  display:flex;
  flex-wrap:wrap;
  gap:8px;
  padding:8px 0;
  min-height:32px;
  margin-bottom:12px;
}
.badge-jurusan-selected{
  display:inline-flex;
  align-items:center;
  gap:6px;
  background:var(--teal-light);
  color:var(--teal);
  padding:6px 12px;
  border-radius:20px;
  font-size:12px;
  font-weight:700;
  border:1.5px solid rgba(42,157,143,.2);
}
.badge-jurusan-selected i{
  font-size:11px;
}

/* Field row 2 col */
.field-row{display:grid;grid-template-columns:1fr 1fr;gap:14px}

/* NIS input special */
.nis-prefix{
  position:absolute;
  left:0;top:0;bottom:0;
  display:flex;align-items:center;
  padding:0 12px;
  background:var(--gray-100);
  border-right:1.5px solid var(--gray-200);
  border-radius:var(--radius) 0 0 var(--radius);
  font-size:12px;font-weight:600;color:var(--gray-400);
  white-space:nowrap;
  pointer-events:none;
}
.input-wrap.has-prefix input{padding-left:52px}

/* Form divider */
.form-divider{
  height:1.5px;
  background:linear-gradient(90deg,var(--gray-200),transparent);
  margin:clamp(18px,3.5vh,24px) 0;
}

/* ERROR BOX */
.err-box{
  background:linear-gradient(135deg,#FFF5F5,#FFEBEE);
  border:1.5px solid #FED7D7;
  border-radius:var(--radius);
  padding:clamp(12px,2vh,16px) clamp(14px,2.5vw,18px);
  font-size:clamp(12px,1.5vw,13px);
  color:var(--red);
  margin-bottom:clamp(16px,3vh,20px);
  display:flex;
  align-items:flex-start;
  gap:clamp(10px,1.5vw,12px);
  animation:slideDown .3s ease-out;
}
.err-box i{
  margin-top:2px;
  flex-shrink:0;
  font-size:14px;
}
@keyframes slideDown{from{opacity:0;transform:translateY(-10px)}to{opacity:1;transform:translateY(0)}}

/* FORM ACTIONS inside card footer */
.form-footer{
  padding:clamp(16px,2.5vh,20px) clamp(20px,3vw,24px);
  border-top:1.5px solid var(--gray-200);
  background:var(--gray-50);
  display:flex;
  gap:clamp(10px,2vw,14px);
  border-radius:0 0 var(--radius-lg) var(--radius-lg);
}
.btn-submit{
  flex:1;
  padding:clamp(11px,2vh,14px);
  background:linear-gradient(135deg,var(--teal),#1f8876);
  color:var(--white);
  border:none;
  border-radius:var(--radius);
  font-family:var(--font);
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
  font-family:var(--font);
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

/* ── RIGHT SIDEBAR CARD ── */
.info-sidebar{display:flex;flex-direction:column;gap:16px}

.info-card{
  background:var(--white);
  border:1.5px solid var(--gray-200);
  border-radius:var(--radius-lg);
  overflow:hidden;
  box-shadow:0 2px 8px rgba(30,58,95,0.06);
}
.ic-header{
  padding:clamp(12px,2vh,14px) clamp(16px,2.5vw,18px);
  border-bottom:1.5px solid var(--gray-200);
  display:flex;
  align-items:center;
  gap:10px;
  background:var(--white);
}
.ic-icon{
  width:32px;
  height:32px;
  border-radius:9px;
  display:flex;
  align-items:center;
  justify-content:center;
  font-size:14px;
  flex-shrink:0;
}
.ici-blue{
  background:linear-gradient(135deg,rgba(30,58,95,0.1),rgba(30,58,95,0.05));
  color:var(--blue);
}
.ici-teal{
  background:linear-gradient(135deg,rgba(42,157,143,0.1),rgba(42,157,143,0.05));
  color:var(--teal);
}
.ic-title{
  font-size:clamp(12px,1.5vw,13px);
  font-weight:800;
  color:var(--blue);
}
.ic-body{padding:clamp(14px,2.5vh,18px) clamp(16px,2.5vw,18px)}

/* STEPS LIST */
.steps{display:flex;flex-direction:column;gap:0}
.step-item{
  display:flex;
  gap:clamp(10px,1.5vw,12px);
  padding-bottom:clamp(14px,2.5vh,18px);
  position:relative;
}
.step-item:last-child{padding-bottom:0}
.step-item:not(:last-child)::before{
  content:'';
  position:absolute;
  left:calc(clamp(10px,1.5vw,12px) + 12px);
  top:32px;
  width:2px;
  height:calc(100% + 4px);
  background:linear-gradient(180deg,var(--teal),rgba(42,157,143,0.2));
}
.step-num{
  width:28px;
  height:28px;
  border-radius:50%;
  flex-shrink:0;
  background:linear-gradient(135deg,rgba(42,157,143,0.2),rgba(42,157,143,0.1));
  color:var(--teal);
  font-size:clamp(11px,1.3vw,12px);
  font-weight:800;
  display:flex;
  align-items:center;
  justify-content:center;
  position:relative;
  z-index:1;
  border:2px solid var(--white);
  box-shadow:0 0 0 2px var(--teal);
}
.step-text h5{
  font-size:clamp(12px,1.5vw,13px);
  font-weight:700;
  color:var(--blue);
  margin-bottom:3px;
}
.step-text p{
  font-size:clamp(11px,1.3vw,12px);
  color:var(--gray-600);
  line-height:1.5;
}

/* INFO ITEMS */
.info-item{
  display:flex;
  gap:clamp(10px,1.5vw,12px);
  padding-bottom:clamp(12px,2vh,14px);
  margin-bottom:clamp(12px,2vh,14px);
  border-bottom:1.5px solid var(--gray-100);
}
.info-item:last-child{border-bottom:none;padding-bottom:0;margin-bottom:0}
.info-item-icon{
  width:36px;
  height:36px;
  border-radius:9px;
  flex-shrink:0;
  display:flex;
  align-items:center;
  justify-content:center;
  font-size:14px;
}
.iii-blue{
  background:linear-gradient(135deg,rgba(30,58,95,0.1),rgba(30,58,95,0.05));
  color:var(--blue);
}
.iii-teal{
  background:linear-gradient(135deg,rgba(42,157,143,0.1),rgba(42,157,143,0.05));
  color:var(--teal);
}
.info-item-text h5{
  font-size:clamp(11px,1.3vw,12px);
  font-weight:700;
  color:var(--blue);
  margin-bottom:2px;
}
.info-item-text p{
  font-size:clamp(10px,1.2vw,11px);
  color:var(--gray-600);
  line-height:1.5;
}

/* FILE INPUT */
.file-input-wrap{
  position:relative;
  border:2px dashed var(--gray-200);
  border-radius:var(--radius);
  padding:clamp(16px,3vh,24px);
  text-align:center;
  cursor:pointer;
  transition:all .2s;
  background:var(--gray-50);
}
.file-input-wrap:hover{
  border-color:var(--teal);
  background:rgba(42,157,143,0.05);
}
.file-input-wrap input[type=file]{display:none}
.file-input-label{
  display:flex;
  flex-direction:column;
  align-items:center;
  gap:clamp(8px,1.5vh,12px);
  cursor:pointer;
}
.file-input-icon{
  font-size:clamp(24px,5vw,32px);
  color:var(--teal);
}
.file-input-text h6{
  font-size:clamp(12px,1.5vw,13px);
  font-weight:700;
  color:var(--blue);
  margin-bottom:2px;
}
.file-input-text p{
  font-size:clamp(10px,1.2vw,11px);
  color:var(--gray-500);
}
.file-preview{
  margin-top:clamp(12px,2vh,16px);
  text-align:center;
}
.file-preview img{
  max-width:120px;
  max-height:120px;
  border-radius:var(--radius);
  border:1.5px solid var(--gray-200);
  object-fit:cover;
}
.file-preview .file-name{
  font-size:clamp(11px,1.3vw,12px);
  color:var(--gray-600);
  margin-top:8px;
}
.file-preview .remove-file{
  font-size:clamp(10px,1.2vw,11px);
  color:var(--red);
  margin-top:6px;
  cursor:pointer;
  text-decoration:underline;
}
.file-preview .remove-file:hover{color:var(--red)}

/* JURUSAN OPTIONS (visual radio) */
.jurusan-grid{display:flex;flex-direction:column;gap:8px}
.jur-option{
  display:flex;align-items:center;gap:10px;
  padding:10px 12px;
  border:1.5px solid var(--gray-200);
  border-radius:var(--radius);cursor:pointer;
  transition:border-color .15s,background .15s;
  background:var(--gray-50);
}
.jur-option:hover{border-color:var(--blue);background:var(--blue-light)}
.jur-option input[type=radio]{display:none}
.jur-radio{
  width:16px;height:16px;border-radius:50%;
  border:2px solid var(--gray-300);
  display:flex;align-items:center;justify-content:center;
  flex-shrink:0;transition:all .15s;
}
.jur-radio::after{
  content:'';width:7px;height:7px;border-radius:50%;
  background:var(--blue);opacity:0;transform:scale(0);
  transition:all .15s;
}
.jur-option input:checked ~ .jur-radio{border-color:var(--blue)}
.jur-option input:checked ~ .jur-radio::after{opacity:1;transform:scale(1)}
.jur-label{font-size:13px;font-weight:600;color:var(--gray-700)}
.jur-option input:checked ~ .jur-radio ~ .jur-label{color:var(--blue)}

/* KELAS SELECT GROUP */
.kelas-group{
  display:grid;grid-template-columns:1fr 1fr;gap:8px;
  margin-top:8px;
}
.kelas-option{
  padding:9px 12px;
  border:1.5px solid var(--gray-200);border-radius:var(--radius);
  background:var(--gray-50);cursor:pointer;
  font-size:13px;font-weight:500;color:var(--gray-600);
  text-align:center;transition:all .15s;
}
.kelas-option:hover{border-color:var(--blue);background:var(--blue-light);color:var(--blue)}
.kelas-option.selected{
  border-color:var(--blue);background:var(--blue);color:var(--white);font-weight:700;
}

/* Live preview box */
.preview-box{
  background:var(--gray-50);border:1.5px solid var(--gray-200);
  border-radius:var(--radius);padding:14px;
  margin-top:0;
}
.preview-row{display:flex;justify-content:space-between;align-items:center;margin-bottom:8px}
.preview-row:last-child{margin-bottom:0}
.preview-label{font-size:11px;color:var(--gray-400);font-weight:500}
.preview-value{
  font-size:13px;font-weight:700;color:var(--blue);
  text-align:right;max-width:150px;
  white-space:nowrap;overflow:hidden;text-overflow:ellipsis;
}
.preview-value.empty{color:var(--gray-300);font-weight:400;font-size:12px}

/* ANIMATIONS */
@keyframes fadeUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
.fu{animation:fadeUp .4s ease-out both}
.fu-1{animation-delay:.05s}.fu-2{animation-delay:.1s}.fu-3{animation-delay:.15s}

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
  background:linear-gradient(135deg,#3b82f6,#2563eb);
  color:var(--white);
  border:1.5px solid rgba(59,130,246,0.3);
}
.toast.warning{
  background:linear-gradient(135deg,#f59e0b,#d97706);
  color:var(--white);
  border:1.5px solid rgba(245,158,11,0.3);
}
.toast-icon{
  font-size:clamp(14px,1.8vw,16px);
  flex-shrink:0;
  margin-top:2px;
}
.toast-content{
  flex:1;
  line-height:1.5;
}
.toast-close{
  font-size:clamp(12px,1.5vw,14px);
  cursor:pointer;
  opacity:0.7;
  transition:opacity .2s;
  flex-shrink:0;
  margin-top:2px;
}
.toast-close:hover{opacity:1}
@keyframes toastSlideIn{
  from{
    opacity:0;
    transform:translateX(clamp(20px,3vw,30px));
  }
  to{
    opacity:1;
    transform:translateX(0);
  }
}
@keyframes toastSlideOut{
  from{
    opacity:1;
    transform:translateX(0);
  }
  to{
    opacity:0;
    transform:translateX(clamp(20px,3vw,30px));
  }
}
.toast.hide{animation:toastSlideOut .3s ease-out forwards}

/* MOBILE */
@media(max-width:1100px){.form-outer{grid-template-columns:1fr}}
@media(max-width:900px){
  .sidebar{display:none}
  .main-inner{padding:20px 16px 40px}
  .field-row{grid-template-columns:1fr}
  .info-sidebar{display:none}
}
</style>

<div class="wrapper">

  <!-- TOAST CONTAINER -->
  <div class="toast-container" id="toastContainer"></div>

  <!-- SIDEBAR -->
  <div class="sidebar">
    <div class="sidebar-logo-wrap">
      <a href="{{ route('admin.dashboard') }}" class="logo">
        <div class="logo-icon">G</div>
        <span class="logo-name">GO<span>PKL</span></span>
      </a>
    </div>

    <div class="admin-profile">
      <div class="admin-avatar">{{ strtoupper(substr(Auth::user()->name ?? Auth::user()->username ?? 'A', 0, 1)) }}</div>
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

      <!-- BACK + HEADER -->
      <a href="{{ route('admin.perusahaan.index') }}" class="back-link fu">
        <i class="fa-solid fa-arrow-left"></i> Kembali ke Data Perusahaan
      </a>

      <div class="fu fu-1">
        <div class="page-tag"><i class="fa-solid fa-building" style="font-size:9px"></i> Form Pendaftaran</div>
        <div class="page-title">Tambah Perusahaan Baru</div>
        <div class="page-sub">Lengkapi data perusahaan yang akan menjadi mitra PKL</div>
      </div>

      <!-- FORM LAYOUT -->
      <div class="form-outer">

        <!-- LEFT: FORM CARD -->
        <div class="fu fu-2">
          <div class="form-card">
            <div class="form-card-header">
              <div class="fch-icon"><i class="fa-solid fa-building"></i></div>
              <div>
                <div class="fch-title">Data Perusahaan</div>
                <div class="fch-sub">Isi semua kolom yang bertanda wajib</div>
              </div>
            </div>

            <div class="form-body">
              <form method="POST" action="{{ route('admin.perusahaan.store') }}" id="perusahaanForm" enctype="multipart/form-data">
                @csrf

                @if($errors->any())
                <div class="err-box">
                  <i class="fa-solid fa-triangle-exclamation"></i>
                  <div>{{ $errors->first() }}</div>
                </div>
                @endif

                <!-- IDENTITAS PERUSAHAAN -->
                <div class="section-label">Identitas Perusahaan</div>

                <div class="field">
                  <label>Nama Perusahaan <span class="field-required">*</span></label>
                  <div class="input-wrap">
                    <i class="fa-solid fa-briefcase fi"></i>
                    <input type="text" name="nama_perusahaan" id="namaPerusahaanInput"
                      placeholder="Nama perusahaan"
                      value="{{ old('nama_perusahaan') }}" required autocomplete="off">
                  </div>
                </div>

                <div class="field">
                  <label>Logo Perusahaan</label>
                  <div class="file-input-wrap" onclick="document.getElementById('logoInput').click()">
                    <label for="logoInput" class="file-input-label">
                      <div class="file-input-icon">
                        <i class="fa-solid fa-image"></i>
                      </div>
                      <div class="file-input-text">
                        <h6>Pilih Logo Perusahaan</h6>
                        <p>Klik untuk upload atau drag & drop (JPG, PNG - Max 2MB)</p>
                      </div>
                    </label>
                    <input type="file" id="logoInput" name="gambar" accept=".jpg,.jpeg,.png,.gif" onchange="previewLogo(this)">
                    <div class="file-preview" id="logoPreview" style="display:none">
                      <img id="logoImg" src="" alt="Logo preview">
                      <div class="file-name" id="logoName"></div>
                      <div class="remove-file" onclick="removeLogo()">Hapus file</div>
                    </div>
                  </div>
                  <div class="field-hint">Opsional - Ukuran rekomendasi 200x200px atau lebih</div>
                </div>

                <div class="form-divider"></div>

                <!-- ALAMAT -->
                <div class="section-label">Lokasi Perusahaan</div>

                <div class="field">
                  <label>
                    <i class="fa-solid fa-map-pin" style="color:var(--teal);margin-right:8px;font-size:14px"></i>
                    Alamat <span class="field-required">*</span>
                  </label>
                  <div class="input-wrap">
                    <textarea name="alamat" id="alamatInput" placeholder="Masukkan alamat lengkap perusahaan termasuk jalan, nomor, kelurahan, dan kecamatan" required>{{ old('alamat') }}</textarea>
                  </div>
                  <div class="field-hint">
                    <i class="fa-solid fa-circle-info" style="margin-right:6px;color:var(--teal)"></i>
                    Semakin detail akan membantu siswa menemukan lokasi dengan mudah
                  </div>
                </div>

                <div class="field-row">
                  <div class="field">
                    <label>Kota/Kabupaten <span class="field-required">*</span></label>
                    <div class="input-wrap">
                      <i class="fa-solid fa-city fi"></i>
                      <input type="text" name="kota" id="kotaInput"
                        placeholder="Nama kota/kabupaten"
                        value="{{ old('kota') }}" required autocomplete="off">
                    </div>
                  </div>
                  <div class="field">
                    <label>Provinsi <span class="field-required">*</span></label>
                    <div class="input-wrap">
                      <i class="fa-solid fa-flag fi"></i>
                      <input type="text" name="provinsi" id="provinsiInput"
                        placeholder="Nama provinsi"
                        value="{{ old('provinsi') }}" required autocomplete="off">
                    </div>
                  </div>
                </div>

                <div class="form-divider"></div>

                <!-- INFO TAMBAHAN -->
                <div class="section-label">Informasi Tambahan</div>

                <div class="field">
                  <label>Bidang Usaha <span class="field-required">*</span></label>
                  <div class="input-wrap">
                    <i class="fa-solid fa-industry fi"></i>
                    <input type="text" name="bidang" id="bidangUsahaInput"
                      placeholder="Contoh: IT, Manufaktur, Retail"
                      value="{{ old('bidang') }}" required autocomplete="off">
                  </div>
                </div>

                <div class="field">
                  <label>
                    <i class="fa-solid fa-graduation-cap" style="color:var(--teal);margin-right:8px;font-size:14px"></i>
                    Jurusan yang Dibutuhkan <span class="field-required">*</span>
                  </label>
                  <div class="input-wrap">
                    <i class="fa-solid fa-graduation-cap fi"></i>
                    <select name="jurusan_dibutuhkan[]" id="jurusanInput" required>
                      <option value="">-- Pilih Jurusan --</option>
                      <option value="SIJA" {{ (is_array(old('jurusan_dibutuhkan', [])) && in_array('SIJA', old('jurusan_dibutuhkan', []))) ? 'selected' : '' }}>SIJA - Sistem Informasi Jaringan dan Aplikasi</option>
                    </select>
                  </div>
                  <div class="field-hint">
                    <i class="fa-solid fa-circle-info" style="margin-right:6px;color:var(--teal)"></i>
                    Pilih jurusan yang sesuai dengan kebutuhan perusahaan
                  </div>
                </div>

                <div class="field-row">
                  <div class="field">
                    <label>Kuota PKL <span class="field-required">*</span></label>
                    <div class="input-wrap">
                      <i class="fa-solid fa-users fi"></i>
                      <input type="number" name="kuota" id="kuotaInput"
                        placeholder="Jumlah siswa"
                        value="{{ old('kuota') }}" min="1" required>
                    </div>
                  </div>
                </div>

                <div class="form-divider"></div>

                <!-- DESKRIPSI -->
                <div class="section-label">Deskripsi</div>

                <div class="field">
                  <label>
                    <i class="fa-solid fa-file-text" style="color:var(--teal);margin-right:8px;font-size:14px"></i>
                    Deskripsi Perusahaan
                  </label>
                  <div class="input-wrap">
                    <textarea name="deskripsi" id="deskripsiInput" placeholder="Jelaskan tentang perusahaan, visi misi, program PKL, fasilitas, dan hal menarik lainnya yang perlu diketahui siswa" minlength="20">{{ old('deskripsi') }}</textarea>
                  </div>
                  <div class="field-hint">
                    <i class="fa-solid fa-circle-info" style="margin-right:6px;color:var(--teal)"></i>
                    Opsional - Deskripsi yang menarik akan meningkatkan minat siswa
                  </div>
                </div>

              </form>
            </div><!-- /form-body -->

            <div class="form-footer">
              <a href="{{ route('admin.perusahaan.index') }}" class="btn-cancel">
                <i class="fa-solid fa-xmark"></i> Batal
              </a>
              <button type="submit" form="perusahaanForm" class="btn-submit">
                <i class="fa-solid fa-floppy-disk"></i> Simpan Perusahaan
              </button>
            </div>
          </div><!-- /form-card -->
        </div>

        <!-- RIGHT: INFO SIDEBAR -->
        <div class="info-sidebar fu fu-3" style="display:none">

          <!-- LIVE PREVIEW -->
          <div class="info-card">
            <div class="ic-header">
              <div class="ic-icon ici-blue"><i class="fa-solid fa-eye"></i></div>
              <span class="ic-title">Pratinjau Data</span>
            </div>
            <div class="ic-body">
              <div class="preview-box">
                <div class="preview-row">
                  <span class="preview-label">NIS</span>
                  <span class="preview-value empty" id="prevNis">Belum diisi</span>
                </div>
                <div class="preview-row">
                  <span class="preview-label">Nama</span>
                  <span class="preview-value empty" id="prevNama">Belum diisi</span>
                </div>
                <div class="preview-row">
                  <span class="preview-label">Jurusan</span>
                  <span class="preview-value empty" id="prevJurusan">—</span>
                </div>
                <div class="preview-row" style="margin-bottom:0">
                  <span class="preview-label">Kelas</span>
                  <span class="preview-value empty" id="prevKelas">—</span>
                </div>
              </div>
            </div>
          </div>

          <!-- STEPS -->
          <div class="info-card">
            <div class="ic-header">
              <div class="ic-icon ici-teal"><i class="fa-solid fa-list-check"></i></div>
              <span class="ic-title">Langkah Pendaftaran</span>
            </div>
            <div class="ic-body">
              <div class="steps">
                <div class="step-item">
                  <div class="step-num">1</div>
                  <div class="step-text">
                    <h5>Isi NIS Siswa</h5>
                    <p>Masukkan Nomor Induk Siswa yang akan digunakan sebagai login</p>
                  </div>
                </div>
                <div class="step-item">
                  <div class="step-num">2</div>
                  <div class="step-text">
                    <h5>Nama Lengkap</h5>
                    <p>Pastikan nama sesuai dengan dokumen resmi sekolah</p>
                  </div>
                </div>
                <div class="step-item">
                  <div class="step-num">3</div>
                  <div class="step-text">
                    <h5>Pilih Jurusan & Kelas</h5>
                    <p>Pilih jurusan terlebih dahulu, kelas akan muncul otomatis</p>
                  </div>
                </div>
                <div class="step-item">
                  <div class="step-num">4</div>
                  <div class="step-text">
                    <h5>Simpan Data</h5>
                    <p>Klik Simpan Siswa. Password default adalah NIS siswa</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- INFO -->
          <div class="info-card">
            <div class="ic-header">
              <div class="ic-icon ici-blue"><i class="fa-solid fa-circle-info"></i></div>
              <span class="ic-title">Informasi Login</span>
            </div>
            <div class="ic-body">
              <div class="info-item">
                <div class="info-item-icon iii-blue"><i class="fa-solid fa-key"></i></div>
                <div class="info-item-text">
                  <h5>Password Default</h5>
                  <p>Password awal siswa sama dengan NIS. Siswa dapat mengubahnya setelah login pertama.</p>
                </div>
              </div>
              <div class="info-item">
                <div class="info-item-icon iii-teal"><i class="fa-solid fa-user-shield"></i></div>
                <div class="info-item-text">
                  <h5>Akses Portal Siswa</h5>
                  <p>Setelah terdaftar, siswa dapat langsung login dan mencari tempat PKL.</p>
                </div>
              </div>
            </div>
          </div>

        </div><!-- /info-sidebar -->
      </div><!-- /form-outer -->

    </div>
  </main>
</div>

<script>
  const dataKelas = {
    SIJA: ['XII SIJA 1', 'XII SIJA 2']
  };

  const jurusanSel = document.getElementById('jurusanSel');
  const kelasSel   = document.getElementById('kelasSel');
  const oldKelas   = "{{ old('kelas') }}";

  function loadKelas(jur, selected = null) {
    kelasSel.innerHTML = '<option value="">Pilih kelas</option>';
    (dataKelas[jur] || []).forEach(k => {
      const opt = document.createElement('option');
      opt.value = k; opt.textContent = k;
      if (k === selected) opt.selected = true;
      kelasSel.appendChild(opt);
    });
    updatePreview();
  }

  jurusanSel.addEventListener('change', function() {
    loadKelas(this.value);
  });
  if (jurusanSel.value) loadKelas(jurusanSel.value, oldKelas);

  // Live preview
  function updatePreview() {
    const nis    = document.getElementById('nisInput').value.trim();
    const nama   = document.getElementById('namaInput').value.trim();
    const jur    = jurusanSel.value;
    const kelas  = kelasSel.value;

    const setVal = (id, val) => {
      const el = document.getElementById(id);
      if (val) {
        el.textContent = val;
        el.classList.remove('empty');
      } else {
        el.textContent = id === 'prevNis' ? 'Belum diisi' : id === 'prevNama' ? 'Belum diisi' : '—';
        el.classList.add('empty');
      }
    };

    setVal('prevNis', nis);
    setVal('prevNama', nama);
    setVal('prevJurusan', jur);
    setVal('prevKelas', kelas);
  }

  document.getElementById('nisInput').addEventListener('input', updatePreview);
  document.getElementById('namaInput').addEventListener('input', updatePreview);
  kelasSel.addEventListener('change', updatePreview);
  jurusanSel.addEventListener('change', updatePreview);

  // Logo upload preview
  function previewLogo(input) {
    const file = input.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        const preview = document.getElementById('logoPreview');
        const img = document.getElementById('logoImg');
        const name = document.getElementById('logoName');
        
        img.src = e.target.result;
        name.textContent = file.name;
        preview.style.display = 'block';
        
        // Validate file size (2MB max)
        if (file.size > 2 * 1024 * 1024) {
          showToast('Ukuran file terlalu besar. Maksimal 2MB.', 'error');
          removeLogo();
        } else {
          showToast('Logo berhasil dipilih: ' + file.name, 'success');
        }
      };
      reader.readAsDataURL(file);
    }
  }

  function removeLogo() {
    const input = document.getElementById('logoInput');
    const preview = document.getElementById('logoPreview');
    input.value = '';
    preview.style.display = 'none';
    showToast('Logo berhasil dihapus', 'info');
  }

  // Drag and drop support
  const fileInputWrap = document.querySelector('.file-input-wrap');
  if (fileInputWrap) {
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
      fileInputWrap.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
      e.preventDefault();
      e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
      fileInputWrap.addEventListener(eventName, () => {
        fileInputWrap.style.borderColor = 'var(--teal)';
        fileInputWrap.style.background = 'rgba(42,157,143,0.08)';
      });
    });

    ['dragleave', 'drop'].forEach(eventName => {
      fileInputWrap.addEventListener(eventName, () => {
        fileInputWrap.style.borderColor = 'var(--gray-200)';
        fileInputWrap.style.background = 'var(--gray-50)';
      });
    });

    fileInputWrap.addEventListener('drop', (e) => {
      const dt = e.dataTransfer;
      const files = dt.files;
      document.getElementById('logoInput').files = files;
      previewLogo(document.getElementById('logoInput'));
    });
  }

  // Toast notification system
  function showToast(message, type = 'info', duration = 4000) {
    const container = document.getElementById('toastContainer');
    if (!container) {
      console.error('Toast container not found!');
      return;
    }
    
    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    
    const icons = {
      success: '<i class="fa-solid fa-check-circle"></i>',
      error: '<i class="fa-solid fa-triangle-exclamation"></i>',
      info: '<i class="fa-solid fa-circle-info"></i>',
      warning: '<i class="fa-solid fa-exclamation-triangle"></i>'
    };
    
    toast.innerHTML = `
      <div class="toast-icon">${icons[type]}</div>
      <div class="toast-content">${message}</div>
      <div class="toast-close" onclick="removeToast(this.parentElement)">
        <i class="fa-solid fa-xmark"></i>
      </div>
    `;
    
    container.appendChild(toast);
    console.log('Toast shown:', message, type);
    
    if (duration > 0) {
      setTimeout(() => {
        removeToast(toast);
      }, duration);
    }
  }

  function removeToast(toast) {
    toast.classList.add('hide');
    setTimeout(() => {
      toast.remove();
    }, 300);
  }

  // Form validation and submission notifications
  const perusahaanForm = document.getElementById('perusahaanForm');
  if (perusahaanForm) {
    perusahaanForm.addEventListener('submit', function(e) {
      const namaPerusahaan = document.getElementById('namaPerusahaanInput').value.trim();
      const alamat = document.getElementById('alamatInput').value.trim();
      const kota = document.getElementById('kotaInput').value.trim();
      const provinsi = document.getElementById('provinsiInput').value.trim();
      const bidangUsaha = document.getElementById('bidangUsahaInput').value.trim();
      const jurusan = document.getElementById('jurusanInput').value.trim();
      const kuota = document.getElementById('kuotaInput').value.trim();

      let errors = [];
      
      if (!namaPerusahaan) errors.push('Nama perusahaan harus diisi');
      if (!alamat) errors.push('Alamat harus diisi');
      if (!kota) errors.push('Kota/Kabupaten harus diisi');
      if (!provinsi) errors.push('Provinsi harus diisi');
      if (!bidangUsaha) errors.push('Bidang usaha harus diisi');
      if (!jurusan) errors.push('Jurusan yang dibutuhkan harus diisi');
      if (!kuota) errors.push('Kuota PKL harus diisi');

      if (errors.length > 0) {
        e.preventDefault();
        errors.forEach((error, index) => {
          setTimeout(() => {
            showToast(error, 'warning');
          }, index * 300);
        });
        showToast('⚠️ Pastikan semua kolom wajib terisi', 'error', 5000);
        return false;
      }

      showToast('✓ Memproses data perusahaan...', 'info');
    });
  }

  // Input field notifications
  document.getElementById('namaPerusahaanInput').addEventListener('input', function() {
    if (this.value.length > 0 && this.value.length < 3) {
      // Show subtle indication
    }
  });

  document.getElementById('kuotaInput').addEventListener('change', function() {
    if (this.value && parseInt(this.value) < 1) {
      showToast('Kuota harus minimal 1 siswa', 'warning');
      this.value = '1';
    } else if (this.value) {
      showToast('✓ Kuota terisi: ' + this.value + ' siswa', 'success', 2000);
    }
  });

  document.getElementById('jurusanInput').addEventListener('change', function() {
    if (this.value) {
      showToast('✓ Jurusan dipilih: ' + this.options[this.selectedIndex].text, 'success', 2000);
    }
  });

  // Page load notification - handle both cases
  // Handle Jurusan badges display
  function initializeNotifications() {
    showToast('Siap untuk mengisi data perusahaan baru', 'info', 3000);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
      initializeNotifications();
    });
  } else {
    initializeNotifications();
  }

  // Check for flash messages and show as toast
  @if(session('success'))
    setTimeout(() => {
      showToast('{{ session("success") }}', 'success', 5000);
    }, 500);
  @endif

  @if(session('error'))
    setTimeout(() => {
      showToast('{{ session("error") }}', 'error', 5000);
    }, 500);
  @endif
</script>
@endsection