<script setup>
import { dormi } from '@/StaticContent/products.js'
import { usePage } from '@inertiajs/inertia-vue3'

import SectionTitle from '@/Components/Products/SectionTitle.vue'
import List from '@/Components/Products/List.vue'
import Intro from '@/Components/Products/Intro.vue'

const { product } = usePage().props.value
const prod_data = dormi.products.filter(item => item.link.product === product)[0]

const data = {
	intro: [
		`<strong class="text-xl leading-tight">DormiNatur&reg; Valeriana es un complemento alimenticio que contiene Pasiflora que ayuda a inducir la relajación y el sueño natural y Amapola de California que mejora la calidad del sueño natural.</strong>`,
		`DormiNatur&reg; Valeriana son comprimidos infusionables a base de Valeriana, Pasiflora y Amapola de California, plantas que favorecen la relajación y el sueño natural. A consecuencia del acelerado ritmo de vida, estrés, problemas cotidianos, etc., cada vez son más las personas que necesitan una ayuda para relajarse y dormir. Para ello, existen ingredientes como Valeriana, Pasiflora y Amapola de California que contribuyen a disminuir el estrés, a relajarnos y a conciliar el sueño de forma más natural. Sus efectos son beneficiosos para el relax diario y en la calidad del sueño.`
	],
	name: "DormiNatur&reg; Valeriana",
	img: {
		src: "/img/dormi/dorminatur-valeriana.webp",
		height: '300px'
	},
    link: "/materiales-productos/dormidina/Etiquetaje_DormiNatur_Valeriana.pdf",
	how_it_works: [
		`Son comprimidos influsionables a base de Valeriana, Pasiflora y Amapola de California, plantas que favorecen la relajación y el sueño natural.`
	],
	ingredients: [
		`<strong>Valeriana (150 mg):</strong> Destaca especialmente por su efecto relajante y contribuye al inicio del sueño, y obtener un sueño natural. Ayuda a lidiar con calma el estrés de un estilo de vida ocupado y al bienestar mental en casos de tensión y estrés. Además contribuye a recuperar el bienestar físico y mental.`,
		`<strong>Pasiflora (50 mg):</strong>  Ayuda al relax y al mantenimiento del sueño.`,
		`<strong>Amapola de California (50 mg):</strong> La Amapola de California ayuda a controlar las situaciones de estrés y al relax (ante situaciones estresantes y de ansiedad). Mejora la calidad de un sueño natural.`,
		`<strong>Corteza de limón:</strong> Aporta el sabor y el aroma de limón.`
	],
	how_is_it_taken: [
		`Para facilitar el inicio del sueño se recomienda la toma de 1-2 comprimidos media hora antes de acostarse.`,
		`Para la relajación y el descanso tranquilo, se recomienda la toma de 1 comprimido hasta tres veces al día.`,
		`Los comprimidos se pueden tomar directamente o en infusión disueltos en agua caliente.`
	],
	consumer_profile: [
		`Jóvenes y adultos que presentan muchos nervios, estrés o un principio de ansiedad como problema principal para dormir y que buscan una solución natural`
	],
	contraindications: [
		`No superar la dosis diaria recomendada.`,
		`Mantener fuera del alcance y de la vista de los niños más pequeños.`
	]
}
</script>


<template>
<section class="bg-brand-blue pt-10">
	<Intro
		:type="prod_data.type"
		:name="prod_data.name"
		:intro="data.intro" />

	<div class="bg-brand-green h-12 mt-36"></div>
</section>


<section class="bg-white">
	<div class="container mx-auto px-5 xl:px-0">

		<div class="text-center max-w-sm mx-auto -top-36 relative">
			<img
				:src="data.img.src"
				:style="{height: data.img.height}"
				class="mx-auto object-contain"
				alt="Imagen de producto">

			<div class="px-8 mt-5">
				<a :href="data.link" target="_blank" class="btn-primary block rounded-full">
					<span class="text-sm font-bold" v-html="`Etiquetaje de ${data.name}`"/>
				</a>
			</div>
		</div>

	</div>



	<div class="pt-20 -mt-36">
		<SectionTitle
			title="¿Cómo funciona?"
			icon="howItWorks"
			color="blue" />

		<List :data="data.how_it_works" />


		<SectionTitle
			title="Ingredientes"
			icon="ingredients"
			color="blue" />

		<List :data="data.ingredients" />


		<SectionTitle
			title="¿Cómo se toma?"
			icon="howItIsTaken"
			color="blue" />

		<List :data="data.how_is_it_taken" />


		<SectionTitle
			title="Perfil del consumidor"
			icon="consumerProfile"
			color="blue" />

		<List :data="data.consumer_profile" />


		<SectionTitle
			title="Contraindicaciones"
			icon="contraindications"
			color="blue" />

		<List :data="data.contraindications" />

	</div>
</section>
</template>
