<script setup>
import {Link} from "@inertiajs/vue3";
</script>

<template>
    <!-- Seccion columna izquierda -->
    <section class="seccion-columna w-1/10 p-4 pb-8">
        <!-- Genero -->
        <h5 class="py-4 font-bold underline">Por género:</h5>
        <ul>
            <li>
                <Link href="">Acción</Link>
            </li>
            <li>
                <Link href="">Animación</Link>
            </li>
            <li>
                <Link href="">Aventuras</Link>
            </li>
            <li>
                <Link href="">Bibliográfico</Link>
            </li>
            <li>
                <Link href="">Bélico</Link>
            </li>
            <li>
                <Link href="">Ciencia ficción</Link>
            </li>
            <li>
                <Link href="">Cine Mudo</Link>
            </li>
            <li>
                <Link href="">Cine Negro</Link>
            </li>
            <li>
                <Link href="">Comedia</Link>
            </li>
            <li>
                <Link href="">Cortometraje</Link>
            </li>
            <li>
                <Link href="">Crimen</Link>
            </li>
            <li>
                <Link href="">Deportiva</Link>
            </li>
            <li>
                <Link href="">Documental</Link>
            </li>
            <li>
                <Link href="">Drama</Link>
            </li>
            <li>
                <Link href="">Erótico</Link>
            </li>
            <li>
                <Link href="">Experimental</Link>
            </li>
            <li>
                <Link href="">Fantástico</Link>
            </li>
            <li>
                <Link href="">Histórica</Link>
            </li>
            <li>
                <Link href="">Infantil</Link>
            </li>
            <li>
                <Link href="">Intriga</Link>
            </li>
            <li>
                <Link href="">Musical</Link>
            </li>
            <li>
                <Link href="">Policiaca</Link>
            </li>
            <li>
                <Link href="">Propagandístico</Link>
            </li>
            <li>
                <Link href="">Película de culto</Link>
            </li>
            <li>
                <Link href="">Religiosa</Link>
            </li>
            <li>
                <Link href="">Road Movie</Link>
            </li>
            <li>
                <Link href="">Romance</Link>
            </li>
            <li>
                <Link href="">Serie B</Link>
            </li>
            <li>
                <Link href="">Serie de TV</Link>
            </li>
            <li>
                <Link href="">Terror</Link>
            </li>
            <li>
                <Link href="">Thriller</Link>
            </li>
            <li>
                <Link href="">Western</Link>
            </li>
        </ul>

        <!-- Decada -->
        <h5 class="py-4 font-bold underline">Por década:</h5>
        <ul>
            <li>
                <Link href="">2020s</Link>
            </li>
            <li>
                <Link href="">2010s</Link>
            </li>
            <li>
                <Link href="">2000s</Link>
            </li>
            <li>
                <Link href="">90s</Link>
            </li>
            <li>
                <Link href="">80s</Link>
            </li>
            <li>
                <Link href="">70s</Link>
            </li>
            <li>
                <Link href="">60s</Link>
            </li>
            <li>
                <Link href="">50s</Link>
            </li>
            <li>
                <Link href="">40s</Link>
            </li>
            <li>
                <Link href="">30s</Link>
            </li>
            <li>
                <Link href="">20s</Link>
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
}

.seccion-columna a:hover {
    color: white;
}

@media screen and (max-width: 768px) {
    /******* Seccion columna *******/
    .seccion-columna {
        width: 40%;
    }

}
</style>
