<script setup>
import InputLabel from '@/Components/InputLabel.vue';
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

    <form @submit.prevent="submit" class="m-auto">

        <!-- Div desplegables y boton aplicar -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-9 text-center w-full justify-items-center">
            <!-- Select genero -->
            <InputLabel for="idGenero" value="Genero"/>
            <select name="genero" v-model="form.genero" class="bg-gray-50 border border-gray-300 text-gray-900 text-base focus:ring-red-400 focus:border-red-400 block w-full p-2.5">
                <option disabled value="">-</option>
                <option v-for="genero in generos">{{ genero['genero']}}</option>
            </select>

            <!-- Select pais -->
            <InputLabel for="idPais" value="Pais"/>
            <select name="pais" id="idPais" v-model="form.pais" class="bg-gray-50 border border-gray-300 text-gray-900 text-base focus:ring-red-400 focus:border-red-400 block w-full p-2.5">
                <option disabled value="">-</option>
                <option v-for="pais in paises">{{ pais['pais']}}</option>
            </select>

            <!-- Select periodo -->
            <InputLabel for="idDesde" value="Desde"/>
            <select name="desde" id="idDesde" v-model="form.desde" class="bg-gray-50 border border-gray-300 text-gray-900 text-base focus:ring-red-400 focus:border-red-400 block w-full p-2.5">
                <option disabled value="">-</option>
                <option v-for="n in 154">{{ n + 1869 }}</option>
            </select>
            <InputLabel for="idHasta" value="Hasta"/>
            <select name="hasta" id="idHasta" v-model="form.hasta" class="bg-gray-50 border border-gray-300 text-gray-900 text-base focus:ring-red-400 focus:border-red-400 block w-full p-2.5">
                <option disabled value="">-</option>
                <option v-for="n in 154">{{ n + 1869 }}</option>
            </select>

            <!-- Boton aplicar -->
            <PrimaryButton type="button" class="text-white font-medium text-sm px-5 py-2.5 mr-2 mb-2 mt-5" :disabled="form.processing" :class="{ 'opacity-25': form.processing }">FILTRAR</PrimaryButton>
        </div>
    </form>
</template>

<style scoped>
/*******Formulario filtrar*******/
form {
    width: 80%;
    padding: 20px;
    border: #e37f81 3px solid;
}
</style>
