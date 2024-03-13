<script setup>
import AppLayout from "@/Layouts/AppLayout.vue"
import {Head, Link} from "@inertiajs/vue3";
import CardDropdown from "@/Components/dailyBreads/CardDropDownDetail.vue"
import {onMounted, ref} from "vue";

defineProps({
    dailyBread: {
        type: Object
    }
})
onMounted(() => {
    Echo.channel("channel").listen(".test", (elt) => {
        console.log("push detected", elt)
    })
})
</script>
<template>
    <AppLayout>
        <v-container>
            <Head :title="`Daily Bread / ${dailyBread.title}`"/>
            <h2 class="text-center my-2">Information sur le daily bread: {{ dailyBread.title }} </h2>
            <v-divider class="mx-3 my-4"/>
            <CardDropdown :daily="dailyBread" class="my-4"/>
        </v-container>
    </AppLayout>
</template>
