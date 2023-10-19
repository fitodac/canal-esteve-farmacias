<script setup>
import { mosquitos } from '@/StaticContent/products.js'
import { usePage } from '@inertiajs/inertia-vue3'

import SectionTitle from '@/Components/Products/SectionTitle.vue'
import List from '@/Components/Products/List.vue'
import Intro from '@/Components/Products/Intro.vue'

const { product } = usePage().props.value
const prod_data = mosquitos.products.repelbite.filter(item => item.link.product === product)[0]

const data = {
	intro: [
		`Es una barra formulada con una completa combinación de ingredientes de origen natural para el cuidado de la piel, en un cómodo formato de bolsillo.<br>
			<strong>Para adultos y niños a partir de 3 años.</strong>`
	],
	name: 'RepelBite Natural Barra',
	type: 'Productos Mosquitos',
	img: {
		src: "/img/afterbite/repelbite-natural-barra.webp",
		height: '460px'
	},
	characteristics: [
		`RepelBite Natural Barra está formulada con una completa combinación de ingredientes de origen natural como la manteca de Cacao, el aceite de Citronela, de Jengibre y de Palmarosa para el cuidado de la piel de toda la familia en un cómodo formato de bolsillo.`,
		`Ideal para actividades al aire libre gracias a su fácil y directa aplicación sobre la piel sin necesidad de mancharse las manos.`,
		`98% ingredientes de origen natural.`,
		`Apto para pieles sensibles.`,
		`Testado dermatológicamente y pediátricamente.`,
		`Protege la piel.`,
		`Hidrata la piel.`
	],
	how_to_use: [
		`Aplicar las veces que se considere, especialmente durante el día.`,
		`Ideal para actividades al aire libre gracias a su fácil y directa aplicación sobre la piel sin necesidad de mancharse las manos.`
	],
	cautions: [
		`Aceite de Citronela`,
		`Eucaliptus`,
		`Geraniol`,
		`Aceite de Ricino`,
		`Manteca de Cacao`,
		`Cera Alba (cera de abejas)`
	],
	composition: [
		`Personas que buscan un formato cómodo de llevar (en excursiones y viajes, en el bolso en el día a día…).`,
		`Personas que buscan un formato práctico de aplicar durante el día (no ensuciarse las manos).`,
		`Personas que prefieren un producto natural para cuidar y proteger su piel y la de sus hijos (+3 años).`
	],
	contraindications: [
		`No utilizar durante el embarazo, la lactancia ni en menores de 3 años.`,
		`Evitar el contacto con los ojos, la boca y las mucosas.`,
		`No utilizar en caso de alergia a algunos de sus ingredientes.`,
		`No ingerir.`
	]
}
</script>


<template>
<section class="bg-brand-magenta pt-10">
	<Intro
		:type="data.type"
		:name="data.name"
		:intro="data.intro" />

	<div class="bg-brand-green h-12 mt-40"></div>
</section>



<section class="bg-white container-natural">
	<div class="container mx-auto px-5 xl:px-0">

		<div class="text-center max-w-sm mx-auto -top-44 relative">
			<img
				:src="data.img.src"
				:style="{maxHeight: data.img.height}"
				class="mx-auto object-contain"
				alt="Imagen de producto">
		</div>

	</div>




	<div class="-mt-32">
		<SectionTitle
			title="Características"
			icon="checklist"
			color="magenta" />

		<List :data="data.characteristics" />



		<SectionTitle
			title="Modo de empleo"
			icon="howItWorks"
			color="magenta" />

		<List :data="data.how_to_use" />



		<SectionTitle
			title="Precauciones"
			icon="alert"
			color="magenta" />

		<List :data="data.cautions" />



		<SectionTitle
			title="Composición"
			icon="bottle"
			color="magenta" />

		<List :data="data.composition" />


		<SectionTitle 
			title="Contraindicaciones" 
			icon="contraindications"
			color="magenta" />

		<List :data="data.contraindications" />


		<div class="bg-gray-light h-10"></div>

	</div>
</section>
</template>
