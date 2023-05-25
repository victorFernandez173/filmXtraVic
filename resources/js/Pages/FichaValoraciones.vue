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
import {Head, Link} from "@inertiajs/vue3";
import Estrellitas from "../Components/Estrellitas.vue";
import Swal from "sweetalert2";

defineProps(['obra', 'mediaEvaluaciones', 'profesionales', 'criticas']);
dayjs.extend(relativeTime);
dayjs.locale('es');

// Funciones alert
function alertaDarLike() {
    Swal.fire({
        title: 'UPSSS!',
        text: `Registrate/logueate para dar like`,
        imageUrl: '../images/dealWithIt.gif',
        imageWidth: 400,
        imageAlt: 'ocupate de arreglarlo',
        confirmButtonColor: '#e37f81'
    });
}

// Coloreado de los likes
function procesarGustadas($usuario, $gustadas) {
    let objetoGustadas = Object.values($gustadas['gustadaPor']);
    let gustadaPorArray = []
    for (const user_id in objetoGustadas) {
        let valor = Object.values(objetoGustadas[user_id]);
        gustadaPorArray.push(valor[0]);
    }
    return gustadaPorArray.includes($usuario['id']);
}
</script>

<template>
    <Head>
        <title>Valoraciones: {{ obra[0].titulo }}</title>
        <meta name="description" content="Página de bienvenida">
    </Head>
    <div class="container mx-auto mt-10 mb-10">
        <h1 class="text-center font-bold text-flamingo underline text-3xl">{{ obra[0].titulo }}</h1>
        <!--3 apartados para poster, criticas profesionales y criticas de los usuarios-->
        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-4 gap-6 mt-10">
            <!--Poster-->
            <div class="m-auto col-span-1 h-full">
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
                        <Link :href="route('obra', encodeURIComponent(obra[0]['titulo']))" as="button"
                              class="w-full text-white bg-flamingo hover:text-black focus:bg-flamingo focus:ring-flamingo focus:border-flamingo focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            &larr; Ver datos de la película
                        </Link>
                    </div>
                </div>
            </div>

            <!--Criticas profesionales-->
            <div class="criticas-profesionales ml-10 mr-10 col-span-3">
                <!--Titulo-->
                <ul>
                    <li class="list-disc font-bold underline text-black text-xl mt-5">Críticas profesionales:</li>
                </ul>
                <ul v-for="(p, i) in profesionales">
                    <!--Críticas profesionales-->
                    <li v-if="i < 5" class="list-disc ml-5"><span class="font-semibold"><a
                        class="underline hover:text-black" :href="p['web']" target="_blank"
                        href="">{{ p['medio'] }}</a>:</span> {{ p['contenido'] }} <span
                        class="italic">{{ p['autor'] }}</span>
                        <span v-if="p['fecha']"> ({{ dayjs(p['fecha']).fromNow() }})</span>
                    </li>
                </ul>
                <!--Titulo-->
                <ul>
                    <li class="list-disc font-bold underline text-black text-xl mt-3">Críticas de nuestros usuarios:
                    </li>
                </ul>
                <ul v-for="(cri, i) in criticas">
                    <!--Críticas usuarios-->
                    <li v-if="i < 5" class="list-disc ml-5"><span
                        class="underline font-semibold">{{ cri['usuario'][0]['name'] }}</span>: {{ cri['critica'] }}
                        ({{ dayjs(cri['fecha']).fromNow() }}) - Likes: {{ cri['likes'] }}

                        <!--Mano arriba-->
                        <Link v-if="$page.props.auth.user" class="inline-block" as="button" method="post"
                              :href="route('darLike')"
                              :data="{ user_id: $page.props.auth.user['id'], critica_id: cri['id_critica'] }"
                              preserveScroll>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                 :fill=" procesarGustadas($page.props.auth.user, $page.props.criticas[i]) ? 'black' : 'white'"
                                 class="w-5 h-5 inline-block hover:fill-yellow-300">
                                <path
                                    d="M1 8.25a1.25 1.25 0 112.5 0v7.5a1.25 1.25 0 11-2.5 0v-7.5zM11 3V1.7c0-.268.14-.526.395-.607A2 2 0 0114 3c0 .995-.182 1.948-.514 2.826-.204.54.166 1.174.744 1.174h2.52c1.243 0 2.261 1.01 2.146 2.247a23.864 23.864 0 01-1.341 5.974C17.153 16.323 16.072 17 14.9 17h-3.192a3 3 0 01-1.341-.317l-2.734-1.366A3 3 0 006.292 15H5V8h.963c.685 0 1.258-.483 1.612-1.068a4.011 4.011 0 012.166-1.73c.432-.143.853-.386 1.011-.814.16-.432.248-.9.248-1.388z"/>
                            </svg>
                        </Link>
                        <svg v-else @click="alertaDarLike" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             fill="white"
                             class="w-5 h-5 inline-block hover:fill-yellow-300">
                            <path
                                d="M1 8.25a1.25 1.25 0 112.5 0v7.5a1.25 1.25 0 11-2.5 0v-7.5zM11 3V1.7c0-.268.14-.526.395-.607A2 2 0 0114 3c0 .995-.182 1.948-.514 2.826-.204.54.166 1.174.744 1.174h2.52c1.243 0 2.261 1.01 2.146 2.247a23.864 23.864 0 01-1.341 5.974C17.153 16.323 16.072 17 14.9 17h-3.192a3 3 0 01-1.341-.317l-2.734-1.366A3 3 0 006.292 15H5V8h.963c.685 0 1.258-.483 1.612-1.068a4.011 4.011 0 012.166-1.73c.432-.143.853-.386 1.011-.814.16-.432.248-.9.248-1.388z"/>
                        </svg>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

