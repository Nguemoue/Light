<template>
    <v-btn
        @click="like()"
        variant="icon"
        icon="mdi-thumb-up"
    ></v-btn>
</template>

<script setup>
import {ref} from "vue";
import {usePage} from "@inertiajs/vue3";
const hasLike = ref(false)
const nbLike = 0;
defineProps({
    dailyBread:{
        type:Object
    }
})
function like(){
    const user = usePage().props.auth.user;
    if (user!=null){

    }
}
</script>
