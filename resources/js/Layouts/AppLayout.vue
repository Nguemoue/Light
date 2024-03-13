<template>
    <v-app>
        <HomeNavigationDrawer/>
        <v-main>
            <slot/>
        </v-main>
    </v-app>
</template>

<script setup>
import {ref} from "vue";
import HomeNavigationDrawer from "@/Shared/HomeNavigation.vue";
const navigationOpened = ref(false)
</script>

<style scoped>

</style>
