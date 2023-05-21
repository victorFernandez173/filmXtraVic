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
import {Head} from "@inertiajs/vue3";
import Poster from "../Components/Poster.vue";

const props = defineProps({
    obra: Object,
    mediaEvaluaciones: Number,
    criticas: Object,
    saga: [Object, String],
    secuelaPrecuela: Object,
    profesionales: Object
})

// Funcion para ordenar array por clave interna
const nestedSort = (prop1, prop2 = null, direction = 'asc') => (e1, e2) => {
    const a = prop2 ? e1[prop1][prop2] : e1[prop1],
        b = prop2 ? e2[prop1][prop2] : e2[prop1],
        sortOrder = direction === "asc" ? 1 : -1
    return (a < b) ? -sortOrder : (a > b) ? sortOrder : 0;
}

// Si hay secuelas, se genera un array con el objeto y despues se ordena dicho array
const secuelasOrdenadas = props.secuelaPrecuela != null ? props.secuelaPrecuela.sort(nestedSort("secuela", "orden", "desc")) : null;

// Configuración fechas relativas dayjs
dayjs.extend(relativeTime);
dayjs.locale('es');
</script>

<template>
    <Head>
        <title>{{ obra[0].titulo }}</title>
        <meta name="description" content="Página de bienvenida">
    </Head>
    <div class="container mx-auto mt-10 mb-10">
        <h1 class="text-center font-bold text-flamingo underline text-3xl">{{ obra[0]['titulo'] }}</h1>
        <!--3 apartados para poster, datos y valoraciones-->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mt-10">
            <!--Poster-->
            <div class="flex justify-start flex-col m-auto h-[100%] w-[90%]">
                <img :src="'../posters/' + obra[0]['poster']['ruta']" :alt="obra[0].poster.alt">
                <!--Puntuacion-->
                <div class="flex justify-center mt-2">
                    <div class="flex items-center mt-2 text-yellow-300 m-auto">
                        <svg aria-hidden="true" class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg aria-hidden="true" class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg aria-hidden="true" class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg aria-hidden="true" class="w-7 h-7" fill="grey" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg aria-hidden="true" class="w-7 h-7" fill="grey" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg aria-hidden="true" class="w-7 h-7" fill="grey" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg aria-hidden="true" class="w-7 h-7" fill="grey" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg aria-hidden="true" class="w-7 h-7" fill="grey" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg aria-hidden="true" class="w-7 h-7" fill="grey" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg aria-hidden="true" class="w-7 h-7" fill="grey" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <p class="text-black">{{ mediaEvaluaciones }}/10 ({{ obra[0]['evaluaciones'].length}} votos)</p>
                    </div>
                </div>
            </div>

            <!--Datos pelicula-->
            <div class="flex justify-center mr-10 w-full -ml[150px]">
                <ul>
                    <!--Datos de la pelicula-->
                    <li class="list-disc font-bold underline text-flamingo text-xl">Obra:</li>
                    <ul>
                        <li class="list-disc ml-5"><span class="font-semibold underline text-lg">Título:</span> {{
                                obra[0]['titulo']
                            }} ({{ obra[0]['titulo_original'] }})
                        </li>
                        <li class="list-disc ml-5"><span class="font-semibold underline text-lg">Año:</span>
                            {{ obra[0]['fecha'] }}
                        </li>
                        <li class="list-disc ml-5"><span class="font-semibold underline text-lg">Duración:</span>
                            {{ Math.floor((parseInt(obra[0]['duracion']) / 60)) }}h
                            {{ parseInt(obra[0]['duracion']) % 60 }}min
                        </li>
                        <li class="list-disc ml-5"><span class="font-semibold underline text-lg">País:</span>
                            {{ obra[0]['pais'] }}
                        </li>
                        <li v-if="obra[0]['directors'][0]" class="list-disc ml-5"><span class="font-semibold underline text-lg">Dirección:</span> <span
                            v-for="dir in obra[0]['directors']"> {{ dir['nombre'] }},  </span></li>
                        <li v-if="obra[0]['actors'][0]" class="list-disc ml-5"><span class="font-semibold underline text-lg">Reparto:</span> <span
                            v-for="act in obra[0]['actors']">{{ act['nombre'] }}, </span></li>
                        <li class="list-disc ml-5"><span class="font-semibold underline text-lg">Productora:</span>
                            {{ obra[0]['productora'] }}
                        </li>
                        <li v-if="obra[0]['generos'][0]" class="list-disc ml-5"><span class="font-semibold underline text-lg">Género:</span> <span
                            v-for="gen in obra[0]['generos']"> {{ gen['genero'] }}, </span></li>
                        <li class="list-disc ml-5"><span class="font-semibold underline text-lg">Sinopsis:</span>
                            {{ obra[0]['sinopsis'] }}
                        </li>
                        <li v-if="saga" class="list-disc ml-5"><span
                            class="font-semibold underline text-lg">Saga:</span> {{ saga[0]['nombre'] }}
                        </li>
                        <div class="flex flex-row justify-around flex-wrap text-center">
                            <div v-for="secuela in secuelasOrdenadas"  class="w-[250px]">
                                <span class="-ml-[20px]">
                                {{
                                        obra[0]['secuela']['orden'] === 0 ? 'Inicio saga' : secuela['secuela']['orden'] === 0 ? 'Spin-off' : secuela['secuela']['orden'] > obra[0]['secuela']['orden'] ? 'Secuela' : 'Precuela'
                                    }}
                                </span>
                                <div class="-my-[25px] -ml-[20px]">
                                    <Poster :obra="secuela" :titulo="`text-lg hover:text-md`"/>
                                </div>
                            </div>
                        </div>
                    </ul>
                    <!--Festivales y premios-->
                    <li v-if="obra[0]['festivals'][0]" class="list-disc font-bold underline text-flamingo text-xl mt-2">Galardones:</li>
                    <ul>
                        <li v-for="fest in obra[0]['festivals']" class="list-disc ml-5"><span
                            class="font-semibold underline text-lg">Mejor película:</span> {{
                                fest['nombre']
                            }}({{ fest['edicion'] }})
                        </li>
                    </ul>
                </ul>
            </div>
        </div>

        <!--Contenedor criticas-->
        <div
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mt-10 mb-15 justify-center bg-flamingo text-white rounded lg:divide-x md:divide-x divide-y">
            <!--Criticas-->
            <div class="pl-10">
                <!--Titulo-->
                <li class="list-disc font-bold underline text-black text-xl mt-5">Críticas profesionales:</li>
                <ul>
                    <!--Primera critica profesional-->
                    <li class="list-disc ml-5"><span class="underline font-semibold">El Mundo:</span> Merece la pena
                        (18/05/2023)
                    </li>
                </ul>
                <!--Titulo-->
                <li class="list-disc font-bold underline text-black text-xl mt-3">Críticas de nuestros usuarios:</li>
                <ul>
                    <!--Primera critica-->
                    <li class="list-disc ml-5"><span class="underline font-semibold">Irene:</span> Es mi película
                        favorita (18/05/2023) - Likes: 32
                        <!--Mano abajo-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="red"
                             class="w-5 h-5 ml-5 mr-5 inline-block">
                            <path
                                d="M18.905 12.75a1.25 1.25 0 01-2.5 0v-7.5a1.25 1.25 0 112.5 0v7.5zM8.905 17v1.3c0 .268-.14.526-.395.607A2 2 0 015.905 17c0-.995.182-1.948.514-2.826.204-.54-.166-1.174-.744-1.174h-2.52c-1.242 0-2.26-1.01-2.146-2.247.193-2.08.652-4.082 1.341-5.974C2.752 3.678 3.833 3 5.005 3h3.192a3 3 0 011.342.317l2.733 1.366A3 3 0 0013.613 5h1.292v7h-.963c-.684 0-1.258.482-1.612 1.068a4.012 4.012 0 01-2.165 1.73c-.433.143-.854.386-1.012.814-.16.432-.248.9-.248 1.388z"/>
                        </svg>
                        <!--Mano arriba-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="green"
                             class="w-5 h-5 inline-block">
                            <path
                                d="M1 8.25a1.25 1.25 0 112.5 0v7.5a1.25 1.25 0 11-2.5 0v-7.5zM11 3V1.7c0-.268.14-.526.395-.607A2 2 0 0114 3c0 .995-.182 1.948-.514 2.826-.204.54.166 1.174.744 1.174h2.52c1.243 0 2.261 1.01 2.146 2.247a23.864 23.864 0 01-1.341 5.974C17.153 16.323 16.072 17 14.9 17h-3.192a3 3 0 01-1.341-.317l-2.734-1.366A3 3 0 006.292 15H5V8h.963c.685 0 1.258-.483 1.612-1.068a4.011 4.011 0 012.166-1.73c.432-.143.853-.386 1.011-.814.16-.432.248-.9.248-1.388z"/>
                        </svg>
                    </li>
                    <!--Segunda critica-->
                    <li class="list-disc ml-5"><span class="underline font-semibold">Tomás:</span> Un rollo no la
                        recomiendo (14/05/2023) - Likes: 0
                        <!--Mano abajo-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="red"
                             class="w-5 h-5 ml-5 mr-5 inline-block">
                            <path
                                d="M18.905 12.75a1.25 1.25 0 01-2.5 0v-7.5a1.25 1.25 0 112.5 0v7.5zM8.905 17v1.3c0 .268-.14.526-.395.607A2 2 0 015.905 17c0-.995.182-1.948.514-2.826.204-.54-.166-1.174-.744-1.174h-2.52c-1.242 0-2.26-1.01-2.146-2.247.193-2.08.652-4.082 1.341-5.974C2.752 3.678 3.833 3 5.005 3h3.192a3 3 0 011.342.317l2.733 1.366A3 3 0 0013.613 5h1.292v7h-.963c-.684 0-1.258.482-1.612 1.068a4.012 4.012 0 01-2.165 1.73c-.433.143-.854.386-1.012.814-.16.432-.248.9-.248 1.388z"/>
                        </svg>
                        <!--Mano arriba-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="green"
                             class="w-5 h-5 inline-block">
                            <path
                                d="M1 8.25a1.25 1.25 0 112.5 0v7.5a1.25 1.25 0 11-2.5 0v-7.5zM11 3V1.7c0-.268.14-.526.395-.607A2 2 0 0114 3c0 .995-.182 1.948-.514 2.826-.204.54.166 1.174.744 1.174h2.52c1.243 0 2.261 1.01 2.146 2.247a23.864 23.864 0 01-1.341 5.974C17.153 16.323 16.072 17 14.9 17h-3.192a3 3 0 01-1.341-.317l-2.734-1.366A3 3 0 006.292 15H5V8h.963c.685 0 1.258-.483 1.612-1.068a4.011 4.011 0 012.166-1.73c.432-.143.853-.386 1.011-.814.16-.432.248-.9.248-1.388z"/>
                        </svg>
                    </li>
                    <!--Tercera critica-->
                    <li class="list-disc ml-5"><span class="underline font-semibold">Alejandro:</span> Para pasar la
                        tarde (10/05/2023) - Likes: 2
                        <!--Mano abajo-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="red"
                             class="w-5 h-5 ml-5 mr-5 inline-block">
                            <path
                                d="M18.905 12.75a1.25 1.25 0 01-2.5 0v-7.5a1.25 1.25 0 112.5 0v7.5zM8.905 17v1.3c0 .268-.14.526-.395.607A2 2 0 015.905 17c0-.995.182-1.948.514-2.826.204-.54-.166-1.174-.744-1.174h-2.52c-1.242 0-2.26-1.01-2.146-2.247.193-2.08.652-4.082 1.341-5.974C2.752 3.678 3.833 3 5.005 3h3.192a3 3 0 011.342.317l2.733 1.366A3 3 0 0013.613 5h1.292v7h-.963c-.684 0-1.258.482-1.612 1.068a4.012 4.012 0 01-2.165 1.73c-.433.143-.854.386-1.012.814-.16.432-.248.9-.248 1.388z"/>
                        </svg>
                        <!--Mano arriba-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="green"
                             class="w-5 h-5 inline-block">
                            <path
                                d="M1 8.25a1.25 1.25 0 112.5 0v7.5a1.25 1.25 0 11-2.5 0v-7.5zM11 3V1.7c0-.268.14-.526.395-.607A2 2 0 0114 3c0 .995-.182 1.948-.514 2.826-.204.54.166 1.174.744 1.174h2.52c1.243 0 2.261 1.01 2.146 2.247a23.864 23.864 0 01-1.341 5.974C17.153 16.323 16.072 17 14.9 17h-3.192a3 3 0 01-1.341-.317l-2.734-1.366A3 3 0 006.292 15H5V8h.963c.685 0 1.258-.483 1.612-1.068a4.011 4.011 0 012.166-1.73c.432-.143.853-.386 1.011-.814.16-.432.248-.9.248-1.388z"/>
                        </svg>
                    </li>
                    <!--Cuarta critica-->
                    <li class="list-disc ml-5"><span class="underline font-semibold">Leire:</span> Entretenida
                        (21/05/2023) - Likes: 5
                        <!--Mano abajo-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="red"
                             class="w-5 h-5 ml-5 mr-5 inline-block">
                            <path
                                d="M18.905 12.75a1.25 1.25 0 01-2.5 0v-7.5a1.25 1.25 0 112.5 0v7.5zM8.905 17v1.3c0 .268-.14.526-.395.607A2 2 0 015.905 17c0-.995.182-1.948.514-2.826.204-.54-.166-1.174-.744-1.174h-2.52c-1.242 0-2.26-1.01-2.146-2.247.193-2.08.652-4.082 1.341-5.974C2.752 3.678 3.833 3 5.005 3h3.192a3 3 0 011.342.317l2.733 1.366A3 3 0 0013.613 5h1.292v7h-.963c-.684 0-1.258.482-1.612 1.068a4.012 4.012 0 01-2.165 1.73c-.433.143-.854.386-1.012.814-.16.432-.248.9-.248 1.388z"/>
                        </svg>
                        <!--Mano arriba-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="green"
                             class="w-5 h-5 inline-block">
                            <path
                                d="M1 8.25a1.25 1.25 0 112.5 0v7.5a1.25 1.25 0 11-2.5 0v-7.5zM11 3V1.7c0-.268.14-.526.395-.607A2 2 0 0114 3c0 .995-.182 1.948-.514 2.826-.204.54.166 1.174.744 1.174h2.52c1.243 0 2.261 1.01 2.146 2.247a23.864 23.864 0 01-1.341 5.974C17.153 16.323 16.072 17 14.9 17h-3.192a3 3 0 01-1.341-.317l-2.734-1.366A3 3 0 006.292 15H5V8h.963c.685 0 1.258-.483 1.612-1.068a4.011 4.011 0 012.166-1.73c.432-.143.853-.386 1.011-.814.16-.432.248-.9.248-1.388z"/>
                        </svg>
                    </li>
                </ul>
                <!--Boton para ver mas valoraciones-->
                <button
                    class="mt-5 m-auto text-flamingo bg-white hover:text-black focus:bg-white focus:ring-flamingo focus:text-flamingo focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5">
                    Ver más valoraciones &rarr;
                </button>
            </div>

            <!--Botones para votar y formulario para escribir-->
            <div>
                <!--Titulo-->
                <h3 class="font-bold underline text-black text-xl mt-5 pl-5 text-center">¿Quieres valorar esta
                    película?</h3>
                <!--Formulario para escribir-->
                <form>
                    <div class="w-[70%] m-auto mt-4 mb-4 rounded-lg bg-gray-300">
                        <div class="px-4 py-2 bg-gray-300 rounded-t-lg">
                            <!--Parte de escribir-->
                            <label for="comment" class="sr-only">Tu comentario</label>
                            <textarea id="comment" rows="4"
                                      class="w-full px-0 text-sm text-gray-900 bg-gray-300 border-0 focus:ring-red-400 focus:border-red-400"
                                      placeholder="Escribe tu valoración..." required></textarea>
                            <!--Parte de nota-->
                            <select name="nota"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-base focus:ring-red-400 focus:border-red-400 block w-full p-2.5">
                                <option disabled value="">Nota</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                            </select>
                        </div>
                        <!--Boton enviar valoracion-->
                        <div class="flex items-center justify-between px-3 py-2 border-t">
                            <button type="submit"
                                    class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-flamingo rounded-lg focus:ring-4 focus:ring-flamingo hover:bg-flamingo hover:text-black">
                                Enviar valoración
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <!--1 apartado para el trailer-->
        <div class="grid grid-cols-1 pt-10">
            <!--Trailer-->
            <div class="flex justify-center">
                <iframe width="1300" height="600" src="https://www.youtube.com/embed/NaM7nKvX4Es"
                        title="YouTube video player"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
            </div>
        </div>
    </div>
</template>
