<script setup>
import {ref} from "vue";
import {Link, usePage} from "@inertiajs/vue3";
import SendComment from "@/Components/dailyBreads/SendComment.vue"
import LikeButton from "@/Components/dailyBreads/LikeButton.vue"
import CommentBlock from  "@/Components/dailyBreads/CommentBlock.vue"
import {store} from "@/Store/dailyBread.js";
const props = defineProps({daily:Object})
const show = ref(false)
const showComment = ref(false)
const comments = ref({})
const commentCount = ref(props.daily.comments_count)
function updateComment(count){
    commentCount.value = count
}
function updateSend(user,comment){

}

</script>

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
            <v-divider vertical inset></v-divider>
            <v-btn class="text-none" icon="mdi-comment" @click="showComment=!showComment">
                <v-badge :content="commentCount" color="info">
                    <v-icon>mdi-comment</v-icon>
                </v-badge>
            </v-btn>
            <v-divider vertical  inset color="red"></v-divider>
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
        <v-expand-transition>
            <div v-show="showComment">
                <SendComment @comment:send="updateSend"  v-on:increment:comment="updateComment" :dailyBread="daily" :user="$page.props.auth.user"/>
                <CommentBlock  :comments="daily.comments"/>
            </div>
        </v-expand-transition>
    </v-card>
</template>
