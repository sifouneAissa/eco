// import './bootstrap';
// import '../css/app.css';
// import '../../public/chat/chat.min.css';
import '../../public/vendor/bootstrap/css/bootstrap.min.css';
import '../../public/vendor/fontawesome/css/all.min.css';
import '../../public/vendor/icofont/icofont.min.css';
import '../../public/vendor/select2/css/select2.min.css';
// import '../../public/ltr/css/osahan.css';
import '../../public/vendor/owl-carousel/owl.carousel.css';
import '../../public/vendor/owl-carousel/owl.theme.css';

import '../assets/vendor/jquery/jquery-3.3.1.slim.min';
import '../assets/vendor/bootstrap/js/bootstrap.bundle.min';
import '../assets/vendor/owl-carousel/owl.carousel';
import '../assets/vendor/select2/js/select2.min';
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
        document.body.append(script1); // (*)

        // for lazy importation
        let script2 = document.createElement('script');
        script2.src = "/chat/widget.js";
        document.body.append(script2); // (*)

        // for lazy importation
        // let script3 = document.createElement('script');
        // script3.src = "https://js.stripe.com/v3";
        // document.body.append(script3); // (*)

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
    showSpinner: true
});

