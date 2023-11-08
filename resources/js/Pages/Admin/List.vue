<template>
    <AdminLayout>
        <div class="d-flex align-items-center mb-3">
            <div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">管理员</a></li>
                    <li class="breadcrumb-item active">列表</li>
                </ul>
                <h1 class="page-header mb-0">管理员列表</h1>
            </div>

            <div class="ms-auto">
                <a href="#" class="btn btn-outline-theme"><i class="fa fa-plus-circle fa-fw me-1"></i> 添加管理员</a>
            </div>
        </div>
        <Card>
            <CardBody>
                <div class="mb-3 d-flex align-items-center">
                    <label class="pe-3">搜索:</label>
                    <input v-model="searchTerm" class="form-control w-200px" placeholder="用户名..." />
                </div>
                <VueTable
                    :is-static-mode="true"
                    :columns="table.columns"
                    :rows="table.rows"
                    :total="table.totalRecordCount"
                    :sortable="table.sortable"
                />
            </CardBody>
        </Card>
    </AdminLayout>
</template>
<script setup lang="ts">
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Card from "@/Components/bootstrap/Card.vue";
import CardBody from "@/Components/bootstrap/CardBody.vue";
import VueTable from "@/Components/VueTable.vue";
import {computed, reactive, ref} from "vue";
import moment from "moment";

const props = defineProps({
    admins: {
        type : Array
    }
});

const data = reactive([]);

const searchTerm = ref('');

props.admins.forEach(admin => {
    data.push({
        id: admin.id,
        username: admin.username,
        created_at: moment(admin.created_at).format('YYYY-M-DD HH:mm:ss'),
        login_time: admin.login_time,
        login_ip: admin.login_ip,
        frozen: admin.frozen ? '被冻结' : '正常'
    });
});

const table = reactive({
    columns: [
        {
            label: '序列',
            field: 'id',
            width: '3%',
            sortable: true,
            isKey: true,
        },
        {
            label: '用户名',
            field: 'username',
            width: '10%',
            sortable: false,
        },
        {
            label: '注册时间',
            field: 'created_at',
            width: '10%',
            sortable: false,
        },
        {
            label: '登录时间',
            field: 'login_time',
            width: '10%',
            sortable: false,
        },
        {
            label: '登录IP',
            field: 'login_ip',
            width: '10%',
            sortable: false,
        },
        {
            label: '冻结状态',
            field: 'frozen',
            width: '10%',
            sortable: false,
        },
        {
            label: '操作',
            field: 'quick',
            width: '10%',
            display: function (row) {
                return (
                    `<a onclick="document.getElementById('selectedRow').value=`+row.id+'" href="#editMemberTimesModal" data-bs-toggle="modal" class="btn btn-primary me-1">修改次数</a>'
                );
            },
        },
    ],
    rows: computed(() => {
        return data.filter(
            (x) => x.username.toLowerCase().includes(searchTerm.value.toLowerCase())
        );
    }),
    totalRecordCount: computed(() => {
        return table.rows.length;
    }),
    sortable: {
        order: 'id',
        sort: 'asc',
    }
});
</script>
