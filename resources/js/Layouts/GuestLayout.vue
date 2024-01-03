<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <v-app >
        <v-app-bar extension-height="200" extended>
            <v-app-bar-title>
                <Link href="/">
                    <ApplicationLogo />
                </Link>
            </v-app-bar-title>

        </v-app-bar>
        <v-main>
            <v-container>
                <slot />
            </v-container>
        </v-main>
    </v-app>
</template>
