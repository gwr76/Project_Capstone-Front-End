<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEXAKUN - Profile Pembeli</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Funnel+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Terpisah -->
    <link rel="stylesheet" href="{{ asset('css/profile_pembeli.css') }}">
</head>
<body>

    <!-- NAVBAR HEADER -->
    <header class="navbar">
        <a href="/index" class="brand">
            <img src="{{ asset('images/v1_506.png') }}" alt="NEXAKUN Logo">
        </a>

        <nav class="nav-links">
            <a href="/index#games">Games</a>
            <a href="/about">About</a>
            <a href="/contact">Contact</a>
        </nav>

        <div class="nav-actions">
            <button type="button" class="icon-btn bell-btn" aria-label="Notifikasi" onclick="alert('Belum ada notifikasi baru.')">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 22a2.5 2.5 0 0 0 2.45-2h-4.9A2.5 2.5 0 0 0 12 22zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4a1.5 1.5 0 0 0-3 0v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/>
                </svg>
            </button>

            <button type="button" class="icon-btn user-btn" aria-label="Profil Pengguna" onclick="window.location.href='/pembeli/profil'">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="8" r="4.2"></circle>
                    <path d="M4.5 21a7.5 7.5 0 0 1 15 0"></path>
                </svg>
            </button>
        </div>
    </header>

    <!-- KONTEN UTAMA -->
    <main class="profile-main">
        <div class="profile-grid">

            <!-- ================= KOLOM KIRI ================= -->
            <div class="left-column">

                <!-- KARTU 1: INFO PROFIL USER -->
                <section class="profile-card user-info-card">
                    <div class="user-header-row">
                        <div class="avatar-wrapper">
                            <div class="avatar-circle" id="avatarPreview">
                                <svg viewBox="0 0 24 24" fill="#A3A3A3">
                                    <circle cx="12" cy="8.2" r="4.4"></circle>
                                    <path d="M4.2 21c0-4.2 3.5-7.2 7.8-7.2s7.8 3 7.8 7.2"></path>
                                </svg>
                            </div>
                        </div>

                        <div class="user-identity">
                            <div class="name-edit-row">
                                <div>
                                    <h1 id="displayName">Memuat...</h1>
                                </div>
                                <button type="button" class="btn-edit-profile" id="openEditModal">
                                    <span>Edit Profil</span>
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="#FFFFFF">
                                        <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a1.003 1.003 0 0 0 0-1.42l-2.34-2.34a1.003 1.003 0 0 0-1.42 0l-1.83 1.83 3.75 3.75 1.84-1.82z"/>
                                    </svg>
                                </button>
                            </div>

                            <span class="role-badge" id="roleBadge">Pembeli</span>

                            <ul class="contact-details">
                                <li>
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="#FFFFFF">
                                        <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4-8 5-8-5V6l8 5 8-5v2z"/>
                                    </svg>
                                    <span id="displayEmail">-</span>
                                </li>
                                <li>
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="#FFFFFF">
                                        <path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                                    </svg>
                                    <span id="displayPhone">-</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- KARTU 2: LENGKAPI AKUN KAMU -->
                <section class="profile-card complete-account-card">
                    <div class="section-title-with-icon">
                        <svg class="title-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                            <rect x="8" y="2" width="8" height="4" rx="1.5" ry="1.5"></rect>
                        </svg>
                        <div>
                            <h2>Lengkapi Akun Kamu</h2>
                            <p class="section-sub">Lengkapi Informasi berikut untuk pengalaman yang lebih aman dan nyaman di NEXAKUN</p>
                        </div>
                    </div>

                    <div class="checklist-stack">
                        <div class="checklist-item">
                            <div class="check-icon verified">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="9.5"></circle>
                                    <polyline points="8.5 12.2 10.8 14.5 15.5 9.8"></polyline>
                                </svg>
                            </div>
                            <div class="check-text">
                                <h3>Email</h3>
                                <p class="status-green">Terdaftar</p>
                            </div>
                        </div>

                        <div class="checklist-item clickable" id="phoneItem">
                            <div class="check-icon pending" id="phoneIcon"></div>
                            <div class="check-text">
                                <h3>Nomor Telepon</h3>
                                <p class="status-muted" id="phoneStatus">Memuat...</p>
                            </div>
                        </div>

                        <div class="checklist-item">
                            <div class="check-icon pending">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                            </div>
                            <div class="check-text">
                                <h3>Nomor NIK</h3>
                                <p class="status-muted" id="nikStatus">Segera hadir</p>
                            </div>
                        </div>

                        <div class="checklist-item">
                            <div class="check-icon pending">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                    <line x1="3" y1="6" x2="21" y2="6"></line>
                                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                                </svg>
                            </div>
                            <div class="check-text">
                                <h3>Nomor Rekening</h3>
                                <p class="status-muted" id="rekeningStatus">Segera hadir</p>
                            </div>
                        </div>
                    </div>
                </section>

            </div>

            <!-- ================= KOLOM KANAN ================= -->
            <div class="right-column">

                <!-- KARTU 3: ROLE AKUN -->
                <section class="profile-card role-card">
                    <h2>Role Akun</h2>

                    <div class="role-box">
                        <div class="role-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                <circle cx="9" cy="20" r="1.2"></circle>
                                <circle cx="19" cy="20" r="1.2"></circle>
                                <path d="M2 3h3l2.4 11.5a2 2 0 0 0 2 1.5h8.8a2 2 0 0 0 1.9-1.4L22 7H6"></path>
                            </svg>
                        </div>
                        <div class="role-info">
                            <h3>Pembeli</h3>
                            <p>Kamu dapat membeli akun game di NEXAKUN</p>
                        </div>
                    </div>

                    <div class="role-box seller-box">
                        <div class="seller-top">
                            <div class="role-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                    <line x1="3" y1="6" x2="21" y2="6"></line>
                                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                                </svg>
                            </div>
                            <div class="role-info">
                                <h3>Penjual</h3>
                                <p>Aktifkan role penjual untuk mulai menjual akun game kamu</p>
                            </div>
                        </div>

                        <a href="#" id="btnAktifPenjual" class="btn-activate-seller">
                            Aktivasi Sebagai Penjual
                        </a>
                    </div>
                </section>

                <!-- KARTU 4: KEAMANAN AKUN -->
                <section class="profile-card security-card">
                    <h2>Keamanan Akun</h2>
                    <div class="security-row">
                        <div class="security-left">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#94A3B8" stroke-width="1.8">
                                <rect x="4" y="11" width="16" height="10" rx="2" ry="2"></rect>
                                <path d="M8 11V7a4 4 0 0 1 8 0v4"></path>
                            </svg>
                            <span>Password</span>
                        </div>

                        <a href="#" id="btnUbahPassword" class="btn-change-pass">
                            <span>Ubah</span>
                            <svg class="corner-pencil" width="13" height="13" viewBox="0 0 24 24" fill="#FFFFFF">
                                <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a1.003 1.003 0 0 0 0-1.42l-2.34-2.34a1.003 1.003 0 0 0-1.42 0l-1.83 1.83 3.75 3.75 1.84-1.82z"/>
                            </svg>
                        </a>
                    </div>
                </section>

                <!-- KARTU 5: INSIGHT -->
                <section class="profile-card insight-card">
                    <h2>Insight</h2>
                    <div class="insight-grid">
                        <div class="stat-box">
                            <span class="stat-label">Favorit</span>
                            <strong class="stat-value" id="statFavorit" title="Segera hadir">-</strong>
                        </div>
                        <div class="stat-box">
                            <span class="stat-label">Akun dibeli</span>
                            <strong class="stat-value" id="statDibeli">0</strong>
                        </div>
                        <div class="stat-box">
                            <span class="stat-label">Total Transaksi</span>
                            <strong class="stat-value" id="statTransaksi">0</strong>
                        </div>
                    </div>
                </section>

            </div>

        </div>
    </main>

    <!-- MODAL EDIT PROFIL -->
    <div class="modal-backdrop" id="editProfileModal">
        <div class="modal-box">
            <h3>Edit Profil</h3>
            <form id="editProfileForm">
                <label>Nama Lengkap</label>
                <input type="text" id="inputName" maxlength="255" required>

                <label>Nomor Telepon</label>
                <input type="text" id="inputPhone" placeholder="Contoh: 081234567890" maxlength="20">

                <p id="editError" style="display:none;color:#f87171;font-size:13px;margin-top:8px;"></p>

                <div class="modal-actions">
                    <button type="button" class="btn-cancel" id="closeEditModal">Batal</button>
                    <button type="submit" class="btn-save">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/auth.js') }}"></script>
    <script>
        (async function () {
            // Halaman ini khusus pembeli yang sudah login
            if (!sudahLogin() || !adalahPembeli(ambilUser())) {
                window.location.href = "/index";
                return;
            }

            const $ = (id) => document.getElementById(id);
            const modal = $("editProfileModal");
            const errorBox = $("editError");

            const IKON_CENTANG =
                '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9.5"></circle><polyline points="8.5 12.2 10.8 14.5 15.5 9.8"></polyline></svg>';
            const IKON_PENSIL =
                '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>';

            let userSaatIni = ambilUser();

            function isiProfil(u, insight) {
                userSaatIni = u;

                $("displayName").textContent = u.nama || "-";
                $("displayEmail").textContent = u.email || "-";
                $("displayPhone").textContent = u.no_telp || "Belum diisi";

                // Nomor telepon: hijau kalau sudah diisi, kalau belum bisa diklik untuk mengisi
                const adaTelp = !!u.no_telp;
                $("phoneIcon").className = "check-icon " + (adaTelp ? "verified" : "pending");
                $("phoneIcon").innerHTML = adaTelp ? IKON_CENTANG : IKON_PENSIL;
                $("phoneStatus").className = adaTelp ? "status-green" : "status-muted";
                $("phoneStatus").textContent = adaTelp ? "Sudah diisi" : "Tambahkan nomor telepon";

                // Role & tombol aktivasi penjual
                const tombol = $("btnAktifPenjual");
                if (u.role === "calon_penjual") {
                    $("roleBadge").textContent = "Calon Penjual";
                    tombol.textContent = "Pengajuan Sedang Diproses";
                    tombol.style.opacity = "0.6";
                    tombol.style.pointerEvents = "none";
                } else {
                    $("roleBadge").textContent = "Pembeli";
                }

                if (insight) {
                    $("statDibeli").textContent = insight.akun_dibeli;
                    $("statTransaksi").textContent = insight.total_transaksi;
                }
            }

            function bukaModal() {
                $("inputName").value = userSaatIni?.nama || "";
                $("inputPhone").value = userSaatIni?.no_telp || "";
                errorBox.style.display = "none";
                modal.classList.add("show");
            }

            $("openEditModal").addEventListener("click", bukaModal);
            $("phoneItem").addEventListener("click", bukaModal);
            $("closeEditModal").addEventListener("click", () => modal.classList.remove("show"));

            $("editProfileForm").addEventListener("submit", async (e) => {
                e.preventDefault();
                errorBox.style.display = "none";

                const tombolSimpan = e.target.querySelector(".btn-save");
                tombolSimpan.disabled = true;

                try {
                    const res = await apiAuth("/profil", {
                        method: "PUT",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify({
                            nama: $("inputName").value.trim(),
                            no_telp: $("inputPhone").value.trim() || null,
                        }),
                    });
                    const data = await res.json();

                    if (!res.ok) {
                        errorBox.textContent = pesanError(data);
                        errorBox.style.display = "block";
                        return;
                    }

                    // simpan data terbaru supaya halaman lain ikut membaca nilai yang baru
                    localStorage.setItem("user", JSON.stringify(data.data));
                    isiProfil(data.data);
                    modal.classList.remove("show");
                    alert("Profil berhasil diperbarui!");
                } catch (err) {
                    errorBox.textContent = "Tidak bisa terhubung ke server.";
                    errorBox.style.display = "block";
                } finally {
                    tombolSimpan.disabled = false;
                }
            });

            $("btnAktifPenjual").addEventListener("click", (e) => {
                e.preventDefault();
                if (HALAMAN_MENU.penjual) window.location.href = HALAMAN_MENU.penjual;
                else alert("Halaman Daftar Jadi Penjual belum tersedia.");
            });

            $("btnUbahPassword").addEventListener("click", (e) => {
                e.preventDefault();
                alert("Fitur ubah password belum tersedia.");
            });

            // tampilkan dulu data dari login, lalu ambil data terbaru dari server
            isiProfil(userSaatIni);

            try {
                const res = await apiAuth("/profil");
                const data = await res.json();
                if (!res.ok) return;

                if (!adalahPembeli(data.data)) {
                    window.location.href = "/index";
                    return;
                }
                localStorage.setItem("user", JSON.stringify(data.data));
                isiProfil(data.data, data.insight);
            } catch (err) {
                // server tidak terjangkau: tetap pakai data dari login
            }
        })();
    </script>

</body>
</html>