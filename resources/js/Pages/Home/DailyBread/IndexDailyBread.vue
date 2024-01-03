<script setup>
import AppLayout from "@/Layouts/AppLayout.vue"
import {Head,Link} from "@inertiajs/vue3";
import CardDropdown from "@/Components/dailyBreads/CardDropDown.vue"
import Pagination from "@/Shared/Pagination.vue";
import {ref} from "vue";
defineProps({
    dailyBreads: {
        type:Object
    }
})
const show = ref(false)


</script>
<template>
    <AppLayout>
        <v-container>
            <Head title="Daily Breads"/>
            <h2 class="text-center my-2">Listes des daily breads</h2>
            <v-divider class="mx-3 my-4"/>
            <CardDropdown v-for="daily in dailyBreads" :daily="daily" :key="daily.id" class="my-4"/>
        </v-container>
    </AppLayout>
</template>
