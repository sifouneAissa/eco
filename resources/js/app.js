// import './bootstrap';
// import '../css/app.css'

// import '../../public/vendor/icofont/icofont.min.css';

import $ from 'jquery'
// import WOW from 'wowjs'
window.jQuery = $;
window.$ = $;
// window.WOW = WOW.WOW
import messages from './translation/translation';

import {createApp, h} from 'vue';
import {createInertiaApp, usePage} from '@inertiajs/inertia-vue3';

import {InertiaProgress} from '@inertiajs/progress';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import {ZiggyVue} from '../../vendor/tightenco/ziggy/dist/vue.m';
import {createI18n} from 'vue-i18n'
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
import Toast from "vue-toastification";
// Import the CSS or use your own!
import "vue-toastification/dist/index.css";

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
    setup({el, app, props, plugin}) {

        const i18n = createI18n({
            locale: props.initialPage.props.locale, // user locale by props
            fallbackLocale: "en", // set fallback locale
            messages: messages, // set locale messages
        });

        // for lazy importation
        let script1 = document.createElement('script');
        script1.src = "/chat/init.js";
        script1.id = 'init';
        document.body.append(script1); // (*)

        // for lazy importation
        let script2 = document.createElement('script');
        script2.src = "/chat/widget.js";script1.id = 'widget';
        document.body.append(script2); // (*)

        // if(props.initialPage.props.isRtl) {
        //     // for lazy importation
        //     let script1 = document.createElement('script');
        //     script1.src = "/assets/rtl/js/plugins.js";
        //     // script1.defer = true;
        //     script1.async = false;
        //     script1.id='script1';
        //     document.body.append(script1); // (*)
        //
        //     // for lazy importation
        //     let script2 = document.createElement('script');
        //     script2.src = "/assets/rtl/js/main.js";
        //     script2.defer = true;
        //     script2.id='script2';
        //     document.body.append(script2); // (*)
        // }
        // else {
        //     // for lazy importation
        //     let script1 = document.createElement('script');
        //     script1.src = "/assets/ltr/js/plugins.js";
        //     // script1.defer = true;
        //     script1.async = false;
        //     script1.id='script1';
        //     document.body.append(script1); // (*)
        //
        //     // for lazy importation
        //     let script2 = document.createElement('script');
        //     script2.src = "/assets/ltr/js/main.js";
        //     script2.defer = true;
        //     script2.id='script2';
        //     document.body.append(script2); // (*)
        // }

        return createApp({render: () => h(app, props)})
            .use(plugin)
            .use(i18n)
            .use(Toast)
            .use(ZiggyVue, Ziggy)
            .mount(el)
            ;
    },
});

InertiaProgress.init({
    // The delay after which the progress bar will
    // appear during navigation, in milliseconds.
    delay: 250,

    // The color of the progress bar.
    color: '#dd3226',

    // Whether to include the default NProgress styles.
    includeCSS: true,

    // Whether the NProgress spinner will be shown.
    showSpinner: false
});


