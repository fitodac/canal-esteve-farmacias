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
		`La pulsera RepelBite Niños es una pulsera de silicona click clack con citronela. La pulsera ideal para que los padres estén tranquilo mientras los niños se lo pasen en grande al aire libre.<br>
			<strong>Para adultos y niños a partir de 3 años.</strong>`
	],
	type: 'Productos Mosquitos',
	img: {
		src: "/img/afterbite/repelbite-pulsera-ninos.webp",
		height: '460px'
	},
	characteristics: [
		`Periodo de eficacia una vez abierta: 1 mes`,
		`No contiene insecticidas`
	],
	how_to_use: [
		`Introduce los pins en la pulsera y decórala a tu gusto.`
	],
	cautions: [
		`Contiene un juguete. Se recomienda la vigilancia de un adulto. No conviene para niños menores de 3 años por contener piezas pequeñas que puedan ser ingeridas o inhaladas (peligro de asfixia). No ingerir ni lamer. No utilizar en caso de hipersensibilidad a cualquiera de los ingredientes. Evitar el contacto con los ojos, mucosas y heridas abiertas. Es recomendable lavarse las manos después de su uso.`
	],
	composition: [
		`Aroma de esencia natural de citronela. No contiene insecticidas.`
	],
	contraindications: [
		`Contiene un juguete.`,	
		`Se recomienda la vigilancia de un adulto.`,
		`No conviene para niños menores de 3 años por contener piezas pequeñas que pueden ser ingeridas o inhaladas (peligro de asfixia).`,
		`No ingerir ni lamer.`,
		`No utilizar en caso de hipersensibilidad a cualquiera de los ingredientes.`,
		`Evitar el contacto con los ojos, mucosas y heridas abiertas.`,
		`Es recomendable lavarse las manos después de su uso.`,
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
		:name="prod_data.name" 
		:intro="data.intro" />

	<div class="bg-brand-sky h-12 mt-40"></div>
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