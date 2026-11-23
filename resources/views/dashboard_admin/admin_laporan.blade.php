<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEXAKUN - Laporan Aktivitas</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Gurajada&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Funnel+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=42dot+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin_laporan.css') }}" />
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
                <i class="fa-regular fa-bell"></i>
                <span class="notification-count">2</span>
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

                <!-- LAPORAN (ACTIVE) -->
                <a href="/admin/laporan" class="menu-link active">
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
                <h1>Laporan Aktivitas</h1>
                <p>
                    Kelola, lihat, dan unduh laporan aktivitas NEXAKUN mulai dari pendapatan, riwayat transaksi,
                    pertumbuhan pengguna, hingga perputaran produk akun game.
                </p>
            </section>


            <!-- SECTION HEADER & TOOLBAR -->
            <section class="section-header">
                <h2 class="section-title">
                    <i class="fa-solid fa-folder-open"></i> Pilih Jenis Laporan
                </h2>

                <div class="toolbar-actions">
                    <!-- FILTER: LANGSUNG PILIH HARI INI -->
                    <button type="button" class="btn-today" id="btnToday" title="Lihat Laporan Hari Ini">
                        <i class="fa-regular fa-calendar-check"></i>
                        <span>Hari Ini</span>
                    </button>

                    <!-- FILTER: LANGSUNG PILIH TANGGAL -->
                    <label class="date-picker-box" title="Pilih Tanggal Spesifik">
                        <i class="fa-regular fa-calendar"></i>
                        <input type="date" id="reportDatePicker">
                    </label>

                    <!-- BUTTON CETAK -->
                    <button type="button" class="btn-print" onclick="window.print()" title="Cetak Rekap Laporan">
                        <i class="fa-solid fa-print"></i>
                        <span>Cetak</span>
                    </button>

                    <!-- SEARCH BAR -->
                    <label class="search-box">
                        <input type="search" id="reportSearch" placeholder="Cari Aktivitas Laporan...">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </label>
                </div>
            </section>


            <!-- ==========================================
                 REPORT CARDS (4 KATEGORI LAPORAN)
                 ========================================== -->
            <section class="report-grid">

                <!-- 1. LAPORAN PENDAPATAN -->
                <div class="report-card">
                    <div class="report-card-top">
                        <div class="report-icon-box icon-revenue">
                            <i class="fa-solid fa-money-bill-trend-up"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="report-card-title">Laporan Pendapatan</h3>

                        <div class="report-stat-value">Rp 128.500.000</div>
                    </div>
                    <div class="report-card-footer">
                        <button type="button" class="btn-card-view"
                            onclick="openReportModal('Laporan Pendapatan', 'Rekap pemasukan dan komisi transaksi marketplace', 'Rp 128.500.000', '3.580 Transaksi Berhasil', '10 Nov 2026')">
                            Lihat Laporan <i class="fa-solid fa-chevron-right"></i>
                        </button>

                        </button>
                    </div>
                </div>

                <!-- 2. LAPORAN TRANSAKSI -->
                <div class="report-card">
                    <div class="report-card-top">
                        <div class="report-icon-box icon-transactions">
                            <i class="fa-solid fa-receipt"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="report-card-title">Laporan Transaksi</h3>

                        <div class="report-stat-value">3.580 Transaksi</div>
                    </div>
                    <div class="report-card-footer">
                        <button type="button" class="btn-card-view"
                            onclick="openReportModal('Laporan Transaksi', 'Data volume dan status seluruh pesanan marketplace', '3.580 Total Transaksi', '98.4% Berhasil', '10 Nov 2026')">
                            Lihat Laporan <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </div>
                </div>

                <!-- 3. LAPORAN PENGGUNA -->
                <div class="report-card">
                    <div class="report-card-top">
                        <div class="report-icon-box icon-users">
                            <i class="fa-solid fa-users"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="report-card-title">Laporan Pengguna</h3>
                        <div class="report-stat-value">1.240 Pengguna</div>
                    </div>
                    <div class="report-card-footer">
                        <button type="button" class="btn-card-view"
                            onclick="openReportModal('Laporan Pengguna', 'Data demografi pengguna aktif, pembeli, dan penjual', '1.240 Pengguna Aktif', '186 Toko Terverifikasi', '10 Nov 2026')">
                            Lihat Laporan <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </div>
                </div>

                <!-- 4. LAPORAN PRODUK -->
                <div class="report-card">
                    <div class="report-card-top">
                        <div class="report-icon-box icon-products">
                            <i class="fa-solid fa-gamepad"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="report-card-title">Laporan Produk</h3>

                        <div class="report-stat-value">840 Akun Game</div>
                    </div>
                    <div class="report-card-footer">
                        <button type="button" class="btn-card-view"
                            onclick="openReportModal('Laporan Produk', 'Statistik inventaris akun game (Free Fire, Mobile Legends, PUBG)', '840 Akun Terdaftar', '512 Terjual Bulan Ini', '10 Nov 2026')">
                            Lihat Laporan <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </div>
                </div>

            </section>




            <!-- TABLE FOOTER -->
            <div class="table-footer">
                <span class="table-info" id="reportInfo">Menampilkan 4 berkas laporan rekap</span>
                <div class="pagination">
                    <button class="page-button current">1</button>
                    <button class="page-button"><i class="fa-solid fa-angles-right"></i></button>
                </div>
            </div>
            </section>

        </main>

    </div>


    <!-- ==========================================
         MODAL PREVIEW DETAIL LAPORAN
         ========================================== -->
    <div class="modal-overlay" id="reportModalOverlay">
        <div class="modal-box">
            <div class="modal-header">
                <h3 id="modalReportTitle">Detail Ringkasan Laporan</h3>
                <button type="button" class="modal-close-btn" onclick="closeReportModal()"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <div class="modal-detail-card">
                    <div class="modal-detail-row">
                        <span>Deskripsi:</span>
                        <strong id="modalReportDesc">-</strong>
                    </div>
                    <div class="modal-detail-row">
                        <span>Metrik Utama:</span>
                        <strong id="modalReportMetric" style="color: var(--blue);">-</strong>
                    </div>
                    <div class="modal-detail-row">
                        <span>Statistik Pendukung:</span>
                        <strong id="modalReportSub">-</strong>
                    </div>
                    <div class="modal-detail-row">
                        <span>Tanggal Pembuatan:</span>
                        <strong id="modalReportDate">-</strong>
                    </div>
                    <div class="modal-detail-row">
                        <span>Format Dokumen:</span>
                        <strong>PDF, XLSX, CSV</strong>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="modal-btn secondary" onclick="closeReportModal()">Tutup</button>
                <button type="button" class="modal-btn primary" onclick="window.print()">
                    <i class="fa-solid fa-print"></i> Cetak Dokumen
                </button>
            </div>
        </div>
    </div>


    <!-- ==========================================
         JAVASCRIPT LOGIC
         ========================================== -->
    <script>
        // Search Filter Riwayat Laporan
        const reportSearch = document.getElementById("reportSearch");
        const reportRows = [...document.querySelectorAll("#reportTable tbody tr")];
        const reportEmptyMessage = document.getElementById("reportEmptyMessage");
        const reportInfo = document.getElementById("reportInfo");

        function filterReports() {
            const keyword = reportSearch.value.toLowerCase().trim();
            let count = 0;

            reportRows.forEach(row => {
                const match = row.textContent.toLowerCase().includes(keyword);
                row.hidden = !match;
                if (match) count++;
            });

            reportEmptyMessage.hidden = count !== 0;
            reportInfo.textContent = `Menampilkan ${count} berkas laporan rekap`;
        }

        reportSearch.addEventListener("input", filterReports);

        // Filter Langsung: Hari Ini & Langsung Pilih Tanggal
        const btnToday = document.getElementById("btnToday");
        const reportDatePicker = document.getElementById("reportDatePicker");

        // Format tanggal hari ini (YYYY-MM-DD)
        const now = new Date();
        const yyyy = now.getFullYear();
        const mm = String(now.getMonth() + 1).padStart(2, '0');
        const dd = String(now.getDate()).padStart(2, '0');
        const todayStr = `${yyyy}-${mm}-${dd}`;

        // Set default nilai input tanggal ke hari ini
        reportDatePicker.value = todayStr;

        // Klik tombol "Hari Ini"
        btnToday.addEventListener("click", () => {
            reportDatePicker.value = todayStr;
            btnToday.classList.remove("inactive");
            alert(`Menampilkan laporan untuk Hari Ini (${dd}/${mm}/${yyyy})`);
        });

        // Event saat tanggal dipilih langsung lewat date picker
        reportDatePicker.addEventListener("change", (e) => {
            const selectedDate = e.target.value;
            if (selectedDate === todayStr) {
                btnToday.classList.remove("inactive");
            } else {
                btnToday.classList.add("inactive");
            }
            if (selectedDate) {
                const parts = selectedDate.split('-');
                alert(`Memuat laporan untuk tanggal: ${parts[2]}/${parts[1]}/${parts[0]}`);
            }
        });

        // Modal Logic
        const reportModalOverlay = document.getElementById("reportModalOverlay");
        const modalReportTitle = document.getElementById("modalReportTitle");
        const modalReportDesc = document.getElementById("modalReportDesc");
        const modalReportMetric = document.getElementById("modalReportMetric");
        const modalReportSub = document.getElementById("modalReportSub");
        const modalReportDate = document.getElementById("modalReportDate");

        function openReportModal(title, desc, metric, sub, date) {
            modalReportTitle.textContent = title;
            modalReportDesc.textContent = desc;
            modalReportMetric.textContent = metric;
            modalReportSub.textContent = sub;
            modalReportDate.textContent = date;
            reportModalOverlay.classList.add("active");
        }

        function closeReportModal() {
            reportModalOverlay.classList.remove("active");
        }

        reportModalOverlay.addEventListener("click", (e) => {
            if (e.target === reportModalOverlay) {
                closeReportModal();
            }
        });
    </script>


        <!-- FOOTER -->
        <footer id="contact">
            © 2026 NEXAKUN. Platform jual beli akun game.
        </footer>
</body>

</html>