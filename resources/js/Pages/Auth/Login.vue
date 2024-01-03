<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm} from '@inertiajs/vue3';
import {ref} from  "vue";
defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});
const showPassword = ref(true)
const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <v-container>
            <form  @submit.prevent="submit">
                <div>
                    <v-text-field label="Email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        required
                        autofocus
                    />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="mt-4">
                    <v-text-field label="Password" :append-inner-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
                          :type="showPassword ? 'text' : 'password'" v-model="form.password"
                            required @click:appendInner="showPassword = !showPassword"
                    />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="block mt-4">
                    <label class="flex items-center">
                        <v-checkbox label="Remember me" name="remember" :model-value="form.remember"  ></v-checkbox>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-2">&nbsp;
                    <Link
                        v-if="canResetPassword"
                        :href="route('register')"
                    >
                        <v-btn>
                            Inscription
                        </v-btn>
                    </Link>

                    <v-btn type="submit" color="primary" class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Log in
                    </v-btn>
                </div>
            </form>
        </v-container>
    </GuestLayout>
</template>
