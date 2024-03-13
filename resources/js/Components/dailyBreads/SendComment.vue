<script setup>
import {ref} from "vue"
import {router, usePage} from "@inertiajs/vue3";
defineProps({
    dailyBread:{type:Object},
    user: {type:Object}
})
const page = usePage()
const emit = defineEmits(["increment:comment","comment:send"])
const commentText = ref('')
const commentCount = ref(page.props.dailyBread.comments_count)
function storeComment(){
    axios.post(route('api.comment.dailyBread',{dailyBread:page.props.dailyBread.id}),{
        user_id:page.props.auth.user?page.props.auth.user.id:null,
    }).then(function ({data}){
        emit("increment:comment",data.comments_count)
        emit("comment:send",page.props.user,commentText.value)
    })
}
</script>
<template>
    <v-text-field v-model="commentText" class="mx-3" @click:appendInner="storeComment()" @keyup.enter="storeComment()" append-inner-icon="mdi-send" label="comment"/>
</template>
