<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NEXAKUN - Laporan Penjual</title>

    <!-- Google Fonts -->
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
            <a href="/penjual/dashboard_penjual" class="header-logo" aria-label="NEXAKUN"></a>

            <!-- NOTIFICATION -->
            <a href="/penjual/notifikasi" class="notification-button" aria-label="Notifikasi">
                <i class="fa-regular fa-bell"></i>
                <span class="notification-badge" id="reportNotifBadge">2</span>
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
                <a href="/penjual/laporan" class="menu-link active">
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

            <!-- PAGE HEADER & ACTION -->
            <div class="seller-header-bar" style="margin-bottom: 20px;">
                <div class="seller-title-area">
                    <h1 class="seller-store-name">Laporan Penjualan Toko</h1>
                    <p style="color: var(--text-muted); font-size: 14px;">
                        Pantau riwayat transaksi masuk, pendapatan, dan unduh laporan aktivitas toko Anda.
                    </p>
                </div>

                <div style="display: flex; gap: 10px; align-items: center; flex-wrap: wrap;">
                    <button class="btn-posting" style="background: #0E1626; border: 1px solid rgba(255,255,255,0.15);" onclick="setToday()">
                        <i class="fa-solid fa-calendar-day"></i> Hari Ini
                    </button>
                    <input type="date" id="filterDate" class="btn-posting"
                        style="background: #0E1626; border: 1px solid rgba(255,255,255,0.15); color: #fff; cursor: pointer; color-scheme: dark;"
                        onchange="filterByDate(this.value)">
                    <button class="btn-posting" onclick="window.print()">
                        <i class="fa-solid fa-print"></i> Cetak Laporan
                    </button>
                </div>
            </div>

            <!-- SUMMARY STATS LAPORAN -->
            <section class="dashboard-summary" style="margin-bottom: 28px;">
                <div class="summary-card">
                    <h3>Total Pendapatan</h3>
                    <p class="summary-number" id="statTotalPendapatan" style="font-size: 28px; color: #2FAB26;">Rp 0</p>
                    <span class="summary-status success" id="statPendapatanNote">Reset otomatis tiap bulan</span>
                </div>
                <div class="summary-card">
                    <h3>Total Transaksi</h3>
                    <p class="summary-number" id="statTotalTransaksi">120</p>
                    <span class="summary-status primary">Transaksi sukses</span>
                </div>
                <div class="summary-card">
                    <h3>Produk Terjual</h3>
                    <p class="summary-number" id="statProdukTerjual">48</p>
                    <span class="summary-status warning">Item akun game</span>
                </div>
                <div class="summary-card">
                    <h3>Rating Toko</h3>
                    <p class="summary-number" style="font-size: 36px; color: #FBBC05;">4.9 ★</p>
                    <span class="summary-status muted">Dari 85 ulasan pembeli</span>
                </div>
            </section>

            <!-- RIWAYAT TRANSAKSI TABLE -->
            <div style="background: var(--bg-panel); border: 1px solid var(--border); border-radius: 14px; overflow: hidden; margin-bottom: 30px;">
                <div style="padding: 16px 22px; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center;">
                    <h2 style="font-size: 18px; font-weight: 700; color: #FFFFFF;">Riwayat Transaksi Masuk</h2>
                    <span id="transactionCounterLabel" style="font-size: 13px; color: var(--text-muted);">Menampilkan 5 transaksi terakhir</span>
                </div>

                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; font-size: 13px;">
                        <thead>
                            <tr style="background: rgba(255,255,255,0.02); border-bottom: 1px solid var(--border); text-align: left; color: var(--text-muted); font-size: 12px;">
                                <th style="padding: 14px 18px;">ID Transaksi</th>
                                <th style="padding: 14px 18px;">Produk Game</th>
                                <th style="padding: 14px 18px;">Pembeli</th>
                                <th style="padding: 14px 18px;">Harga Jual</th>
                                <th style="padding: 14px 18px;">Tanggal</th>
                                <th style="padding: 14px 18px;">Status</th>
                            </tr>
                        </thead>
                        <tbody id="laporanTransactionBody">
                            <tr data-date="2026-11-12" data-amount="800000" data-default-status="selesai" style="border-bottom: 1px solid rgba(255,255,255,0.04);">
                                <td style="padding: 14px 18px; font-weight: 700; color: var(--blue);">TRX001</td>
                                <td style="padding: 14px 18px;">Akun PUBG Level 75 Sultan</td>
                                <td style="padding: 14px 18px;">Andi Pratama</td>
                                <td style="padding: 14px 18px; font-weight: 700;">Rp 800.000</td>
                                <td style="padding: 14px 18px;">12 Nov 2026</td>
                                <td style="padding: 14px 18px;"><span class="card-status-pill aktif" style="position:static;">Selesai</span></td>
                            </tr>
                            <tr data-date="2026-11-11" data-amount="275000" data-default-status="selesai" style="border-bottom: 1px solid rgba(255,255,255,0.04);">
                                <td style="padding: 14px 18px; font-weight: 700; color: var(--blue);">TRX002</td>
                                <td style="padding: 14px 18px;">Mobile Legends - 120 Skin Mythic</td>
                                <td style="padding: 14px 18px;">Pria Solo</td>
                                <td style="padding: 14px 18px; font-weight: 700;">Rp 275.000</td>
                                <td style="padding: 14px 18px;">11 Nov 2026</td>
                                <td style="padding: 14px 18px;"><span class="card-status-pill aktif" style="position:static;">Selesai</span></td>
                            </tr>
                            <tr data-date="2026-11-10" data-amount="450000" data-default-status="pending" style="border-bottom: 1px solid rgba(255,255,255,0.04);">
                                <td style="padding: 14px 18px; font-weight: 700; color: var(--blue);">TRX003</td>
                                <td style="padding: 14px 18px;">Free Fire - Akun S8 ON SG 3 Rasa</td>
                                <td style="padding: 14px 18px;">Budi Santoso</td>
                                <td style="padding: 14px 18px; font-weight: 700;">Rp 450.000</td>
                                <td style="padding: 14px 18px;">10 Nov 2026</td>
                                <td style="padding: 14px 18px;"><span class="card-status-pill nonaktif" style="position:static;">Pending</span></td>
                            </tr>
                            <tr data-date="2026-11-09" data-amount="180000" data-default-status="selesai" style="border-bottom: 1px solid rgba(255,255,255,0.04);">
                                <td style="padding: 14px 18px; font-weight: 700; color: var(--blue);">TRX004</td>
                                <td style="padding: 14px 18px;">Mobile Legends - Rank Mythic 60 Skin</td>
                                <td style="padding: 14px 18px;">Siti Rahayu</td>
                                <td style="padding: 14px 18px; font-weight: 700;">Rp 180.000</td>
                                <td style="padding: 14px 18px;">09 Nov 2026</td>
                                <td style="padding: 14px 18px;"><span class="card-status-pill aktif" style="position:static;">Selesai</span></td>
                            </tr>
                            <tr data-date="2026-11-08" data-amount="350000" data-default-status="dibatalkan">
                                <td style="padding: 14px 18px; font-weight: 700; color: var(--blue);">TRX005</td>
                                <td style="padding: 14px 18px;">Akun PUBG Mobile Old Level 50</td>
                                <td style="padding: 14px 18px;">Rizky Gaming</td>
                                <td style="padding: 14px 18px; font-weight: 700;">Rp 350.000</td>
                                <td style="padding: 14px 18px;">08 Nov 2026</td>
                                <td style="padding: 14px 18px;"><span class="card-status-pill terjual" style="position:static;">Dibatalkan</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- FOOTER -->
            <footer id="contact">
                © 2026 NEXAKUN. Platform jual beli akun game.
            </footer>

        </main>

    </div>

    <!-- JAVASCRIPT LOGIC -->
    <script>
        const BASE_PENDING = 2;
        const BASE_TOTAL_TRANSAKSI = 120;
        const BASE_PRODUK_TERJUAL = 48;
        const ACTIVE_MONTH_KEY = 'nexakun_report_active_month';
        const ARCHIVE_KEY = 'nexakun_monthly_revenue_archive';

        const SEED_ORDERS = {
            TRX001: { amount: 800000, defaultStatus: 'selesai', yearMonth: '2026-11' },
            TRX002: { amount: 275000, defaultStatus: 'selesai', yearMonth: '2026-11' },
            TRX003: { amount: 450000, defaultStatus: 'pending', yearMonth: '2026-11' },
            TRX004: { amount: 180000, defaultStatus: 'selesai', yearMonth: '2026-11' },
            TRX005: { amount: 350000, defaultStatus: 'dibatalkan', yearMonth: '2026-11' }
        };

        let lastReportSnapshot = '';

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

        function extractAmountNumber(rawVal) {
            if (typeof rawVal === 'number') return Number.isFinite(rawVal) ? rawVal : 0;
            const digits = String(rawVal || '').replace(/[^0-9]/g, '');
            return digits ? parseInt(digits, 10) : 0;
        }

        function formatHargaRp(rawVal) {
            return 'Rp ' + extractAmountNumber(rawVal).toLocaleString('id-ID');
        }

        function parseDateInfo(rawDate) {
            const now = new Date();
            const pad = n => String(n).padStart(2, '0');
            const fallbackIso = `${now.getFullYear()}-${pad(now.getMonth() + 1)}-${pad(now.getDate())}`;
            if (!rawDate) {
                return {
                    iso: fallbackIso,
                    yearMonth: fallbackIso.slice(0, 7),
                    label: now.toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' })
                };
            }
            const parsed = new Date(rawDate);
            if (!Number.isNaN(parsed.getTime())) {
                const iso = `${parsed.getFullYear()}-${pad(parsed.getMonth() + 1)}-${pad(parsed.getDate())}`;
                const label = parsed.toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' });
                return { iso, yearMonth: iso.slice(0, 7), label };
            }
            const str = String(rawDate);
            const isoMatch = str.match(/^(\d{4}-\d{2}-\d{2})/);
            if (isoMatch) {
                return { iso: isoMatch[1], yearMonth: isoMatch[1].slice(0, 7), label: str };
            }
            return { iso: fallbackIso, yearMonth: fallbackIso.slice(0, 7), label: str };
        }

        function normalizeStatus(rawStatus) {
            const st = String(rawStatus || 'pending').toLowerCase().trim();
            if (st === 'selesai' || st === 'sukses' || st === 'berhasil') return 'selesai';
            if (st === 'ditolak' || st === 'batal' || st === 'dibatalkan' || st === 'gagal') return 'dibatalkan';
            return 'pending';
        }

        function getBadgeMeta(rawStatus) {
            const norm = normalizeStatus(rawStatus);
            if (norm === 'selesai') return { text: 'Selesai', cls: 'card-status-pill aktif' };
            if (norm === 'dibatalkan') return { text: 'Dibatalkan', cls: 'card-status-pill terjual' };
            return { text: 'Pending', cls: 'card-status-pill nonaktif' };
        }

        function handleMonthlyResetCycle(currentYM, currentMonthlyRevenue) {
            try {
                const prevYM = localStorage.getItem(ACTIVE_MONTH_KEY);
                const archive = JSON.parse(localStorage.getItem(ARCHIVE_KEY) || '{}');
                if (prevYM && prevYM !== currentYM) {
                    archive[prevYM] = currentMonthlyRevenue;
                    localStorage.setItem(ARCHIVE_KEY, JSON.stringify(archive));
                    localStorage.setItem(ACTIVE_MONTH_KEY, currentYM);
                    return true;
                }
                if (!prevYM) localStorage.setItem(ACTIVE_MONTH_KEY, currentYM);
                archive[currentYM] = currentMonthlyRevenue;
                localStorage.setItem(ARCHIVE_KEY, JSON.stringify(archive));
                return false;
            } catch (e) {
                return false;
            }
        }

        function buildReportSnapshot() {
            return [
                localStorage.getItem('nexakun_admin_order_status') || '',
                localStorage.getItem('nexakun_order_history') || '',
                localStorage.getItem('nexakun_last_invoice') || '',
                getCurrentYearMonth(new Date())
            ].join('||');
        }

        function syncMonthlyRealtimeReport(force = false) {
            const snap = buildReportSnapshot();
            if (!force && snap === lastReportSnapshot) return;
            lastReportSnapshot = snap;

            const tbody = document.getElementById('laporanTransactionBody');
            if (!tbody) return;

            const currentYM = getCurrentYearMonth(new Date());

            let statusMap = {};
            let orderHistory = [];
            let lastInvoice = null;

            try {
                statusMap = JSON.parse(localStorage.getItem('nexakun_admin_order_status') || '{}');
                orderHistory = JSON.parse(localStorage.getItem('nexakun_order_history') || '[]');
                lastInvoice = JSON.parse(localStorage.getItem('nexakun_last_invoice') || 'null');
            } catch (e) {}

            tbody.querySelectorAll('tr[data-dynamic="1"]').forEach(r => r.remove());

            let monthlyRevenue = 0;
            let completedExtra = 0;
            let pendingExtra = 0;

            tbody.querySelectorAll('tr').forEach(tr => {
                const idCell = tr.cells[0];
                const badgeEl = tr.querySelector('.card-status-pill');
                if (!idCell || !badgeEl) return;

                const trxId = idCell.textContent.trim();
                const seed = SEED_ORDERS[trxId] || {
                    amount: extractAmountNumber(tr.dataset.amount || tr.cells[3]?.textContent),
                    defaultStatus: normalizeStatus(tr.dataset.defaultStatus || 'pending'),
                    yearMonth: String(tr.dataset.date || '').slice(0, 7)
                };

                const currentSt = statusMap[trxId] ? normalizeStatus(statusMap[trxId]) : seed.defaultStatus;
                const meta = getBadgeMeta(currentSt);
                badgeEl.textContent = meta.text;
                badgeEl.className = meta.cls;
                badgeEl.style.position = 'static';

                if (seed.defaultStatus !== 'selesai' && currentSt === 'selesai') {
                    completedExtra += 1;
                }
                if (seed.defaultStatus !== 'pending' && currentSt === 'pending') {
                    pendingExtra += 1;
                }
                if (seed.defaultStatus === 'pending' && currentSt !== 'pending') {
                    pendingExtra -= 1;
                }

                if (currentSt === 'selesai' && seed.yearMonth === currentYM) {
                    monthlyRevenue += seed.amount;
                }
            });

            const items = [];
            if (Array.isArray(orderHistory)) items.push(...orderHistory);
            if (lastInvoice && (lastInvoice.kodeOrder || lastInvoice.id)) {
                const idInv = lastInvoice.kodeOrder || lastInvoice.id;
                const alreadyInList = items.some(it => (it.kodeOrder || it.id) === idInv);
                if (!alreadyInList) items.unshift(lastInvoice);
            }

            const existingIds = new Set(
                Array.from(tbody.querySelectorAll('tr'))
                    .map(r => r.cells[0]?.textContent.trim())
                    .filter(Boolean)
            );

            items
                .slice()
                .reverse()
                .forEach(ord => {
                    const trxId = ord.kodeOrder || ord.id;
                    if (!trxId || existingIds.has(trxId)) return;
                    existingIds.add(trxId);

                    const normStatus = normalizeStatus(statusMap[trxId] || ord.status || 'pending');
                    const meta = getBadgeMeta(normStatus);
                    const amountNum = extractAmountNumber(ord.totalBayar ?? ord.harga ?? ord.total);
                    const dateInfo = parseDateInfo(ord.tanggal || ord.waktu || ord.createdAt);

                    if (normStatus === 'pending') {
                        pendingExtra += 1;
                    } else if (normStatus === 'selesai') {
                        completedExtra += 1;
                        if (dateInfo.yearMonth === currentYM) {
                            monthlyRevenue += amountNum;
                        }
                    }

                    const rawProd = ord.namaProduk || ord.produk || ord.akun || 'Akun Game';
                    const gameName = ord.game ? String(ord.game).trim() : '';
                    const formattedProd = gameName && !rawProd.toLowerCase().includes(gameName.toLowerCase())
                        ? `${gameName} - ${rawProd}`
                        : rawProd;

                    const buyerName = ord.namaPembeli || ord.pembeli || ord.nama || 'Pembeli Baru';

                    const tr = document.createElement('tr');
                    tr.setAttribute('data-date', dateInfo.iso);
                    tr.setAttribute('data-dynamic', '1');
                    tr.style.borderBottom = '1px solid rgba(255,255,255,0.04)';
                    tr.innerHTML = `
                        <td style="padding: 14px 18px; font-weight: 700; color: var(--blue);">${trxId}</td>
                        <td style="padding: 14px 18px;">${formattedProd}</td>
                        <td style="padding: 14px 18px;">${buyerName}</td>
                        <td style="padding: 14px 18px; font-weight: 700;">${formatHargaRp(amountNum)}</td>
                        <td style="padding: 14px 18px;">${dateInfo.label}</td>
                        <td style="padding: 14px 18px;"><span class="${meta.cls}" style="position:static;">${meta.text}</span></td>
                    `;
                    tbody.prepend(tr);
                });

            const isNewMonthReset = handleMonthlyResetCycle(currentYM, monthlyRevenue);
            const displayedRevenue = isNewMonthReset ? 0 : monthlyRevenue;

            const pendapatanEl = document.getElementById('statTotalPendapatan');
            const pendapatanNoteEl = document.getElementById('statPendapatanNote');
            const trxStatEl = document.getElementById('statTotalTransaksi');
            const soldStatEl = document.getElementById('statProdukTerjual');
            const counterLabel = document.getElementById('transactionCounterLabel');
            const notifBadge = document.getElementById('reportNotifBadge');

            if (pendapatanEl) pendapatanEl.textContent = formatHargaRp(displayedRevenue);
            if (pendapatanNoteEl) pendapatanNoteEl.textContent = `Periode ${formatMonthLabel(currentYM)} • Reset tiap bulan`;
            if (trxStatEl) trxStatEl.textContent = String(Math.max(0, BASE_TOTAL_TRANSAKSI + completedExtra));
            if (soldStatEl) soldStatEl.textContent = String(Math.max(0, BASE_PRODUK_TERJUAL + completedExtra));
            if (notifBadge) notifBadge.textContent = String(Math.max(0, BASE_PENDING + pendingExtra));

            const totalRows = tbody.querySelectorAll('tr').length;
            if (counterLabel) {
                counterLabel.textContent = `Menampilkan ${totalRows} transaksi terakhir`;
            }

            const activeDate = document.getElementById('filterDate')?.value;
            if (activeDate) {
                tbody.querySelectorAll('tr[data-date]').forEach(r => {
                    r.style.display = r.dataset.date === activeDate ? '' : 'none';
                });
            }
        }

        function setToday() {
            const now = new Date();
            const pad = n => String(n).padStart(2, '0');
            const today = `${now.getFullYear()}-${pad(now.getMonth() + 1)}-${pad(now.getDate())}`;
            document.getElementById('filterDate').value = today;
            filterByDate(today);
        }

        function filterByDate(date) {
            const rows = document.querySelectorAll('tbody tr[data-date]');
            let found = 0;
            rows.forEach(r => {
                if (!date || r.dataset.date === date) {
                    r.style.display = '';
                    found++;
                } else {
                    r.style.display = 'none';
                }
            });
            if (found === 0 && date) {
                alert('Tidak ada transaksi pada tanggal ' + date);
            }
        }

        document.addEventListener('DOMContentLoaded', () => syncMonthlyRealtimeReport(true));
        window.addEventListener('storage', () => syncMonthlyRealtimeReport(true));
        window.addEventListener('nexakun:realtime-sync', () => syncMonthlyRealtimeReport(true));
        window.addEventListener('focus', () => syncMonthlyRealtimeReport(true));
        document.addEventListener('visibilitychange', function () {
            if (!document.hidden) syncMonthlyRealtimeReport(true);
        });
        setInterval(() => syncMonthlyRealtimeReport(false), 1000);
    </script>

</body>

</html>