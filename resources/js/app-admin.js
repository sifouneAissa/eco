// import './bootstrap';

import '../../public/admin/vendor/fontawesome/css/fontawesome.css';
import '../../public/admin/vendor/icons/feather.css';
import '../../public/admin/vendor/bootstrap/css/bootstrap.min.css';
import '../../public/admin/css/styles.css';
import '../../public/admin/vendor/dataTables/dataTables/css/dataTables.bootstrap4.min.css';

import '../../public/admin/vendor/jquery/jquery.min';
import '../../public/admin/vendor/fontawesome/js/all.min.js';
import '../../public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js';
// import vue2Dropzone from 'vue2-dropzone'
// import 'vue2-dropzone/dist/vue2Dropzone.min.css'
// import '../../public/admin/vendor/dropzone/dist/dropzone.css'
// import '../../public/admin/vendor/summernote/summernote-bs4.min.css'


// import 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js';

// import '../../public/admin/assets/demo/chart-area-demo.js';
// import '../../public/admin/assets/demo/chart-bar-demo.js';
// import '../../public/admin/assets/demo/chart-pie-demo.js';

// import '../../public/admin/vendor/dataTables/dataTables/js/dataTables.bootstrap.min.js';
import '../../public/admin/vendor/dataTables/dataTables/js/jquery.dataTables.min.js';
// import '../../public/admin/assets/demo/datatables-demo.js';
// import '../../public/admin/vendor/dropzone/dist/min/dropzone.min.js';
// import '../../public/admin/vendor/summernote/summernote-bs4.min.js';
// import 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js';


import '../../public/admin/vendor/dataTables/dataTables.buttons.min.js';
import '../../public/admin/vendor/dataTables/jszip.min.js';
import '../../public/admin/vendor/dataTables/pdfmake.min.js'
import '../../public/admin/vendor/dataTables/buttons.html5.min.js';
import '../../public/admin/vendor/dataTables/buttons.print.min.js';
import '../../public/admin/vendor/dataTables/buttons.colVis';
import '../../public/admin/vendor/dataTables/css/buttons.bootstrap.css';


import Multiselect from 'vue-multiselect'

import '../../public/admin/js/scripts.js';
import messages from './translation/translation';


import {createApp, h} from 'vue';
import {createInertiaApp, usePage} from '@inertiajs/inertia-vue3';

import {InertiaProgress} from '@inertiajs/progress';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import {ZiggyVue} from '../../vendor/tightenco/ziggy/dist/vue.m';
import {createI18n} from 'vue-i18n'

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


        // script = document.createElement('script');
        // script.src = "/admin/vendor/dropzone/dist/min/dropzone.min.js";
        // document.body.append(script); // (*)
        //
        // script = document.createElement('script');
        // script.src = "/admin/vendor/summernote/summernote-bs4.min.js";
        // document.body.append(script); // (*)


        const myApp = createApp({render: () => h(app, props)})
            .use(plugin)
            .use(i18n)
            .use(ZiggyVue, Ziggy);


        myApp.component('Multiselect', () => import('vue-multiselect'));

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

const {value} = usePage().valueOf().props;

