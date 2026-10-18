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
  width:clamp(200px,15vw,280px);flex-shrink:0;
  background:var(--white);
  border-right:1.5px solid var(--gray-200);
  display:flex;flex-direction:column;
  position:sticky;top:0;height:100vh;overflow-y:auto;
}
.sidebar-logo-wrap{padding:clamp(14px,2vh,20px) clamp(14px,2vw,20px) 0;border-bottom:1.5px solid var(--gray-200)}
.logo{display:flex;align-items:center;gap:9px;text-decoration:none;padding-bottom:18px}
.logo-icon{
  width:clamp(28px,5vw,36px);height:clamp(28px,5vw,36px);background:var(--blue);border-radius:8px;
  display:flex;align-items:center;justify-content:center;
  font-weight:800;font-size:clamp(11px,1.5vw,15px);color:var(--white);flex-shrink:0;
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

/* ── MAIN ── */
.main{flex:1;min-width:0}
.main-inner{padding:clamp(20px,3vh,32px) clamp(16px,3vw,36px) clamp(40px,6vh,60px);max-width:1400px}

/* TOPBAR */
.topbar{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:clamp(20px,4vh,28px);gap:clamp(12px,2vw,20px);padding-bottom:clamp(16px,3vh,24px);border-bottom:1.5px solid var(--gray-200)}
.topbar-tag{display:inline-flex;align-items:center;gap:7px;background:var(--blue-light);color:var(--blue);font-size:clamp(9px,1.2vw,11px);font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:clamp(3px,0.5vh,4px) clamp(8px,1.5vw,12px);border-radius:100px;margin-bottom:clamp(8px,1.5vh,10px)}
.topbar-title{font-size:clamp(20px,4vw,28px);font-weight:800;color:var(--blue);letter-spacing:-.5px}
.topbar-sub{font-size:clamp(12px,2vw,14px);color:var(--gray-600);margin-top:clamp(2px,0.5vh,4px)}
.topbar-actions{display:flex;align-items:center;gap:clamp(6px,1.5vw,8px);flex-wrap:wrap;flex-shrink:0}

/* BUTTONS */
.btn-primary{display:inline-flex;align-items:center;gap:7px;background:var(--blue);color:var(--white);padding:clamp(8px,1.5vh,10px) clamp(12px,2vw,18px);border-radius:var(--radius);font-size:clamp(12px,1.5vw,13px);font-weight:700;text-decoration:none;transition:background .15s,transform .12s,box-shadow .15s;box-shadow:0 2px 8px rgba(30,58,95,0.2)}
.btn-primary:hover{background:var(--blue-mid);transform:translateY(-1px);box-shadow:0 6px 16px rgba(30,58,95,0.28)}
.btn-teal{display:inline-flex;align-items:center;gap:7px;background:var(--teal-light);color:var(--teal);border:1.5px solid rgba(42,157,143,.25);padding:9px 16px;border-radius:var(--radius);font-size:13px;font-weight:700;text-decoration:none;transition:all .15s}
.btn-teal:hover{background:var(--teal);color:var(--white);border-color:var(--teal);transform:translateY(-1px)}
.btn-outline{display:inline-flex;align-items:center;gap:7px;background:var(--white);color:var(--gray-600);border:1.5px solid var(--gray-200);padding:9px 16px;border-radius:var(--radius);font-size:13px;font-weight:600;text-decoration:none;transition:all .15s}
.btn-outline:hover{border-color:var(--blue);color:var(--blue);background:var(--blue-light)}

/* ALERT */
.alert-success{background:var(--green-light);border:1.5px solid #BBF7D0;border-radius:var(--radius-lg);padding:16px 20px;margin-bottom:24px;display:flex;align-items:flex-start;gap:12px}
.alert-success i{color:var(--green);font-size:16px;margin-top:1px;flex-shrink:0}
.alert-success-title{font-size:13px;font-weight:700;color:var(--green);margin-bottom:3px}
.alert-success-sub{font-size:12px;color:var(--gray-600)}
.alert-warn{background:var(--amber-light);border:1.5px solid #FDE68A;border-radius:var(--radius);padding:12px 14px;margin-top:10px}
.alert-warn p{font-size:12px;color:var(--amber)}
.alert-warn ul{font-size:11px;color:var(--gray-600);margin:6px 0 0 18px;max-height:120px;overflow-y:auto}

/* TABLE CARD */
.card{background:var(--white);border:1.5px solid var(--gray-200);border-radius:var(--radius-lg);padding:clamp(16px,2.5vh,24px)}
.card-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:clamp(14px,2.5vh,20px)}
.card-title-wrap{display:flex;align-items:center;gap:clamp(8px,1.5vw,10px)}
.card-icon-sm{width:clamp(28px,5vw,32px);height:clamp(28px,5vw,32px);border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:clamp(10px,1.5vw,12px)}
.cis-blue{background:var(--blue-light);color:var(--blue)}
.card-title{font-size:clamp(13px,2vw,15px);font-weight:700;color:var(--blue)}
.card-count{font-size:clamp(9px,1.2vw,11px);font-weight:700;padding:clamp(3px,0.5vh,3px) clamp(7px,1.2vw,9px);border-radius:100px;background:var(--gray-100);color:var(--gray-600)}

/* TOOLBAR */
.toolbar{display:flex;align-items:center;gap:clamp(8px,1.5vw,10px);margin-bottom:clamp(14px,2.5vh,20px);flex-wrap:wrap}
.search-wrap{position:relative;flex:1;min-width:clamp(160px,30vw,320px)}
.search-wrap i{position:absolute;left:clamp(10px,1.5vw,12px);top:50%;transform:translateY(-50%);color:var(--gray-400);font-size:clamp(11px,1.5vw,13px);pointer-events:none}
.search-input{width:100%;padding:clamp(8px,1.5vh,9px) clamp(10px,1.5vw,12px) clamp(8px,1.5vh,9px) clamp(32px,5vw,36px);background:var(--gray-50);border:1.5px solid var(--gray-200);border-radius:var(--radius);font-family:var(--font);font-size:clamp(12px,1.5vw,13px);color:var(--gray-800);outline:none;transition:border-color .2s}
.search-input::placeholder{color:var(--gray-400)}
.search-input:focus{border-color:var(--blue)}
.filter-select{padding:9px 32px 9px 12px;background:var(--gray-50);border:1.5px solid var(--gray-200);border-radius:var(--radius);font-family:var(--font);font-size:13px;color:var(--gray-800);outline:none;transition:border-color .2s;cursor:pointer;appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6'%3E%3Cpath d='M0 0l5 6 5-6z' fill='%2394A3B8'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:calc(100% - 10px) center}
.filter-select:focus{border-color:var(--blue)}

/* LOADING BAR */
.loading-bar{height:2.5px;background:linear-gradient(90deg,var(--blue),var(--teal));border-radius:2px;width:0;margin-bottom:16px;display:none;border-radius:2px}
.loading-bar.active{display:block;animation:loadAnim 1s ease-in-out infinite}
@keyframes loadAnim{0%{width:20%;margin-left:0}50%{width:40%;margin-left:30%}100%{width:20%;margin-left:0}}

/* TABLE */
.table-wrap{overflow-x:auto;margin:0 -4px}
table{width:100%;border-collapse:collapse;min-width:600px;font-size:clamp(11px,1.5vw,13px)}
thead tr{border-bottom:1.5px solid var(--gray-200)}
th{padding:clamp(9px,1.5vh,11px) clamp(10px,1.5vw,14px);text-align:left;font-size:clamp(9px,1.2vw,11px);font-weight:700;color:var(--gray-400);letter-spacing:.06em;text-transform:uppercase;white-space:nowrap}
tbody tr{border-bottom:1.5px solid var(--gray-100);transition:background .12s}
tbody tr:last-child{border-bottom:none}
tbody tr:hover{background:var(--gray-50)}
td{padding:clamp(10px,1.5vh,12px) clamp(10px,1.5vw,14px);color:var(--gray-800);vertical-align:middle}

/* AVATAR NAME CELL */
.avatar-name{display:flex;align-items:center;gap:11px}
.ava{width:clamp(30px,5vw,34px);height:clamp(30px,5vw,34px);border-radius:50%;background:linear-gradient(135deg,var(--blue),var(--teal));display:flex;align-items:center;justify-content:center;font-size:clamp(9px,1.2vw,11px);font-weight:700;color:var(--white);flex-shrink:0}
.ava-name{font-size:clamp(11px,1.8vw,13px);font-weight:700;color:var(--blue)}
.ava-nis{font-size:clamp(9px,1.2vw,11px);color:var(--gray-400);margin-top:1px;font-family:monospace}

/* BADGES */
.badge{display:inline-flex;align-items:center;gap:4px;padding:clamp(3px,0.5vh,4px) clamp(8px,1.5vw,10px);border-radius:100px;font-size:clamp(9px,1.2vw,11px);font-weight:700;letter-spacing:.02em}
.b-blue{background:var(--blue-light);color:var(--blue);border:1.5px solid rgba(30,58,95,.12)}
.b-teal{background:var(--teal-light);color:var(--teal);border:1.5px solid rgba(42,157,143,.2)}
.b-gray{background:var(--gray-100);color:var(--gray-500);border:1.5px solid var(--gray-200)}
.b-amber{background:var(--amber-light);color:var(--amber);border:1.5px solid #FDE68A}
.b-red{background:var(--red-light);color:var(--red);border:1.5px solid #FED7D7}
.b-green{background:var(--green-light);color:var(--green);border:1.5px solid #BBF7D0}

/* ACTIONS */
.actions{display:flex;align-items:center;gap:6px}
.act-btn{width:clamp(28px,5vw,32px);height:clamp(28px,5vw,32px);border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:clamp(10px,1.5vw,12px);text-decoration:none;border:1.5px solid transparent;transition:all .15s;cursor:pointer;background:none}
.act-edit{background:var(--blue-light);color:var(--blue);border-color:rgba(30,58,95,.12)}
.act-edit:hover{background:var(--blue);color:var(--white);border-color:var(--blue)}
.act-del{background:var(--red-light);color:var(--red);border-color:rgba(220,38,38,.15)}
.act-del:hover{background:var(--red);color:var(--white);border-color:var(--red)}

/* EMPTY STATE */
.empty-state{text-align:center;padding:clamp(32px,6vh,52px) clamp(16px,3vw,20px)}
.empty-icon{width:clamp(48px,8vw,64px);height:clamp(48px,8vw,64px);border-radius:16px;background:var(--gray-100);display:flex;align-items:center;justify-content:center;font-size:clamp(20px,3vw,26px);color:var(--gray-400);margin:0 auto clamp(12px,2vh,16px)}
.empty-title{font-size:clamp(13px,2vw,15px);font-weight:700;color:var(--gray-800);margin-bottom:6px}
.empty-sub{font-size:clamp(12px,1.8vw,13px);color:var(--gray-400)}

/* PAGINATION */
.pag-wrap{
  display:flex;
  flex-direction:column;
  align-items:center;
  justify-content:center;
  margin-top:clamp(24px,5vh,32px);
  padding:clamp(20px,4vh,28px);
  border-top:2px solid var(--gray-200);
  border-bottom:2px solid var(--gray-200);
  gap:clamp(14px,3vh,20px);
  background:linear-gradient(135deg,rgba(42,157,143,0.04),rgba(30,58,95,0.02));
  border-radius:var(--radius-lg);
}

.pag-info{
  font-size:clamp(12px,1.5vw,14px);
  color:var(--gray-700);
  display:flex;
  align-items:center;
  gap:8px;
  text-align:center;
  flex-wrap:wrap;
  justify-content:center;
  width:100%;
}

.pag-info i{
  color:var(--teal);
  font-size:clamp(13px,1.8vw,15px);
  flex-shrink:0;
}

.pag-info strong{
  color:var(--blue);
  font-weight:700;
  font-size:clamp(12px,1.6vw,14px);
}

.pag-btns{
  display:flex;
  gap:clamp(8px,1.5vw,12px);
  align-items:center;
  justify-content:center;
  flex-wrap:wrap;
  width:100%;
}

.pag-btn{
  display:inline-flex;
  align-items:center;
  justify-content:center;
  gap:6px;
  padding:clamp(9px,1.8vh,11px) clamp(14px,2.5vw,18px);
  border-radius:var(--radius);
  font-size:clamp(12px,1.4vw,13px);
  font-weight:600;
  text-decoration:none;
  transition:all .25s cubic-bezier(0.4,0,0.2,1);
  border:1.5px solid var(--gray-250);
  color:var(--gray-700);
  background:var(--white);
  white-space:nowrap;
  cursor:pointer;
  box-shadow:0 1px 2px rgba(0,0,0,0.05);
  min-width:120px;
}

.pag-btn:hover:not(.disabled){
  border-color:var(--teal);
  color:var(--teal);
  background:var(--teal-light);
  transform:translateY(-2px);
  box-shadow:0 4px 12px rgba(42,157,143,0.2);
}

.pag-btn:active:not(.disabled){
  transform:translateY(0);
  box-shadow:0 1px 4px rgba(42,157,143,0.15);
}

.pag-btn.disabled{
  opacity:.5;
  cursor:not-allowed;
  pointer-events:none;
}

.pag-btn i{
  font-size:clamp(11px,1.3vw,12px);
}

.pag-separator{
  color:var(--gray-300);
  font-size:clamp(12px,1.5vw,14px);
  margin:0 2px;
}

/* MOBILE */
@media(max-width:480px){
  .pag-wrap{
    padding:16px;
    gap:12px;
    border-radius:var(--radius);
  }
  .pag-info{
    font-size:12px;
    gap:6px;
  }
  .pag-info i{
    font-size:13px;
  }
  .pag-btns{
    gap:6px;
  }
  .pag-btn{
    padding:8px 12px;
    font-size:11px;
    min-width:110px;
    flex:0 1 calc(50% - 3px);
  }
  .pag-separator{
    display:none;
  }
}

@media(min-width:481px) and (max-width:768px){
  .pag-wrap{
    padding:18px;
    gap:14px;
  }
  .pag-info{
    font-size:13px;
  }
  .pag-btns{
    gap:8px;
  }
  .pag-btn{
    padding:9px 14px;
    font-size:12px;
    min-width:115px;
  }
}

/* ANIMATIONS */
@keyframes fadeUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
.fade-up{animation:fadeUp .4s ease-out both}
.d1{animation-delay:.05s}.d2{animation-delay:.1s}

/* ─────────────────────────────────────────────────────────────── */
/* RESPONSIVE DESIGN - MULTIPLE BREAKPOINTS */
/* ─────────────────────────────────────────────────────────────── */

/* ── EXTRA SMALL (360px - 480px) ── */
@media(max-width:480px){
  .wrapper{flex-direction:column}
  .sidebar{display:none}
  .main{width:100%}
  .main-inner{padding:clamp(12px,3vh,20px) clamp(12px,3vw,16px) 30px}
  
  .topbar{flex-direction:column;align-items:flex-start;gap:12px;margin-bottom:16px;padding-bottom:16px}
  .topbar-tag{font-size:9px;padding:3px 9px}
  .topbar-title{font-size:clamp(18px,4vw,22px);margin-bottom:2px}
  .topbar-sub{font-size:12px}
  .topbar-actions{width:100%;display:flex;gap:6px;flex-wrap:wrap}
  .topbar-actions .btn-primary{flex:1;min-width:120px;padding:8px 12px;font-size:12px}
  .topbar-actions .btn-teal{padding:8px 12px;font-size:12px}
  
  .card{border-radius:12px;padding:16px}
  .card-header{flex-direction:column;align-items:flex-start;gap:12px}
  .card-title{font-size:14px}
  .card-count{font-size:10px}
  
  .toolbar{flex-direction:column;gap:8px}
  .search-wrap{max-width:100%}
  .filter-select{width:100%}
  
  .table-wrap{overflow-x:auto;-webkit-overflow-scrolling:touch}
  table{font-size:12px;min-width:500px}
  th,td{padding:8px 10px}
  .avatar-name{gap:8px;flex-wrap:wrap}
  .ava{width:28px;height:28px;font-size:9px}
  .ava-name{font-size:12px}
  .ava-nis{font-size:10px}
  .actions{gap:4px}
  .act-btn{width:28px;height:28px;font-size:11px}
  
  .empty-state{padding:32px 16px}
  .empty-icon{width:48px;height:48px;font-size:20px}
  .empty-title{font-size:13px}
  .empty-sub{font-size:12px}
}

/* ── SMALL (481px - 768px) ── */
@media(min-width:481px) and (max-width:768px){
  .sidebar{display:none}
  .main-inner{padding:24px 20px 40px}
  
  .topbar{flex-direction:column;align-items:flex-start;gap:16px;padding-bottom:20px}
  .topbar-title{font-size:clamp(20px,4vw,24px)}
  .topbar-sub{font-size:13px}
  .topbar-actions{width:100%;flex-wrap:wrap;gap:8px}
  
  .card{padding:20px}
  .card-header{flex-direction:column;align-items:flex-start}
  
  .toolbar{flex-direction:column;gap:10px}
  .search-wrap{max-width:100%}
  .filter-select{width:100%}
  
  table{font-size:12px}
  th,td{padding:10px 12px}
  .ava{width:32px;height:32px}
  .actions{gap:4px}
  .act-btn{width:30px;height:30px}
}

/* ── TABLET/MEDIUM (769px - 1024px) ── */
@media(min-width:769px) and (max-width:1024px){
  .sidebar{width:200px}
  .logo-name{font-size:14px}
  .nav-label{font-size:9px}
  .menu a{padding:8px 10px;font-size:12px}
  .menu a i{font-size:12px}
  
  .main-inner{padding:28px 24px 50px}
  .topbar{margin-bottom:24px}
  .topbar-title{font-size:clamp(20px,3vw,24px)}
  
  .card{padding:20px}
  .toolbar{gap:12px}
  .search-wrap{max-width:280px}
  
  table{font-size:12px}
  th,td{padding:10px 12px}
  .ava{width:32px;height:32px;font-size:10px}
  .ava-name{font-size:12px}
}

/* ── DESKTOP/LARGE (1025px - 1440px) ── */
@media(min-width:1025px) and (max-width:1440px){
  .sidebar{width:240px}
  .main-inner{padding:32px 32px 60px;max-width:1200px}
}

/* ── EXTRA LARGE (1441px+) ── */
@media(min-width:1441px){
  .sidebar{width:240px}
  .main-inner{padding:36px 40px 60px;max-width:1400px;margin:0 auto}
}

/* ── LANDSCAPE MODE ── */
@media(max-height:600px){
  .sidebar{height:auto;position:static;overflow:visible}
  .main-inner{padding:16px 20px 30px}
  .topbar{margin-bottom:16px}
  table{font-size:12px}
}

/* ── HIGH RESOLUTION (2560px+) ── */
@media(min-width:2560px){
  .sidebar{width:280px;padding:28px 24px}
  .logo-name{font-size:18px}
  .topbar-title{font-size:32px}
  .main-inner{padding:40px 48px;max-width:1600px;margin:0 auto}
  th,td{padding:16px 18px}
}
</style>

<div class="wrapper">

  <!-- SIDEBAR -->
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
        </a>        <a href="{{ route('admin.guru.index') }}" class="{{ request()->routeIs('admin.guru.*') ? 'active' : '' }}">
          <i class="fa-solid fa-chalkboard-user"></i> Data Guru
        </a>        <a href="{{ route('admin.perusahaan.index') }}" class="{{ request()->is('admin/perusahaan*') ? 'active' : '' }}">
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

      <!-- TOPBAR -->
      <div class="topbar fade-up">
        <div>
          <div class="topbar-tag">Manajemen Data</div>
          <div class="topbar-title">Data Siswa</div>
          <div class="topbar-sub">Kelola seluruh data siswa dalam sistem GOPKL</div>
        </div>
        <div class="topbar-actions">
          <a href="{{ route('admin.siswa.importView') }}" class="btn-teal">
            <i class="fa-solid fa-arrow-up-from-bracket"></i> Import
          </a>
          <a href="{{ route('admin.siswa.create') }}" class="btn-primary">
            <i class="fa-solid fa-plus"></i> Tambah Siswa
          </a>
        </div>
      </div>

      <!-- ALERT -->
      @if(session('import_success'))
      <div class="alert-success fade-up d1">
        <i class="fa-solid fa-circle-check"></i>
        <div>
          <div class="alert-success-title">Berhasil Import Data!</div>
          <div class="alert-success-sub">{{ session('import_success') }} data siswa berhasil ditambahkan dari file <strong>{{ session('file_name') }}</strong></div>
          @if(session('import_errors') && count(session('import_errors')) > 0)
          <div class="alert-warn">
            <p><strong>Perhatian:</strong> {{ count(session('import_errors')) }} baris tidak berhasil diproses:</p>
            <ul>
              @foreach(session('import_errors') as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
        </div>
      </div>
      @endif

      <!-- TABLE CARD -->
      <div class="card fade-up d2">
        <div class="card-header">
          <div class="card-title-wrap">
            <div class="card-icon-sm cis-blue"><i class="fa-solid fa-users"></i></div>
            <div class="card-title">Daftar Siswa</div>
          </div>
          <div class="card-count" id="totalCount">Memuat...</div>
        </div>

        <!-- TOOLBAR -->
        <div class="toolbar">
          <div class="search-wrap">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="search" class="search-input" placeholder="Cari nama atau NIS...">
          </div>
          <select id="kelas-filter" class="filter-select">
            <option value="">Semua Kelas</option>
            <option value="XII SIJA 1">XII SIJA 1</option>
            <option value="XII SIJA 2">XII SIJA 2</option>
          </select>
          <a href="{{ route('admin.siswa.exportPdf') }}" class="btn-outline" target="_blank">
            <i class="fa-solid fa-file-pdf"></i> Export PDF
          </a>
        </div>

        <div class="loading-bar" id="loading"></div>

        <div class="table-wrap">
          <table>
            <thead>
              <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Wali Kelas</th>
                <th>Status PKL</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody id="siswa-table">
              @include('admin.siswa.table', ['siswas' => $siswas])
            </tbody>
          </table>
        </div>

        @if($siswas->hasPages())
        <div class="pag-wrap">
          <div class="pag-info">
            <i class="fa-solid fa-database"></i>
            <span>Menampilkan <strong>{{ $siswas->firstItem() }}</strong> - <strong>{{ $siswas->lastItem() }}</strong> dari <strong>{{ $siswas->total() }}</strong> siswa</span>
          </div>
          <div class="pag-btns">
            @if($siswas->onFirstPage())
              <span class="pag-btn disabled" title="Halaman pertama"><i class="fa-solid fa-chevron-left"></i> Sebelumnya</span>
            @else
              <a href="{{ $siswas->appends(request()->query())->previousPageUrl() }}" class="pag-btn pag-prev-btn" title="Halaman sebelumnya"><i class="fa-solid fa-chevron-left"></i> Sebelumnya</a>
            @endif
            
            <span class="pag-separator">|</span>
            
            <span class="pag-btn" style="background:var(--blue-light);color:var(--blue);border-color:var(--teal);cursor:default;pointer-events:none;box-shadow:inset 0 1px 3px rgba(30,58,95,0.1);" title="Posisi halaman saat ini">
              <i class="fa-solid fa-book-open"></i> Halaman {{ $siswas->currentPage() }}/{{ $siswas->lastPage() }}
            </span>
            
            <span class="pag-separator">|</span>
            
            @if($siswas->hasMorePages())
              <a href="{{ $siswas->appends(request()->query())->nextPageUrl() }}" class="pag-btn pag-next-btn" title="Halaman selanjutnya">Selanjutnya <i class="fa-solid fa-chevron-right"></i></a>
            @else
              <span class="pag-btn disabled" title="Halaman terakhir">Selanjutnya <i class="fa-solid fa-chevron-right"></i></span>
            @endif
          </div>
        </div>
        @endif

      </div>
    </div>
  </main>
</div>

<script>
  let timeout;
  const searchInput  = document.getElementById('search');
  const kelasFilter  = document.getElementById('kelas-filter');
  const loadingBar   = document.getElementById('loading');
  const siswaTable   = document.getElementById('siswa-table');
  const totalCount   = document.getElementById('totalCount');

  function updatePagination(paginationData) {
    const pagWrap = document.querySelector('.pag-wrap');
    if (!pagWrap) return;
    
    const pagInfo = pagWrap.querySelector('.pag-info');
    const pagBtns = pagWrap.querySelector('.pag-btns');
    
    if (!pagInfo || !pagBtns) return;
    
    // Update info section
    pagInfo.innerHTML = `<i class="fa-solid fa-database"></i><span>Menampilkan <strong>${paginationData.firstItem}</strong> - <strong>${paginationData.lastItem}</strong> dari <strong>${paginationData.total}</strong> siswa</span>`;
    
    let btnHTML = '';
    
    // Tombol Sebelumnya
    if (paginationData.onFirstPage) {
      btnHTML += '<span class="pag-btn disabled" title="Halaman pertama"><i class="fa-solid fa-chevron-left"></i> Sebelumnya</span>';
    } else {
      btnHTML += `<a href="${paginationData.previousPageUrl}" class="pag-btn pag-prev-btn" title="Halaman sebelumnya"><i class="fa-solid fa-chevron-left"></i> Sebelumnya</a>`;
    }
    
    // Separator
    btnHTML += '<span class="pag-separator">|</span>';
    
    // Info halaman saat ini
    btnHTML += `<span class="pag-btn" style="background:var(--blue-light);color:var(--blue);border-color:var(--teal);cursor:default;pointer-events:none;box-shadow:inset 0 1px 3px rgba(30,58,95,0.1);" title="Posisi halaman saat ini"><i class="fa-solid fa-book-open"></i> Halaman ${paginationData.currentPage}/${paginationData.lastPage}</span>`;
    
    // Separator
    btnHTML += '<span class="pag-separator">|</span>';
    
    // Tombol Selanjutnya
    if (paginationData.hasMorePages) {
      btnHTML += `<a href="${paginationData.nextPageUrl}" class="pag-btn pag-next-btn" title="Halaman selanjutnya">Selanjutnya <i class="fa-solid fa-chevron-right"></i></a>`;
    } else {
      btnHTML += '<span class="pag-btn disabled" title="Halaman terakhir">Selanjutnya <i class="fa-solid fa-chevron-right"></i></span>';
    }
    
    pagBtns.innerHTML = btnHTML;
    
    // Re-attach event listeners to pagination buttons
    attachPaginationListeners();
  }

  function attachPaginationListeners() {
    const prevBtn = document.querySelector('.pag-prev-btn');
    const nextBtn = document.querySelector('.pag-next-btn');
    
    if (prevBtn) {
      prevBtn.addEventListener('click', function(e) {
        e.preventDefault();
        loadPage(this.href);
      });
    }
    
    if (nextBtn) {
      nextBtn.addEventListener('click', function(e) {
        e.preventDefault();
        loadPage(this.href);
      });
    }
  }

  function loadPage(url) {
    loadingBar.classList.add('active');
    fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
      .then(r => r.text())
      .then(html => {
        siswaTable.innerHTML = html;
        
        // Extract and apply pagination data
        const paginationScript = siswaTable.querySelector('#paginationData');
        if (paginationScript) {
          const paginationData = JSON.parse(paginationScript.textContent);
          paginationScript.remove();
          updatePagination(paginationData);
        }
        
        loadingBar.classList.remove('active');
        const rows = siswaTable.querySelectorAll('tr').length;
        totalCount.textContent = rows + ' Siswa';
        
        // Scroll to table
        document.querySelector('.table-wrap').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      })
      .catch(err => {
        console.error('Error:', err);
        loadingBar.classList.remove('active');
      });
  }

  function fetchSiswa() {
    clearTimeout(timeout);
    loadingBar.classList.add('active');
    timeout = setTimeout(() => {
      const keyword = searchInput.value.trim();
      const kelas   = kelasFilter.value;
      let url = `/admin/siswa?search=${encodeURIComponent(keyword)}`;
      if (kelas) url += `&kelas=${encodeURIComponent(kelas)}`;
      loadPage(url);
    }, 300);
  }

  searchInput.addEventListener('keyup', fetchSiswa);
  kelasFilter.addEventListener('change', fetchSiswa);

  // Set initial count
  totalCount.textContent = document.querySelectorAll('#siswa-table tr').length + ' Siswa';
  
  // Attach pagination listeners on page load
  setTimeout(() => attachPaginationListeners(), 100);
</script>
@endsection