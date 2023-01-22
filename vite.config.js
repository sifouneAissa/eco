import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'
// import viteCompression from 'vite-plugin-compression';

export default defineConfig({
    plugins: [
        // viteCompression(),
        laravel({
            input: [
                'resources/js/app.js',
                'resources/js/rtl.js',
                'resources/js/ltr.js',
            ],
            // build: {
            //     rollupOptions: {
            //         output:
            //             {
            //                 // format: 'es',
            //                 // strict: false,
            //                 entryFileNames: "[name].js",
            //                 dir: 'build-admin/'
            //             }
            //     }
            // },
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
