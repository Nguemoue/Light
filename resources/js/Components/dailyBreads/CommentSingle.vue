<script setup>
defineProps({
    comment:{type:Object},
    user:Object
})
</script>
<template>
    <div class="mx-2 d-flex  my-2">
        <v-avatar size="40" color="red" rounded="2" icon="mdi-account"/>
        <h4 class="mx-3 rounded border px-2 py-2  flex-fill">{{comment.comment}}</h4>
    </div>
</template>
