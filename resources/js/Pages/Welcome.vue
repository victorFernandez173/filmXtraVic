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

defineProps(['obras']);
</script>

<template>

    <!--  Carrusel   -->
    <Carrusel></Carrusel>

    <!-- Seccion Principal de contenido -->
    <div class="contenedor-principal flex w-full justify-center">
        <section class="seccion-peliculas flex text-center items-center justify-center">
            <!-- Filas de peliculas -->
            <!--TODO -> ESTE ES EL FAMOSO DOBLE BUCLE ANIDADO QUE GENERA LAS DOCE PELICULAS EN LA PAGINA PRINCIPAL; EL BUCLE EXTERNO ITERA 3 VECES Y EL INTERNO 4 ASÍ SALEN 3 COLUMNAS DE 4 PELICULAS, LO HICE ASÍ PORQUE CREO QUE ELENA GENERABA EL CONTENIDO POR COLUMNAS, PERO NO HABRÍA SIDO MEJOR POR FILAS??? ENTRE OTRAS COSAS PORQUE CREO QUE ASÍ SERÍA MÁS FACIL COLOCAR BIEN LOS TÍTULO NO CREEIS? NO LO SE, PROBAD A HACERLO QUIZAS POR FILAS EN UN .vue NUEVO Y SI SE COLOCA MEJOR TODO SE PUEDE MODIFICAR EL CODIGO-->
            <div v-for="n in 4">
                <div v-for="m in 4" class="primera-pelicula">
                    <Link :href="route('obra', [obras[n*m-1].titulo.replaceAll(' ', '_')])">
                        <h3 > {{ obras[n*m-1].titulo }}</h3>
                    </Link>
                    <Link  :href="route('obra', [obras[n*m-1].titulo.replaceAll(' ', '_')])">
                        <img class="sm:w-18" :src="'posters/' + obras[n*m-1].poster.ruta" :alt="obras[n*m-1].poster.alt">
                    </Link>
                </div>
            </div>
        </section>
    </div>


</template>

<style>
/****************************************** Seccion peliculas ******************************************/
.seccion-peliculas {
    width: 90%;
}

.seccion-peliculas img {
    width: 25rem;
    padding: 2rem;
}

.seccion-peliculas h3 {

    /*TODO -> HE MODIFICADO WIDTH Y HEIGHT DEL H3 PARA REDUCIR LA DESCOLOCACIÓN DE LAS PELICULAS POR CULPA DE TITULOS LARGO, PERO TIENE SU PEGA Y ES QUE LAS QUE TIENEN TITULO CORTO DEJAN UN HUECO ENTRE TITULO Y POSTER*/
    width: 25rem;
    height: 5rem;
    color: #e37f81;
    font-size: 1.7rem;
    font-weight: bold;
    text-decoration: underline;
    padding-top: 2rem;
    font-family: 'Oswald', sans-serif;
}

/*TODO -> MIRAD A VER QUE PASA CON LA SECCIÓN TABLET QUE NO SE ESTÁN APLICANDO LOS ESTILOS??? ME HABRE COMIDO CODIGO O ALGO AL ADAPTAR LA PAGINA???????*/
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
