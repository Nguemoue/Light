<template>
    <v-card >
        <v-img :src="daily.poster_url" width="100%" cover/>
        <v-card-title>
            {{ daily.title }}
        </v-card-title>

        <v-card-subtitle>
            {{daily.description}}
        </v-card-subtitle>

        <v-card-actions>
            <LikeButton :dailyBread="daily"/>
            <v-divider vertical></v-divider>
            <Link :href="route('daily-bread.show',{dailyBread:daily.id})">
                <v-btn  color="orange-lighten-2" variant="text">
                    Explore
                </v-btn>
            </Link>
            <v-spacer></v-spacer>
            <v-btn :icon="show ? 'mdi-chevron-up' : 'mdi-chevron-down'"
                   @click="show = !show"></v-btn>
        </v-card-actions>

        <v-expand-transition>
            <div v-show="show">
                <v-divider></v-divider>
                <v-card-text>
                    {{daily.description}}
                </v-card-text>
            </div>
        </v-expand-transition>
    </v-card>
</template>
<script setup>
import {ref} from "vue";
import {Link} from "@inertiajs/vue3";
import LikeButton from "@/Components/dailyBreads/LikeButton.vue"
    defineProps({daily:Object})
    const show = ref(false)
    function like(){
        alert("hiii");
    }
</script>
