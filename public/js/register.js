// ===============================
// ELEMENT REGISTER
// ===============================
const registerOverlay = document.getElementById("registerOverlay");
const openRegister = document.getElementById("openRegister");
const closeRegister = document.getElementById("closeRegister");
const backHomeRegister = document.getElementById("backHomeRegister");

const registerForm = document.getElementById("registerForm");
const registerPassword = document.getElementById("registerPassword");

const toggleRegisterPassword = document.getElementById("toggleRegisterPassword");

const successOverlay = document.getElementById("successOverlay");
const continueDashboard = document.getElementById("continueDashboard");

const loginFromRegister = document.getElementById("loginFromRegister");
const openRegisterFromLogin = document.getElementById("openRegisterFromLogin");

const registerLoginOverlay = document.getElementById("loginOverlay");

// ===============================
// BUKA DAN TUTUP REGISTER
// ===============================
function showRegister() {
    if (registerOverlay) {
        registerOverlay.classList.add("active");
        registerOverlay.setAttribute("aria-hidden", "false");
    }
}

function hideRegister() {
    if (registerOverlay) {
        registerOverlay.classList.remove("active");
        registerOverlay.setAttribute("aria-hidden", "true");
    }
}

if (openRegister) {
    openRegister.addEventListener("click", showRegister);
}

if (closeRegister) {
    closeRegister.addEventListener("click", hideRegister);
}

if (backHomeRegister) {
    backHomeRegister.addEventListener("click", hideRegister);
}

if (registerOverlay) {
    registerOverlay.addEventListener("click", function (event) {
        if (event.target === registerOverlay) {
            hideRegister();
        }
    });
}

// ===============================
// TAMPILKAN PASSWORD
// ===============================
if (toggleRegisterPassword && registerPassword) {
    toggleRegisterPassword.addEventListener("click", function () {
        if (registerPassword.type === "password") {
            registerPassword.type = "text";
            toggleRegisterPassword.textContent = "◉";
        } else {
            registerPassword.type = "password";
            toggleRegisterPassword.textContent = "◎";
        }
    });
}

// ===============================
// PINDAH REGISTER KE LOGIN
// ===============================
if (loginFromRegister) {
    loginFromRegister.addEventListener("click", function (event) {
        event.preventDefault();

        hideRegister();

        if (registerLoginOverlay) {
            registerLoginOverlay.classList.add("active");
            registerLoginOverlay.setAttribute("aria-hidden", "false");
        }
    });
}

// ===============================
// PINDAH LOGIN KE REGISTER
// ===============================
if (openRegisterFromLogin) {
    openRegisterFromLogin.addEventListener("click", function (event) {
        event.preventDefault();

        if (registerLoginOverlay) {
            registerLoginOverlay.classList.remove("active");
            registerLoginOverlay.setAttribute("aria-hidden", "true");
        }

        showRegister();
    });
}

// ===============================
// PROSES REGISTER (terhubung ke API)
// ===============================
if (registerForm) {
    registerForm.addEventListener("submit", async function (event) {
        event.preventDefault();

        const email = document.getElementById("registerEmail")?.value.trim();
        const password = registerPassword?.value;
        const agreeTerms = document.getElementById("agreeTerms");
        const tombol = registerForm.querySelector("button[type=submit]");

        if (!email || !password) {
            alert("Silakan isi email dan password terlebih dahulu.");
            return;
        }

        if (password.length < 6) {
            alert("Password minimal harus 6 karakter.");
            return;
        }

        if (!agreeTerms || !agreeTerms.checked) {
            alert("Silakan setujui syarat dan ketentuan terlebih dahulu.");
            return;
        }

        tombol.disabled = true;

        try {
            const { ok, data } = await apiPost("/register", { email, password });

            if (!ok) {
                alert(pesanError(data)); // contoh: "The email has already been taken."
                return;
            }

            // Register tidak otomatis login: user diarahkan login manual.
            // Token dari response sengaja tidak disimpan.
            localStorage.setItem("emailBaruDaftar", email);
            registerForm.reset();
            hideRegister();

            if (successOverlay) {
                successOverlay.classList.add("active");
            } else {
                bukaLoginSetelahRegister();
            }
        } catch (err) {
            alert("Tidak bisa terhubung ke server.");
        } finally {
            tombol.disabled = false;
        }
    });
}

// ===============================
// SETELAH REGISTER: KE HALAMAN INDEX + BUKA LOGIN
// ===============================
function bukaLoginSetelahRegister() {
    if (successOverlay) successOverlay.classList.remove("active");

    // isi email otomatis di form login supaya user tinggal masukkan password
    const emailBaru = localStorage.getItem("emailBaruDaftar");
    const inputEmailLogin = document.querySelector(".email-input");
    if (emailBaru && inputEmailLogin) inputEmailLogin.value = emailBaru;
    localStorage.removeItem("emailBaruDaftar");

    showLogin(); // fungsi dari login.js
    document.querySelector(".password-input")?.focus();
}

if (continueDashboard) {
    continueDashboard.addEventListener("click", bukaLoginSetelahRegister);
}

// ===============================
// TOMBOL ESCAPE
// ===============================
document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
        hideRegister();

        if (successOverlay) {
            successOverlay.classList.remove("active");
        }
    }
});