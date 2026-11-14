<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --brand: #c8553d;
            --brand-soft: #fbeae5;
            --gold: #e0a458;
            --ink: #1f1b18;
            --sidebar: #1f1b18;
            --muted: #8a817a;
            --bg: #f7f4f1;
            --card-radius: 1rem;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--ink);
        }

        .font-display {
            font-family: 'Playfair Display', serif;
        }

        /* ---------- Sidebar ---------- */
        .sidebar {
            width: 260px;
            background: var(--sidebar);
            min-height: 100vh;
        }

        .sidebar .brand {
            color: #fff;
            font-size: 1.5rem;
        }

        .sidebar .brand i {
            color: var(--gold);
        }

        .sidebar .nav-link {
            color: #b9b0a8;
            border-radius: .75rem;
            padding: .7rem 1rem;
            margin-bottom: .25rem;
            display: flex;
            align-items: center;
            gap: .75rem;
            transition: all .2s ease;
        }

        .sidebar .nav-link:hover {
            color: #fff;
            background: rgba(255, 255, 255, .06);
        }

        .sidebar .nav-link.active {
            color: #fff;
            background: var(--brand);
            box-shadow: 0 8px 20px rgba(200, 85, 61, .35);
        }

        .sidebar .section-label {
            color: #6d655e;
            font-size: .7rem;
            letter-spacing: .12em;
            text-transform: uppercase;
        }

        .sidebar .promo {
            background: linear-gradient(135deg, var(--brand), var(--gold));
            border-radius: var(--card-radius);
        }

        /* ---------- Cards ---------- */
        .card {
            border: 0;
            border-radius: var(--card-radius);
            box-shadow: 0 2px 12px rgba(31, 27, 24, .05);
        }

        .stat-card {
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 28px rgba(31, 27, 24, .1);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: .85rem;
            display: grid;
            place-items: center;
            font-size: 1.3rem;
        }

        .hero {
            background:
                linear-gradient(120deg, rgba(31, 27, 24, .92), rgba(200, 85, 61, .85)),
                url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=1200') center/cover;
            color: #fff;
            border-radius: var(--card-radius);
        }

        /* ---------- CSS bar chart ---------- */
        .chart {
            height: 220px;
            display: flex;
            align-items: flex-end;
            gap: 4%;
        }

        .chart .bar-wrap {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100%;
            justify-content: flex-end;
        }

        .chart .bar {
            width: 100%;
            max-width: 42px;
            border-radius: .6rem .6rem .2rem .2rem;
            background: var(--brand-soft);
            transition: background .2s ease;
            position: relative;
        }

        .chart .bar:hover,
        .chart .bar.today {
            background: linear-gradient(180deg, var(--gold), var(--brand));
        }

        .chart .bar span {
            position: absolute;
            top: -1.6rem;
            left: 50%;
            transform: translateX(-50%);
            font-size: .72rem;
            font-weight: 600;
            opacity: 0;
            transition: opacity .2s ease;
            white-space: nowrap;
        }

        .chart .bar:hover span,
        .chart .bar.today span {
            opacity: 1;
        }

        .chart small {
            margin-top: .5rem;
            color: var(--muted);
        }

        /* ---------- Tables & lists ---------- */
        .table> :not(caption)>*>* {
            padding: .9rem .75rem;
            border-color: #f0ebe6;
        }

        .table thead th {
            color: var(--muted);
            font-size: .75rem;
            text-transform: uppercase;
            letter-spacing: .06em;
            font-weight: 600;
        }

        .badge-soft {
            padding: .45em .8em;
            border-radius: 2rem;
            font-weight: 600;
            font-size: .72rem;
        }

        .badge-pending { background: #fff4e0; color: #b7791f; }
        .badge-preparing { background: #e6f0ff; color: #2b6cb0; }
        .badge-served { background: #e6f6ec; color: #2f855a; }
        .badge-cancelled { background: #fde8e8; color: #c53030; }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-weight: 600;
            font-size: .85rem;
            color: #fff;
        }

        .dish-img {
            width: 48px;
            height: 48px;
            border-radius: .75rem;
            object-fit: cover;
        }

        .progress {
            height: 6px;
            background: #f0ebe6;
            border-radius: 1rem;
        }

        .progress-bar {
            background: linear-gradient(90deg, var(--gold), var(--brand));
            border-radius: 1rem;
        }

        .btn-brand {
            background: var(--brand);
            color: #fff;
            border-radius: .75rem;
        }

        .btn-brand:hover {
            background: #b04631;
            color: #fff;
        }

        .search-box {
            border-radius: .75rem;
            border: 1px solid #ebe5df;
            background: #fff;
        }

        .text-muted-2 {
            color: var(--muted) !important;
        }

        a {
            text-decoration: none;
        }
    </style>
    @stack('styles')
</head>

<body>
    <div class="d-flex">

        <!-- ================= SIDEBAR ================= -->
        <aside class="sidebar offcanvas-lg offcanvas-start p-4 d-flex flex-column" tabindex="-1" id="sidebar">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <a href="#" class="brand font-display"><i class="bi bi-fire me-2"></i>La Brasa</a>
                <button type="button" class="btn-close btn-close-white d-lg-none" data-bs-dismiss="offcanvas" data-bs-target="#sidebar"></button>
            </div>

            <p class="section-label mb-2">Main</p>
            <nav class="nav flex-column mb-4">
                <a class="nav-link active" href="#"><i class="bi bi-grid-1x2-fill"></i> Dashboard</a>
                <a class="nav-link" href="#"><i class="bi bi-receipt"></i> Orders</a>
                <a class="nav-link" href="#"><i class="bi bi-calendar-check"></i> Reservations</a>
                <a class="nav-link" href="#"><i class="bi bi-journal-text"></i> Menu Items</a>
                <a class="nav-link" href="#"><i class="bi bi-tags"></i> Categories</a>
            </nav>

            <p class="section-label mb-2">Management</p>
            <nav class="nav flex-column mb-4">
                <a class="nav-link" href="#"><i class="bi bi-credit-card"></i> Payments</a>
                <a class="nav-link" href="#"><i class="bi bi-people"></i> Users</a>
                <a class="nav-link" href="#"><i class="bi bi-gear"></i> Settings</a>
            </nav>

            <div class="promo p-4 mt-auto text-white">
                <i class="bi bi-stars fs-3"></i>
                <h6 class="mt-2 mb-1 fw-semibold">Weekend Special</h6>
                <p class="small mb-3 opacity-75">Launch a new seasonal menu for this weekend.</p>
                <a href="#" class="btn btn-light btn-sm rounded-pill px-3 fw-semibold">Create Menu</a>
            </div>
        </aside>

        <!-- ================= MAIN ================= -->
        <main class="flex-grow-1 p-3 p-md-4 p-xl-5" style="min-width: 0;">

            <!-- Top bar -->
            <div class="d-flex flex-wrap align-items-center gap-3 mb-4">
                <button class="btn btn-light d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
                    <i class="bi bi-list fs-5"></i>
                </button>
                <div class="me-auto">
                    <h1 class="font-display h3 mb-0">@yield('heading')</h1>
                    <p class="text-muted-2 small mb-0">@yield('subheading')</p>
                </div>
                <div class="search-box d-none d-md-flex align-items-center px-3 py-2">
                    <i class="bi bi-search text-muted-2 me-2"></i>
                    <input type="text" class="border-0 bg-transparent" style="outline: none;" placeholder="Search orders, dishes...">
                </div>
                <a href="#" class="btn btn-light position-relative rounded-3">
                    <i class="bi bi-bell"></i>
                    <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
                </a>
                <a href="#" class="d-flex align-items-center gap-2 text-reset">
                    <div class="avatar" style="background: var(--brand);">AD</div>
                    <div class="d-none d-sm-block lh-sm">
                        <div class="fw-semibold small">Admin</div>
                        <div class="text-muted-2" style="font-size: .75rem;">Manager</div>
                    </div>
                </a>
            </div>

            @yield('content')

            <p class="text-center text-muted-2 small mt-5 mb-0">&copy; 2026 La Brasa Restaurant. All rights reserved.</p>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
