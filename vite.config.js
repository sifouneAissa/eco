import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import viteCompression from 'vite-plugin-compression';

export default defineConfig({
    plugins: [
        viteCompression(),
        laravel({
            input: [
                // 'public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js',
                // 'public/admin/vendor/dataTables/dataTables/js/jquery.dataTables.min.js',
                // 'public/admin/vendor/dataTables/dataTables.buttons.min.js',
                // 'public/admin/vendor/dataTables/jszip.min.js',
                // 'public/admin/vendor/dataTables/pdfmake.min.js',
                // 'public/admin/vendor/dataTables/buttons.html5.min.js',
                // 'public/admin/vendor/dataTables/buttons.print.min.js',
                // 'public/admin/vendor/dataTables/buttons.colVis',
                // 'public/admin/js/scripts.js',
                // 'public/admin/vendor/dataTables/dataTables/js/dataTables.bootstrap.min.js',
                // 'public/admin/vendor/dataTables/vfs_fonts.js',
                'resources/css/app.css',
                // 'resources/js/app-admin.js',
                // 'public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js',
                'resources/js/rtl.js',
                'resources/js/ltr.js',
                // 'resources/assets/vendor/jquery/jquery-3.3.1.slim.min',
                // 'resources/assets/vendor/bootstrap/js/bootstrap.bundle.min',
                // 'resources/assets/vendor/owl-carousel/owl.carousel',
                // 'resources/assets/vendor/select2/js/select2.min',
                'resources/js/app.js',
                // 'public/admin/vendor/dataTables/dataTables/js/dataTables.bootstrap.min.js',
                // 'public/admin/vendor/dataTables/vfs_fonts.js',
                // template js
                // 'vendor/jquery/jquery-3.3.1.slim.min.js',
                // 'ltr/js/custom.js',
                // 'vendor/select2/js/select2.min.js',
                // 'vendor/bootstrap/js/bootstrap.bundle.min.js',
                // 'vendor/owl-carousel/owl.carousel.js',
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
