<template>
    <div class="dropdown-menu dropdown-menu-end mt-1 w-300px fs-11px pt-1">
        <h6 class="dropdown-header fs-10px mb-1">通知</h6>
        <div class="dropdown-divider mt-1"></div>
        <template v-if="notifications && notifications.length > 0">
            <a href="#" class="d-flex align-items-center py-10px dropdown-item text-wrap fw-semibold" v-for="(notification, index) in notifications" v-bind:key="index">
                <div class="fs-20px">
                    <i v-if="notification.icon" v-bind:class="notification.icon"></i>
                </div>
                <div class="flex-1 flex-wrap ps-3">
                    <div class="mb-1 text-inverse">{{ notification.title }}</div>
                    <div class="small text-inverse text-opacity-50">{{ notification.time }}</div>
                </div>
                <div class="ps-2 fs-16px">
                    <i class="bi bi-chevron-right"></i>
                </div>
            </a>
        </template>
        <template v-else>
            <div class="px-3 pb-3 pt-2">
                无记录
            </div>
        </template>
        <hr class="m-0">
        <div class="py-10px mb-n2 text-center">
            <a href="#" class="text-decoration-none fw-bold">查看全部</a>
        </div>
    </div>
</template>

<script setup lang="ts">

const props = defineProps({
    notifications: {
        type: Object
    }
})

</script>
