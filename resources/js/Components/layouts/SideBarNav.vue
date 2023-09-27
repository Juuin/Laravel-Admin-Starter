<script setup lang="ts">
import NavLink from "@/Components/NavLink.vue";

defineProps<{
    menu: {
        label: String,
        icon: String,
        text: String,
        url: String,
        highlight: Boolean,
        children: Object
    };
}>();

const currentRoute = window.location.pathname;

const subIsActive = (urls) => {
    let match = false;

    for (let x = 0; x < urls.length; x++) {

        if (urls[x].url == currentRoute) {
            console.log(urls[x].url);
            match = true;
        }
    }

    return match;
}
</script>
<template>
    <div v-if="menu.children" class="menu-item has-sub" v-bind:class="{ 'active': subIsActive(menu.children) }">
        <a class="menu-link">
			<span class="menu-icon" v-if="menu.icon">
				<i v-bind:class="menu.icon"></i>
				<span class="w-5px h-5px rounded-3 bg-theme position-absolute top-0 end-0 mt-3px me-3px" v-if="menu.highlight"></span>
			</span>
            <span class="menu-text">{{ menu.text }}</span>
            <span class="menu-caret" v-if="menu.children"><b class="caret"></b></span>
        </a>
        <div class="menu-submenu">
            <template v-for="submenu in menu.children">
                <SideBarNav v-bind:menu="submenu" />
            </template>
        </div>
    </div>

    <div v-else href="#">
        <div class="menu-item" v-bind:class="{ 'active': menu.url == currentRoute }">
            <NavLink :href="menu.url" class="menu-link">
				<span class="menu-icon" v-if="menu.icon">
					<i v-bind:class="menu.icon"></i>
					<span class="menu-icon-label" v-if="menu.label">{{ menu.label }}</span>
				</span>
                <span class="menu-text">{{ menu.text }}</span>
            </NavLink>
        </div>
    </div>
</template>
