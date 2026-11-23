<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NEXAKUN - Home</title>

    <!-- GOOGLE FONTS -->
    <link
      href="https://fonts.googleapis.com/css?family=Alfa+Slab+One&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Gurajada&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Funnel+Sans:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <!-- CSS UTAMA (SAMA DENGAN PEMBELI.HTML) + MODAL LOGIN/REGISTER -->
    <link rel="stylesheet" href="{{ asset('css/pembeli.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />

    <style>
      .auth-nav-buttons {
        display: flex;
        align-items: center;
        gap: 12px;
      }

      .btn-nav-auth {
        height: 36px;
        padding: 0 20px;
        border: none;
        border-radius: 8px;
        background: #058cfb;
        color: #ffffff;
        font-family: "Gurajada", "Funnel Sans", sans-serif;
        font-size: 24px;
        line-height: 1;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition:
          background 0.2s ease,
          transform 0.15s ease;
      }

      .btn-nav-auth:hover {
        background: #006dc5;
        transform: translateY(-1px);
      }

      /* Supaya judul "Pilih Game Favoritmu" tidak tertutup navbar saat di-scroll dari menu Games */
      #games {
        scroll-margin-top: 80px;
      }

      /* Ikon gamepad di judul "Pilih Game Favoritmu" */
      .games-section-icon {
        width: 34px;
        height: 34px;
        background-image: url("../public/assets/v270_374.png");
        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;
        flex-shrink: 0;
      }
    </style>
  </head>

  <body>
    <!-- NAVBAR (SAMA PERSIS DENGAN PEMBELI.HTML) -->
    <header class="navbar">
      <a href="/index" class="brand">
        <img src="{{ asset('images/v341_395.png') }}" alt="NEXAKUN" />
      </a>

      <nav class="nav-links">
        <a href="/index" class="active">Home</a>
        <a href="#games">Games</a>
        <a href="/about">About</a>
        <a href="/contact">Contact</a>
      </nav>

      <div class="auth-nav-buttons">
        <button type="button" class="btn-nav-auth" id="openLogin">Login</button>
        <button type="button" class="btn-nav-auth" id="openRegister">
          Register
        </button>
      </div>

      <!-- tampil setelah login -->
      <div class="nav-actions" id="navActions" style="display: none">
        <button type="button" class="icon-button" id="btnNotif" aria-label="Notifikasi">
          <svg viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.7 21a2 2 0 0 1-3.4 0"/></svg>
        </button>

        <button type="button" class="icon-button" id="btnProfil" aria-label="Profil">
          <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/></svg>
        </button>

        <div class="profile-menu" id="notifMenu">
          <strong>Notifikasi</strong>
          <span style="color: #918f8f; font-size: 14px; padding: 8px 10px">Belum ada notifikasi</span>
        </div>

        <div class="profile-menu" id="profilMenu">
          <strong id="profilEmail" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap">Akun Pembeli</strong>
          <a href="/pembeli/profil" data-menu="profil">Profil Saya</a>
          <a href="/pembeli/pesanan" data-menu="pesanan">Pesanan Saya</a>
          <a href="/pembeli/daftarjadipenjual" data-menu="penjual" id="menuDaftarPenjual">Daftar Jadi Penjual</a>
          <button type="button" id="btnLogout">Keluar</button>
        </div>
      </div>
    </header>

    <!-- KONTEN UTAMA -->
    <main id="home">
      <!-- HERO SECTION -->
      <section class="hero">
        <div class="hero-copy">
          <h1>
            Skin First.<br />
            Skill Latter
          </h1>

          <p class="description">
            Temukan akun game, skin, dan item favorit, dengan aman, cepat, dan
            terpercaya di NEXAKUN
          </p>

          <p class="tagline">
            Look good, die stylish. Trade accounts, items, and more at Nexakun.
          </p>

          <!-- KOLOM PENCARIAN -->
          <form class="search-box" id="searchForm">
            <span class="search-icon">
              <svg viewBox="0 0 24 24">
                <circle cx="10.8" cy="10.8" r="7.2" />
                <path d="m16.2 16.2 5 5" />
              </svg>
            </span>

            <input
              type="search"
              id="gameSearch"
              placeholder="Cari game, skin, atau akun idaman ...."
            />

            <button type="submit">Cari</button>
          </form>
        </div>

        <div class="hero-art"></div>
      </section>

      <!-- PILIH GAME FAVORITMU -->
      <section class="games-section" id="games">
        <h2>
          <div class="games-section-icon"></div>
          Pilih Game <span>Favoritmu</span>
        </h2>

        <div class="game-grid">
          <!-- FREE FIRE -->
          <a href="/produk/FF" class="game-card freefire">
            <span class="game-name">FREE FIRE</span>
            <span class="arrow">➜</span>
          </a>

          <!-- MOBILE LEGENDS -->
          <a href="/produk/ML" class="game-card mobilelegends">
            <span class="game-name">MOBILE LEGENDS</span>
            <span class="arrow">➜</span>
          </a>

          <!-- PUBG -->
          <a href="/produk/PUBG" class="game-card pubg">
            <span class="game-name">PUBG BATTLEGROUNDS</span>
            <span class="arrow">➜</span>
          </a>
        </div>
      </section>

      <!-- FOOTER -->
      <footer id="contact">
        © 2026 NEXAKUN. Platform jual beli akun game.
      </footer>
    </main>

    <!-- LOGIN OVERLAY -->
    <div class="login-overlay" id="loginOverlay" aria-hidden="true">
      <section
        class="login-modal"
        id="loginModal"
        role="dialog"
        aria-modal="true"
        aria-labelledby="loginTitle"
      >
        <!-- CLOSE -->
        <button
          type="button"
          class="close-login"
          id="closeLogin"
          aria-label="Tutup Login"
        >
          &times;
        </button>

        <!-- LOGO -->
        <div class="login-logo"></div>

        <!-- TITLE -->
        <h2 class="login-title" id="loginTitle">Masuk</h2>

        <p class="login-description">
          Silakan masukkan akun Anda untuk melanjutkan
        </p>
       
        <!-- LOGIN FORM -->
        <form id="loginForm">
          <label class="email-label" for="loginEmail"> Email </label>

          <div class="email-input-container">
            <input
              type="email"
              id="loginEmail"
              class="email-input"
              placeholder="nama@gmail.com"
              autocomplete="email"
              required
            />
          </div>

          <label class="password-label" for="loginPassword"> Password </label>

          <div class="password-input-container">
            <input
              type="password"
              id="loginPassword"
              class="password-input"
              placeholder="Masukkan password"
              autocomplete="current-password"
              required
            />
          </div>

          <a
            href="./verifikasi-riset-password.html"
            class="forgot-password-link"
            id="forgotPassword"
          >
            Lupa kata sandi?
          </a>

          <button type="submit" class="submit-login-button">
            <span class="submit-login-text"> ➜ Masuk </span>
          </button>
        </form>

        <!-- PINDAH KE REGISTER -->
        <p class="register-login-text">
          Belum punya akun?
          <a href="#" class="register-login-link" id="openRegisterFromLogin">
            Daftar Sekarang
          </a>
        </p>

        <!-- KEMBALI -->
        <button type="button" class="back-home-button" id="backHome">
          Kembali ke Beranda
        </button>
      </section>
    </div>

    <!-- REGISTER OVERLAY -->
    <div class="register-overlay" id="registerOverlay" aria-hidden="true">
      <section
        class="register-modal"
        role="dialog"
        aria-modal="true"
        aria-labelledby="registerTitle"
      >
        <!-- CLOSE -->
        <button
          type="button"
          class="close-register"
          id="closeRegister"
          aria-label="Tutup Register"
        >
          &times;
        </button>

        <!-- LOGO -->
        <div class="register-logo"></div>

        <!-- TITLE -->
        <h2 class="register-title" id="registerTitle">Daftar</h2>

        <p class="register-description">
          Mulai jual beli akun dan item game sekarang
        </p>

        <!-- REGISTER FORM -->
        <form id="registerForm">
          <!-- EMAIL -->
          <label class="register-email-label" for="registerEmail">
            Email
          </label>

          <div class="register-email-container">
            <input
              type="email"
              id="registerEmail"
              class="register-email-input"
              placeholder="nama@gmail.com"
              autocomplete="email"
              required
            />
          </div>

          <!-- PASSWORD -->
          <label class="register-password-label" for="registerPassword">
            Password
          </label>

          <div class="register-password-container">
            <input
              type="password"
              id="registerPassword"
              class="register-password-input"
              placeholder="Masukkan password"
              minlength="6"
              autocomplete="new-password"
              required
            />

            <button
              type="button"
              class="toggle-register-password"
              id="toggleRegisterPassword"
              aria-label="Tampilkan password"
            >
              ◎
            </button>
          </div>

          <!-- TERMS -->
          <label class="register-terms-container">
            <input type="checkbox" id="agreeTerms" required />
            <span> Saya menyetujui Syarat & Ketentuan NEXAKUN </span>
          </label>

          <!-- SUBMIT -->
          <button type="submit" class="register-submit-button">
            ♙ Daftar Sekarang
          </button>
        </form>

        <!-- PINDAH KE LOGIN -->
        <p class="register-login-text">
          Sudah punya akun?
          <a href="#" class="register-login-link" id="loginFromRegister">
            Masuk
          </a>
        </p>

        <!-- KEMBALI -->
        <button type="button" class="register-back-home" id="backHomeRegister">
          ↩ Kembali ke Beranda
        </button>
      </section>
    </div>

    <!-- SUCCESS OVERLAY -->
    <div class="success-overlay" id="successOverlay" aria-hidden="true">
      <div class="success-modal">
        <div class="success-icon">✓</div>

        <h2>Pendaftaran Berhasil!</h2>

        <p>Akun NEXAKUN kamu berhasil dibuat. Silakan login untuk melanjutkan.</p>

        <button type="button" class="continue-dashboard" id="continueDashboard">
          Login Sekarang
        </button>
      </div>
    </div>

    <!-- JAVASCRIPT -->
   <script src="{{ asset('js/auth.js') }}"></script>
   <script src="{{ asset('js/login.js') }}"></script>
   <script src="{{ asset('js/register.js') }}"></script>

    <script>
      // PENCARIAN GAME DI BERANDA (SAMA DENGAN PEMBELI.HTML)
      document
        .getElementById("searchForm")
        .addEventListener("submit", function (event) {
          event.preventDefault();

          const query = document
            .getElementById("gameSearch")
            .value.trim()
            .toLowerCase();

          if (!query) {
            alert("Masukkan nama game atau item yang ingin dicari.");
            return;
          }

          if (query.includes("free fire") || query === "ff") {
            window.location.href = "pembeli_FF.html";
          } else if (query.includes("mobile legends") || query === "ml") {
            window.location.href = "pembeli_ML.html";
          } else if (query.includes("pubg")) {
            window.location.href = "pembeli_PUBG.html";
          } else {
            alert(
              "Game tidak ditemukan. Silakan cari Free Fire, Mobile Legends, atau PUBG.",
            );
          }
        });
    </script>
  </body>
</html>