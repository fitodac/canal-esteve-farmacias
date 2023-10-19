<script setup>
import { mosquitos } from '@/StaticContent/products.js'
import { usePage } from '@inertiajs/inertia-vue3'

import SectionTitle from '@/Components/Products/SectionTitle.vue'
import List from '@/Components/Products/List.vue'
import Intro from '@/Components/Products/Intro.vue'

const { product } = usePage().props.value
const prod_data = mosquitos.products.afterbite.filter(item => item.link.product === product)[0]

const data = {
	intro: [
		`AfterBite Pediátrico es una crema para aliviar el picor ocasionado por picaduras de insectos (mosquitos, avispas, abejas o tábanos), medusas* y plantas. Está formulada específicamente para aliviar el picor en las pieles más sensibles. Gracias a su fórmula a base de ingredientes naturales que proporciona una sensación de frescura y bienestar en la piel hace que sea la crema para picaduras ideal para niños y bebés. <br>
		<strong>Para toda la familia, niños y bebés a partir de 0 años.</strong>`
	],
	type: 'Productos Mosquitos',
	img: {
		src: "/img/afterbite/afterbite-pediatrico.webp",
		height: '400px'
	},
	characteristics: [
		`Testado bajo control dermatológico y pediátrico`,
		`Contiene 0% alcohol`,
		`Apto durante el embarazo`,
		`Fórmula exclusiva que proporciona una sensación de frescura y bienestar`,
		`Contiene ingredientes naturales como aceite de árbol de té, aceite de eucalipto, Aloe Vera y Vitamina E`
	],
	how_to_use: [
		`Aplicar AfterBite Pediátrico es muy fácil: aplicarlo con un suave masaje en la zona afectada. Una vez aplicado sobre la piel dejarla al descubierto permitiendo que se seque.`
	],
	cautions: [
		`No ingerir, Evitar el contacto con los ojos y la boca. Mantener el tubo cerrado.`
	],
	composition: [
		`Agua, alcohol cetoestearílico, polisorbato 60, bicarbonato sódico, fosfato de oleth-3, fosfato de oleth-10, Eucalyptus globulus, Malaleuca alternifoia (hoja árbol de té), acetato de tocoferol, dimeticona, Aloe barbadiensis (Aloe vera) y limoneno.`
	],
	contraindications: [
		`Evitar el contacto con los ojos y la boca.`,
		`Mantener el tubo cerrado.`
	]
}
</script>


<template>
<section class="bg-brand-magenta pt-10">
	<Intro 
		:type="data.type" 
		:name="prod_data.name" 
		:intro="data.intro" />

	<div class="bg-brand-green h-12 mt-32"></div>
</section>



<section class="bg-white">
	<div class="container mx-auto px-5 xl:px-0">

		<div class="text-center max-w-sm mx-auto -top-36 relative">
			<img 
				:src="data.img.src" 
				:style="{maxHeight: data.img.height}"
				class="mx-auto object-contain"
				alt="Imagen de producto">
		</div>

	</div>




	<div class="-mt-20">
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
					<p>*Testado en <em>Pelagia noctiluca</em>. Otras especies consultar con el médico.</p>
				</div>
			</div>
		</div>
	</div>
</section>
</template>