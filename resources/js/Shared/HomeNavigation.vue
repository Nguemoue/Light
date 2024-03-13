<script setup>
import {ref} from "vue";
import {Link} from "@inertiajs/vue3";
const navigationOpened  = ref(false)
</script>
<template>
    <v-app-bar flat elevation="2">
        <v-app-bar-nav-icon @click="navigationOpened=!navigationOpened" icon="mdi-menu" ></v-app-bar-nav-icon>
        <v-spacer></v-spacer>
        <v-app-bar-title>LIGHT NATION</v-app-bar-title>
        <v-spacer></v-spacer>
        <v-img src="light-sm.jpg"/>
        <v-menu>
            <template v-slot:activator="{ props }">
                <v-btn icon="mdi-account"  rounded="1"   v-bind="props">
                </v-btn>
            </template>
            <v-list>
                <v-list-item>
                    Liste de tes comptes
                </v-list-item>
            </v-list>
        </v-menu>
    </v-app-bar>
    <v-navigation-drawer v-model="navigationOpened"  class="bg-deep-purple" width="220">
        <v-list>
            <Link style="all: unset" :href="route('home')">
                <v-list-item prepend-icon="mdi-home"  :active="route().current('home')" href="#">Home</v-list-item>
            </Link>

            <Link style="all: unset" :href="route('daily-bread.index')">
                <v-list-item prepend-icon="mdi-book" :active="route().current('daily-bread.index')" href="#">Daily Breads</v-list-item>
            </Link>
            <Link style="all: unset" :href="route('encounters.index')">
                <v-list-item prepend-icon="mdi-movie" :active="route().current('encounters.index')" href="#">Encounters</v-list-item>
            </Link>
            <Link style="all: unset" :href="route('formations.index')">
                <v-list-item prepend-icon="mdi-bookmark" :active="route().current('formations.index')" href="#">Formations</v-list-item>
            </Link>
            <Link style="all: unset" :href="route('musiques.index')">
                <v-list-item prepend-icon="mdi-music" :active="route().current('musiques.index')" href="#">Musique</v-list-item>
            </Link>
            <Link style="all: unset" :href="route('admin.home')">
                <v-list-item prepend-icon="mdi-account-tie" :active="route().current('admin.*')" href="#">Administration</v-list-item>
            </Link>
        </v-list>
    </v-navigation-drawer>
</template>
