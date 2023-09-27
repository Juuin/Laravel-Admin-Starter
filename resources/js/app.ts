import './bootstrap';
import '../css/app.css';
import '../css/styles.scss';
import 'element-plus/dist/index.css';

import { createApp, h, DefineComponent } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

import mitt from 'mitt';
import { Vue3ProgressPlugin } from '@marcoschulte/vue3-progress';
import PerfectScrollbar from 'vue3-perfect-scrollbar';
import 'vue3-perfect-scrollbar/dist/vue3-perfect-scrollbar.css';
import '@marcoschulte/vue3-progress/dist/index.css';
import '@fortawesome/fontawesome-free/scss/fontawesome.scss';
import '@fortawesome/fontawesome-free/scss/regular.scss';
import '@fortawesome/fontawesome-free/scss/solid.scss';
import '@fortawesome/fontawesome-free/scss/brands.scss';
import '@fortawesome/fontawesome-free/scss/v4-shims.scss';
import 'bootstrap-icons/font/bootstrap-icons.css';
import 'bootstrap';

import Card from '@/Components/bootstrap/Card.vue';
import CardBody from '@/Components/bootstrap/CardBody.vue';
import CardHeader from '@/Components/bootstrap/CardHeader.vue';
import CardFooter from '@/Components/bootstrap/CardFooter.vue';
import CardGroup from '@/Components/bootstrap/CardGroup.vue';
import CardImgOverlay from '@/Components/bootstrap/CardImgOverlay.vue';
import CardExpandToggler from '@/Components/bootstrap/CardExpandToggler.vue';

import VueApexCharts from "vue3-apexcharts";

const emitter = mitt();

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob<DefineComponent>('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(Vue3ProgressPlugin)
            .use(PerfectScrollbar)
            .use(VueApexCharts)
            .component('Card', Card)
            .component('CardBody', CardBody)
            .component('CardHeader', CardHeader)
            .component('CardFooter', CardFooter)
            .component('CardGroup', CardGroup)
            .component('CardImgOverlay', CardImgOverlay)
            .component('CardExpandToggler', CardExpandToggler)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
    compatConfig: {
        globalProperties: {
            emitter: emitter
        }
    }
});
