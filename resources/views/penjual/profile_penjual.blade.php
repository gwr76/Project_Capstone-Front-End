<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEXAKUN - Profil & Pengaturan Akun Penjual</title>

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

        <!-- SIDEBAR (PERSIS ADMIN + MENU PROFIL) -->
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
                <a href="/penjual/laporan" class="menu-link">
                    <i class="fa-solid fa-receipt"></i>
                    <span>Laporan</span>
                </a>

                <!-- PROFIL PENJUAL (AKTIF) -->
                <a href="/penjual/profile_penjual" class="menu-link active">
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

        <!-- MAIN CONTENT PROFIL -->
        <main class="penjual-content">

            <!-- PAGE HEADER -->
            <div class="seller-header-bar" style="margin-bottom: 24px;">
                <div class="seller-title-area">
                    <h1 class="seller-store-name">Profil & Pengaturan Akun Toko</h1>
                    <p style="color: var(--text-muted); font-size: 14px;">
                        Kelola informasi toko, rekening pencairan saldo, dan keamanan akun penjual Anda.
                    </p>
                </div>

                <button class="btn-posting" onclick="saveAllProfile()">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Semua Perubahan
                </button>
            </div>

            <!-- PROFILE HERO CARD -->
            <div style="background: var(--bg-panel); border: 1px solid var(--border); border-radius: 16px; padding: 24px 30px; display: flex; align-items: center; gap: 26px; margin-bottom: 26px; flex-wrap: wrap;">
                <div style="position: relative; width: 90px; height: 90px; border-radius: 50%; background: var(--blue-dark); display: flex; align-items: center; justify-content: center; font-size: 38px; color: var(--blue); border: 2px solid var(--blue); flex-shrink: 0;">
                    <i class="fa-solid fa-store"></i>
                    <button onclick="document.getElementById('avatarInput').click()" title="Ubah Logo Toko"
                        style="position: absolute; bottom: 0; right: 0; width: 30px; height: 30px; border-radius: 50%; background: var(--blue); color: #fff; display: flex; align-items: center; justify-content: center; font-size: 12px; cursor: pointer; border: 2px solid var(--bg-panel);">
                        <i class="fa-solid fa-camera"></i>
                    </button>
                    <input type="file" id="avatarInput" accept="image/*" style="display: none;" onchange="alert('Foto profil/logo toko berhasil dipilih!')">
                </div>

                <div style="flex: 1; min-width: 240px;">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 4px;">
                        <h2 style="font-size: 22px; font-weight: 700; color: #FFFFFF;" id="displayStoreName">ALDONESIA HENGKER TZY</h2>
                        <span class="badge-verified" style="font-size: 12px; padding: 2px 10px;">
                            Terverifikasi <i class="fa-solid fa-circle-check"></i>
                        </span>
                    </div>
                    <p style="color: var(--text-muted); font-size: 13px;">
                        Username Penjual: <strong style="color: #fff;">@aldonesia_tzy</strong> · Bergabung sejak <strong>Oktober 2026</strong>
                    </p>
                    <div style="display: flex; gap: 20px; margin-top: 10px; font-size: 13px;">
                        <span><i class="fa-solid fa-box-open" style="color: var(--blue); margin-right: 5px;"></i> <strong>6</strong> Produk Terdaftar</span>
                        <span><i class="fa-solid fa-cart-check" style="color: #2FAB26; margin-right: 5px;"></i> <strong>120</strong> Akun Terjual</span>
                        <span><i class="fa-solid fa-star" style="color: #FBBC05; margin-right: 5px;"></i> <strong>4.9 / 5.0</strong> Rating Kepuasan</span>
                    </div>
                </div>
            </div>

            <!-- GRID FORMS (DATA DIRI, REKENING, KEAMANAN) -->
            <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 22px; margin-bottom: 30px;">

                <!-- 1. DATA TOKO & INFORMASI PENJUAL -->
                <div style="background: var(--bg-panel); border: 1px solid var(--border); border-radius: 14px; padding: 22px;">
                    <h3 style="font-size: 17px; font-weight: 700; color: #FFFFFF; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                        <i class="fa-solid fa-id-card" style="color: var(--blue);"></i> Informasi Toko & Kontak
                    </h3>

                    <div style="display: flex; flex-direction: column; gap: 14px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #C5D5E8; margin-bottom: 5px;">
                                Nama Toko
                            </label>
                            <input type="text" id="storeNameInput" value="ALDONESIA HENGKER TZY"
                                style="width: 100%; padding: 10px 14px; background: #080D17; border: 1px solid rgba(255,255,255,0.12); border-radius: 8px; color: #fff; font-size: 13px; outline: none;">
                        </div>

                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #C5D5E8; margin-bottom: 5px;">
                                Nama Pemilik (Sesuai KTP)
                            </label>
                            <input type="text" id="ownerNameInput" value="Aldonesia TZY Pratama"
                                style="width: 100%; padding: 10px 14px; background: #080D17; border: 1px solid rgba(255,255,255,0.12); border-radius: 8px; color: #fff; font-size: 13px; outline: none;">
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                            <div>
                                <label style="display: block; font-size: 12px; font-weight: 600; color: #C5D5E8; margin-bottom: 5px;">
                                    Email Aktif
                                </label>
                                <input type="email" id="emailInput" value="aldonesia@gmail.com"
                                    style="width: 100%; padding: 10px 14px; background: #080D17; border: 1px solid rgba(255,255,255,0.12); border-radius: 8px; color: #fff; font-size: 13px; outline: none;">
                            </div>
                            <div>
                                <label style="display: block; font-size: 12px; font-weight: 600; color: #C5D5E8; margin-bottom: 5px;">
                                    No. WhatsApp
                                </label>
                                <input type="tel" id="phoneInput" value="081234567801"
                                    style="width: 100%; padding: 10px 14px; background: #080D17; border: 1px solid rgba(255,255,255,0.12); border-radius: 8px; color: #fff; font-size: 13px; outline: none;">
                            </div>
                        </div>

                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #C5D5E8; margin-bottom: 5px;">
                                Deskripsi Toko / Catatan Pembeli
                            </label>
                            <textarea id="storeBio" rows="3"
                                style="width: 100%; padding: 10px 14px; background: #080D17; border: 1px solid rgba(255,255,255,0.12); border-radius: 8px; color: #fff; font-size: 13px; outline: none; resize: vertical;">Menjual akun game PUBG, MLBB, dan Free Fire berkualitas & bergaransi anti hack back 100%.</textarea>
                        </div>
                    </div>
                </div>

                <!-- 2. REKENING PENCAIRAN SALDO & VERIFIKASI -->
                <div style="display: flex; flex-direction: column; gap: 22px;">

                    <!-- REKENING PENCAIRAN -->
                    <div style="background: var(--bg-panel); border: 1px solid var(--border); border-radius: 14px; padding: 22px;">
                        <h3 style="font-size: 17px; font-weight: 700; color: #FFFFFF; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                            <i class="fa-solid fa-wallet" style="color: #2FAB26;"></i> Rekening Pencairan Saldo
                        </h3>

                        <div style="display: flex; flex-direction: column; gap: 14px;">
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                                <div>
                                    <label style="display: block; font-size: 12px; font-weight: 600; color: #C5D5E8; margin-bottom: 5px;">
                                        Metode Pencairan
                                    </label>
                                    <select id="payoutMethod" style="width: 100%; padding: 10px 14px; background: #080D17; border: 1px solid rgba(255,255,255,0.12); border-radius: 8px; color: #fff; font-size: 13px; outline: none;">
                                        <option value="Dana" selected>DANA (E-Wallet)</option>
                                        <option value="GoPay">GoPay</option>
                                        <option value="OVO">OVO</option>
                                        <option value="BCA">Bank BCA</option>
                                        <option value="Mandiri">Bank Mandiri</option>
                                    </select>
                                </div>
                                <div>
                                    <label style="display: block; font-size: 12px; font-weight: 600; color: #C5D5E8; margin-bottom: 5px;">
                                        Nomor E-Wallet / Rekening
                                    </label>
                                    <input type="text" id="payoutNumber" value="081234567801"
                                        style="width: 100%; padding: 10px 14px; background: #080D17; border: 1px solid rgba(255,255,255,0.12); border-radius: 8px; color: #fff; font-size: 13px; outline: none;">
                                </div>
                            </div>
                            <div>
                                <label style="display: block; font-size: 12px; font-weight: 600; color: #C5D5E8; margin-bottom: 5px;">
                                    Nama Pemilik Rekening
                                </label>
                                <input type="text" id="payoutName" value="Aldonesia TZY"
                                    style="width: 100%; padding: 10px 14px; background: #080D17; border: 1px solid rgba(255,255,255,0.12); border-radius: 8px; color: #fff; font-size: 13px; outline: none;">
                            </div>
                        </div>
                    </div>

                    <!-- KEAMANAN & GANTI PASSWORD -->
                    <div style="background: var(--bg-panel); border: 1px solid var(--border); border-radius: 14px; padding: 22px;">
                        <h3 style="font-size: 17px; font-weight: 700; color: #FFFFFF; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                            <i class="fa-solid fa-lock" style="color: #FBBC05;"></i> Keamanan & Password
                        </h3>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                            <div>
                                <label style="display: block; font-size: 12px; font-weight: 600; color: #C5D5E8; margin-bottom: 5px;">
                                    Password Baru
                                </label>
                                <input type="password" id="newPass" placeholder="Min. 8 karakter"
                                    style="width: 100%; padding: 10px 14px; background: #080D17; border: 1px solid rgba(255,255,255,0.12); border-radius: 8px; color: #fff; font-size: 13px; outline: none;">
                            </div>
                            <div>
                                <label style="display: block; font-size: 12px; font-weight: 600; color: #C5D5E8; margin-bottom: 5px;">
                                    Konfirmasi Password
                                </label>
                                <input type="password" id="confirmPass" placeholder="Ulangi password"
                                    style="width: 100%; padding: 10px 14px; background: #080D17; border: 1px solid rgba(255,255,255,0.12); border-radius: 8px; color: #fff; font-size: 13px; outline: none;">
                            </div>
                        </div>
                    </div>

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
        function saveAllProfile() {
            const storeName = document.getElementById('storeNameInput').value.trim();
            const email = document.getElementById('emailInput').value.trim();
            const phone = document.getElementById('phoneInput').value.trim();
            const newPass = document.getElementById('newPass').value;
            const confirmPass = document.getElementById('confirmPass').value;

            if (!storeName || !email || !phone) {
                alert('Nama toko, email, dan nomor WhatsApp tidak boleh kosong!');
                return;
            }

            if (newPass && newPass !== confirmPass) {
                alert('Konfirmasi password baru tidak cocok!');
                return;
            }

            document.getElementById('displayStoreName').textContent = storeName;
            alert('✅ Berhasil!\nInformasi profil akun toko Anda telah diperbarui.');
        }
    </script>

</body>

</html>