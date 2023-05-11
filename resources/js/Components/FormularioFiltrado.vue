<script setup>
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import {Link, useForm} from '@inertiajs/vue3';

/*

const paises = [
    'ESTADOS UNIDOS DE AMERICA', 'NUEVA ZELANDA', 'ITALIA', 'REINO UNIDO', 'FRANCIA', 'ESPAÑA', 'AUSTRALIA', 'ALEMANIA', 'USSR', 'JAPON',
];*/

const form = useForm({
    genero: '',
    pais: '',
    desde: '',
    hasta: '',
});

const submit = () => {
    form.post(route('obras'));
};

defineProps(['generos']);
</script>

<template>

    <form @submit.prevent="submit">
        <div>
            <InputLabel for="idGenero" value="Genero"/>

            <select name="" id="idGenero">
                <option v-for="genero in generos">{{ genero['genero']}}</option>
            </select>
        </div>

            <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Filtrar
            </PrimaryButton>
    </form>
</template>

<style scoped>
form{
    width: 100%;
}
</style>
