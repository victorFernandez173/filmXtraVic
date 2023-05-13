<script setup>
import {Link} from "@inertiajs/vue3";
</script>

<template>
    <!-- Seccion columna izquierda -->
    <section class="seccion-columna p-4 pb-8">
        <!-- Genero -->
        <h5 class="py-4 font-bold underline">Género</h5>
        <ul>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'acción', barraLateral: 'genero' }" method="get" as="button">Acción</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'aventuras', barraLateral: 'genero' }" method="get" as="button">Aventuras</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'biográfico', barraLateral: 'genero' }" method="get" as="button">Biográfico</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'bélico', barraLateral: 'genero' }" method="get" as="button">Bélico</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'ciencia ficción', barraLateral: 'genero' }" method="get" as="button">Ciencia ficción</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'cine mudo', barraLateral: 'genero' }" method="get" as="button">Cine Mudo</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'cine negro', barraLateral: 'genero' }" method="get" as="button">Cine Negro</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'comedia', barraLateral: 'genero' }" method="get" as="button">Comedia</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'cortometraje', barraLateral: 'genero' }" method="get" as="button">Cortometraje</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'crimen', barraLateral: 'genero' }" method="get" as="button">Crimen</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'deportiva', barraLateral: 'genero' }" method="get" as="button">Deportiva</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'documental', barraLateral: 'genero' }" method="get" as="button">Documental</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'drama', barraLateral: 'genero' }" method="get" as="button">Drama</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'fantástico', barraLateral: 'genero' }" method="get" as="button">Fantástico</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'historica', barraLateral: 'genero' }" method="get" as="button">Histórica</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'infantil', barraLateral: 'genero' }" method="get" as="button">Infantil</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'intriga', barraLateral: 'genero' }" method="get" as="button">Intriga</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'musical', barraLateral: 'genero' }" method="get" as="button">Musical</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'policiaca', barraLateral: 'genero' }" method="get" as="button">Policiaca</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'propagandístico', barraLateral: 'genero' }" method="get" as="button">Propagandístico</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'película de culto', barraLateral: 'genero' }" method="get" as="button">Película de culto</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'road movie', barraLateral: 'genero' }" method="get" as="button">Road Movie</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'romance', barraLateral: 'genero' }" method="get" as="button">Romance</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'terror', barraLateral: 'genero' }" method="get" as="button">Terror</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'thriller', barraLateral: 'genero' }" method="get" as="button">Thriller</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'western', barraLateral: 'genero' }" method="get" as="button">Western</Link>
            </li>
        </ul>

        <!-- Decada -->
        <h5 class="py-4 font-bold underline">Década</h5>
        <ul>
            <li>
                <Link :href="route('obras')" :data="{ desde : '2010', hasta : '2019', barraLateral: 'decada' }" method="get" as="button">2010s</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ desde : '2000', hasta : '2009', barraLateral: 'decada' }" method="get" as="button">2000s</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ desde : '1990', hasta : '1999', barraLateral: 'decada' }" method="get" as="button">90s</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ desde : '1980', hasta : '1989', barraLateral: 'decada' }" method="get" as="button">80s</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ desde : '1970', hasta : '1979', barraLateral: 'decada' }" method="get" as="button">70s</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ desde : '1960', hasta : '1969', barraLateral: 'decada' }" method="get" as="button">60s</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ desde : '1950', hasta : '1959', barraLateral: 'decada' }" method="get" as="button">50s</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ desde : '1940', hasta : '1949', barraLateral: 'decada' }" method="get" as="button">40s</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ desde : '1930', hasta : '1939', barraLateral: 'decada' }" method="get" as="button">30s</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ desde : '1920', hasta : '1929', barraLateral: 'decada' }" method="get" as="button">20s</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ desde : '1900', hasta : '1910', barraLateral: 'decada' }" method="get" as="button">00s</Link>
            </li>
        </ul>

        <!-- Pais -->
        <h5 class="py-4 font-bold underline">País</h5>
        <ul>
            <li>
                <Link :href="route('obras')" :data="{ pais : 'Alemania', barraLateral: 'pais' }" method="get" as="button">Alemania</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ pais : 'Australia', barraLateral: 'pais' }" method="get" as="button">Australia</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ pais : 'España', barraLateral: 'pais' }" method="get" as="button">España</Link>
            </li>
            <li>
                <div id="tio">
                  <Link :href="route('obras')" :data="{ pais : 'Estados Unidos de America', barraLateral: 'pais' }" method="get" as="button">Estados Unidos de América</Link>
                </div>

            </li>
            <li>
                <Link :href="route('obras')" :data="{ pais : 'Francia', barraLateral: 'pais' }" method="get" as="button">Francia</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ pais : 'Italia', barraLateral: 'pais' }" method="get" as="button">Italia</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ pais : 'Japón', barraLateral: 'pais' }" method="get" as="button">Japón</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ pais : 'Nueva Zelanda', barraLateral: 'pais' }" method="get" as="button">Nueva Zelanda</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ pais : 'Reino Unido', barraLateral: 'pais' }" method="get" as="button">Reino Unido</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ pais : 'USSR', barraLateral: 'pais' }" method="get" as="button">USSR</Link>
            </li>
        </ul>
    </section>
</template>

<style scoped>
/****************************************** Seccion columna ******************************************/
.seccion-columna {
    background-color: #e37f81;
    width: 12%;
    padding: 1rem 2rem 1rem 1rem;
}

button {
    text-align: left;
    width: 100%;
    display: block;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
}

.seccion-columna li:hover {
    color: white;
}

/****************************RESPONSIVE****************************/
/************Tablet************/
@media screen and (max-width: 1024px) {
    li{
        font-size: 0.9rem;
    }
}

/************Movil************/
@media screen and (max-width: 768px) {
    /******* Seccion columna *******/
    .seccion-columna {
        width: 20%;
        padding-right: 0.5rem;
    }

    li{
        font-size: 0.7rem;
    }
}
</style>
