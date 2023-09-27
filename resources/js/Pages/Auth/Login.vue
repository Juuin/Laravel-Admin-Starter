<template>
    <GuestLayout>
        <Head title="登录" />

        <div class="login">
            <div class="login-content">
                <form v-on:submit.prevent="submit()">
                    <h1 class="text-center">登录</h1>
                    <div class="text-inverse text-opacity-50 text-center mb-4">
                        安全起见，请保管好您的账号密码
                    </div>
                    <div class="mb-3">
                        <InputLabel for="username" value="用户名" required />
                        <TextInput
                            id="username"
                            type="text"
                            v-model="form.username"
                            required
                            autocomplete="username"
                        />
                        <InputError class="mt-2" :message="form.errors.username" />
                    </div>
                    <div class="mb-3">
                        <InputLabel for="passowrd" value="密码" required />
                        <TextInput
                            id="password"
                            type="password"
                            v-model="form.password"
                            required
                            autocomplete="current-password"
                        />
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <CheckBox name="remember" v-model:checked="form.remember" />
                            <label class="form-check-label" for="remember">记住我</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-theme btn-lg d-block w-100 fw-500 mb-3">登录</button>
                </form>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup lang="ts">
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head, useForm } from '@inertiajs/vue3';
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import CheckBox from "@/Components/CheckBox.vue";

const form = useForm({
    username: '',
    password: '',
    remember: false
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => {
            form.reset('password');
        }
    });
};
</script>
