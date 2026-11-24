<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NEXAKUN - Kelola Produk Penjual</title>

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
            <a href="/penjual/notifikasi_penjual" class="notification-button" aria-label="Notifikasi">
                <i class="fa-regular fa-bell"></i>
                <span class="notification-badge" id="sellerProdukNotifBadge">2</span>
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
                <a href="/penjual/daftar_produk" class="menu-link active">
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

            <!-- SELLER HEADER BAR -->
            <div class="seller-header-bar">

                <!-- Title & Verified Badge -->
                <div class="seller-title-area">
                    <span class="badge-verified">
                        Penjual Terverifikasi <i class="fa-solid fa-check"></i>
                    </span>
                    <h1 class="seller-store-name">ALDONESIA HENGKER TZY</h1>
                    <p style="color: var(--text-muted); font-size: 13px; margin-top: 6px;">
                        Akun Aktif saat ini: <strong id="produkActiveCounter" style="color: #058CFB;">3</strong>
                    </p>
                </div>

                <!-- Search & Game Category Pills -->
                <div class="seller-controls">

                    <div class="search-game-input">
                        <input type="text" id="searchInput" placeholder="Cari game..." oninput="filterProducts()">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>

                    <div class="game-filter-pills">
                        <button type="button" class="game-pill" data-game="pubg" onclick="setGameFilter(this, 'pubg')">PUBG</button>
                        <button type="button" class="game-pill" data-game="ml" onclick="setGameFilter(this, 'ml')">Mobile Legend</button>
                        <button type="button" class="game-pill" data-game="ff" onclick="setGameFilter(this, 'ff')">Free Fire</button>
                    </div>

                </div>

            </div>

            <!-- GRID PRODUK -->
            <div class="products-grid" id="productsGrid">

                <!-- CARD 1 (Nonaktif) -->
                <div class="product-card-item" data-id="1" data-category="pubg" onclick="openDetailModal(1)">
                    <div class="card-thumbnail-wrap">
                        <span class="card-status-pill nonaktif">Nonaktif</span>
                        <img src="./images/v270_366.png" alt="PUBG Old S8">
                    </div>
                    <p class="card-desc-text">
                        Akun Old, S8 ON, Tas Kelinci ON SG 3 Rasa, DM 1000+
                    </p>
                    <div class="card-footer-action">
                        <span class="card-price">Rp 800.000</span>
                        <div class="card-action-btns">
                            <button type="button" class="btn-icon-action edit" title="Edit Produk" onclick="event.stopPropagation(); editProduct(1)">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button type="button" class="btn-icon-action delete" title="Hapus Produk" onclick="event.stopPropagation(); deleteProduct(1)">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- CARD 2 (Nonaktif) -->
                <div class="product-card-item" data-id="2" data-category="ff" onclick="openDetailModal(2)">
                    <div class="card-thumbnail-wrap">
                        <span class="card-status-pill nonaktif">Nonaktif</span>
                        <img src="./images/v270_378.png" alt="Free Fire Old S8">
                    </div>
                    <p class="card-desc-text">
                        Akun Old, S8 ON, Tas Kelinci ON SG 3 Rasa, DM 1000+
                    </p>
                    <div class="card-footer-action">
                        <span class="card-price">Rp 800.000</span>
                        <div class="card-action-btns">
                            <button type="button" class="btn-icon-action edit" title="Edit Produk" onclick="event.stopPropagation(); editProduct(2)">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button type="button" class="btn-icon-action delete" title="Hapus Produk" onclick="event.stopPropagation(); deleteProduct(2)">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- CARD 3 (Aktif) -->
                <div class="product-card-item" data-id="3" data-category="pubg" onclick="openDetailModal(3)">
                    <div class="card-thumbnail-wrap">
                        <span class="card-status-pill aktif">Aktif</span>
                        <img src="./images/v273_384.png" alt="PUBG Level 75">
                    </div>
                    <p class="card-desc-text">
                        Akun Old, S8 ON, Tas Kelinci ON SG 3 Rasa, DM 1000+
                    </p>
                    <div class="card-footer-action">
                        <span class="card-price">Rp 800.000</span>
                        <div class="card-action-btns">
                            <button type="button" class="btn-icon-action edit" title="Edit Produk" onclick="event.stopPropagation(); editProduct(3)">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button type="button" class="btn-icon-action delete" title="Hapus Produk" onclick="event.stopPropagation(); deleteProduct(3)">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- CARD 4 (Aktif) -->
                <div class="product-card-item" data-id="4" data-category="ml" onclick="openDetailModal(4)">
                    <div class="card-thumbnail-wrap">
                        <span class="card-status-pill aktif">Aktif</span>
                        <img src="./images/v270_366.png" alt="Mobile Legend Mythic">
                    </div>
                    <p class="card-desc-text">
                        Mobile Legends - Rank Mythic, Skin Koleksi, DM 1000+
                    </p>
                    <div class="card-footer-action">
                        <span class="card-price">Rp 800.000</span>
                        <div class="card-action-btns">
                            <button type="button" class="btn-icon-action edit" title="Edit Produk" onclick="event.stopPropagation(); editProduct(4)">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button type="button" class="btn-icon-action delete" title="Hapus Produk" onclick="event.stopPropagation(); deleteProduct(4)">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- CARD 5 (Aktif) -->
                <div class="product-card-item" data-id="5" data-category="ff" onclick="openDetailModal(5)">
                    <div class="card-thumbnail-wrap">
                        <span class="card-status-pill aktif">Aktif</span>
                        <img src="./images/v270_378.png" alt="Free Fire Old S8">
                    </div>
                    <p class="card-desc-text">
                        Free Fire - Akun Old, S8 ON, Tas Kelinci ON SG 3 Rasa, DM 1000+
                    </p>
                    <div class="card-footer-action">
                        <span class="card-price">Rp 800.000</span>
                        <div class="card-action-btns">
                            <button type="button" class="btn-icon-action edit" title="Edit Produk" onclick="event.stopPropagation(); editProduct(5)">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button type="button" class="btn-icon-action delete" title="Hapus Produk" onclick="event.stopPropagation(); deleteProduct(5)">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- CARD 6 (Terjual) -->
                <div class="product-card-item" data-id="6" data-category="pubg" onclick="openDetailModal(6)">
                    <div class="card-thumbnail-wrap">
                        <span class="card-status-pill terjual">Terjual</span>
                        <img src="./images/v273_384.png" alt="PUBG Old S8">
                    </div>
                    <p class="card-desc-text">
                        Akun Old, S8 ON, Tas Kelinci ON SG 3 Rasa, DM 1000+
                    </p>
                    <div class="card-footer-action">
                        <span class="card-price">Rp 800.000</span>
                        <div class="card-action-btns">
                            <button type="button" class="btn-icon-action edit" title="Edit Produk" onclick="event.stopPropagation(); editProduct(6)">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button type="button" class="btn-icon-action delete" title="Hapus Produk" onclick="event.stopPropagation(); deleteProduct(6)">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- PESAN JIKA SEMUA PRODUK TERHAPUS / KOSONG -->
            <div id="emptyStateMsg" style="display: none; text-align: center; padding: 60px 20px; color: #94A3B8;">
                <i class="fa-solid fa-box-open" style="font-size: 40px; margin-bottom: 12px; color: #058CFB;"></i>
                <p style="font-size: 16px; font-weight: 600; color: #FFFFFF;">Belum ada produk tersedia</p>
                <p style="font-size: 13px; margin-top: 4px;">Semua daftar produk telah dihapus atau tidak ditemukan.</p>
                <button type="button" onclick="resetDeletedProducts()" style="margin-top: 16px; padding: 8px 18px; border-radius: 8px; border: 1px solid #058CFB; background: transparent; color: #058CFB; cursor: pointer; font-weight: 600;">
                    Pulihkan Data Produk Demo
                </button>
            </div>

            <!-- PAGINATION -->
            <div class="pagination-wrap">
                <button type="button" class="page-btn active">1</button>
                <button type="button" class="page-btn">&gt;&gt;</button>
            </div>

            <!-- FOOTER -->
            <footer id="contact">
                © 2026 NEXAKUN. Platform jual beli akun game.
            </footer>

        </main>

    </div>

    <!-- MODAL DETAIL PRODUK INTERAKTIF -->
    <div class="modal-product-overlay" id="detailModalOverlay" onclick="closeDetailModal()">
        <div class="modal-product-card" onclick="event.stopPropagation()">

            <button type="button" class="modal-close-btn" onclick="closeDetailModal()" aria-label="Tutup Modal">&times;</button>

            <div class="modal-product-header">
                <span class="card-status-pill aktif" id="modalStatusBadge">Aktif</span>
                <h2 id="modalTitle">Akun PUBG Mobile Sultan - Level 75</h2>
            </div>

            <div class="modal-image-preview">
                <img id="modalImg" src="./images/v270_366.png" alt="Preview Akun Game">
            </div>

            <div class="modal-info-grid">
                <div class="modal-info-item">
                    <span>ID Produk</span>
                    <strong id="modalId">PRD-PUBG-001</strong>
                </div>
                <div class="modal-info-item">
                    <span>Kategori Game</span>
                    <strong id="modalCategory">PUBG Mobile</strong>
                </div>
                <div class="modal-info-item">
                    <span>Harga Jual</span>
                    <strong id="modalPrice" style="color: #058CFB;">Rp 800.000</strong>
                </div>
                <div class="modal-info-item">
                    <span>Tanggal Upload</span>
                    <strong>19 November 2026</strong>
                </div>
                <div class="modal-info-item">
                    <span>Metode Login</span>
                    <strong id="modalBind">Akun Twitter / Email Bersih</strong>
                </div>
                <div class="modal-info-item">
                    <span>Status Penjualan</span>
                    <strong id="modalStatusText" style="color: #2FAB26;">Tampil di Marketplace</strong>
                </div>
            </div>

            <div class="modal-description-box">
                <h4>Deskripsi & Spesifikasi Akun:</h4>
                <p id="modalDesc">
                    Akun Old Season 8 ON, Tas Kelinci ON, Shotgun 3 Rasa langka, Diamond 1000+.
                </p>
            </div>

            <div class="modal-actions-row">
                <button type="button" class="btn-posting" style="background: transparent; border: 1px solid rgba(255,255,255,0.2); color: #fff;" onclick="closeDetailModal()">
                    Tutup
                </button>
                <button type="button" class="btn-posting" onclick="editProduct(currentProductId)">
                    <i class="fa-solid fa-pen"></i> Edit Produk
                </button>
            </div>

        </div>
    </div>

    <!-- JAVASCRIPT LOGIC -->
    <script>
        let currentProductId = 1;
        let activeGameFilter = 'all';
        let lastProdukSnapshot = '';

        const DELETED_STORAGE_KEY = 'nexakun_deleted_products';
        const UPLOADED_STORAGE_KEY = 'nexakun_pending_products';
        const SECONDARY_UPLOAD_KEY = 'nexakun_uploaded_products';
        const ACTIVE_COUNT_KEY = 'nexakun_active_products_count';

        const productsData = {
            1: {
                title: "Akun PUBG Old - S8 ON (Nonaktif)",
                category: "PUBG Mobile",
                price: "Rp 800.000",
                status: "Nonaktif",
                statusClass: "nonaktif",
                img: "./images/v270_366.png",
                bind: "Akun Twitter / Email Bersih",
                desc: "Akun Old, S8 ON, Tas Kelinci ON SG 3 Rasa, DM 1000+. Status saat ini nonaktif karena sedang maintenance data seller."
            },
            2: {
                title: "Akun Free Fire Old Season 8 Koleksi",
                category: "Free Fire",
                price: "Rp 800.000",
                status: "Nonaktif",
                statusClass: "nonaktif",
                img: "./images/v270_378.png",
                bind: "Akun Twitter / Email Bersih",
                desc: "Akun Old, S8 ON, Tas Kelinci ON SG 3 Rasa, DM 1000+. Koleksi langka outfit eksklusif."
            },
            3: {
                title: "Akun PUBG Level 75 Sultan Glacier",
                category: "PUBG Mobile",
                price: "Rp 800.000",
                status: "Aktif",
                statusClass: "aktif",
                img: "./images/v273_384.png",
                bind: "Akun Twitter / Email Bersih",
                desc: "Akun PUBG Mobile level 75, memiliki 35 Mythic Outfit, 12 Legendary Gun Skin, Glacier M416, dan beberapa koleksi skin langka."
            },
            4: {
                title: "Akun Mobile Legend Mythic Glory",
                category: "Mobile Legend",
                price: "Rp 800.000",
                status: "Aktif",
                statusClass: "aktif",
                img: "./images/v270_366.png",
                bind: "Akun Twitter / Email Bersih",
                desc: "Akun Mobile Legends Rank Mythic, skin koleksi lengkap, aman dan siap pakai."
            },
            5: {
                title: "Akun Free Fire Old S8 Sultan",
                category: "Free Fire",
                price: "Rp 800.000",
                status: "Aktif",
                statusClass: "aktif",
                img: "./images/v270_378.png",
                bind: "Akun Twitter / Email Bersih",
                desc: "Akun Free Fire Old S8 ON, Tas Kelinci ON SG 3 Rasa, DM 1000+."
            },
            6: {
                title: "Akun PUBG Old S8 (Terjual)",
                category: "PUBG Mobile",
                price: "Rp 800.000",
                status: "Terjual",
                statusClass: "terjual",
                img: "./images/v273_384.png",
                bind: "Akun Twitter / Email Bersih",
                desc: "Akun telah sukses dibeli dan diverifikasi oleh admin. Transaksi selesai."
            }
        };

        function normalizeGameCategory(rawCat, cardText = '') {
            const c = `${String(rawCat || '')} ${String(cardText || '')}`.toLowerCase();
            if (c.includes('mobile legend') || c.includes('mlbb') || /\bml\b/.test(c)) return 'ml';
            if (c.includes('free fire') || /\bff\b/.test(c)) return 'ff';
            if (c.includes('pubg')) return 'pubg';
            return 'pubg';
        }

        function checkEmptyProducts() {
            const remainingCards = document.querySelectorAll('.product-card-item');
            const emptyMsg = document.getElementById('emptyStateMsg');
            if (remainingCards.length === 0) {
                emptyMsg.style.display = 'block';
            }
        }

        function syncActiveCountFromGrid(emitSync = false) {
            const cards = document.querySelectorAll('.product-card-item');
            let activeCount = 0;

            cards.forEach(card => {
                const pill = card.querySelector('.card-status-pill');
                const stText = (pill?.textContent || '').toLowerCase().trim();
                const isAktif = pill?.classList.contains('aktif') || stText === 'aktif';
                if (isAktif) activeCount += 1;
            });

            const counterEl = document.getElementById('produkActiveCounter');
            if (counterEl) counterEl.textContent = String(activeCount);

            try {
                const prev = localStorage.getItem(ACTIVE_COUNT_KEY);
                localStorage.setItem(ACTIVE_COUNT_KEY, String(activeCount));
                if (emitSync || prev !== String(activeCount)) {
                    window.dispatchEvent(new Event('nexakun:realtime-sync'));
                }
            } catch (e) {}

            return activeCount;
        }

        function getMergedUploadedProducts() {
            const merged = [];
            const seenIds = new Set();

            const pendingList = JSON.parse(localStorage.getItem(UPLOADED_STORAGE_KEY) || '[]');
            const secondaryList = JSON.parse(localStorage.getItem(SECONDARY_UPLOAD_KEY) || '[]');

            [...pendingList, ...secondaryList].forEach((raw, idx) => {
                const id = raw.id || `UPLOAD-${idx + 1}`;
                if (seenIds.has(String(id))) return;
                seenIds.add(String(id));

                const title = raw.nama || raw.title || 'Akun Game Baru';
                const category = raw.kategori || raw.game || 'PUBG Mobile';
                const rawPrice = raw.harga ?? raw.price ?? 0;
                const priceStr = String(rawPrice).startsWith('Rp')
                    ? String(rawPrice).replace(/^Rp(?!\s)/, 'Rp ')
                    : 'Rp ' + Number(String(rawPrice).replace(/[^0-9]/g, '') || 0).toLocaleString('id-ID');

                const rawSt = String(raw.status || 'aktif').toLowerCase().trim();
                const isSold = rawSt === 'terjual' || rawSt === 'selesai';
                const isInactive = rawSt === 'nonaktif' || rawSt === 'ditolak';
                const statusLabel = isSold ? 'Terjual' : (isInactive ? 'Nonaktif' : 'Aktif');
                const statusClass = isSold ? 'terjual' : (isInactive ? 'nonaktif' : 'aktif');

                merged.push({
                    id,
                    nama: title,
                    kategori: category,
                    gameKey: normalizeGameCategory(category, title),
                    harga: priceStr,
                    status: statusLabel,
                    statusClass,
                    gambar: raw.gambar || raw.img1 || './images/v270_378.png',
                    bind: raw.bind || 'Email Bersih (Unbind)',
                    deskripsi: raw.deskripsi || raw.desc || title
                });
            });

            return merged;
        }

        function renderUploadedProducts() {
            const grid = document.getElementById('productsGrid');
            const uploadedList = getMergedUploadedProducts();

            [...uploadedList].reverse().forEach((item) => {
                if (grid.querySelector(`.product-card-item[data-id="${CSS.escape(String(item.id))}"]`)) return;

                productsData[item.id] = {
                    title: item.nama,
                    category: item.kategori,
                    price: item.harga,
                    status: item.status,
                    statusClass: item.statusClass,
                    img: item.gambar,
                    bind: item.bind,
                    desc: item.deskripsi
                };

                const card = document.createElement('div');
                card.className = 'product-card-item';
                card.dataset.id = item.id;
                card.dataset.category = item.gameKey;
                card.onclick = () => openDetailModal(item.id);

                card.innerHTML = `
                    <div class="card-thumbnail-wrap">
                        <span class="card-status-pill ${item.statusClass}">${item.status}</span>
                        <img src="${item.gambar}" alt="${item.nama}">
                    </div>
                    <p class="card-desc-text">
                        ${item.deskripsi}
                    </p>
                    <div class="card-footer-action">
                        <span class="card-price">${item.harga}</span>
                        <div class="card-action-btns">
                            <button type="button" class="btn-icon-action edit" title="Edit Produk" onclick="event.stopPropagation(); editProduct('${item.id}')">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button type="button" class="btn-icon-action delete" title="Hapus Produk" onclick="event.stopPropagation(); deleteProduct('${item.id}')">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                    </div>
                `;

                grid.prepend(card);
            });
        }

        function buildProdukSnapshot() {
            return [
                localStorage.getItem(DELETED_STORAGE_KEY) || '',
                localStorage.getItem(UPLOADED_STORAGE_KEY) || '',
                localStorage.getItem(SECONDARY_UPLOAD_KEY) || ''
            ].join('||');
        }

        function refreshProdukRealtime(force = false) {
            const snap = buildProdukSnapshot();
            if (!force && snap === lastProdukSnapshot) return;
            lastProdukSnapshot = snap;

            renderUploadedProducts();

            const deletedIds = JSON.parse(localStorage.getItem(DELETED_STORAGE_KEY) || '[]');
            deletedIds.forEach(id => {
                const card = document.querySelector(`.product-card-item[data-id="${CSS.escape(String(id))}"]`);
                if (card) card.remove();
            });

            checkEmptyProducts();
            syncActiveCountFromGrid(force);
            filterProducts();
        }

        document.addEventListener('DOMContentLoaded', () => refreshProdukRealtime(true));
        window.addEventListener('storage', () => refreshProdukRealtime(true));
        window.addEventListener('nexakun:realtime-sync', () => refreshProdukRealtime(true));
        window.addEventListener('focus', () => refreshProdukRealtime(true));
        document.addEventListener('visibilitychange', () => {
            if (!document.hidden) refreshProdukRealtime(true);
        });
        setInterval(() => refreshProdukRealtime(false), 1000);

        function openDetailModal(id) {
            currentProductId = id;
            const data = productsData[id] || productsData[1];
            document.getElementById('modalId').textContent = String(id).startsWith('PRD-') ? id : 'PRD-PUBG-00' + id;
            document.getElementById('modalTitle').textContent = data.title;
            document.getElementById('modalCategory').textContent = data.category;
            document.getElementById('modalPrice').textContent = data.price;
            document.getElementById('modalBind').textContent = data.bind || 'Akun Twitter / Email Bersih';
            document.getElementById('modalDesc').textContent = data.desc;
            document.getElementById('modalImg').src = data.img;

            const badge = document.getElementById('modalStatusBadge');
            badge.textContent = data.status;
            badge.className = 'card-status-pill ' + data.statusClass;

            const statusText = document.getElementById('modalStatusText');
            statusText.textContent = data.status === 'Aktif'
                ? 'Tampil di Marketplace'
                : (data.status === 'Terjual' ? 'Sudah Terjual' : 'Menunggu Validasi Admin');
            statusText.style.color = data.status === 'Aktif'
                ? '#2FAB26'
                : (data.status === 'Terjual' ? '#FF383C' : '#FBBC05');

            document.getElementById('detailModalOverlay').classList.add('show');
        }

        function closeDetailModal() {
            document.getElementById('detailModalOverlay').classList.remove('show');
        }

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeDetailModal();
        });

        function editProduct(id) {
            window.location.href = `update_data_akun_game.html?id=${id}`;
        }

        function deleteProduct(id) {
            if (confirm('Yakin ingin menghapus produk ini?')) {
                const card = document.querySelector(`.product-card-item[data-id="${CSS.escape(String(id))}"]`);
                if (card) {
                    card.style.transition = 'opacity 0.25s ease, transform 0.25s ease';
                    card.style.opacity = '0';
                    card.style.transform = 'scale(0.95)';

                    setTimeout(() => {
                        card.remove();
                        checkEmptyProducts();
                        syncActiveCountFromGrid(true);
                        filterProducts();
                    }, 250);
                }

                let pendingList = JSON.parse(localStorage.getItem(UPLOADED_STORAGE_KEY) || '[]');
                pendingList = pendingList.filter(item => String(item.id) !== String(id));
                localStorage.setItem(UPLOADED_STORAGE_KEY, JSON.stringify(pendingList));

                let secondaryList = JSON.parse(localStorage.getItem(SECONDARY_UPLOAD_KEY) || '[]');
                secondaryList = secondaryList.filter(item => String(item.id) !== String(id));
                localStorage.setItem(SECONDARY_UPLOAD_KEY, JSON.stringify(secondaryList));

                const deletedIds = JSON.parse(localStorage.getItem(DELETED_STORAGE_KEY) || '[]');
                if (!deletedIds.includes(id)) {
                    deletedIds.push(id);
                    localStorage.setItem(DELETED_STORAGE_KEY, JSON.stringify(deletedIds));
                }

                delete productsData[id];
                lastProdukSnapshot = buildProdukSnapshot();
                window.dispatchEvent(new Event('nexakun:realtime-sync'));
            }
        }

        function resetDeletedProducts() {
            localStorage.removeItem(DELETED_STORAGE_KEY);
            location.reload();
        }

        function setGameFilter(btn, category) {
            const targetCat = normalizeGameCategory(category, btn?.textContent || '');
            if (activeGameFilter === targetCat && btn?.classList.contains('active')) {
                activeGameFilter = 'all';
                document.querySelectorAll('.game-pill').forEach(p => p.classList.remove('active'));
            } else {
                activeGameFilter = targetCat;
                document.querySelectorAll('.game-pill').forEach(p => p.classList.remove('active'));
                if (btn) btn.classList.add('active');
            }
            filterProducts();
        }

        function filterProducts() {
            const q = (document.getElementById('searchInput')?.value || '').toLowerCase().trim();
            const cards = document.querySelectorAll('.product-card-item');
            let visibleCount = 0;

            cards.forEach(card => {
                const text = (card.textContent || '').toLowerCase();
                const prodId = card.dataset.id;
                const prodTitle = (productsData[prodId]?.title || '').toLowerCase();
                const prodCatLabel = (productsData[prodId]?.category || '').toLowerCase();
                const combinedText = `${text} ${prodTitle} ${prodCatLabel}`;

                const cardCat = normalizeGameCategory(card.dataset.category, combinedText);
                const matchGame = activeGameFilter === 'all' || cardCat === activeGameFilter;
                const matchSearch = !q || combinedText.includes(q);

                if (matchGame && matchSearch) {
                    card.style.display = '';
                    visibleCount += 1;
                } else {
                    card.style.display = 'none';
                }
            });

            const emptyMsg = document.getElementById('emptyStateMsg');
            if (emptyMsg && cards.length > 0) {
                emptyMsg.style.display = visibleCount === 0 ? 'block' : 'none';
            }
        }
    </script>

</body>

</html>