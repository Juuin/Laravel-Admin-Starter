<template>
    <Card class="mb-3">
        <CardBody>
            <div class="d-flex fw-bold small mb-3">
                <span class="flex-grow-1">{{ title }}</span>
                <CardExpandToggler />
            </div>
            <div class="row align-items-center mb-2">
                <div class="col-12">
                    <h3 class="mb-0">{{ total }}</h3>
                </div>
            </div>
            <div class="small text-inverse text-opacity-50 text-truncate">
                <template v-for="info in infos">
                    <div>{{ info }}</div>
                </template>
            </div>
        </CardBody>
    </Card>
</template>
<script setup lang="ts">
import CardExpandToggler from "@/Components/bootstrap/CardExpandToggler.vue";
import CardBody from "@/Components/bootstrap/CardBody.vue";
import Card from "@/Components/bootstrap/Card.vue";

const props = defineProps<{
    title: string;
    total: string;
    infos : Array;
}>();

</script>
