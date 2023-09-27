<script setup lang="ts">
import {onMounted} from 'vue';
import SideBarNav from "@/Components/layouts/SideBarNav.vue";

const props = defineProps({
    appOption : {
        type: Object
    },

    appSidebarMenu: {
        type: Array
    }
})

const appSidebarMobileToggled = () => {
    props.appOption.appSidebarMobileToggled = !props.appOption.appSidebarMobileToggled;
}

onMounted(() => {
    let handleSidebarMenuToggle = function (menus) {
        menus.map(function (menu) {
            menu.onclick = function (e) {
                e.preventDefault();
                let target = this.nextElementSibling;

                menus.map(function (m) {
                    let otherTarget = m.nextElementSibling;
                    if (otherTarget !== target) {
                        otherTarget.style.display = 'none';
                        otherTarget.closest('.menu-item').classList.remove('expand');
                    }
                });

                let targetItemElm = target.closest('.menu-item');

                if (targetItemElm.classList.contains('expand') || (targetItemElm.classList.contains('active') && !target.style.display)) {
                    targetItemElm.classList.remove('expand');
                    target.style.display = 'none';
                } else {
                    targetItemElm.classList.add('expand');
                    target.style.display = 'block';
                }
            }
        });
    };

    let menuBaseSelector = '.app-sidebar .menu > .menu-item.has-sub';
    let submenuBaseSelector = ' > .menu-submenu > .menu-item.has-sub';

    // menu
    let menuLinkSelector = menuBaseSelector + ' > .menu-link';
    let menus = [].slice.call(document.querySelectorAll(menuLinkSelector));
    handleSidebarMenuToggle(menus);

    // submenu lvl 1
    let submenuLvl1Selector = menuBaseSelector + submenuBaseSelector;
    let submenusLvl1 = [].slice.call(document.querySelectorAll(submenuLvl1Selector + ' > .menu-link'));
    handleSidebarMenuToggle(submenusLvl1);

    // submenu lvl 2
    let submenuLvl2Selector = menuBaseSelector + submenuBaseSelector + submenuBaseSelector;
    let submenusLvl2 = [].slice.call(document.querySelectorAll(submenuLvl2Selector + ' > .menu-link'));
    handleSidebarMenuToggle(submenusLvl2);
});
</script>
<template>
    <div id="sidebar" class="app-sidebar">
        <perfect-scrollbar class="app-sidebar-content">
            <div class="menu">
                <template v-for="menu in props.appSidebarMenu">
                    <div class="menu-header" v-if="menu.isHeader">{{ menu.text }}</div>
                    <div class="menu-divider" v-else-if="menu.isDivider"></div>
                    <template v-else>
                        <SideBarNav v-if="menu.text" v-bind:menu="menu" />
                    </template>
                </template>
            </div>
        </perfect-scrollbar>
    </div>
    <button class="app-sidebar-mobile-backdrop" v-on:click="appSidebarMobileToggled"></button>
</template>
