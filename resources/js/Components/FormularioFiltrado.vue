<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    genero: '',
    pais: '',
    desde: '',
    hasta: '',
});

const submit = () => {
    form.post(route('obrasPost'));
};

defineProps(['generos', 'paises']);
</script>

<template>

    <form @submit.prevent="submit" class="m-auto flex">

        <!-- Div desplegables y boton aplicar -->
        <div class="m-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5">
            <!-- Select genero -->
            <!-- TODO sería interesante crear componentes de estos select, para que se carguen con datos en función de props -->
            <div class="input">
                <select name="genero" v-model="form.genero" class="bg-gray-50 border border-gray-300 text-gray-900 text-base focus:ring-red-400 focus:border-red-400 block w-full p-2.5">
                    <option disabled value="">Género</option>
                    <option v-for="genero in generos">{{ genero['genero']}}</option>
                </select>
            </div>

            <!-- Select pais -->
            <div class="input">
                <select name="pais" id="idPais" v-model="form.pais" class="bg-gray-50 border border-gray-300 text-gray-900 text-base focus:ring-red-400 focus:border-red-400 block w-full p-2.5">
                    <option disabled value="">País</option>
                    <option v-for="pais in paises">{{ pais['pais']}}</option>
                </select>
            </div>

            <!-- Select periodo -->
            <div class="input">
                <select name="desde" id="idDesde" v-model="form.desde" class="bg-gray-50 border border-gray-300 text-gray-900 text-base focus:ring-red-400 focus:border-red-400 block w-full p-2.5">
                    <option disabled value="">Desde</option>
                    <option v-for="n in 154">{{ n + 1869 }}</option>
                </select>
            </div>
            <div class="input">
                <select name="hasta" id="idHasta" v-model="form.hasta" class="bg-gray-50 border border-gray-300 text-gray-900 text-base focus:ring-red-400 focus:border-red-400 block w-full p-2.5">
                    <option disabled value="">Hasta</option>
                    <option v-for="n in 154">{{ n + 1869 }}</option>
                </select>
            </div>

            <!-- Boton aplicar -->
            <!-- TODO aplicar estilo al botón para la vista de tablet??? -->
            <PrimaryButton class="lg:col-span-1 md:col-span-2 text-white font-medium text-sm px-5 py-2.5 mr-2 mb-2 mt-5" :disabled="form.processing" :class="{ 'opacity-25': form.processing }">FILTRAR</PrimaryButton>
        </div>
    </form>
</template>

<style scoped>
/*******Formulario filtrar*******/
form {
    width: 85%;
    padding: 5px;
    border: #e37f81 3px solid;
}
button{
    margin: auto;
    padding: 10px 20px;
}
.input{
    width: 90%;
    padding: 10px 0;
    margin: auto;
}
</style>
