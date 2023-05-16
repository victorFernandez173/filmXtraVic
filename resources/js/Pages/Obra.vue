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

defineProps(['obra', 'mediaEvaluaciones', 'criticas', 'saga']);
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
    </div>
</template>-->

<template>


    <div class="container mx-auto">
        <!--3 apartados para poster, datos y valoraciones-->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!--Poster-->
            <div class="flex justify-center m-auto">
                <img src="../../../public/posters/Harry_Potter_and_the_Half-Blood_Prince_(Harry_Potter_6).png" alt="Poster">
            </div>
            <!--Datos pelicula-->
            <div class="flex justify-center col-span-2 ml-10 mr-10 mt-10 mb-10">
                <ul>
                    <!--Datos de la pelicula-->
                    <li class="list-disc font-bold underline text-flamingo text-xl">Obra:</li>
                        <ul>
                            <li class="list-disc ml-5"><span class="font-semibold underline text-lg">Título: </span>Harry Potter y el misterio del príncipe (Harry Potter and the Half Blood Prince)</li>
                            <li class="list-disc ml-5"><span class="font-semibold underline text-lg">Año: </span>2009</li>
                            <li class="list-disc ml-5"><span class="font-semibold underline text-lg">Duración: </span>153 min</li>
                            <li class="list-disc ml-5"><span class="font-semibold underline text-lg">País: </span>Reino Unido</li>
                            <li class="list-disc ml-5"><span class="font-semibold underline text-lg">Director: </span>David Yates</li>
                            <li class="list-disc ml-5"><span class="font-semibold underline text-lg">Reparto: </span>Daniel Radcliffe, Emma Watson y Rupert Grint</li>
                            <li class="list-disc ml-5"><span class="font-semibold underline text-lg">Productora: </span>Warner Bros</li>
                            <li class="list-disc ml-5"><span class="font-semibold underline text-lg">Género: </span>Fantástico, aventuras y drama</li>
                            <li class="list-disc ml-5"><span class="font-semibold underline text-lg">Saga: </span>Harry Potter</li>
                            <li class="list-disc ml-5"><span class="font-semibold underline text-lg">Precuela: </span>Harry Potter y la Orden del Fénix</li>
                            <li class="list-disc ml-5"><span class="font-semibold underline text-lg">Secuela: </span>Harry Potter y las reliquias de la Muerte: parte 1</li>
                            <li class="list-disc ml-5"><span class="font-semibold underline text-lg">Sinopsis: </span>Con dieciséis años cumplidos, Harry inicia el sexto curso en Hogwarts en medio de terribles acontecimientos que asolan Inglaterra. Elegido capitán del equipo de Quidditch, los entrenamientos, los exámenes y las chicas ocupan todo su tiempo, pero la tranquilidad dura poco. A pesar de los férreos controles de seguridad que protegen la escuela, dos alumnos son brutalmente atacados. Dumbledore sabe que se acerca el momento, anunciado por la Profecía, en que Harry y Voldemort se enfrentarán a muerte. El anciano director pedirá ayuda a Harry y juntos emprenderán un peligroso viaje. Para debilitar al enemigo, el joven mago cuenta con la ayuda de un viejo libro de pociones perteneciente a un misterioso personaje que se hace llamar el Príncipe Mestizo.</li>
                        </ul>
                    <!--Festivales y premios-->
                    <li class="list-disc font-bold underline text-flamingo text-xl mt-5">Festival:</li>
                        <ul>
                            <li class="list-disc ml-5"><span class="font-semibold underline text-lg">Premios Oscar: </span>Mejor película</li>
                        </ul>
                </ul>
            </div>
            <!--Valoraciones-->
            <div class="flex justify-center bg-flamingo text-white">
                <div class="flex items-center mb-4 text-yellow-300">
                    <svg aria-hidden="true" class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg aria-hidden="true" class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg aria-hidden="true" class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg aria-hidden="true" class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg aria-hidden="true" class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                </div>
            </div>
        </div>

        <!--1 apartado para el trailer-->
        <div class="grid grid-cols-1 mt-10">
            <!--Trailer-->
            <div class="flex justify-center bg-gray-100">
                <img src="../../../public/trailers/Harry_Potter_and_the_Half-Blood_Prince_(Harry_Potter_6).mp4" alt="Trailer">
            </div>
        </div>
    </div>
</template>
