import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    server: {
        host: '0.0.0.0',
        port: 5173,
        hmr: {
            host: '192.168.0.60',
            protocol: 'http'  // Force HTTP
        },
        watch: {
            usePolling: true
        }
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/register-handler.js',
                'resources/js/claims/admin.js',
            ],
            refresh: true,
        }),
        vue(),
    ],
    build: {
        target: 'esnext', // This enables support for top-level await
        rollupOptions: {
            output: {
                manualChunks: {
                    vendor: ['vue', 'axios']
                }
            }
        }
    }
});
