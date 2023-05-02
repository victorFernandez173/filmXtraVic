<script setup>
import Layout from "@/Layouts/Layout.vue";

defineProps(['obra'])
</script>

<template>
    <Layout>
<!--        <img :src="'posters/' + obra.poster.ruta" :alt="obra.poster.alt">-->
        <p>
            {{ obra }}
        </p>
    </Layout>
</template>

<style scoped>

</style>
