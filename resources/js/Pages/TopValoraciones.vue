<!--script independiente sin "setup" para la carga del LayoutPrincipal como layout persistente-->
<script>
import LayoutPrincipal from "../Layouts/LayoutPrincipal.vue";

export default {
    layout: LayoutPrincipal,
}
</script>

<!--script estándar-->
<script setup>
import { Head } from "@inertiajs/vue3";
import Paginacion from "../Components/Paginacion.vue";
import Poster from "../Components/Poster.vue";

defineProps(['obras', 'titulo', 'filtros']);
</script>

<template>
    <Head>
        <title>Top Valoraciones</title>
        <meta name="filter" content="Página de top de valoraciones">
    </Head>

    <div class="flex mx-auto w-10/12 max-h-none">

        <div class="flex flex-wrap content-start">
            <!-- Título -->
            <h1 class="w-full mt-2 font-oswald text-center text-5xl h-[10vh] text-flamingo">Top Valoraciones</h1>
            <!-- Seccion Principal de contenido -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 seccion-peliculas text-center w-full justify-items-center px-8 mb-8">
                <!-- Cada poster es un componente -->
                <Poster v-for="obra in obras.data" :key="obra['id']" :obra="obra" :titulo="`text-lg hover:text-sm sm:text-xl sm:hover:text-xl`" :info="false"/>
            </div>
            <!-- Componente para la paginación -->
            <Paginacion class="m-auto" :obras="obras"/>
        </div>
    </div>
</template>
