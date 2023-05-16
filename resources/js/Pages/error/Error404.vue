<script setup>
import { Head, Link } from "@inertiajs/vue3";

defineProps([ 'status', 'message'])
</script>

<template>
    <Head>
        <title>Error 404</title>
        <meta name="filter" content="Página de error 404">
    </Head>
    <div class="grid h-screen place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8 bg-cover bg-[url('gif/error-fondo.gif')]">
        <div class="text-center">
            <!--<p class="texto-404 text-base font-semibold">Error {{ status }}</p>-->
            <img src="/images/logo-error.png" class="m-auto w-60 mb-10" alt="Logo Error 404">
            <div class="color-fondo-letras rounded">
                <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">{{ message }}</h1>
                <p class="mt-4 text-2xl leading-7 text-gray-800">Pero si vuelves al inicio, en FilmXtra encontrarás todo lo que necesitas.</p>
            </div>
            <img src="/gif/error-gif.gif" class="m-auto mt-7 w-80" alt="Gif error cine">
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <Link :href="route('/')" class="hover:text-flamingo hover:bg-black bg-flamingo rounded-md px-3.5 py-2.5 text-sm font-semibold text-white ">Ir a inicio</Link>
                <Link href="#" class="hover:text-flamingo bg-black rounded-md px-3.5 py-2.5 text-sm font-semibold text-white">Contacta con nosotros <span aria-hidden="true"> &rarr;</span></Link>
            </div>
            <img src="/images/logo.png" class="m-auto w-60 mt-20" alt="Logo FilmXtra">
        </div>
    </div>
</template>

<style>
.color-fondo-letras {
    background-color: rgba(255, 255, 255, 0.4);
}
</style>
