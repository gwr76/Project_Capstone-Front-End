// ===============================
// ELEMENT LOGIN
// ===============================
const loginOverlay = document.getElementById("loginOverlay");
const loginModal = document.getElementById("loginModal");

const openLogin = document.getElementById("openLogin");
const closeLogin = document.getElementById("closeLogin");
const backHome = document.getElementById("backHome");

const loginForm = document.getElementById("loginForm");
const forgotPassword = document.querySelector(".forgot-password-link");

// ===============================
// BUKA DAN TUTUP LOGIN
// ===============================
function showLogin() {
    if (loginOverlay) {
        loginOverlay.classList.add("active");
        loginOverlay.setAttribute("aria-hidden", "false");
    }
}

function hideLogin() {
    if (loginOverlay) {
        loginOverlay.classList.remove("active");
        loginOverlay.setAttribute("aria-hidden", "true");
    }
}

if (openLogin) {
    openLogin.addEventListener("click", showLogin);
}

if (closeLogin) {
    closeLogin.addEventListener("click", hideLogin);
}

if (backHome) {
    backHome.addEventListener("click", hideLogin);
}

if (loginOverlay) {
    loginOverlay.addEventListener("click", function (event) {
        if (event.target === loginOverlay) {
            hideLogin();
        }
    });
}


// ===============================
// PROSES LOGIN (terhubung ke API)
// ===============================
if (loginForm) {
    loginForm.addEventListener("submit", async function (event) {
        event.preventDefault();

        const email = document.querySelector(".email-input")?.value.trim();
        const password = document.querySelector(".password-input")?.value;
        const tombol = loginForm.querySelector("button[type=submit]");

        if (!email || !password) {
            alert("Silakan isi email dan password terlebih dahulu.");
            return;
        }

        tombol.disabled = true;

        try {
            const { ok, data } = await apiPost("/login", { email, password });

            if (!ok) {
                alert(pesanError(data));
                return;
            }

            simpanSesi(data);
            hideLogin();
            sesudahLogin();
        } catch (err) {
            alert("Tidak bisa terhubung ke server.");
        } finally {
            tombol.disabled = false;
        }
    });
}

// ===============================
// LUPA PASSWORD (PINDAH HALAMAN)
// ===============================
if (forgotPassword) {
    forgotPassword.addEventListener("click", function (event) {
        event.preventDefault();
        window.location.href = "./verifikasi-riset-password.html";
    });
}

// ===============================
// TOMBOL ESCAPE
// ===============================
document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
        hideLogin();
    }
});