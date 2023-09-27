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
import {ref} from "vue";

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
})

const appSidebarMenu = [
    {
        "text":"第一导航栏",
        "isHeader":true
    },
    {
        "url":"/",
        "icon":"bi bi-cpu",
        "text":"管理台"
    },
    {
        "url":"/nav2",
        "icon":"bi bi-bar-chart",
        "text":"导航2"
    },
    {
        "icon":"bi bi-envelope",
        "text":"导航3",
        "children":[
            {
                "url":"/nav4",
                "text":"导航4"
            },
            {
                "url":"/nav5",
                "text":"导航5"
            }
        ]
    },
    {
        "isDivider":true
    },
    {
        "text":"第二导航栏",
        "isHeader":true
    },
    {
        "url":"/nav6",
        "icon":"bi bi-columns-gap",
        "text":"导航6"
    },
    {
        "icon":"bi bi-bag-check",
        "text":"导航7",
        "children":[
            {
                "url":"/nav8",
                "text":"导航8"
            },
            {
                "url":"/nav9",
                "text":"导航9"
            }
        ]
    }
]

</script>
