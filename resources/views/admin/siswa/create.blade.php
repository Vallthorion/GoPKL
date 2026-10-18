@extends('layouts.app')
@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

        :root {
            --blue: #1E3A5F;
            --blue-mid: #2C5282;
            --blue-light: #EBF4FF;
            --teal: #2A9D8F;
            --teal-light: #E6F7F5;
            --white: #FFFFFF;
            --gray-50: #F8FAFC;
            --gray-100: #F0F4F8;
            --gray-200: #E2E8F0;
            --gray-400: #94A3B8;
            --gray-600: #475569;
            --gray-800: #1E293B;
            --amber: #D97706;
            --amber-light: #FFFBEB;
            --red: #DC2626;
            --red-light: #FFF5F5;
            --green: #16A34A;
            --green-light: #F0FDF4;
            --font: 'Plus Jakarta Sans', sans-serif;
            --radius: 10px;
            --radius-lg: 16px;
            --shadow: 0 1px 3px rgba(30, 58, 95, 0.06), 0 4px 12px rgba(30, 58, 95, 0.05);
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        body {
            font-family: var(--font);
            background: var(--gray-50);
            color: var(--gray-800);
            min-height: 100vh
        }

        .wrapper {
            display: flex;
            min-height: 100vh
        }

        /* ── SIDEBAR ── */
        .sidebar {
            width: clamp(200px, 15vw, 240px);
            flex-shrink: 0;
            background: var(--white);
            border-right: 1.5px solid var(--gray-200);
            display: flex;
            flex-direction: column;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar-logo-wrap {
            padding: clamp(14px, 2vh, 20px) clamp(14px, 2vw, 20px) 0;
            border-bottom: 1.5px solid var(--gray-200)
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 9px;
            text-decoration: none;
            padding-bottom: 18px
        }

        .logo-icon {
            width: clamp(28px, 5vw, 32px);
            height: clamp(28px, 5vw, 32px);
            background: var(--blue);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: clamp(11px, 1.5vw, 13px);
            color: var(--white);
            flex-shrink: 0;
        }

        .logo-name {
            font-weight: 800;
            font-size: clamp(13px, 2vw, 16px);
            color: var(--blue)
        }

        .logo-name span {
            color: var(--teal)
        }

        .admin-profile {
            margin: clamp(12px, 2vh, 16px) clamp(12px, 2vw, 16px) clamp(14px, 2.5vh, 20px);
            background: var(--white);
            border: 1.5px solid var(--gray-200);
            border-radius: 14px;
            padding: clamp(10px, 1.5vh, 14px) clamp(10px, 1.5vw, 16px);
            display: flex;
            align-items: center;
            gap: clamp(8px, 1.5vw, 12px);
            box-shadow: 0 1px 3px rgba(30, 58, 95, .06);
        }

        .admin-avatar {
            width: clamp(36px, 6vw, 42px);
            height: clamp(36px, 6vw, 42px);
            border-radius: 14px;
            flex-shrink: 0;
            background: linear-gradient(135deg, var(--blue), var(--teal));
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: clamp(12px, 1.5vw, 15px);
            color: var(--white);
        }

        .admin-name {
            font-size: clamp(11px, 1.8vw, 13px);
            font-weight: 800;
            color: var(--blue)
        }

        .admin-role {
            font-size: clamp(9px, 1.2vw, 11px);
            color: var(--gray-400);
            margin-top: 2px
        }

        .nav-section {
            padding: 0 12px
        }

        .nav-label {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .09em;
            color: var(--gray-400);
            text-transform: uppercase;
            padding: 0 6px;
            margin-bottom: 5px;
            margin-top: 16px;
            display: block;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 1px;
            margin-bottom: 8px
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 10px;
            border-radius: 9px;
            color: var(--gray-600);
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            transition: all .15s;
        }

        .menu a:hover {
            background: var(--gray-100);
            color: var(--gray-800)
        }

        .menu a.active {
            background: var(--blue-light);
            color: var(--blue);
            font-weight: 700
        }

        .menu a i {
            width: 15px;
            text-align: center;
            font-size: 12px;
            flex-shrink: 0
        }

        .menu-divider {
            height: 1.5px;
            background: var(--gray-200);
            margin: 10px 12px
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 14px 12px;
            border-top: 1.5px solid var(--gray-200)
        }

        .logout-btn {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 9px 10px;
            border-radius: 9px;
            background: var(--red-light);
            border: 1.5px solid #FED7D7;
            color: var(--red);
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            font-family: var(--font);
            transition: all .15s;
        }

        .logout-btn:hover {
            background: #FED7D7
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 2px;
            padding-bottom: 16px
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: var(--radius);
            color: var(--gray-600);
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            transition: all .15s
        }

        .menu a:hover {
            background: var(--gray-100);
            color: var(--gray-800)
        }

        .menu a.active {
            background: var(--blue-light);
            color: var(--blue);
            font-weight: 700
        }

        .menu a i {
            width: 16px;
            text-align: center;
            font-size: 13px
        }

        .menu-divider {
            height: 1.5px;
            background: var(--gray-200);
            margin: 8px 20px
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 16px 20px;
            border-top: 1.5px solid var(--gray-200)
        }

        .logout-btn {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 10px 12px;
            border-radius: var(--radius);
            background: var(--red-light);
            border: 1.5px solid #FED7D7;
            color: var(--red);
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            font-family: var(--font);
            transition: all .15s
        }

        .logout-btn:hover {
            background: #FED7D7
        }

        /* ── MAIN ── */
        .main {
            flex: 1;
            min-width: 0;
            background: linear-gradient(135deg, rgba(229, 243, 255, 0.3), rgba(230, 247, 245, 0.2))
        }

        .main-inner {
            padding: clamp(24px, 4vh, 36px) clamp(20px, 3.5vw, 40px) clamp(48px, 8vh, 64px);
            max-width: 1000px;
        }

        /* PAGE HEADER */
        .page-header {
            margin-bottom: clamp(24px, 4.5vh, 32px);
            animation: fadeUp .4s ease-out both
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: var(--gray-500);
            font-size: clamp(12px, 1.5vw, 13px);
            text-decoration: none;
            margin-bottom: clamp(12px, 2vh, 16px);
            transition: color .2s;
            font-weight: 500;
        }

        .back-link:hover {
            color: var(--teal)
        }

        .page-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: linear-gradient(135deg, rgba(42, 157, 143, 0.1), rgba(42, 157, 143, 0.05));
            color: var(--teal);
            font-size: clamp(9px, 1.2vw, 11px);
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
            padding: clamp(4px, 0.8vh, 5px) clamp(10px, 1.8vw, 14px);
            border-radius: 100px;
            margin-bottom: clamp(8px, 1.5vh, 12px);
            border: 1px solid rgba(42, 157, 143, 0.2);
        }

        .page-title {
            font-size: clamp(22px, 4.5vw, 28px);
            font-weight: 800;
            color: var(--blue);
            letter-spacing: -.6px;
            line-height: 1.15;
        }

        .page-sub {
            font-size: clamp(13px, 2vw, 15px);
            color: var(--gray-600);
            margin-top: clamp(4px, 1vh, 6px);
            line-height: 1.6;
        }

        /* FORM CARD */
        .form-card {
            background: var(--white);
            border: 1.5px solid var(--gray-200);
            border-radius: var(--radius-lg);
            padding: clamp(20px, 3vh, 32px);
            animation: fadeUp .4s ease-out .1s both;
            box-shadow: 0 2px 8px rgba(30, 58, 95, 0.06);
        }

        /* FORM SECTIONS */
        .form-section-title {
            font-size: clamp(10px, 1.3vw, 12px);
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--blue);
            margin-bottom: clamp(14px, 2.5vh, 20px);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-section-title::before {
            content: '';
            width: 24px;
            height: 24px;
            border-radius: 8px;
            background: var(--blue-light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            flex-shrink: 0;
        }

        .form-divider {
            height: 1.5px;
            background: linear-gradient(90deg, var(--gray-200), transparent);
            margin: clamp(18px, 3.5vh, 28px) 0
        }

        /* FIELD */
        .field {
            margin-bottom: clamp(16px, 3vh, 24px)
        }

        .field label {
            display: block;
            font-size: clamp(10px, 1.3vw, 12px);
            font-weight: 700;
            letter-spacing: .05em;
            color: var(--blue);
            margin-bottom: clamp(7px, 1.2vh, 10px);
            text-transform: uppercase;
        }

        .input-wrap {
            position: relative
        }

        .input-wrap i {
            position: absolute;
            left: clamp(10px, 1.5vw, 12px);
            top: 50%;
            transform: translateY(-50%);
            color: var(--teal);
            font-size: clamp(12px, 1.6vw, 14px);
            pointer-events: none;
            transition: color .2s;
        }

        .input-wrap input,
        .input-wrap select {
            width: 100%;
            padding: clamp(10px, 1.7vh, 12px) clamp(11px, 1.7vw, 13px) clamp(10px, 1.7vh, 12px) clamp(38px, 6vw, 42px);
            background: var(--gray-50);
            border: 1.5px solid var(--gray-200);
            border-radius: var(--radius);
            font-size: clamp(13px, 1.6vw, 14px);
            color: var(--gray-800);
            font-family: var(--font);
            outline: none;
            transition: border-color .2s, box-shadow .2s, background .2s;
            appearance: none;
        }

        .input-wrap select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6'%3E%3Cpath d='M0 0l5 6 5-6z' fill='%232A9D8F'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: calc(100% - 12px) center;
            background-color: var(--gray-50);
            padding-right: 36px;
        }

        .input-wrap input::placeholder {
            color: var(--gray-400)
        }

        .input-wrap input:focus,
        .input-wrap select:focus {
            border-color: var(--teal);
            box-shadow: 0 0 0 3px rgba(42, 157, 143, 0.12);
            background: var(--white);
        }

        .input-wrap:focus-within i {
            color: var(--teal)
        }

        .input-wrap select option {
            background: var(--white);
            color: var(--gray-800)
        }

        /* 2-COL */
        .field-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: clamp(12px, 2vw, 16px)
        }

        /* HINT */
        .field-hint {
            font-size: clamp(10px, 1.3vw, 12px);
            color: var(--gray-500);
            margin-top: clamp(6px, 1vh, 8px);
            line-height: 1.5;
        }

        /* ACTIONS */
        .form-actions {
            display: flex;
            gap: clamp(10px, 2vw, 14px);
            margin-top: clamp(24px, 4vh, 32px);
            padding-top: clamp(18px, 3vh, 24px);
            border-top: 1.5px solid var(--gray-200);
        }

        .btn-submit {
            flex: 1;
            padding: clamp(11px, 2vh, 14px);
            background: linear-gradient(135deg, var(--teal), #1f8876);
            color: var(--white);
            border: none;
            border-radius: var(--radius);
            font-size: clamp(13px, 1.6vw, 14px);
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            transition: all .2s;
            box-shadow: 0 4px 12px rgba(42, 157, 143, 0.25);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(42, 157, 143, 0.35);
        }

        .btn-submit:active {
            transform: translateY(0)
        }

        .btn-cancel {
            padding: clamp(11px, 2vh, 14px) clamp(16px, 3vw, 20px);
            background: var(--white);
            border: 1.5px solid var(--gray-200);
            border-radius: var(--radius);
            color: var(--gray-600);
            font-size: clamp(13px, 1.6vw, 14px);
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all .2s;
        }

        .btn-cancel:hover {
            border-color: var(--teal);
            color: var(--teal);
            background: rgba(42, 157, 143, 0.05);
            transform: translateY(-1px);
        }

        /* ERROR BOX */
        .err-box {
            background: linear-gradient(135deg, #FFF5F5, #FFEBEE);
            border: 1.5px solid #FED7D7;
            border-radius: var(--radius);
            padding: clamp(12px, 2vh, 16px) clamp(14px, 2.5vw, 18px);
            font-size: clamp(12px, 1.5vw, 13px);
            color: var(--red);
            margin-bottom: clamp(16px, 3vh, 24px);
            display: flex;
            align-items: flex-start;
            gap: clamp(10px, 1.5vw, 12px);
            animation: slideDown .3s ease-out;
        }

        .err-box i {
            margin-top: 2px;
            flex-shrink: 0;
            font-size: 14px
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        /* FORM DIVIDER & SECTION TITLE */
        .form-divider {
            height: 1.5px;
            background: var(--gray-200);
            margin: clamp(20px, 3vh, 28px) 0;
        }

        .form-section-title {
            font-size: clamp(13px, 1.5vw, 14px);
            font-weight: 700;
            color: var(--blue);
            margin-bottom: clamp(12px, 2vh, 16px);
            letter-spacing: -.3px;
        }

        .field-hint {
            font-size: clamp(11px, 1.2vw, 12px);
            color: var(--gray-500);
            margin-top: clamp(4px, 1vh, 6px);
            line-height: 1.4;
        }

        /* TOAST NOTIFICATIONS */
        .toast-container {
            position: fixed;
            top: clamp(16px, 2vw, 24px);
            right: clamp(16px, 2vw, 24px);
            z-index: 99999;
            display: flex;
            flex-direction: column;
            gap: clamp(10px, 1.5vw, 12px);
            max-width: clamp(280px, 90vw, 400px);
            pointer-events: none;
        }

        .toast {
            display: flex;
            align-items: flex-start;
            gap: clamp(10px, 1.5vw, 12px);
            padding: clamp(12px, 2vh, 16px) clamp(14px, 2.5vw, 18px);
            border-radius: var(--radius);
            font-size: clamp(12px, 1.5vw, 13px);
            font-weight: 600;
            animation: toastSlideIn .3s ease-out;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(10px);
            pointer-events: auto;
        }

        .toast.success {
            background: linear-gradient(135deg, #10b981, #059669);
            color: var(--white);
            border: 1.5px solid rgba(16, 185, 129, 0.3);
        }

        .toast.error {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: var(--white);
            border: 1.5px solid rgba(239, 68, 68, 0.3);
        }

        .toast.info {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: var(--white);
            border: 1.5px solid rgba(59, 130, 246, 0.3);
        }

        .toast.warning {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: var(--white);
            border: 1.5px solid rgba(245, 158, 11, 0.3);
        }

        .toast-icon {
            font-size: clamp(14px, 1.8vw, 16px);
            flex-shrink: 0;
            margin-top: 2px;
        }

        .toast-content {
            flex: 1;
            line-height: 1.5;
        }

        .toast-close {
            font-size: clamp(12px, 1.5vw, 14px);
            cursor: pointer;
            opacity: 0.7;
            transition: opacity .2s;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .toast-close:hover {
            opacity: 1
        }

        @keyframes toastSlideIn {
            from {
                opacity: 0;
                transform: translateX(clamp(20px, 3vw, 30px));
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes toastSlideOut {
            from {
                opacity: 1;
                transform: translateX(0);
            }

            to {
                opacity: 0;
                transform: translateX(clamp(20px, 3vw, 30px));
            }
        }

        .toast.hide {
            animation: toastSlideOut .3s ease-out forwards
        }

        /* ──────────────────────────── RESPONSIVE DESIGN ───────────────────────────── */

        /* Extra Small (360px - 480px) */
        @media(max-width:480px) {
            .sidebar {
                display: none
            }

            .main-inner {
                padding: clamp(12px, 3vh, 20px) clamp(12px, 3vw, 16px) 30px
            }

            .page-header {
                margin-bottom: 16px
            }

            .page-tag {
                font-size: 9px;
                padding: 3px 9px
            }

            .page-title {
                font-size: clamp(18px, 4vw, 22px)
            }

            .page-sub {
                font-size: 12px
            }

            .form-card {
                border-radius: 12px;
                padding: 16px
            }

            .form-section-title {
                font-size: 9px
            }

            .field label {
                font-size: 10px
            }

            .field {
                margin-bottom: 14px
            }

            .input-wrap input,
            .input-wrap select {
                padding: 10px 12px 10px 36px;
                font-size: 12px
            }

            .field-row {
                grid-template-columns: 1fr;
                gap: 12px
            }

            .form-divider {
                margin: 16px 0
            }

            .form-actions {
                flex-direction: column;
                gap: 8px
            }

            .btn-submit,
            .btn-cancel {
                width: 100%;
                padding: 10px
            }

            .err-box {
                font-size: 12px;
                padding: 10px 12px
            }
        }

        /* Small (481px - 768px) */
        @media(min-width:481px) and (max-width:768px) {
            .sidebar {
                display: none
            }

            .main-inner {
                padding: 20px 16px 40px
            }

            .page-title {
                font-size: clamp(20px, 4vw, 24px)
            }

            .page-sub {
                font-size: 13px
            }

            .form-card {
                padding: 20px
            }

            .field-row {
                grid-template-columns: 1fr
            }
        }

        /* Tablet (769px - 1024px) */
        @media(min-width:769px) and (max-width:1024px) {
            .sidebar {
                width: 200px
            }

            .main-inner {
                padding: 24px 20px 40px
            }

            .page-title {
                font-size: 24px
            }
        }

        /* Desktop (1025px+) */
        @media(min-width:1025px) {
            .main-inner {
                max-width: 900px
            }
        }
    </style>

    <div class="wrapper">

        <!-- TOAST CONTAINER -->
        <div class="toast-container" id="toastContainer"></div>

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
                    {{ strtoupper(substr(Auth::user()->name ?? (Auth::user()->username ?? 'A'), 0, 1)) }}
                </div>
                <div>
                    <div class="admin-name">{{ Auth::user()->name ?? (Auth::user()->username ?? 'Admin') }}</div>
                    <div class="admin-role">Administrator</div>
                </div>
            </div>

            <div class="nav-section">
                <span class="nav-label">Menu Utama</span>
                <div class="menu">
                    <a href="{{ route('admin.dashboard') }}"
                        class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-chart-pie"></i> Dashboard
                    </a>
                    <a href="{{ route('admin.siswa.index') }}"
                        class="{{ request()->routeIs('admin.siswa.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-users"></i> Data Siswa
                    </a>
                    <a href="{{ route('admin.perusahaan.index') }}"
                        class="{{ request()->is('admin/perusahaan*') ? 'active' : '' }}">
                        <i class="fa-solid fa-building"></i> Data Perusahaan
                    </a>
                    <a href="{{ route('admin.pengajuan.index') }}"
                        class="{{ request()->routeIs('admin.pengajuan.index') ? 'active' : '' }}">
                        <i class="fa-solid fa-file-lines"></i> Pengajuan PKL
                    </a>
                    <a href="{{ route('admin.pengajuan.aktif') }}"
                        class="{{ request()->routeIs('admin.pengajuan.aktif') ? 'active' : '' }}">
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
                    <div class="page-tag">Form Input</div>
                    <div class="page-title">Tambah Siswa Baru</div>
                    <div class="page-sub">Isi informasi siswa yang akan didaftarkan</div>
                </div>

                <div class="form-card">
                    <form method="POST" action="{{ route('admin.siswa.store') }}">
                        @csrf

                        @if ($errors->any())
                            <div class="err-box">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div>{{ $errors->first() }}</div>
                            </div>
                        @endif

                        <div class="form-section-title">Identitas Siswa</div>

                        <div class="field">
                            <label>NIS</label>
                            <div class="input-wrap">
                                <i class="fa-solid fa-id-card"></i>
                                <input type="text" name="nis" placeholder="Contoh: 123456789"
                                    value="{{ old('nis') }}" required>
                            </div>
                            <div class="field-hint">Nomor Induk Siswa — digunakan sebagai username login</div>
                        </div>

                        <div class="field">
                            <label>Nama Lengkap</label>
                            <div class="input-wrap">
                                <i class="fa-solid fa-user"></i>
                                <input type="text" name="nama" placeholder="Nama lengkap siswa"
                                    value="{{ old('nama') }}" required>
                            </div>
                        </div>

                        <div class="field">
                            <label>Jenis Kelamin</label>
                            <div class="input-wrap">
                                <i class="fa-solid fa-venus-mars"></i>
                                <select name="jenis_kelamin" required>
                                    <option value="">Pilih jenis kelamin</option>
                                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-divider"></div>
                        <div class="form-section-title">Informasi Kelas</div>

                        <div class="field-row">
                            <div class="field">
                                <label>Jurusan</label>
                                <div class="input-wrap">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                    <select name="jurusan" id="jurusan" required>
                                        <option value="">Pilih jurusan</option>
                                        <option value="SIJA" {{ old('jurusan') == 'SIJA' ? 'selected' : '' }}>SIJA
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <label>Kelas</label>
                                <div class="input-wrap">
                                    <i class="fa-solid fa-door-open"></i>
                                    <select name="kelas" id="kelas" required>
                                        <option value="">Pilih kelas</option>
                                        <option value="XII SIJA 1" {{ old('kelas') === 'XII SIJA 1' ? 'selected' : '' }}>
                                            XII SIJA 1</option>
                                        <option value="XII SIJA 2" {{ old('kelas') === 'XII SIJA 2' ? 'selected' : '' }}>
                                            XII SIJA 2</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-divider"></div>
                        <div class="form-section-title">Wali Kelas</div>

                        <div class="field">
                            <label>Wali Kelas</label>
                            <div class="input-wrap">
                                <i class="fa-solid fa-person-chalkboard"></i>
                                <select name="guru_id" id="guru_id">
                                    <option value="">Pilih wali kelas</option>
                                    @foreach ($waliKelas as $guru)
                                        <option value="{{ $guru->id }}" data-kelas="{{ $guru->kelas }}"
                                            {{ old('guru_id') == $guru->id ? 'selected' : '' }}>
                                            {{ $guru->nama }} ({{ $guru->kelas ?? 'Belum ditentukan' }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field-hint">Pilih wali kelas sesuai dengan kelas siswa</div>
                        </div>

                        <div class="form-actions">
                            <a href="{{ route('admin.siswa.index') }}" class="btn-cancel">
                                <i class="fa-solid fa-xmark"></i> Batal
                            </a>
                            <button type="submit" class="btn-submit">
                                <i class="fa-solid fa-floppy-disk"></i> Simpan Siswa
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>


    <script>
        const jurusanSel = document.getElementById('jurusan');
        const kelasSel = document.getElementById('kelas');
        const guruSel = document.getElementById('guru_id');
        const oldKelas = "{{ old('kelas') }}";

        const dataKelas = {
            SIJA: [
                'XII SIJA 1',
                'XII SIJA 2'
            ]
        };

        function loadKelas(jur, selected = null) {
            kelasSel.innerHTML = '<option value="">Pilih kelas</option>';
            (dataKelas[jur] || []).forEach(k => {
                const opt = document.createElement('option');
                opt.value = k;
                opt.textContent = k;
                if (k === selected) opt.selected = true;
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

        jurusanSel.addEventListener('change', function() {
            loadKelas(this.value);
            filterGuruByKelas('');
            showToast('✓ Jurusan dipilih: ' + this.value, 'success', 3000);
        });

        kelasSel.addEventListener('change', function() {
            filterGuruByKelas(this.value);
            if (this.value) {
                showToast('✓ Kelas dipilih: ' + this.value, 'success', 3000);
            }
        });

        if (jurusanSel.value) loadKelas(jurusanSel.value, oldKelas);

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
        const siswaForm = document.querySelector('form[action*="admin.siswa.store"]');
        if (siswaForm) {
            siswaForm.addEventListener('submit', function(e) {
                const nis = document.querySelector('input[name="nis"]').value.trim();
                const nama = document.querySelector('input[name="nama"]').value.trim();
                const jenisKelamin = document.querySelector('select[name="jenis_kelamin"]').value;
                const jurusan = document.querySelector('select[name="jurusan"]').value;
                const kelas = document.querySelector('select[name="kelas"]').value;

                let errors = [];

                if (!nis) errors.push('NIS harus diisi');
                if (!nama) errors.push('Nama lengkap harus diisi');
                if (!jenisKelamin) errors.push('Jenis kelamin harus dipilih');
                if (!jurusan) errors.push('Jurusan harus dipilih');
                if (!kelas) errors.push('Kelas harus dipilih');

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

                showToast('✓ Memproses data siswa...', 'info');
            });
        }

        // Input field notifications
        const nisInput = document.querySelector('input[name="nis"]');
        if (nisInput) {
            nisInput.addEventListener('change', function() {
                if (this.value && this.value.length < 6) {
                    showToast('NIS terlalu pendek (minimal 6 karakter)', 'warning');
                } else if (this.value) {
                    showToast('✓ NIS valid: ' + this.value, 'success', 2000);
                }
            });
        }

        const namaInput = document.querySelector('input[name="nama"]');
        if (namaInput) {
            namaInput.addEventListener('change', function() {
                if (this.value && this.value.length < 3) {
                    showToast('Nama terlalu pendek', 'warning');
                } else if (this.value) {
                    showToast('✓ Nama: ' + this.value, 'success', 2000);
                }
            });
        }

        const jurusanSelect = document.querySelector('select[name="jurusan"]');
        if (jurusanSelect) {
            jurusanSelect.addEventListener('change', function() {
                if (this.value) {
                    showToast('✓ Jurusan dipilih: ' + this.value, 'info', 2000);
                    loadKelas(this.value);
                }
            });
        }

        const kelasSelect = document.querySelector('select[name="kelas"]');
        if (kelasSelect) {
            kelasSelect.addEventListener('change', function() {
                if (this.value) {
                    showToast('✓ Kelas dipilih: ' + this.value, 'success', 2000);
                }
            });
        }

        // Page load notification - handle both cases
        function initializeNotifications() {
            showToast('Siap untuk menambah siswa baru', 'info', 3000);
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initializeNotifications);
        } else {
            initializeNotifications();
        }

        // Check for flash messages and show as toast
        @if (session('success'))
            setTimeout(() => {
                showToast('{{ session('success') }}', 'success', 5000);
            }, 500);
        @endif

        @if (session('error'))
            setTimeout(() => {
                showToast('{{ session('error') }}', 'error', 5000);
            }, 500);
        @endif
    </script>
@endsection
