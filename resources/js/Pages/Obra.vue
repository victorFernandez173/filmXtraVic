<script setup>
import Layout from "@/Layouts/Layout.vue";

defineProps(['obra'])
</script>

<template>
    <Layout>
        <div id="idFicha">
            <img :src="'../posters/' + obra.poster.ruta" :alt="obra.poster.alt">
            <p>
                {{ obra.titulo }}
            </p>
            <span v-show="obra.directors[0]">Dirección:</span>
            <p v-for="dir in obra.directors">
                {{ dir.nombre }}
            </p>
            <span v-show="obra.actors[0]">Reparto:</span>
            <p v-for="act in obra.actors">
                {{ act.nombre }}
            </p>
            <span v-show="obra.festivals[0]">Premios: </span>
            <p v-for="fest in obra.festivals">
                {{ fest.nombre }}({{ fest.edicion }})
            </p>
            <span v-show="obra.generos[0]">Generos: </span>
            <p v-for="gen in obra.generos">
               {{ gen.genero }}
            </p>
        </div>
    </Layout>
</template>

<style scoped>
p {
    font-weight: 900;
    font-size: 1.5rem;
}
span{
    font-weight: 900;
    font-size: 2rem;
    color:red;
}

img {
    width: 400px;
}
#idFicha{
    display: flex;
    flex-direction: column;
    align-items: center;
}
</style>
