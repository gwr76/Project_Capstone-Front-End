<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NEXAKUN - Kelola Produk</title>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Gurajada&family=Funnel+Sans:wght@400;500;600;700&family=42dot+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin_produk.css') }}">

    <style>
        .status-badge.status-pending {
            background-color: rgba(251, 188, 5, 0.16);
            color: #FBBC05;
            border: 1px solid rgba(251, 188, 5, 0.45);
        }

        .action-button.approve {
            background-color: rgba(34, 197, 94, 0.16);
            color: #22C55E;
            border: 1px solid rgba(34, 197, 94, 0.45);
        }

        .action-button.approve:hover {
            background-color: #22C55E;
            color: #FFFFFF;
        }

        .action-button.reject {
            background-color: rgba(239, 68, 68, 0.16);
            color: #EF4444;
            border: 1px solid rgba(239, 68, 68, 0.45);
        }

        .action-button.reject:hover {
            background-color: #EF4444;
            color: #FFFFFF;
        }

        .pending-badge-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 20px;
            height: 20px;
            padding: 0 6px;
            margin-left: 6px;
            border-radius: 999px;
            background-color: #EF4444;
            color: #FFFFFF;
            font-size: 11px;
            font-weight: 700;
        }

        /* Modal Preview & ACC Admin */
        .admin-modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.72);
            z-index: 9999;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .admin-modal-overlay.show {
            display: flex;
        }

        .admin-modal-box {
            width: 100%;
            max-width: 500px;
            background: #0F172A;
            border: 1px solid #058CFB;
            border-radius: 16px;
            padding: 24px;
            color: #FFFFFF;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.65);
        }

        .admin-modal-box h3 {
            font-size: 19px;
            margin-bottom: 12px;
        }

        .admin-modal-box img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 14px;
            border: 1px solid #334155;
        }

        .admin-modal-meta {
            font-size: 13.5px;
            color: #CBD5E1;
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: 16px;
        }

        .admin-modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn-modal {
            padding: 8px 16px;
            border-radius: 8px;
            border: none;
            font-weight: 700;
            font-size: 13px;
            cursor: pointer;
        }

        .btn-modal.close {
            background: #334155;
            color: #FFFFFF;
        }

        .btn-modal.acc {
            background: #22C55E;
            color: #FFFFFF;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header class="admin-header">

        <a href="/admin/dashboard" class="brand">
            <img src="{{ asset('images/v341_395.png') }}" alt="NEXAKUN">
        </a>

        <a href="/admin/notifikasi" class="notification-button">
            <i class="fa-regular fa-bell"></i>
            <span class="notification-count" id="notifCount">2</span>
        </a>

    </header>

    <!-- SIDEBAR -->
    <aside class="admin-sidebar">

        <nav class="sidebar-menu">

            <!-- DASHBOARD -->
            <a href="/admin/dashboard" class="menu-link">
                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>
            </a>

            <!-- KELOLA PRODUK -->
            <a href="/admin/produk" class="menu-link active">
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

        <!-- PAGE HEADING -->
        <section class="page-heading">

            <h1>Kelola Produk</h1>

            <p>
                Pantau transaksi, kelola akun game, dan pastikan setiap
                aktivitas marketplace berjalan aman, cepat, dan terpercaya.
            </p>

        </section>


        <!-- PRODUCT FILTER -->
        <section class="product-tabs">

            <button class="tab-button active" data-filter="semua">
                Semua Produk
            </button>

            <button class="tab-button" data-filter="validasi" id="tabValidasiBtn">
                Validasi Produk <span class="pending-badge-count" id="pendingBadgeCount">0</span>
            </button>

        </section>


        <!-- PRODUCT TABLE -->
        <section class="product-panel">

            <div class="table-toolbar">

                <div class="status-pill-group" id="statusPillGroup" role="group" aria-label="Filter Status Produk">
                    <button type="button" class="status-pill-btn" data-subfilter="terjual">TERJUAL</button>
                    <button type="button" class="status-pill-btn active" data-subfilter="tersedia">TERSEDIA</button>
                </div>

                <div class="toolbar-actions">
                    <button type="button" class="btn-print" onclick="window.print()" title="Cetak Data Produk">
                        <i class="fa-solid fa-print"></i>
                        <span>Cetak</span>
                    </button>

                    <label class="search-box">
                        <input type="search" id="productSearch" placeholder="Cari Produk...">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </label>
                </div>

            </div>


            <div class="table-scroll">

                <table class="product-table">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Toko</th>
                            <th>Kategori</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody id="productTableBody">

                        <tr data-status="aktif">
                            <td>1</td>
                            <td>SkyStore</td>
                            <td>PUBG</td>
                            <td class="product-name">
                                PUBG Mobile UC 60 – Top Up Instant All Server
                            </td>
                            <td>Rp15.000</td>
                            <td>
                                <span class="status-badge status-active">Aktif</span>
                            </td>
                            <td class="action-cell">
                                <button class="action-button view" title="Lihat">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                                <button class="action-button edit" title="Edit">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                            </td>
                        </tr>

                        <tr data-status="aktif">
                            <td>2</td>
                            <td>GameZone</td>
                            <td>Mobile Legends</td>
                            <td class="product-name">
                                MoLe 86 Diamond – Weekly Special Bundle
                            </td>
                            <td>Rp22.000</td>
                            <td>
                                <span class="status-badge status-active">Aktif</span>
                            </td>
                            <td class="action-cell">
                                <button class="action-button view" title="Lihat">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                                <button class="action-button edit" title="Edit">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                            </td>
                        </tr>

                        <tr data-status="aktif">
                            <td>3</td>
                            <td>DiamondHub</td>
                            <td>Mobile Legends</td>
                            <td class="product-name">
                                Mobile Legends 172 Diamond-Fast Delivery Original
                            </td>
                            <td>Rp43.000</td>
                            <td>
                                <span class="status-badge status-active">Aktif</span>
                            </td>
                            <td class="action-cell">
                                <button class="action-button view" title="Lihat">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                                <button class="action-button edit" title="Edit">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                            </td>
                        </tr>

                        <tr data-status="aktif">
                            <td>4</td>
                            <td>FF Paradise</td>
                            <td>Free Fire</td>
                            <td class="product-name">
                                Free Fire 210 Diamond – Regular Diamond Package
                            </td>
                            <td>Rp32.000</td>
                            <td>
                                <span class="status-badge status-active">Aktif</span>
                            </td>
                            <td class="action-cell">
                                <button class="action-button view" title="Lihat">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                                <button class="action-button edit" title="Edit">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                            </td>
                        </tr>

                        <tr data-status="aktif">
                            <td>5</td>
                            <td>NovaGaming</td>
                            <td>PUBG</td>
                            <td class="product-name">
                                PUBG Mobile – 3.850 UC
                            </td>
                            <td>Rp799.000</td>
                            <td>
                                <span class="status-badge status-active">Aktif</span>
                            </td>
                            <td class="action-cell">
                                <button class="action-button view" title="Lihat">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                                <button class="action-button edit" title="Edit">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                            </td>
                        </tr>

                        <tr data-status="terjual">
                            <td>6</td>
                            <td>NovaGaming</td>
                            <td>Mobile Legends</td>
                            <td class="product-name">
                                Mobile Legends – 706 Diamond
                            </td>
                            <td>Rp170.000</td>
                            <td>
                                <span class="status-badge status-sold">Terjual</span>
                            </td>
                            <td class="action-cell">
                                <button class="action-button view" title="Lihat">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </td>
                        </tr>

                        <tr data-status="terjual">
                            <td>7</td>
                            <td>ProPlayer Store</td>
                            <td>PUBG</td>
                            <td class="product-name">
                                PUBG Mobile UC 1.800-Ultimate UC Recharge Package
                            </td>
                            <td>Rp399.000</td>
                            <td>
                                <span class="status-badge status-sold">Terjual</span>
                            </td>
                            <td class="action-cell">
                                <button class="action-button view" title="Lihat">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </td>
                        </tr>

                        <tr data-status="terjual">
                            <td>8</td>
                            <td>ProPlayer Store</td>
                            <td>Free Fire</td>
                            <td class="product-name">
                                Free Fire 720 Diamond – Exclusive Diamond Package
                            </td>
                            <td>Rp105.000</td>
                            <td>
                                <span class="status-badge status-sold">Terjual</span>
                            </td>
                            <td class="action-cell">
                                <button class="action-button view" title="Lihat">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </td>
                        </tr>

                    </tbody>

                </table>

                <p class="empty-message" id="emptyMessage" hidden>
                    Produk tidak ditemukan.
                </p>

            </div>


            <!-- TABLE FOOTER -->
            <div class="table-footer">

                <span class="table-info" id="tableInfo">
                    Menampilkan 8 produk
                </span>

                <div class="pagination">
                    <button class="page-button current">1</button>
                    <button class="page-button">
                        <i class="fa-solid fa-angles-right"></i>
                    </button>
                </div>

            </div>

        </section>

    </main>

    <!-- MODAL DETAIL VALIDASI PRODUK -->
    <div class="admin-modal-overlay" id="detailValidationModal" onclick="closeValidationModal()">
        <div class="admin-modal-box" onclick="event.stopPropagation()">
            <h3 id="valModalTitle">Detail Pengajuan Produk</h3>
            <img id="valModalImg" src="./images/v270_378.png" alt="Screenshot Akun">
            <div class="admin-modal-meta">
                <div><strong>Toko Penjual:</strong> <span id="valModalToko">-</span></div>
                <div><strong>Kategori Game:</strong> <span id="valModalKategori">-</span></div>
                <div><strong>Harga Jual:</strong> <span id="valModalHarga" style="color:#058CFB;">-</span></div>
                <div><strong>Spesifikasi Akun:</strong> <span id="valModalDesc">-</span></div>
            </div>
            <div class="admin-modal-actions">
                <button type="button" class="btn-modal close" onclick="closeValidationModal()">Tutup</button>
                <button type="button" class="btn-modal acc" id="valModalAccBtn">
                    <i class="fa-solid fa-check"></i> ACC & Tayangkan
                </button>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer id="contact">
        © 2026 NEXAKUN. Platform jual beli akun game.
    </footer>


    <!-- JAVASCRIPT -->
    <script>
        const STORAGE_KEY = "nexakun_pending_products";
        const NOTIF_KEY = "nexakun_seller_notifications";
        const searchInput = document.getElementById("productSearch");
        const tableBody = document.getElementById("productTableBody");
        const tabs = document.querySelectorAll(".tab-button");
        const statusPillGroup = document.getElementById("statusPillGroup");
        const subFilterButtons = document.querySelectorAll(".status-pill-btn");
        const emptyMessage = document.getElementById("emptyMessage");
        const tableInfo = document.getElementById("tableInfo");
        const pendingBadgeCount = document.getElementById("pendingBadgeCount");

        let activeFilter = "semua";
        let activeSubFilter = "tersedia";

        // Helper kirim notifikasi ke penjual
        function pushSellerNotification(type, title, message) {
            const notifList = JSON.parse(localStorage.getItem(NOTIF_KEY) || "[]");
            const nowStr = new Date().toLocaleDateString("id-ID", { day: "2-digit", month: "short", year: "numeric" }) + " · " + new Date().toTimeString().slice(0, 5) + " WIB";

            notifList.unshift({
                id: "NOTIF-" + Date.now(),
                type: type,
                title: title,
                message: message,
                time: nowStr,
                unread: true
            });

            localStorage.setItem(NOTIF_KEY, JSON.stringify(notifList));
        }

        // 1. Muat data pengajuan penjual dari localStorage
        function getPendingProducts() {
            let saved = JSON.parse(localStorage.getItem(STORAGE_KEY) || "null");
            if (!saved) {
                saved = [
                    {
                        id: "PRD-DEFAULT-01",
                        toko: "ALDONESIA HENGKER TZY",
                        kategori: "Free Fire",
                        nama: "Akun Free Fire Sultan – EVO MAX 6 | BUNDEL BLUELOCK 3",
                        harga: "Rp1.000.000",
                        deskripsi: "EVO MAX ADA 6 | BUNDEL BLUELOCK ADA 3 | CELANA ENJEL BIRU ON",
                        gambar: "./images/v270_378.png",
                        status: "validasi"
                    }
                ];
                localStorage.setItem(STORAGE_KEY, JSON.stringify(saved));
            }
            return saved;
        }

        // 2. Render baris produk dinamis ke dalam tabel admin
        function renderDynamicProducts() {
            document.querySelectorAll("tr.dynamic-product-row").forEach(tr => tr.remove());

            const dynamicList = getPendingProducts();
            let pendingCount = 0;

            dynamicList.forEach((item) => {
                if (item.status === "validasi") pendingCount++;

                const tr = document.createElement("tr");
                tr.className = "dynamic-product-row";
                tr.dataset.status = item.status;
                tr.dataset.id = item.id;

                const isPending = item.status === "validasi";
                const statusBadge = isPending
                    ? `<span class="status-badge status-pending">Menunggu Validasi</span>`
                    : `<span class="status-badge status-active">Aktif</span>`;

                const actionButtons = isPending
                    ? `
                        <button type="button" class="action-button view" title="Cek Detail Akun" onclick="openValidationModal('${item.id}')">
                            <i class="fa-regular fa-eye"></i>
                        </button>
                        <button type="button" class="action-button approve" title="ACC / Setujui Produk" onclick="approveProduct('${item.id}')">
                            <i class="fa-solid fa-check"></i>
                        </button>
                        <button type="button" class="action-button reject" title="Tolak Produk" onclick="rejectProduct('${item.id}')">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                      `
                    : `
                        <button type="button" class="action-button view" title="Lihat" onclick="openValidationModal('${item.id}')">
                            <i class="fa-regular fa-eye"></i>
                        </button>
                        <button type="button" class="action-button edit" title="Edit">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </button>
                      `;

                tr.innerHTML = `
                    <td>-</td>
                    <td>${item.toko}</td>
                    <td>${item.kategori}</td>
                    <td class="product-name">${item.nama}</td>
                    <td>${item.harga}</td>
                    <td>${statusBadge}</td>
                    <td class="action-cell">${actionButtons}</td>
                `;

                tableBody.prepend(tr);
            });

            pendingBadgeCount.textContent = pendingCount;
            pendingBadgeCount.style.display = pendingCount > 0 ? "inline-flex" : "none";

            filterProducts();
        }

        // 3. Fungsi ACC (Setujui) Produk -> status berubah jadi Aktif & kirim notifikasi lolos ke penjual
        function approveProduct(id) {
            const list = getPendingProducts();
            const target = list.find(p => p.id === id);
            if (!target) return;

            if (confirm(`ACC dan tayangkan akun "${target.nama}" ke marketplace?`)) {
                target.status = "aktif";
                localStorage.setItem(STORAGE_KEY, JSON.stringify(list));

                pushSellerNotification(
                    "approved",
                    "Produk Akun Lolos Validasi Admin",
                    `Produk "<strong>${target.nama}</strong>" telah diperiksa dan disetujui Admin. Produk kini aktif dan tampil di marketplace NEXAKUN.`
                );

                closeValidationModal();
                renderDynamicProducts();
                alert("✅ Produk berhasil di-ACC! Akun game kini berstatus Aktif dan notifikasi telah dikirim ke penjual.");
            }
        }

        // 4. Fungsi Tolak Produk -> hapus dari antrean & kirim notifikasi penolakan ke penjual
        function rejectProduct(id) {
            let list = getPendingProducts();
            const target = list.find(p => p.id === id);
            if (!target) return;

            if (confirm(`Tolak pengajuan produk "${target.nama}"?`)) {
                list = list.filter(p => p.id !== id);
                localStorage.setItem(STORAGE_KEY, JSON.stringify(list));

                pushSellerNotification(
                    "rejected",
                    "Pengajuan Produk Ditolak Admin",
                    `Maaf, produk "<strong>${target.nama}</strong>" belum memenuhi syarat validasi. Silakan periksa kembali kelengkapan data akun Anda.`
                );

                closeValidationModal();
                renderDynamicProducts();
                alert("❌ Pengajuan produk telah ditolak dan notifikasi telah dikirim ke penjual.");
            }
        }

        // 5. Modal Cek Detail Sebelum ACC
        function openValidationModal(id) {
            const list = getPendingProducts();
            const item = list.find(p => p.id === id);
            if (!item) return;

            document.getElementById("valModalTitle").textContent = item.nama;
            document.getElementById("valModalImg").src = item.gambar || "./images/v270_378.png";
            document.getElementById("valModalToko").textContent = item.toko;
            document.getElementById("valModalKategori").textContent = item.kategori;
            document.getElementById("valModalHarga").textContent = item.harga;
            document.getElementById("valModalDesc").textContent = item.deskripsi || "-";

            const accBtn = document.getElementById("valModalAccBtn");
            if (item.status === "validasi") {
                accBtn.style.display = "inline-block";
                accBtn.onclick = () => approveProduct(item.id);
            } else {
                accBtn.style.display = "none";
            }

            document.getElementById("detailValidationModal").classList.add("show");
        }

        function closeValidationModal() {
            document.getElementById("detailValidationModal").classList.remove("show");
        }

        // 6. Filter Tab & Pencarian
        function filterProducts() {
            const rows = [...document.querySelectorAll(".product-table tbody tr")];
            const keyword = searchInput.value.toLowerCase().trim();
            let visibleCount = 0;

            rows.forEach((row) => {
                const matchesText = row.textContent.toLowerCase().includes(keyword);
                let matchesFilter = true;

                if (activeFilter === "validasi") {
                    matchesFilter = row.dataset.status === "validasi";
                } else {
                    if (activeSubFilter === "tersedia") {
                        matchesFilter = row.dataset.status === "aktif";
                    } else if (activeSubFilter === "terjual") {
                        matchesFilter = row.dataset.status === "terjual";
                    } else {
                        matchesFilter = row.dataset.status !== "validasi";
                    }
                }

                const showRow = matchesText && matchesFilter;
                row.hidden = !showRow;

                if (showRow) {
                    visibleCount++;
                    row.cells[0].textContent = visibleCount;
                }
            });

            emptyMessage.hidden = visibleCount !== 0;
            tableInfo.textContent = `Menampilkan ${visibleCount} produk`;
        }

        searchInput.addEventListener("input", filterProducts);

        subFilterButtons.forEach((btn) => {
            btn.addEventListener("click", () => {
                if (btn.classList.contains("active")) {
                    btn.classList.remove("active");
                    activeSubFilter = "semua";
                } else {
                    subFilterButtons.forEach((b) => b.classList.remove("active"));
                    btn.classList.add("active");
                    activeSubFilter = btn.dataset.subfilter;
                }
                filterProducts();
            });
        });

        tabs.forEach((tab) => {
            tab.addEventListener("click", () => {
                tabs.forEach((item) => item.classList.remove("active"));
                tab.classList.add("active");
                activeFilter = tab.dataset.filter;

                if (statusPillGroup) {
                    statusPillGroup.style.display = activeFilter === "semua" ? "inline-flex" : "none";
                }

                filterProducts();
            });
        });

        // Jalankan saat halaman dibuka
        renderDynamicProducts();
    </script>

</body>

</html>