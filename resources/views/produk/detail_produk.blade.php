<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEXAKUN - Detail Akun Game</title>

    <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gurajada&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Funnel+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/detail_akun.css') }}">
</head>

<body>

    <!-- NAVBAR -->
    <header class="navbar">
        <a href="/index" class="brand">
            <img src="{{ asset('images/v341_395.png') }}" alt="NEXAKUN">
        </a>

        <button type="button" class="btn-back-nav" onclick="window.history.back()">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 14 4 9l5-5" />
                <path d="M4 9h10.5a5.5 5.5 0 0 1 5.5 5.5v0a5.5 5.5 0 0 1-5.5 5.5H11" />
            </svg>
            <span>Kembali</span>
        </button>
    </header>

    <!-- KONTEN DETAIL -->
    <main class="detail-container">

        <!-- Banner Header -->
        <section class="detail-hero-banner">
            <div class="detail-hero-text">
                <h1><span class="accent-blue">Detail</span> <span id="heroGameTitle">Game</span></h1>
                <p id="heroGameSub">Temukan akun game terbaik dengan berbagai pilihan skin dan rank.</p>
            </div>
            <img src="{{ asset('images/v1_507.png') }}" alt="Banner Game" class="detail-hero-bg" id="heroBannerImg">
        </section>

        <!-- Galeri Screenshot -->
        <section class="screenshot-gallery">
            <div class="screenshot-box">
                <img src="{{ asset('images/v1_1165.png') }}" alt="Screenshot Akun 1" id="detailImg1">
            </div>
            <div class="screenshot-box">
                <img src="{{ asset('images/v1_1187.png') }}" alt="Screenshot Akun 2" id="detailImg2">
            </div>
        </section>

        <!-- Status, Judul & Harga -->
        <span class="status-badge">Produk Aktif</span>
        <h2 class="account-main-title" id="detailTitle">Akun Game Pilihan</h2>
        <div class="account-main-price" id="detailPrice">Rp. 150.000</div>

        <!-- Informasi Akun -->
        <section class="detail-section">
            <h2>Informasi Akun</h2>
            <div class="spec-list" id="accountInfoList"></div>
        </section>

        <!-- Koleksi Skin -->
        <section class="detail-section">
            <h2>Koleksi Skin</h2>
            <div class="spec-list" id="skinCollectionList"></div>
        </section>

        <!-- Deskripsi Produk -->
        <section class="detail-section">
            <h2>Deskripsi Produk</h2>
            <p class="desc-text" id="detailDescription">
                Akun game terverifikasi aman, siap main, dan dilengkapi berbagai koleksi skin pilihan.
            </p>
        </section>

        <!-- Informasi Penjual -->
        <section class="detail-section">
            <h2>Informasi Penjual</h2>
            <div class="seller-card">
                <div class="seller-header">
                    <div class="seller-avatar">🏪</div>
                    <div class="seller-title-group">
                        <h3 id="sellerName">Victory Game Shop</h3>
                        <span>✓ Terverifikasi</span>
                    </div>
                </div>
                <div class="spec-row">
                    <span class="spec-label">Produk Terjual</span>
                    <span class="spec-value" id="sellerSold">28 Produk</span>
                </div>
                <div class="spec-row" style="border-bottom:none; padding-bottom:0;">
                    <span class="spec-label">Bergabung Sejak</span>
                    <span class="spec-value" id="sellerJoined">Januari 2026</span>
                </div>
            </div>
        </section>

        <!-- Total Harga & Tombol Beli -->
        <div class="checkout-bar">
            <div class="total-price-box">
                <span>Total Harga</span>
                <strong id="bottomTotalPrice">Rp. 150.000</strong>
            </div>

            <button type="button" class="btn-buy-now" id="btnProceedPayment">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
                <span>Beli</span>
            </button>
        </div>

    </main>

    <!-- FOOTER -->
    <footer>
        © 2026 NEXAKUN. Platform jual beli akun game.
    </footer>

    <script>
        const ACCOUNT_DATABASE = {
            // --- FREE FIRE ---
            "Akun Evo Gun": {
                game: "Free Fire",
                heroSub: "Temukan akun Free Fire terbaik dengan berbagai pilihan skin senjata dan bundle langka.",
                bannerImg: "{{ asset('images/v270_378.png') }}",
                img1: "{{ asset('images/v1_1165.png') }}",
                img2: "{{ asset('images/v1_1187.png') }}",
                title: "Akun Evo Gun — Level 55 | Koleksi Evo Gun | Skin Premium",
                price: 150000,
                info: [
                    { label: "Level Akun", value: "Level 55" },
                    { label: "Rank Tertinggi", value: "Heroic" },
                    { label: "Jumlah Vault / Skin", value: "185+ Item" },
                    { label: "Login Akun", value: "Google / VK Bersih" }
                ],
                skins: [
                    { label: "Evo Gun", value: "AK47 Blue Flame & MP40 Predatory" },
                    { label: "Bundle Langka", value: "12 Bundle" },
                    { label: "Emote Spesial", value: "18 Emote" },
                    { label: "Gloo Wall", value: "14 Skin" }
                ],
                desc: "Akun Free Fire dengan koleksi Evo Gun aktif, bundle karakter keren, serta emote langka. Data login bersih dan siap langsung diamankan pembeli.",
                seller: "Victory Game Shop",
                sold: "28 Produk",
                joined: "Januari 2026"
            },
            "Akun Sultan Level 70": {
                game: "Free Fire",
                heroSub: "Temukan akun Free Fire terbaik dengan berbagai pilihan skin senjata dan bundle langka.",
                bannerImg: "{{ asset('images/v270_378.png') }}",
                img1: "{{ asset('images/v1_1187.png') }}",
                img2: "{{ asset('images/v1_1198.png') }}",
                title: "Akun Sultan Level 70 — Bundle Langka | Banyak Skin",
                price: 250000,
                info: [
                    { label: "Level Akun", value: "Level 70" },
                    { label: "Rank Tertinggi", value: "Master" },
                    { label: "Jumlah Vault / Skin", value: "340+ Item" },
                    { label: "Login Akun", value: "Facebook Unbinded" }
                ],
                skins: [
                    { label: "Bundle Old", value: "80+ Bundle" },
                    { label: "Skin Senjata Lobby", value: "24 Skin" },
                    { label: "Katana & Fist", value: "6 Skin" },
                    { label: "Tas & Parasut", value: "45 Item" }
                ],
                desc: "Akun Sultan Free Fire Level 70 dengan lebih dari 80 bundle pilihan termasuk item old. Sangat cocok untuk push rank maupun koleksi.",
                seller: "Aldonesia Store",
                sold: "42 Produk",
                joined: "Desember 2025"
            },
            "Akun M1014": {
                game: "Free Fire",
                heroSub: "Temukan akun Free Fire terbaik dengan berbagai pilihan skin senjata dan bundle langka.",
                bannerImg: "{{ asset('images/v270_378.png') }}",
                img1: "{{ asset('images/v1_1176.png') }}",
                img2: "{{ asset('images/v1_1165.png') }}",
                title: "Akun M1014 — Skin M1014 | Koleksi Senjata | Level Tinggi",
                price: 350000,
                info: [
                    { label: "Level Akun", value: "Level 64" },
                    { label: "Rank Tertinggi", value: "Grandmaster" },
                    { label: "Jumlah Vault / Skin", value: "290+ Item" },
                    { label: "Login Akun", value: "Google Bersih" }
                ],
                skins: [
                    { label: "M1014 Green Flame Draco", value: "Max Level" },
                    { label: "SG2 Rapper Underworld", value: "Ada" },
                    { label: "Bundle Inkubator", value: "5 Set" },
                    { label: "Emote Lobby", value: "25 Emote" }
                ],
                desc: "Spesialis shotgun dengan M1014 Green Flame Draco dan SG2 unggulan. Statistik KD tinggi dan siap dipakai turnamen.",
                seller: "Budi Gaming Shop",
                sold: "35 Produk",
                joined: "Januari 2026"
            },
            "Akun Koleksi Lengkap": {
                game: "Free Fire",
                heroSub: "Temukan akun Free Fire terbaik dengan berbagai pilihan skin senjata dan bundle langka.",
                bannerImg: "{{ asset('images/v270_378.png') }}",
                img1: "{{ asset('images/v1_1198.png') }}",
                img2: "{{ asset('images/v1_1176.png') }}",
                title: "Akun Koleksi Lengkap — Bundle Eksklusif | Evo Gun | Item Langka",
                price: 500000,
                info: [
                    { label: "Level Akun", value: "Level 74" },
                    { label: "Rank Tertinggi", value: "Grandmaster" },
                    { label: "Jumlah Vault / Skin", value: "510+ Item" },
                    { label: "Login Akun", value: "Google Single Bind" }
                ],
                skins: [
                    { label: "Evo Gun", value: "6 Evo Gun" },
                    { label: "Bundle Eksklusif", value: "120+ Bundle" },
                    { label: "Criminal & Dino", value: "3 Set" },
                    { label: "All Karakter & Pet", value: "Lengkap" }
                ],
                desc: "Akun kolektor lengkap dengan ratusan bundle eksklusif, deretan Evo Gun, dan seluruh karakter terbuka.",
                seller: "NEXAKUN Official Store",
                sold: "64 Produk",
                joined: "November 2025"
            },

            // --- MOBILE LEGENDS ---
            "Akun Epic": {
                game: "Mobile Legends",
                heroSub: "Temukan akun Mobile Legends terbaik dengan berbagai pilihan skin dan rank.",
                bannerImg: "{{ asset('images/v273_379.png') }}",
                img1: "images/v1_972.png",
                img2: "images/v1_983.png",
                title: "Akun Mobile Legends Epic — Level 45 | Koleksi Hero",
                price: 150000,
                info: [
                    { label: "Jumlah Skin", value: "68 Skin" },
                    { label: "Rank Tertinggi", value: "Epic I" },
                    { label: "Hero", value: "74 Hero" },
                    { label: "Emblem", value: "Rata-rata Lv. 55" }
                ],
                skins: [
                    { label: "Epic Outfit", value: "8 Skin" },
                    { label: "Special Outfit", value: "15 Skin" },
                    { label: "Starlight", value: "12 Skin" },
                    { label: "Elite & Normal", value: "33 Skin" }
                ],
                desc: "Akun Mobile Legends siap push rank dengan 74 hero meta dan puluhan skin pilihan. Moonton sepaket email bersih.",
                seller: "Victory Game Shop",
                sold: "28 Produk",
                joined: "Januari 2026"
            },
            "Akun Collector": {
                game: "Mobile Legends",
                heroSub: "Temukan akun Mobile Legends terbaik dengan berbagai pilihan skin dan rank.",
                bannerImg: "images/v273_379.png",
                img1: "images/v1_983.png",
                img2: "images/v1_994.png",
                title: "Akun Mobile Legends 120 Skin — 5 Collector",
                price: 250000,
                info: [
                    { label: "Jumlah Skin", value: "120 Skin" },
                    { label: "Rank Tertinggi", value: "Mythic" },
                    { label: "Hero", value: "95 Hero" },
                    { label: "Skin Collector", value: "5 Skin" }
                ],
                skins: [
                    { label: "Legend", value: "2 Skin" },
                    { label: "Collector", value: "5 Skin" },
                    { label: "Epic Outfit", value: "25" },
                    { label: "Rare Outfit", value: "38" }
                ],
                desc: "Akun Mobile Legends dengan koleksi 120 skin, termasuk 5 skin Collector dan 2 skin Legend. Memiliki 95 hero serta rank tertinggi Mythic. Cocok untuk pemain yang ingin memiliki akun dengan koleksi skin beragam.",
                seller: "Victory Game Shop",
                sold: "28 Produk",
                joined: "Januari 2026"
            },
            "Akun Legend": {
                game: "Mobile Legends",
                heroSub: "Temukan akun Mobile Legends terbaik dengan berbagai pilihan skin dan rank.",
                bannerImg: "images/v273_379.png",
                img1: "images/v1_994.png",
                img2: "images/v1_1005.png",
                title: "Akun Mobile Legends Legend — Mythical Glory | Skin Legend",
                price: 350000,
                info: [
                    { label: "Jumlah Skin", value: "185 Skin" },
                    { label: "Rank Tertinggi", value: "Mythical Glory" },
                    { label: "Hero", value: "112 Hero" },
                    { label: "Max Emblem", value: "Full Max" }
                ],
                skins: [
                    { label: "Legend", value: "4 Skin" },
                    { label: "Collector & KOF", value: "7 Skin" },
                    { label: "Epic Limited", value: "34 Skin" },
                    { label: "Lightborn & Zodiac", value: "11 Skin" }
                ],
                desc: "Akun Mythical Glory dengan 4 skin Legend dan deretan skin KOF & Collector. Semua emblem sudah maksimal.",
                seller: "Pria Solo Store",
                sold: "31 Produk",
                joined: "Januari 2026"
            },
            "Akun Sultan": {
                game: "Mobile Legends",
                heroSub: "Temukan akun Mobile Legends terbaik dengan berbagai pilihan skin dan rank.",
                bannerImg: "images/v273_379.png",
                img1: "images/v1_1005.png",
                img2: "images/v1_983.png",
                title: "Akun Mobile Legends Sultan — Mythical Immortal | Skin Premium",
                price: 500000,
                info: [
                    { label: "Jumlah Skin", value: "310+ Skin" },
                    { label: "Rank Tertinggi", value: "Mythical Immortal" },
                    { label: "Hero", value: "All Hero (125)" },
                    { label: "Recall & Spawn", value: "Tas-Tas Lengkap" }
                ],
                skins: [
                    { label: "Legend", value: "7 Skin" },
                    { label: "Collector & Anime", value: "14 Skin" },
                    { label: "Epic & Luckybox", value: "65 Skin" },
                    { label: "Effect Recall", value: "Seal of Anvil & Fire Crown" }
                ],
                desc: "Akun Sultan tier tertinggi Mythical Immortal dengan ratusan skin premium, recall eksklusif, dan seluruh hero terbuka.",
                seller: "NEXAKUN Official Store",
                sold: "64 Produk",
                joined: "November 2025"
            },

            // --- PUBG MOBILE ---
            "Akun PUBG Diamond": {
                game: "PUBG Mobile",
                heroSub: "Temukan akun PUBG Mobile terbaik dengan berbagai pilihan skin senjata dan outfit.",
                bannerImg: "images/v273_384.png",
                img1: "images/v1_672.png",
                img2: "images/v1_682.png",
                title: "Akun PUBG Diamond — Level 45 | Skin Premium",
                price: 150000,
                info: [
                    { label: "Level Akun", value: "Level 45" },
                    { label: "Rank Tertinggi", value: "Diamond II" },
                    { label: "Set Outfit", value: "42 Set" },
                    { label: "Login Akun", value: "Twitter / Email Bersih" }
                ],
                skins: [
                    { label: "Skin Senjata", value: "28 Skin" },
                    { label: "Skin Kendaraan", value: "5 Skin" },
                    { label: "Helm & Tas", value: "18 Skin" },
                    { label: "Royal Pass", value: "3x Max" }
                ],
                desc: "Akun PUBG Mobile siap tempur dengan puluhan outfit dan skin senjata favorit. Login aman dan bergaransi.",
                seller: "Victory Game Shop",
                sold: "28 Produk",
                joined: "Januari 2026"
            },
            "Akun PUBG Crown": {
                game: "PUBG Mobile",
                heroSub: "Temukan akun PUBG Mobile terbaik dengan berbagai pilihan skin senjata dan outfit.",
                bannerImg: "images/v273_384.png",
                img1: "images/v1_682.png",
                img2: "images/v1_693.png",
                title: "Akun PUBG Crown — Level 55 | Koleksi Outfit",
                price: 250000,
                info: [
                    { label: "Level Akun", value: "Level 55" },
                    { label: "Rank Tertinggi", value: "Crown I" },
                    { label: "Set Outfit", value: "75 Set" },
                    { label: "Login Akun", value: "Email Single Bind" }
                ],
                skins: [
                    { label: "Mythic Outfit", value: "14 Item" },
                    { label: "Skin M416 & AKM", value: "9 Skin" },
                    { label: "Skin UAZ & Dacia", value: "8 Skin" },
                    { label: "Companion / Pet", value: "Falcon Max" }
                ],
                desc: "Akun PUBG tier Crown dengan koleksi Mythic outfit dan companion Falcon. Sangat nyaman untuk push ke Ace.",
                seller: "Aldonesia Store",
                sold: "42 Produk",
                joined: "Desember 2025"
            },
            "Akun PUBG Ace": {
                game: "PUBG Mobile",
                heroSub: "Temukan akun PUBG Mobile terbaik dengan berbagai pilihan skin senjata dan outfit.",
                bannerImg: "images/v273_384.png",
                img1: "images/v1_693.png",
                img2: "images/v1_704.png",
                title: "Akun PUBG Ace — Level 60 | Skin Senjata",
                price: 350000,
                info: [
                    { label: "Level Akun", value: "Level 60" },
                    { label: "Rank Tertinggi", value: "Ace Dominator" },
                    { label: "Set Outfit", value: "110 Set" },
                    { label: "Login Akun", value: "Email Bersih" }
                ],
                skins: [
                    { label: "Senjata Upgrade", value: "M416 Glacier Lv. 4" },
                    { label: "Mythic Fashion", value: "26 Item" },
                    { label: "Skin Supercar", value: "1 Skin" },
                    { label: "Title Langka", value: "Ace Dominator & Weapon Master" }
                ],
                desc: "Akun PUBG Mobile dengan M416 Glacier Kill Message aktif dan puluhan item Mythic.",
                seller: "Budi Gaming Shop",
                sold: "35 Produk",
                joined: "Januari 2026"
            },
            "Akun PUBG Conqueror": {
                game: "PUBG Mobile",
                heroSub: "Temukan akun PUBG Mobile terbaik dengan berbagai pilihan skin senjata dan outfit.",
                bannerImg: "images/v273_384.png",
                img1: "images/v1_704.png",
                img2: "images/v1_693.png",
                title: "Akun PUBG Conqueror — Level 70 | Koleksi Sultan",
                price: 500000,
                info: [
                    { label: "Level Akun", value: "Level 70" },
                    { label: "Rank Tertinggi", value: "Conqueror" },
                    { label: "Set Outfit", value: "180+ Set" },
                    { label: "Login Akun", value: "Email Bersih" }
                ],
                skins: [
                    { label: "X-Suit & Ultimate", value: "3 Set" },
                    { label: "Senjata Upgrade", value: "5 Senjata Kill Message" },
                    { label: "Frame Conqueror", value: "Ada" },
                    { label: "Kendaraan Kolaborasi", value: "2 Mobil" }
                ],
                desc: "Akun Sultan PUBG Mobile tier Conqueror lengkap dengan X-Suit, frame Conqueror, dan 5 senjata upgrade.",
                seller: "NEXAKUN Official Store",
                sold: "64 Produk",
                joined: "November 2025"
            }
        };

        function getGameBanner(gameName) {
            const g = (gameName || "").toLowerCase();
            if (g.includes("mobile legends") || g.includes("mlbb") || g === "ml") {
                return "images/v273_379.png";
            }
            if (g.includes("free fire") || g === "ff") {
                return "images/v270_378.png";
            }
            if (g.includes("pubg")) {
                return "images/v273_384.png";
            }
            return "images/v1_507.png";
        }

        document.addEventListener("DOMContentLoaded", () => {
            const params = new URLSearchParams(window.location.search);
            const productId = params.get("id");
            const akunKey = params.get("akun");
            const fallbackGame = params.get("game") || "Game";
            const fallbackHarga = parseInt(params.get("harga"), 10) || 150000;
            const fallbackDesc = params.get("desc") || "Akun game pilihan terverifikasi aman.";
            const fallbackImg = params.get("img") || "images/v1_1165.png";
            const fallbackImg2 = params.get("img2") || fallbackImg;
            const fallbackSeller = params.get("penjual") || "Victory Game Shop";

            let uploadedProduct = null;
            try {
                const uploadedList = JSON.parse(localStorage.getItem("nexakun_uploaded_products") || "[]");
                if (productId) {
                    uploadedProduct = uploadedList.find(p => String(p.id) === String(productId));
                } else if (akunKey) {
                    uploadedProduct = uploadedList.find(p => p.title === akunKey);
                }
            } catch (e) {}

            let data = null;

            if (uploadedProduct) {
                const gName = uploadedProduct.game || fallbackGame;
                data = {
                    id: uploadedProduct.id,
                    game: gName,
                    heroSub: `Temukan akun ${gName} terbaik dengan berbagai pilihan skin dan rank.`,
                    bannerImg: getGameBanner(gName),
                    img1: uploadedProduct.img1 || fallbackImg,
                    img2: uploadedProduct.img2 || uploadedProduct.img1 || fallbackImg,
                    title: uploadedProduct.title,
                    price: Number(uploadedProduct.price) || fallbackHarga,
                    info: uploadedProduct.info || [
                        { label: "Kategori Game", value: gName },
                        { label: "Level / Rank", value: uploadedProduct.rank || "Siap Push Rank" },
                        { label: "Login Akun", value: uploadedProduct.loginType || "Email Bersih" }
                    ],
                    skins: uploadedProduct.skins || [
                        { label: "Koleksi Utama", value: uploadedProduct.skinSummary || "Sesuai Screenshot & Deskripsi" },
                        { label: "Garansi Rekber", value: "100% Aman" }
                    ],
                    desc: uploadedProduct.desc || fallbackDesc,
                    seller: uploadedProduct.seller || fallbackSeller,
                    sold: uploadedProduct.sold || "12 Produk",
                    joined: uploadedProduct.joined || "2026"
                };
            } else if (ACCOUNT_DATABASE[akunKey]) {
                data = {
                    id: productId || "PRD001",
                    ...ACCOUNT_DATABASE[akunKey],
                    bannerImg: getGameBanner(ACCOUNT_DATABASE[akunKey].game)
                };
            } else {
                data = {
                    id: productId || "PRD001",
                    game: fallbackGame,
                    heroSub: `Temukan akun ${fallbackGame} terbaik dengan berbagai pilihan skin dan rank.`,
                    bannerImg: getGameBanner(fallbackGame),
                    img1: fallbackImg,
                    img2: fallbackImg2,
                    title: akunKey ? `${akunKey} — ${fallbackDesc}` : `Akun ${fallbackGame} — ${fallbackDesc}`,
                    price: fallbackHarga,
                    info: [
                        { label: "Kategori Game", value: fallbackGame },
                        { label: "Spesifikasi", value: fallbackDesc },
                        { label: "Status Akun", value: "Siap Pakai & Aman" }
                    ],
                    skins: [
                        { label: "Koleksi Utama", value: "Sesuai Deskripsi" },
                        { label: "Garansi Rekber", value: "100% Aman" }
                    ],
                    desc: `Akun ${fallbackGame} (${fallbackDesc}). Telah lolos pengecekan tim NEXAKUN dan siap diserahkan langsung setelah pembayaran terverifikasi.`,
                    seller: fallbackSeller,
                    sold: "28 Produk",
                    joined: "Januari 2026"
                };
            }

            const formatRupiah = (num) => "Rp. " + Number(num).toLocaleString("id-ID");

            document.title = `NEXAKUN - Detail ${data.game}`;
            document.getElementById("heroGameTitle").textContent = data.game;
            document.getElementById("heroGameSub").textContent = data.heroSub;
            document.getElementById("heroBannerImg").src = data.bannerImg;

            document.getElementById("detailImg1").src = data.img1;
            document.getElementById("detailImg2").src = data.img2;

            document.getElementById("detailTitle").textContent = data.title;
            document.getElementById("detailPrice").textContent = formatRupiah(data.price);
            document.getElementById("bottomTotalPrice").textContent = formatRupiah(data.price);
            document.getElementById("detailDescription").textContent = data.desc;

            document.getElementById("sellerName").textContent = data.seller;
            document.getElementById("sellerSold").textContent = data.sold;
            document.getElementById("sellerJoined").textContent = data.joined;

            document.getElementById("accountInfoList").innerHTML = data.info.map(item => `
                <div class="spec-row">
                    <span class="spec-label">${item.label}</span>
                    <span class="spec-value">${item.value}</span>
                </div>
            `).join("");

            document.getElementById("skinCollectionList").innerHTML = data.skins.map(item => `
                <div class="spec-row">
                    <span class="spec-label">${item.label}</span>
                    <span class="spec-value">${item.value}</span>
                </div>
            `).join("");

            document.getElementById("btnProceedPayment").addEventListener("click", () => {
                const query = new URLSearchParams({
                    id: data.id,
                    game: data.game,
                    akun: data.title,
                    desc: data.desc,
                    harga: data.price,
                    penjual: data.seller,
                    img: data.img1,
                    img2: data.img2
                });
                window.location.href = `pembayaran_qris.html?${query.toString()}`;
            });
        });
    </script>

</body>

</html>