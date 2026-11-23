<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEXAKUN - Kelola Pesanan Admin</title>
    <link href="https://fonts.googleapis.com/css?family=Gurajada&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Funnel+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=42dot+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin_pesanan.css') }}">
</head>
<body>

<div class="admin-layout">

    <!-- ── HEADER ── -->
    <header class="admin-header">
        <div class="brand">
            <a href="/admin/dashboard">
                <img src="{{ asset('images/v341_395.png') }}" alt="NEXAKUN">
            </a>
        </div>
        <div class="header-right">
            <span class="admin-label">Admin Panel</span>
            <button type="button" class="bell-btn" id="adminBellBtn" title="Notifikasi" onclick="toggleAdminNotif(event)">
                <i class="fa fa-bell"></i>
                <span class="bell-dot" id="adminBellDot"></span>
            </button>

            <!-- POP-UP NOTIFIKASI LONCENG ADMIN -->
            <div class="notif-dropdown" id="adminNotifDropdown" role="region" aria-label="Notifikasi Admin">
                <div class="notif-header">
                    <i class="fa fa-bell"></i>
                    <h3>Notifikasi</h3>
                </div>

                <div class="notif-list">
                    <div class="notif-item">
                        <span class="notif-badge-icon">🪪</span>
                        <p>Bukti pembayaran baru masuk untuk pesanan <strong>TRX001</strong> (Andi Pratama).</p>
                    </div>

                    <div class="notif-item">
                        <span class="notif-badge-icon">🪪</span>
                        <p>Pengajuan pendaftaran penjual baru menunggu validasi admin.</p>
                    </div>

                    <div class="notif-item">
                        <span class="notif-badge-icon">🪪</span>
                        <p>Pesanan <strong>TRX002</strong> telah selesai dan data akun terkirim ke pembeli.</p>
                    </div>
                </div>

                <div class="notif-divider"></div>

                <button type="button" class="notif-logout-btn" onclick="window.location.href='login.html'">
                    <i class="fa fa-sign-out-alt"></i>
                    <span>Keluar</span>
                </button>
            </div>
        </div>
    </header>

    <!-- ── SIDEBAR ── -->
    <aside class="admin-sidebar">
        <nav class="sidebar-menu">
            <a href="/admin/dashboard" class="menu-link">
                <i class="fa fa-tachometer-alt"></i><span>Dashboard</span>
            </a>
            <a href="/admin/produk" class="menu-link">
                <i class="fa fa-gamepad"></i><span>Kelola Produk</span>
            </a>
            <a href="/admin/user" class="menu-link">
                <i class="fa fa-users"></i><span>Kelola Akun</span>
            </a>
            <a href="/admin/laporan" class="menu-link">
                <i class="fa fa-chart-bar"></i><span>Laporan</span>
            </a>
            <a href="/admin/pesanan" class="menu-link active">
                <i class="fa fa-shopping-bag"></i><span>Pesanan</span>
            </a>
        </nav>
        <div class="sidebar-logout">
            <a href="/index" class="logout-link">
                <i class="fa fa-sign-out-alt"></i><span>Keluar</span>
            </a>
        </div>
    </aside>

    <!-- ── MAIN ── -->
    <main class="admin-main">

        <!-- Page heading -->
        <div class="page-heading">
            <div>
                <h1 class="page-title">Kelola <span>Pesanan</span></h1>
                <p class="page-sub">Verifikasi dan kelola semua pesanan yang masuk.</p>
            </div>
            <button class="btn-print" onclick="window.print()">
                <i class="fa fa-print"></i> Cetak
            </button>
        </div>

        <!-- Filter + Search -->
        <div class="toolbar">
            <div class="search-box">
                <i class="fa fa-search"></i>
                <input type="search" id="searchInput" placeholder="Cari ID transaksi, pembeli..."
                    oninput="filterOrders()">
            </div>
            <div class="filter-pills">
                <button class="pill active" data-status="all"    onclick="setFilter(this,'all')">Semua</button>
                <button class="pill" data-status="menunggu"      onclick="setFilter(this,'menunggu')">Menunggu</button>
                <button class="pill" data-status="selesai"       onclick="setFilter(this,'selesai')">Selesai</button>
                <button class="pill" data-status="ditolak"       onclick="setFilter(this,'ditolak')">Ditolak</button>
            </div>
        </div>

        <!-- Order Table -->
        <div class="table-card">
            <table class="orders-table" id="ordersTable">
                <thead>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Produk</th>
                        <th>Pembeli</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="ordersTbody">
                    <tr data-id="TRX001" data-status="menunggu">
                        <td><strong>TRX001</strong></td>
                        <td>PUBG Mobile – Akun Sultan Level 75</td>
                        <td>Andi Pratama</td>
                        <td><strong>Rp 800.000</strong></td>
                        <td>10 Nov 2026</td>
                        <td class="status-cell"><span class="status-badge badge-wait">Menunggu Verifikasi</span></td>
                        <td class="action-cell">
                            <a href="admin_wait.html?status=menunggu&name=Andi+Pratama&id=TRX001&email=Andi@gmail.com&phone=081234567801&method=Dana+%2F+E-Wallet&total=Rp+800.000&product=PUBG+Mobile+%E2%80%93+Akun+Sultan+Level+75"
                               class="btn-detail">Detail</a>
                            <button type="button" class="btn-delete-order" onclick="openDeleteModal('TRX001', 'PUBG Mobile – Akun Sultan Level 75')">
                                <i class="fa fa-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                    <tr data-id="TRX002" data-status="selesai">
                        <td><strong>TRX002</strong></td>
                        <td>Mobile Legends – Akun 120 Skin</td>
                        <td>Pria Solo</td>
                        <td><strong>Rp 275.000</strong></td>
                        <td>09 Nov 2026</td>
                        <td class="status-cell"><span class="status-badge badge-done">Selesai</span></td>
                        <td class="action-cell">
                            <a href="admin_wait.html?status=selesai&name=Pria+Solo&id=TRX002&email=Owo@gmail.com&phone=0899728487&method=Dana+%2F+E-Wallet&total=Rp+275.000&product=Mobile+Legends+%E2%80%93+Akun+120+Skin"
                               class="btn-detail">Detail</a>
                            <button type="button" class="btn-delete-order" onclick="openDeleteModal('TRX002', 'Mobile Legends – Akun 120 Skin')">
                                <i class="fa fa-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                    <tr data-id="TRX003" data-status="menunggu">
                        <td><strong>TRX003</strong></td>
                        <td>Free Fire – Akun S8 ON</td>
                        <td>Budi Santoso</td>
                        <td><strong>Rp 450.000</strong></td>
                        <td>08 Nov 2026</td>
                        <td class="status-cell"><span class="status-badge badge-wait">Menunggu Verifikasi</span></td>
                        <td class="action-cell">
                            <a href="admin_wait.html?status=menunggu&name=Budi+Santoso&id=TRX003&email=budi@gmail.com&phone=082345678901&method=GoPay&total=Rp+450.000&product=Free+Fire+%E2%80%93+Akun+S8+ON"
                               class="btn-detail">Detail</a>
                            <button type="button" class="btn-delete-order" onclick="openDeleteModal('TRX003', 'Free Fire – Akun S8 ON')">
                                <i class="fa fa-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                    <tr data-id="TRX004" data-status="selesai">
                        <td><strong>TRX004</strong></td>
                        <td>Mobile Legends – Rank Mythic</td>
                        <td>Siti Rahayu</td>
                        <td><strong>Rp 180.000</strong></td>
                        <td>07 Nov 2026</td>
                        <td class="status-cell"><span class="status-badge badge-done">Selesai</span></td>
                        <td class="action-cell">
                            <a href="admin_wait.html?status=selesai&name=Siti+Rahayu&id=TRX004&email=siti@gmail.com&phone=085678901234&method=OVO&total=Rp+180.000&product=Mobile+Legends+%E2%80%93+Rank+Mythic"
                               class="btn-detail">Detail</a>
                            <button type="button" class="btn-delete-order" onclick="openDeleteModal('TRX004', 'Mobile Legends – Rank Mythic')">
                                <i class="fa fa-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                    <tr data-id="TRX005" data-status="ditolak">
                        <td><strong>TRX005</strong></td>
                        <td>PUBG Mobile – Akun Old</td>
                        <td>Rizky Gaming</td>
                        <td><strong>Rp 350.000</strong></td>
                        <td>06 Nov 2026</td>
                        <td class="status-cell"><span class="status-badge badge-reject">Ditolak</span></td>
                        <td class="action-cell">
                            <a href="admin_wait.html?status=ditolak&name=Rizky+Gaming&id=TRX005&email=rizky@gmail.com&phone=087654321098&method=Dana&total=Rp+350.000&product=PUBG+Mobile+%E2%80%93+Akun+Old"
                               class="btn-detail">Detail</a>
                            <button type="button" class="btn-delete-order" onclick="openDeleteModal('TRX005', 'PUBG Mobile – Akun Old')">
                                <i class="fa fa-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                    <tr data-id="TRX006" data-status="menunggu">
                        <td><strong>TRX006</strong></td>
                        <td>Free Fire – Akun FF Diamond</td>
                        <td>Naufal XYZ</td>
                        <td><strong>Rp 220.000</strong></td>
                        <td>05 Nov 2026</td>
                        <td class="status-cell"><span class="status-badge badge-wait">Menunggu Verifikasi</span></td>
                        <td class="action-cell">
                            <a href="admin_wait.html?status=menunggu&name=Naufal+XYZ&id=TRX006&email=naufal@gmail.com&phone=081122334455&method=Transfer+Bank&total=Rp+220.000&product=Free+Fire+%E2%80%93+Akun+FF+Diamond"
                               class="btn-detail">Detail</a>
                            <button type="button" class="btn-delete-order" onclick="openDeleteModal('TRX006', 'Free Fire – Akun FF Diamond')">
                                <i class="fa fa-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- FOOTER -->
        <footer id="contact">
            © 2026 NEXAKUN. Platform jual beli akun game.
        </footer>

    </main>
</div>

<!-- MODAL KONFIRMASI HAPUS PESANAN -->
<div class="delete-modal-overlay" id="deleteModalOverlay" onclick="closeDeleteModal()">
    <div class="delete-modal-card" onclick="event.stopPropagation()">
        <div class="delete-modal-icon">
            <i class="fa fa-trash"></i>
        </div>
        <h3 class="delete-modal-title">Hapus Data Pesanan?</h3>
        <p class="delete-modal-text" id="deleteModalText">
            Pesanan ini akan dihapus permanen dari daftar kelola pesanan.
        </p>
        <div class="delete-modal-actions">
            <button type="button" class="btn-modal-cancel" onclick="closeDeleteModal()">Batal</button>
            <button type="button" class="btn-modal-confirm-del" onclick="confirmDeleteOrder()">Ya, Hapus</button>
        </div>
    </div>
</div>

<script>
    const DELETED_ORDERS_KEY = 'nexakun_deleted_orders';
    let orderIdToDelete = null;

    function getDeletedOrderIds() {
        try {
            return JSON.parse(localStorage.getItem(DELETED_ORDERS_KEY) || '[]');
        } catch (e) {
            return [];
        }
    }

    function openDeleteModal(orderId, productTitle) {
        orderIdToDelete = orderId;
        const textEl = document.getElementById('deleteModalText');
        if (textEl) {
            textEl.innerHTML = `Apakah kamu yakin ingin menghapus pesanan <strong>${orderId}</strong> (${productTitle})? Data yang dihapus tidak akan muncul lagi.`;
        }
        document.getElementById('deleteModalOverlay').classList.add('show');
    }

    function closeDeleteModal() {
        orderIdToDelete = null;
        document.getElementById('deleteModalOverlay').classList.remove('show');
    }

    function confirmDeleteOrder() {
        if (!orderIdToDelete) return;
        const targetId = orderIdToDelete;

        // 1. Simpan ke daftar pesanan yang dihapus agar baris statis maupun dinamis tidak muncul lagi saat refresh
        try {
            const deletedIds = getDeletedOrderIds();
            if (!deletedIds.includes(targetId)) {
                deletedIds.push(targetId);
                localStorage.setItem(DELETED_ORDERS_KEY, JSON.stringify(deletedIds));
            }

            // 2. Hapus dari riwayat transaksi dinamis
            const historyList = JSON.parse(localStorage.getItem('nexakun_order_history') || '[]');
            const updatedHistory = historyList.filter(item => item.kodeOrder !== targetId);
            localStorage.setItem('nexakun_order_history', JSON.stringify(updatedHistory));

            // 3. Jika merupakan last_invoice, bersihkan juga
            const lastInvRaw = localStorage.getItem('nexakun_last_invoice');
            if (lastInvRaw) {
                const lastInv = JSON.parse(lastInvRaw);
                if (lastInv && lastInv.kodeOrder === targetId) {
                    localStorage.removeItem('nexakun_last_invoice');
                }
            }
        } catch (e) {}

        // 4. Hapus baris dari tampilan tabel seketika
        const row = document.querySelector(`#ordersTbody tr[data-id="${CSS.escape(targetId)}"]`);
        if (row) row.remove();

        closeDeleteModal();
    }

    function toggleAdminNotif(event) {
        event.stopPropagation();
        const dropdown = document.getElementById('adminNotifDropdown');
        const dot = document.getElementById('adminBellDot');
        if (dropdown) dropdown.classList.toggle('show');
        if (dot) dot.style.display = 'none';
    }

    document.addEventListener('click', function (e) {
        if (!e.target.closest('.header-right')) {
            const dropdown = document.getElementById('adminNotifDropdown');
            if (dropdown) dropdown.classList.remove('show');
        }
    });

    function formatRupiah(angka) {
        if (typeof angka === 'string' && angka.startsWith('Rp')) return angka;
        return 'Rp ' + (Number(angka) || 0).toLocaleString('id-ID');
    }

    function syncOrderStatusesAndNewOrders() {
        const tbody = document.getElementById('ordersTbody');
        if (!tbody) return;

        const deletedIds = getDeletedOrderIds();

        // Hapus baris statis yang sebelumnya sudah dihapus admin
        tbody.querySelectorAll('tr[data-id]').forEach(row => {
            if (deletedIds.includes(row.dataset.id)) {
                row.remove();
            }
        });

        let historyList = [];
        try {
            historyList = JSON.parse(localStorage.getItem('nexakun_order_history') || '[]');
            const lastInvRaw = localStorage.getItem('nexakun_last_invoice');
            if (lastInvRaw) {
                const lastInv = JSON.parse(lastInvRaw);
                if (
                    lastInv &&
                    lastInv.kodeOrder &&
                    !deletedIds.includes(lastInv.kodeOrder) &&
                    !historyList.some(x => x.kodeOrder === lastInv.kodeOrder)
                ) {
                    historyList.unshift(lastInv);
                    localStorage.setItem('nexakun_order_history', JSON.stringify(historyList));
                }
            }
        } catch (e) {}

        [...historyList].reverse().forEach(item => {
            const kode = item.kodeOrder;
            if (!kode || deletedIds.includes(kode)) return;
            if (!tbody.querySelector(`tr[data-id="${CSS.escape(kode)}"]`)) {
                const statusVal = item.status || 'menunggu';
                const produk = item.namaProduk || 'Akun Game NEXAKUN';
                const pembeli = item.namaPembeli || 'Pembeli NEXAKUN';
                const email = item.emailPembeli || 'pembeli@gmail.com';
                const phone = item.waPembeli || '081234567890';
                const metode = item.metode || 'QRIS / E-Wallet';
                const total = formatRupiah(item.totalBayar || item.hargaProduk || 0);
                const tanggal = item.tanggal || '19 Nov 2026';

                const badgeHtml = statusVal === 'selesai'
                    ? '<span class="status-badge badge-done">Selesai</span>'
                    : statusVal === 'ditolak'
                        ? '<span class="status-badge badge-reject">Ditolak</span>'
                        : '<span class="status-badge badge-wait">Menunggu Verifikasi</span>';

                const detailUrl = `admin_wait.html?status=${encodeURIComponent(statusVal)}&name=${encodeURIComponent(pembeli)}&id=${encodeURIComponent(kode)}&email=${encodeURIComponent(email)}&phone=${encodeURIComponent(phone)}&method=${encodeURIComponent(metode)}&total=${encodeURIComponent(total)}&product=${encodeURIComponent(produk)}`;

                const tr = document.createElement('tr');
                tr.dataset.id = kode;
                tr.dataset.status = statusVal;
                tr.innerHTML = `
                    <td><strong>${kode}</strong></td>
                    <td>${produk}</td>
                    <td>${pembeli}</td>
                    <td><strong>${total}</strong></td>
                    <td>${tanggal}</td>
                    <td class="status-cell">${badgeHtml}</td>
                    <td class="action-cell">
                        <a href="${detailUrl}" class="btn-detail">Detail</a>
                        <button type="button" class="btn-delete-order" data-del-id="${kode}">
                            <i class="fa fa-trash"></i> Hapus
                        </button>
                    </td>
                `;

                tr.querySelector('.btn-delete-order').addEventListener('click', () => {
                    openDeleteModal(kode, produk);
                });

                tbody.prepend(tr);
            }
        });

        try {
            const statusMap = JSON.parse(localStorage.getItem('nexakun_admin_order_status') || '{}');
            Object.keys(statusMap).forEach(orderId => {
                const row = tbody.querySelector(`tr[data-id="${CSS.escape(orderId)}"]`);
                if (!row) return;

                const newStatus = statusMap[orderId];
                row.dataset.status = newStatus;

                const statusCell = row.querySelector('.status-cell');
                if (statusCell) {
                    if (newStatus === 'selesai') {
                        statusCell.innerHTML = '<span class="status-badge badge-done">Selesai</span>';
                    } else if (newStatus === 'ditolak') {
                        statusCell.innerHTML = '<span class="status-badge badge-reject">Ditolak</span>';
                    }
                }

                const detailLink = row.querySelector('.btn-detail');
                if (detailLink) {
                    const url = new URL(detailLink.href, window.location.href);
                    url.searchParams.set('status', newStatus);
                    detailLink.href = url.pathname + url.search;
                }
            });
        } catch (e) {}
    }

    let activeStatus = 'all';

    function setFilter(btn, status) {
        document.querySelectorAll('.pill').forEach(p => p.classList.remove('active'));
        btn.classList.add('active');
        activeStatus = status;
        filterOrders();
    }

    function filterOrders() {
        const q = document.getElementById('searchInput').value.toLowerCase();
        document.querySelectorAll('#ordersTable tbody tr').forEach(row => {
            const matchStatus = activeStatus === 'all' || row.dataset.status === activeStatus;
            const matchText   = row.textContent.toLowerCase().includes(q);
            row.style.display = (matchStatus && matchText) ? '' : 'none';
        });
    }

    document.addEventListener('DOMContentLoaded', syncOrderStatusesAndNewOrders);
</script>

</body>
</html>