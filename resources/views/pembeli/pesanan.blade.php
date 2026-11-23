<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEXAKUN - Riwayat Transaksi Pembeli</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Gurajada&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Funnel+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=42dot+Sans&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/pembeli_riwayat.css') }}">
</head>

<body>

    <!-- NAVBAR PEMBELI -->
    <header class="buyer-navbar">

        <a href="/index" class="buyer-brand">
            <img src="{{ asset('images/v341_395.png') }}" alt="NEXAKUN">
        </a>

        <nav class="buyer-nav-links">
            <a href="/index">Home</a>
            <a href="/index#games">Games</a>
            <a href="/pembeli/pesanan" class="active">Pesanan Saya</a>
            <a href="/about">About</a>
            <a href="/contact">Contact</a>
        </nav>

        <div class="nav-actions">
            <button type="button" class="icon-button" id="notificationButton" aria-label="Notifikasi" onclick="toggleNotifMenu(event)">
                <svg viewBox="0 0 24 24">
                    <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9M10 21h4" />
                </svg>
            </button>

            <button type="button" class="icon-button" id="profileButton" aria-label="Profil" onclick="toggleProfileMenu(event)">
                <svg viewBox="0 0 24 24">
                    <circle cx="12" cy="7" r="4" />
                    <path d="M4 22v-2a8 8 0 0 1 16 0v2" />
                </svg>
            </button>

            <!-- POP-UP NOTIFIKASI LONCENG -->
            <div class="notif-dropdown" id="notifDropdown" role="region" aria-label="Notifikasi">
                <div class="notif-header">
                    <svg class="notif-header-icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path>
                        <path d="M10 21h4"></path>
                    </svg>
                    <h3>Notifikasi</h3>
                </div>

                <div class="notif-list">
                    <div class="notif-item">
                        <p>Belum ada notifikasi</p>
                    </div>
                </div>

                <div class="notif-divider"></div>

                <button type="button" class="notif-logout-btn" onclick="keluar()">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    <span>Keluar</span>
                </button>
            </div>

            <div class="profile-menu" id="profileMenu">
                <strong id="profilEmail" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap">Akun Pembeli</strong>
                <a href="/pembeli/profil">Profil Saya</a>
                <a href="/pembeli/pesanan">Pesanan Saya</a>
                <a href="#" id="menuDaftarPenjual" onclick="belumTersedia(event, 'Daftar Jadi Penjual')">Daftar Jadi Penjual</a>
                <button id="logoutButton" onclick="keluar()">Keluar</button>
            </div>
        </div>

    </header>

    <!-- MAIN CONTENT RIWAYAT -->
    <main class="buyer-content-wrap">

        <div class="page-header-title">
            <h1>Riwayat <span>Pesanan & Transaksi</span></h1>
            <p>Pantau status verifikasi pembayaran dan ambil data akun game yang sudah Anda beli.</p>
        </div>

        <!-- CONTROLS: TABS & SEARCH -->
        <div class="transaction-controls">

            <div class="status-tabs">
                <button class="tab-btn active" onclick="setBuyerFilter(this, 'all')">Semua Transaksi</button>
                <button class="tab-btn" onclick="setBuyerFilter(this, 'selesai')">Selesai (Akun Dikirim)</button>
                <button class="tab-btn" onclick="setBuyerFilter(this, 'menunggu')">Menunggu Verifikasi</button>
                <button class="tab-btn" onclick="setBuyerFilter(this, 'batal')">Dibatalkan</button>
            </div>

            <div class="search-trans-box">
                <input type="text" id="buyerSearch" placeholder="Cari ID transaksi / game..." oninput="filterBuyerTrans()">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>

        </div>

        <!-- TRANSACTION CARDS -->
        <div class="trans-list" id="transList">
            <p id="transPlaceholder" style="color:#918F8F; padding:24px 0;">Memuat pesanan...</p>
        </div>

    </main>

    <!-- FOOTER -->
    <footer id="contact">
        © 2026 NEXAKUN. Platform jual beli akun game.
    </footer>

    <!-- MODAL DATA AKUN GAME PEMBELI -->
    <div class="buyer-modal-overlay" id="accountModalOverlay" onclick="closeAccountModal()">
        <div class="buyer-modal-card" onclick="event.stopPropagation()">

            <div style="display:flex; justify-content:space-between; align-items:center;">
                <h2 style="font-size:20px; font-weight:700; color:#FFFFFF;">
                    <i class="fa-solid fa-shield-halved" style="color:#2FAB26; margin-right:8px;"></i>
                    Data Akun Game Pembelian
                </h2>
                <button onclick="closeAccountModal()" style="background:transparent; color:#FF383C; font-size:24px; cursor:pointer;">&times;</button>
            </div>

            <p style="font-size:13px; color:var(--text-muted);">
                Berikut adalah detail login akun game yang telah Anda bayar dan lolos verifikasi admin:
            </p>

            <div class="modal-credential-box">
                <div class="credential-row">
                    <span class="credential-label">ID Transaksi</span>
                    <strong id="credTrxId">TRX-BUY-001</strong>
                </div>
                <div class="credential-row">
                    <span class="credential-label">Nama Produk</span>
                    <strong id="credTitle" style="color:var(--blue);">PUBG Mobile Sultan</strong>
                </div>
                <div class="credential-row" style="flex-direction:column; align-items:flex-start; gap:6px;">
                    <span class="credential-label">Detail Akun</span>
                    <span class="credential-val" id="credDetail" style="white-space:pre-wrap; word-break:break-word;">-</span>
                </div>
            </div>

            <div class="security-tip-box">
                <strong style="color:#FBBC05; display:block; margin-bottom:4px;">
                    <i class="fa-solid fa-triangle-exclamation"></i> Langkah Keamanan Penting:
                </strong>
                <p id="credNote">
                    Harap segera masuk ke game dan ubah kata sandi serta tautkan email pribadi Anda.
                    NEXAKUN memberikan garansi ganti rugi 100% selama 48 jam pertama setelah pesanan selesai.
                </p>
            </div>

            <div style="display:flex; justify-content:flex-end; gap:10px;">
                <button class="btn-view-account" style="background:#1B2A40; color:#fff;" onclick="copyCredentials()">
                    <i class="fa-regular fa-copy"></i> Salin Kredensial
                </button>
                <button class="btn-view-account" onclick="closeAccountModal()">
                    Tutup
                </button>
            </div>

        </div>
    </div>

    <!-- JAVASCRIPT LOGIC -->
    <script src="{{ asset('js/auth.js') }}"></script>
    <script>
        // Halaman ini khusus pembeli yang sudah login
        const boleh = sudahLogin() && adalahPembeli(ambilUser());
        if (!boleh) window.location.href = '/index';

        // ---------- menu navbar ----------
        function toggleNotifMenu(event) {
            event.stopPropagation();
            const notif = document.getElementById('notifDropdown');
            const profile = document.getElementById('profileMenu');
            if (profile) profile.classList.remove('show');
            if (notif) notif.classList.toggle('show');
        }

        function toggleProfileMenu(event) {
            event.stopPropagation();
            const notif = document.getElementById('notifDropdown');
            const profile = document.getElementById('profileMenu');
            if (notif) notif.classList.remove('show');
            if (profile) profile.classList.toggle('show');
        }

        document.addEventListener('click', function (e) {
            if (!e.target.closest('.nav-actions')) {
                document.getElementById('profileMenu')?.classList.remove('show');
                document.getElementById('notifDropdown')?.classList.remove('show');
            }
        });

        function belumTersedia(event, nama) {
            event.preventDefault();
            if (HALAMAN_MENU.penjual) window.location.href = HALAMAN_MENU.penjual;
            else alert('Halaman ' + nama + ' belum tersedia.');
        }

        async function keluar() {
            await logout();
            window.location.href = '/index';
        }

        // ---------- helper ----------
        function esc(teks) {
            const d = document.createElement('div');
            d.textContent = teks ?? '';
            return d.innerHTML;
        }

        function formatRupiah(angka) {
            return 'Rp ' + (Number(angka) || 0).toLocaleString('id-ID');
        }

        function formatTanggal(iso) {
            const t = new Date(iso);
            if (isNaN(t)) return '-';
            return t.toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' });
        }

        function getGameThumbnail(game = '') {
            const g = game.toLowerCase();
            if (g.includes('pubg')) return '/images/v270_366.png';
            if (g.includes('mobile legends') || g.includes('mlbb')) return '/images/v273_384.png';
            return '/images/v270_378.png';
        }

        // Status database -> tampilan
        const STATUS = {
            'Menunggu Pembayaran': { filter: 'menunggu', kelas: 'menunggu', ikon: 'fa-clock', label: 'Menunggu Pembayaran' },
            'Diproses': { filter: 'menunggu', kelas: 'menunggu', ikon: 'fa-clock', label: 'Menunggu Verifikasi Pembayaran' },
            'Selesai': { filter: 'selesai', kelas: 'selesai', ikon: 'fa-circle-check', label: 'Selesai · Akun Dikirim' },
            'Dibatalkan': { filter: 'batal', kelas: 'batal', ikon: 'fa-circle-xmark', label: 'Dibatalkan' },
        };

        function tombolAksi(p) {
            const id = Number(p.id_pesanan);
            switch (p.status_pesanan) {
                case 'Selesai':
                    return `<button class="btn-view-account" data-aksi="akun" data-id="${id}"><i class="fa-solid fa-key"></i> Lihat Data Akun</button>`;
                case 'Menunggu Pembayaran':
                    return `<button class="btn-view-account" style="background:#1B2A40; color:#FF383C;" data-aksi="batal" data-id="${id}"><i class="fa-solid fa-xmark"></i> Batalkan Pesanan</button>`;
                case 'Diproses':
                    return `<button class="btn-view-account" style="background:#1B2A40; color:#918F8F; cursor:default;" disabled><i class="fa-solid fa-hourglass-half"></i> Menunggu Admin</button>`;
                default:
                    return `<button class="btn-view-account" style="background:#1B2A40; color:#918F8F;" data-aksi="beli-lagi"><i class="fa-solid fa-rotate-right"></i> Beli Lagi</button>`;
            }
        }

        function kartuPesanan(p) {
            const st = STATUS[p.status_pesanan] || STATUS['Menunggu Pembayaran'];
            const judul = [p.game, p.judul].filter(Boolean).join(' – ') || 'Akun Game NEXAKUN';
            const card = document.createElement('div');
            card.className = 'trans-card';
            card.dataset.status = st.filter;
            card.innerHTML = `
                <div class="trans-left">
                    <div class="trans-img-thumb"><img src="${getGameThumbnail(p.game || '')}" alt=""></div>
                    <div class="trans-info">
                        <span class="trans-code">${esc(p.kode)}</span>
                        <h3 class="trans-title">${esc(judul)}</h3>
                        <div class="trans-meta">
                            <span><i class="fa-solid fa-calendar-days"></i> ${esc(formatTanggal(p.tanggal))}</span>
                            <span><i class="fa-solid fa-store"></i> Seller: ${esc(p.penjual || '-')}</span>
                        </div>
                    </div>
                </div>
                <div class="trans-right">
                    <span class="badge-status-buyer ${st.kelas}"><i class="fa-solid ${st.ikon}"></i> ${esc(st.label)}</span>
                    <span class="trans-price">${esc(formatRupiah(p.total_harga))}</span>
                    ${tombolAksi(p)}
                </div>`;
            card.dataset.judul = judul;
            return card;
        }

        let daftarPesanan = [];

        function tampilkanPesanan() {
            const list = document.getElementById('transList');
            list.innerHTML = '';

            if (daftarPesanan.length === 0) {
                list.innerHTML = '<p style="color:#918F8F; padding:24px 0;">Belum ada pesanan. <a href="/index#games" style="color:#058CFB;">Cari akun game sekarang</a></p>';
                return;
            }
            daftarPesanan.forEach(p => list.appendChild(kartuPesanan(p)));
            filterBuyerTrans();
        }

        async function muatPesanan() {
            const list = document.getElementById('transList');
            try {
                const res = await apiAuth('/pesanan/riwayat');
                const data = await res.json();
                if (!res.ok) {
                    list.innerHTML = `<p style="color:#FF383C; padding:24px 0;">${esc(data.message || 'Gagal memuat pesanan.')}</p>`;
                    return;
                }
                daftarPesanan = data.data || [];
                tampilkanPesanan();
            } catch (err) {
                list.innerHTML = '<p style="color:#FF383C; padding:24px 0;">Tidak bisa terhubung ke server.</p>';
            }
        }

        // ---------- filter & cari ----------
        let activeFilter = 'all';

        function setBuyerFilter(btn, status) {
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            activeFilter = status;
            filterBuyerTrans();
        }

        function filterBuyerTrans() {
            const q = document.getElementById('buyerSearch').value.toLowerCase();
            document.querySelectorAll('.trans-card').forEach(card => {
                const cocokStatus = (activeFilter === 'all') || (card.dataset.status === activeFilter);
                const cocokTeks = card.textContent.toLowerCase().includes(q);
                card.style.display = (cocokStatus && cocokTeks) ? 'flex' : 'none';
            });
        }

        // ---------- aksi pada kartu ----------
        document.getElementById('transList').addEventListener('click', async (e) => {
            const btn = e.target.closest('button[data-aksi]');
            if (!btn) return;
            const id = btn.dataset.id;
            const p = daftarPesanan.find(x => String(x.id_pesanan) === id);

            if (btn.dataset.aksi === 'beli-lagi') {
                window.location.href = '/index#games';
            } else if (btn.dataset.aksi === 'akun') {
                bukaDataAkun(p);
            } else if (btn.dataset.aksi === 'batal') {
                if (!confirm('Batalkan pesanan ' + p.kode + '?')) return;
                btn.disabled = true;
                const res = await apiAuth('/pesanan/' + id + '/batal', { method: 'PUT' });
                const data = await res.json();
                if (!res.ok) {
                    alert(data.message || 'Gagal membatalkan pesanan.');
                    btn.disabled = false;
                    return;
                }
                await muatPesanan();
            }
        });

        // ---------- modal data akun ----------
        async function bukaDataAkun(p) {
            const res = await apiAuth('/pesanan/' + p.id_pesanan + '/akun');
            const data = await res.json();
            if (!res.ok) {
                alert(data.message || 'Data akun tidak bisa ditampilkan.');
                return;
            }
            document.getElementById('credTrxId').textContent = p.kode;
            document.getElementById('credTitle').textContent = [p.game, p.judul].filter(Boolean).join(' – ');
            document.getElementById('credDetail').textContent = data.data.detail_akun || '-';
            document.getElementById('accountModalOverlay').classList.add('show');
        }

        function closeAccountModal() {
            document.getElementById('accountModalOverlay').classList.remove('show');
        }

        function copyCredentials() {
            const detail = document.getElementById('credDetail').textContent;
            navigator.clipboard.writeText(detail);
            alert('Data akun berhasil disalin ke clipboard!');
        }

        document.addEventListener('DOMContentLoaded', () => {
            if (!boleh) return;
            segarkanNavbar();
            muatPesanan();
        });
    </script>

</body>

</html>