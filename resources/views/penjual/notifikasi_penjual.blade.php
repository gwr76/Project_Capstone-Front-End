<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEXAKUN - Notifikasi Penjual</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Gurajada&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Funnel+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=42dot+Sans&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/penjual_layout.css') }}">
</head>

<body>

    <div class="penjual-dashboard">

        <!-- HEADER -->
        <header class="penjual-header">

            <!-- LOGO -->
            <a href="/penjual/dashboard" class="header-logo" aria-label="NEXAKUN"></a>

            <!-- NOTIFICATION -->
            <a href="/penjual/notifikasi" class="notification-button" aria-label="Notifikasi">
                <i class="fa-solid fa-bell" style="color:var(--blue);"></i>
                <span class="notification-badge" id="notifBadge">2</span>
            </a>

        </header>

        <!-- SIDEBAR -->
        <aside class="penjual-sidebar">

            <nav class="sidebar-menu">

                <!-- DASHBOARD -->
                <a href="/penjual/dashboard" class="menu-link">
                    <i class="fa-solid fa-house"></i>
                    <span>Dashboard</span>
                </a>

                <!-- KELOLA PRODUK -->
                <a href="/penjual/daftar_produk" class="menu-link">
                    <i class="fa-solid fa-gamepad"></i>
                    <span>Kelola Produk</span>
                </a>

                <!-- LAPORAN -->
                <a href="/penjual/laporan" class="menu-link">
                    <i class="fa-solid fa-receipt"></i>
                    <span>Laporan</span>
                </a>

                <!-- PROFIL SAYA -->
                <a href="/penjual/profile_penjual" class="menu-link">
                    <i class="fa-solid fa-user-circle"></i>
                    <span>Profil Saya</span>
                </a>

            </nav>

            <!-- KELUAR -->
            <a href="/index" class="logout-link sidebar-logout">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Keluar</span>
            </a>

        </aside>

        <!-- MAIN CONTENT -->
        <main class="penjual-content">

            <div class="seller-header-bar" style="margin-bottom: 20px;">
                <div class="seller-title-area">
                    <h1 class="seller-store-name">Pusat Notifikasi Toko</h1>
                    <p style="color: var(--text-muted); font-size: 14px;">
                        Pemberitahuan aktivitas pesanan, status validasi produk akun game, dan pengiriman pembayaran.
                    </p>
                </div>

                <button type="button" class="btn-posting" style="background:#0E1626; border: 1px solid rgba(255,255,255,0.15);" onclick="markAllAsRead()">
                    <i class="fa-solid fa-check-double"></i> Tandai Semua Dibaca
                </button>
            </div>

            <!-- NOTIFICATION LIST -->
            <div id="notifListContainer" style="background: var(--bg-panel); border: 1px solid var(--border); border-radius: 14px; overflow: hidden; display: flex; flex-direction: column; gap: 0; margin-bottom: 30px;">

                <div class="notif-row unread" style="padding: 18px 24px; border-bottom: 1px solid var(--border); display: flex; align-items: flex-start; gap: 16px; background: rgba(5,140,251,0.04);">
                    <div style="width: 40px; height: 40px; border-radius: 10px; background: rgba(47,171,38,0.15); color: #38ef7d; display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0;">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <div style="flex: 1;">
                        <strong style="color: #FFFFFF; font-size: 15px;">Produk Akun Lolos Validasi Admin</strong>
                        <p style="color: #C5D5E8; font-size: 13px; margin-top: 3px; line-height: 1.4;">
                            Produk "<strong>Akun PUBG Mobile Level 75 Sultan</strong>" telah diperiksa dan disetujui Admin. Produk kini aktif dan tampil di marketplace NEXAKUN.
                        </p>
                        <small style="color: var(--text-muted); font-size: 11px; margin-top: 4px; display: block;">12 Nov 2026 · 10:15 WIB</small>
                    </div>
                    <span class="unread-dot" style="width: 8px; height: 8px; border-radius: 50%; background: var(--blue); margin-top: 6px;"></span>
                </div>

                <div class="notif-row unread" style="padding: 18px 24px; border-bottom: 1px solid var(--border); display: flex; align-items: flex-start; gap: 16px; background: rgba(5,140,251,0.04);">
                    <div style="width: 40px; height: 40px; border-radius: 10px; background: rgba(5,140,251,0.15); color: var(--blue); display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0;">
                        <i class="fa-solid fa-bag-shopping"></i>
                    </div>
                    <div style="flex: 1;">
                        <strong style="color: #FFFFFF; font-size: 15px;">Pesanan Baru Masuk (TRX001)</strong>
                        <p style="color: #C5D5E8; font-size: 13px; margin-top: 3px; line-height: 1.4;">
                            Pembeli <strong>Andi Pratama</strong> telah menyelesaikan pembayaran sebesar <strong>Rp 800.000</strong>. Admin sedang memverifikasi sebelum data akun diteruskan.
                        </p>
                        <small style="color: var(--text-muted); font-size: 11px; margin-top: 4px; display: block;">12 Nov 2026 · 09:40 WIB</small>
                    </div>
                    <span class="unread-dot" style="width: 8px; height: 8px; border-radius: 50%; background: var(--blue); margin-top: 6px;"></span>
                </div>

                <div class="notif-row" style="padding: 18px 24px; border-bottom: 1px solid var(--border); display: flex; align-items: flex-start; gap: 16px;">
                    <div style="width: 40px; height: 40px; border-radius: 10px; background: rgba(251,188,5,0.15); color: #FBBC05; display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0;">
                        <i class="fa-solid fa-hourglass-half"></i>
                    </div>
                    <div style="flex: 1;">
                        <strong style="color: #FFFFFF; font-size: 15px;">Produk Dalam Antrean Validasi</strong>
                        <p style="color: #C5D5E8; font-size: 13px; margin-top: 3px; line-height: 1.4;">
                            Produk "<strong>Akun Mobile Legends 120 Skin</strong>" sedang ditinjau kelengkapan dokumen dan bukti kepemilikan akun.
                        </p>
                        <small style="color: var(--text-muted); font-size: 11px; margin-top: 4px; display: block;">11 Nov 2026 · 14:20 WIB</small>
                    </div>
                </div>

                <div class="notif-row" style="padding: 18px 24px; display: flex; align-items: flex-start; gap: 16px;">
                    <div style="width: 40px; height: 40px; border-radius: 10px; background: rgba(47,171,38,0.15); color: #38ef7d; display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0;">
                        <i class="fa-solid fa-money-bill-transfer"></i>
                    </div>
                    <div style="flex: 1;">
                        <strong style="color: #FFFFFF; font-size: 15px;">Dana Penjualan Ditransfer</strong>
                        <p style="color: #C5D5E8; font-size: 13px; margin-top: 3px; line-height: 1.4;">
                            Dana hasil penjualan transaksi TRX002 sebesar <strong>Rp 275.000</strong> telah ditransfer ke dompet digital Dana Anda.
                        </p>
                        <small style="color: var(--text-muted); font-size: 11px; margin-top: 4px; display: block;">10 Nov 2026 · 16:00 WIB</small>
                    </div>
                </div>

            </div>

            <!-- FOOTER -->
            <footer id="contact">
                © 2026 NEXAKUN. Platform jual beli akun game.
            </footer>

        </main>

    </div>

    <script>
        const NOTIF_STORAGE_KEY = "nexakun_seller_notifications";

        function getIconStyle(type) {
            if (type === "approved") {
                return {
                    bg: "rgba(47,171,38,0.15)",
                    color: "#38ef7d",
                    icon: "fa-solid fa-circle-check"
                };
            }
            if (type === "rejected") {
                return {
                    bg: "rgba(255,56,60,0.15)",
                    color: "#FF383C",
                    icon: "fa-solid fa-circle-xmark"
                };
            }
            return {
                bg: "rgba(251,188,5,0.15)",
                color: "#FBBC05",
                icon: "fa-solid fa-hourglass-half"
            };
        }

        function loadDynamicNotifications() {
            const container = document.getElementById("notifListContainer");
            const dynamicNotifs = JSON.parse(localStorage.getItem(NOTIF_STORAGE_KEY) || "[]");

            // Render terbalik agar notifikasi terbaru muncul di baris paling atas
            [...dynamicNotifs].reverse().forEach((item) => {
                const st = getIconStyle(item.type);
                const row = document.createElement("div");
                row.className = "notif-row" + (item.unread ? " unread" : "");
                row.dataset.id = item.id;
                row.style.cssText = `padding: 18px 24px; border-bottom: 1px solid var(--border); display: flex; align-items: flex-start; gap: 16px; ${item.unread ? "background: rgba(5,140,251,0.04);" : ""}`;

                row.innerHTML = `
                    <div style="width: 40px; height: 40px; border-radius: 10px; background: ${st.bg}; color: ${st.color}; display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0;">
                        <i class="${st.icon}"></i>
                    </div>
                    <div style="flex: 1;">
                        <strong style="color: #FFFFFF; font-size: 15px;">${item.title}</strong>
                        <p style="color: #C5D5E8; font-size: 13px; margin-top: 3px; line-height: 1.4;">
                            ${item.message}
                        </p>
                        <small style="color: var(--text-muted); font-size: 11px; margin-top: 4px; display: block;">${item.time}</small>
                    </div>
                    ${item.unread ? '<span class="unread-dot" style="width: 8px; height: 8px; border-radius: 50%; background: var(--blue); margin-top: 6px;"></span>' : ''}
                `;

                row.addEventListener("click", () => {
                    if (row.classList.contains("unread")) {
                        row.classList.remove("unread");
                        row.style.background = "transparent";
                        const dot = row.querySelector(".unread-dot");
                        if (dot) dot.style.display = "none";

                        const list = JSON.parse(localStorage.getItem(NOTIF_STORAGE_KEY) || "[]");
                        const target = list.find(n => n.id === item.id);
                        if (target) {
                            target.unread = false;
                            localStorage.setItem(NOTIF_STORAGE_KEY, JSON.stringify(list));
                        }
                        updateBadgeCount();
                    }
                });

                container.prepend(row);
            });

            updateBadgeCount();
        }

        function updateBadgeCount() {
            const unreadTotal = document.querySelectorAll(".notif-row.unread").length;
            const badge = document.getElementById("notifBadge");
            if (!badge) return;

            if (unreadTotal > 0) {
                badge.textContent = unreadTotal;
                badge.style.display = "inline-flex";
            } else {
                badge.style.display = "none";
            }
        }

        function markAllAsRead() {
            document.querySelectorAll(".unread-dot").forEach(d => d.style.display = "none");
            document.querySelectorAll(".notif-row.unread").forEach(r => {
                r.classList.remove("unread");
                r.style.background = "transparent";
            });

            const list = JSON.parse(localStorage.getItem(NOTIF_STORAGE_KEY) || "[]").map(n => ({
                ...n,
                unread: false
            }));
            localStorage.setItem(NOTIF_STORAGE_KEY, JSON.stringify(list));

            updateBadgeCount();
        }

        document.addEventListener("DOMContentLoaded", loadDynamicNotifications);
    </script>

</body>

</html>