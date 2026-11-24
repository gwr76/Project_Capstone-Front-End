// ===============================
// HELPER AUTH (dipakai login.js & register.js)
// Harus dimuat SEBELUM login.js dan register.js
// ===============================
const API_URL = "/api/v3";

// Tujuan setelah login berdasarkan role (sesuai routes/web.php)
// Pembeli tetap di /index (navbar berubah jadi ikon profil + popup sambutan)
const HALAMAN_ROLE = {
    admin: "/admin/dashboard",
    penjual: "/penjual/dashboard",
    calon_penjual: "/index",
    pembeli: "/index",
};

async function apiPost(path, body) {
    const res = await fetch(API_URL + path, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json", // wajib, supaya error validasi balik JSON (bukan redirect)
        },
        body: JSON.stringify(body),
    });

    let data = {};
    try {
        data = await res.json();
    } catch (e) {}

    return { ok: res.ok, status: res.status, data };
}

function simpanSesi(data) {
    localStorage.setItem("token", data.access_token);
    localStorage.setItem("user", JSON.stringify(data.data));
}

function ambilToken() {
    return localStorage.getItem("token");
}

function ambilUser() {
    try {
        return JSON.parse(localStorage.getItem("user"));
    } catch (e) {
        return null;
    }
}

function pindahKeHalamanRole(user) {
    const role = user?.role || "pembeli";
    window.location.href = HALAMAN_ROLE[role] || HALAMAN_ROLE.pembeli;
}

// Ambil pesan error pertama dari response Laravel (422 / 401)
function pesanError(data) {
    if (data?.errors) {
        const first = Object.values(data.errors)[0];
        if (first && first[0]) return first[0];
    }
    return data?.message || "Terjadi kesalahan, coba lagi.";
}

// Pakai ini untuk request ke endpoint yang butuh login
async function apiAuth(path, options = {}) {
    const res = await fetch(API_URL + path, {
        ...options,
        headers: {
            Accept: "application/json",
            Authorization: "Bearer " + ambilToken(),
            ...(options.headers || {}),
        },
    });
    if (res.status === 401) {
        localStorage.clear();
        window.location.href = "/index";
    }
    return res;
}

// ===============================
// TAMPILAN SETELAH LOGIN
// ===============================
const LOGO_URL = "/images/v341_395.png";

// Tujuan menu profil. Isi dengan URL kalau halamannya sudah dibuat,
// contoh: profil: "/profil". Selama null, klik menu hanya menampilkan info.
const HALAMAN_MENU = {
    profil: "/pembeli/profil",
    pesanan: "/pembeli/pesanan",
    penjual: null,
};

function sudahLogin() {
    return !!ambilToken() && !!ambilUser();
}

// Fitur navbar user + popup sambutan sementara hanya untuk pembeli
// (calon_penjual masih diperlakukan sebagai pembeli)
function adalahPembeli(user) {
    return !!user && ["pembeli", "calon_penjual"].includes(user.role);
}

// Tampilkan ikon notifikasi + profil kalau sudah login, tombol Login/Register kalau belum
function segarkanNavbar() {
    const user = ambilUser();
    const login = sudahLogin() && adalahPembeli(user);

    const guest = document.querySelector(".auth-nav-buttons");
    const aksi = document.getElementById("navActions");

    if (guest) guest.style.display = login ? "none" : "";
    if (aksi) aksi.style.display = login ? "flex" : "none";
    if (!login || !user) return;

    // Judul menu profil = email pembeli yang sedang login
    const email = document.getElementById("profilEmail");
    if (email) {
        email.textContent = user.email;
        email.title = user.email;
    }

    // "Daftar Jadi Penjual" hanya untuk pembeli yang belum mengajukan
    const menuPenjual = document.getElementById("menuDaftarPenjual");
    if (menuPenjual) menuPenjual.style.display = user.role === "pembeli" ? "" : "none";
}

// Pop up "SELAMAT DATANG DI [logo]"
function tampilkanSambutan() {
    let toast = document.getElementById("welcomeToast");

    if (!toast) {
        toast = document.createElement("div");
        toast.id = "welcomeToast";
        toast.className = "welcome-toast";
        toast.setAttribute("role", "status");
        toast.innerHTML =
            '<button type="button" class="welcome-toast-close" aria-label="Tutup">X</button>' +
            '<div class="welcome-toast-content">' +
            '<span class="welcome-toast-text">SELAMAT DATANG DI</span>' +
            '<img class="welcome-toast-logo" src="' + LOGO_URL + '" alt="NEXAKUN" />' +
            "</div>";
        document.body.appendChild(toast);
        toast.querySelector(".welcome-toast-close").addEventListener("click", () => {
            toast.classList.remove("show");
        });
    }

    requestAnimationFrame(() => toast.classList.add("show"));
    clearTimeout(toast._timer);
    toast._timer = setTimeout(() => toast.classList.remove("show"), 4500);
}

// Dipanggil setelah login / register berhasil
function sesudahLogin() {
    const user = ambilUser();

    // Admin & penjual: langsung ke dashboard masing-masing
    if (user?.role === "admin" || user?.role === "penjual") {
        pindahKeHalamanRole(user);
        return;
    }

    // Pembeli (dan calon_penjual): tetap di index, tampilkan ikon profil + popup
    segarkanNavbar();
    tampilkanSambutan();
}

async function logout() {
    try {
        await apiAuth("/logout", { method: "POST" });
    } catch (e) {}
    localStorage.removeItem("token");
    localStorage.removeItem("user");
    segarkanNavbar();
    document.querySelectorAll(".profile-menu").forEach((m) => m.classList.remove("show"));
}

document.addEventListener("DOMContentLoaded", () => {
    segarkanNavbar();

    // Dari halaman lain (About/Contact): /index?login=1 atau /index?register=1
    const param = new URLSearchParams(window.location.search);
    if (!sudahLogin()) {
        if (param.get("login") === "1" && typeof showLogin === "function") showLogin();
        if (param.get("register") === "1" && typeof showRegister === "function") showRegister();
    }

    const menuProfil = document.getElementById("profilMenu");
    const menuNotif = document.getElementById("notifMenu");

    function toggle(menu, lainnya) {
        if (lainnya) lainnya.classList.remove("show");
        if (menu) menu.classList.toggle("show");
    }

    document.getElementById("btnProfil")?.addEventListener("click", (e) => {
        e.stopPropagation();
        toggle(menuProfil, menuNotif);
    });

    document.getElementById("btnNotif")?.addEventListener("click", (e) => {
        e.stopPropagation();
        toggle(menuNotif, menuProfil);
    });

    document.getElementById("btnLogout")?.addEventListener("click", logout);

    menuProfil?.querySelectorAll("a[data-menu]").forEach((link) => {
        link.addEventListener("click", (e) => {
            e.preventDefault();
            const tujuan = HALAMAN_MENU[link.dataset.menu];
            if (tujuan) {
                window.location.href = tujuan;
            } else {
                alert("Halaman " + link.textContent.trim() + " belum tersedia.");
            }
        });
    });

    // klik di luar menu = tutup
    document.addEventListener("click", (e) => {
        if (!e.target.closest(".nav-actions")) {
            menuProfil?.classList.remove("show");
            menuNotif?.classList.remove("show");
        }
    });
});