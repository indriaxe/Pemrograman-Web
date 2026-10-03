<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Berita Desa')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        body { background: #eef1f5; }

        .navbar-desa {
            background: #16213e;
            border-bottom: 3px solid #d4a017;
        }
        .navbar-desa .navbar-brand small {
            display: block;
            font-size: .7rem;
            color: #b8c0d0;
            font-weight: normal;
        }
        .navbar-desa .nav-link {
            color: #cfd6e4 !important;
            font-weight: 500;
        }
        .navbar-desa .nav-link.active {
            background: #d4a017;
            color: #16213e !important;
            border-radius: 20px;
        }

        .filter-box .filter-header {
            background: #16213e;
            color: #fff;
            padding: 12px 16px;
            border-radius: 6px 6px 0 0;
        }
        .filter-box .filter-body {
            background: #fff;
            padding: 16px;
            border-radius: 0 0 6px 6px;
        }

        .card-berita { border: none; box-shadow: 0 2px 8px rgba(0,0,0,.08); }
        .badge-kategori { background: #16213e; }
        .tag-pill {
            background: #f1f3f6;
            color: #555;
            border-radius: 20px;
            padding: 3px 10px;
            font-size: .75rem;
            margin-right: 4px;
        }
        .btn-baca {
            color: #2563eb;
            border: 1px solid #2563eb;
        }
        .btn-baca:hover { background: #2563eb; color: #fff; }

        footer.footer-desa { background: #16213e; color: #cfd6e4; }
        footer.footer-desa a { color: #cfd6e4; text-decoration: none; }

        .filter-header {
            background: #16213e;
            color: #fff;
            padding: 12px 16px;
            border-radius: 6px 6px 0 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-desa py-2">
        <div class="container">
            <a class="navbar-brand text-white d-flex align-items-center" href="{{ route('berita.index') }}">
                <span class="fs-4 me-2">🏛️</span>
                <span>
                    PEMERINTAH DESA CONTOH
                    <small>KECAMATAN CONTOH KABUPATEN CONTOH</small>
                </span>
            </a>
            <div class="ms-auto">
                <a href="{{ route('berita.index') }}" class="nav-link d-inline-block active px-3 py-1">Berita</a>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>

    <footer class="footer-desa py-4 mt-5">
        <div class="container">
            <strong class="text-white">Pemerintah Desa Contoh</strong><br>
            Jalan Raya Contoh No. 1, Kecamatan Contoh, Kabupaten Contoh<br>
            <a href="{{ route('berita.index') }}">Berita</a>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
