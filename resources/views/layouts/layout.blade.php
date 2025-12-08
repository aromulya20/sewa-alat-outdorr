<!DOCTYPE html>
<html>
<head>
    <title>Sewa Outdoor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f6fa;
            margin: 0;
        }

        /* SIDEBAR */
        .sidebar {
            width: 240px;
            height: 100vh;
            position: fixed;
            background: #2c3e50;
            padding-top: 20px;
            padding-left: 15px;
            padding-right: 15px;
        }

        .sidebar h4 {
            color: #ecf0f1;
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .sidebar a {
            display: block;
            padding: 12px;
            color: #ecf0f1;
            text-decoration: none;
            border-radius: 8px;
            margin-bottom: 8px;
            font-size: 23px;
            font-weight: 500;
        }

        .sidebar a:hover {
            background: #34495e;
        }

        .sidebar .active {
            background: #1abc9c;
            color: white;
        }

        /* CONTENT */
        .content {
            margin-left: 260px;
            padding: 25px;
        }
    </style>
</head>
<body>

    {{-- SIDEBAR --}}
    <div class="sidebar">
        <h4>⚡ Sewa Outdoor</h4>

        <a href="{{ route('alat.dashboard') }}"
            class="{{ request()->routeIs('alat.dashboard') ? 'active' : '' }}">
            📊 Dashboard
        </a>

        <a href="{{ route('alat.index') }}"
            class="{{ request()->routeIs('alat.*') ? 'active' : '' }}">
            🧰 Stok Alat
        </a>

        <a href="{{ route('sewa.index') }}"
            class="{{ request()->routeIs('sewa.*') ? 'active' : '' }}">
            📝 Penyewaan
        </a>

        <a href="{{ route('pengembalian.index') }}"
            class="{{ request()->routeIs('pengembalian.*') ? 'active' : '' }}">
            🔄 Pengembalian
        </a>
    </div>

    {{-- MAIN CONTENT --}}
    <div class="content">
        @yield('content')
    </div>

</body>
</html>
