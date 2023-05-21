<!--
        <span v-if="criticas[0]">Criticas: </span>
        <ul>
            <li v-for="cri in criticas">
                {{ dayjs(cri['fecha']).fromNow() }}-{{ cri['critica'] }}(Likes:{{ cri['likes'] }})[{{cri['usuario'][0]['name']}}]
            </li>
        </ul>
        <span v-if="profesionales">Criticas profesionales: </span>
        <ul>
            <li v-for="pro in profesionales">
                {{ pro['contenido'] }}({{ pro['autor'] }})[{{ pro['medio'] }}-
                <a class="hover:text-red-600 text-flamingo underline" :href="pro['web']" target="_blank">{{ pro['web'] }}</a>]
            </li>
        </ul>
 -->
