<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>GOPKL — Portal PKL Digital</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}

:root{
  --navy:#0B1F3A;
  --navy-2:#112845;
  --blue:#1B4FD8;
  --blue-mid:#2563EB;
  --blue-light:#EFF6FF;
  --blue-glow:rgba(37,99,235,0.18);
  --teal:#06B6D4;
  --teal-light:#ECFEFF;
  --amber:#F59E0B;
  --amber-light:#FFFBEB;
  --white:#FFFFFF;
  --gray-50:#F9FAFB;
  --gray-100:#F3F4F6;
  --gray-200:#E5E7EB;
  --gray-400:#9CA3AF;
  --gray-600:#4B5563;
  --gray-800:#1F2937;
  --font:'Plus Jakarta Sans',sans-serif;
  --radius:14px;
  --radius-lg:22px;
  --radius-xl:32px;
  --shadow:0 1px 3px rgba(11,31,58,0.07),0 6px 24px rgba(11,31,58,0.07);
  --shadow-lg:0 8px 40px rgba(11,31,58,0.15);
  --shadow-glow:0 0 0 1px rgba(37,99,235,0.12),0 8px 32px rgba(37,99,235,0.15);
}

body{font-family:var(--font);background:#FFFFFF;color:var(--gray-800);overflow-x:hidden}

/* ─── NOISE OVERLAY ─── */
body::before{
  content:'';position:fixed;inset:0;
  background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.025'/%3E%3C/svg%3E");
  pointer-events:none;z-index:1000;opacity:.4;
}

/* ─── NAV ─── */
nav{
  display:flex;align-items:center;justify-content:space-between;
  padding:0 clamp(20px,5vw,60px);height:68px;
  background:rgba(255,255,255,0.85);backdrop-filter:blur(16px);
  border-bottom:1px solid rgba(11,31,58,0.07);
  position:sticky;top:0;z-index:100;
}
.brand{display:flex;align-items:center;gap:11px;text-decoration:none}
.brand-icon{
  width:36px;height:36px;background:var(--navy);border-radius:9px;
  display:flex;align-items:center;justify-content:center;
  font-family:var(--font);font-weight:800;font-size:15px;color:#fff;
  position:relative;overflow:hidden;
}
.brand-icon::after{
  content:'';position:absolute;inset:0;
  background:linear-gradient(135deg,rgba(255,255,255,0.15) 0%,transparent 60%);
}
.brand-name{font-family:var(--font);font-weight:800;font-size:19px;color:var(--navy);letter-spacing:-.3px}
.brand-name em{color:var(--teal);font-style:normal}
.nav-links{display:flex;align-items:center;gap:32px}
.nav-link{
  font-size:14px;font-weight:500;color:var(--gray-600);text-decoration:none;
  transition:color .2s;letter-spacing:-.01em;
}
.nav-link:hover{color:var(--navy)}
.nav-right{display:flex;align-items:center;gap:12px}
.nav-btn{
  background:var(--navy);color:#fff;
  padding:10px 22px;border-radius:10px;
  font-family:var(--font);font-size:14px;font-weight:600;text-decoration:none;
  display:flex;align-items:center;gap:8px;
  transition:background .2s,transform .2s,box-shadow .2s;
  box-shadow:0 2px 8px rgba(11,31,58,0.2);
}
.nav-btn:hover{background:var(--blue);transform:translateY(-1px);box-shadow:0 6px 20px rgba(27,79,216,0.3)}

/* ─── HERO ─── */
.hero{
  min-height:calc(100vh - 68px);
  display:grid;grid-template-columns:1fr 1fr;
  align-items:center;gap:0;
  position:relative;overflow:hidden;
}

/* BG decorations */
.hero::before{
  content:'';position:absolute;
  top:-200px;right:-100px;
  width:700px;height:700px;
  background:radial-gradient(ellipse,rgba(6,182,212,0.08) 0%,transparent 70%);
  pointer-events:none;
}
.hero::after{
  content:'';position:absolute;
  bottom:-150px;left:-100px;
  width:500px;height:500px;
  background:radial-gradient(ellipse,rgba(27,79,216,0.06) 0%,transparent 70%);
  pointer-events:none;
}

/* Grid dots background */
.hero-bg-grid{
  position:absolute;inset:0;
  background-image:
    radial-gradient(circle,rgba(11,31,58,0.06) 1px,transparent 1px);
  background-size:32px 32px;
  pointer-events:none;
  -webkit-mask-image:radial-gradient(ellipse 80% 80% at 50% 50%,black 40%,transparent 100%);
  mask-image:radial-gradient(ellipse 80% 80% at 50% 50%,black 40%,transparent 100%);
}

.hero-left{
  padding:clamp(48px,10vh,96px) clamp(24px,5vw,72px) clamp(48px,10vh,96px) clamp(24px,5vw,72px);
  position:relative;z-index:2;
}

/* Pill badge */
.badge-pill{
  display:inline-flex;align-items:center;gap:8px;
  background:var(--teal-light);border:1px solid rgba(6,182,212,0.2);
  color:#0891B2;border-radius:100px;
  font-size:11.5px;font-weight:600;letter-spacing:.06em;text-transform:uppercase;
  padding:6px 14px;margin-bottom:28px;
  animation:fadeUp .7s ease-out .1s both;
}
.badge-dot{width:7px;height:7px;background:var(--teal);border-radius:50%;animation:pulse 2s infinite}

@keyframes pulse{0%,100%{transform:scale(1);opacity:1}50%{transform:scale(1.4);opacity:.5}}
@keyframes fadeUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
@keyframes fadeIn{from{opacity:0}to{opacity:1}}
@keyframes slideRight{from{opacity:0;transform:translateX(24px)}to{opacity:1;transform:translateX(0)}}
@keyframes scaleIn{from{opacity:0;transform:scale(.9)}to{opacity:1;transform:scale(1)}}
@keyframes floatA{0%,100%{transform:translateY(0) rotate(-1deg)}50%{transform:translateY(-12px) rotate(1deg)}}
@keyframes floatB{0%,100%{transform:translateY(0) rotate(1deg)}50%{transform:translateY(-8px) rotate(-1deg)}}
@keyframes shimmer{0%{background-position:200% 0}100%{background-position:-200% 0}}
@keyframes progressFill{from{width:0%}to{width:72%}}
@keyframes countUp{from{opacity:0;transform:translateY(8px)}to{opacity:1;transform:translateY(0)}}
@keyframes drawLine{from{stroke-dashoffset:1000}to{stroke-dashoffset:0}}
@keyframes blink{0%,100%{opacity:1}50%{opacity:.3}}

.hero-title{
  font-family:var(--font);
  font-size:clamp(36px,5.5vw,64px);
  font-weight:800;line-height:1.05;
  letter-spacing:-2px;
  color:var(--navy);
  margin-bottom:20px;
  animation:fadeUp .8s ease-out .2s both;
}
.hero-title .line-teal{
  color:var(--teal);
  position:relative;display:inline-block;
}
.hero-title .line-teal::after{
  content:'';position:absolute;
  bottom:-4px;left:0;right:0;
  height:3px;
  background:linear-gradient(90deg,var(--teal),var(--blue));
  border-radius:2px;
  animation:fadeIn .5s ease-out 1s both;
}
.hero-sub{
  font-size:clamp(14px,2vw,16.5px);
  color:var(--gray-600);
  line-height:1.75;
  max-width:440px;
  margin-bottom:36px;
  font-weight:400;
  animation:fadeUp .8s ease-out .3s both;
}
.hero-actions{
  display:flex;gap:12px;align-items:center;flex-wrap:wrap;
  animation:fadeUp .8s ease-out .4s both;
}
.btn-primary{
  background:var(--navy);color:#fff;
  padding:14px 28px;border-radius:var(--radius);
  font-family:var(--font);font-size:15px;font-weight:600;text-decoration:none;
  display:inline-flex;align-items:center;gap:9px;
  transition:background .2s,transform .2s,box-shadow .2s;
  box-shadow:0 4px 16px rgba(11,31,58,0.25);
}
.btn-primary:hover{background:var(--blue-mid);transform:translateY(-2px);box-shadow:0 8px 28px rgba(27,79,216,0.35)}
.btn-outline{
  border:1.5px solid var(--gray-200);color:var(--gray-600);
  padding:12px 24px;border-radius:var(--radius);
  font-family:var(--font);font-size:15px;font-weight:500;text-decoration:none;
  display:inline-flex;align-items:center;gap:9px;
  transition:all .2s;
}
.btn-outline:hover{border-color:var(--navy);color:var(--navy);transform:translateY(-1px)}

/* Stats bar */
.stats-bar{
  display:flex;margin-top:48px;
  border:1px solid var(--gray-200);border-radius:var(--radius);
  overflow:hidden;background:#fff;
  box-shadow:var(--shadow);
  animation:fadeUp .8s ease-out .5s both;
}
.stat-item{
  flex:1;padding:18px 20px;text-align:center;
  border-right:1px solid var(--gray-200);
}
.stat-item:last-child{border-right:none}
.stat-num{
  font-family:var(--font);font-size:clamp(22px,3vw,30px);
  font-weight:800;color:var(--navy);letter-spacing:-1px;
  animation:countUp .8s ease-out .6s both;
}
.stat-label{font-size:11px;color:var(--gray-400);margin-top:3px;font-weight:500;letter-spacing:.03em;text-transform:uppercase}

/* ─── HERO RIGHT — Visual Scene ─── */
.hero-right{
  position:relative;
  display:flex;align-items:center;justify-content:center;
  padding:40px 40px 40px 20px;
  z-index:2;
  animation:slideRight .9s ease-out .3s both;
}

/* Main mockup card */
.mockup-main{
  background:#fff;border:1px solid var(--gray-200);
  border-radius:var(--radius-xl);
  box-shadow:var(--shadow-lg),0 0 0 1px rgba(11,31,58,0.04);
  width:100%;max-width:440px;overflow:hidden;
  animation:floatA 6s ease-in-out infinite;
}

/* Browser chrome bar */
.browser-bar{
  background:var(--gray-50);border-bottom:1px solid var(--gray-200);
  padding:10px 14px;display:flex;align-items:center;gap:8px;
}
.browser-dots{display:flex;gap:5px}
.browser-dot{width:10px;height:10px;border-radius:50%}
.bd-r{background:#FF5F57}
.bd-y{background:#FEBC2E}
.bd-g{background:#28C840}
.browser-url{
  flex:1;background:var(--gray-100);border-radius:6px;
  padding:5px 10px;font-size:11px;color:var(--gray-400);margin-left:8px;
  display:flex;align-items:center;gap:5px;
}

/* App content */
.app-content{padding:20px}
.app-header{
  display:flex;align-items:center;justify-content:space-between;
  margin-bottom:16px;
}
.app-greeting{
  font-family:var(--font);
  font-size:14px;font-weight:800;color:var(--navy);
}
.app-greeting span{font-family:var(--font);font-weight:400;color:var(--gray-400);font-size:13px;display:block;margin-top:2px}
.notif-bell{
  width:34px;height:34px;background:var(--gray-50);border:1px solid var(--gray-200);
  border-radius:8px;display:flex;align-items:center;justify-content:center;
  color:var(--gray-600);font-size:13px;position:relative;cursor:pointer;
}
.notif-bell::after{
  content:'2';position:absolute;top:-4px;right:-4px;
  width:16px;height:16px;background:var(--teal);border-radius:50%;
  font-size:9px;font-weight:700;color:#fff;display:flex;align-items:center;justify-content:center;
  border:2px solid #fff;
}

/* Progress card */
.progress-card{
  background:linear-gradient(135deg,var(--navy) 0%,#1a3a6e 100%);
  border-radius:14px;padding:16px;margin-bottom:14px;position:relative;overflow:hidden;
}
.progress-card::before{
  content:'';position:absolute;top:-30px;right:-30px;
  width:120px;height:120px;background:rgba(6,182,212,0.15);border-radius:50%;
}
.pc-label{font-size:10px;color:rgba(255,255,255,.55);font-weight:600;letter-spacing:.06em;text-transform:uppercase;margin-bottom:6px}
.pc-company{font-family:var(--font);font-size:16px;font-weight:800;color:#fff;margin-bottom:4px}
.pc-period{font-size:11px;color:rgba(255,255,255,.55)}
.pc-progress{margin-top:14px}
.pc-progress-label{display:flex;justify-content:space-between;font-size:10px;color:rgba(255,255,255,.6);margin-bottom:6px;font-weight:500}
.pc-bar{height:5px;background:rgba(255,255,255,.15);border-radius:10px;overflow:hidden}
.pc-fill{
  height:100%;width:72%;
  background:linear-gradient(90deg,var(--teal),#67E8F9);
  border-radius:10px;
  animation:progressFill 1.2s ease-out .8s both;
}
.pc-steps{display:flex;gap:6px;margin-top:10px}
.pc-step{
  flex:1;height:3px;border-radius:2px;background:rgba(255,255,255,.15);
  transition:background .3s;
}
.pc-step.done{background:var(--teal)}
.pc-step.active{
  background:linear-gradient(90deg,var(--teal),rgba(255,255,255,.3));
  animation:shimmer 2s ease-in-out infinite;
  background-size:200% 100%;
}

/* Company list */
.section-label-small{
  font-size:10px;color:var(--gray-400);font-weight:600;letter-spacing:.08em;text-transform:uppercase;
  margin-bottom:10px;display:flex;align-items:center;justify-content:space-between;
}
.section-label-small a{color:var(--blue);text-decoration:none;text-transform:none;letter-spacing:0;font-size:10px}

.company-item{
  display:flex;align-items:center;gap:11px;
  padding:10px 11px;border-radius:10px;
  border:1px solid var(--gray-100);
  margin-bottom:8px;
  transition:all .2s;
  background:#fff;
  cursor:pointer;
}
.company-item:hover{border-color:var(--blue);background:var(--blue-light);transform:translateX(3px)}
.company-logo{
  width:36px;height:36px;border-radius:9px;
  display:flex;align-items:center;justify-content:center;
  font-size:14px;flex-shrink:0;
}
.cl-navy{background:var(--navy);color:#fff}
.cl-teal{background:var(--teal-light);color:var(--teal)}
.cl-amber{background:var(--amber-light);color:var(--amber)}
.company-item-info{flex:1}
.company-item-name{font-size:12px;font-weight:600;color:var(--navy)}
.company-item-sub{font-size:10px;color:var(--gray-400);margin-top:1px}
.quota-badge{
  font-size:10px;font-weight:700;
  padding:3px 8px;border-radius:100px;
}
.qb-green{background:#ECFDF5;color:#065F46}
.qb-amber{background:var(--amber-light);color:#92400E}

/* ─── FLOATING CARDS ─── */
.float-card-1{
  position:absolute;top:8%;right:-32px;
  background:#fff;border:1px solid var(--gray-200);
  border-radius:var(--radius);padding:13px 15px;
  box-shadow:var(--shadow-lg);
  width:196px;
  animation:floatB 5s ease-in-out infinite;
}
.fc-row{display:flex;align-items:center;gap:9px}
.fc-icon{width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:13px;flex-shrink:0}
.fc-icon-green{background:#ECFDF5;color:#10B981}
.fc-text{}
.fc-title{font-size:11px;font-weight:700;color:var(--navy)}
.fc-sub{font-size:10px;color:var(--gray-400);margin-top:1px}

.float-card-2{
  position:absolute;bottom:12%;left:-28px;
  background:var(--navy);border-radius:var(--radius);
  padding:13px 15px;
  box-shadow:0 8px 32px rgba(11,31,58,0.3);
  width:176px;
  animation:floatA 7s ease-in-out infinite 1s;
}
.fc2-num{font-family:var(--font);font-size:22px;font-weight:800;color:#fff}
.fc2-label{font-size:10px;color:rgba(255,255,255,.5);margin-top:2px;font-weight:500}
.fc2-trend{
  display:inline-flex;align-items:center;gap:4px;
  background:rgba(16,185,129,0.2);color:#34D399;
  font-size:10px;font-weight:700;padding:2px 8px;border-radius:100px;margin-top:8px;
}

/* ─── DIVIDER ─── */
.divider-wave{
  height:2px;
  background:linear-gradient(90deg,transparent 0%,var(--gray-200) 20%,var(--gray-200) 80%,transparent 100%);
  max-width:1200px;margin:0 auto;
}

/* ─── FEATURES ─── */
.section{padding:clamp(64px,10vh,104px) clamp(24px,5vw,72px);max-width:1400px;margin:0 auto}

.section-eyebrow{
  display:flex;align-items:center;gap:8px;
  font-size:11px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;
  color:var(--blue);margin-bottom:14px;
}
.section-eyebrow::before{content:'';width:28px;height:2px;background:var(--blue);border-radius:1px}

.section-heading{
  font-family:var(--font);
  font-size:clamp(28px,4vw,46px);font-weight:800;
  color:var(--navy);letter-spacing:-1.5px;
  line-height:1.1;margin-bottom:14px;
}
.section-sub{
  font-size:clamp(14px,1.8vw,16px);color:var(--gray-600);
  max-width:480px;line-height:1.7;
}

/* Feat grid */
.feat-grid{
  display:grid;grid-template-columns:repeat(3,1fr);gap:20px;
  margin-top:52px;
}
.feat-card{
  background:#fff;border:1px solid var(--gray-200);
  border-radius:var(--radius-lg);
  padding:28px 26px;
  transition:all .3s;
  position:relative;overflow:hidden;
}
.feat-card::before{
  content:'';position:absolute;inset:0;
  background:linear-gradient(135deg,var(--blue-light),transparent);
  opacity:0;transition:opacity .3s;
  pointer-events:none;
}
.feat-card:hover{
  border-color:rgba(27,79,216,0.2);
  transform:translateY(-5px);
  box-shadow:var(--shadow-glow);
}
.feat-card:hover::before{opacity:1}
.feat-icon-wrap{
  width:48px;height:48px;border-radius:12px;
  display:flex;align-items:center;justify-content:center;
  font-size:20px;margin-bottom:20px;
  position:relative;z-index:1;
}
.fi-navy{background:var(--navy);color:#fff}
.fi-teal{background:var(--teal-light);color:var(--teal)}
.fi-blue{background:var(--blue-light);color:var(--blue-mid)}
.fi-amber{background:var(--amber-light);color:var(--amber)}
.feat-card h3{
  font-family:var(--font);
  font-size:16px;font-weight:800;color:var(--navy);
  margin-bottom:9px;position:relative;z-index:1;
}
.feat-card p{
  font-size:13.5px;color:var(--gray-600);line-height:1.7;
  position:relative;z-index:1;
}

/* ─── PROCESS ─── */
.process-section{
  background:var(--navy);
  padding:clamp(64px,10vh,96px) clamp(24px,5vw,72px);
  position:relative;overflow:hidden;
}
.process-section::before{
  content:'';position:absolute;
  top:-200px;right:-100px;
  width:600px;height:600px;
  background:radial-gradient(ellipse,rgba(6,182,212,0.12) 0%,transparent 70%);
  pointer-events:none;
}
.process-inner{max-width:1200px;margin:0 auto}

.process-section .section-eyebrow{color:var(--teal)}
.process-section .section-eyebrow::before{background:var(--teal)}
.process-section .section-heading{color:#fff}
.process-section .section-sub{color:rgba(255,255,255,.55)}

.steps-grid{
  display:grid;grid-template-columns:repeat(4,1fr);gap:24px;
  margin-top:56px;position:relative;
}
/* connector line */
.steps-grid::before{
  content:'';position:absolute;
  top:28px;left:calc(12.5% + 14px);right:calc(12.5% + 14px);
  height:1px;
  background:repeating-linear-gradient(90deg,rgba(255,255,255,.15) 0px,rgba(255,255,255,.15) 8px,transparent 8px,transparent 16px);
}
.step-card{text-align:center;position:relative;z-index:1}
.step-num{
  width:56px;height:56px;border-radius:50%;
  background:rgba(255,255,255,.07);
  border:1px solid rgba(255,255,255,.15);
  display:flex;align-items:center;justify-content:center;
  margin:0 auto 20px;
  font-family:var(--font);
  font-size:18px;font-weight:800;color:#fff;
  position:relative;transition:all .3s;
}
.step-card:hover .step-num{
  background:var(--teal);border-color:var(--teal);
  transform:scale(1.1);
  box-shadow:0 0 0 8px rgba(6,182,212,0.15);
}
.step-card h4{font-family:var(--font);font-size:15px;font-weight:800;color:#fff;margin-bottom:9px}
.step-card p{font-size:13px;color:rgba(255,255,255,.5);line-height:1.65}

/* Step icon in num */
.step-icon{font-size:20px;margin-bottom:4px}

/* PKL journey illustration */
.journey-illus{
  display:flex;align-items:center;justify-content:center;
  gap:0;margin-top:52px;
  background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.08);
  border-radius:var(--radius-lg);padding:28px 36px;
}
.journey-milestone{
  flex:1;text-align:center;position:relative;
  padding:0 12px;
}
.jm-circle{
  width:48px;height:48px;border-radius:50%;
  display:flex;align-items:center;justify-content:center;
  margin:0 auto 10px;font-size:20px;
  position:relative;
}
.jm-done{background:rgba(16,185,129,0.2);color:#34D399;border:1.5px solid rgba(16,185,129,0.3)}
.jm-active{background:rgba(6,182,212,0.2);color:var(--teal);border:1.5px solid rgba(6,182,212,0.3);animation:pulse 2s infinite}
.jm-pending{background:rgba(255,255,255,.05);color:rgba(255,255,255,.3);border:1.5px solid rgba(255,255,255,.1)}
.jm-label{font-size:11px;color:rgba(255,255,255,.55);font-weight:500}
.jm-connector{
  width:48px;height:1px;
  background:rgba(255,255,255,.15);
  margin-top:-30px;
  flex-shrink:0;
}

/* ─── SVG ILLUSTRATIONS ─── */
.illus-section{
  padding:clamp(64px,10vh,96px) clamp(24px,5vw,72px);
  max-width:1400px;margin:0 auto;
  display:grid;grid-template-columns:1fr 1fr;
  align-items:center;gap:clamp(40px,6vw,80px);
}
.illus-visual{
  background:var(--blue-light);border-radius:var(--radius-xl);
  padding:40px;display:flex;align-items:center;justify-content:center;
  min-height:360px;position:relative;overflow:hidden;
}
.illus-visual::before{
  content:'';position:absolute;
  bottom:-60px;right:-60px;
  width:240px;height:240px;
  background:radial-gradient(ellipse,rgba(6,182,212,0.15) 0%,transparent 70%);
}

/* ─── ABOUT TEAM ─── */
.team-section{
  background:var(--gray-50);
  border-top:1px solid var(--gray-200);border-bottom:1px solid var(--gray-200);
  padding:clamp(64px,10vh,96px) clamp(24px,5vw,72px);
}
.team-inner{max-width:1200px;margin:0 auto}
.team-grid{
  display:grid;grid-template-columns:repeat(4,1fr);
  gap:24px;margin-top:52px;
}
.team-card{
  background:#fff;border:1px solid var(--gray-200);
  border-radius:var(--radius-lg);overflow:hidden;
  transition:all .3s;box-shadow:var(--shadow);
}
.team-card:hover{transform:translateY(-8px);box-shadow:var(--shadow-lg);border-color:rgba(6,182,212,0.25)}
.team-img{
  width:100%;height:220px;
  background:linear-gradient(135deg,var(--blue-light),var(--teal-light));
  display:flex;align-items:center;justify-content:center;
  overflow:hidden;
}
.team-img img{width:100%;height:100%;object-fit:cover}
.team-body{padding:20px 18px}
.team-name{font-family:var(--font);font-size:15px;font-weight:800;color:var(--navy);margin-bottom:3px}
.team-role{font-size:11px;color:var(--teal);font-weight:700;text-transform:uppercase;letter-spacing:.07em;margin-bottom:5px}
.team-nis{font-size:11px;color:var(--blue-mid);font-weight:600;margin-bottom:10px}
.team-desc{font-size:12px;color:var(--gray-600);line-height:1.65;margin-bottom:14px}
.team-socials{display:flex;gap:7px}
.ts-btn{
  flex:1;padding:8px;border-radius:8px;
  font-size:11px;font-weight:700;text-decoration:none;
  display:flex;align-items:center;justify-content:center;gap:5px;
  transition:all .2s;border:1px solid;
}
.ts-email{background:var(--navy);color:#fff;border-color:var(--navy)}
.ts-email:hover{background:var(--blue)}
.ts-wa{background:var(--teal-light);color:#0E7490;border-color:rgba(6,182,212,0.2)}
.ts-wa:hover{background:var(--teal);color:#fff;border-color:var(--teal)}

/* ─── CTA ─── */
.cta-section{
  padding:clamp(64px,10vh,96px) clamp(24px,5vw,72px);
  max-width:1400px;margin:0 auto;
}
.cta-box{
  background:var(--navy);
  border-radius:var(--radius-xl);
  padding:clamp(48px,8vh,72px) clamp(40px,6vw,80px);
  display:grid;grid-template-columns:1fr auto;
  align-items:center;gap:40px;
  position:relative;overflow:hidden;
}
.cta-box::before{
  content:'';position:absolute;
  top:-100px;right:-50px;
  width:400px;height:400px;
  background:radial-gradient(ellipse,rgba(6,182,212,0.15) 0%,transparent 70%);
  pointer-events:none;
}
/* PKL illustration dots */
.cta-dots{
  position:absolute;bottom:0;left:0;right:0;height:4px;
  background:linear-gradient(90deg,var(--teal),var(--blue-mid),var(--teal));
  background-size:200% 100%;
  animation:shimmer 3s ease-in-out infinite;
}
.cta-text{}
.cta-tag{
  display:inline-flex;align-items:center;gap:7px;
  background:rgba(6,182,212,0.15);border:1px solid rgba(6,182,212,0.2);
  color:var(--teal);font-size:11px;font-weight:700;letter-spacing:.07em;text-transform:uppercase;
  padding:5px 13px;border-radius:100px;margin-bottom:20px;
}
.cta-title{
  font-family:var(--font);font-size:clamp(26px,4vw,42px);
  font-weight:800;color:#fff;letter-spacing:-1px;line-height:1.1;
  margin-bottom:14px;
}
.cta-sub{font-size:15px;color:rgba(255,255,255,.55);line-height:1.65}
.cta-actions{display:flex;gap:12px;flex-wrap:wrap}
.btn-cta-white{
  background:#fff;color:var(--navy);
  padding:14px 28px;border-radius:var(--radius);
  font-family:var(--font);font-size:15px;font-weight:700;text-decoration:none;
  display:inline-flex;align-items:center;gap:9px;
  transition:all .2s;
  box-shadow:0 4px 16px rgba(0,0,0,0.15);
}
.btn-cta-white:hover{transform:translateY(-2px) scale(1.03);box-shadow:0 8px 28px rgba(0,0,0,0.22)}
.btn-cta-outline{
  background:transparent;color:rgba(255,255,255,.7);
  padding:13px 24px;border-radius:var(--radius);
  border:1.5px solid rgba(255,255,255,.15);
  font-family:var(--font);font-size:15px;font-weight:500;text-decoration:none;
  display:inline-flex;align-items:center;gap:9px;
  transition:all .2s;
}
.btn-cta-outline:hover{border-color:rgba(255,255,255,.4);color:#fff}

/* cta illustration */
.cta-illus{position:relative;z-index:1}
.cta-stats-card{
  background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.12);
  border-radius:16px;padding:24px 28px;text-align:center;
  min-width:160px;
}
.cta-stats-num{font-family:var(--font);font-size:36px;font-weight:800;color:#fff}
.cta-stats-label{font-size:12px;color:rgba(255,255,255,.45);margin-top:4px;text-transform:uppercase;letter-spacing:.06em}

/* ─── FOOTER ─── */
footer{
  background:#fff;border-top:1px solid var(--gray-200);
  padding:28px clamp(24px,5vw,72px);
  display:flex;align-items:center;justify-content:space-between;
  flex-wrap:wrap;gap:16px;
}
.footer-copy{font-size:13px;color:var(--gray-400)}
.footer-links{display:flex;gap:24px}
.footer-links a{font-size:13px;color:var(--gray-400);text-decoration:none;transition:color .2s}
.footer-links a:hover{color:var(--navy)}

/* ─── RESPONSIVE ─── */
@media(max-width:1024px){
  .hero{grid-template-columns:1fr}
  .hero-right{display:none}
  .feat-grid{grid-template-columns:repeat(2,1fr)}
  .steps-grid{grid-template-columns:repeat(2,1fr)}
  .steps-grid::before{display:none}
  .team-grid{grid-template-columns:repeat(2,1fr)}
  .illus-section{grid-template-columns:1fr}
  .cta-box{grid-template-columns:1fr}
  .cta-illus{display:none}
}
@media(max-width:640px){
  .hero-left{padding:40px 20px 56px}
  .stats-bar{flex-direction:column}
  .stat-item{border-right:none;border-bottom:1px solid var(--gray-200)}
  .stat-item:last-child{border-bottom:none}
  .feat-grid{grid-template-columns:1fr}
  .steps-grid{grid-template-columns:1fr}
  .team-grid{grid-template-columns:1fr}
  .nav-links{display:none}
  .journey-illus{flex-direction:column;gap:0}
  .jm-connector{display:none}
  .cta-box{padding:40px 24px}
}
</style>
</head>
<body>

<!-- NAV -->
<nav>
  <a href="/" class="brand">
    <div class="brand-icon">G</div>
    <span class="brand-name">GO<em>PKL</em></span>
  </a>
  <div class="nav-links">
    <a href="#fitur" class="nav-link">Fitur</a>
    <a href="#cara-kerja" class="nav-link">Cara Kerja</a>
    <a href="#tentang" class="nav-link">Tentang</a>
  </div>
  <div class="nav-right">
    <a href="{{ route('login') }}" class="nav-btn">
      <i class="fa-solid fa-right-to-bracket"></i> Masuk
    </a>
  </div>
</nav>

<!-- HERO -->
<section class="hero">
  <div class="hero-bg-grid"></div>

  <div class="hero-left">
    <div class="badge-pill">
      <span class="badge-dot"></span>
      Platform PKL Digital · SMK/SMA Indonesia
    </div>

    <h1 class="hero-title">
      Proses PKL<br>Lebih <span class="line-teal">Mudah</span><br>& Teratur
    </h1>

    <p class="hero-sub">
      Portal satu pintu untuk siswa SMK/SMA — temukan perusahaan, ajukan PKL, dan pantau statusnya secara real-time tanpa kertas.
    </p>

    <div class="hero-actions">
      <a href="{{ route('login') }}" class="btn-primary">
        Mulai PKL Sekarang <i class="fa-solid fa-arrow-right"></i>
      </a>
      <a href="#fitur" class="btn-outline">
        <i class="fa-solid fa-circle-play"></i> Lihat Fitur
      </a>
    </div>

    <div class="stats-bar">
      <div class="stat-item">
        <div class="stat-num">1.2K+</div>
        <div class="stat-label">Siswa Terdaftar</div>
      </div>
      <div class="stat-item">
        <div class="stat-num">85+</div>
        <div class="stat-label">Perusahaan Mitra</div>
      </div>
      <div class="stat-item">
        <div class="stat-num">98%</div>
        <div class="stat-label">Tingkat Kepuasan</div>
      </div>
    </div>
  </div>

  <!-- HERO VISUAL -->
  <div class="hero-right">
    <!-- Float card top right -->
    <div class="float-card-1">
      <div class="fc-row">
        <div class="fc-icon fc-icon-green"><i class="fa-solid fa-check"></i></div>
        <div class="fc-text">
          <div class="fc-title">Pengajuan Disetujui!</div>
          <div class="fc-sub">PT. Telkom Indonesia · barusan</div>
        </div>
      </div>
    </div>

    <!-- Main mockup -->
    <div class="mockup-main">
      <!-- Browser chrome -->
      <div class="browser-bar">
        <div class="browser-dots">
          <div class="browser-dot bd-r"></div>
          <div class="browser-dot bd-y"></div>
          <div class="browser-dot bd-g"></div>
        </div>
        <div class="browser-url">
          <i class="fa-solid fa-lock" style="font-size:9px;color:#9CA3AF"></i>
          gopkl.sch.id/dashboard
        </div>
      </div>

      <div class="app-content">
        <!-- Greeting -->
        <div class="app-header">
          <div class="app-greeting">
            Selamat pagi, Rizky 👋
            <span>Senin, 02 Juni 2026</span>
          </div>
          <div class="notif-bell"><i class="fa-solid fa-bell"></i></div>
        </div>

        <!-- My PKL Progress -->
        <div class="progress-card">
          <div class="pc-label">PKL Aktif Saya</div>
          <div class="pc-company">PT. Teknologi Nusantara</div>
          <div class="pc-period"><i class="fa-regular fa-calendar" style="margin-right:4px"></i>Jan – Mar 2026 · Software Developer</div>
          <div class="pc-progress">
            <div class="pc-progress-label">
              <span>Tahap Verifikasi</span>
              <span>72%</span>
            </div>
            <div class="pc-bar"><div class="pc-fill"></div></div>
          </div>
          <div class="pc-steps">
            <div class="pc-step done"></div>
            <div class="pc-step done"></div>
            <div class="pc-step done"></div>
            <div class="pc-step active"></div>
            <div class="pc-step"></div>
          </div>
        </div>

        <!-- Company list -->
        <div class="section-label-small">
          Lowongan Tersedia
          <a href="#">Lihat semua →</a>
        </div>

        <div class="company-item">
          <div class="company-logo cl-navy"><i class="fa-solid fa-laptop-code"></i></div>
          <div class="company-item-info">
            <div class="company-item-name">PT. Cipta Digital</div>
            <div class="company-item-sub">Networking · Kota Malang</div>
          </div>
          <div class="quota-badge qb-green">4 kuota</div>
        </div>

        <div class="company-item">
          <div class="company-logo cl-teal"><i class="fa-solid fa-server"></i></div>
          <div class="company-item-info">
            <div class="company-item-name">CV. Inovasi Solusi</div>
            <div class="company-item-sub">Backend Dev · Surabaya</div>
          </div>
          <div class="quota-badge qb-amber">2 kuota</div>
        </div>

        <div class="company-item">
          <div class="company-logo cl-amber"><i class="fa-solid fa-palette"></i></div>
          <div class="company-item-info">
            <div class="company-item-name">Studio Kreasi.id</div>
            <div class="company-item-sub">UI/UX Design · Remote</div>
          </div>
          <div class="quota-badge qb-green">6 kuota</div>
        </div>
      </div>
    </div>

    <!-- Float card bottom left -->
    <div class="float-card-2">
      <div class="fc2-num">237</div>
      <div class="fc2-label">Pengajuan bulan ini</div>
      <div class="fc2-trend"><i class="fa-solid fa-arrow-trend-up" style="font-size:9px"></i> +18% dari bulan lalu</div>
    </div>
  </div>
</section>

<div class="divider-wave"></div>

<!-- FEATURES -->
<section class="section" id="fitur">
  <div class="section-eyebrow">Fitur Unggulan</div>
  <h2 class="section-heading">Semua yang Kamu<br>Butuhkan untuk PKL</h2>
  <p class="section-sub">Dari pencarian perusahaan hingga laporan akhir — satu platform yang menyelesaikan semuanya.</p>

  <div class="feat-grid">
    <div class="feat-card">
      <div class="feat-icon-wrap fi-navy"><i class="fa-solid fa-magnifying-glass"></i></div>
      <h3>Cari Perusahaan</h3>
      <p>Telusuri ratusan mitra perusahaan terverifikasi. Filter berdasarkan bidang keahlian, kota, dan kuota tersedia.</p>
    </div>
    <div class="feat-card">
      <div class="feat-icon-wrap fi-teal"><i class="fa-solid fa-paper-plane"></i></div>
      <h3>Pengajuan Online</h3>
      <p>Kirim lamaran PKL tanpa surat fisik. Semua dokumen digital, proses persetujuan lebih cepat dan transparan.</p>
    </div>
    <div class="feat-card">
      <div class="feat-icon-wrap fi-blue"><i class="fa-solid fa-chart-line"></i></div>
      <h3>Pantau Real-time</h3>
      <p>Lacak status pengajuan kapan saja. Notifikasi otomatis untuk setiap perubahan — tidak ada yang terlewat.</p>
    </div>
    <div class="feat-card">
      <div class="feat-icon-wrap fi-amber"><i class="fa-solid fa-shield-halved"></i></div>
      <h3>Terverifikasi & Aman</h3>
      <p>Seluruh perusahaan diverifikasi sekolah. Data siswa dilindungi dengan sistem keamanan berlapis.</p>
    </div>
    <div class="feat-card">
      <div class="feat-icon-wrap fi-teal"><i class="fa-solid fa-users"></i></div>
      <h3>Multi Peran</h3>
      <p>Dasbor khusus untuk siswa, guru pembimbing, dan admin sekolah. Setiap peran mendapat akses yang tepat.</p>
    </div>
    <div class="feat-card">
      <div class="feat-icon-wrap fi-navy"><i class="fa-solid fa-file-export"></i></div>
      <h3>Laporan & Export</h3>
      <p>Buat rekap PKL otomatis. Export ke PDF atau Excel untuk kebutuhan administrasi sekolah.</p>
    </div>
  </div>
</section>

<div class="divider-wave"></div>

<!-- PROCESS with PKL Journey -->
<section class="process-section" id="cara-kerja">
  <div class="process-inner">
    <div class="section-eyebrow">Cara Kerja</div>
    <h2 class="section-heading">4 Langkah Mudah<br>Mulai PKL Digital</h2>
    <p class="section-sub">Proses yang simpel dan terstruktur dari pendaftaran hingga PKL selesai.</p>

    <div class="steps-grid">
      <div class="step-card">
        <div class="step-num"><i class="fa-solid fa-user-plus"></i></div>
        <h4>Daftar Akun</h4>
        <p>Login dengan NIS atau username yang diberikan oleh pihak sekolah. Gratis untuk semua siswa.</p>
      </div>
      <div class="step-card">
        <div class="step-num"><i class="fa-solid fa-building-user"></i></div>
        <h4>Pilih Perusahaan</h4>
        <p>Jelajahi daftar mitra dan pilih perusahaan yang sesuai dengan jurusan dan minatmu.</p>
      </div>
      <div class="step-card">
        <div class="step-num"><i class="fa-solid fa-file-signature"></i></div>
        <h4>Ajukan PKL</h4>
        <p>Kirim pengajuan secara online. Guru pembimbing dan admin akan memverifikasi secara digital.</p>
      </div>
      <div class="step-card">
        <div class="step-num"><i class="fa-solid fa-graduation-cap"></i></div>
        <h4>Mulai PKL</h4>
        <p>Setelah disetujui, mulai PKL-mu! Pantau progres dan laporan langsung dari portal.</p>
      </div>
    </div>

    <!-- PKL Journey Timeline -->
    <div class="journey-illus">
      <div class="journey-milestone">
        <div class="jm-circle jm-done"><i class="fa-solid fa-check" style="font-size:16px"></i></div>
        <div class="jm-label">Pendaftaran</div>
      </div>
      <div class="jm-connector"></div>
      <div class="journey-milestone">
        <div class="jm-circle jm-done"><i class="fa-solid fa-check" style="font-size:16px"></i></div>
        <div class="jm-label">Pemilihan Tempat</div>
      </div>
      <div class="jm-connector"></div>
      <div class="journey-milestone">
        <div class="jm-circle jm-done"><i class="fa-solid fa-check" style="font-size:16px"></i></div>
        <div class="jm-label">Pengajuan</div>
      </div>
      <div class="jm-connector"></div>
      <div class="journey-milestone">
        <div class="jm-circle jm-active"><i class="fa-solid fa-hourglass-half" style="font-size:14px"></i></div>
        <div class="jm-label">Verifikasi</div>
      </div>
      <div class="jm-connector"></div>
      <div class="journey-milestone">
        <div class="jm-circle jm-pending"><i class="fa-solid fa-briefcase" style="font-size:14px"></i></div>
        <div class="jm-label">Pelaksanaan PKL</div>
      </div>
      <div class="jm-connector"></div>
      <div class="journey-milestone">
        <div class="jm-circle jm-pending"><i class="fa-solid fa-file-lines" style="font-size:14px"></i></div>
        <div class="jm-label">Laporan Akhir</div>
      </div>
    </div>
  </div>
</section>

<!-- ABOUT -->
<section class="team-section" id="tentang">
  <div class="team-inner">
    <div class="section-eyebrow">Tim Kami</div>
    <h2 class="section-heading">Tentang Tim GOPKL</h2>
    <p class="section-sub">Kami adalah tim siswa yang membangun solusi digital untuk memudahkan proses PKL bagi seluruh siswa SMK/SMA di Indonesia.</p>

    <div class="team-grid">
      <div class="team-card">
        <div class="team-img">
          <img src="{{ asset('image/team/irfan.jpg') }}" alt="M. Irfan Mushtofa">
        </div>
        <div class="team-body">
          <div class="team-name">M. Irfan Mushtofa</div>
          <div class="team-role">Project Documentation Assistant</div>
          <div class="team-nis">NIS: 18433/107/065</div>
          <p class="team-desc">Mengelola proyek dan koordinasi tim untuk memastikan setiap fitur berjalan optimal.</p>
          <div class="team-socials">
            <a href="mailto:irfan@gopkl.com" class="ts-btn ts-email"><i class="fa-solid fa-envelope"></i> Email</a>
            <a href="https://wa.me/6281234567890" target="_blank" class="ts-btn ts-wa"><i class="fa-brands fa-whatsapp"></i> WA</a>
          </div>
        </div>
      </div>

      <div class="team-card">
        <div class="team-img">
          <img src="{{ asset('image/team/nafisa.jpg') }}" alt="Nafisa Ramadhani">
        </div>
        <div class="team-body">
          <div class="team-name">Nafisa Ramadhani</div>
          <div class="team-role">Presentation Designerr</div>
          <div class="team-nis">NIS: 18440/114/065</div>
          <p class="team-desc">Mengembangkan sistem backend yang aman dan scalable untuk GOPKL.</p>
          <div class="team-socials">
            <a href="mailto:nafisa@gopkl.com" class="ts-btn ts-email"><i class="fa-solid fa-envelope"></i> Email</a>
            <a href="https://wa.me/6281234567891" target="_blank" class="ts-btn ts-wa"><i class="fa-brands fa-whatsapp"></i> WA</a>
          </div>
        </div>
      </div>

      <div class="team-card">
        <div class="team-img">
          <img src="{{ asset('image/team/sofi.jpg') }}" alt="Sofi Wulandari">
        </div>
        <div class="team-body">
          <div class="team-name">Sofi Wulandari</div>
          <div class="team-role">Documentation Analyst</div>
          <div class="team-nis">NIS: 18456/132/065</div>
          <p class="team-desc">Merancang interface yang intuitif dan pengalaman pengguna yang menyenangkan.</p>
          <div class="team-socials">
            <a href="mailto:sofi@gopkl.com" class="ts-btn ts-email"><i class="fa-solid fa-envelope"></i> Email</a>
            <a href="https://wa.me/6281234567892" target="_blank" class="ts-btn ts-wa"><i class="fa-brands fa-whatsapp"></i> WA</a>
          </div>
        </div>
      </div>

      <div class="team-card">
        <div class="team-img">
          <img src="{{ asset('image/team/yan.jpg') }}" alt="Yan Ardiansyah">
        </div>
        <div class="team-body">
          <div class="team-name">Yan Ardiansyah</div>
          <div class="team-role">Full Stack Web Developer</div>
          <div class="team-nis">NIS: 18461/136/065</div>
          <p class="team-desc">Menganalisis kebutuhan dan mengoptimalkan strategi untuk pertumbuhan platform.</p>
          <div class="team-socials">
            <a href="mailto:yan@gopkl.com" class="ts-btn ts-email"><i class="fa-solid fa-envelope"></i> Email</a>
            <a href="https://wa.me/6281234567893" target="_blank" class="ts-btn ts-wa"><i class="fa-brands fa-whatsapp"></i> WA</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-section">
  <div class="cta-box">
    <div class="cta-dots"></div>
    <div class="cta-text">
      <div class="cta-tag"><span class="badge-dot" style="background:var(--teal)"></span> Gratis untuk semua siswa</div>
      <h2 class="cta-title">Siap Memulai<br>Perjalanan PKL-mu?</h2>
      <p class="cta-sub">Bergabung dengan 1.200+ siswa yang sudah menggunakan GOPKL.<br>Proses lebih cepat, transparan, dan bebas kertas.</p>
      <div class="cta-actions" style="margin-top:28px">
        <a href="{{ route('login') }}" class="btn-cta-white">
          Masuk Sekarang <i class="fa-solid fa-arrow-right"></i>
        </a>
        <a href="#fitur" class="btn-cta-outline">
          <i class="fa-solid fa-circle-question"></i> Pelajari Lebih
        </a>
      </div>
    </div>
    <div class="cta-illus">
      <div class="cta-stats-card">
        <div class="cta-stats-num">85+</div>
        <div class="cta-stats-label">Perusahaan Mitra</div>
        <div style="margin-top:16px;display:flex;flex-direction:column;gap:8px">
          <div style="display:flex;justify-content:space-between;font-size:11px;color:rgba(255,255,255,.4)"><span>IT & Software</span><span style="color:var(--teal)">38</span></div>
          <div style="height:4px;background:rgba(255,255,255,.08);border-radius:2px;overflow:hidden"><div style="width:45%;height:100%;background:var(--teal);border-radius:2px"></div></div>
          <div style="display:flex;justify-content:space-between;font-size:11px;color:rgba(255,255,255,.4)"><span>Networking</span><span style="color:#67E8F9">26</span></div>
          <div style="height:4px;background:rgba(255,255,255,.08);border-radius:2px;overflow:hidden"><div style="width:31%;height:100%;background:#67E8F9;border-radius:2px"></div></div>
          <div style="display:flex;justify-content:space-between;font-size:11px;color:rgba(255,255,255,.4)"><span>Design & Media</span><span style="color:var(--amber)">21</span></div>
          <div style="height:4px;background:rgba(255,255,255,.08);border-radius:2px;overflow:hidden"><div style="width:25%;height:100%;background:var(--amber);border-radius:2px"></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <a href="/" class="brand">
    <div class="brand-icon">G</div>
    <span class="brand-name">GO<em>PKL</em></span>
  </a>
  <span class="footer-copy">© 2026 GOPKL · Portal PKL Digital Indonesia</span>
  <div class="footer-links">
    <a href="#">Tentang</a>
    <a href="#">Kebijakan</a>
    <a href="#">Kontak</a>
  </div>
</footer>

</body>
</html>