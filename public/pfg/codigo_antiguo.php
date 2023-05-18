<!-- ESTILO NORMAL POR SI PRESCINDIMOS DE USAR COMPONENTE POSTER
        <div class="flex text-center">
            <span v-for="secuela in secuelaPrecuela">
                <span>{{ secuela['secuela']['orden'] > obra[0]['secuela']['orden'] ? 'Secuela' : 'Precuela' }}</span>
                 <Link :href="route('obra', encodeURIComponent(secuela['titulo']))">
                     <img class="border-solid border-3 border-white hover:border-3 hover:border-flamingo hover:border-solid w-[200px] m-auto" :src="'../posters/' + secuela['poster']['ruta']" :alt="secuela.poster.alt">
                 </Link>
            </span>
        </div> -->
