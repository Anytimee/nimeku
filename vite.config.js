import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import react from "@vitejs/plugin-react";

export default defineConfig({
    build: {
        outDir: "public/build", // Atur direktori output sesuai dengan yang Vercel harapkan
    },
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.jsx"], // Masukkan app.js dan app.css
            refresh: true,
        }),
        react(), // Tambahkan plugin react di dalam array plugins
    ],
});
