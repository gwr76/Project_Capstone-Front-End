<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEXAKUN - Free Fire</title>
    <link rel="stylesheet" href="{{ asset('css/FF.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pembeli_filter_kategori.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gurajada&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Funnel+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
</head>

<body>

    <header class="navbar">
        <a href="/index" class="brand">
            <img src="images/v341_395.png" alt="NEXAKUN">
        </a>

        <nav class="nav-links">
            <a href="/index">Home</a>
            <a href="/#games" class="active">Games</a>
            <a href="/about">About</a>
            <a href="/contact">Contact</a>
        </nav>

        <div class="nav-actions">
            <button type="button" class="icon-button" onclick="showNotification()" aria-label="Notifikasi">
                <svg viewBox="0 0 24 24">
                    <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path>
                    <path d="M10 21h4"></path>
                </svg>
            </button>

            <button type="button" class="icon-button" onclick="toggleProfile()" aria-label="Profil">
                <svg viewBox="0 0 24 24">
                    <circle cx="12" cy="8" r="4"></circle>
                    <path d="M4 21a8 8 0 0 1 16 0"></path>
                </svg>
            </button>

            <div class="profile-menu" id="profileMenu">
                <strong>Akun Pembeli</strong>
                <a href="/pembeli/profile">Profil Saya</a>
                <a href="/pembeli/pesanan">Pesanan Saya</a>
                <a href="/pembeli/daftar-penjual">Daftar Jadi Penjual</a>
                <button type="button" id="logoutButton" onclick="window.location.href='/login'">Keluar</button>
            </div>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="hero-copy">
                <h1>FREE FIRE</h1>

                <p class="description">
                    Temukan akun Free Fire dengan bundle eksklusif, SG2,
                    dan koleksi item langka.
                </p>

                <p class="tagline">
                    Survive till the end. Claim your Booyah in style.
                </p>

                <form class="search-box" id="searchForm">
                    <svg class="search-icon" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="7"></circle>
                        <path d="m16 16 5 5"></path>
                    </svg>

                    <input type="text" id="searchInput" placeholder="Cari akun Free Fire..." oninput="filterFF()">

                    <button type="submit">Cari</button>
                </form>
            </div>

            <div class="hero-art"></div>
        </section>

        <section class="catalog-section">
            <div class="section-heading">
                <h2>Katalog Akun Free Fire</h2>
                <p>Pilih akun Free Fire dengan bundle dan item favoritmu.</p>
            </div>

            <div class="category-catalog-layout">
                <aside class="category-filter-panel" aria-label="Filter produk Free Fire">
                    <div class="category-filter-header">
                        <h3>Filter Produk</h3>
                        <button type="button" class="category-filter-reset" onclick="resetCategoryFilters()">Reset</button>
                    </div>

                    <div class="category-filter-group">
                        <label for="categoryRank">Rank / Tier</label>
                        <select id="categoryRank" onchange="filterFF()">
                            <option value="all">Semua Rank</option>
                            <option value="diamond">Diamond</option>
                            <option value="heroic">Heroic</option>
                            <option value="master">Master</option>
                            <option value="grandmaster">Grandmaster</option>
                        </select>
                    </div>

                    <div class="category-filter-group">
                        <label for="categoryLevel">Minimal Level</label>
                        <select id="categoryLevel" onchange="filterFF()">
                            <option value="0">Semua Level</option>
                            <option value="50">Min. Level 50+</option>
                            <option value="60">Min. Level 60+</option>
                            <option value="65">Min. Level 65+</option>
                            <option value="70">Min. Level 70+</option>
                        </select>
                    </div>

                    <div class="category-filter-group">
                        <label for="categorySkin">Koleksi Bundle & Item</label>
                        <select id="categorySkin" onchange="filterFF()">
                            <option value="all">Semua Koleksi</option>
                            <option value="sg2">SG2 / Shotgun</option>
                            <option value="bundle">Bundle Eksklusif</option>
                            <option value="evo">Evo Gun</option>
                            <option value="old">Akun Old</option>
                        </select>
                    </div>

                    <div class="category-filter-group">
                        <label>Range Harga (Rp)</label>
                        <div class="category-price-inputs">
                            <input type="number" id="categoryMinPrice" placeholder="Min" aria-label="Harga minimum"
                                oninput="filterFF()">
                            <input type="number" id="categoryMaxPrice" placeholder="Maks" aria-label="Harga maksimum"
                                oninput="filterFF()">
                        </div>
                    </div>

                    <button type="button" class="category-filter-apply" onclick="filterFF()">Terapkan Filter</button>
                </aside>

                <div class="category-products">
                    <p class="category-product-count" aria-live="polite">
                        Menampilkan <strong id="categoryProductCount">4</strong> akun Free Fire
                    </p>
                    <div class="product-grid" id="ffProductGrid">

                        <article class="product-card" data-default-card="1" data-account-key="Akun FF Diamond">
                            <img src="images/v1_1165.png" alt="Akun FF Diamond">
                            <div class="product-info">
                                <h3>Akun FF Diamond</h3>
                                <p>Level 55 | Rank Diamond | Bundle Eksklusif</p>
                                <div class="product-bottom">
                                    <strong>Rp220.000</strong>
                                    <button type="button" onclick="buyAccount('Akun FF Diamond')">Beli Sekarang</button>
                                </div>
                            </div>
                        </article>

                        <article class="product-card" data-default-card="1" data-account-key="Akun FF SG2">
                            <img src="images/v1_1165.png" alt="Akun FF SG2">
                            <div class="product-info">
                                <h3>Akun FF SG2</h3>
                                <p>Level 62 | Rank Heroic | SG2 & Evo Gun</p>
                                <div class="product-bottom">
                                    <strong>Rp320.000</strong>
                                    <button type="button" onclick="buyAccount('Akun FF SG2')">Beli Sekarang</button>
                                </div>
                            </div>
                        </article>

                        <article class="product-card" data-default-card="1" data-account-key="Akun S8 ON">
                            <img src="images/v1_1165.png" alt="Akun S8 ON">
                            <div class="product-info">
                                <h3>Akun S8 ON</h3>
                                <p>Level 68 | Rank Master | Akun Old & Bundle Eksklusif</p>
                                <div class="product-bottom">
                                    <strong>Rp450.000</strong>
                                    <button type="button" onclick="buyAccount('Akun S8 ON')">Beli Sekarang</button>
                                </div>
                            </div>
                        </article>

                        <article class="product-card" data-default-card="1" data-account-key="Akun FF Sultan">
                            <img src="images/v1_1165.png" alt="Akun FF Sultan">
                            <div class="product-info">
                                <h3>Akun FF Sultan</h3>
                                <p>Level 72 | Grandmaster | SG2, Evo Gun & Bundle Eksklusif</p>
                                <div class="product-bottom">
                                    <strong>Rp650.000</strong>
                                    <button type="button" onclick="buyAccount('Akun FF Sultan')">Beli Sekarang</button>
                                </div>
                            </div>
                        </article>

                    </div>

                    <p class="empty-message" id="emptyMessage">Akun tidak ditemukan.</p>
                </div>
            </div>
        </section>
    </main>

    <footer id="contact">
        <h2>NEXAKUN</h2>
        <p>Tempat jual beli akun game dengan mudah dan nyaman.</p>
        <p>© 2026 NEXAKUN. All Rights Reserved.</p>
    </footer>

    <script>
        const UPLOAD_KEYS = [
            'nexakun_pending_products',
            'nexakun_uploaded_products',
            'nexakun_products'
        ];
        const DELETED_KEY = 'nexakun_deleted_products';
        let lastCatalogSnapshot = '';

        function normalizeVariants(rawText) {
            const variants = new Set();
            const base = String(rawText || "").toLowerCase().trim();
            if (!base) return variants;

            variants.add(base);

            const parts = base.split(/\s*(?:–|—|-|\|)\s*/).map(s => s.trim()).filter(Boolean);
            parts.forEach(p => {
                if (p.length >= 6) variants.add(p);
            });

            if (parts.length > 1 && (parts[0] === "free fire" || parts[0] === "ff")) {
                const afterGame = parts.slice(1).join(" - ").trim();
                if (afterGame.length >= 6) variants.add(afterGame);
            }

            return variants;
        }

        function getSoldAccountsSet() {
            const sold = new Set();
            try {
                const statusMap = JSON.parse(localStorage.getItem("nexakun_admin_order_status") || "{}");
                const historyList = JSON.parse(localStorage.getItem("nexakun_order_history") || "[]");
                const deliveredList = JSON.parse(localStorage.getItem("nexakun_delivered_accounts") || "[]");

                historyList.forEach(item => {
                    if (item.status === "selesai" || statusMap[item.kodeOrder] === "selesai") {
                        if (item.idProduk) sold.add(String(item.idProduk).toLowerCase().trim());
                        normalizeVariants(item.namaProduk).forEach(v => sold.add(v));
                        normalizeVariants(item.namaAkunBersih).forEach(v => sold.add(v));
                    }
                });

                deliveredList.forEach(item => {
                    if (item.idProduk) sold.add(String(item.idProduk).toLowerCase().trim());
                    normalizeVariants(item.namaProduk).forEach(v => sold.add(v));
                    normalizeVariants(item.namaAkunBersih).forEach(v => sold.add(v));
                });
            } catch (e) {}
            return sold;
        }

        function isSoldCard(card, soldSet) {
            if (!soldSet || soldSet.size === 0) return false;
            const pid = (card.dataset.productId || "").toLowerCase().trim();
            const title = (card.querySelector("h3")?.textContent || "").toLowerCase().trim();
            const key = (card.dataset.accountKey || "").toLowerCase().trim();

            const cardVariants = new Set([
                ...normalizeVariants(title),
                ...normalizeVariants(key)
            ]);

            if (pid && soldSet.has(pid)) return true;

            for (const soldVal of soldSet) {
                if (!soldVal || soldVal.length < 6) continue;
                for (const cVar of cardVariants) {
                    if (cVar === soldVal || soldVal.startsWith(cVar + " ") || cVar.startsWith(soldVal + " ")) {
                        return true;
                    }
                }
            }
            return false;
        }

        function isFreeFireProduct(prod) {
            const combined = [
                prod.game || '',
                prod.kategori || '',
                prod.title || '',
                prod.nama || '',
                prod.desc || '',
                prod.deskripsi || ''
            ].join(' ').toLowerCase();

            return combined.includes("free fire") || /\bff\b/.test(combined);
        }

        function getMergedUploadedFF() {
            const merged = [];
            const seenKeys = new Set();

            UPLOAD_KEYS.forEach((key, kIdx) => {
                let list = [];
                try {
                    list = JSON.parse(localStorage.getItem(key) || "[]");
                } catch (e) {}

                if (!Array.isArray(list)) return;

                list.forEach((prod, idx) => {
                    if (!prod || typeof prod !== "object") return;
                    if (!isFreeFireProduct(prod)) return;

                    const st = String(prod.status || "aktif").toLowerCase().trim();
                    if (st === "terjual" || st === "selesai" || st === "nonaktif" || st === "ditolak") return;

                    const title = String(prod.title || prod.nama || "Akun Free Fire Baru").trim();
                    const id = String(prod.id || `FF-UP-${kIdx}-${idx}`);
                    const dedupKey = `${id}::${title.toLowerCase()}`;
                    if (seenKeys.has(dedupKey)) return;
                    seenKeys.add(dedupKey);

                    merged.push({
                        id,
                        title,
                        desc: prod.desc || prod.deskripsi || "Akun Free Fire baru dari penjual.",
                        priceNum: Number(prod.price) || Number(String(prod.harga || "0").replace(/[^0-9]/g, "")) || 200000,
                        imgSrc: prod.img1 || prod.gambar || prod.img || "images/v1_1165.png",
                        img2: prod.img2 || prod.gambar || prod.img1 || "images/v1_1165.png",
                        seller: prod.seller || prod.toko || "ALDONESIA HENGKER TZY"
                    });
                });
            });

            return merged;
        }

        function buildCatalogSnapshot() {
            return [
                ...UPLOAD_KEYS.map(k => localStorage.getItem(k) || ""),
                localStorage.getItem(DELETED_KEY) || "",
                localStorage.getItem("nexakun_admin_order_status") || "",
                localStorage.getItem("nexakun_order_history") || "",
                localStorage.getItem("nexakun_delivered_accounts") || ""
            ].join("||");
        }

        function syncFFCatalog(force = false) {
            const snap = buildCatalogSnapshot();
            if (!force && snap === lastCatalogSnapshot) return;
            lastCatalogSnapshot = snap;

            const grid = document.getElementById("ffProductGrid");
            if (!grid) return;

            const soldSet = getSoldAccountsSet();
            const deletedSet = new Set(
                (JSON.parse(localStorage.getItem(DELETED_KEY) || "[]")).map(String)
            );

            grid.querySelectorAll('[data-dynamic-upload="1"]').forEach(el => el.remove());

            const uploadedFF = getMergedUploadedFF();
            uploadedFF.slice().reverse().forEach(prod => {
                if (deletedSet.has(String(prod.id))) return;

                const card = document.createElement("article");
                card.className = "product-card";
                card.dataset.dynamicUpload = "1";
                card.dataset.productId = prod.id;
                card.dataset.accountKey = prod.title;
                card.dataset.sellerName = prod.seller;
                card.dataset.img2 = prod.img2;
                card.innerHTML = `
                    <img src="${prod.imgSrc}" alt="${prod.title}">
                    <div class="product-info">
                        <h3>${prod.title}</h3>
                        <p>${prod.desc}</p>
                        <div class="product-bottom">
                            <strong>Rp${prod.priceNum.toLocaleString("id-ID")}</strong>
                            <button type="button" onclick="buyAccount('${prod.title.replace(/'/g, "\\'")}')">Beli Sekarang</button>
                        </div>
                    </div>
                `;
                grid.prepend(card);
            });

            grid.querySelectorAll(".product-card").forEach(card => {
                const pid = String(card.dataset.productId || "");
                if ((pid && deletedSet.has(pid)) || isSoldCard(card, soldSet)) {
                    card.remove();
                }
            });

            grid.querySelectorAll(".product-card").forEach(card => {
                if (card.dataset.detailBound === "1") return;
                card.dataset.detailBound = "1";
                card.style.cursor = "pointer";
                card.addEventListener("click", function (event) {
                    if (event.target.closest("button")) return;

                    const title = card.querySelector("h3").textContent.trim();
                    const desc = card.querySelector("p").textContent.trim();
                    const price = card.querySelector("strong").textContent.replace(/[^0-9]/g, "");
                    const img = card.querySelector("img").getAttribute("src");

                    const params = new URLSearchParams({
                        id: card.dataset.productId || "",
                        game: "Free Fire",
                        akun: title,
                        desc: desc,
                        harga: price,
                        img: img,
                        img2: card.dataset.img2 || img,
                        penjual: card.dataset.sellerName || "Booyah Store"
                    });

                    window.location.href = "detail_akun.html?" + params.toString();
                });
            });

            filterFF();
        }

        function toggleProfile() {
            document.getElementById("profileMenu").classList.toggle("show");
        }

        document.addEventListener("click", function (event) {
            const menu = document.getElementById("profileMenu");
            const button = document.querySelectorAll(".icon-button")[1];

            if (menu && button && !menu.contains(event.target) && !button.contains(event.target)) {
                menu.classList.remove("show");
            }
        });

        function logout() {
            if (confirm("Apakah kamu yakin ingin logout?")) {
                window.location.href = "index.html";
            }
        }

        function showNotification() {
            alert("Belum ada notifikasi baru.");
        }

        function buyAccount(account) {
            alert("Kamu memilih " + account + ". Silakan lanjutkan ke proses transaksi.");
        }

        document.getElementById("searchForm").addEventListener("submit", function (event) {
            event.preventDefault();
            filterFF();
        });

        function filterFF() {
            const rank = document.getElementById("categoryRank").value;
            const minLvl = parseInt(document.getElementById("categoryLevel").value) || 0;
            const skin = document.getElementById("categorySkin").value;
            const minPrice = parseInt(document.getElementById("categoryMinPrice").value) || 0;
            const maxPrice = parseInt(document.getElementById("categoryMaxPrice").value) || Infinity;
            const keyword = document.getElementById("searchInput").value.toLowerCase().trim();

            const cards = document.querySelectorAll(".product-card");
            let found = 0;

            cards.forEach(function (card) {
                const desc = card.querySelector("p").textContent;
                const text = card.textContent.toLowerCase();
                const priceText = card.querySelector("strong").textContent.replace(/[^0-9]/g, "");
                const price = parseInt(priceText) || 0;

                const matchRank = (rank === "all") || text.includes(rank);
                const matchSkin = (skin === "all") || text.includes(skin);
                const matchPrice = price >= minPrice && price <= maxPrice;
                const matchKeyword = !keyword || text.includes(keyword);

                const lvlMatch = desc.match(/Level\s*(\d+)/i);
                const lvl = lvlMatch ? parseInt(lvlMatch[1]) : minLvl;
                const matchLvl = lvl >= minLvl;

                if (matchRank && matchSkin && matchPrice && matchLvl && matchKeyword) {
                    card.style.display = "";
                    found++;
                } else {
                    card.style.display = "none";
                }
            });

            const emptyMsg = document.getElementById("emptyMessage");
            if (emptyMsg) emptyMsg.style.display = found === 0 ? "block" : "none";
            document.getElementById("categoryProductCount").textContent = found;
        }

        function resetCategoryFilters() {
            document.getElementById("categoryRank").value = "all";
            document.getElementById("categoryLevel").value = "0";
            document.getElementById("categorySkin").value = "all";
            document.getElementById("categoryMinPrice").value = "";
            document.getElementById("categoryMaxPrice").value = "";
            document.getElementById("searchInput").value = "";
            filterFF();
        }

        document.addEventListener("DOMContentLoaded", () => syncFFCatalog(true));
        window.addEventListener("storage", () => syncFFCatalog(true));
        window.addEventListener("nexakun:realtime-sync", () => syncFFCatalog(true));
        window.addEventListener("focus", () => syncFFCatalog(true));
        document.addEventListener("visibilitychange", () => {
            if (!document.hidden) syncFFCatalog(true);
        });
        setInterval(() => syncFFCatalog(false), 1000);
    </script>
    <script src="js/checkout-redirect.js"></script>

</body>

</html>