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

defineProps(['generos', 'paises']);
</script>

<template>

    <form @submit.prevent="submit" class="m-auto flex">

        <!-- Div desplegables y boton aplicar -->
        <div class="m-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6">
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
            <!-- TODO Generar los años de manera dinamica con fechas JS FALTA LA FECHA LIMITE POR ABAJO -->
            <div class="input">
                <select name="desde" id="idDesde" v-model="form.desde" class="bg-gray-50 border border-gray-300 text-gray-900 text-base focus:ring-red-400 focus:border-red-400 block w-full p-2.5">
                    <option disabled value="">Desde</option>
                    <option v-for="n in 154">{{ (new Date().getFullYear() + 1) - n }}</option>
                </select>
            </div>
            <div class="input">
                <select name="hasta" id="idHasta" v-model="form.hasta" class="bg-gray-50 border border-gray-300 text-gray-900 text-base focus:ring-red-400 focus:border-red-400 block w-full p-2.5">
                    <option disabled value="">Hasta</option>
                    <option v-for="n in 154">{{ (new Date().getFullYear()+ 1) - n }}</option>
                </select>
            </div>
            <div class="input flex">
                <!-- Boton filtrar -->
                <PrimaryButton :disabled="form.processing" :class="{ 'opacity-25': form.processing }">FILTRAR</PrimaryButton>
            </div>
            <div class="input">
                <Link class="flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest transition ease-in-out duration-150" id="idReset" :href="route('obras')" as="button">RESET</Link>
            </div>
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

#idReset {
    background-color: #e37f81;
    color: white;
    border-radius: 5px;
}

#idReset:hover {
    color: black;
}
</style>
