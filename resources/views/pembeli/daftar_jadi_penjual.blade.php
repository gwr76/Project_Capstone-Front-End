<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEXAKUN - Daftar sebagai Penjual</title>
    <link href="https://fonts.googleapis.com/css?family=Gurajada&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Funnel+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=42dot+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="./css/daftar_penjual.css">
</head>
<body>

<div class="reg-page">

    <!-- Navbar -->
    <header class="reg-navbar">
        <a href="index.html">
            <img src="./images/v341_395.png" alt="NEXAKUN" class="nav-logo">
        </a>
        <div class="nav-steps">
            <div class="step active" id="step-dot-1">
                <div class="step-dot">1</div>
                <span>Data Diri</span>
            </div>
            <div class="step-line"></div>
            <div class="step" id="step-dot-2">
                <div class="step-dot">2</div>
                <span>Toko</span>
            </div>
            <div class="step-line"></div>
            <div class="step" id="step-dot-3">
                <div class="step-dot">3</div>
                <span>Dokumen</span>
            </div>
        </div>
        <a href="login_penjual.html" class="nav-login-link">Sudah punya akun? <strong>Masuk</strong></a>
    </header>

    <!-- Konten -->
    <main class="reg-main">

        <!-- STEP 1: Data Diri -->
        <div class="reg-step" id="step1">
            <div class="reg-card">
                <div class="reg-card-header">
                    <div class="step-icon"><i class="fa fa-user"></i></div>
                    <div>
                        <h2>Data Diri</h2>
                        <p>Lengkapi informasi akun Anda</p>
                    </div>
                </div>

                <form id="form1" novalidate>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Nama Lengkap <span class="req">*</span></label>
                            <input type="text" id="namaLengkap" placeholder="Nama sesuai KTP" required>
                            <span class="err" id="namaErr"></span>
                        </div>
                        <div class="form-group">
                            <label>Username <span class="req">*</span></label>
                            <input type="text" id="username" placeholder="username unik" required>
                            <span class="err" id="usernameErr"></span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Email <span class="req">*</span></label>
                            <input type="email" id="email" placeholder="email@contoh.com" required>
                            <span class="err" id="emailErr"></span>
                        </div>
                        <div class="form-group">
                            <label>No. WhatsApp <span class="req">*</span></label>
                            <input type="tel" id="whatsapp" placeholder="08xxxxxxxxxx" required>
                            <span class="err" id="waErr"></span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Password <span class="req">*</span></label>
                            <div class="input-wrap">
                                <input type="password" id="password" placeholder="Min. 8 karakter" required>
                                <button type="button" class="toggle-pw" onclick="togglePass('password','eyePass')">
                                    <i class="fa fa-eye" id="eyePass"></i>
                                </button>
                            </div>
                            <span class="err" id="passErr"></span>
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password <span class="req">*</span></label>
                            <div class="input-wrap">
                                <input type="password" id="konfirmPass" placeholder="Ulangi password" required>
                                <button type="button" class="toggle-pw" onclick="togglePass('konfirmPass','eyeKonfirm')">
                                    <i class="fa fa-eye" id="eyeKonfirm"></i>
                                </button>
                            </div>
                            <span class="err" id="konfirmErr"></span>
                        </div>
                    </div>

                    <div class="form-actions">
                        <a href="index.html" class="btn-back"><i class="fa fa-arrow-left"></i> Kembali</a>
                        <button type="button" class="btn-next" onclick="nextStep(1)">
                            Lanjut <i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- STEP 2: Info Toko -->
        <div class="reg-step hidden" id="step2">
            <div class="reg-card">
                <div class="reg-card-header">
                    <div class="step-icon"><i class="fa fa-store"></i></div>
                    <div>
                        <h2>Informasi Toko</h2>
                        <p>Lengkapi profil toko Anda di NEXAKUN</p>
                    </div>
                </div>

                <form id="form2" novalidate>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Nama Toko <span class="req">*</span></label>
                            <input type="text" id="namaToko" placeholder="Nama toko Anda" required>
                            <span class="err" id="tokoErr"></span>
                        </div>
                        <div class="form-group">
                            <label>Kategori Game <span class="req">*</span></label>
                            <select id="kategori" required>
                                <option value="">Pilih kategori...</option>
                                <option>PUBG Mobile</option>
                                <option>Mobile Legends</option>
                                <option>Free Fire</option>
                                <option>Genshin Impact</option>
                                <option>Lainnya</option>
                            </select>
                            <span class="err" id="katErr"></span>
                        </div>
                    </div>

                    <div class="form-group full">
                        <label>Deskripsi Toko</label>
                        <textarea id="deskToko" rows="3"
                            placeholder="Ceritakan tentang toko dan produk yang Anda jual..."></textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Metode Pembayaran <span class="req">*</span></label>
                            <select id="metodePay" required>
                                <option value="">Pilih metode...</option>
                                <option>Dana</option>
                                <option>GoPay</option>
                                <option>OVO</option>
                                <option>Transfer Bank</option>
                            </select>
                            <span class="err" id="payErr"></span>
                        </div>
                        <div class="form-group">
                            <label>No. Rekening / Dompet <span class="req">*</span></label>
                            <input type="text" id="noRek" placeholder="Nomor rekening atau dompet digital" required>
                            <span class="err" id="rekErr"></span>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn-back" onclick="prevStep(2)">
                            <i class="fa fa-arrow-left"></i> Kembali
                        </button>
                        <button type="button" class="btn-next" onclick="nextStep(2)">
                            Lanjut <i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- STEP 3: Upload Dokumen -->
        <div class="reg-step hidden" id="step3">
            <div class="reg-card">
                <div class="reg-card-header">
                    <div class="step-icon"><i class="fa fa-file-upload"></i></div>
                    <div>
                        <h2>Verifikasi Dokumen</h2>
                        <p>Upload dokumen untuk verifikasi admin</p>
                    </div>
                </div>

                <form id="form3" novalidate>

                    <!-- Upload KTP -->
                    <div class="form-group full">
                        <label>Foto KTP <span class="req">*</span></label>
                        <div class="upload-area" id="ktpArea" onclick="document.getElementById('ktpFile').click()">
                            <i class="fa fa-id-card"></i>
                            <p>Klik untuk upload foto KTP</p>
                            <small>Format: JPG, PNG. Maks 5MB</small>
                            <input type="file" id="ktpFile" accept=".jpg,.jpeg,.png"
                                style="display:none" onchange="previewUpload('ktpFile','ktpArea','ktpPreview')">
                        </div>
                        <img id="ktpPreview" class="upload-preview hidden" alt="Preview KTP">
                        <span class="err" id="ktpErr"></span>
                    </div>

                    <!-- Upload Selfie dengan KTP -->
                    <div class="form-group full">
                        <label>Selfie dengan KTP <span class="req">*</span></label>
                        <div class="upload-area" id="selfieArea" onclick="document.getElementById('selfieFile').click()">
                            <i class="fa fa-camera"></i>
                            <p>Klik untuk upload foto selfie bersama KTP</p>
                            <small>Format: JPG, PNG. Maks 5MB</small>
                            <input type="file" id="selfieFile" accept=".jpg,.jpeg,.png"
                                style="display:none" onchange="previewUpload('selfieFile','selfieArea','selfiePreview')">
                        </div>
                        <img id="selfiePreview" class="upload-preview hidden" alt="Preview Selfie">
                        <span class="err" id="selfieErr"></span>
                    </div>

                    <label class="checkbox-label">
                        <input type="checkbox" id="agreeTerms" required>
                        <span>Saya menyetujui <a href="#" class="link-blue">Syarat & Ketentuan</a>
                        dan <a href="#" class="link-blue">Kebijakan Privasi</a> NEXAKUN.</span>
                    </label>
                    <span class="err" id="termsErr"></span>

                    <div class="info-box">
                        <i class="fa fa-info-circle"></i>
                        <p>Pendaftaran Anda akan ditinjau oleh Admin NEXAKUN. Proses verifikasi
                        biasanya memakan waktu 1–2 hari kerja. Anda akan mendapat notifikasi melalui email.</p>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn-back" onclick="prevStep(3)">
                            <i class="fa fa-arrow-left"></i> Kembali
                        </button>
                        <button type="button" class="btn-next btn-submit-final" onclick="submitForm()">
                            <i class="fa fa-paper-plane"></i> Kirim Pendaftaran
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- STEP 4: Sukses -->
        <div class="reg-step hidden" id="step4">
            <div class="reg-card success-card">
                <div class="success-icon"><i class="fa fa-check-circle"></i></div>
                <h2>Pendaftaran Terkirim!</h2>
                <p class="success-desc">
                    Terima kasih telah mendaftar sebagai penjual di <strong>NEXAKUN</strong>.
                    Admin kami akan meninjau dokumen Anda dan menghubungi via email dalam
                    <strong>1–2 hari kerja</strong>.
                </p>
                <div class="success-info">
                    <div class="success-info-item">
                        <i class="fa fa-envelope"></i>
                        <span>Cek email Anda untuk konfirmasi</span>
                    </div>
                    <div class="success-info-item">
                        <i class="fa fa-clock"></i>
                        <span>Proses verifikasi 1–2 hari kerja</span>
                    </div>
                    <div class="success-info-item">
                        <i class="fa fa-bell"></i>
                        <span>Notifikasi persetujuan via email & WA</span>
                    </div>
                </div>
                <div class="success-actions">
                    <a href="index.html" class="btn-home">Kembali ke Beranda</a>
                    <a href="login_penjual.html" class="btn-login">Login sebagai Penjual</a>
                </div>
            </div>
        </div>

    </main>

</div>

<script>
    let currentStep = 1;

    function goToStep(n) {
        document.querySelectorAll('.reg-step').forEach(el => el.classList.add('hidden'));
        document.getElementById('step' + n).classList.remove('hidden');

        document.querySelectorAll('.step').forEach((el, i) => {
            el.classList.toggle('active', i + 1 <= n);
            el.classList.toggle('done',   i + 1 < n);
        });

        currentStep = n;
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function nextStep(from) {
        if (from === 1) {
            if (!validateStep1()) return;
        } else if (from === 2) {
            if (!validateStep2()) return;
        }
        goToStep(from + 1);
    }

    function prevStep(from) { goToStep(from - 1); }

    // ─── Validasi Step 1 ───
    function validateStep1() {
        let valid = true;
        const checks = [
            ['namaLengkap', 'namaErr',  v => v.length >= 2,    'Nama minimal 2 karakter'],
            ['username',    'usernameErr', v => /^[a-z0-9_]{3,}$/.test(v), 'Username min 3 karakter (huruf kecil/angka/_)'],
            ['email',       'emailErr',  v => /\S+@\S+\.\S+/.test(v), 'Format email tidak valid'],
            ['whatsapp',    'waErr',     v => /^08\d{8,11}$/.test(v), 'Format nomor tidak valid (08xx...)'],
            ['password',    'passErr',   v => v.length >= 8,   'Password minimal 8 karakter'],
        ];
        checks.forEach(([id, errId, fn, msg]) => {
            const val = document.getElementById(id).value.trim();
            const errEl = document.getElementById(errId);
            if (!fn(val)) { errEl.textContent = msg; valid = false; }
            else errEl.textContent = '';
        });
        const pw = document.getElementById('password').value;
        const kf = document.getElementById('konfirmPass').value;
        const kfErr = document.getElementById('konfirmErr');
        if (pw && kf !== pw) { kfErr.textContent = 'Password tidak cocok'; valid = false; }
        else kfErr.textContent = '';
        return valid;
    }

    // ─── Validasi Step 2 ───
    function validateStep2() {
        let valid = true;
        const checks = [
            ['namaToko', 'tokoErr', v => v.length >= 3, 'Nama toko minimal 3 karakter'],
            ['kategori', 'katErr',  v => v !== '',      'Pilih kategori game'],
            ['metodePay','payErr',  v => v !== '',      'Pilih metode pembayaran'],
            ['noRek',    'rekErr',  v => v.length >= 5, 'Nomor rekening tidak valid'],
        ];
        checks.forEach(([id, errId, fn, msg]) => {
            const val = document.getElementById(id).value.trim();
            const errEl = document.getElementById(errId);
            if (!fn(val)) { errEl.textContent = msg; valid = false; }
            else errEl.textContent = '';
        });
        return valid;
    }

    // ─── Submit Step 3 ───
    function submitForm() {
        let valid = true;
        const ktpFile = document.getElementById('ktpFile').files[0];
        const selfieFile = document.getElementById('selfieFile').files[0];

        if (!ktpFile) { document.getElementById('ktpErr').textContent = 'Upload foto KTP'; valid = false; }
        else document.getElementById('ktpErr').textContent = '';

        if (!selfieFile) { document.getElementById('selfieErr').textContent = 'Upload foto selfie dengan KTP'; valid = false; }
        else document.getElementById('selfieErr').textContent = '';

        if (!document.getElementById('agreeTerms').checked) {
            document.getElementById('termsErr').textContent = 'Anda harus menyetujui syarat & ketentuan';
            valid = false;
        } else document.getElementById('termsErr').textContent = '';

        if (valid) goToStep(4);
    }

    // ─── Preview Upload ───
    function previewUpload(inputId, areaId, previewId) {
        const file = document.getElementById(inputId).files[0];
        const preview = document.getElementById(previewId);
        const area = document.getElementById(areaId);
        if (!file) return;
        const reader = new FileReader();
        reader.onload = e => {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            area.style.borderColor = '#058cfb';
        };
        reader.readAsDataURL(file);
    }

    // ─── Toggle Password ───
    function togglePass(inputId, iconId) {
        const inp = document.getElementById(inputId);
        const ico = document.getElementById(iconId);
        if (inp.type === 'password') { inp.type = 'text'; ico.className = 'fa fa-eye-slash'; }
        else { inp.type = 'password'; ico.className = 'fa fa-eye'; }
    }
</script>

</body>
</html>