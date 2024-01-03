<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    login: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('admin.login'), {
        onFinish: () => form.reset('password'),
        onError:() => alert("Login ou mot de passe incorrect")
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Admin Log in" />
        <v-container>
            <h1 class="text-center">Admin-Login</h1>
            <form  @submit.prevent="submit">
                <v-text-field label="Login" type="text" v-model="form.login" required autofocus/>
                <InputError  :message="form.errors.login" />

                <v-text-field label="Password" id="password" type="password" class="mt-4"
                              v-model="form.password" required />
                <InputError  :message="form.errors.password" />

                <div class="flex items-center justify-end mt-4">
                    <v-btn type="submit" color="primary" class="ms-4" :loading="form.processing" :disabled="form.processing">
                        Log in
                    </v-btn>
                </div>
            </form>
        </v-container>
    </GuestLayout>
</template>
