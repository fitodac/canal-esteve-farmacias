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
		`AfterBite Xtreme calma de forma inmediata el picor en tu piel ocasionado por las picaduras de insectos (mosquitos, avispas, abejas o tábanos), medusas* y plantas. Ofrece un alivio de larga duración. Su fórmula en gel es ideal para calmar y refrescar la piel cuando la zona afectada es extensa. <br>
			<strong>Para toda la familia, niños y bebés a partir de 2 años.</strong>`
	],
	type: 'Productos Mosquitos',
	img: {
		src: "/img/afterbite/afterbite-extreme.webp",
		height: '400px'
	},
	characteristics: [
		`Testado bajo control dermatológico en pieles sensibles.`,
		`Efecto de larga duración.`,
		`Apto durante el embarazo.`,
		`Fórmula en gel para aplicar sobre zonas extensas.`,
		`Incorpora Aceite de árbol de té y otras propiedades calmantes y suavizantes.`
	],
	how_to_use: [
		`Su presentación en gel es la más adecuada para calmar y refrescar tu piel en zonas afectadas extensas.`,
		`Aplicar After Bite Xtreme con un suave masaje en la zona afectada. Una vez aplicado sobre la piel dejar al descubierto permitiendo que se seque. En el momento de la aplicación puede notarse un ligero aumento del picor lo que significa que el producto está haciendo efecto.`
	],
	cautions: [
		`Uso externo. No ingerir. Evitar el contacto con los ojos y la boca.`,
		`No aplicar sobre heridas abiertas.`,
		`Mantener el tubo cerrado.`
	],
	composition: [
		`Agua, amoniaco, bicarbonato sódico, carbopol, Malaleuca alternifoia (hoja árbol de té) y limoneno.`
	],
	contraindications: [
		`No aplicar sobre heridas abiertas.`,
		`Contiene amoníaco.`
	]
}
</script>


<template>
<section class="bg-brand-magenta pt-10">
	<Intro 
		:type="data.type" 
		:name="prod_data.name" 
		:intro="data.intro" />

	<div class="bg-brand-orange h-12 mt-32"></div>
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