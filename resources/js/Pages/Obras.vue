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

defineProps(['obras']);
</script>

<template>
    <Head>
        <title>Filtrar películas</title>
        <meta name="filter" content="Página de filtrar">
    </Head>

    <!-- Seccion Principal de contenido -->
    <div class="contenedor-principal flex w-full justify-center">

        <!-- Seccion columna izquierda -->
        <section class="seccion-columna pl-5">
            <!-- Genero -->
            <h5 class="py-4 font-bold underline">Por género:</h5>
            <ul>
                <li>
                    <a href="">Acción</a>
                </li>
                <li>
                    <a href="">Animación</a>
                </li>
                <li>
                    <a href="">Aventuras</a>
                </li>
                <li>
                    <a href="">Bibliográfico</a>
                </li>
                <li>
                    <a href="">Bélico</a>
                </li>
                <li>
                    <a href="">Ciencia ficción</a>
                </li>
                <li>
                    <a href="">Cine Mudo</a>
                </li>
                <li>
                    <a href="">Cine Negro</a>
                </li>
                <li>
                    <a href="">Comedia</a>
                </li>
                <li>
                    <a href="">Cortometraje</a>
                </li>
                <li>
                    <a href="">Crimen</a>
                </li>
                <li>
                    <a href="">Deportiva</a>
                </li>
                <li>
                    <a href="">Documental</a>
                </li>
                <li>
                    <a href="">Drama</a>
                </li>
                <li>
                    <a href="">Erótico</a>
                </li>
                <li>
                    <a href="">Experimental</a>
                </li>
                <li>
                    <a href="">Fantástico</a>
                </li>
                <li>
                    <a href="">Histórica</a>
                </li>
                <li>
                    <a href="">Infantil</a>
                </li>
                <li>
                    <a href="">Intriga</a>
                </li>
                <li>
                    <a href="">Musical</a>
                </li>
                <li>
                    <a href="">Policiaca</a>
                </li>
                <li>
                    <a href="">Propagandístico</a>
                </li>
                <li>
                    <a href="">Película de culto</a>
                </li>
                <li>
                    <a href="">Religiosa</a>
                </li>
                <li>
                    <a href="">Road Movie</a>
                </li>
                <li>
                    <a href="">Romance</a>
                </li>
                <li>
                    <a href="">Serie B</a>
                </li>
                <li>
                    <a href="">Serie de TV</a>
                </li>
                <li>
                    <a href="">Terror</a>
                </li>
                <li>
                    <a href="">Thriller</a>
                </li>
                <li>
                    <a href="">Western</a>
                </li>
            </ul>

            <!-- Decada -->
            <h5 class="py-4 font-bold underline">Por década:</h5>
            <ul>
                <li>
                    <a href="">2020s</a>
                </li>
                <li>
                    <a href="">2010s</a>
                </li>
                <li>
                    <a href="">2000s</a>
                </li>
                <li>
                    <a href="">90s</a>
                </li>
                <li>
                    <a href="">80s</a>
                </li>
                <li>
                    <a href="">70s</a>
                </li>
                <li>
                    <a href="">60s</a>
                </li>
                <li>
                    <a href="">50s</a>
                </li>
                <li>
                    <a href="">40s</a>
                </li>
                <li>
                    <a href="">30s</a>
                </li>
                <li>
                    <a href="">20s</a>
                </li>
            </ul>

            <!-- Pais -->
            <h5 class="py-4 font-bold underline">Por país:</h5>
            <ul>
                <li>
                    <a href="">Alemania</a>
                </li>
                <li>
                    <a href="">Andorra</a>
                </li>
                <li>
                    <a href="">Argentina</a>
                </li>
                <li>
                    <a href="">Australia</a>
                </li>
                <li>
                    <a href="">Austria</a>
                </li>
                <li>
                    <a href="">Bélgica</a>
                </li>
                <li>
                    <a href="">Brasil</a>
                </li>
                <li>
                    <a href="">Canadá</a>
                </li>
                <li>
                    <a href="">China</a>
                </li>
                <li>
                    <a href="">Colmbia</a>
                </li>
                <li>
                    <a href="">Dinamarca</a>
                </li>
                <li>
                    <a href="">España</a>
                </li>
                <li>
                    <a href="">Estados Unidos de América</a>
                </li>
                <li>
                    <a href="">Estonia</a>
                </li>
                <li>
                    <a href="">Federación de Rusia</a>
                </li>
                <li>
                    <a href="">Finlandia</a>
                </li>
                <li>
                    <a href="">Francia</a>
                </li>
                <li>
                    <a href="">Hungría</a>
                </li>
                <li>
                    <a href="">Irlanda</a>
                </li>
                <li>
                    <a href="">Islandia</a>
                </li>
                <li>
                    <a href="">Italia</a>
                </li>
                <li>
                    <a href="">Japón</a>
                </li>
                <li>
                    <a href="">Noruega</a>
                </li>
                <li>
                    <a href="">Países Bajos</a>
                </li>
                <li>
                    <a href="">Polonia</a>
                </li>
                <li>
                    <a href="">Portugal</a>
                </li>
                <li>
                    <a href="">Reino Unido</a>
                </li>
                <li>
                    <a href="">Rumania</a>
                </li>
                <li>
                    <a href="">Ucrania</a>
                </li>
            </ul>
        </section>

        <!-- Seccion Principal de contenido -->
        <div class="container mx-auto contenedor-principal justify-center">

            <!-- Filas de peliculas -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 seccion-peliculas text-center items-center justify-center" v-for="n in 4">
                <div v-for="m in 4">

                    <Link :href="route('obra', [$page['props']['obras'][n*4-m]['titulo'].replaceAll(' ', '_')])">
                        <div id="idTooltip">
                            <h3>{{ $page['props']['obras'][n*4-m]['titulo'] }}</h3>
                            <h3 id='idTooltipText'>{{ $page['props']['obras'][n*4-m]['titulo'] }}</h3>
                        </div>


                    </Link>
                    <Link :href="route('obra', [$page['props']['obras'][n*4-m]['titulo'].replaceAll(' ', '_')])">
                        <img :src="'posters/' + $page['props']['obras'][n*4-m]['poster']['ruta']" :alt="$page['props']['obras'][n*4-m]['poster']['alt']">
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
/****************************************** Seccion columna ******************************************/
.seccion-columna {
    background-color: #e37f81;
    width: 10%;
}

.seccion-columna a:hover {
    color: white;
}

/*************************** Seccion peliculas ******************************/
.contenedor-peliculas {
    width: 90%;
}

.contenedor-peliculas h2 {
    color: #a33f41;
    font-size: 2.5rem;
}

.seccion-peliculas img {
    width: 23rem;
    padding: 2rem 2rem;
}

.seccion-peliculas h3 {
    height: 5rem;
    color: #e37f81;
    font-size: 1.7rem;
    font-weight: bold;
    text-decoration: underline;
    font-family: 'Oswald', sans-serif;

}

/****************************************** RESPONSIVE ******************************************/
/****************************************** Tablet ******************************************/
@media screen and (max-width: 991px) and (min-width: 769px) {
    /****************************************** Seccion columna ******************************************/
    .seccion-columna {
        width: 20%;
    }

    /*************************** Seccion peliculas ******************************/
    .contenedor-peliculas {
        width: 80%;
    }
}

/****************************************** Movil ******************************************/
@media screen and (max-width: 768px) {
    /******* Seccion columna *******/
    .seccion-columna {
        width: 30%;
    }

    /******* Seccion peliculas *******/
    img, svg, video, canvas, audio, iframe, embed, object {
        display: inline-block;
        vertical-align: middle;
    }

    .contenedor-peliculas {
        width: 70%;
    }

    .contenedor-peliculas h2 {
        padding-right: 35px;
        padding-left: 35px;

    }

    .seccion-peliculas {
        display: inline-block;
    }
}
</style>
