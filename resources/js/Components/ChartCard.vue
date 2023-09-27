<template>
    <Card class="mb-3">
        <CardBody>
            <div class="d-flex fw-bold small mb-3">
                <span class="flex-grow-1">{{ title }}</span>
                <CardExpandToggler />
            </div>
            <div class="ratio ratio-21x9 mb-3">
                <apexchart :type="type" width="100%" height="100%" :options="settings" :series="series"></apexchart>
            </div>
        </CardBody>
    </Card>
</template>
<script setup lang="ts">
import Card from "@/Components/bootstrap/Card.vue";
import CardBody from "@/Components/bootstrap/CardBody.vue";
import CardExpandToggler from "@/Components/bootstrap/CardExpandToggler.vue";
import {AppVariables} from "@/stores/app-variable";

const appVariable = AppVariables();

const getApexConfiguration = () => {
    return {
        title: {
            style: {
                fontSize: '14px',
                fontWeight: '600',
                fontFamily: appVariable.font.bodyFontFamily,
                color: appVariable.color.bodyColor
            }
        },
        legend: {
            fontFamily: appVariable.font.bodyFontFamily,
            labels: { colors: appVariable.color.bodyColor }
        },
        tooltip: {
            style: {
                fontSize: '12px',
                fontFamily: appVariable.font.bodyFontFamily
            }
        },
        grid: { borderColor: appVariable.color.borderColor },
        dataLabels: {
            style: {
                fontSize: '12px',
                fontFamily: appVariable.font.bodyFontFamily,
                fontWeight: '600',
                colors: undefined
            }
        },
        xaxis: {
            axisBorder: {
                show: true,
                color: appVariable.color.borderColor,
                height: 1,
                width: '100%',
                offsetX: 0,
                offsetY: -1
            },
            axisTicks: {
                show: true,
                borderType: 'solid',
                color: appVariable.color.borderColor,
                height: 6,
                offsetX: 0,
                offsetY: 0
            },
            labels: {
                style: {
                    colors: appVariable.color.bodyColor,
                    fontSize: '12px',
                    fontFamily: appVariable.font.bodyFontFamily,
                    fontWeight: appVariable.font.bodyFontWeight,
                    cssClass: 'apexcharts-xaxis-label',
                }
            }
        },
        yaxis: {
            labels: {
                style: {
                    colors: appVariable.color.bodyColor,
                    fontSize: '12px',
                    fontFamily: appVariable.font.bodyFontFamily,
                    fontWeight: appVariable.font.bodyFontWeight,
                    cssClass: 'apexcharts-xaxis-label',
                }
            }
        }
    };
}

Apex = getApexConfiguration();

const props = defineProps<{
    type: string;
    title: string;
    options: Object;
    series : Object;
}>();

const settings = {
    ...props.options,
    colors: ['rgba('+ appVariable.color.inverseRgb + ', .25)', appVariable.color.theme],
    fill: { opacity: .65 },
    plotOptions: { bar: { horizontal: false, columnWidth: '55%', endingShape: 'rounded' } },
    dataLabels: { enabled: false },
    grid: { show: true, borderColor: 'rgba('+ appVariable.color.inverseRgb +', .15)' },
}

</script>
