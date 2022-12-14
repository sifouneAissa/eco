import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // 'resources/js/app.js',
                // template js
                'vendor/jquery/jquery-3.3.1.slim.min.js',
                'ltr/js/custom.js',
                'vendor/select2/js/select2.min.js',
                'vendor/bootstrap/js/bootstrap.bundle.min.js'
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
});
