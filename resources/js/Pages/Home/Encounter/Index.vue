<script setup>
import AppLayout from "@/Layouts/AppLayout.vue"
import {Head,Link} from "@inertiajs/vue3";
defineProps({
    encounters: {
        type:Object
    }
})


</script>
<template>
    <AppLayout>
        <v-container>
            <Head title="Encounter List"/>
            <h2 class="text-center my-2">Listes Encounters</h2>
            <v-divider class="mx-3 my-4"/>
            <v-card v-for="encounter in encounters"  :key="encounter.id" class="my-4">
                <v-card-title>
                    {{ daily.title }}
                </v-card-title>
                <v-card-subtitle>Date: {{encounter.created_at}}</v-card-subtitle>
                <v-card-text>
                    {{daily.description}}
                </v-card-text>
                <v-divider></v-divider>
                <v-card-actions>
                    <Link :href="route('encounter.show',{dailyBread:daily.id})">
                        <v-btn>Details</v-btn>
                    </Link>
                </v-card-actions>

            </v-card>
        </v-container>
    </AppLayout>
</template>
