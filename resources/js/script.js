// Mendapatkan elemen tombol
const toggleDarkModeBtn = document.getElementById("toggle-dark-mode");

// Cek preferensi mode sebelumnya di localStorage
const currentTheme = localStorage.getItem("theme");
if (currentTheme) {
    document.documentElement.setAttribute("data-theme", currentTheme);
}

// Tambahkan event listener untuk toggle mode
toggleDarkModeBtn.addEventListener("click", () => {
    const theme = document.documentElement.getAttribute("data-theme");
    const newTheme = theme === "dark" ? "light" : "dark";
    document.documentElement.setAttribute("data-theme", newTheme);
    localStorage.setItem("theme", newTheme); // Simpan preferensi
});
