<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEXAKUN - Kelola Akun</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Gurajada&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Funnel+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=42dot+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin_user.css') }}" />
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

            <a href="/admin/admin_notifikasi" class="notification-button" aria-label="Notifikasi">
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

                <!-- KELOLA AKUN (ACTIVE) -->
                <a href="/admin/user" class="menu-link active">
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
            <a href="/index"
            
            " class="logout-link sidebar-logout">
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
                <h1>Kelola Pengguna</h1>
                <p>
                    Pantau transaksi, kelola akun pengguna marketplace, dan validasi berkas penjual untuk memastikan
                    ekosistem perdagangan akun game yang aman dan terpercaya.
                </p>
            </section>


            <!-- TABS NAVIGATION -->
            <section class="account-tabs" role="tablist">
                <button type="button" class="tab-button active" id="tabSemua" data-tab="semua" role="tab"
                    aria-selected="true" aria-controls="panelSemua">
                    Semua Pengguna
                </button>
                <button type="button" class="tab-button" id="tabValidasi" data-tab="validasi" role="tab"
                    aria-selected="false" aria-controls="panelValidasi">
                    Validasi Penjual
                </button>
            </section>


            <!-- ==========================================
                 PANEL 1: SEMUA PENGGUNA
                 ========================================== -->
            <section class="account-panel" id="panelSemua" role="tabpanel" aria-labelledby="tabSemua">

                <div class="table-toolbar">
                    <!-- FILTER ROLE (SEMUA / PEMBELI / PENJUAL) -->
                    <div class="pill-group" id="rolePillGroup" role="group" aria-label="Filter Role Pengguna">
                        <button type="button" class="pill-btn active" data-role="semua">SEMUA</button>
                        <button type="button" class="pill-btn" data-role="pembeli">PEMBELI</button>
                        <button type="button" class="pill-btn" data-role="penjual">PENJUAL</button>
                    </div>

                    <!-- ACTIONS (CETAK + SEARCH) -->
                    <div class="toolbar-actions">
                        <button type="button" class="btn-print" onclick="window.print()" title="Cetak Data Pengguna">
                            <i class="fa-solid fa-print"></i>
                            <span>Cetak</span>
                        </button>

                        <!-- SEARCH BAR -->
                        <label class="search-box">
                            <input type="search" id="userSearch" placeholder="Cari Pengguna...">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </label>
                    </div>
                </div>

                <!-- TABLE SEMUA PENGGUNA -->
                <div class="table-scroll">
                    <table class="account-table" id="userTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>No Telepon</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-role="pembeli" data-status="aktif">
                                <td>1</td>
                                <td>user_sakura</td>
                                <td>sakura@gmail.com</td>
                                <td>081234567801</td>
                                <td><span class="role-badge">Pembeli</span></td>
                                <td><span class="status-badge status-active">Aktif</span></td>
                                <td class="action-cell">
                                    <button class="action-button" title="Lihat Profil"><i
                                            class="fa-regular fa-eye"></i></button>
                                    <button class="action-button edit" title="Edit Pengguna"><i
                                            class="fa-regular fa-pen-to-square"></i></button>
                                    <button class="action-button delete" title="Hapus Pengguna"><i
                                            class="fa-regular fa-trash-can"></i></button>
                                </td>
                            </tr>
                            <tr data-role="pembeli" data-status="aktif">
                                <td>2</td>
                                <td>gamerboy123</td>
                                <td>gamerboy@gmail.com</td>
                                <td>081234567802</td>
                                <td><span class="role-badge">Pembeli</span></td>
                                <td><span class="status-badge status-active">Aktif</span></td>
                                <td class="action-cell">
                                    <button class="action-button" title="Lihat Profil"><i
                                            class="fa-regular fa-eye"></i></button>
                                    <button class="action-button edit" title="Edit Pengguna"><i
                                            class="fa-regular fa-pen-to-square"></i></button>
                                    <button class="action-button delete" title="Hapus Pengguna"><i
                                            class="fa-regular fa-trash-can"></i></button>
                                </td>
                            </tr>
                            <tr data-role="pembeli" data-status="aktif">
                                <td>3</td>
                                <td>proplayer99</td>
                                <td>proplayer@gmail.com</td>
                                <td>081234567805</td>
                                <td><span class="role-badge">Pembeli</span></td>
                                <td><span class="status-badge status-active">Aktif</span></td>
                                <td class="action-cell">
                                    <button class="action-button" title="Lihat Profil"><i
                                            class="fa-regular fa-eye"></i></button>
                                    <button class="action-button edit" title="Edit Pengguna"><i
                                            class="fa-regular fa-pen-to-square"></i></button>
                                    <button class="action-button delete" title="Hapus Pengguna"><i
                                            class="fa-regular fa-trash-can"></i></button>
                                </td>
                            </tr>
                            <tr data-role="pembeli" data-status="aktif">
                                <td>4</td>
                                <td>nexagirl</td>
                                <td>nexagirl@gmail.com</td>
                                <td>081234567809</td>
                                <td><span class="role-badge">Pembeli</span></td>
                                <td><span class="status-badge status-active">Aktif</span></td>
                                <td class="action-cell">
                                    <button class="action-button" title="Lihat Profil"><i
                                            class="fa-regular fa-eye"></i></button>
                                    <button class="action-button edit" title="Edit Pengguna"><i
                                            class="fa-regular fa-pen-to-square"></i></button>
                                    <button class="action-button delete" title="Hapus Pengguna"><i
                                            class="fa-regular fa-trash-can"></i></button>
                                </td>
                            </tr>
                            <tr data-role="penjual" data-status="aktif">
                                <td>5</td>
                                <td>NovaGaming</td>
                                <td>novanovplayer@gmail.com</td>
                                <td>081234567813</td>
                                <td><span class="role-badge penjual">Penjual</span></td>
                                <td><span class="status-badge status-active">Aktif</span></td>
                                <td class="action-cell">
                                    <button class="action-button" title="Lihat Profil"><i
                                            class="fa-regular fa-eye"></i></button>
                                    <button class="action-button edit" title="Edit Pengguna"><i
                                            class="fa-regular fa-pen-to-square"></i></button>
                                    <button class="action-button delete" title="Hapus Pengguna"><i
                                            class="fa-regular fa-trash-can"></i></button>
                                </td>
                            </tr>
                            <tr data-role="pembeli" data-status="aktif">
                                <td>6</td>
                                <td>mythicplayer</td>
                                <td>mythicplayer@gmail.com</td>
                                <td>081234567815</td>
                                <td><span class="role-badge">Pembeli</span></td>
                                <td><span class="status-badge status-active">Aktif</span></td>
                                <td class="action-cell">
                                    <button class="action-button" title="Lihat Profil"><i
                                            class="fa-regular fa-eye"></i></button>
                                    <button class="action-button edit" title="Edit Pengguna"><i
                                            class="fa-regular fa-pen-to-square"></i></button>
                                    <button class="action-button delete" title="Hapus Pengguna"><i
                                            class="fa-regular fa-trash-can"></i></button>
                                </td>
                            </tr>
                            <tr data-role="pembeli" data-status="aktif">
                                <td>7</td>
                                <td>shadowx77</td>
                                <td>shadowx@gmail.com</td>
                                <td>081234567814</td>
                                <td><span class="role-badge">Pembeli</span></td>
                                <td><span class="status-badge status-active">Aktif</span></td>
                                <td class="action-cell">
                                    <button class="action-button" title="Lihat Profil"><i
                                            class="fa-regular fa-eye"></i></button>
                                    <button class="action-button edit" title="Edit Pengguna"><i
                                            class="fa-regular fa-pen-to-square"></i></button>
                                    <button class="action-button delete" title="Hapus Pengguna"><i
                                            class="fa-regular fa-trash-can"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <p class="empty-message" id="userEmptyMessage" hidden>Pengguna tidak ditemukan.</p>
                </div>

                <!-- TABLE FOOTER -->
                <div class="table-footer">
                    <span class="table-info" id="userInfo">Menampilkan 7 pengguna</span>
                    <div class="pagination">
                        <button class="page-button current">1</button>
                        <button class="page-button"><i class="fa-solid fa-angles-right"></i></button>
                    </div>
                </div>

            </section>


            <!-- ==========================================
                 PANEL 2: VALIDASI PENJUAL (DARI validasi_akun.html)
                 ========================================== -->
            <section class="account-panel hidden" id="panelValidasi" role="tabpanel" aria-labelledby="tabValidasi">

                <div class="table-toolbar">
                    <!-- FILTER STATUS (SEMUA / MENUNGGU / DISETUJUI / DITOLAK) -->
                    <div class="pill-group" id="statusPillGroup" role="group" aria-label="Filter Status Validasi">
                        <button type="button" class="pill-btn active" data-vstatus="semua">SEMUA</button>
                        <button type="button" class="pill-btn" data-vstatus="menunggu">MENUNGGU</button>
                        <button type="button" class="pill-btn" data-vstatus="disetujui">DISETUJUI</button>
                        <button type="button" class="pill-btn" data-vstatus="ditolak">DITOLAK</button>
                    </div>

                    <!-- ACTIONS (CETAK + SEARCH) -->
                    <div class="toolbar-actions">
                        <button type="button" class="btn-print" onclick="window.print()"
                            title="Cetak Data Validasi Penjual">
                            <i class="fa-solid fa-print"></i>
                            <span>Cetak</span>
                        </button>

                        <!-- SEARCH BAR -->
                        <label class="search-box">
                            <input type="search" id="validationSearch" placeholder="Cari Toko / Nama / No HP...">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </label>
                    </div>
                </div>

                <!-- TABLE VALIDASI PENJUAL -->
                <div class="table-scroll">
                    <table class="account-table" id="validationTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Toko</th>
                                <th>Nama</th>
                                <th>No HP</th>
                                <th>Dokumen</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-vstatus="menunggu">
                                <td>1</td>
                                <td><strong>freefire_id</strong></td>
                                <td>FipeMarket Store</td>
                                <td>081234567801</td>
                                <td>
                                    <button type="button" class="doc-button"
                                        onclick="showDocModal('freefire_id', 'KTP & Surat Izin Usaha')">
                                        <i class="fa-solid fa-file-lines"></i> Dokumen
                                    </button>
                                </td>
                                <td><span class="status-badge status-waiting">Menunggu</span></td>
                                <td class="action-cell">
                                    <button class="action-button approve" title="Setujui Validasi"
                                        onclick="handleValidation(this, 'disetujui')"><i
                                            class="fa-solid fa-check"></i></button>
                                    <button class="action-button reject" title="Tolak Validasi"
                                        onclick="handleValidation(this, 'ditolak')"><i
                                            class="fa-solid fa-xmark"></i></button>
                                    <button class="action-button" title="Detail Toko"><i
                                            class="fa-regular fa-eye"></i></button>
                                </td>
                            </tr>

                            <tr data-vstatus="disetujui">
                                <td>2</td>
                                <td><strong>sky_gaming</strong></td>
                                <td>Diamond Palace</td>
                                <td>081234567802</td>
                                <td>
                                    <button type="button" class="doc-button"
                                        onclick="showDocModal('sky_gaming', 'KTP & NIB Terverifikasi')">
                                        <i class="fa-solid fa-file-lines"></i> Dokumen
                                    </button>
                                </td>
                                <td><span class="status-badge status-approved">Disetujui</span></td>
                                <td class="action-cell">
                                    <button class="action-button" title="Detail Toko"><i
                                            class="fa-regular fa-eye"></i></button>
                                </td>
                            </tr>

                            <tr data-vstatus="ditolak">
                                <td>3</td>
                                <td><strong>rizkygaming</strong></td>
                                <td>Mochi Game House</td>
                                <td>081234567805</td>
                                <td>
                                    <button type="button" class="doc-button"
                                        onclick="showDocModal('rizkygaming', 'Dokumen KTP Tidak Jelas')">
                                        <i class="fa-solid fa-file-lines"></i> Dokumen
                                    </button>
                                </td>
                                <td><span class="status-badge status-rejected">Ditolak</span></td>
                                <td class="action-cell">
                                    <button class="action-button" title="Detail Toko"><i
                                            class="fa-regular fa-eye"></i></button>
                                </td>
                            </tr>

                            <tr data-vstatus="menunggu">
                                <td>4</td>
                                <td><strong>nexagirl</strong></td>
                                <td>BlueSky Marketplace</td>
                                <td>081234567809</td>
                                <td>
                                    <button type="button" class="doc-button"
                                        onclick="showDocModal('nexagirl', 'KTP & Surat Izin Usaha')">
                                        <i class="fa-solid fa-file-lines"></i> Dokumen
                                    </button>
                                </td>
                                <td><span class="status-badge status-waiting">Menunggu</span></td>
                                <td class="action-cell">
                                    <button class="action-button approve" title="Setujui Validasi"
                                        onclick="handleValidation(this, 'disetujui')"><i
                                            class="fa-solid fa-check"></i></button>
                                    <button class="action-button reject" title="Tolak Validasi"
                                        onclick="handleValidation(this, 'ditolak')"><i
                                            class="fa-solid fa-xmark"></i></button>
                                    <button class="action-button" title="Detail Toko"><i
                                            class="fa-regular fa-eye"></i></button>
                                </td>
                            </tr>

                            <tr data-vstatus="disetujui">
                                <td>5</td>
                                <td><strong>diamondqueen</strong></td>
                                <td>Phoenix Digital</td>
                                <td>081234567813</td>
                                <td>
                                    <button type="button" class="doc-button"
                                        onclick="showDocModal('diamondqueen', 'KTP & Rekening Bank Terverifikasi')">
                                        <i class="fa-solid fa-file-lines"></i> Dokumen
                                    </button>
                                </td>
                                <td><span class="status-badge status-approved">Disetujui</span></td>
                                <td class="action-cell">
                                    <button class="action-button" title="Detail Toko"><i
                                            class="fa-regular fa-eye"></i></button>
                                </td>
                            </tr>

                            <tr data-vstatus="disetujui">
                                <td>6</td>
                                <td><strong>firelegend88</strong></td>
                                <td>Pixel Universe</td>
                                <td>081234567815</td>
                                <td>
                                    <button type="button" class="doc-button"
                                        onclick="showDocModal('firelegend88', 'KTP & Verifikasi Wajah')">
                                        <i class="fa-solid fa-file-lines"></i> Dokumen
                                    </button>
                                </td>
                                <td><span class="status-badge status-approved">Disetujui</span></td>
                                <td class="action-cell">
                                    <button class="action-button" title="Detail Toko"><i
                                            class="fa-regular fa-eye"></i></button>
                                </td>
                            </tr>

                            <tr data-vstatus="ditolak">
                                <td>7</td>
                                <td><strong>naufalxyz</strong></td>
                                <td>Naufal Game Store</td>
                                <td>081234567814</td>
                                <td>
                                    <button type="button" class="doc-button"
                                        onclick="showDocModal('naufalxyz', 'Identitas Tidak Sesuai Rekening')">
                                        <i class="fa-solid fa-file-lines"></i> Dokumen
                                    </button>
                                </td>
                                <td><span class="status-badge status-rejected">Ditolak</span></td>
                                <td class="action-cell">
                                    <button class="action-button" title="Detail Toko"><i
                                            class="fa-regular fa-eye"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <p class="empty-message" id="validationEmptyMessage" hidden>Data validasi penjual tidak ditemukan.
                    </p>
                </div>

                <!-- TABLE FOOTER -->
                <div class="table-footer">
                    <span class="table-info" id="validationInfo">Menampilkan 7 permohonan validasi</span>
                    <div class="pagination">
                        <button class="page-button current">1</button>
                        <button class="page-button"><i class="fa-solid fa-angles-right"></i></button>
                    </div>
                </div>

            </section>

        </main>

    </div>


    <!-- ==========================================
         MODAL PREVIEW DOKUMEN PENJUAL
         ========================================== -->
    <div class="modal-overlay" id="docModalOverlay">
        <div class="modal-box">
            <div class="modal-header">
                <h3 id="modalStoreTitle">Verifikasi Dokumen Toko</h3>
                <button type="button" class="modal-close-btn" onclick="closeDocModal()"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <div class="doc-preview-card">
                    <i class="fa-solid fa-id-card"></i>
                    <p id="modalDocDesc" style="color: #ffffff; font-weight: 600;">KTP & Berkas Usaha Terverifikasi</p>
                    <span style="font-size: 11px; color: var(--text-muted);">Format: PDF / JPG (Ukuran: 2.4 MB)</span>
                </div>
                <ul class="doc-detail-list">
                    <li>Nama Toko: <strong id="modalStoreName">-</strong></li>
                    <li>Status Identitas: <strong>NIK & Wajah Valid</strong></li>
                    <li>Waktu Pengajuan: <strong>10 Nov 2026, 11:45 WIB</strong></li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="modal-action-btn secondary" onclick="closeDocModal()">Tutup</button>
            </div>
        </div>
    </div>


    <!-- ==========================================
         JAVASCRIPT LOGIC
         ========================================== -->
    <script>
        // Tab elements
        const tabButtons = document.querySelectorAll(".tab-button");
        const panelSemua = document.getElementById("panelSemua");
        const panelValidasi = document.getElementById("panelValidasi");

        // User table elements
        const userSearch = document.getElementById("userSearch");
        const roleButtons = document.querySelectorAll("#rolePillGroup .pill-btn");
        const userRows = [...document.querySelectorAll("#userTable tbody tr")];
        const userEmptyMessage = document.getElementById("userEmptyMessage");
        const userInfo = document.getElementById("userInfo");
        let activeRole = "semua";

        // Validation table elements
        const validationSearch = document.getElementById("validationSearch");
        const vstatusButtons = document.querySelectorAll("#statusPillGroup .pill-btn");
        const validationRows = [...document.querySelectorAll("#validationTable tbody tr")];
        const validationEmptyMessage = document.getElementById("validationEmptyMessage");
        const validationInfo = document.getElementById("validationInfo");
        let activeVStatus = "semua";

        // Switch Tabs Function
        function switchTab(targetTab) {
            tabButtons.forEach(btn => {
                const isActive = btn.dataset.tab === targetTab;
                btn.classList.toggle("active", isActive);
                btn.setAttribute("aria-selected", isActive);
            });

            if (targetTab === "semua") {
                panelSemua.classList.remove("hidden");
                panelValidasi.classList.add("hidden");
                filterUsers();
            } else if (targetTab === "validasi") {
                panelSemua.classList.add("hidden");
                panelValidasi.classList.remove("hidden");
                filterValidations();
            }
        }

        tabButtons.forEach(btn => {
            btn.addEventListener("click", () => {
                switchTab(btn.dataset.tab);
            });
        });

        // Filter User Table
        function filterUsers() {
            const keyword = userSearch.value.toLowerCase().trim();
            let count = 0;

            userRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                const matchSearch = text.includes(keyword);
                const matchRole = activeRole === "semua" || row.dataset.role === activeRole;

                const show = matchSearch && matchRole;
                row.hidden = !show;
                if (show) count++;
            });

            userEmptyMessage.hidden = count !== 0;
            userInfo.textContent = `Menampilkan ${count} pengguna`;
        }

        userSearch.addEventListener("input", filterUsers);

        roleButtons.forEach(btn => {
            btn.addEventListener("click", () => {
                roleButtons.forEach(b => b.classList.remove("active"));
                btn.classList.add("active");
                activeRole = btn.dataset.role;
                filterUsers();
            });
        });

        // Filter Validation Table
        function filterValidations() {
            const keyword = validationSearch.value.toLowerCase().trim();
            let count = 0;

            validationRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                const matchSearch = text.includes(keyword);
                const matchStatus = activeVStatus === "semua" || row.dataset.vstatus === activeVStatus;

                const show = matchSearch && matchStatus;
                row.hidden = !show;
                if (show) count++;
            });

            validationEmptyMessage.hidden = count !== 0;
            validationInfo.textContent = `Menampilkan ${count} permohonan validasi`;
        }

        validationSearch.addEventListener("input", filterValidations);

        vstatusButtons.forEach(btn => {
            btn.addEventListener("click", () => {
                vstatusButtons.forEach(b => b.classList.remove("active"));
                btn.classList.add("active");
                activeVStatus = btn.dataset.vstatus;
                filterValidations();
            });
        });

        // Check URL Hash or Query param (?tab=validasi or #validasi)
        const urlParams = new URLSearchParams(window.location.search);
        const hash = window.location.hash;
        if (urlParams.get("tab") === "validasi" || hash === "#validasi") {
            switchTab("validasi");
        }

        // Mock Action: Handle Validation Status Change
        function handleValidation(btn, status) {
            const row = btn.closest("tr");
            const statusCell = row.querySelector("td:nth-child(6)");
            const actionCell = row.querySelector(".action-cell");

            if (status === "disetujui") {
                row.dataset.vstatus = "disetujui";
                statusCell.innerHTML = '<span class="status-badge status-approved">Disetujui</span>';
                actionCell.innerHTML = '<button class="action-button" title="Detail Toko"><i class="fa-regular fa-eye"></i></button>';
                alert("Toko berhasil disetujui sebagai Penjual Terverifikasi!");
            } else if (status === "ditolak") {
                row.dataset.vstatus = "ditolak";
                statusCell.innerHTML = '<span class="status-badge status-rejected">Ditolak</span>';
                actionCell.innerHTML = '<button class="action-button" title="Detail Toko"><i class="fa-regular fa-eye"></i></button>';
                alert("Permohonan toko berhasil ditolak.");
            }
            filterValidations();
        }

        // Modal Dokumen Functions
        const docModalOverlay = document.getElementById("docModalOverlay");
        const modalStoreTitle = document.getElementById("modalStoreTitle");
        const modalStoreName = document.getElementById("modalStoreName");
        const modalDocDesc = document.getElementById("modalDocDesc");

        function showDocModal(toko, info) {
            modalStoreTitle.textContent = `Dokumen: ${toko}`;
            modalStoreName.textContent = toko;
            modalDocDesc.textContent = info;
            docModalOverlay.classList.add("active");
        }

        function closeDocModal() {
            docModalOverlay.classList.remove("active");
        }

        docModalOverlay.addEventListener("click", (e) => {
            if (e.target === docModalOverlay) {
                closeDocModal();
            }
        });
    </script>


        <!-- FOOTER -->
        <footer id="contact">
            © 2026 NEXAKUN. Platform jual beli akun game.
        </footer>
</body>

</html>