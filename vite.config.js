import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/postcss';
import autoprefixer from 'autoprefixer';
import fs from 'fs';

export default defineConfig({
    server: {
        host: 'web_laravel.test',
        port: 5173,
         https: {
            key: fs.readFileSync('D:/laragon/etc/ssl/laragon.key'),
            cert: fs.readFileSync('D:/laragon/etc/ssl/laragon.crt'),
        },
    },
    plugins: [
        tailwindcss(),
        autoprefixer(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
         tailwindcss(),
    ],
});
