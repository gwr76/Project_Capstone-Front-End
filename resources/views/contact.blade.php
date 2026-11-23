<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEXAKUN - Contact</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Funnel+Sans:wght@400;600;700;800&family=Gurajada&display=swap" rel="stylesheet">

    <!-- CSS Terpisah -->
    <link rel="stylesheet" href="./css/contact.css">
</head>
<body>

    <!-- NAVBAR HEADER -->
    <header class="navbar">
        <a href="index.html" class="brand">
            <img src="./images/v1_506.png" alt="NEXAKUN Logo">
        </a>

        <nav class="nav-links">
            <a href="/index">Home</a>
            <a href="/#game">Games</a>
            <a href="/about">About</a>
            <a href="/contact" class="active">Contact</a>
        </nav>

        <!-- Spacer agar menu tetap berada di tengah sesuai desain -->
        <div class="nav-spacer" aria-hidden="true"></div>
    </header>

    <!-- KONTEN UTAMA -->
    <main class="contact-main">

        <!-- HERO BANNER -->
        <section class="contact-hero">
            <div class="hero-art" aria-hidden="true"></div>
            <h1 class="hero-title">How Can We Help You?</h1>
        </section>

        <!-- SUBJUDUL -->
        <p class="contact-subtitle">
            Punya pertanyaan, kendala transaksi, atau butuh bantuan? Tim NEXAKUN siap membantu kamu.
        </p>

        <!-- KARTU WHATSAPP -->
        <section class="whatsapp-card" aria-labelledby="waCardTitle">
            <div class="wa-header">
                <svg class="wa-icon-outline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                </svg>
                <h2 id="waCardTitle">Hubungi Kami Melalui WhatsApp</h2>
            </div>

            <p class="wa-description">
                Dapatkan bantuan langsung dari Customer Support NEXAKUN.
            </p>

            <!-- Ganti nomor 6281234567890 dengan nomor WhatsApp CS NEXAKUN milikmu -->
            <a href="https://wa.me/6289513779419?text=Halo%20Customer%20Support%20NEXAKUN,%20saya%20butuh%20bantuan%20terkait%20akun/transaksi."
               target="_blank"
               rel="noopener noreferrer"
               class="wa-cta-button">
                <svg class="wa-icon-solid" viewBox="0 0 32 32" fill="currentColor" aria-hidden="true">
                    <path d="M16 3C8.82 3 3 8.82 3 16c0 2.29.6 4.53 1.74 6.5L3 29l6.68-1.71A12.93 12.93 0 0 0 16 29c7.18 0 13-5.82 13-13S23.18 3 16 3zm0 23.6c-2.05 0-4.06-.55-5.81-1.6l-.42-.25-3.96 1.01 1.06-3.86-.27-.43A10.55 10.55 0 0 1 5.4 16C5.4 10.16 10.16 5.4 16 5.4S26.6 10.16 26.6 16 21.84 26.6 16 26.6zm5.82-7.92c-.32-.16-1.89-.93-2.18-1.04-.29-.11-.5-.16-.71.16-.21.32-.82 1.04-1.01 1.25-.19.21-.37.24-.69.08-.32-.16-1.35-.5-2.57-1.59-.95-.85-1.59-1.9-1.78-2.22-.19-.32-.02-.49.14-.65.14-.14.32-.37.48-.56.16-.19.21-.32.32-.53.11-.21.05-.4-.03-.56-.08-.16-.71-1.72-.98-2.36-.26-.62-.52-.53-.71-.54h-.61c-.21 0-.56.08-.85.4-.29.32-1.11 1.09-1.11 2.65s1.14 3.08 1.3 3.29c.16.21 2.24 3.42 5.43 4.8.76.33 1.35.52 1.81.67.76.24 1.45.21 2 .13.61-.09 1.89-.77 2.15-1.52.27-.75.27-1.39.19-1.52-.08-.13-.29-.21-.61-.37z"/>
                </svg>
                <span>Chat WhatsApp Sekarang</span>
            </a>
        </section>

    </main>

</body>
</html>