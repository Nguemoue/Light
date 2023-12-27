<template>
    <v-app>
        <v-app-bar>
            <v-app-bar-title>Titre</v-app-bar-title>
        </v-app-bar>
        <v-navigation-drawer>
            <v-app-bar-nav-icon></v-app-bar-nav-icon>
        </v-navigation-drawer>
        <v-main>
            <v-container>
                <form method="post" action="#" id="form" v-show="voir">
                    <div>
                        <v-text-field color="red" label="Votre nom" placeholder="votre nom"/>
                    </div>
                </form>
                <Link>
                    <button @click="showForm" type="button" class="v-btn v-btn--border v-btn--loading">cliquez</button>
                </Link>



            </v-container>
        </v-main>
    </v-app>
</template>
<script setup lang="ts">
import {onMounted} from "vue";
import {Link} from "@inertiajs/vue3";

const name: String = 'name';
const voir: boolean = false;

onMounted(() => {
    console.log(name)
})

function showForm() {
    voir.value = !voir.value;
}
</script>
