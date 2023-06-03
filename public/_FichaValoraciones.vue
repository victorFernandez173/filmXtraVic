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
import {Head, Link, useForm, usePage} from "@inertiajs/vue3";
import Estrellitas from "../Components/Estrellitas.vue";
import Swal from "sweetalert2";
import SelectRango from "../Components/SelectRango.vue";
import Paginacion from "../Components/Paginacion.vue";
import {ref} from "vue";

const page = usePage();
// Para las fechas relativas
dayjs.extend(relativeTime);
dayjs.locale('es');

// Para calcular un numero aleatorio que represente un gif en funcion del numero de gifs disponibles
function devolverAleatorio(){
    return (Math.floor(Math.random() * page.props.nGifs) + 1);
}

// Alerts para cuando se da like sin estar logueado y cuando de edita/crea crítica
function alertaDarLike(gif) {
    Swal.fire({
        title: 'UPSSS!',
        text: `Registrate/logueate para dar like`,
        imageUrl: gif,
        imageWidth: 400,
        imageAlt: 'ocupate de arreglarlo',
        confirmButtonColor: '#e37f81'
    });
}

function alertaCritica(pelicula, mensaje, gif, titulo) {
    Swal.fire({
        title: titulo,
        text: mensaje + ' ' + pelicula,
        imageUrl: gif,
        imageWidth: 400,
        imageAlt: 'Critica exitosa',
        confirmButtonColor: '#e37f81'
    });
}

// Coloreado de los likes
//Se le pasa el usuario logueado y un json con los datos de la critica en concreto que se recoje con el inidice del v-for que va cargando las criticas.
//A continuación se tranforma a array el objeto gustaPor.
//Y si este incluye el id del usuario logueado, es que el like fue activado, se colorea de negro pues.
function procesarGustadas($usuario, $gustadas) {
    let objetoGustadas = Object.values($gustadas['gustadaPor']);
    let gustadaPorArray = []
    for (const user_id in objetoGustadas) {
        let valor = Object.values(Object(objetoGustadas[user_id]));
        gustadaPorArray.push(valor[0]);
    }
    return gustadaPorArray.includes($usuario['id']);
}

//BLOQUE DE EVALUACIONES
const existeLaEvaluacionBandera = ref(page.props.evaluacionDelUsuario);
const existeLaEvaluacionBandera2 = ref(false);
function mensajeEvaluacion() {
    if (existeLaEvaluacionBandera.value === -1 || existeLaEvaluacionBandera2.value === false) {
        existeLaEvaluacionBandera2.value = true;
        return 'Evaluación exitosa';
    }
    return 'Evaluación modificada exitosamente';
}
function cargarContenidoEvaluacionUsuario() {
    if(existeLaEvaluacionBandera.value !== -1){
        return parseInt(page.props.evaluacionDelUsuario[0]['evaluacion']).toString();
    }
    return '';
}


//BLOQUE DE CRÍTICAS
const existeLaCriticaBandera = ref(page.props.criticaDelUsuario);
const existeLaCriticaBandera2 = ref(false);
function mensajeCritica() {
    if (existeLaCriticaBandera.value === -1 || existeLaCriticaBandera2.value === false) {
        existeLaCriticaBandera2.value = true;
        alertaCritica(page.props.obra[0]['titulo'], 'Has puesto tu critica de ', '../gif/' + devolverAleatorio() + '.gif', 'Bravo!!!');
    } else {
        alertaCritica(page.props.obra[0]['titulo'], 'Has modificado tu critica de ', '../gif/' + devolverAleatorio() +  '.gif', 'Atención:');
    }

}
function cargarContenidoCriticaUsuario() {
    if(existeLaCriticaBandera.value !== -1){
        return page.props.criticaDelUsuario[0]['critica'];
    }
    return '';
}

// Formularios y sus campos dinámicos
// Crítica
const form = useForm({
    user_id: '',
    obra_id: '',
    critica: cargarContenidoCriticaUsuario(),
});
// Evaluación
const form2 = useForm({
    user_id: '',
    obra_id: '',
    evaluacion: '',
});
</script>

<template>
    <Head>
        <title>Valoraciones: {{ $page.props.obra[0].titulo }}</title>
        <meta name="description" content="Página de bienvenida">
    </Head>
    <div class="container mx-auto mt-10 mb-10">
        <h1 class="text-center font-bold text-flamingo underline text-3xl">{{ $page.props.obra[0].titulo }}</h1>
        <!--2 bloque para poster, criticas usuarios-->
        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-4 mt-10">
            <!--Poster-->
            <div>
                <div class="w-full flex justify-center flex-wrap items-center">
                    <img :src="'../posters/' + $page.props.obra[0]['poster']['ruta']" :alt="$page.props.obra[0].poster.alt">
                    <Estrellitas class="w-full" :mediaEvaluaciones="$page.props.mediaEvaluaciones" :obra="$page.props.obra"/>
                    <p class="text-black text-center pt-4"> &nbsp;&nbsp; {{ $page.props.mediaEvaluaciones }}/10
                        ({{ $page.props.obra[0]['evaluaciones'].length }} votos)</p>
                </div>
                <!--Boton para llevarte a la pagina de datos de la película-->
                <div class="m-auto mb-10 w-3/4">
                    <Link :href="route('obra', encodeURIComponent($page.props.obra[0]['titulo']))" as="button"
                          class="w-full text-white bg-flamingo hover:text-black focus:bg-flamingo focus:ring-flamingo focus:border-flamingo focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 mt-10 text-center">
                        &larr; Ficha {{ $page.props.obra[0]['titulo'] }}
                    </Link>
                </div>
            </div>

            <!--Criticas-->
            <div class="rounded mx-5 lg:mr-0 col-span-3 flex flex-wrap ">
                <!--Titulo usuarios-->
                <div>
                    <div class="block bg-flamingo pt-5 pb-12">
                        <div class="pl-12 pr-10">
                            <ul>
                                <li class="list-disc font-bold underline text-xl mt-10 mb-5">Críticas de nuestros
                                    usuarios:
                                </li>
                            </ul>
                        </div>
                        <div class="px-12">
                            <ul v-for="(cri, i) in $page.props.criticas['data']">
                                <!--Críticas usuarios-->
                                <li class="list-disc ml-5 mb-4 text-white"><span
                                    class="underline font-semibold">{{ cri['usuario'][0]['name'] }}</span>: {{ cri['critica'] }}
                                    ({{ dayjs(cri['fecha']).fromNow() }}) - Likes: {{ cri['likes'] }}

                                    <!--Mano arriba-->
                                    <Link v-if="$page.props.auth.user" class="inline-block" as="button" method="post"
                                          :href="route('darLike')"
                                          :data="{ user_id: $page.props.auth.user['id'], critica_id: cri['id_critica'] }"
                                          preserveScroll>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                             :fill=" procesarGustadas($page.props.auth.user, $page.props.criticas['data'][i]) ? 'black' : 'white'"
                                             class="w-5 h-5 inline-block hover:fill-yellow-300">
                                            <path
                                                d="M1 8.25a1.25 1.25 0 112.5 0v7.5a1.25 1.25 0 11-2.5 0v-7.5zM11 3V1.7c0-.268.14-.526.395-.607A2 2 0 0114 3c0 .995-.182 1.948-.514 2.826-.204.54.166 1.174.744 1.174h2.52c1.243 0 2.261 1.01 2.146 2.247a23.864 23.864 0 01-1.341 5.974C17.153 16.323 16.072 17 14.9 17h-3.192a3 3 0 01-1.341-.317l-2.734-1.366A3 3 0 006.292 15H5V8h.963c.685 0 1.258-.483 1.612-1.068a4.011 4.011 0 012.166-1.73c.432-.143.853-.386 1.011-.814.16-.432.248-.9.248-1.388z"/>
                                        </svg>
                                    </Link>
                                    <svg v-else @click="alertaDarLike('../gif/' + devolverAleatorio() + '.gif')" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
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
                <div class="w-full flex justify-center self-end mt-5">
                    <Paginacion :obras="$page.props.criticas"></Paginacion>
                </div>
            </div>

            <!-- Sección formularios container-->
            <div class="col-span-1 lg:col-span-4 mt-5 bg-flamingo rounded container">
                <div v-if="$page.props.auth.user" class="grid grid-cols-1 md:grid-cols-12 lg:grid-cols-12 p-1">
                    <!-- Formulario evas -->

                    <form
                        @submit.prevent="form2.post(
                                route('evaluar'),
                                {
                                        preserveScroll: true
                                        })"
                        class="col-span-1 md:col-span-3 lg:col-span-2 flex justify-center flex-wrap p-1 border-b md:border-r md:border-b-0 content-center">

                        <div class="w-full text-center">
                            <label class="font-bold underline text-xl text-white">Evaluar: </label>
                        </div>
                        <p v-if="existeLaEvaluacionBandera !== -1 || existeLaEvaluacionBandera2" class="text-center text-xs">(Ya has evaluado esta película, puedes modificar tu evaluación):</p>
                        <div class="w-full">
                            <SelectRango class="w-2/5 sm:w-1/4 md:w-3/4 text-center" :limite="11"
                                         :valor="cargarContenidoEvaluacionUsuario(page.props.auth.user['id'], page.props.obra[0]['id']) ? cargarContenidoEvaluacionUsuario(page.props.auth.user['id'], page.props.obra[0]['id']) : 'Nota'"
                                         @emision="(e) => form2.evaluacion = e">
                            </SelectRango>
                        </div>
                        <div class="w-full text-center">
                            <p class="text-yellow-300 w-2/5 sm:w-1/4 md:w-3/4 text-center m-auto">
                                {{ $page.props.errors['evaluacion'] }}
                            </p>
                            <p v-if="form2.recentlySuccessful">{{  mensajeEvaluacion() }}</p></div>
                        <div class="w-full text-center">
                            <button
                                @click="form2.user_id = $page.props.auth.user['id']; form2.obra_id = $page.props.obra[0]['id']"
                                class="w-2/5 sm:w-1/4 md:w-3/4 text-flamingo bg-white hover:text-black font-medium rounded-lg text-sm px-5 py-2.5 my-2 text-center">
                                Evaluar {{ $page.props.obra[0]['titulo'] }} &rarr;
                            </button>
                        </div>
                    </form>
                    <!-- Formulario críticas -->
                    <div
                        class="col-span-1 md:col-span-9 lg:col-span-10 rounded p-1 lg:ml-1 flex justify-center flex-wrap">
                        <label class="w-full text-center font-bold underline text-xl mt-3 text-white">Reseña
                            {{ $page.props.obra[0]['titulo'] }}
                            <span
                                :class="[form.critica.length > 5000 ? 'text-yellow-300  font-bold' : 'text-white']">({{
                                    form.critica.length
                                }}/5000 caracteres){{
                                    form.critica.length > 5000 ? ' Máximo de caracteres sobrepasado' : ''
                                }}
                            </span>
                        </label>
                        <p v-if="existeLaCriticaBandera !== -1" class="text-center text-xs">(Ya has reseñado esta película, puedes modificar tu crítica):</p>
                        <form
                            @submit.prevent="form.post(
                                route('criticar'),
                                {
                                        preserveScroll: true,
                                        })"
                            class="w-11/12 text-center">
                            <textarea class="w-full h-[200px] m-1 focus:border-black focus:border-[3px] focus:ring-0" v-model="form.critica"></textarea>
                            <div class="w-full text-center">
                                <p class="text-yellow-300 w-2/5 sm:w-1/4 md:w-3/4 text-center m-auto">
                                    {{ $page.props.errors['critica'] }}</p>
                                <p class="invisible" v-if="form.recentlySuccessful">{{ mensajeCritica() }}</p>
                            </div>
                            <button
                                @click="form.user_id = $page.props.auth.user['id']; form.obra_id = $page.props.obra[0]['id']"
                                class="w-2/5 text-flamingo bg-white hover:text-black focus:bg-white focus:ring-flamingo focus:text-flamingo focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 my-2 text-center">
                                Reseñar {{ $page.props.obra[0]['titulo'] }} &rarr;
                            </button>
                        </form>

                    </div>
                </div>
                <div v-else class="grid grid-cols-1 p-10 font-bold text-white text-3xl text-center">
                    Para poder evaluar o poner notas a la película tienes que estar logueado.
                    <Link as="button" :href="route('login')"
                          class="m-auto mt-5 text-flamingo bg-white hover:text-black focus:bg-white focus:ring-flamingo focus:text-flamingo focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 my-2 text-center">
                        Loguearse
                    </Link>
                    <img src="/images/logo-blanco.png" class="w-40 pt-5 m-auto" alt="Logo de la web">
                </div>
            </div>
        </div>
    </div>
</template>



