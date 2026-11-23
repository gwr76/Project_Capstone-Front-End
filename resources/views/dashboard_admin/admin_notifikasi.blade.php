<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEXAKUN - Notifikasi Admin</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Gurajada&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Funnel+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=42dot+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin_notifikasi.css') }}" />
</head>

<body>

    <div class="admin-layout">

        <!-- ==========================================
             HEADER
             ========================================== -->
        <header class="admin-header">
            <a href="/admin/dashboard" class="brand">
                <img src="{{ asset('images/v341_395.png') }}" alt="NEXAKUN">
            </a>

            <a href="/admin/notifikasi" class="notification-button" aria-label="Notifikasi">
                <i class="fa-solid fa-bell"></i>
                <span class="notification-count" id="notifBadge">2</span>
            </a>
        </header>


        <!-- ==========================================
             SIDEBAR
             ========================================== -->
        <aside class="admin-sidebar">
            <nav class="sidebar-menu">
                <!-- DASHBOARD -->
                <a href="/admin/dashboard" class="menu-link">
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


        <!-- ==========================================
             MAIN CONTENT
             ========================================== -->
        <main class="admin-content">

            <!-- PAGE HEADING -->
            <section class="page-heading">
                <h1>Notifikasi Sistem</h1>
                <p>
                    Pantau pengajuan validasi penjual, verifikasi pembayaran transaksi pesanan baru, dan aktivitas penting marketplace NEXAKUN secara langsung.
                </p>
            </section>


            <!-- NOTIFICATION PANEL -->
            <section class="notif-panel">

                <div class="notif-toolbar">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <i class="fa-solid fa-bell" style="color: var(--blue); font-size: 18px;"></i>
                        <span style="font-size: 14px; font-weight: 700; color: #ffffff;">Daftar Pemberitahuan</span>
                    </div>

                    <div class="notif-actions">
                        <button type="button" class="btn-read-all" onclick="markAllAsRead()">
                            <i class="fa-solid fa-check-double"></i> Tandai Semua Dibaca
                        </button>
                    </div>
                </div>

                <!-- NOTIFICATION LIST -->
                <div class="notif-list">

                    <!-- NOTIF 1: VALIDASI PENJUAL (UNREAD) -->
                    <a href="/admin/akun?tab=validasi" class="notif-item unread">
                        <div class="notif-icon validation">
                            <i class="fa-solid fa-id-card"></i>
                        </div>
                        <div class="notif-content">
                            <div class="notif-title">
                                <span>Permohonan Validasi Toko Baru</span>
                                <span class="unread-dot"></span>
                            </div>
                            <p class="notif-text">
                                Toko <strong>freefire_id</strong> (FipeMarket Store) baru saja mengunggah dokumen KTP & izin usaha untuk diverifikasi.
                            </p>
                            <span class="notif-time">10 Menit yang lalu</span>
                        </div>
                    </a>

                    <!-- NOTIF 2: PESANAN BARU (UNREAD) -->
                    <a href="/admin/pesanan" class="notif-item unread">
                        <div class="notif-icon order">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                        <div class="notif-content">
                            <div class="notif-title">
                                <span>Pembayaran Pesanan Masuk (TRX001)</span>
                                <span class="unread-dot"></span>
                            </div>
                            <p class="notif-text">
                                Pembeli <strong>Andi Pratama</strong> telah mentransfer Rp 450.000 untuk pesanan PUBG Mobile Level 75. Segera verifikasi pembayaran.
                            </p>
                            <span class="notif-time">35 Menit yang lalu</span>
                        </div>
                    </a>

                    <!-- NOTIF 3: TRANSAKSI SELESAI -->
                    <a href="/admin/pesanan" class="notif-item">
                        <div class="notif-icon success">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>
                        <div class="notif-content">
                            <div class="notif-title">
                                <span>Pesanan Berhasil Diserahkan (TRX002)</span>
                            </div>
                            <p class="notif-text">
                                Pesanan Mobile Legends 120 skin telah diterima pembeli. Dana telah diteruskan ke saldo penjual.
                            </p>
                            <span class="notif-time">2 Jam yang lalu</span>
                        </div>
                    </a>

                    <!-- NOTIF 4: VALIDASI BERHASIL -->
                    <a href="/admin/user?tab=validasi" class="notif-item">
                        <div class="notif-icon success">
                            <i class="fa-solid fa-user-check"></i>
                        </div>
                        <div class="notif-content">
                            <div class="notif-title">
                                <span>Toko Terverifikasi (sky_gaming)</span>
                            </div>
                            <p class="notif-text">
                                Toko <strong>sky_gaming</strong> (Diamond Palace) telah resmi diverifikasi sebagai penjual resmi NEXAKUN.
                            </p>
                            <span class="notif-time">Kemarin, 14:30 WIB</span>
                        </div>
                    </a>

                </div>

            </section>

        </main>

    </div>


    <!-- JAVASCRIPT -->
    <script>
        function markAllAsRead() {
            const unreadItems = document.querySelectorAll(".notif-item.unread");
            unreadItems.forEach(item => {
                item.classList.remove("unread");
                const dot = item.querySelector(".unread-dot");
                if (dot) dot.remove();
            });

            const badge = document.getElementById("notifBadge");
            if (badge) {
                badge.style.display = "none";
            }

            alert("Semua notifikasi telah ditandai sebagai sudah dibaca.");
        }
    </script>


        <!-- FOOTER -->
        <footer id="contact">
            © 2026 NEXAKUN. Platform jual beli akun game.
        </footer>
</body>

</html>