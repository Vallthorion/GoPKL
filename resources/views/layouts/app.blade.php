<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>@yield('title', 'GOPKL')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --lime: #C8F135;
            --navy: #0A0F2C;
            --violet: #5B3CF5;
            --violet-light: #7B5EF8;
            --coral: #FF5C5C;
            --sky: #3ECFCF;
            --white: #FFFFFF;
            --off: #F4F5FF;
            --muted: #8892B0;
            --card: rgba(255,255,255,0.06);
        }
        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--navy);
            color: var(--white);
            min-height: 100vh;
        }
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 1;
            opacity: .4;
        }
        .content {
            min-width: 0;
            padding: 0;
            position: relative;
            z-index: 2;
        }
        /* BG MESH */
        .bg-mesh {
            position: fixed;
            inset: 0;
            z-index: 0;
            overflow: hidden;
            pointer-events: none;
        }
        .bg-mesh::after {
            content: '';
            position: absolute;
            inset: 0;
            background-image: linear-gradient(rgba(255,255,255,.022) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.022) 1px, transparent 1px);
            background-size: 60px 60px;
        }
        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.18;
            animation: blobFloat 12s ease-in-out infinite alternate;
        }
        .blob-1 { width: 600px; height: 600px; background: var(--violet); top: -200px; left: -150px; animation-duration: 14s; }
        .blob-2 { width: 500px; height: 500px; background: var(--sky); top: 300px; right: -100px; animation-duration: 10s; animation-delay: -4s; }
        .blob-3 { width: 400px; height: 400px; background: var(--lime); bottom: -100px; left: 30%; animation-duration: 16s; animation-delay: -8s; }
        @keyframes blobFloat {
            0%   { transform: translate(0,0) scale(1); }
            100% { transform: translate(40px, 30px) scale(1.08); }
        }
        @media (max-width: 900px) {
            .content { padding: 0; }
        }
    </style>
</head>
<body>
    <!-- BG MESH -->
    <div class="bg-mesh">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="blob blob-3"></div>
    </div>
    <div class="content">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
