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
		`RepelBite Natural es una pulsera de nylon aromática con citronela. No contiene ningún insecticida ya que sólo contiene aroma de esencias naturales de citronela, aroma que resulta desagradable a los mosquitos.<br>
			<strong>Para adultos y niños a partir de 3 años.</strong>`
	],
	name: 'RepelBite Natural Pulseras',
	type: 'Productos Mosquitos',
	img: {
		src: "/img/afterbite/repelbite-natural-pulseras.webp",
		height: '460px'
	},
	characteristics: [
		`Pulsera ajustable a muñeca.`,
		`Hasta un mes de duración`,
		`Pulsera resistente al agua.`,
		`Incluye tres pulseras.`
	],
	how_to_use: [
		`Colocar RepelBite Pulsera Natural en la muñeca. Ajustar el tamaño de la pulsera a la medida de tu muñeca. Al llevarla puesta de modo permanente se asegura su acción en el tiempo con un periodo de eficacia una vez abierta de un mes.`
	],
	cautions: [
		`Uso externo. No ingerir ni lamer. Mantener lejos de alimentos y bebidas. Mantener fuera del alcance de los niños menores de 3 años. No utilizar en caso de hipersensibilidad a cualquiera de los ingredientes. Evitar contacto con los ojos, mucosas y heridas abiertas. En caso de ingestión o si observa alguna reacción extraña al producto retire la pulsera del contacto con la piel inmediatamente y consulte con su médico mostrándole la etiqueta.`
	],
	composition: [
		`Aroma de esencia natural de citronela (35% citronellal, 65% citronellol). No contiene insecticidas.`
	],
	contraindications: [
		`No ingerir ni lamer.`,
		`No utilizar en caso de hipersensibilidad a cualquiera de los ingredientes.`,
		`Evitar el contacto con los ojos, mucosas y heridas abiertas.`,
		`Es recomendable lavarse las manos después de su uso`,
		`No deje este producto a la vista y alcance de los niños más pequeños.`,
		`Mantener lejos de alimentos y bebidas.`,
		`En caso de ingestión o si observa alguna reacción extraña al producto retire la pulsera del contacto con la piel inmediatamente y consulte con su médico mostrándole la etiqueta.`
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
