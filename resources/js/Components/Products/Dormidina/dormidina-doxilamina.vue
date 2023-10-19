<script setup>
import { dormi } from '@/StaticContent/products.js'
import { usePage } from '@inertiajs/inertia-vue3'

import SectionTitle from '@/Components/Products/SectionTitle.vue'
import List from '@/Components/Products/List.vue'
import Intro from '@/Components/Products/Intro.vue'

const { product } = usePage().props.value
const prod_data = dormi.products.filter(item => item.link.product === product)[0]

const data = {
	intro: [
		`<strong>Es un medicamento indicado para el tratamiento sintómatico del insomnio ocasional en personas mayores de 18 años.</strong>
		Contiene Doxilamina, un principio activo que pertenece a los antihistamínicos y que favorece la conciliación del sueño gracias a sus propiedades sedantes.`
	],
	prod_1: {
		img: {
			src: "/img/dormi/dormidina-doxilamina-12_5mg.webp",
			height: '280px'
		},
		description: "Dormidina&reg; Doxilamina 12,5mg",
		prospect_link: "https://cima.aemps.es/cima/dochtml/p/60154/P_60154.html",
		data_sheet: "https://cima.aemps.es/cima/dochtml/ft/60154/FT_60154.html",
		contraindications: [
			`Hipersensibilidad a la doxilamina o a alguno de los excipientes incluidos en la FT.`,
			`Hipersensibilidad a otros antihistamínicos.`,
			`Dormidina doxilamina está contraindicada durante el embarazo y la lactancia.`
		]
	},
	prod_2: {
		img: {
			src: "/img/dormi/dormidina-doxilamina-25mg.webp",
			height: '280px'
		},
		description: "Dormidina&reg; Doxilamina 25mg",
		prospect_link: "https://cima.aemps.es/cima/dochtml/p/58658/P_58658.html",
		data_sheet: "https://cima.aemps.es/cima/dochtml/ft/58658/FT_58658.html",
		contraindications: [
			`Hipersensibilidad a la doxilamina o a alguno de los excipientes incluidos en la FT.`,
			`Hipersensibilidad a otros antihistamínicos.`,
			`Dormidina doxilamina está contraindicada durante el embarazo y la lactancia.`
		]
	},
	how_it_works: [
		`Dormidina está indicada para el tratamiento sintomático del insomnio ocasional.`,
		`Es un comprimido diseñado para favorecer la conciliación del sueño gracias a los efectos sedantes de su principio activo, la doxilamina.`
	],
	how_is_it_taken: [
		`<strong>Formato:</strong> comprimidos recubiertos con película`,
		`<strong>Posología:</strong> Los comprimidos deben tomarse 30 minutos antes de acostarse`,
		`<strong>Administracieon:</strong> Con una cantidad suficiente de líquido (preferiblemente agua).  Se recomienda calcular bien la hora de despertar a la mañana siguiente, dado que sus efectos duran 8 horas.`,
	],
	consumer_profile: [
		`Persona mayor de 18 años con trastornos del sueño o insomnio debido a la acumulación de estrés, preocupaciones, responsabilidades...`
	]
}
</script>


<template>
<section class="bg-brand-blue pt-10">
	<Intro
		:type="prod_data.type"
		:name="prod_data.name"
		:intro="data.intro" />

	<div class="bg-brand-blue-600 h-12 mt-36"></div>
</section>



<section class="bg-white">
	<div class="container max-w-sm mx-auto px-5 md:max-w-3xl xl:px-0">
		<div class="grid gap-20 md:grid-cols-2">
			<div class="text-center -mt-36">
				<img
					:src="data.prod_1.img.src"
					:style="{height: data.prod_1.img.height}"
					class="mx-auto object-contain"
					alt="Imagen de producto">

				<div class="text-sm mt-8" v-html="data.prod_1.description"/>

				<div class="grid gap-5 mt-5 md:grid-cols-2">
					<div>
						<a :href="data.prod_1.prospect_link" target="_blank" class="btn-primary block rounded-full">
							<span class="text-sm font-bold">Prospecto</span>
						</a>
					</div>

					<div>
						<a :href="data.prod_1.data_sheet" target="_blank" class="btn-primary block rounded-full">
							<span class="text-sm font-bold">Ficha Técnica</span>
						</a>
					</div>
				</div>
			</div>


			<div class="text-center md:-mt-36">
				<img
					:src="data.prod_2.img.src"
					:style="{height: data.prod_2.img.height}"
					class="mx-auto object-contain"
					alt="Imagen de producto">

				<div class="text-sm mt-8" v-html="data.prod_2.description"/>

				<div class="grid gap-5 mt-5 md:grid-cols-2">
					<div>
						<a :href="data.prod_2.prospect_link" target="_blank" class="btn-primary block rounded-full">
							<span class="text-sm font-bold">Prospecto</span>
						</a>
					</div>

					<div>
						<a :href="data.prod_2.data_sheet" target="_blank" class="btn-primary block rounded-full">
							<span class="text-sm font-bold">Ficha Técnica</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="pt-20">
		<SectionTitle
			title="¿Cómo funciona?"
			icon="howItWorks"
			color="blue" />

		<List :data="data.how_it_works" />



		<SectionTitle
			title="¿Cómo se toma?"
			icon="howItIsTaken"
			color="blue" />

		<List :data="data.how_is_it_taken" />



		<SectionTitle
			title="Perfil del consumidor"
			icon="consumerProfile"
			color="blue" />

		<List :data="data.consumer_profile" />


		<SectionTitle
			title="Contraindicaciones"
			icon="contraindications"
			color="blue" />

		<List :data="data.prod_1.contraindications" />





		<div class="bg-gray-light h-20"></div>
	</div>
</section>
</template>
