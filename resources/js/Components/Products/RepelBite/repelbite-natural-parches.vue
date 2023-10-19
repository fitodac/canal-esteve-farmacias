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
		`RepelBite Natural parches son la opción de protección más natural porque contienen citronela, una planta que desprende un suave olor cítrico. Gracias a su avanzada tecnología de microencapsulamiento, las esencias de los parches se liberan de forma continua, prolongado su acción entre 8 y 12 horas.`
	],
	name: 'RepelBite Natural Parches',
	type: 'Productos Mosquitos',
	img: {
		src: "/img/afterbite/repelbite-natural-parches.webp",
		height: '460px'
	},
	characteristics: [
		`Parches para para colocar sobre la ropa y/o cochecitos de bebé y no sobre la piel.`,
		`Acción protectora sin necesidad de que las esencias aromáticas entren en contacto con la piel.`,
		`Desprenden un agradable aroma hasta 12 horas después.`,
		`Cada caja de Repel Bite Natural contiene 24 parches.`
	],
	how_to_use: [
		`Formato práctico muy fácil de fijar mediante el adhesivo a la ropa y/o en los carritos de bebé.`
	],
	cautions: [
		`No ingerir, no utilizar en caso de hipersensibilidad con alguno de los ingredientes. Evitar contacto con los ojos, mucosas o heridas abiertas. Mantener fuera del alcance y vista de los niños y lejos de alimentos y bebidas.`
	],
	composition: [
		`Aceite esencial de citronela, Co-polímero acrílico, Calendula officinalis.`
	],
	contraindications: [
		`No ingerir.`,
		`No utilizar en caso de hipersensibilidad a cualquiera de los ingredientes.`,
		`Evitar el contacto con los ojos, mucosas y heridas abiertas.`,
		`Mantener fuera del alcance y de la vista de los niños y lejos de alimentos y bebidas.`
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
