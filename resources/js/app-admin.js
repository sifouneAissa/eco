// import './bootstrap';

import '../../public/admin/vendor/fontawesome/css/fontawesome.css';
import '../../public/admin/vendor/icons/feather.css';
import '../../public/admin/vendor/bootstrap/css/bootstrap.min.css';
import '../../public/admin/css/styles.css';
import '../../public/admin/vendor/dataTables/dataTables/css/dataTables.bootstrap4.min.css';
import '../../public/admin/vendor/jquery/jquery.min';
import '../../public/admin/vendor/fontawesome/js/all.min.js';
import '../../public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js';
import '../../public/admin/vendor/dataTables/dataTables/js/jquery.dataTables.min.js';
import '../../public/admin/vendor/dataTables/dataTables.buttons.min.js';
import '../../public/admin/vendor/dataTables/jszip.min.js';
import '../../public/admin/vendor/dataTables/pdfmake.min.js'
import '../../public/admin/vendor/dataTables/buttons.html5.min.js';
import '../../public/admin/vendor/dataTables/buttons.print.min.js';
import '../../public/admin/vendor/dataTables/buttons.colVis';
import '../../public/admin/vendor/dataTables/css/buttons.bootstrap.css';
import '../../public/admin/vendor/dataTables/dataTables.rowReorder.min';
import '../../public/admin/vendor/dataTables/dataTables.responsive.min';
// import '../../public/admin/vendor/dataTables/dataTables.bulma.min.js';

// import Multiselect from 'vue-multiselect'

import '../../public/admin/js/scripts.js';
import messages from './translation/translation';


import {createApp, h} from 'vue';
import {createInertiaApp, usePage} from '@inertiajs/inertia-vue3';

import {InertiaProgress} from '@inertiajs/progress';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import {ZiggyVue} from '../../vendor/tightenco/ziggy/dist/vue.m';
import {createI18n} from 'vue-i18n'
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';


window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 12345,
    wsHost: window.location.hostname,
    wsPort: 6001,
    forceTLS: false,
    disableStats: true,
    cluster: 'mt1',
});



const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({

    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/Admin/${name}.vue`, import.meta.glob('./Pages/Admin/**/*.vue')),
    setup({el, app, props, plugin}) {

        const i18n = createI18n({
            locale: props.initialPage.props.locale, // user locale by props
            fallbackLocale: "en", // set fallback locale
            messages: messages, // set locale messages
        });


        let script = document.createElement('script');
        script.src = "/admin/vendor/dataTables/dataTables/js/dataTables.bootstrap.min.js";
        document.body.append(script); // (*)


        script = document.createElement('script');
        script.src = "/admin/vendor/dataTables/vfs_fonts.js";
        document.body.append(script); // (*)


        const myApp = createApp({render: () => h(app, props)})
            .use(plugin)
            .use(i18n)
            .use(ZiggyVue, Ziggy);

        // myApp.component('Multiselect', () => import('vue-multiselect'));

        // declare this can before mount the application
        myApp.config.globalProperties.$can = function (permission) {
            return props.initialPage.props.auth.permissions.some((per) => per === permission);
        };
        // mount the application
        myApp.mount(el);


        return myApp;
    },
});

InertiaProgress.init({color: '#4B5563'});

