<!--script independiente sin "setup" para la carga del LayoutPrincipal como layout persistente-->
<script>
import LayoutPrincipal from "../Layouts/LayoutPrincipal.vue";
export default {
    layout: LayoutPrincipal,
}
</script>

<!--script estandar para lo habitual-->
<script setup>
import { Link } from "@inertiajs/vue3";
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

    <!--  Carrusel   -->
    <Carrusel></Carrusel>

    <!-- Seccion Principal de contenido -->
    <div class="contenedor-principal flex w-full justify-center">
        <section class="seccion-peliculas flex text-center items-center justify-center">
            <!-- Filas de peliculas -->
            <div v-for="n in 4">
                <div v-for="m in 4" class="primera-pelicula">
                    <Link :href="route('obra', [obras[n*4-m].titulo.replaceAll(' ', '_')])">
                        <h3 > {{ obras[n*4-m].titulo }}</h3>
                    </Link>
                    <Link  :href="route('obra', [obras[n*4-m].titulo.replaceAll(' ', '_')])">
                        <img class="sm:w-18" :src="'posters/' + obras[n*4-m].poster.ruta" :alt="obras[n*4-m].poster.alt">
                    </Link>
                </div>
            </div>
        </section>
    </div>


</template>

<style>
/*************************** Seccion peliculas ******************************/
.seccion-peliculas {
    width: 90%;
}

.seccion-peliculas img {
    width: 23rem;
    padding: 2rem;
}

.seccion-peliculas h3 {
    width: 23rem;
    height: 5rem;
    color: #e37f81;
    font-size: 1.7rem;
    font-weight: bold;
    text-decoration: underline;
    padding-top: 2rem;
    font-family: 'Oswald', sans-serif;
}

/****************************************** Tablet ******************************************/
@media screen and (max-width: 991px) and (min-width: 769px) {

    /******* Seccion peliculas *******/
    .seccion-peliculas {
        align-items: normal;
    }
}

/****************************************** Movil ******************************************/
@media screen and (max-width: 768px) {

    /******* Seccion peliculas *******/
    .seccion-peliculas {
        display: inline-block;
        width: 60%;
    }
}
</style>
