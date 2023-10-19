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
		`Repelente de insectos en spray ideal para evitar las picaduras de los insectos y librarte de los mosquitos, incluido el mosquito tigre.<br>
		<strong>Para adultos y niños a partir de 12 meses.</strong>`
	],
	type: 'Productos Mosquitos',
	img: {
		src: "/img/afterbite/repelbite-familiar.webp",
		height: '460px'
	},
	characteristics: [
		`Eficaz frente a Culex pipiens (Mosquito Común), Aedes albopictus (Mosquito tigre) y Aedes aegypti*.`,
		`Protección de hasta 8 horas`,
		`Protección para zonas de clima templado/mediterráneo`,
		`Sin límite de aplicaciones en adultos`,
		`Spray de 100 ml`
	],
	how_to_use: [
		`Gracias a su formato en spray es muy fácil de usar. Aplicar y extender uniformemente RepelBite sobre las zonas de la piel a proteger. Al aplicar el spray repelente, se forma en tu piel una barrera protectora que ahuyenta a los mosquitos de manera eficaz entre 6 y 8 horas.`
	],
	cautions: [
		`No vaporizar directamente sobre la cara, sino que aplicarlo con las manos sin entrar en contacto con los ojos y la boca.`
	],
	composition: [
		`IR3535 20%`
	],
	contraindications: [
		`Mantener fuera del alcance de los niños. Lavarse las manos concienzudamente tras la manipulación.`,
		`EN CASO DE CONTACTO CON LOS OJOS: Aclarar cuidadosamente con agua durante varios minutos. Quitar las lentes de contacto, si lleva y resulta fácil. Seguir aclarando. Si persiste la irritación ocular: Consultar a un médico.`
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

		
		
		<div class="bg-[#D9E6EB] py-4">
			<div class="container max-w-sm mx-auto px-5 md:max-w-3xl xl:px-0">
				<div class="text-xs text-center">
					<p>* Instrucciones del producto ver en: https://www.afterbite.es/</p>
				</div>
			</div>
		</div>
	</div>
</section>
</template>