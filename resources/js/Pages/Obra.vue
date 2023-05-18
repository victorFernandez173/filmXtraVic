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
import Poster from "../Components/Poster.vue";

defineProps(['obra', 'mediaEvaluaciones', 'criticas', 'saga', 'secuelaPrecuela', 'profesionales']);
dayjs.extend(relativeTime);
dayjs.locale('es');
</script>

<template>
    <Head>
        <title>{{ obra[0].titulo }}</title>
        <meta name="description" content="Página de bienvenida">
    </Head>
    <div class="w-[66vw] flex flex-col items-center [&>span]:font-bold m-auto text-center">
        <img class="w-[400px]" :src="'../posters/' + obra[0]['poster']['ruta']" :alt="obra[0].poster.alt">
        <p class="underline">
            {{ obra[0]['titulo'] }} ({{obra[0]['titulo_original']}})-{{ obra[0]['fecha'] }}
        </p>
        <p  class="block" >{{ obra[0]['sinopsis'] }}</p>
        <span v-if="obra[0]['directors'][0]">Dirección:</span>
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
            {{ Math.floor((parseInt(obra[0]['duracion'])/60)) }}h {{ parseInt(obra[0]['duracion'])%60 }}min
        </p>
        <span v-if="obra[0]['actors'][0]">Reparto:</span>
        <p v-for="act in obra[0]['actors']">
            {{ act['nombre'] }}
        </p>
        <span v-if="obra[0]['festivals'][0]">Premios: </span>
        <p v-for="fest in obra[0]['festivals']">
            {{ fest['nombre'] }}({{ fest['edicion'] }})
        </p>
        <span v-if="obra[0]['generos'][0]">Generos: </span>
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
        <span v-if="criticas[0]">Criticas: </span>
        <ul>
            <li v-for="cri in criticas">
                {{ dayjs(cri['fecha']).fromNow() }}-{{ cri['critica'] }}(Likes:{{ cri['likes'] }})
            </li>
        </ul>
        <span v-if="profesionales">Criticas profesionales: </span>
        <ul>
            <li v-for="pro in profesionales">
                {{ pro['contenido'] }}({{ pro['autor'] }})[{{ pro['medio'] }}-
                <a class="hover:text-red-600 text-flamingo underline" :href="pro['web']" target="_blank">{{ pro['web'] }}</a>]
            </li>
        </ul>
        <span v-if="saga">Saga: {{ saga[0]['nombre'] }}</span>
        <!-- ESTILO NORMAL POR SI PRESCINDIMOS DE USAR COMPONENTE POSTER
        <div class="flex text-center">
            <span v-for="secuela in secuelaPrecuela">
                <span>{{ secuela['secuela']['orden'] > obra[0]['secuela']['orden'] ? 'Secuela' : 'Precuela' }}</span>
                 <Link :href="route('obra', encodeURIComponent(secuela['titulo']))">
                     <img class="border-solid border-3 border-white hover:border-3 hover:border-flamingo hover:border-solid w-[200px] m-auto" :src="'../posters/' + secuela['poster']['ruta']" :alt="secuela.poster.alt">
                 </Link>
            </span>
        </div> -->
        <div class="flex text-center">
            <div v-for="secuela in secuelaPrecuela" class="w-[300px]">
                <span>
                    {{ secuela['secuela']['orden'] > obra[0]['secuela']['orden'] ? 'Secuela' : 'Precuela' }}
                </span>
                 <Poster :obra="secuela" :titulo="`text-lg hover:text-md`" />
            </div>
        </div>
    </div>
</template>
