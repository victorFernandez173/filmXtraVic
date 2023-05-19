<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Link } from '@inertiajs/vue3';

const form = useForm({
    genero: '',
    pais: '',
    desde: '',
    hasta: '',
});

const submit = () => {
    form.get(route('obras'), {preserveState : true});
};

const props = defineProps({
    generos: Object,
    paises: Object,
    pionera: Object
})

const pionera = parseInt((new Date().getFullYear()).toString()) - parseInt(props.pionera[0]['fecha']) + 1;

const annoActual = (new Date().getFullYear() + 1);
</script>

<template>
    <form @submit.prevent="submit" class="m-auto flex border-solid border-flamingo border-3 p-[5px] w-4.5/5">

        <!-- Div desplegables y boton aplicar -->
        <div class="m-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 hover:[&>div>select]:cursor-pointer">
            <!-- Select genero -->
            <!-- TODO sería interesante crear componentes de estos select, para que se carguen con datos en función de props -->
            <div class="m-auto w-11/12 py-[10px] px-0">
                <select name="genero" v-model="form.genero" class="bg-gray-50 border border-gray-300 text-gray-900 text-base focus:ring-red-400 focus:border-red-400 block w-full p-2.5">
                    <option disabled value="">Género</option>
                    <option v-for="genero in generos">{{ genero['genero']}}</option>
                </select>
            </div>

            <!-- Select pais -->
            <div class="m-auto w-11/12 py-[10px] px-0">
                <select name="pais" id="idPais" v-model="form.pais" class="bg-gray-50 border border-gray-300 text-gray-900 text-base focus:ring-red-400 focus:border-red-400 block w-full p-2.5">
                    <option disabled value="">País</option>
                    <option v-for="pais in paises">{{ pais['pais']}}</option>
                </select>
            </div>

            <!-- Select periodo -->
            <div class="m-auto w-11/12 py-[10px] px-0">
                <select name="desde" id="idDesde" v-model="form.desde" class="bg-gray-50 border border-gray-300 text-gray-900 text-base focus:ring-red-400 focus:border-red-400 block w-full p-2.5">
                    <option disabled value="">Desde</option>
                    <option v-for="n in pionera">{{ annoActual - n }}</option>
                </select>
            </div>
            <div class="m-auto w-11/12 py-[10px] px-0">
                <select name="hasta" id="idHasta" v-model="form.hasta" class="bg-gray-50 border border-gray-300 text-gray-900 text-base focus:ring-red-400 focus:border-red-400 block w-full p-2.5">
                    <option disabled value="">Hasta</option>
                    <option v-for="n in pionera">{{ annoActual - n }}</option>
                </select>
            </div>
            <div class="m-auto w-11/12 py-[10px] px-0 flex justify-between md:col-span-2 lg:col-span-1">
                <!-- Botones -->
                <div class="w-[48%]">
                    <PrimaryButton :disabled="form.processing" :class="{ 'opacity-25': form.processing }">FILTRA</PrimaryButton>
                </div>
                <div class="w-[48%] flex m-auto">
                    <Link class="w-full m-auto text-white bg-flamingo hover:text-black focus:bg-flamingo focus:ring-flamingo focus:border-flamingo focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center"  :href="route('obras')">RESET</Link>
                </div>
            </div>
        </div>
    </form>
</template>
