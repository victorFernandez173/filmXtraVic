<script>
import LayoutPrincipal from "../Layouts/LayoutPrincipal.vue";
export default {
    layout: LayoutPrincipal,
}
</script>

<script setup>
import dayjs from "dayjs";
import es from "dayjs/locale/es";
import relativeTime from 'dayjs/plugin/relativeTime';
import { Head } from "@inertiajs/vue3";

defineProps(['obra', 'mediaEvaluaciones']);
dayjs.extend(relativeTime);
dayjs.locale('es');

const media = 0;
</script>

<!--<template>
    <Head>
        <title>{{ obra[0].titulo }}</title>
        <meta name="description" content="Página de bienvenida">
    </Head>
    <div class="w-[66vw] flex flex-col items-center [&>span]:font-bold m-auto">
        <img class="w-[400px]" :src="'../posters/' + obra[0]['poster']['ruta']" :alt="obra[0].poster.alt">
        <p class="underline">
            {{ obra[0]['titulo'] }} ({{obra[0]['titulo_original']}})-{{ obra[0]['fecha'] }}
        </p>
        <p  class="block" >{{ obra[0]['sinopsis'] }}</p>
        <span v-show="obra[0]['directors'][0]">Dirección:</span>
        <p v-for="dir in obra[0]['directors']">
            {{ dir['nombre'] }}
        </p>
        <span>País:</span>
        <p>
            {{ obra[0]['pais'] }}
        </p>
        <span>Productora:</span>
        <p>
            {{ obra[0]['productora'] }}
        </p>
        <span>Duracion:</span>
        <p>
            {{ parseInt(obra[0]['duracion']/60) }}h {{ parseInt(obra[0]['duracion']%60) }}min
        </p>
        <span v-show="obra[0]['actors'][0]">Reparto:</span>
        <p v-for="act in obra[0]['actors']">
            {{ act['nombre'] }}
        </p>
        <span v-show="obra[0]['festivals'][0]">Premios: </span>
        <p v-for="fest in obra[0]['festivals']">
            {{ fest['nombre'] }}({{ fest['edicion'] }})
        </p>
        <span v-show="obra[0]['generos'][0]">Generos: </span>
        <ul>
            <li v-for="gen in obra[0]['generos']">
                {{ gen['genero'] }}
            </li>
        </ul>
        <span>Evaluaciones: </span>
        <ul>
            <li>
                {{ parseFloat(mediaEvaluaciones) }}
            </li>
        </ul>
        <span v-show="obra[0]['criticas'][0]">Criticas: </span>
        <ul>
            <li v-for="cri in obra[0]['criticas']">
                {{ dayjs(cri['modificada']).fromNow() }}-{{ cri['critica'] }}
            </li>
        </ul>
        <span v-show="obra[0]['profesionals'][0]">Criticas profesionales: </span>
        <ul>
            <li v-for="pro in obra[0]['profesionals']">
                {{ pro['contenido'] }}
            </li>
        </ul>
    </div>
</template>-->

<template>


    <div class="container mx-auto">
        <!--3 apartados para poster, datos y valoraciones-->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!--Poster-->
            <div class="flex justify-center bg-gray-100">
                poster
            </div>
            <!--Datos pelicula-->
            <div class="flex justify-center col-span-2 bg-gray-100">
                datos
            </div>
            <!--Valoraciones-->
            <div class="flex justify-center bg-gray-100">
                valoraciones
            </div>
        </div>

        <!--1 apartado para el trailer-->
        <div class="grid grid-cols-1">
            <!--Trailer-->
            <div class="flex justify-center bg-gray-100">
                trailer
            </div>
        </div>
    </div>


</template>
