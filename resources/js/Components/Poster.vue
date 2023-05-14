<script setup>
import { Link } from "@inertiajs/vue3";

defineProps(['obra']);
</script>

<template>
    <div class="w-full p-6">
        <Link :href="route('obra', encodeURIComponent(obra['titulo']))">
            <div id="idTooltip" class="flex justify-center">
                <h3>{{ obra['titulo'] }}</h3>
                <h3 id='idTooltipText'>{{ obra['titulo'] }}</h3>
            </div>
        </Link>
        <Link :href="route('obra', encodeURIComponent(obra['titulo']))">
            <img id="idImgObra" class="w-full mt-3" :src="'posters/' + obra['poster']['ruta']"
                 :alt="obra['poster']['alt']">
        </Link>
    </div>
</template>

<style scoped>
/* TODO posibilidad de limpiar estilos en la medida de lo posible asignandolos a clases de tailwind */
#idTooltip {
    position: relative;
    cursor: pointer;
}

#idTooltipText {
    position: absolute;
    top: 0;
    padding: 8px 8px;
    background: #e37f81;
    color: white;
    visibility: hidden;
    opacity: 0;
    transition: opacity 0.5s ease-out;
}

#idTooltip:hover #idTooltipText {
    visibility: visible;
    opacity: 1;
    z-index: 10;
    font-size: 1.1rem;
}

#idTooltip:hover h3 {
    visibility: hidden;
}

#idImgObra:hover {
    border: 10px #e37f81 solid;
}

h3 {
    position: relative;
    color: #e37f81;
    font-size: 1.6rem;
    font-weight: bold;
    text-decoration: underline;
    font-family: 'Oswald', sans-serif;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
}

</style>
