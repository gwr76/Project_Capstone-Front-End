<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEXAKUN - Mobile Legends</title>
    <link rel="stylesheet" href="{{ asset('css/ML.css') }}">
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
            <a href="/pembeli" class="active">Games</a>
            <a href="/about">About</a>
            <a href="/contact">Contact</a>
        </nav>

        <div class="nav-actions">
            <button class="icon-button" onclick="showNotification()" aria-label="Notifikasi">
                <svg viewBox="0 0 24 24">
                    <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path>
                    <path d="M10 21h4"></path>
                </svg>
            </button>

            <button class="icon-button" onclick="toggleProfile()" aria-label="Profil">
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
                <button id="logoutButton" onclick="window.location.href='/login'">Keluar</button>
            </div>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="hero-copy">
                <h1>MOBILE LEGENDS</h1>

                <p class="description">
                    Temukan akun Mobile Legends dengan berbagai pilihan hero,
                    skin eksklusif, dan rank tinggi.
                </p>

                <p class="tagline">
                    Choose your hero. Lead your team to victory.
                </p>

                <form class="search-box" id="searchForm">
                    <svg class="search-icon" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="7"></circle>
                        <path d="m16 16 5 5"></path>
                    </svg>

                    <input type="text" id="searchInput" placeholder="Cari akun Mobile Legends..." oninput="filterML()">

                    <button type="submit">Cari</button>
                </form>
            </div>

            <div class="hero-art"></div>
        </section>

        <section class="catalog-section">
            <div class="section-heading">
                <h2>Katalog Akun Mobile Legends</h2>
                <p>Pilih akun Mobile Legends dengan hero dan skin favoritmu.</p>
            </div>

            <div class="category-catalog-layout">
                <aside class="category-filter-panel" aria-label="Filter produk Mobile Legends">
                    <div class="category-filter-header">
                        <h3>Filter Produk</h3>
                        <button type="button" class="category-filter-reset" onclick="resetCategoryFilters()">Reset</button>
                    </div>

                    <div class="category-filter-group">
                        <label for="categoryRank">Rank / Tier</label>
                        <select id="categoryRank" onchange="filterML()">
                            <option value="all">Semua Rank</option>
                            <option value="epic">Epic</option>
                            <option value="legend">Legend</option>
                            <option value="mythic">Mythic</option>
                            <option value="glory">Mythical Glory</option>
                        </select>
                    </div>

                    <div class="category-filter-group">
                        <label for="categoryLevel">Minimal Level</label>
                        <select id="categoryLevel" onchange="filterML()">
                            <option value="0">Semua Level</option>
                            <option value="45">Min. Level 45+</option>
                            <option value="55">Min. Level 55+</option>
                            <option value="60">Min. Level 60+</option>
                            <option value="70">Min. Level 70+</option>
                        </select>
                    </div>

                    <div class="category-filter-group">
                        <label for="categorySkin">Koleksi Skin</label>
                        <select id="categorySkin" onchange="filterML()">
                            <option value="all">Semua Koleksi Skin</option>
                            <option value="collector">Skin Collector</option>
                            <option value="legend">Skin Legend</option>
                            <option value="hero">Koleksi Hero</option>
                            <option value="premium">Skin Premium</option>
                        </select>
                    </div>

                    <div class="category-filter-group">
                        <label>Range Harga (Rp)</label>
                        <div class="category-price-inputs">
                            <input type="number" id="categoryMinPrice" placeholder="Min" aria-label="Harga minimum"
                                oninput="filterML()">
                            <input type="number" id="categoryMaxPrice" placeholder="Maks" aria-label="Harga maksimum"
                                oninput="filterML()">
                        </div>
                    </div>

                    <button type="button" class="category-filter-apply" onclick="filterML()">Terapkan Filter</button>
                </aside>

                <div class="category-products">
                    <p class="category-product-count" aria-live="polite">
                        Menampilkan <strong id="categoryProductCount">4</strong> akun Mobile Legends
                    </p>
                    <div class="product-grid" id="mlProductGrid">

                        <article class="product-card" data-default-card="1" data-account-key="Akun Epic">
                            <img src="images/v1_972.png" alt="Akun Epic">
                            <div class="product-info">
                                <h3>Akun Epic</h3>
                                <p>Level 45 | Rank Epic | Koleksi Hero</p>
                                <div class="product-bottom">
                                    <strong>Rp150.000</strong>
                                    <button onclick="buyAccount('Akun Epic')">Beli Sekarang</button>
                                </div>
                            </div>
                        </article>

                        <article class="product-card" data-default-card="1" data-account-key="Akun Collector">
                            <img src="images/v1_983.png" alt="Akun Collector">
                            <div class="product-info">
                                <h3>Akun Collector</h3>
                                <p>Level 55 | Mythical Honor | Skin Collector</p>
                                <div class="product-bottom">
                                    <strong>Rp250.000</strong>
                                    <button onclick="buyAccount('Akun Collector')">Beli Sekarang</button>
                                </div>
                            </div>
                        </article>

                        <article class="product-card" data-default-card="1" data-account-key="Akun Legend">
                            <img src="images/v1_994.png" alt="Akun Legend">
                            <div class="product-info">
                                <h3>Akun Legend</h3>
                                <p>Level 60 | Mythical Glory | Skin Legend</p>
                                <div class="product-bottom">
                                    <strong>Rp350.000</strong>
                                    <button onclick="buyAccount('Akun Legend')">Beli Sekarang</button>
                                </div>
                            </div>
                        </article>

                        <article class="product-card" data-default-card="1" data-account-key="Akun Sultan">
                            <img src="images/v1_1005.png" alt="Akun Sultan">
                            <div class="product-info">
                                <h3>Akun Sultan</h3>
                                <p>Level 70 | Mythical Immortal | Skin Premium</p>
                                <div class="product-bottom">
                                    <strong>Rp500.000</strong>
                                    <button onclick="buyAccount('Akun Sultan')">Beli Sekarang</button>
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
        function getSoldAccountsSet() {
            const sold = new Set();
            try {
                const statusMap = JSON.parse(localStorage.getItem("nexakun_admin_order_status") || "{}");
                const historyList = JSON.parse(localStorage.getItem("nexakun_order_history") || "[]");
                const deliveredList = JSON.parse(localStorage.getItem("nexakun_delivered_accounts") || "[]");

                historyList.forEach(item => {
                    if (item.status === "selesai" || statusMap[item.kodeOrder] === "selesai") {
                        if (item.idProduk) sold.add(String(item.idProduk).toLowerCase().trim());
                        if (item.namaProduk) sold.add(String(item.namaProduk).toLowerCase().trim());
                    }
                });

                deliveredList.forEach(item => {
                    if (item.namaProduk) sold.add(String(item.namaProduk).toLowerCase().trim());
                });
            } catch (e) {}
            return sold;
        }

        function isSoldCard(card, soldSet) {
            if (!soldSet || soldSet.size === 0) return false;
            const pid = (card.dataset.productId || "").toLowerCase().trim();
            const key = (card.dataset.accountKey || "").toLowerCase().trim();
            const title = (card.querySelector("h3")?.textContent || "").toLowerCase().trim();

            for (const s of soldSet) {
                if (!s || s.length < 5) continue;
                if (pid && pid === s) return true;
                if (key && title === s) return true;
                if (title && title === s) return true;
            }
            return false;
        }

        function syncMLCatalog() {
            const grid = document.getElementById("mlProductGrid");
            if (!grid) return;

            const soldSet = getSoldAccountsSet();

            // 1. Tampilkan akun Mobile Legends baru yang diposting penjual
            try {
                const uploadedList = JSON.parse(localStorage.getItem("nexakun_uploaded_products") || "[]");
                uploadedList
                    .filter(p => {
                        const gameVal = (p.game || p.kategori || "").toLowerCase();
                        return gameVal.includes("mobile legends") || gameVal === "ml";
                    })
                    .forEach(prod => {
                        const prodId = prod.id || "";
                        if (prodId && grid.querySelector(`[data-product-id="${CSS.escape(prodId)}"]`)) return;

                        const title = prod.title || prod.nama || "Akun Mobile Legends Baru";
                        const desc = prod.desc || prod.deskripsi || "Akun Mobile Legends baru dari penjual.";
                        const priceNum = Number(prod.price) || Number(String(prod.harga || "0").replace(/[^0-9]/g, "")) || 150000;
                        const imgSrc = prod.img1 || prod.gambar || "images/v1_994.png";
                        const seller = prod.seller || prod.toko || "ALDONESIA HENGKER TZY";

                        const card = document.createElement("article");
                        card.className = "product-card";
                        card.dataset.productId = prodId;
                        card.dataset.accountKey = title;
                        card.dataset.sellerName = seller;
                        card.dataset.img2 = prod.img2 || imgSrc;
                        card.innerHTML = `
                            <img src="${imgSrc}" alt="${title}">
                            <div class="product-info">
                                <h3>${title}</h3>
                                <p>${desc}</p>
                                <div class="product-bottom">
                                    <strong>Rp${priceNum.toLocaleString("id-ID")}</strong>
                                    <button onclick="buyAccount('${title.replace(/'/g, "\\'")}')">Beli Sekarang</button>
                                </div>
                            </div>
                        `;
                        grid.prepend(card);
                    });
            } catch (e) {}

            // 2. Hapus postingan akun yang sudah di-ACC (Selesai)
            grid.querySelectorAll(".product-card").forEach(card => {
                if (isSoldCard(card, soldSet)) {
                    card.remove();
                }
            });

            // 3. Hubungkan klik kartu ke halaman detail akun
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
                        game: "Mobile Legends",
                        akun: title,
                        desc: desc,
                        harga: price,
                        img: img,
                        img2: card.dataset.img2 || img,
                        penjual: card.dataset.sellerName || "Victory Game Shop"
                    });

                    window.location.href = "detail_akun.html?" + params.toString();
                });
            });

            filterML();
        }

        function toggleProfile() {
            document.getElementById("profileMenu").classList.toggle("show");
        }

        document.addEventListener("click", function (event) {
            const menu = document.getElementById("profileMenu");
            const button = document.querySelectorAll(".icon-button")[1];

            if (!menu.contains(event.target) && !button.contains(event.target)) {
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
            filterML();
        });

        function filterML() {
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
            filterML();
        }

        document.addEventListener("DOMContentLoaded", syncMLCatalog);
    </script>
    <script src="js/checkout-redirect.js"></script>

</body>

</html>