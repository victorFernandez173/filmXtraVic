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
                <Link href="">Alemania</Link>
            </li>
            <li>
                <Link href="">Andorra</Link>
            </li>
            <li>
                <Link href="">Argentina</Link>
            </li>
            <li>
                <Link href="">Australia</Link>
            </li>
            <li>
                <Link href="">Austria</Link>
            </li>
            <li>
                <Link href="">Bélgica</Link>
            </li>
            <li>
                <Link href="">Brasil</Link>
            </li>
            <li>
                <Link href="">Canadá</Link>
            </li>
            <li>
                <Link href="">China</Link>
            </li>
            <li>
                <Link href="">Colmbia</Link>
            </li>
            <li>
                <Link href="">Dinamarca</Link>
            </li>
            <li>
                <Link href="">España</Link>
            </li>
            <li>
                <Link href="">Estados Unidos de América</Link>
            </li>
            <li>
                <Link href="">Estonia</Link>
            </li>
            <li>
                <Link href="">Federación de Rusia</Link>
            </li>
            <li>
                <Link href="">Finlandia</Link>
            </li>
            <li>
                <Link href="">Francia</Link>
            </li>
            <li>
                <Link href="">Hungría</Link>
            </li>
            <li>
                <Link href="">Irlanda</Link>
            </li>
            <li>
                <Link href="">Islandia</Link>
            </li>
            <li>
                <Link href="">Italia</Link>
            </li>
            <li>
                <Link href="">Japón</Link>
            </li>
            <li>
                <Link href="">Noruega</Link>
            </li>
            <li>
                <Link href="">Países Bajos</Link>
            </li>
            <li>
                <Link href="">Polonia</Link>
            </li>
            <li>
                <Link href="">Portugal</Link>
            </li>
            <li>
                <Link href="">Reino Unido</Link>
            </li>
            <li>
                <Link href="">Rumania</Link>
            </li>
            <li>
                <Link href="">Ucrania</Link>
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

.seccion-columna li{
    text-overflow: ellipsis;
    overflow: hidden;
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
