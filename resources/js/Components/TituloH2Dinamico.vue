<script setup>
const props = defineProps({
    titulo : String,
})
</script>

<template>
<h1 class="w-full">{{ titulo || 'Todas las películas' }}</h1>
</template>

<style scoped>
h1{
    font-family: 'Oswald', sans-serif;
    color: #e37f81;
    height: 10vh;
    font-size: 3rem;
    text-align: center;
}
</style>
