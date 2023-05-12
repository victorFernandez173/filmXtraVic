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
import TituloH2Dinamico from "../Components/TituloH2Dinamico.vue";
import FormularioFiltrado from "../Components/FormularioFiltrado.vue";
import Paginacion from "../Components/Paginacion.vue";

defineProps(['obras', 'titulo', 'errors']);
</script>

<template>
    <Head>
        <title>Filtrar películas</title>
        <meta name="filter" content="Página de filtrar">
    </Head>

    <div class="flex overflow-x-hidden">
        <!-- Barra lateral -->
        <BarraLateral/>

        <div class="flex flex-wrap content-start">
            <!-- Título dinámico -->
            <TituloH2Dinamico :titulo="titulo" />
            <!-- Formulario de filtrado -->
            <FormularioFiltrado :paises="$page['props']['paises']" :generos="$page['props']['generos']" />
            <!-- Mensaje de error -->
            <div class="w-full text-center mt-1" v-if="errors.genero">{{ errors.genero }}</div>
            <!-- Seccion Principal de contenido -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 seccion-peliculas text-center w-full justify-items-center pl-8 pr-8">
                <div id="idObra" class="w-full p-6" v-for="obra in obras.data" :key="obra['id']">
                    <Link :href="route('obra', [obra['titulo'].replaceAll(' ', '_')])">
                        <div id="idTooltip" class="flex justify-center">
                            <h3>{{ obra['titulo'] }}</h3>
                            <h3 id='idTooltipText'>{{ obra['titulo'] }}</h3>
                        </div>
                    </Link>
                    <Link :href="route('obra', [ obra['titulo'].replaceAll(' ', '_')])">
                        <img id="idImgObra" class="w-full mt-3" :src="'posters/' + obra['poster']['ruta']"
                             :alt="obra['poster']['alt']">
                    </Link>
                </div>
            </div>
            <div v-if="obras['links']"></div>
            <!-- Componente para la paginación -->
            <Paginacion  :obras="obras"/>
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
</style>
