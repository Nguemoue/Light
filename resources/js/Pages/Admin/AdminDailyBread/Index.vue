<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {Head, useForm, usePage} from "@inertiajs/vue3";
import {computed, ref} from "vue";

defineProps({dailyBreads: Array})
const page = usePage()
const user = computed(() => page.props.auth.user)
const dialog = ref(false)
const form = useForm({
  title: '',
  image: '',
  description: '',
});
const submit = () => {
  form.post(route('admin.dailyBreads.store'), {
    onFinish: () => console.log("ok"),
    onError: (error) => Object.values(error).forEach(item => {
      alert(item)
    })
  });
};
</script>

<template>
  <AdminLayout>
    <Head><title>Liste des daily breads</title></Head>
    <v-container fluid>
      <v-card>
        <v-toolbar>
          <v-toolbar-title>Dailybreads</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-btn @click.stop="dialog=!dialog" border="2" color="red" append-icon="mdi-plus">Add new</v-btn>
        </v-toolbar>
        <v-divider></v-divider>
        <v-table>
          <thead>
          <tr>
            <th class="text-left">Name</th>
            <th>Image</th>
            <th class="text-left">Description</th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="item in dailyBreads" :key="item.id">
            <td>{{ item.title }}</td>
            <td><v-img :src="item.poster_url" alt="Image"/></td>
            <td>{{ item.description.substring(0,20)  }}...</td>
          </tr>
          </tbody>
        </v-table>
      </v-card>
    </v-container>
    <v-row justify="center">
      <v-dialog v-model="dialog" fullscreen :scrim="false" transition="dialog-bottom-transition">
        <v-card>
          <v-toolbar dark color="primary">
            <v-btn icon dark @click="dialog = false">
              <v-icon>mdi-close</v-icon>
            </v-btn>
            <v-toolbar-title>Création d'un nouveau daily bread</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
              <v-btn variant="text" @click="dialog = false">Save</v-btn>
            </v-toolbar-items>
          </v-toolbar>
          <v-card-text>
            <form @submit.prevent="submit">
              <v-text-field label="Title" type="text" v-model="form.title" required autofocus/>

              <v-file-input single-line :error="true" accepts="image/*" chips prepend-icon="" show-size
                            prepend-inner-icon="mdi-image" label="Image" type="file" v-model="form.image" required
                            autofocus/>

              <v-textarea label="Description" id="password" class="mt-4"
                          v-model="form.description" required/>

              <div class="flex items-center justify-end mt-4">
                <v-btn type="submit" color="primary" class="ms-4" :loading="form.processing"
                       :disabled="form.processing">
                  Créer
                </v-btn>
              </div>
            </form>
          </v-card-text>
        </v-card>
      </v-dialog>
    </v-row>
  </AdminLayout>
</template>

