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
        `Elige RepelBite Xtreme en tus viajes a zonas tropicales o con elevado riesgo de transmisión de enfermedades transmitidas por la picadura de mosquitos, como la malaria, la fiebre amarilla, el dengue o el Zika.
RepelBite Xtreme te proporciona protección incluso bajo las condiciones climáticas y ambientales más severas.<br>
			<strong>Para adultos y niños a partir de 12 años.</strong>`
    ],
	type: 'Productos Mosquitos',
	img: {
		src: "/img/afterbite/repelbite-xtreme.webp",
		height: '460px'
	},
	characteristics: [
		`Eficaz frente al mosquito Aedes aegypti transmisor del virus Zika, fiebre amarilla y chikungunya, frente al mosquito Aedes albopictus o Mosquito tigre transmisor del dengue y el chikungunya, frente al mosquito Anopheles transmisor de la malaria y frente al Culex pipiens o Mosquito Común, Mosca negra, Pulgas, Chinches**.`,
		`Protección de hasta 5 horas`,
		`Protección para zonas de clima tropical`,
		`Alta protección: concentración óptima para zonas de alto riesgo de transmisión`,
		`(DEET 30%)`,
		`Spray de 100 ml`
	],
	how_to_use: [
		`Gracias a su formato en spray es muy fácil de usar. Aplicar y extender uniformemente RepelBite sobre las zonas de la piel a proteger. Al aplicar el spray repelente, se forma en tu piel una barrera protectora que repele a los mosquitos de manera eficaz de 5 a 8 horas.`
	],
	composition: [
		`DEET 30%`
	],
	contraindications: [
		`Contiene citral y limoneno.`,
		`Puede provocar una reacción alérgica.`,
		`Mantener fuera del alcance de los niños.`,
		`Lavarse las manos concienzudamente tras la manipulación.`
	]
}
</script>


<template>
<section class="bg-brand-magenta pt-10">
	<Intro
		:type="data.type"
		:name="`${prod_data.name}*`"
        :intro="data.intro"/>

	<div class="bg-brand-orange h-12 mt-40"></div>
</section>



<section class="bg-white">
	<div class="container mx-auto px-5 xl:px-0">

		<div class="text-center max-w-sm mx-auto -top-44 relative">
			<img
				:src="data.img.src"
				:style="{maxHeight: data.img.height}"
				class="mx-auto object-contain"
				alt="Imagen de producto">
		</div>

	</div>




	<div class="-mt-40">
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
			title="Composición"
			icon="bottle"
			color="magenta" />

		<List :data="data.composition" />


		<SectionTitle 
			title="Contraindicaciones" 
			icon="contraindications"
			color="magenta" />

		<List :data="data.contraindications" />
		

		<div class="bg-[#D9E6EB] py-4">
			<div class="container max-w-sm mx-auto px-5 md:max-w-3xl xl:px-0">
				<div class="text-xs text-center">
					<p>*Utilice los biocidas de forma segura. Lea siempre la etiqueta y la información sobre los productos antes de usarlos.</p>
					<p>**Instrucciones del producto ver en:  https://www.afterbite.es/</p>
				</div>
			</div>
		</div>
	</div>
</section>
</template>
