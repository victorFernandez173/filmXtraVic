<script setup>
import {Link} from "@inertiajs/vue3";
</script>

<template>
    <!-- Seccion columna izquierda -->
    <section class="seccion-columna p-4 pb-8">
        <!-- Genero -->
        <h5 class="py-4 font-bold underline">Por género:</h5>
        <ul>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'accion' }" method="get" as="button">Acción</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'aventuras' }" method="get" as="button">Aventuras</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'biografico' }" method="get" as="button">Biográfico</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'belico' }" method="get" as="button">Bélico</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'ciencia ficcion' }" method="get" as="button">Ciencia ficción</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'cine mudo' }" method="get" as="button">Cine Mudo</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'cine negro' }" method="get" as="button">Cine Negro</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'comedia' }" method="get" as="button">Comedia</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'cortometraje' }" method="get" as="button">Cortometraje</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'crimen' }" method="get" as="button">Crimen</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'deportiva' }" method="get" as="button">Deportiva</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'documental' }" method="get" as="button">Documental</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'drama' }" method="get" as="button">Drama</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'fantastico' }" method="get" as="button">Fantástico</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'historica' }" method="get" as="button">Histórica</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'infantil' }" method="get" as="button">Infantil</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'intriga' }" method="get" as="button">Intriga</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'musical' }" method="get" as="button">Musical</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'policiaca' }" method="get" as="button">Policiaca</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'propagand%stico' }" method="get" as="button">Propagandístico</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'pelicula de culto' }" method="get" as="button">Película de culto</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'road movie' }" method="get" as="button">Road Movie</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'romance' }" method="get" as="button">Romance</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'terror' }" method="get" as="button">Terror</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'thriller' }" method="get" as="button">Thriller</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ genero : 'western' }" method="get" as="button">Western</Link>
            </li>
        </ul>

        <!-- Decada -->
        <h5 class="py-4 font-bold underline">Por década:</h5>
        <ul>
            <li>
                <Link :href="route('obras')" :data="{ fecha : '201_' }" method="get" as="button">2010s</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ fecha : '200_' }" method="get" as="button">2000s</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ fecha : '199_' }" method="get" as="button">90s</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ fecha : '198_' }" method="get" as="button">80s</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ fecha : '197_' }" method="get" as="button">70s</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ fecha : '196_' }" method="get" as="button">60s</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ fecha : '195_' }" method="get" as="button">50s</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ fecha : '194_' }" method="get" as="button">40s</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ fecha : '193_' }" method="get" as="button">30s</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ fecha : '192_' }" method="get" as="button">20s</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ fecha : '190_' }" method="get" as="button">00s</Link>
            </li>
        </ul>

        <!-- Pais -->
        <h5 class="py-4 font-bold underline">Por país:</h5>
        <ul>
            <li>
                <Link :href="route('obras')" :data="{ pais : 'alemania' }" method="get" as="button">Alemania</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ pais : 'australia' }" method="get" as="button">Australia</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ pais : 'espa_a' }" method="get" as="button">España</Link>
            </li>
            <li>
                <div id="tio">
                  <Link :href="route('obras')" :data="{ pais : 'estados unidos de america' }" method="get" as="button">Estados Unidos de América</Link>
                </div>

            </li>
            <li>
                <Link :href="route('obras')" :data="{ pais : 'francia' }" method="get" as="button">Francia</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ pais : 'italia' }" method="get" as="button">Italia</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ pais : 'japon' }" method="get" as="button">Japón</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ pais : 'nueva zelanda' }" method="get" as="button">Nueva Zelanda</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ pais : 'reino unido' }" method="get" as="button">Reino Unido</Link>
            </li>
            <li>
                <Link :href="route('obras')" :data="{ pais : 'ussr' }" method="get" as="button">USSR</Link>
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

@media screen and (max-width: 1024px) {
    li{
        font-size: 0.9rem;
    }
}

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
