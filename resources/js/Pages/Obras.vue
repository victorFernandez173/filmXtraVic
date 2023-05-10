<!--script independiente sin "setup" para la carga del LayoutPrincipal como layout persistente-->
<script>
import LayoutPrincipal from "../Layouts/LayoutPrincipal.vue";

export default {
    layout: LayoutPrincipal,
}
</script>

<!--script estandar para lo habitual-->
<script setup>
import {Link, Head} from "@inertiajs/vue3";
import BarraLateral from "../Components/BarraLateral.vue";

defineProps(['obras']);
</script>

<template>
    <Head>
        <title>Filtrar películas</title>
        <meta name="filter" content="Página de filtrar">
    </Head>

    <div class="flex">
        <!-- Barra lateral -->
        <BarraLateral/>
        <!-- Seccion Principal de contenido -->

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 seccion-peliculas text-center w-full justify-items-center">
            <div id="idObra" class="w-full p-6" v-for="obra in obras" :key="obra['id']">
                <Link :href="route('obra', [obra['titulo'].replaceAll(' ', '_')])">
                    <div id="idTooltip">
                        <h3 class="w-full">{{ obra['titulo'] }}</h3>
                        <h3 class="w-full" id='idTooltipText'>{{ obra['titulo'] }}</h3>
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
/*************************** Seccion peliculas ******************************/
#idTooltip {
    position: relative;
    cursor: pointer;
}

#idTooltipText {
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    white-space: nowrap;
    padding: 8px 8px;
    background: #e37f81;
    color: white;
    visibility: hidden;
    opacity: 0;
    transition: opacity 0.9s ease-out;
}

#idTooltip:hover #idTooltipText {
    visibility: visible;
    opacity: 1;
    z-index: 10;
    font-size: 1.1rem;
    width: 100%;
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
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
}
</style>
