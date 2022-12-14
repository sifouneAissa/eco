import './bootstrap';
// import '../css/app.css';

import  '../../public/vendor/jquery/jquery-3.3.1.slim.min.js';
import    '../../public/vendor/select2/js/select2.min.js';
import    '../../public/vendor/bootstrap/js/bootstrap.bundle.min.js';
import '../../public/vendor/owl-carousel/owl.carousel.js';
import '../../public/vendor/bootstrap/css/bootstrap.min.css';
import '../../public/vendor/fontawesome/css/all.min.css';
import '../../public/vendor/icofont/icofont.min.css';
import '../../public/vendor/select2/css/select2.min.css';
import '../../public/vendor/owl-carousel/owl.carousel.css';
import '../../public/vendor/owl-carousel/owl.theme.css';





import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
