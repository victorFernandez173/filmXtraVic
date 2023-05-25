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
import { Head, Link } from "@inertiajs/vue3";
import Estrellitas from "../Components/Estrellitas.vue";

defineProps(['obra', 'mediaEvaluaciones']);
dayjs.extend(relativeTime);
dayjs.locale('es');

const media = 0;
</script>

<template>
    <Head>
        <title>Valoraciones: {{ obra[0].titulo }}</title>
        <meta name="description" content="Página de bienvenida">
    </Head>
    <div class="container mx-auto mt-10 mb-10">
        <h1 class="text-center font-bold text-flamingo underline text-3xl">Harry Potter y el misterio del príncipe</h1>
        <!--3 apartados para poster, criticas profesionales y criticas de los usuarios-->
        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-5 gap-6 mt-10">
            <!--Poster-->
            <div class="m-auto">
                <!--Poster-->
                <div class="flex justify-start flex-col m-auto h-[100%] w-[90%]">
                    <img :src="'../posters/' + obra[0]['poster']['ruta']" :alt="obra[0].poster.alt">
                    <Estrellitas :mediaEvaluaciones="mediaEvaluaciones" :obra="obra"/>
                    <p class="text-black text-center"> &nbsp;&nbsp; {{ mediaEvaluaciones }}/10
                        ({{ obra[0]['evaluaciones'].length }} votos)</p>
                </div>
                <br>
                <!--Boton para llevarte a la pagina de datos de la película-->
                <div class="flex">
                    <div class="m-auto">
                        <Link :href="route('obra', encodeURIComponent(obra[0]['titulo']))" as="button" class="w-full text-white bg-flamingo hover:text-black focus:bg-flamingo focus:ring-flamingo focus:border-flamingo focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            &larr; Ver datos de la película
                        </Link>
                    </div>
                </div>
            </div>

            <!--Criticas profesionales-->
            <div class="criticas-profesionales ml-10 mr-10 col-span-2">
                <!--Titulo-->
                <ul>
                    <li class="list-disc font-bold underline text-black text-xl mt-5">Críticas profesionales:</li>
                </ul>
                <ul>
                    <!--Primera critica profesional-->
                    <!--Segunda critica profesional-->
                    <!--Tercera critica profesional-->
                    <!--Cuarta critica profesional-->
                    <!--Quinta critica profesional-->
                </ul>
            </div>

            <!--Criticas de los usuarios-->
            <div class="ml-10 mr-10 col-span-2 criticas-usuarios">
                <!--Titulo-->
                <ul>
                    <li class="list-disc font-bold underline text-black text-xl mt-3">Críticas de nuestros usuarios:</li>
                </ul>
                <ul>
                    <!--Primera critica-->
                    <li class="list-disc ml-5"><span class="underline font-semibold">Irene:</span> Es mi película favorita (18/05/2023) - Likes: 32
                        <!--Mano arriba-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="green" class="w-5 h-5 inline-block">
                            <path d="M1 8.25a1.25 1.25 0 112.5 0v7.5a1.25 1.25 0 11-2.5 0v-7.5zM11 3V1.7c0-.268.14-.526.395-.607A2 2 0 0114 3c0 .995-.182 1.948-.514 2.826-.204.54.166 1.174.744 1.174h2.52c1.243 0 2.261 1.01 2.146 2.247a23.864 23.864 0 01-1.341 5.974C17.153 16.323 16.072 17 14.9 17h-3.192a3 3 0 01-1.341-.317l-2.734-1.366A3 3 0 006.292 15H5V8h.963c.685 0 1.258-.483 1.612-1.068a4.011 4.011 0 012.166-1.73c.432-.143.853-.386 1.011-.814.16-.432.248-.9.248-1.388z" />
                        </svg>
                    </li>
                    <!--Segunda critica-->
                    <!--Tercera critica-->
                    <!--Cuarta critica-->
                    <!--Quinta critica-->
                </ul>
            </div>
        </div>
    </div>
</template>

<style>
/******** Ordenador ********/
@media screen and (min-width: 992px) {
    .criticas-profesionales {
        padding-left: 5rem;
    }
}
</style>

