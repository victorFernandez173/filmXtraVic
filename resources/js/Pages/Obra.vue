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
import {Head, Link, usePage} from "@inertiajs/vue3";
import Poster from "../Components/Poster.vue";
import Swal from "sweetalert2";
import Estrellitas from "../Components/Estrellitas.vue";
import Trailers from "../Components/Trailers.vue";

const props = defineProps(['obra', 'mediaEvaluaciones', 'criticas', 'saga', 'secuelaPrecuela', 'profesionales', 'nGifs']);

// Funcion para ordenar array por clave interna
// Necesaria para devolver las secuelas de la saga ordenadas por columna/propiedad interna 'orden' si hubiera varias
const ordenarAnidado = (p1, p2 = null, sentido = 'asc') => (e1, e2) => {
    const a = p2 ? e1[p1][p2] : e1[p1],
        b = p2 ? e2[p1][p2] : e2[p1],
        ordenarPor = sentido === "asc" ? 1 : -1
    return (a < b) ? -ordenarPor : (a > b) ? ordenarPor : 0;
}

// Si hay secuelas, se genera un array con el objeto y despues se ordena dicho array
const secuelasOrdenadas = props.secuelaPrecuela !== null ? props.secuelaPrecuela.sort(ordenarAnidado("secuela", "orden", "desc")) : null;

// Configuración fechas relativas dayjs
dayjs.extend(relativeTime);
dayjs.locale('es');

// Función alert para avisar que no pueder dar like sin estar registrado y logueado
function alertaDarLike() {
    Swal.fire({
        title: 'UPSSS!',
        text: `Regístrate y logueate para dar like`,
        imageUrl: '../gif/' + (Math.floor(Math.random() * usePage().props.nGifs) + 1) + '.gif',
        imageWidth: 400,
        imageAlt: 'ocupate de arreglarlo, imagen para Regístrate y logueate para dar like',
        confirmButtonColor: '#e37f81'
    });
}

//Se le pasa listado de actores/directores y va generando un string que contiene con asíndeton con comas
function procesarEnumeracion(listado) {
    let enumeracionConComas = ' ';
    for (let a = 0; a < listado.length; a++) {
        //Procesamos el nombre del individuo
        let nombre = procesarNombre(listado[a]['nombre']);
        //Lo añadimos
        enumeracionConComas += nombre;
        //Añadimos punto o coma
        if (a < listado.length - 1) {
            enumeracionConComas += ', ';
        } else {
            enumeracionConComas += '.';
        }
    }
    return enumeracionConComas;
}

//Antepone el nombre al apellido al estar (apellido, nombre) en la BBDD y devuelve el string
function procesarNombre(nombre) {
    // Primero el nombre
    let nombreProcesado = nombre.substring(nombre.indexOf(',') + 2, nombre.length);
    // Despues el apellido
    nombreProcesado += ' ' + nombre.substring(0, nombre.indexOf(','));
    return nombreProcesado;
}

// Obtenemos y procesamos los géneros para añadirles comas y puntos como una enumeración correcta.
// Se le pasa el array con los generos y se procesa con un for añadiendo dichos generos a un array.
//Se transforman a un string, uniendolos con comas.
//Se devuelve el string con un punto final.
function procesarGeneros(generos) {
    const generosProcesados = [];
    for (let i = 0; i < generos.length; i++) {
        generosProcesados.push(generos[i]['genero']);
    }
    let generosString = generosProcesados.join(', ');
    return generosString.substring(0, generosString.length) + '.';
}

// Coloreado de los likes
//Se le pasa el usuario logueado y un json con los datos de la critica en concreto que se recoje con el inidice del v-for que va cargando las criticas.
//A continuación se tranforma a array el objeto gustaPor.
//Y si este incluye el id del usuario logueado, es que el like fue activado, se colorea de negro pues.
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
        <title>{{ obra[0].titulo }}</title>
        <meta name="description" content="Página de bienvenida">
    </Head>
    <div class="container mx-auto mt-10 mb-10">
        <h1 class="text-center font-bold text-flamingo underline text-3xl px-8">{{ obra[0]['titulo'] }}</h1>
        <!--3 apartados para poster, datos y valoraciones-->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mt-10">
            <!--Poster-->
            <div class="flex justify-start flex-col m-auto h-[100%] w-[90%]">
                <img :src="'../posters/' + obra[0]['poster']['ruta']" :alt="obra[0].poster.alt">
                <!--Puntuacion-->
                <Estrellitas :mediaEvaluaciones="mediaEvaluaciones" :obra="obra" :mostrar-votos="true"/>
            </div>

            <!--Datos pelicula-->
            <div class="flex justify-center mr-10 pl-10 pr-10 w-full md:-ml[150px]">
                <ul>
                    <!--Datos de la pelicula-->
                    <li class="list-disc font-bold text-flamingo text-xl"><span class="underline">Obra</span>:</li>
                    <li>
                        <ul>
                            <li class="list-disc ml-5"><span class="font-semibold underline text-lg">Título</span>: {{
                                    obra[0]['titulo']
                                }} ({{ obra[0]['titulo_original'] }})
                            </li>
                            <li class="list-disc ml-5"><span class="font-semibold underline text-lg">Año</span>:
                                {{ obra[0]['fecha'] }}
                            </li>
                            <li class="list-disc ml-5"><span class="font-semibold underline text-lg">Duración</span>:
                                {{ Math.floor((parseInt(obra[0]['duracion']) / 60)) }}h
                                {{ parseInt(obra[0]['duracion']) % 60 }}min
                            </li>
                            <li class="list-disc ml-5"><span class="font-semibold underline text-lg">País</span>:
                                {{ obra[0]['pais'] }}
                            </li>
                            <li v-if="obra[0]['directors'][0]" class="list-disc ml-5"><span
                                class="font-semibold underline text-lg">Dirección</span>:<span> {{
                                    procesarEnumeracion(props.obra[0]['directors'])
                                }}  </span></li>
                            <li v-if="obra[0]['actors'][0]" class="list-disc ml-5"><span
                                class="font-semibold underline text-lg">Reparto</span>: <span>{{
                                    procesarEnumeracion(props.obra[0]['actors'])
                                }} </span></li>
                            <li class="list-disc ml-5"><span class="font-semibold underline text-lg">Productora</span>:
                                {{ obra[0]['productora'] }}
                            </li>
                            <li v-if="obra[0]['generos'][0]" class="list-disc ml-5"><span
                                class="font-semibold underline text-lg">Género</span>: <span> {{
                                    procesarGeneros(props.obra[0]['generos'])
                                }} </span></li>
                            <li class="list-disc ml-5"><span class="font-semibold underline text-lg">Sinopsis</span>:
                                {{ obra[0]['sinopsis'] }}
                            </li>
                            <!--Festivales y premios-->
                            <li v-if="obra[0]['festivals'][0]"
                                class="list-disc font-bold underline text-flamingo text-xl mt-2">Galardones:
                            </li>
                            <li>
                                <ul>
                                    <li v-for="fest in obra[0]['festivals']" class="list-disc ml-5"><span
                                        class="font-semibold underline text-lg">Mejor película</span>: {{
                                            fest['nombre']
                                        }}({{ fest['edicion'] }})
                                    </li>
                                </ul>
                            </li>
                            <li v-if="saga" class="list-disc font-bold text-flamingo text-xl mt-2"><span
                                class="underline">Saga</span>: <span class="inline-block w-full text-center mb-1">&nbsp;{{
                                    saga
                                }}</span>
                            </li>
                            <!-- Si solo hay un poster en secuelas, flex justify-center -->
                            <div v-if="secuelasOrdenadas && secuelasOrdenadas.length <= 1"
                                 class="text-center flex justify-center">
                                <div v-for="secuela in secuelasOrdenadas" class="w-[100%] sm:w-[100%] md:w-[80%] lg">
                                <span>
                                {{
                                        obra[0]['secuela']['orden'] === 0 ? 'Inicio saga' : secuela['secuela']['orden'] === 0 ? 'Spin-off' : secuela['secuela']['orden'] > obra[0]['secuela']['orden'] ? 'Secuela' : 'Precuela'
                                    }}
                                </span>
                                    <div class="w-[60%] md:w-[70%] mx-auto flex justify-center -my-[25px] md:m:0 mt-0.5">
                                        <Poster :obra="secuela" :titulo="`text-lg hover:text-sm md:text-base md:hover:text-base`"
                                                :info="true"/>
                                    </div>
                                </div>
                            </div>
                            <div v-else class="text-center grid lg:grid-cols-2 justify-items-center">
                                <div v-for="secuela in secuelasOrdenadas"
                                     class="w-[80%] sm:w-[100%] md:w-[80%] lg mb-5">
                                <span>
                                {{
                                        obra[0]['secuela']['orden'] === 0 ? 'Inicio saga' : secuela['secuela']['orden'] === 0 ? 'Spin-off' : secuela['secuela']['orden'] > obra[0]['secuela']['orden'] ? 'Secuela' : 'Precuela'
                                    }}
                                </span>
                                    <div
                                        class="w-[80%] md:w-[90%] mx-auto flex justify-center -my-[25px] md:m:0 mt-0.5">
                                        <Poster :obra="secuela" :titulo="`text-lg hover:text-sm md:text-base md:hover:text-base`"
                                                :info="true"/>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!--Contenedor criticas-->
        <div
            class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-10 mb-15 pr-10 justify-center bg-flamingo text-white rounded lg:divide-x md:divide-x divide-y ">
            <!--Criticas-->
            <div class="py-10 pl-12 lg:col-span-3 md:col-span-2">
                <!--Titulo-->
                <ul>
                    <li v-if="profesionales" class="list-disc font-bold text-black text-xl mb-5 underline">Críticas
                        profesionales:
                    </li>
                </ul>
                <ul v-for="p in profesionales">
                    <!--Críticas profesionales-->
                    <li class="list-disc ml-5 mb-4">
                        <span class="font-semibold">
                            <a
                                class="underline hover:text-black" :href="p['web']" target="_blank"
                            >{{ p['medio'] }}
                            </a>:
                        </span> {{ p['contenido'] }}
                        <span
                            class="italic">{{ p['autor'] }}
                        </span>
                        <span v-if="p['fecha']"> ({{ dayjs(p['fecha']).fromNow() }})
                        </span>
                    </li>
                </ul>
                <!--Titulo-->
                <ul>
                    <li class="list-disc font-bold text-black text-xl mt-10 mb-5 underline">Críticas de nuestros
                        usuarios:
                    </li>
                </ul>
                <ul v-for="(cri, i) in criticas['data']">
                    <!--Críticas usuarios-->
                    <li v-if="i < 2" class="list-disc ml-5 mb-4">
                        <span
                            class="underline font-semibold">{{ cri['usuario'][0]['name'] }}
                        </span>: {{ cri['critica'] }}
                        ({{ dayjs(cri['fecha']).fromNow() }}) - Likes: {{ cri['likes'] }}

                        <!--Mano arriba-->
                        <Link v-if="$page.props.auth.user" class="inline-block" as="button" method="post"
                              :href="route('darLike')"
                              :data="{ user_id: $page.props.auth.user['id'], critica_id: cri['id_critica'] }"
                              preserveScroll>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                 :fill="procesarGustadas($page.props.auth.user, $page.props.criticas['data'][i]) ? 'black' : 'white'"
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
                <p>[...]</p>
                <p v-if="!criticas['data'][0]" class="py-3">Sin críticas de usuarios todavía. Participa, pon la
                    tuya.</p>
                <Link :href="route('fichaValoraciones', encodeURIComponent(obra[0]['titulo']))" as="button"
                      class="my-5 m-auto text-flamingo bg-white hover:text-black focus:bg-white focus:ring-flamingo focus:text-flamingo focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5"
                      preserve-scroll>
                    Ver más críticas de usuarios/Valorar {{ obra[0]['titulo'] }}&rarr;
                </Link>
            </div>

            <!--Seccion valorar-->
            <div class="py-5 px-5 pl-10">
                <!--Titulo-->
                <h3 class="font-bold underline text-black text-xl my-5 text-center">¿Quieres valorar esta
                    película?</h3>
                <h4>En FilmXtra nos apasiona el cine y queremos escuchar tu voz. ¡Exprésate como quieras!</h4>
                <ul class="list-disc ml-[20px]">
                    <li>Puedes ponerle una puntuación del 1 al 10 a las películas que veas.</li>
                    <li>Si te gusta entrar en detalles, déjanos tus críticas más elaboradas. ¡Suelta todo lo que
                        piensas!
                    </li>
                    <li>Y, por supuesto, dale un buen "like" a las críticas de otros usuarios que te parezcan geniales.
                        ¡Comparte el amor cinéfilo!
                    </li>
                </ul>
                <p class="pt-7">¡Tu voz cinéfila importa! Exprésate libremente y comparte el amor por el cine.</p>
                <div class="mt-10">
                    <Link as="button" :href="route('valoraciones')"
                          class="my-15 m-auto text-flamingo bg-white hover:text-black focus:bg-white focus:ring-flamingo focus:text-flamingo focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 block"
                          preserve-scroll>
                        Top Valoraciones &rarr;
                    </Link>
                </div>
            </div>

        </div>
        <!-- Componente para el trailer-->
        <Trailers :obra="obra"/>


    </div>
</template>
