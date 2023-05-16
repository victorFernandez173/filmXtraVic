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

defineProps(['obra', 'mediaEvaluaciones', 'criticas', 'saga', 'secuelaPrecuela']);
dayjs.extend(relativeTime);
dayjs.locale('es');

const media = 0;
</script>

<template>
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
        <span v-show="criticas">Criticas: </span>
        <ul>
            <li v-for="cri in criticas">
                {{ dayjs(cri['fecha']).fromNow() }}-{{ cri['critica'] }}(Likes:{{ cri['likes'] }})
            </li>
        </ul>
        <span v-show="obra[0]['profesionals'][0]">Criticas profesionales: </span>
        <ul>
            <li v-for="pro in obra[0]['profesionals']">
                {{ pro['contenido'] }}
            </li>
        </ul>
        <span v-if="saga">Saga: {{ saga[0]['nombre'] }}</span>
        <div class="flex">
            <span v-if="secuelaPrecuela">Precuela:<img class="w-[100px]" :src="'../posters/' + secuelaPrecuela[0]['poster']['ruta']" :alt="secuelaPrecuela[0].poster.alt"></span>
            <span v-if="secuelaPrecuela">Secuela:<img class="w-[100px]" :src="'../posters/' + secuelaPrecuela[1]['poster']['ruta']" :alt="secuelaPrecuela[1].poster.alt"></span>
        </div>
    </div>
</template>
