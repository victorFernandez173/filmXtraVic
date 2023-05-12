<script setup>
import { Link } from "@inertiajs/vue3";

defineProps(['obras']);
</script>

<template>
    <div v-if="obras.links.length > 3" class="flex justify-center mt-4 mb-4 space-x-4 m-auto">
        <Link
            v-for="(link, k) in obras.links"
            :key="k"
            class="px-4 py-3 text-md leading-4 bg-white rounded hover:bg-white focus:text-indigo-500 hover:shadow"
            :class="{'bg-indigo-400 text-white': link.active}"
            :href="link.url"
            v-html="link.label"
        />
    </div>
</template>
