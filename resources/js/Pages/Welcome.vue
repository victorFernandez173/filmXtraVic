<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
    obras: {
        type: Array,
    },
});
</script>

<template>
    <Head title="Welcome" />

    <div
        class="relative xl:flex xl:justify-center xl:items-center min-h-100px bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
    >
        <div v-if="canLogin" class="xl:fixed xl:top-0 xl:right-0 p-6 text-right">
            <Link
                :href="route('login')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            >
                Log in
            </Link>

            <Link
                v-if="canRegister"
                :href="route('register')"
                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            >
                Register
            </Link>
        </div>
    </div>
    <div id="idPosters">
        <div v-for="obra in obras">
            <img :src="'posters/' +  obra.poster.ruta  + '.png'" :alt="obra.poster.alt">
            <p>{{ obra.titulo }}</p>
        </div>
    </div>


</template>

<style>
    #idPosters{
        display: flex;
        flex-wrap: wrap;
    }
    img {
        width: 20vw;
    }
    p{
        width: 300px;
    }
</style>
