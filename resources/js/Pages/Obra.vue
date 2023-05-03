<script setup>
import Layout from "@/Layouts/Layout.vue";

defineProps(['obra'])
</script>

<template>
    <Layout>
        <div id="idFicha">

            <img :src="'../posters/' + obra[0].poster.ruta" :alt="obra[0].poster.alt">
            <p>
                {{ obra[0].titulo }}
            </p>
            <span v-show="obra[0].directors[0]">Dirección:</span>
            <p v-for="dir in obra[0].directors">
                {{ dir.nombre }}
            </p>
            <span v-show="obra[0].actors[0]">Reparto:</span>
            <p v-for="act in obra[0].actors">
                {{ act.nombre }}
            </p>
            <span v-show="obra[0].festivals[0]">Premios: </span>
            <p v-for="fest in obra[0].festivals">
                {{ fest.nombre }}({{ fest.edicion }})
            </p>
            <span v-show="obra[0].generos[0]">Generos: </span>
            <ul>
                <li v-for="gen in obra[0].generos">
                    {{ gen.genero }}
                </li>
            </ul>
            <span v-show="obra[0].criticas[0]">Criticas: </span>
            <ul>
                <li v-for="cri in obra[0].criticas">
                    {{ cri.critica }}
                </li>
            </ul>
            <span v-show="obra[0].profesionals[0]">Criticas profesionales: </span>
            <ul>
                <li v-for="pro in obra[0].profesionals">
                    {{ pro.contenido }}
                </li>
            </ul>
        </div>
    </Layout>
</template>

<style scoped>
p, li {
    font-weight: 900;
    font-size: 1.5rem;
}
li{
    width: 50vw;
    text-align: center;
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
