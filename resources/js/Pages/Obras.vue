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
import FormularioFiltrado from "../Components/FormularioFiltrado.vue";
import Paginacion from "../Components/Paginacion.vue";

defineProps(['obras', 'titulo', 'filtros']);
</script>

<template>
    <Head>
        <title>Filtrar películas</title>
        <meta name="filter" content="Página de filtrar">
    </Head>

    <div class="flex overflow-x-hidden max-h-none">
        <!-- Barra lateral -->
        <BarraLateral/>

        <div class="flex flex-wrap content-start">
            <!-- Título dinámico -->
            <h1>Top FilmXtra</h1>
            <!-- Formulario de filtrado -->
            <FormularioFiltrado :paises="$page['props']['paises']" :generos="$page['props']['generos']" />
            <!-- Mensaje de filtrado condicionado en funcion de parámetros del formulario -->
            <div v-if="(filtros[0] !== '' || filtros[1] !== '' || filtros[2] !== '' || filtros[3] !== '')" class="w-full text-center mt-1">Filtros:
                <!-- Si hay genero... -->
                {{ filtros[0] === '' ? '' : `género: ${filtros[0]}`  }}
                <!--se añade coma, y así sucesivamente ... -->
                {{(filtros[0] !== '' && filtros[1] !== '') ? ',' : ''}}
                {{ filtros[1] === '' ? '' : ` país: ${filtros[1]}`  }}
                {{(filtros[1] !== '' && filtros[2] !== '') ? ',' : ''}}
                {{ filtros[2] === '' ? '' : ` desde: ${filtros[2]}`  }}
                {{(filtros[3] !== '' && filtros[4] !== '') ? ',' : ''}}
                {{ filtros[3] === '' ? '' : ` hasta: ${filtros[3]}`  }}
            </div>
            <div v-else class="w-full text-center"><p>Sin filtros</p></div>
            <!-- Seccion Principal de contenido -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 seccion-peliculas text-center w-full justify-items-center pl-8 pr-8">
                <div id="idObra" class="w-full p-6" v-for="obra in obras.data" :key="obra['id']">
                    <Link :href="route('obra', encodeURIComponent(obra['titulo']))">
                        <div id="idTooltip" class="flex justify-center">
                            <h3>{{ obra['titulo'] }}</h3>
                            <h3 id='idTooltipText'>{{ obra['titulo'] }}</h3>
                        </div>
                    </Link>
                    <Link :href="route('obra', encodeURIComponent(obra['titulo']))">
                        <img id="idImgObra" class="w-full mt-3" :src="'posters/' + obra['poster']['ruta']"
                             :alt="obra['poster']['alt']">
                    </Link>
                </div>
            </div>
            <!-- Componente para la paginación -->
            <Paginacion class="m-auto" :obras="obras"/>
        </div>
    </div>
</template>

<style scoped>
/* TODO posibilidad de limpiar estilos en la medida de lo posible asignandolos a clases de tailwind */
#idTooltip {
    position: relative;
    cursor: pointer;
}

#idTooltipText {
    position: absolute;
    top: 0;
    padding: 8px 8px;
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
    font-size: 1.1rem;
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

h1 {
    font-family: 'Oswald', sans-serif;
    color: #e37f81;
    height: 10vh;
    font-size: 3rem;
    text-align: center;
    margin: 10px auto;
    width: 100%;
}
</style>
