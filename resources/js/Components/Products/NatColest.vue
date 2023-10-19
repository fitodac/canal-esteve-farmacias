<script setup>
import SectionTitle from '@/Components/Products/SectionTitle.vue'
import List from '@/Components/Products/List.vue'
import { ref, onMounted } from 'vue';
const currentURL = ref('');
onMounted(() => {
    currentURL.value = window.location.href;
});

const data = {
    intro: {
        title: `NatColest&reg;`,
        subtitle: `¿Qué es?`,
        content: `NatColest® es un complemento alimenticio <strong>formulado con una<br>
            combinación única de 4 extractos vegetales</strong> que ayudan a mantener,<br>
            de forma natural, los niveles normales de colesterol<sup>1</sup>.
		`,
        presentation: ``
    },
    prod_1: {
        name: "Calmiox Crema",
        img: {
            src: "/img/natcolest/natcolest-w-icons.webp",
            height: '400px'
        },
        link: {
            text: 'Etiquetaje de NatColest',
            link: `/materiales-productos/natcolest/Etiquetatge_Natcolest.pdf`
        },

        how_it_works: [
            `Natcolest ayuda a mantener, de forma natural, los niveles normales de colesterol. Está formulado con una combinación única de 4 extractos vegetales los cuales tienen diferentes
            mecanismos de acción sobre el metabolismo de los lípidos.<sup>1</sup>`
        ],

        ingredients: {
            content : [
                `<strong>Levadura roja de arroz</strong>: Fuente de MONACOLINA K (2.85mg).`,
                `<strong>Extracto de ajo negro</strong>: Contribuye a mantener niveles normales de colesterol.`,
                `<strong>Berberina de la raíz de berberis</strong>: Ayuda a reducir los niveles de triglicéridos.`,
                `<strong>Silimarina del cardo mariano</strong>: Contribuye al potencial detoxificante del hígado y ayuda a la absorción de la berberina.`
            ],
            stamp: '/img/natcolest/ingredients-stamp.webp'
        },



        how_to_take: [
            `<strong>1 comprimido al día durante un mínimo de 30 días.</strong>`,
            `Como cualquier complemento alimenticio, si el paciente está tomando alguna otra
            medicación o sigue una dieta controlada, debe consultar previamente a su médico la convivencia de tomar NatColest®.`
        ],

        consumer_profile: [
            `Personas con hipercolesterolemia leve o moderada, que <strong>no consiguen mejorar su
             colesterol</strong> solo con hábitos saludables.`,
             `Personas con hipercolesterolemia leve o moderada, que <strong>no quieren tomar fármacos de
             prescripción</strong> o prefieren productos naturales.`,
             `Personas con <strong>intolerancia a las estatinas</strong>.`,
             `Como complemento a otros <strong>tratamientos hipolipemiantes</strong> (no estatinas).`
        ],

        warnings: [
            `No debe consumirse una cantidad diaria mayor o igual a 3 mg de monacolinas
            procedentes del arroz fermentado con levadura roja.`,
            `No debe consumirse si ya se consumen otros productos que contienen arroz
            fermentado con levadura roja.`,
            `No debe consumirse junto con medicación para reducir el colesterol.`,
            `No debe ser consumido por mujeres embarazadas o en período de lactancia, niños y
            adolescentes menores de 18 años ni adultos mayores de 70 años.`,
            `No recomendado en caso de enfermedad hepática.`,
            `No recomendado en caso de hipersensibilidad o alergia a cualquiera de los
            ingredientes.`,
            `Si experimenta algún problema de salud, consulte a su médico sobre el consumo de
            este producto.`,
            `Los complementos alimenticios no deben utilizarse como sustitutos de una dieta
            variada y equilibrada y de un estilo de vida saludable.`,
            `Mantener fuera del alcance de los niños más pequeños.`,
            `Conservar en un lugar fresco y seco.`
        ],

        characteristics: [
            `Útil en zonas pequeñas, especial para el uso en
			prurito o irritación anal asociado con hemorroides.`,
            `Para el alivio temporal sintomático del picor de la
			piel (pero no del dolor) debido a pequeñas irritaciones
			de la misma, alergia por contacto con jabones,
			detergentes, metales, picaduras de insectos y ortigas`,
            `Tratamiento local, temporal y sintomático de la
			irritación y prurito externo anal asociado con
			hemorroides.`
        ],
        composition: [
            `El principio activo es hidrocortisona.`,
            `Cada gramo de Calmiox crema contiene 5
			mg de hidrocortisona (5mg/g).`,
            `Los demás componentes son: palmitoestearato
			de etilen y polietilenglicol, glicéridos
			polioxietilenados glicolizados, parafina
			líquida, ácido benzoico (E-210), edetato
			disódico, butilhidroxianisol (E-320),
			bronopol y agua purificada.`
        ],
        contraindications: [
            `Hipersensibilidad al principio activo o a alguno
			de los excipientes incluidos en la sección
			“Composición”`,
            `No usar sobre piel infectada por virus, bacterias
			u hongos, heridas, acné, pie de atleta, úlcera de
			encamados ni escoceduras o irritaciones de los
			pañales.`,
            `No aplicar sobre ojos ni mucosas (anal, genital, bucal).`,
            `No debe aplicarse internamente en la zona anal ni
			en la genital. Este preparado es únicamente de
			uso externo.`,
            `No aplicar en caso de prurito que no presente
			inflamación.`
        ],
        bibliography: [
            `<strong>1</strong>. Colantonio LD, Bittner V, Reynolds K et al. Association of Serum Lipids and Coronary Heart Disease in Contemporary Observational Studies.
                Circulation. 2016;133(3):256–64.`

        ]
    },
    prod_2: {
        name: "Calmiox Espuma",
        img: {
            src: "/img/calmiox/calmiox-expuma-cutanea.webp",
            height: '160px'
        },
        description: `Útil cuando se usa en superficies
									extensas, especial para usar en zonas
									como el cuero cabelludo. Alivia el
									picor de la piel por irritaciones,
									dermatitis de contacto.`,
        links: [
            {
                text: 'Prospecto',
                link: `/materiales-productos/calmiox/EX3663-19-05_Calmiox_5_mgg_espuma_cutanea_Prospecto.pdf`
            },
            {
                text: 'Ficha técnica',
                link: `/materiales-productos/calmiox/Auto-SPC-Calmiox_5_mgg_espuma_cutanea_-Esteve_Pharmaceuticals-Feb2019_FT.pdf`
            }
        ],
        characteristics: [
            `Útil cuando se usa en superficies extensas,
			especial para usar en zonas como el cuero cabelludo.`,
            `Para el alivio temporal sintomático del picor
			de la piel (pero no del dolor) debido a pequeñas
			irritaciones de la misma, alergia por contacto
			con jabones, detergentes, metales, picaduras de
			insectos y ortigas.`
        ],
        composition: [
            `El principio activo es hidrocortisona.`,
            `Cada gramo de Calmiox espuma contiene 5
			mg de hidrocortisona (5 mg/g).`,
            `Los demás componentes son ácido esteárico,
			octanoato cetearilo, octildodecanol,
			parahidroxibenzoato de metilo (E218),
			parahidroxibenzoato de propilo (E216),
			butilhidroxitolueno (E321), edetato
			disódico, estearato sorbitan, polisorbato
			60, carbomero, hidróxido sódico, bronopol,
			agua purificada y propano/isobutano.`
        ],
        contraindications: [
            `Hipersensibilidad al principio activo o a
			alguno de los excipientes incluidos en la
			sección “Composición”.`,
            `No usar sobre piel infectada por virus,
			bacterias u hongos, 	heridas, acné, pie
			de atleta, úlcera de encamados ni escoceduras
			o irritaciones de los pañales.`,
            `No aplicar sobre ojos ni mucosas (anal,
			genital, bucal). Este medicamento está
			destinado únicamente a su uso sobre
			la piel.`
        ]
    },
    how_to_use: [
        `<strong>Uso cutáneo (externo).</strong>`,
        `<strong>Adultos y adolescentes a partir de 12
		años:</strong><br>
		Aplicar sobre la zona afectada una fina película.
		La dosis normal es de 1 o 2 aplicaciones al día.`,
        `<strong>Uso en niños:</strong><br>
		<div>
			<span class="px-3">&middot;</span> Niños menores de 12 años: consultar al médico.
		</div>
		<div>
			<span class="px-3">&middot;</span> Uso en mayores de 65 años: consultar al médico.
		</div>`,
        `<strong>Lávese bien las manos después de su uso.</strong>`,
        `<strong>No aplicar más de 7 días seguidos sin consultar al médico, en ningún caso.</strong>`
    ],
    consumer_profile: [
        `Jóvenes y adultos que se introducen a la categoría y presentan una rotura del ritmo circadiano, con dificultades para conciliar el sueño, desajuste horario o jet lag. Además, buscan productos naturales.`
    ]
}
</script>

<template>
    <section class="wrapper">
        <section class="bg-white pt-10" v-if="currentURL.indexOf('natcolest') === -1">&nbsp;</section>
        <section class="bg-brand-green-dark pt-10">
            <div class="container text-white px-5 pb-10 mx-auto lg:px-0">

                <div class="text-center">
                    <h3 class="text-4xl font-bold leading-none mt-6" v-html="data.intro.title"/>
                    <h3 class="text-2xl font-bold leading-none mt-8" v-html="data.intro.subtitle"/>
                    <div class="mt-4" v-html="data.intro.content"/>
                    <div class="text-sm font-bold mt-6" v-html="data.intro.presentation"/>
                </div>
            </div>
            <div class="bg-brand-orange-light h-12 mt-20"></div>
        </section>
    </section>

    <section class="bg-white">
        <div class="container max-w-sm mx-auto px-5 md:max-w-3xl xl:px-0">
            <div class="grid gap-20 md:grid-cols-1">
                <div class="text-center -mt-44">
                    <img
                        :src="data.prod_1.img.src"
                        :style="{height: data.prod_1.img.height}"
                        class="mx-auto object-contain"
                        alt="Imagen de producto">

                    <div class="-mt-4 sm:mt-6 flex justify-center gap-x-10">
                        <a v-if="data.prod_1.link"
                           :href="data.prod_1.link.link"
                           target="_blank"
                           class="btn-primary block rounded-full"
                        >
                            <span class="text-sm font-bold px-14" v-html="data.prod_1.link.text"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="bg-white pt-10">
        <SectionTitle
            title="¿Cómo funciona?"
            icon="howItWorks"
            color="green-dark"/>

        <div class="bg-gray-light pt-6 pb-10">
            <div class="container max-w-sm mx-auto px-5 md:max-w-3xl xl:px-0">
                <div class="grid gap-10 pl-16 md:pl-28 md:grid-cols-1 md:gap-14">
                    <div>
                        <p
                            class="leading-tight mt-3"
                            v-html="data.prod_1.how_it_works"/>
                    </div>
                </div>
            </div>
        </div>

        <SectionTitle
            title="Ingredientes"
            icon="ingredients"
            color="green-dark"/>

        <div class="bg-gray-light pt-4 pb-10">
            <div class="container max-w-sm mx-auto px-5 md:max-w-3xl xl:px-0">
                <div class="pl-10 md:pl-28 relative">
                    <List :data="data.prod_1.ingredients.content" class="pb-0 -ml-16 md:-ml-28"/>
                    <img alt="" :src="data.prod_1.ingredients.stamp" class="relative top-5 mx-auto sm:absolute sm:-right-20 md:-right-24 xl:-right-32 sm:top-[32%]">
                </div>
            </div>
        </div>


        <SectionTitle
            title="¿Cómo se toma?"
            icon="howItIsTaken"
            color="green-dark"/>

        <div class="bg-gray-light pt-4 pb-10">
            <div class="container max-w-sm mx-auto px-5 md:max-w-3xl xl:px-0">
                <div class="pl-10 md:pl-28">
                    <List :data="data.prod_1.how_to_take" class="pb-0 -ml-16 md:-ml-28"/>
                </div>
            </div>
        </div>


        <SectionTitle
            title="Perfil del consumidor"
            icon="consumerProfile"
            color="green-dark"/>

        <div class="bg-gray-light pt-4 pb-10">
            <div class="container max-w-sm mx-auto px-5 md:max-w-3xl xl:px-0">
                <div class="pl-10 md:pl-28">
                    <List :data="data.prod_1.consumer_profile" class="pb-0 -ml-16 md:-ml-28"/>
                </div>
            </div>
        </div>


        <SectionTitle
            title="Contraindicaciones"
            icon="contraindications"
            color="green-dark"/>

        <div class="bg-gray-light pt-4 pb-10">
            <div class="container max-w-sm mx-auto px-5 md:max-w-3xl xl:px-0">
                <div class="pl-10 md:pl-28">
                    <List :data="data.prod_1.warnings" class="pb-0 -ml-16 md:-ml-28"/>
                </div>
            </div>
        </div>

        <div class="text-xs leading-tight py-8 lg:mt-13 bg-primary-200">
            <div class="container max-w-md mx-auto pl-5 sm:pl-40 pr-5 md:max-w-4xl ">
                <p v-for="(e, i) in data.prod_1.bibliography"
                   :ref="'bi'+i"
                   v-html="e"
                ></p>
            </div>
        </div>

    </div>
</template>


<style scoped>
.wrapper {
    @apply bg-brand-blue-light;
}
</style>
