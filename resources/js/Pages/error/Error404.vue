<script setup>
defineProps([ 'status', 'message'])
</script>

<template>
    <main class="grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="text-center">
            <p class="texto-404 text-base font-semibold">Error {{ status }}</p>
            <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">{{ message }}</h1>
            <p class="mt-6 text-base leading-7 text-gray-600">Pero si vuelves a la home, en FilmXtra encontrarás todo lo que necesitas.</p>

<!--<img src="/images/logo.png" alt="LO QUE TE DE LA REAL GANA">-->

            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="#" class="boton-inicio rounded-md px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Ir a inicio</a>
                <a href="#" class="boton-contacta bg-black rounded-md px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Contacta con nosotros <span aria-hidden="true"> &rarr;</span></a>
            </div>
        </div>
    </main>
</template>

<style>
/*******Texto 404*******/
.texto-404 {
    color: #e37f81;
}

/*******Boton inicio*******/
.boton-inicio {
    background: #e37f81;
}

.boton-inicio:hover {
    background-color: black;
    color: #e37f81;
}

/*******Boton contacta*******/
.boton-contacta:hover {
    color: #e37f81;
}
</style>
