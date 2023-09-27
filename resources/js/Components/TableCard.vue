<template>
    <Card class="mb-3">
        <CardBody>
            <div class="d-flex fw-bold small mb-3">
                <span class="flex-grow-1">{{ title }}</span>
                <CardExpandToggler />
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-borderless mb-2px small text-nowrap">
                    <tbody>
                    <tr v-if="data" v-for="(item, index) in data">
                        <td>
                            <span class="d-flex align-items-center">
                                <i class="bi bi-circle-fill fs-6px me-2" v-bind:class="{ 'text-theme': index % 2 == 0 }"></i>
                                {{ item.title }}
                            </span>
                        </td>
                        <td><small>{{ item.key }}</small></td>
                        <td>
                            <span class="badge d-block rounded-0 pt-5px w-70px"
                                  v-bind:class="{ 'bg-theme text-theme-900': index % 2 == 0, 'bg-inverse bg-opacity-25': index % 2 != 0}"
                                  style="min-height: 18px">
                                {{ item.value }}
                            </span>
                        </td>
                    </tr>
                    <tr v-else >
                        <td colspan="4">
                            无记录
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </CardBody>
    </Card>
</template>
<script setup lang="ts">
import Card from "@/Components/bootstrap/Card.vue";
import CardBody from "@/Components/bootstrap/CardBody.vue";
import CardExpandToggler from "@/Components/bootstrap/CardExpandToggler.vue";

const props = defineProps<{
    title: string;
    data: Object;
}>();

</script>
