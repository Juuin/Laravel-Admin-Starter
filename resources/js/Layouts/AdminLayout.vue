<template>
    <div class="app" v-bind:class="{
		'app-header-menu-search-toggled': appOption.appHeaderSearchToggled,
		'app-sidebar-toggled': appOption.appSidebarToggled && !appOption.appSidebarCollapsed,
		'app-sidebar-collapsed': appOption.appSidebarCollapsed,
		'app-sidebar-mobile-toggled': appOption.appSidebarMobileToggled,
		'app-sidebar-mobile-closed': appOption.appSidebarMobileClosed,
		'app-content-full-height': appOption.appContentFullHeight,
		'app-content-full-width': appOption.appSidebarHide,
		'app-without-sidebar': appOption.appSidebarHide,
		'app-without-header': appOption.appHeaderHide,
		'app-boxed-layout': appOption.appBoxedLayout,
		'app-with-top-nav': appOption.appTopNav,
		'app-footer-fixed': appOption.appFooterFixed,
	}">
        <ProgressBar/>
        <Header v-if="!appOption.appHeaderHide" :appOption="appOption"/>
        <SideBar v-if="!appOption.appSidebarHide" :appOption="appOption" :appSidebarMenu="appSidebarMenu"/>
        <div class="app-content" :class="appOption.appContentClass">
            <slot/>
        </div>
    </div>
</template>

<script setup lang="ts">
import {ProgressBar} from "@marcoschulte/vue3-progress";
import Header from "@/Components/layouts/Header.vue";
import SideBar from "@/Components/layouts/SideBar.vue";
import {computed, onBeforeMount, onMounted, onServerPrefetch, ref} from "vue";
import axios from "axios";
import {usePage} from "@inertiajs/vue3";

const appOption = ref({
    appMode: '',
    appThemeClass: '',
    appCoverClass: '',
    appBoxedLayout: false,
    appHeaderHide: false,
    appHeaderSearchToggled: false,
    appSidebarCollapsed: false,
    appSidebarMobileToggled: false,
    appSidebarMobileClosed: false,
    appSidebarHide: false,
    appContentFullHeight: false,
    appContentClass: '',
    appTopNav: false,
    appFooter: false,
    appFooterFixed: false,
    appThemePanelToggled: false,
    appSidebarToggled: false
});

const page = usePage();
const sidemenu = computed(() => page.props.config.sidemenu);
const appSidebarMenu = ref(sidemenu);

// const appSidebarMenu = [
//     {
//         "text":"后台管理",
//         "isHeader":true
//     },
//     {
//         "url":"/",
//         "icon":"bi bi-cpu",
//         "text":"管理台"
//     },
//     {
//         "isDivider":true
//     },
//     {
//         "text":"管理员管理",
//         "isHeader":true
//     },
//     {
//         "url":"/nav6",
//         "icon":"bi bi-columns-gap",
//         "text":"管理员列表"
//     },
//     {
//         "icon":"bi bi-bag-check",
//         "text":"管理员权限",
//         "children":[
//             {
//                 "url":"/nav8",
//                 "text":"导航8"
//             },
//             {
//                 "url":"/nav9",
//                 "text":"导航9"
//             }
//         ]
//     }
// ]

</script>
