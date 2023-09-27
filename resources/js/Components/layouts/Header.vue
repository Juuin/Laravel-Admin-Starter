<template>
    <div id="header" class="app-header">
        <div class="desktop-toggler">
            <button type="button" class="menu-toggler" v-on:click="toggleAppSidebarCollapsed">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
        </div>
        <div class="mobile-toggler">
            <button type="button" class="menu-toggler" v-on:click="toggleAppSidebarMobileToggled">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
        </div>
        <div class="brand">
            <NavLink :href="route('dashboard')" class="brand-logo">
				<span class="brand-img">
					<span class="brand-img-text text-theme">F</span>
				</span>
                <span class="brand-text">Dashboard</span>
            </NavLink>
        </div>

        <div class="menu">
            <div class="menu-item dropdown dropdown-mobile-full">
                <a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link">
                    <div class="menu-icon"><i class="bi bi-bell nav-icon"></i></div>
                    <div class="menu-badge bg-theme" v-if="notifications && notifications.length > 0"></div>
                </a>
                <Notification :notifications="notifications" />
            </div>
            <div class="menu-item dropdown dropdown-mobile-full">
                <a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link">
                    <div class="menu-img online">
                        <img src="../../../css/images/user.png" alt="Profile">
                    </div>
                    <div class="menu-text d-sm-block d-none">{{ $page.props.auth.user.username }}</div>
                </a>
                <div class="dropdown-menu dropdown-menu-end me-lg-3 fs-11px mt-1">
                    <NavLink :href="route('profile.edit')" class="dropdown-item d-flex align-items-center">个人信息 <i class="bi bi-person-circle ms-auto text-theme fs-16px my-n1"></i></NavLink>
                    <div class="dropdown-divider"></div>
                    <NavLink :href="route('logout')" class="dropdown-item d-flex align-items-center">登出 <i class="bi bi-toggle-off ms-auto text-theme fs-16px my-n1"></i></NavLink>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup lang="ts">
import NavLink from "@/Components/NavLink.vue";
import Notification from "@/Components/Notification.vue";

const props = defineProps({
    appOption : {
        type: Object
    }
})

const notifications = [
    {
        icon: 'bi bi-bag text-theme',
        title: '您有一条新消息！',
        time: '刚刚'
    }
];

const toggleAppSidebarCollapsed = () => {
    if (!props.appOption.appSidebarHide) {
        if (props.appOption.appSidebarCollapsed) {
            props.appOption.appSidebarToggled = !props.appOption.appSidebarToggled;
        } else if (props.appOption.appSidebarToggled) {
            props.appOption.appSidebarToggled = !props.appOption.appSidebarToggled;
        }
        props.appOption.appSidebarCollapsed = !props.appOption.appSidebarCollapsed;
    }
}

const toggleAppSidebarMobileToggled = () => {
    if (!(props.appOption.appTopNav && props.appOption.appSidebarHide)) {
        props.appOption.appSidebarMobileToggled = !props.appOption.appSidebarMobileToggled;
    } else {
        slideToggle(document.querySelector('.app-top-nav'));
        window.scrollTo(0, 0);
    }
}
</script>
