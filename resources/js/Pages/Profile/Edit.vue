<template>
    <AdminLayout>
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="row">
                    <div class="col-xl-9">
                        <div id="general" class="mb-5">
                            <h4><i class="far fa-user fa-fw text-theme"></i> 基本信息</h4>
                            <p>查看和更改个人信息</p>
                            <Card>
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item d-flex align-items-center">
                                        <div class="flex-1 text-break">
                                            <div>用户名</div>
                                            <div class="text-inverse text-opacity-50">{{ $page.props.auth.user.username }}</div>
                                        </div>
                                    </div>
                                    <div class="list-group-item d-flex align-items-center">
                                        <div class="flex-1 text-break">
                                            <div>密码</div>
                                        </div>
                                        <div>
                                            <a href="#modal" data-bs-toggle="modal" class="btn btn-outline-default w-100px">修改</a>
                                        </div>
                                    </div>
                                </div>
                            </Card>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">修改个人信息</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form @submit.prevent="updatePassword">
                        <div class="modal-body">
                            <div class="mb-1">
                                <InputLabel for="current_password" class="mb-0" value="当前密码" />
                                <TextInput
                                    id="current_password"
                                    ref="currentPasswordInput"
                                    v-model="form.current_password"
                                    type="password"
                                    autocomplete="current-password"
                                />
                            </div>
                            <div class="mb-1">
                                <InputLabel for="password" class="mb-0" value="新密码" />
                                <TextInput
                                    id="password"
                                    ref="passwordInput"
                                    v-model="form.password"
                                    type="password"
                                    autocomplete="new-password"
                                />
                            </div>
                            <div class="mb-1">
                                <InputLabel for="password_confirmation" class="mb-0" value="确认新密码" />
                                <TextInput
                                    id="password_confirmation"
                                    v-model="form.password_confirmation"
                                    type="password"
                                    autocomplete="new-password"
                                />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-default" data-bs-dismiss="modal">关闭</button>
                            <button type="submit" class="btn btn-outline-theme">保存</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
<script setup lang="ts">
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Card from "@/Components/bootstrap/Card.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import {useForm} from "@inertiajs/vue3";
import {ref} from "vue";
import {ElMessage} from "element-plus";

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('password.update'), {
        preserveScroll: true,
        onSuccess: () => {
            ElMessage({
                type: 'success',
                message: '修改成功'
            });
            form.reset();
        },
        onError: () => {
            if (form.errors.password) {
                ElMessage({
                    type: 'error',
                    message: form.errors.password
                });
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                ElMessage({
                    type: 'error',
                    message: form.errors.current_password
                });
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>
