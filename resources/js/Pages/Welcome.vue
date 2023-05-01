<script setup>
import Layout from "@/Layouts/Layout.vue";

defineProps(['obras'])
</script>


<template>
    <Layout>

        <div id="idPosters"
        >
            <div v-for="obra in obras" :key="obra.id"
            >
                <img :src="'posters/' + obra.poster.ruta" :alt="obra.poster.alt">
                <div id="idTitulos">
                    <a :href="obra/obra.id">{{obra.titulo}}</a>
                </div>
            </div>
        </div>
    </Layout>
</template>


<style>
#idPosters {
    display: flex;
    flex-wrap: wrap;
}

#idTitulos{
    width: 8vw;
}

img {
    width: 8vw;
}

a {
    width: 8px;
    font-size: .8rem;
}
</style>
