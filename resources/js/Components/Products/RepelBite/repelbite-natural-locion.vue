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
		`Loción corporal formulada con una completa combinación de ingredientes de origen natural para el cuidado de la piel de toda la familia ya que aporta una triple acción.<br>
			<strong>Para adultos y niños a partir de 3 años.</strong>`
	],
	name: 'RepelBite Natural Loción',
	type: 'Productos Mosquitos',
	img: {
		src: "/img/afterbite/repelbite-natural-locion.webp",
		height: '460px'
	},
	characteristics: [
		`RepelBite Natural loción corporal, está formulada con una completa combinación de ingredientes de origen natural para el cuidado de la piel de toda la familia  ya que aporta una triple acción: enriquecida con aceite de citronela y aceite de eucaliptus extra protege la piel, su contenido en aceite de jojoba hidrata intensamente la piel y el agradable olor del aceite de Lavanda ayuda a proporcionar una sensación de relajación.`,
		`<span class="block">Triple acción</span>
			<span class="pl-3 mt-1 block">-  &nbsp;&nbsp; Protege</span>
			<span class="pl-3 mt-1 block">- &nbsp;&nbsp; Hidrata</span>
			<span class="pl-3 mt-1 block">- &nbsp;&nbsp; Relaja</span>`,
		`Apto para pieles sensibles`,
		`Testado dermatológicamente y pediátricamente`,
		`97% ingredientes de origen natural.`
	],
	how_to_use: [
		`Aplicar las veces que se considere.`,
		`Durante el día.`,
		`Antes de ir a dormir.`
	],
	cautions: [
		`Aceite de Citronela`,
		`Aceite de Eucaliptus`,
		`Aceite de Palmarosa`,
		`Geraniol`,
		`Aceite de Jojoba `,
		`Aceite de Girasol`,
		`Ácido Hialurónico`,
		`Glicerina vegetal`,
		`Aceite de Lavanda`
	],
	composition: [
		`Adultos que no les gusta el formato spray, prefieren una textura y formato más agradable (durante el día o especialmente por la noche).`,
		`Adultos y niños (+ 3 años) que realizan rituales de relajación e hidratación (especialmente antes de ir a dormir).`,
		`Personas mayores con pieles secas.`
	],
	contraindications: [
		`No utilizar durante el embarazo, la lactancia ni en menores de 3 años.`,
		`No aplicar en la mano de los niños.`,
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
