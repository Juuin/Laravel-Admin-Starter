<script setup lang="ts">
defineProps<{
    value?: string;
    required?: boolean;
}>();
</script>

<template>
    <label class="form-label">
        <span v-if="value">{{ value }}</span>
        <span v-if="required" class="text-danger"> *</span>
        <span v-else><slot /></span>
    </label>
</template>
