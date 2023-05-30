<!--script independiente sin "setup" para la carga del LayoutPrincipal como layout persistente-->
<script>
import LayoutPrincipal from "../Layouts/LayoutPrincipal.vue";

export default {
    layout: LayoutPrincipal,
}
</script>

<!--script estandar para lo habitual-->
<script setup>
import {Head} from "@inertiajs/vue3";
import Carrusel from "../Components/Carrusel.vue";
import Poster from "../Components/Poster.vue";
import {onMounted} from "vue";
import {initCarousels} from "flowbite";

onMounted(() => {
    initCarousels();
})

defineProps(['obras']);

function ocultar(){

    document.getElementById('bloque').classList.add('hidden');
    document.getElementById('bloque').classList.remove('absolute');
    console.log(document.getElementById('bloque').classList);
}
</script>

<template>
    <Head>
        <title>Inicio</title>
        <meta name="description" content="Página de bienvenida">
    </Head>

    <div
        id="bloque"
        class="left-[10vw] w-[80vw] absolute top-[10vh] bg-white z-50 grid grid-cols-4 border-flamingo border-solid border-[10px]">
        <Poster v-for="obra in obras" :obra="obra" :titulo="`text-base sm:text-2xl hover:text-lg sm:hover:text-xl`"
                :info="true"/>
        <button @click="ocultar" class="m-auto text-center bg-flamingo p-[10px]">Ocultar</button>
    </div>
    <!--  Carrusel   -->
    <Carrusel></Carrusel>

    <!-- Seccion Principal de contenido -->
    <div
        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 seccion-peliculas text-center w-[75vw] m-auto mt-10">
        <!-- Componente poster -->
        <Poster v-for="obra in obras" :obra="obra" :titulo="`text-base sm:text-2xl hover:text-lg sm:hover:text-xl`"
                :info="true"/>
    </div>
</template>
