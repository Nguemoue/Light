<template>
    <v-app>

        <v-app-bar color="yellow" flat elevation="2">
            <v-app-bar-nav-icon @click="navigationOpened=!navigationOpened" icon="mdi-menu" ></v-app-bar-nav-icon>
            <v-app-bar-title>Administration</v-app-bar-title>
            <template v-slot:append>
                <v-btn icon="mdi-dots-vertical"></v-btn>
            </template>
        </v-app-bar>
        <v-navigation-drawer v-model="navigationOpened"  class="bg-deep-purple" temporary>
            <v-list>
                <Link style="all: unset" :href="route('admin.home')">
                    <v-list-item prepend-icon="mdi-home"  :active="route().current('admin.home')" href="#">Manage Home</v-list-item>
                </Link>
            </v-list>
            <v-list>
                <Link style="all: unset" :href="route('admin.dailyBreads.index')">
                    <v-list-item prepend-icon="mdi-book" :active="route().current('admin.dailyBreads.index')" href="#">Manage - Daily Breads</v-list-item>
                </Link>
            </v-list>
            <v-list>
                <Link style="all: unset" :href="route('encounters.index')">
                    <v-list-item prepend-icon="mdi-movie" :active="route().current('encounters.index')" href="#">Encounters</v-list-item>
                </Link>
            </v-list>
            <v-list>
                <Link style="all: unset" :href="route('formations.index')">
                    <v-list-item prepend-icon="mdi-bookmark" :active="route().current('formations.index')" href="#">Formations</v-list-item>
                </Link>
            </v-list>
            <v-list>
                <Link style="all: unset" :href="route('musiques.index')">
                    <v-list-item prepend-icon="mdi-music" :active="route().current('musiques.index')" href="#">Musique</v-list-item>
                </Link>
            </v-list>
        </v-navigation-drawer>
        <v-main>
            <slot/>
        </v-main>

    </v-app>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";
import {ref} from "vue";
const navigationOpened = ref(true)
</script>

<style scoped>

</style>
