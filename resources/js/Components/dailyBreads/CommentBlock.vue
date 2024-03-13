<script setup>
import CommentSingle from "@/Components/dailyBreads/CommentSingle.vue"
import {store} from "@/Store/dailyBread";
import {computed} from "vue";
const props = defineProps({
    comments:{type:Array}
})
const commentItems = computed({
    get:()=>props.comments,
    set:(user,comment)=>this.value.push({user,comment})
})

</script>
<template>
    <div>
        <CommentSingle :user="comment.user" v-for="comment in commentItems" :key="comment.id" :comment="comment"/>
    </div>
</template>
