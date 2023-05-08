<script setup>
defineProps([ 'status', 'message'])
</script>

<template>
    <div>
        <h1>Error {{ status }}</h1>

        <p>{{ message }}</p>
    </div>
</template>
