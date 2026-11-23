<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NEXAKUN - Admin Dashboard</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gurajada&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Funnel+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Coda+Caption&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin_dashboard.css') }}">
</head>

<script>
    const menuLinks = document.querySelectorAll(".menu-link");

    const currentPage = window.location.pathname
        .split("/")
        .pop();

    menuLinks.forEach(link => {
        const linkPage = link.getAttribute("href")
            .split("/")
            .pop();

        if (linkPage === currentPage) {
            link.classList.add("active");
        } else {
            link.classList.remove("active");
        }
    });
</script>

<body>

    <div class="admin-dashboard">

        <!-- HEADER -->
        <header class="admin-header">

            <!-- LOGO -->
            <div class="header-logo"></div>

            <!-- NOTIFICATION -->
            <a href="/admin/notifikasi" class="notification-button" aria-label="Notifikasi">
                <i class="fa-regular fa-bell"></i>
                <span class="notification-badge">2</span>
            </a>

        </header>


        <!-- SIDEBAR -->
        <aside class="admin-sidebar">

            <nav class="sidebar-menu">

                <!-- DASHBOARD -->
                <a href="/admin/dashboard" class="menu-link active">
                    <i class="fa-solid fa-house"></i>
                    <span>Dashboard</span>
                </a>

                <!-- KELOLA PRODUK -->
                <a href="/admin/produk" class="menu-link">
                    <i class="fa-solid fa-gamepad"></i>
                    <span>Kelola Produk</span>
                </a>

                <!-- KELOLA AKUN -->
                <a href="/admin/user" class="menu-link">
                    <i class="fa-solid fa-users"></i>
                    <span>Kelola Akun</span>
                </a>

                <!-- LAPORAN -->
                <a href="/admin/laporan" class="menu-link">
                    <i class="fa-solid fa-chart-column"></i>
                    <span>Laporan</span>
                </a>

                <!-- PESANAN -->
                <a href="/admin/pesanan" class="menu-link">
                    <i class="fa-solid fa-receipt"></i>
                    <span>Pesanan</span>
                </a>

            </nav>


            <!-- LOGOUT -->
            <a href="/index" class="logout-link sidebar-logout">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Keluar</span>
            </a>

        </aside>


        <!-- MAIN CONTENT -->
        <main class="admin-content">

            <!-- WELCOME SECTION -->
            <section class="welcome-section">

                <div class="welcome-background"></div>

                <div class="welcome-text">

                    <h1>Welcome Back, Admin!</h1>

                    <h2>Kelola NEXAKUN, Lebih Mudah.</h2>

                    <p>
                        Pantau transaksi, kelola akun game, dan pastikan
                        setiap aktivitas marketplace berjalan aman,
                        cepat, dan terpercaya.
                    </p>

                </div>

            </section>


            <!-- SUMMARY CARDS -->
            <section class="dashboard-summary">

                <!-- DATA PENJUAL -->
                <div class="summary-card">

                    <h3>Data Penjual</h3>

                    <p class="summary-number">2</p>

                    <span class="summary-status warning">
                        Belum validasi
                    </span>

                </div>


                <!-- DATA PRODUK -->
                <div class="summary-card">

                    <h3>Data Produk</h3>

                    <p class="summary-number">2</p>

                    <span class="summary-status primary">
                        Belum rilis
                    </span>

                </div>


                <!-- TOTAL PENGGUNA -->
                <div class="summary-card">

                    <h3>Total Pengguna</h3>

                    <p class="summary-number">120</p>

                    <span class="summary-status success">
                        Pengguna aktif NEXAKUN
                    </span>

                </div>


                <!-- TOTAL PRODUK AKTIF -->
                <div class="summary-card">

                    <h3>Total Produk Aktif</h3>

                    <p class="summary-number">40</p>

                    <span class="summary-status light">
                        Tampil di marketplace
                    </span>

                </div>

            </section>

        </main>

    </div>


        <!-- FOOTER -->
        <footer id="contact">
            © 2026 NEXAKUN. Platform jual beli akun game.
        </footer>
</body>

</html>