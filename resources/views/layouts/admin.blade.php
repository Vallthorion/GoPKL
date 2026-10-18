<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin - GOPKL')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <style>
        *{margin:0;padding:0;box-sizing:border-box;font-family:'Poppins',sans-serif}
        body{background:#f5f7fb;color:#1e293b}
        .layout{display:flex;min-height:100vh}
        .content{flex:1;padding:30px;}
    </style>
</head>
<body>
<div class="layout">
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('image/logo-gopkl.png') }}" alt="Logo">
            GOPKL
        </div>
        @include('admin.partials.profile')
        <div class="menu">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="fa-solid fa-chart-pie"></i> Dashboard</a>
            <a href="{{ route('admin.siswa.index') }}" class="{{ request()->routeIs('admin.siswa.*') ? 'active' : '' }}"><i class="fa-solid fa-users"></i> Data Siswa</a>
            <a href="{{ route('admin.guru.index') }}" class="{{ request()->routeIs('admin.guru.*') ? 'active' : '' }}"><i class="fa-solid fa-chalkboard-user"></i> Data Guru</a>
            <a href="{{ route('admin.perusahaan.index') }}" class="{{ request()->is('admin/perusahaan*') ? 'active' : '' }}"><i class="fa-solid fa-building"></i> Data Perusahaan</a>
            <a href="{{ route('admin.pengajuan.index') }}" class="{{ request()->is('admin/pengajuan*') ? 'active' : '' }}"><i class="fa-solid fa-file-lines"></i> Pengajuan PKL</a>
            <a href="#" class="{{ request()->is('admin/pengaturan*') ? 'active' : '' }}"><i class="fa-solid fa-gear"></i> Pengaturan</a>
        </div>
        <hr>
        <form action="/logout" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </button>
        </form>
    </div>
    <div class="content">
        @yield('content')
    </div>
</div>
</body>
</html>
