<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NEXAKUN - Upload Akun Game Baru</title>

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
                    <span class="notification-badge">2</span>
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

                <div class="seller-header-bar" style="margin-bottom: 20px;">
                    <div class="seller-title-area">
                        <h1 class="seller-store-name">Posting Akun Game Baru</h1>
                        <p style="color: var(--text-muted); font-size: 14px;">
                            Lengkapi detail spesifikasi akun game yang akan Anda jual di marketplace NEXAKUN.
                        </p>
                    </div>

                    <a href="/penjual/daftar_produk" class="btn-posting" style="background:#0E1626; border: 1px solid rgba(255,255,255,0.15);">
                        <i class="fa-solid fa-arrow-left"></i> Kembali ke Produk
                    </a>
                </div>

                <div style="background: var(--bg-panel); border: 1px solid var(--border); border-radius: 14px; padding: 26px; max-width: 860px;">

                    <form id="uploadForm" novalidate onsubmit="handleUpload(event)">

                        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:16px; margin-bottom:16px;">
                            <div>
                                <label style="display:block; font-size:12px; font-weight:600; margin-bottom:6px; color:#C5D5E8;">
                                    Nama Produk Akun <span style="color:#FF383C;">*</span>
                                </label>
                                <input type="text" id="namaProduk" placeholder="Contoh: Akun PUBG Level 75 Sultan Glacier M416"
                                    style="width:100%; padding:10px 14px; background:#080D17; border:1px solid rgba(255,255,255,0.12); border-radius:8px; color:#fff; font-size:13px; outline:none;" required>
                            </div>

                            <div>
                                <label style="display:block; font-size:12px; font-weight:600; margin-bottom:6px; color:#C5D5E8;">
                                    Kategori Game <span style="color:#FF383C;">*</span>
                                </label>
                                <select id="kategori" style="width:100%; padding:10px 14px; background:#080D17; border:1px solid rgba(255,255,255,0.12); border-radius:8px; color:#fff; font-size:13px; outline:none;" required>
                                    <option value="">Pilih game...</option>
                                    <option value="PUBG Mobile">PUBG Mobile</option>
                                    <option value="Mobile Legends">Mobile Legends</option>
                                    <option value="Free Fire">Free Fire</option>
                                </select>
                            </div>
                        </div>

                        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:16px; margin-bottom:16px;">
                            <div>
                                <label style="display:block; font-size:12px; font-weight:600; margin-bottom:6px; color:#C5D5E8;">
                                    Harga Jual (Rp) <span style="color:#FF383C;">*</span>
                                </label>
                                <input type="number" id="harga" placeholder="Contoh: 800000" min="10000"
                                    style="width:100%; padding:10px 14px; background:#080D17; border:1px solid rgba(255,255,255,0.12); border-radius:8px; color:#fff; font-size:13px; outline:none;" required>
                            </div>

                            <div>
                                <label style="display:block; font-size:12px; font-weight:600; margin-bottom:6px; color:#C5D5E8;">
                                    Tipe Bind / Login Akun <span style="color:#FF383C;">*</span>
                                </label>
                                <select id="bindType" style="width:100%; padding:10px 14px; background:#080D17; border:1px solid rgba(255,255,255,0.12); border-radius:8px; color:#fff; font-size:13px; outline:none;" required>
                                    <option value="Email Bersih (Unbind)">Email Bersih (Unbind)</option>>
                                    <option value="Moonton / Facebook Kosong">Moonton / Facebook Kosong</option>
                                    <option value="Google Play">Google Play</option>
                                </select>
                            </div>
                        </div>

                        <div style="margin-bottom:16px;">
                            <label style="display:block; font-size:12px; font-weight:600; margin-bottom:6px; color:#C5D5E8;">
                                Deskripsi Lengkap & Spesifikasi Akun <span style="color:#FF383C;">*</span>
                            </label>
                            <textarea id="deskripsi" rows="4" placeholder="Sebutkan rank, level, jumlah skin, koleksi item langka, senjata kill message, emote, dll..."
                                style="width:100%; padding:12px 14px; background:#080D17; border:1px solid rgba(255,255,255,0.12); border-radius:8px; color:#fff; font-size:13px; outline:none; resize:vertical;" required>
                            </textarea>
                        </div>

                        <!-- Upload Screenshot -->
                        <div style="margin-bottom:20px;">
                            <label style="display:block; font-size:12px; font-weight:600; margin-bottom:6px; color:#C5D5E8;">
                                Upload Screenshot Akun (Maksimal 4 foto) <span style="color:#FF383C;">*</span>
                            </label>
                            <div onclick="document.getElementById('fotoInput').click()"
                                style="border: 2px dashed rgba(255,255,255,0.2); border-radius: 10px; padding: 26px; text-align: center; cursor: pointer; background: rgba(5,140,251,0.02); transition: 0.2s;">
                                <i class="fa-solid fa-images" style="font-size: 32px; color: var(--blue); margin-bottom: 8px;"></i>
                                <p style="font-size: 13px; color: #fff;">Klik di sini untuk memilih gambar screenshot akun game</p>
                                <small style="color: var(--text-muted);">Format JPG, PNG · Maksimal 5MB per file</small>
                                <input type="file" id="fotoInput" accept="image/*" multiple style="display:none;" onchange="previewImages(this)">
                            </div>
                            <div id="imagePreviewGrid" style="display:grid; grid-template-columns: repeat(4, 1fr); gap: 10px; margin-top: 12px;"></div>
                        </div>

                        <div id="errorAlert" style="display:none; padding:10px 14px; background:rgba(255,56,60,0.12); border:1px solid rgba(255,56,60,0.4); border-radius:8px; color:#ff7070; font-size:13px; margin-bottom:16px;"></div>

                        <div style="display:flex; justify-content:flex-end; gap:12px;">
                            <a href="/penjual/daftar_produk" class="btn-posting" style="background:transparent; border:1px solid rgba(255,255,255,0.2); color:#fff;">
                                Batal
                            </a>
                            <button type="submit" class="btn-posting">
                                <i class="fa-solid fa-cloud-arrow-up"></i> Simpan & Posting Sekarang
                            </button>
                        </div>

                    </form>

                </div>

                <!-- FOOTER -->
                <footer id="contact">
                    © 2026 NEXAKUN. Platform jual beli akun game.
                </footer>

            </main>

        </div>

        <!-- JAVASCRIPT LOGIC -->
        <script>
            let uploadedImages = [];

            function getDefaultThumbByCategory(kat) {
                const g = (kat || "").toLowerCase();
                if (g.includes("mobile legends")) return "./images/v1_994.png";
                if (g.includes("free fire")) return "./images/v1_1165.png";
                if (g.includes("pubg")) return "./images/v1_693.png";
                return "./images/v1_507.png";
            }

            function compressFileToDataUrl(file, callback) {
                const reader = new FileReader();
                reader.onload = function (ev) {
                    const img = new Image();
                    img.onload = function () {
                        const maxW = 640;
                        const scale = img.width > maxW ? maxW / img.width : 1;
                        const canvas = document.createElement("canvas");
                        canvas.width = Math.round(img.width * scale);
                        canvas.height = Math.round(img.height * scale);
                        const ctx = canvas.getContext("2d");
                        ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
                        callback(canvas.toDataURL("image/jpeg", 0.72));
                    };
                    img.onerror = function () { callback(ev.target.result); };
                    img.src = ev.target.result;
                };
                reader.readAsDataURL(file);
            }

            function previewImages(input) {
                const grid = document.getElementById('imagePreviewGrid');
                grid.innerHTML = '';
                uploadedImages = [];
                const files = Array.from(input.files).slice(0, 4);

                files.forEach((file) => {
                    compressFileToDataUrl(file, (dataUrl) => {
                        uploadedImages.push(dataUrl);
                        const img = document.createElement('img');
                        img.src = dataUrl;
                        img.style.cssText = 'width:100%; height:90px; object-fit:cover; border-radius:8px; border:1px solid var(--border);';
                        grid.appendChild(img);
                    });
                });
            }

            function handleUpload(e) {
                e.preventDefault();
                const nama = document.getElementById('namaProduk').value.trim();
                const kat = document.getElementById('kategori').value;
                const hrg = parseInt(document.getElementById('harga').value, 10) || 0;
                const bind = document.getElementById('bindType').value;
                const desk = document.getElementById('deskripsi').value.trim();
                const errBox = document.getElementById('errorAlert');

                if (!nama || !kat || !hrg || !desk) {
                    errBox.style.display = 'block';
                    errBox.textContent = 'Harap isi semua kolom yang wajib bertanda bintang (*).';
                    return;
                }

                errBox.style.display = 'none';

                const fallbackImg = getDefaultThumbByCategory(kat);
                const img1 = uploadedImages[0] || fallbackImg;
                const img2 = uploadedImages[1] || img1;
                const prodId = "PRD-" + Date.now();
                const hargaFormatted = "Rp" + hrg.toLocaleString("id-ID");

                // 1. Simpan ke daftar produk aktif/beranda agar langsung tampil di katalog game & beranda pembeli
                const UPLOADED_KEY = "nexakun_uploaded_products";
                const uploadedList = JSON.parse(localStorage.getItem(UPLOADED_KEY) || "[]");

                const newProduct = {
                    id: prodId,
                    seller: "ALDONESIA HENGKER TZY",
                    toko: "ALDONESIA HENGKER TZY",
                    game: kat,
                    kategori: kat,
                    title: nama,
                    nama: nama,
                    price: hrg,
                    harga: hargaFormatted,
                    loginType: bind,
                    bind: bind,
                    desc: desk,
                    deskripsi: `${desk} (Login: ${bind})`,
                    img1: img1,
                    img2: img2,
                    gambar: img1,
                    status: "aktif",
                    sold: "0 Produk",
                    joined: "November 2026"
                };

                uploadedList.unshift(newProduct);

                try {
                    localStorage.setItem(UPLOADED_KEY, JSON.stringify(uploadedList));
                } catch (err) {
                    // Jika kuota localStorage penuh karena gambar, simpan dengan gambar default
                    newProduct.img1 = fallbackImg;
                    newProduct.img2 = fallbackImg;
                    newProduct.gambar = fallbackImg;
                    localStorage.setItem(UPLOADED_KEY, JSON.stringify(uploadedList));
                }

                // 2. Simpan juga ke antrean pending/kelola produk penjual
                const PENDING_KEY = "nexakun_pending_products";
                const pendingList = JSON.parse(localStorage.getItem(PENDING_KEY) || "[]");
                pendingList.unshift({
                    id: prodId,
                    toko: "ALDONESIA HENGKER TZY",
                    kategori: kat,
                    nama: nama,
                    harga: hargaFormatted,
                    bind: bind,
                    deskripsi: `${desk} (Login: ${bind})`,
                    gambar: newProduct.img1,
                    status: "aktif"
                });
                try { localStorage.setItem(PENDING_KEY, JSON.stringify(pendingList)); } catch (err) {}

                // 3. Kirim notifikasi ke penjual_notifikasi.html
                const NOTIF_KEY = "nexakun_seller_notifications";
                const notifList = JSON.parse(localStorage.getItem(NOTIF_KEY) || "[]");
                const nowStr = new Date().toLocaleDateString("id-ID", { day: "2-digit", month: "short", year: "numeric" }) + " · " + new Date().toTimeString().slice(0, 5) + " WIB";

                notifList.unshift({
                    id: "NOTIF-" + Date.now(),
                    type: "success",
                    title: "Akun Berhasil Diposting ke Beranda",
                    message: `Produk "<strong>${nama}</strong>" (${kat}) sudah tayang di beranda & katalog pembeli.`,
                    time: nowStr,
                    unread: true
                });
                try { localStorage.setItem(NOTIF_KEY, JSON.stringify(notifList)); } catch (err) {}

                alert('✅ Akun game berhasil diposting dan langsung tampil di beranda & katalog pembeli!');
                window.location.href = 'penjual_produk.html';
            }
        </script>

    </body>

</html>