<script setup>
    import DailyBreadItem from "@/Components/dailyBreads/CardDropDown.vue"
    import HomeNavigation from "@/Shared/HomeNavigation.vue"
    import {Head,router} from  "@inertiajs/vue3"
    import {computed, ref} from "vue";
    const props = defineProps({
        dailyBreads:Array,
        encounters:Array,
        formations:Array,
        medias:Array
    })
    const items = ref([])
     function  api () {
      return new Promise(resolve => {
        setTimeout(() => {
          resolve(Array.from({ length: 10 }, (k, v) => v + items.at(-1) + 1))
        }, 1000)
      })
    }
     function load ({ done }) {
      // Perform API call
      const res = api()

      items.push(...res)

      done('ok')
    }
</script>

<template>
    <v-app>
        <HomeNavigation />
        <v-bottom-navigation grow>
            <v-btn value="recent" :href="route('daily-bread.index')">
                <v-icon>mdi-book</v-icon>
                <span>DailyBreads</span>
            </v-btn>

            <v-btn value="favorites">
                <v-icon>mdi-movie</v-icon>

                <span>Encounters</span>
            </v-btn>

            <v-btn value="nearby">
                <v-icon>mdi-file</v-icon>
                <span>Formations</span>
            </v-btn>
        </v-bottom-navigation>
        <v-main>
            <v-container>
                <Head :title="'Acceuil'"/>
                <h2 class="h2 text-center">Bienvenue sur Light Nation</h2>
                <v-divider class="mx-3"></v-divider>
              <v-infinite-scrool :height="300" :items="items" :onLoad="load">
                <template v-for="(item, index) in items" :key="index">
                  <div :class="['pa-2', index % 2 === 0 ? 'bg-grey-lighten-2' : '']">
                    Item #{{ item.id }}
                  </div>
                </template>
              </v-infinite-scrool>
            <!--<daily-bread-item class="my-4" :daily="item" v-for="item in medias" :key="item.id"/>-->
            </v-container>
        </v-main>
    </v-app>
</template>


<style scoped>

</style>
