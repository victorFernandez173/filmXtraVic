<script>
import LayoutPrincipal from "../Layouts/LayoutPrincipal.vue";
export default {
    layout: LayoutPrincipal,
}
</script>

<script setup>
import dayjs from "dayjs";
import es from "dayjs/locale/es";
import relativeTime from 'dayjs/plugin/relativeTime';
import { Head } from "@inertiajs/vue3";

defineProps(['obra', 'mediaEvaluaciones', 'criticas', 'saga']);
dayjs.extend(relativeTime);
dayjs.locale('es');

const media = 0;
</script>

<template>

</template>
