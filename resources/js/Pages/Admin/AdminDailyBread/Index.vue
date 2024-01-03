<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import CustomFullDialog from "@/Components/dailyBreads/CustomFullDialog.vue";
import {Head, usePage} from "@inertiajs/vue3";
import {computed, onMounted} from "vue";
defineProps({dailyBreads:Array})
const page = usePage()
const user = computed(() => page.props.auth.user)
</script>

<template>
    <AdminLayout>
        <Head title="Liste des daily breads"/>
        <v-container fluid>
            <v-card>
                <v-toolbar>
                    <v-toolbar-title>Dailybreads</v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-btn border="2"  color="red" append-icon="mdi-plus">Add new </v-btn>
                </v-toolbar>
                <v-divider></v-divider>
                <v-table>
                    <thead>
                    <tr>
                        <th class="text-left">Name</th>
                        <th class="text-left">Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in dailyBreads" :key="item.id">
                        <td>{{ item.title }}</td>
                        <td>{{ item.description }}</td>
                    </tr>
                    </tbody>
                </v-table>
            </v-card>
        </v-container>
    </AdminLayout>
</template>

