<template>
    <AdminLayout>
        <div class="row">
            <div class="col-xl-3 col-lg-6" v-for="stat in stats">
                <StatCard :title="stat.title" :total="stat.total" :infos="stat.infos" />
            </div>
            <div class="col-xl-6" v-for="chart in charts">
                <ChartCard :type="chart.type" :title="chart.title" :series="chart.series" :options="chart.options" />
            </div>
            <div class="col-xl-6" v-for="table in tables">
                <TableCard :title="table.title" :data="table.data" />
            </div>
        </div>
    </AdminLayout>
</template>
<script setup lang="ts">
import AdminLayout from "@/Layouts/AdminLayout.vue";
import StatCard from "@/Components/StatCard.vue";
import ChartCard from "@/Components/ChartCard.vue";
import TableCard from "@/Components/TableCard.vue";

const stats = [
    {
        title: '访问人数',
        total: '500人',
        infos: [
            '比上周多了30%'
        ]
    },
    {
        title: '会员人数',
        total: '200人',
        infos: [
            '比上周多了50%'
        ]
    },
    {
        title: '充值人数',
        total: '500人',
        infos: [
            '比上周少了30%'
        ]
    },
    {
        title: '消费人数',
        total: '500人',
        infos: [
            '比上周少了30%'
        ]
    }
]

const charts = [
    {
        type: 'bar',
        title: 'Bar Chart',
        options: {
            xaxis: {
                categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998]
            }
        },
        series: [
            {
                name: 'series-1',
                data: [30, 40, 45, 50, 49, 60, 70, 91]
            },
            {
                name: 'series-2',
                data: [88, 12, 11, 55, 42, 78, 90, 28]
            }
        ]
    },
    {
        type: 'line',
        title: 'Line Chart',
        options: {
            xaxis: {
                categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998]
            }
        },
        series: [
            {
                name: 'series-1',
                data: [30, 40, 45, 50, 49, 60, 70, 91]
            },
            {
                name: 'series-2',
                data: [88, 12, 11, 55, 42, 78, 90, 28]
            }
        ]
    },
    {
        type: 'area',
        title: 'Area Chart',
        options: {
            xaxis: {
                categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998]
            }
        },
        series: [
            {
                name: 'series-1',
                data: [30, 40, 45, 50, 49, 60, 70, 91]
            },
            {
                name: 'series-2',
                data: [88, 12, 11, 55, 42, 78, 90, 28]
            }
        ]
    }
]

const tables = [
    {
        title: '顶级会员',
        data: [
            {
                title: '陈亦明',
                key: '购买次数',
                value: '888'
            },
            {
                title: '陈三',
                key: '消费次数',
                value: '666'
            },
            {
                title: '张三',
                key: '购买次数',
                value: '999'
            },
            {
                title: '李四',
                key: '购买次数',
                value: '111'
            },
            {
                title: '李四',
                key: '购买次数',
                value: '111'
            },
            {
                title: '李四',
                key: '购买次数',
                value: '111'
            },
            {
                title: '李四',
                key: '购买次数',
                value: '111'
            },
            {
                title: '李四',
                key: '购买次数',
                value: '111'
            },
            {
                title: '李四',
                key: '购买次数',
                value: '111'
            },
            {
                title: '李四',
                key: '购买次数',
                value: '111'
            },
            {
                title: '李四',
                key: '购买次数',
                value: '111'
            },
            {
                title: '李四',
                key: '购买次数',
                value: '111'
            },
            {
                title: '李四',
                key: '购买次数',
                value: '111'
            }
        ]
    }
]
</script>
