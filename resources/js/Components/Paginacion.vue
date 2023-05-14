<script setup>
import {Link} from "@inertiajs/vue3";

defineProps(['obras']);
</script>

<template>
    <div class="mb-2" v-if="obras.links.length > 3">
        <div class="flex flex-wrap -mb-1">
            <template v-for="(link, p) in obras.links" :key="p">
                <div v-if="link.url === null && !link.active && link.label === 'pagination.previous'" class="mr-1 mb-1 px-4 py-3 leading-4 text-gray-400 rounded"
                     v-html="`<`"/>
                <Link v-else-if="link.label === 'pagination.previous' && link.url"
                      class="mr-1 mb-1 px-4 py-3 leading-4 rounded hover:bg-white "
                      :class="{ 'rosa text-white': link.active }" :href="link.url" v-html="`<`" preserve-state/>
                <Link v-else-if="link.label === 'pagination.next'"
                      class="mr-1 mb-1 px-4 py-3 text-sm leading-4 rounded hover:bg-white "
                      :class="{ 'rosa text-white': link.active }" :href="link.url" v-html="`>`" preserve-state/>
                <Link v-else
                      class="mr-1 mb-1 px-4 py-3 leading-4 rounded hover:bg-white"
                      :class="{ 'rosa text-white': link.active }" :href="link.url" v-html="link.label" preserve-state/>
            </template>
        </div>
    </div>
</template>

<style scoped>
.rosa {
    background: #e37f81;
    color: white;
}
a {
    border: 1px solid white;
    font-size: 1.1rem;
}
a:hover {
    border: 1px solid #e37f81;
}
</style>
