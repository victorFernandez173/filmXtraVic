<script setup>
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3';

/*

const paises = [
    'ESTADOS UNIDOS DE AMERICA', 'NUEVA ZELANDA', 'ITALIA', 'REINO UNIDO', 'FRANCIA', 'ESPAÑA', 'AUSTRALIA', 'ALEMANIA', 'USSR', 'JAPON',
];*/

const form = useForm({
    genero: '-',
    pais: '-',
    desde: '-',
    hasta: '-',
});

const submit = () => {
    form.post(route('obrasPost'));
};

defineProps(['generos', 'paises']);
</script>

<template>

    <form @submit.prevent="submit" class="m-auto">
        <div id="idPrimero" class="flex justify-around">
            <div>
                <InputLabel for="idGenero" value="Genero"/>

                <select name="genero" id="idGenero" v-model="form.genero">
                    <option v-for="genero in generos">{{ genero['genero']}}</option>
                </select>
            </div>
            <div>
                <InputLabel for="idPais" value="Pais"/>

                <select name="pais" id="idPais" v-model="form.pais">
                    <option v-for="pais in paises">{{ pais['pais']}}</option>
                </select>
            </div>
            <div>
                <InputLabel for="idDesde" value="Desde"/>

                <select name="desde" id="idDesde" v-model="form.desde">
                    <option v-for="n in 154">{{ n + 1869 }}</option>
                </select>
            </div>
            <div>
                <InputLabel for="idHasta" value="Hasta"/>

                <select name="hasta" id="idHasta" v-model="form.hasta">
                    <option v-for="n in 154">{{ n + 1869 }}</option>
                </select>
            </div>
        </div>
        <div id="idSegundo" class="flex justify-center">
            <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Filtrar
            </PrimaryButton>
        </div>
    </form>





    <!-- Div desplegables y boton aplicar -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-7 text-center w-full justify-items-center filtrar-3">
        <!-- Select genero -->
        <label for="opciones-genero" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Selecciona un género:</label>
        <select id="opciones-genero" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-red-400 focus:border-red-400 block w-full p-2.5">
            <option value="Acción">Acción</option>
            <option value="Aventuras">Aventuras</option>
            <option value="Biográfico">Biográfico</option>
            <option value="Bélico">Bélico</option>
        </select>

        <!-- Select epoca -->
        <label for="opciones-epoca" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Selecciona una época:</label>
        <select id="opciones-epoca" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-red-400 focus:border-red-400 block w-full p-2.5">
            <option value="2010s">2010s</option>
            <option value="2000s">2000s</option>
            <option value="90s">90s</option>
            <option value="80s">80s</option>
        </select>

        <!-- Select pais -->
        <label for="opciones-pais" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Selecciona un país:</label>
        <select id="opciones-pais" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-red-400 focus:border-red-400 block w-full p-2.5">
            <option value="Alemania">Alemania</option>
            <option value="Australia">Australia</option>
            <option value="España">España</option>
            <option value="Estados Unidos de América">Estados Unidos de América</option>
        </select>

        <!-- Boton aplicar -->
        <button type="button" class="boton-filtrar text-white font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 mt-5">FILTRAR</button>
    </div>








</template>

<style scoped>
form {
    width: 80%;
    padding: 20px;
    border: #e37f81 3px solid;
}

#idSegundo {
    margin-top: 10px;
}






/*******Seccion desplegables*******/
.boton-filtrar {
    background-color: #e37f81;
    color: white;
}

.boton-filtrar:hover {
    color: black;
}


</style>
