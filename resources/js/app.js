import './bootstrap';
// import '../css/app.css';

import '../../public/vendor/bootstrap/css/bootstrap.min.css';
import '../../public/vendor/fontawesome/css/all.min.css';
import '../../public/vendor/icofont/icofont.min.css';
import '../../public/vendor/select2/css/select2.min.css';
// import '../../public/ltr/css/osahan.css';
import '../../public/vendor/owl-carousel/owl.carousel.css';
import '../../public/vendor/owl-carousel/owl.theme.css';

import  '../assets/vendor/jquery/jquery-3.3.1.slim.min';
import  '../assets/vendor/bootstrap/js/bootstrap.bundle.min';
import '../assets/vendor/owl-carousel/owl.carousel';
import  '../assets/vendor/select2/js/select2.min';

// import scriptrtl from '../assets/ltr/js/custom';




// 'resources/assets/vendor/jquery/jquery-3.3.1.slim.min.js'
//     ,'resources/assets/vendor/bootstrap/js/bootstrap.bundle.min.js'
//     ,'resources/assets/vendor/owl-carousel/owl.carousel.js'
//     ,'resources/assets/vendor/select2/js/select2.min.js'
//     ,'resources/assets/ltr/js/custom.js'

import messages from './translation/translation';





import { createApp, h } from 'vue';
import { createInertiaApp,usePage } from '@inertiajs/inertia-vue3';

import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import {createI18n}  from 'vue-i18n'
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
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, app, props, plugin }) {

        const i18n = createI18n({
            locale: props.initialPage.props.locale, // user locale by props
            fallbackLocale: "en", // set fallback locale
            messages: messages, // set locale messages
        });
        //
        // if(props.initialPage.props.isRtl) {
        //     // for lazy importation
        //     let script = document.createElement('script');
        //     script.src = "/rtl/js/custom.js";
        //     document.body.append(script); // (*)
        // }
        // else {
        //     let script = document.createElement('script');
        //     script.src = "/ltr/js/custom.js";
        //     document.body.append(script); // (*)
        // }


        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(i18n)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });

    const { value } =  usePage().valueOf().props;

console.log(value)

