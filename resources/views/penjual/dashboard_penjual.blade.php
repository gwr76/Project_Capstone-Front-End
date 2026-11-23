<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NEXAKUN - Beranda Penjual</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gurajada&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Funnel+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Coda+Caption:wght@800&display=swap" rel="stylesheet">
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
            <a href="/penjual/notifikasi_penjual" class="notification-button" aria-label="Notifikasi">
                <i class="fa-regular fa-bell"></i>
                <span class="notification-badge" id="sellerNotifBadge">2</span>
            </a>

        </header>

        <!-- SIDEBAR -->
        <aside class="penjual-sidebar">

            <nav class="sidebar-menu">

                <!-- DASHBOARD -->
                <a href="/penjual/dashboard" class="menu-link active">
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

            <!-- WELCOME SECTION -->
            <section class="welcome-section">

                <div class="welcome-background"></div>

                <div class="welcome-text">

                    <h1>Welcome Back,<br>Aldonesia TZY</h1>

                    <h2>Kelola NEXAKUN, Lebih Mudah.</h2>

                    <p>
                        Pantau transaksi, kelola akun game, dan pastikan setiap
                        aktivitas marketplace berjalan aman, cepat, dan terpercaya.
                    </p>

                </div>

            </section>

            <!-- TOMBOL POSTING AKUN GAME BARU -->
            <div class="action-posting-wrap">
                <a href="/penjual/upload_produk" class="btn-posting">
                    <i class="fa-solid fa-plus"></i>
                    <span>Posting Akun Game Baru</span>
                </a>
            </div>

            <!-- SUMMARY STATS -->
            <section class="dashboard-summary">

                <!-- PENDING VALIDASI ADMIN -->
                <div class="summary-card">
                    <h3>Pending Validasi Admin</h3>
                    <p class="summary-number" id="dashPendingCount">2</p>
                    <span class="summary-status warning">
                        Menunggu otorisasi admin
                    </span>
                </div>

                <!-- AKUN AKTIF -->
                <div class="summary-card">
                    <h3>Akun Aktif</h3>
                    <p class="summary-number" id="dashActiveCount">3</p>
                    <span class="summary-status primary">
                        Tampil di marketplace
                    </span>
                </div>

                <!-- TOTAL AKUN TERJUAL -->
                <div class="summary-card">
                    <h3>Total Akun Terjual</h3>
                    <p class="summary-number" id="dashSoldCount">120</p>
                    <span class="summary-status success">
                        Transaksi sukses
                    </span>
                </div>

                <!-- PENDAPATAN -->
                <div class="summary-card">
                    <h3>Pendapatan</h3>
                    <p class="summary-number" id="dashRevenueValue" style="font-size: 28px; color: #2FAB26;">Rp 0</p>
                    <span class="summary-status muted" id="dashRevenueNote">
                        Total pendapatan bulan ini
                    </span>
                </div>

            </section>

            <!-- FOOTER -->
            <footer id="contact">
                © 2026 NEXAKUN. Platform jual beli akun game.
            </footer>

        </main>

    </div>

    <script>
        (function syncDashboardRealtimeAuto() {
            const ACTIVE_MONTH_KEY = 'nexakun_report_active_month';
            const ARCHIVE_KEY = 'nexakun_monthly_revenue_archive';
            const DELETED_STORAGE_KEY = 'nexakun_deleted_products';
            const PENDING_UPLOAD_KEY = 'nexakun_pending_products';
            const SECONDARY_UPLOAD_KEY = 'nexakun_uploaded_products';
            const ACTIVE_COUNT_KEY = 'nexakun_active_products_count';

            const BASE_PENDING = 2;
            const BASE_TOTAL_TRANSAKSI = 120;

            const SEED_TRANSACTIONS = [
                { id: 'TRX001', amount: 800000, defaultStatus: 'selesai', yearMonth: '2026-11', product: 'Akun PUBG Level 75 Sultan' },
                { id: 'TRX002', amount: 275000, defaultStatus: 'selesai', yearMonth: '2026-11', product: 'Mobile Legends - 120 Skin Mythic' },
                { id: 'TRX003', amount: 450000, defaultStatus: 'pending', yearMonth: '2026-11', product: 'Free Fire - Akun S8 ON SG 3 Rasa' },
                { id: 'TRX004', amount: 180000, defaultStatus: 'selesai', yearMonth: '2026-11', product: 'Mobile Legends - Rank Mythic 60 Skin' },
                { id: 'TRX005', amount: 350000, defaultStatus: 'dibatalkan', yearMonth: '2026-11', product: 'Akun PUBG Mobile Old Level 50' }
            ];

            let lastSnapshot = '';

            function getCurrentYearMonth(d = new Date()) {
                const y = d.getFullYear();
                const m = String(d.getMonth() + 1).padStart(2, '0');
                return `${y}-${m}`;
            }

            function formatMonthLabel(ym) {
                const [y, m] = String(ym || '').split('-');
                if (!y || !m) return ym;
                const d = new Date(Number(y), Number(m) - 1, 1);
                if (Number.isNaN(d.getTime())) return ym;
                return d.toLocaleDateString('id-ID', { month: 'long', year: 'numeric' });
            }

            function extractNumber(val) {
                if (typeof val === 'number') return Number.isFinite(val) ? val : 0;
                const digits = String(val || '').replace(/[^0-9]/g, '');
                return digits ? parseInt(digits, 10) : 0;
            }

            function formatRp(num) {
                return 'Rp ' + extractNumber(num).toLocaleString('id-ID');
            }

            function getYearMonthFromDate(rawDate) {
                const fallback = getCurrentYearMonth(new Date());
                if (!rawDate) return fallback;
                const parsed = new Date(rawDate);
                if (!Number.isNaN(parsed.getTime())) {
                    return getCurrentYearMonth(parsed);
                }
                const match = String(rawDate).match(/^(\d{4}-\d{2})/);
                return match ? match[1] : fallback;
            }

            function normalizeStatus(st) {
                const s = String(st || 'pending').toLowerCase().trim();
                if (s === 'selesai' || s === 'sukses' || s === 'berhasil' || s === 'terjual') return 'selesai';
                if (s === 'ditolak' || s === 'batal' || s === 'dibatalkan' || s === 'gagal') return 'ditolak';
                return 'pending';
            }

            function buildRawSnapshot() {
                return [
                    localStorage.getItem('nexakun_admin_order_status') || '',
                    localStorage.getItem('nexakun_order_history') || '',
                    localStorage.getItem('nexakun_last_invoice') || '',
                    localStorage.getItem(DELETED_STORAGE_KEY) || '',
                    localStorage.getItem(PENDING_UPLOAD_KEY) || '',
                    localStorage.getItem(SECONDARY_UPLOAD_KEY) || '',
                    getCurrentYearMonth(new Date())
                ].join('||');
            }

            function renderAll(force = false) {
                const snap = buildRawSnapshot();
                if (!force && snap === lastSnapshot) return;
                lastSnapshot = snap;

                const currentYM = getCurrentYearMonth(new Date());

                let statusMap = {};
                let orderHistory = [];
                let lastInvoice = null;
                let deletedIdsArr = [];
                let pendingUploads = [];
                let secondaryUploads = [];

                try {
                    statusMap = JSON.parse(localStorage.getItem('nexakun_admin_order_status') || '{}');
                    orderHistory = JSON.parse(localStorage.getItem('nexakun_order_history') || '[]');
                    lastInvoice = JSON.parse(localStorage.getItem('nexakun_last_invoice') || 'null');
                    deletedIdsArr = JSON.parse(localStorage.getItem(DELETED_STORAGE_KEY) || '[]');
                    pendingUploads = JSON.parse(localStorage.getItem(PENDING_UPLOAD_KEY) || '[]');
                    secondaryUploads = JSON.parse(localStorage.getItem(SECONDARY_UPLOAD_KEY) || '[]');
                } catch (e) {}

                let pendingExtra = 0;
                let completedExtra = 0;
                let monthlyRevenue = 0;
                const soldTitles = new Set();

                const seedIds = new Set(SEED_TRANSACTIONS.map(s => s.id));

                SEED_TRANSACTIONS.forEach(seed => {
                    const effStatus = statusMap[seed.id] ? normalizeStatus(statusMap[seed.id]) : seed.defaultStatus;
                    if (seed.defaultStatus !== 'selesai' && effStatus === 'selesai') {
                        completedExtra += 1;
                    }
                    if (seed.defaultStatus !== 'pending' && effStatus === 'pending') {
                        pendingExtra += 1;
                    }
                    if (seed.defaultStatus === 'pending' && effStatus !== 'pending') {
                        pendingExtra -= 1;
                    }
                    if (effStatus === 'selesai') {
                        soldTitles.add(seed.product.toLowerCase().trim());
                        if (seed.yearMonth === currentYM) {
                            monthlyRevenue += seed.amount;
                        }
                    }
                });

                const newOrdersMap = new Map();
                if (Array.isArray(orderHistory)) {
                    orderHistory.forEach(o => {
                        const oid = o.kodeOrder || o.id;
                        if (oid && !seedIds.has(oid)) newOrdersMap.set(oid, o);
                    });
                }
                if (lastInvoice && (lastInvoice.kodeOrder || lastInvoice.id)) {
                    const invId = lastInvoice.kodeOrder || lastInvoice.id;
                    if (!seedIds.has(invId) && !newOrdersMap.has(invId)) {
                        newOrdersMap.set(invId, lastInvoice);
                    }
                }

                newOrdersMap.forEach((ord, oid) => {
                    const effStatus = normalizeStatus(statusMap[oid] || ord.status || 'pending');
                    const ordYM = getYearMonthFromDate(ord.tanggal || ord.waktu || ord.createdAt);
                    const amt = extractNumber(ord.totalBayar ?? ord.harga ?? ord.total);

                    if (effStatus === 'pending') {
                        pendingExtra += 1;
                    } else if (effStatus === 'selesai') {
                        completedExtra += 1;
                        const pName = String(ord.namaProduk || ord.produk || ord.akun || '').toLowerCase().trim();
                        if (pName) soldTitles.add(pName);
                        if (ordYM === currentYM) {
                            monthlyRevenue += amt;
                        }
                    }
                });

                let displayedRevenue = monthlyRevenue;
                try {
                    const prevYM = localStorage.getItem(ACTIVE_MONTH_KEY);
                    const archive = JSON.parse(localStorage.getItem(ARCHIVE_KEY) || '{}');
                    if (prevYM && prevYM !== currentYM) {
                        archive[prevYM] = monthlyRevenue;
                        localStorage.setItem(ARCHIVE_KEY, JSON.stringify(archive));
                        localStorage.setItem(ACTIVE_MONTH_KEY, currentYM);
                        displayedRevenue = 0;
                    } else {
                        if (!prevYM) localStorage.setItem(ACTIVE_MONTH_KEY, currentYM);
                        archive[currentYM] = monthlyRevenue;
                        localStorage.setItem(ARCHIVE_KEY, JSON.stringify(archive));
                    }
                } catch (e) {}

                const deletedSet = new Set(deletedIdsArr.map(String));
                const defaultActiveIds = ['3', '4', '5'];
                const activeDefaultCount = defaultActiveIds.filter(id => !deletedSet.has(id)).length;

                const seenUploadIds = new Set();
                let activeUploadedCount = 0;
                [...(Array.isArray(pendingUploads) ? pendingUploads : []), ...(Array.isArray(secondaryUploads) ? secondaryUploads : [])].forEach((p, i) => {
                    const pid = String(p.id || `UPLOAD-${i + 1}`);
                    if (seenUploadIds.has(pid) || deletedSet.has(pid)) return;
                    seenUploadIds.add(pid);

                    const st = String(p.status || 'aktif').toLowerCase().trim();
                    const title = String(p.nama || p.title || '').toLowerCase().trim();
                    const isSold = st === 'terjual' || st === 'selesai' || (title && soldTitles.has(title));
                    const isInactive = st === 'nonaktif' || st === 'ditolak';

                    if (!isSold && !isInactive) {
                        activeUploadedCount += 1;
                    }
                });

                const totalActiveAccounts = Math.max(0, activeDefaultCount + activeUploadedCount);
                try {
                    localStorage.setItem(ACTIVE_COUNT_KEY, String(totalActiveAccounts));
                } catch (e) {}

                const pendingEl = document.getElementById('dashPendingCount');
                const activeEl = document.getElementById('dashActiveCount');
                const soldEl = document.getElementById('dashSoldCount');
                const revEl = document.getElementById('dashRevenueValue');
                const revNoteEl = document.getElementById('dashRevenueNote');
                const notifBadge = document.getElementById('sellerNotifBadge');

                const pendingTotal = Math.max(0, BASE_PENDING + pendingExtra);
                const soldTotal = Math.max(0, BASE_TOTAL_TRANSAKSI + completedExtra);

                if (pendingEl) pendingEl.textContent = String(pendingTotal);
                if (activeEl) activeEl.textContent = String(totalActiveAccounts);
                if (soldEl) soldEl.textContent = String(soldTotal);
                if (revEl) revEl.textContent = formatRp(displayedRevenue);
                if (revNoteEl) revNoteEl.textContent = `Pendapatan ${formatMonthLabel(currentYM)} • Reset tiap bulan`;
                if (notifBadge) notifBadge.textContent = String(pendingTotal);
            }

            document.addEventListener('DOMContentLoaded', () => renderAll(true));
            window.addEventListener('storage', () => renderAll(true));
            window.addEventListener('nexakun:realtime-sync', () => renderAll(true));
            window.addEventListener('focus', () => renderAll(true));
            document.addEventListener('visibilitychange', () => {
                if (!document.hidden) renderAll(true);
            });
            setInterval(() => renderAll(false), 1000);
        })();
    </script>

</body>

</html>