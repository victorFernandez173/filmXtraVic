<script setup>
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3';

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
    form.post(route('obrasPost'));
};

defineProps(['generos', 'paises']);
</script>

<template>

    <form @submit.prevent="submit">
        <div id="idPrimero">
            <div>
                <InputLabel for="idGenero" value="Genero"/>

                <select name="genero" id="idGenero">
                    <option selected>-</option>
                    <option v-for="genero in generos">{{ genero['genero']}}</option>
                </select>
            </div>
            <div>
                <InputLabel for="idPais" value="Pais"/>

                <select name="pais" id="idPais">
                    <option selected>-</option>
                    <option v-for="pais in paises">{{ pais['pais']}}</option>
                </select>
            </div>
            <div>
                <InputLabel for="idDesde" value="Desde"/>

                <select name="desde" id="idDesde">
                    <option selected>-</option>
                    <option v-for="n in 154">{{ n + 1869 }}</option>
                </select>
            </div>
            <div>
                <InputLabel for="idHasta" value="Hasta"/>

                <select name="hasta" id="idHasta">
                    <option selected>-</option>
                    <option v-for="n in 154">{{ n + 1869 }}</option>
                </select>
            </div>
        </div>
        <div id="idSegundo">
            <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Filtrar
            </PrimaryButton>
        </div>
    </form>
</template>

<style scoped>
form {
    margin: auto;
    width: 80%;
    padding: 20px;
    border: #e37f81 3px solid;
}

#idPrimero {
    display: flex;
    justify-content: space-around;
}

#idSegundo {
    display: flex;
    justify-content: center;
    margin-top: 10px;
}
</style>
