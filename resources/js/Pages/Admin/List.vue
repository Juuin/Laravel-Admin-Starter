<template>
    <AdminLayout>
        <div class="d-flex align-items-center mb-3">
            <div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">PAGES</a></li>
                    <li class="breadcrumb-item active">PRODUCTS</li>
                </ul>
                <h1 class="page-header mb-0">Products</h1>
            </div>

            <div class="ms-auto">
                <a href="#" class="btn btn-outline-theme"><i class="fa fa-plus-circle fa-fw me-1"></i> Add Product</a>
            </div>
        </div>
        <div class="mb-sm-4 mb-3 d-sm-flex">
            <div class="mt-sm-0 mt-2"><a href="#" class="text-inverse text-opacity-75 text-decoration-none"><i class="fa fa-download fa-fw me-1 text-theme"></i> Export</a></div>
            <div class="ms-sm-4 mt-sm-0 mt-2"><a href="#" class="text-inverse text-opacity-75 text-decoration-none"><i class="fa fa-upload fa-fw me-1 text-theme"></i> Import</a></div>
            <div class="ms-sm-4 mt-sm-0 mt-2 dropdown-toggle">
                <a href="#" data-bs-toggle="dropdown" class="text-inverse text-opacity-75 text-decoration-none">More Actions</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div role="separator" class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                </div>
            </div>
        </div>
        <Card>
            <ul class="nav nav-tabs nav-tabs-v2 px-4">
                <li class="nav-item me-3"><a href="#allTab" class="nav-link active px-2" data-bs-toggle="tab">All</a></li>
                <li class="nav-item me-3"><a href="#publishedTab" class="nav-link px-2" data-bs-toggle="tab">Published</a></li>
                <li class="nav-item me-3"><a href="#expiredTab" class="nav-link px-2" data-bs-toggle="tab">Expired</a></li>
                <li class="nav-item me-3"><a href="#deletedTab" class="nav-link px-2" data-bs-toggle="tab">Deleted</a></li>
            </ul>
            <div class="tab-content p-4">
                <div class="tab-pane fade show active" id="allTab">
                    <!-- BEGIN input-group -->
                    <div class="input-group mb-4">
                        <button class="btn btn-outline-default dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter products &nbsp;</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                        <div class="flex-fill position-relative">
                            <div class="input-group">
                                <div class="input-group-text position-absolute top-0 bottom-0 bg-none border-0 pe-0" style="z-index: 1020;">
                                    <i class="fa fa-search opacity-5"></i>
                                </div>
                                <input type="text" class="form-control ps-35px" placeholder="Search products" />
                            </div>
                        </div>
                    </div>
                    <!-- END input-group -->

                    <!-- BEGIN table -->
                    <div class="table-responsive">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th class="pt-0 pb-2"></th>
                                <th class="pt-0 pb-2">ID</th>
                                <th class="pt-0 pb-2">用户名</th>
                                <th class="pt-0 pb-2">上次登录</th>
                                <th class="pt-0 pb-2">登录IP</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="admin in props.admins">
                                <td class="w-10px align-middle">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="product1">
                                        <label class="form-check-label" for="product1"></label>
                                    </div>
                                </td>
                                <td class="align-middle">{{ admin.id }}</td>
                                <td class="align-middle">{{ admin.username }}</td>
                                <td class="align-middle">{{ admin.login_time }}</td>
                                <td class="align-middle">{{ admin.login_ip }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- END table -->

                    <div class="d-md-flex align-items-center">
                        <div class="me-md-auto text-md-left text-center mb-2 mb-md-0">
                            Showing 1 to 10 of 57 entries
                        </div>
                        <ul class="pagination mb-0 justify-content-center">
                            <li class="page-item disabled"><a class="page-link">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </Card>
    </AdminLayout>
</template>
<script setup lang="ts">
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Card from "@/Components/bootstrap/Card.vue";

const props = defineProps({
    admins: {
        type : Array
    }
});

console.log(props.admins);
</script>
