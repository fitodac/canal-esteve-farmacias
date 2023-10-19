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
		`AfterBite Original alivia y calma de forma inmediata el picor ocasionado por insectos (mosquitos, avispas, abejas o tábanos), medusas* y plantas. Su formato lápiz roll-on es muy fácil de aplicar y de tener siempre a mano. <strong>Para toda la familia, niños a partir de 2 años</strong>.`
	],
	type: 'Productos Mosquitos',
	img: {
		src: "/img/afterbite/afterbite-original.webp",
		height: '400px'
	},
	characteristics: [
		`Eficacia demostrada científicamente`,
		`Contiene 0% de alcohol`,
		`Apto durante el embarazo`,
		`Testado bajo control dermatológico en pieles sensibles`,
		`No mancha y no reseca la piel`
	],
	how_to_use: [
		`Gracias a su formato en lápiz es muy fácil de aplicar. Aplica AfterBite Original sobre la picadura de insecto realizando suaves movimientos circulares. Si en el momento de la aplicación, notas un ligero aumento del picor, significa que AfterBite está haciendo su efecto: aliviar y calmar las molestias en la piel irritada por mosquitos.`
	],
	cautions: [
		`Evitar el contacto con los ojos y la boca. No aplicar sobre heridas abiertas. Mantener el tubo cerrado.`
	],
	composition: [
		`Agua, amoniaco, parafina líquida, dimeticona y C12-13 pareth-3.`
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

	<div class="bg-brand-sky h-12 mt-32"></div>
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