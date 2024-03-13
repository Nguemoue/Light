<template>
    <v-btn flat ripple
        @click="likeDaily"
        :color="hasLike?'primary':'current'"
        icon="mdi-thumb-up"
    ></v-btn>
</template>

<script setup>
import {computed,ref} from "vue";
import {router, usePage} from "@inertiajs/vue3";

const props = defineProps({
    dailyBread: Object,
    active: {
        type: Boolean,
        default: false
    }
})
const hasLike = ref(props.active)
const nbLike = ref(props.dailyBread.likes_count);
const isConnected = computed({
    get:()=>usePage().props.auth.user!=null,
})
const emit = defineEmits(['daily:updated',"daily:liked"])

function likeDaily() {
    if (!isConnected.value){
        let confirmer = confirm("voulez vous vous connectez pour effectuer cette action ?");
        if (confirmer){
            router.get(route("login"))
        }
        return;
    }

    axios.post(route('api.like.dailyBread',{dailyBread:props.dailyBread}),{
        user_id:usePage().props.auth.user?usePage().props.auth.user.id:null
    }).then(({data})=>{
        hasLike.value = data.hasLike
        nbLike.value = data.likes_count
        emit("daily:liked",nbLike.value)
    }).catch(err=>{
        alert("une erreur a ete detecte")
    })
}
</script>
