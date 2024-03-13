<script setup>
import {ref} from "vue";
import {Link} from "@inertiajs/vue3";
import {store} from "@/Store/dailyBread/likeStore.js";
import LikeButton from "@/Components/dailyBreads/LikeButton.vue"
const props = defineProps({daily:Object})
const show = ref(false)
const likesCount = ref(props.daily.likes_count)
const commentsCount = ref(props.daily.comments_count)
function updateLiked(likes){
    likesCount.value = likes
}
</script>

<template>
    <v-card >
        <v-toolbar  flat >
            <v-toolbar-title>{{daily.created_at}}</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn  class="text-none" v-text="`${likesCount} Like(s)`"></v-btn>
            <v-divider vertical inset></v-divider>
        </v-toolbar>
        <v-img :src="daily.poster_url" width="100%" cover/>
        <v-card-title>
            {{ daily.title }}
        </v-card-title>

        <v-card-subtitle>
            {{daily.description}}
        </v-card-subtitle>

        <v-card-actions>
            <LikeButton :active="daily.user_likes_exists" :dailyBread="daily" @daily:liked="updateLiked"/>
            <v-divider vertical></v-divider>
            <v-btn class="text-none" append-icon="mdi-download">Pdf</v-btn>
            <v-divider vertical></v-divider>
            <v-btn class="text-none" append-icon="mdi-download-image">Image</v-btn>
            <v-divider vertical></v-divider>
            <Link :href="route('daily-bread.show',{dailyBread:daily.id})">
                <v-btn  color="orange-lighten-2">
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
