<template>
    <v-row justify="center">
        <v-dialog
            v-model="dialog"
            fullscreen
            :scrim="false"
            transition="dialog-bottom-transition"
        >
            <template v-slot:activator="{ props }">
                <v-btn
                    color="primary"
                    dark
                    v-bind="props"
                >
                    {{btnText}}
                </v-btn>
            </template>
            <v-card>
                <v-toolbar dark color="primary">
                    <v-btn icon="mdi-close" dark @click="dialog = false"/>
                    <v-toolbar-title>Settings</v-toolbar-title>
                    <v-spacer/>
                    <v-toolbar-items>
                        <v-btn variant="text" @click="dialog = false">Save</v-btn>
                    </v-toolbar-items>
                </v-toolbar>
                <slot/>
            </v-card>
        </v-dialog>
    </v-row>
</template>

<script>
export default {
    props:["btnText"],
    data () {
        return {
            dialog: false,
            notifications: false,
            sound: true,
            widgets: false,
        }
    },
}
</script>
<style scoped>
.dialog-bottom-transition-enter-active,
.dialog-bottom-transition-leave-active {
    transition: transform .2s ease-in-out;
}
</style>
