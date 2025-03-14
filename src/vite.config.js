import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/web/app.scss',
                'resources/js/web/app.js'
            ],
            refresh: true,
        }),
        vue(),
    ],
    server: {
        host: true,
        hmr: {
            host: 'localhost'
        },
        watch: {
            usePolling: true,
        },
    },
});
