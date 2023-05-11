<!--script independiente sin "setup" para la carga del LayoutPrincipal como layout persistente-->
<script>
import LayoutPrincipal from "../Layouts/LayoutPrincipal.vue";
export default {
    layout: LayoutPrincipal,
}
</script>

<!--script estandar para lo habitual-->
<script setup>
import { Link, Head } from "@inertiajs/vue3";
import Carrusel from "../Components/Carrusel.vue";
import { initFlowbite } from 'flowbite'
import { onMounted } from "vue";

// Para montar componentes Flowbite
onMounted(() => {
    initFlowbite();
})

defineProps(['obras']);
</script>

<template>
    <Head>
        <title>Inicio</title>
        <meta name="description" content="Página de bienvenida">
    </Head>
    <!--  Carrusel   -->
    <Carrusel></Carrusel>

    <!-- Seccion Principal de contenido -->
    <div class="flex w-4/5 m-auto pt-10">
        <!-- Seccion Principal de contenido -->
        <div
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 seccion-peliculas text-center w-full justify-items-center">
            <div id="idObra" class="w-full p-6" v-for="obra in obras" :key="obra['id']">
                <Link :href="route('obra', [obra['titulo'].replaceAll(' ', '_')])">
                    <div id="idTooltip" class="flex justify-center">
                        <h3>{{ obra['titulo'] }}</h3>
                        <h3 class="scroll-left justify-center" id='idTooltipText'>{{ obra['titulo'] }}</h3>
                    </div>
                </Link>
                <Link :href="route('obra', [ obra['titulo'].replaceAll(' ', '_')])">
                    <img id="idImgObra" class="w-full mt-3" :src="'posters/' + obra['poster']['ruta']"
                         :alt="obra['poster']['alt']">
                </Link>
            </div>
        </div>
    </div>
</template>

<style scoped>
/*******Seccion peliculas*******/
#idTooltip {
    position: relative;
    cursor: pointer;
}

#idTooltipText {
    position: absolute;
    top: 0;
    padding: 8px 16px;
    background: #e37f81;
    color: white;
    visibility: hidden;
    opacity: 0;
    transition: opacity 0.5s ease-out;
}

#idTooltip:hover #idTooltipText {
    visibility: visible;
    opacity: 1;
    z-index: 10;
    font-size: 1.3rem;
}

#idTooltip:hover h3 {
    visibility: hidden;
}

#idImgObra:hover {
    border: 10px #e37f81 solid;
}

.seccion-peliculas h3 {
    position: relative;
    color: #e37f81;
    font-size: 1.6rem;
    font-weight: bold;
    text-decoration: underline;
    font-family: 'Oswald', sans-serif;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
}
</style>
