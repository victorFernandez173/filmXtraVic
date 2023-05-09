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
    <div class="container mx-auto contenedor-principal justify-center">
        <!-- Filas de peliculas -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 seccion-peliculas text-center items-center justify-center" v-for="n in 4">
            <div v-for="m in 4">
                <Link :href="route('obra', [$page['props']['obras'][n*4-m]['titulo'].replaceAll(' ', '_')])">

                    <div id="idTooltip">

                        <h3 id='idTooltipText'>{{ $page['props']['obras'][n*4-m]['titulo'] }}</h3>

                        <h3>{{ $page['props']['obras'][n*4-m]['titulo'] }}</h3>

                    </div>


                </Link>
                <Link :href="route('obra', [$page['props']['obras'][n*4-m]['titulo'].replaceAll(' ', '_')])">
                    <img :src="'posters/' + $page['props']['obras'][n*4-m]['poster']['ruta']" :alt="$page['props']['obras'][n*4-m]['poster']['alt']">
                </Link>
            </div>
        </div>
    </div>
</template>

<style>
/*************************** Seccion peliculas ******************************/
#idTooltip{
    position: relative;
    cursor: pointer;
}

#idTooltipText{
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    white-space: nowrap;
    padding: 10px 15px;
    background: gray;
    color: white;
    visibility: hidden;
    opacity: 0;
    transition: opacity  0.5s ease;
}

#idTooltipText::before{
    content: "";
    position: absolute;
    left: 50%;
    top: 100%;
    transform: translateX(-50%);
}

#idH3:hover #idTooltipText{
    top: -130%;
    visibility: visible;
    opacity: 1;
}

.seccion-peliculas img {
    width: 23rem;
    padding: 1rem 2rem 2rem;
}


.seccion-peliculas h3 {
    position: relative;
    color: #e37f81;
    font-size: 1.6rem;
    font-weight: bold;
    text-decoration: underline;
    padding-top: 2rem;
    font-family: 'Oswald', sans-serif;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
    text-align: center;
}

/****************************************** RESPONSIVE ******************************************/
/****************************************** Movil ******************************************/
@media screen and (max-width: 768px) {
    /******* Seccion peliculas *******/
    img, svg, video, canvas, audio, iframe, embed, object {
        display: inline-block;
        vertical-align: middle;
    }
}
</style>
