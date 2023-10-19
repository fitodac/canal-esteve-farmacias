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
		`<strong class="text-xl leading-none">DormiNatur&reg; Melatonina es un complemento alimenticio que facilita la regulación del sueño.</strong>`,
		`Es un innovador comprimido de liberación prolongada, está formulado especialmente para favorecer un descanso reparador tanto en el inicio del sueño como a lo largo de la noche.`,
		`<strong>DormiNatur&reg; Melatonina se presenta en dos formatos: <br>
			DormiNatur&reg; Melatonina Comprimidos y DormiNatur&reg; Melatonina Gummies.</strong>`
	],
	prod_1: {
		name: "DormiNatur&reg; Melatonina Comprimidos",
		img: {
			src: "/img/dormi/dorminatur-comprimidos.webp",
			height: '230px'
		},
		description: "La ingesta de 1mg de melatonina contribuye a disminuir el tiempo necesario para conciliar el sueño.",
		features: {
			src: "/img/dormi/dorminatur-comprimidos-features.svg"
		},
        link: "/materiales-productos/dormidina/Etiquetaje_DormiNatur_Melatonina_Comprimidos.pdf",
		how_it_works: [
			`Los comprimidos de DormiNatur tienen una cubierta externa de liberación inmediata y un núcleo central de liberación más lenta (a lo largo de la noche). La cubierta externa de Melatonina se libera inmediatamente y contribuye a disminuir el tiempo necesario para conciliar el sueño.`,
			`El núcleo central combina Pasiflora y GABA. Ambas se liberan más tarde. La pasiflora ayuda a un sueño relajado. El GABA es un aminoácido activo en el sistema nervioso.`
		],
		ingredients: [
			`1 comprimido contiene:<br>
			<strong>&middot; Melatonina (1,85 mg)</strong><br>
			<strong>&middot; Ext. Pasiflora (150 mg)</strong><br>
			<strong>&middot; GABA (100 mg)</strong>`
		],
		how_is_it_taken: [
			`Se recomienda tomar un comprimido al día, procurando que la toma siempre sea a la misma hora y media hora antes de acostarse.`,
			`El efecto beneficioso se obtiene con una ingesta de entre 1 mg y 2 mg de Melatonina un poco antes de irse a dormir.`
		],
		contraindications: [
			`No superar la dosis diaria recomendada.`,
			`Mantener fuera del alcance y de la vista de los niños más pequeños.`
		]
	},
	prod_2: {
		name: "DormiNatur&reg; Melatonina Gummies",
		img: {
			src: "/img/dormi/dorminatur-gummies.webp",
			height: '230px'
		},
		description: "La ingesta de 1mg de melatonina contribuye a disminuir el tiempo necesario para conciliar el sueño.",
		features: {
			src: "/img/dormi/dorminatur-gummies-features.svg"
		},
        link: "/materiales-productos/dormidina/Etiquetaje_DormiNatur_Melatonina_Gummies.pdf",
		how_it_works: [
			`DormiNatur Gummies son una deliciosa y divertida forma de tomar nutrientes. Estos gummies contienen Melatonina, la cual contribuye a disminuir el tiempo necesario para conciliar el sueño.`,
			`Contiene melatonina, una sustancia que se produce en nuestro cuerpo de forma natural y tiene un papel muy importante en la regulación de los ritmos biológicos. La melatonina, actúa sobre los receptores del reloj biológico interno, regula diversos ritmos circadianos, entre ellos el ciclo sueño/vigilia y además tiene efectos directos facilitando el sueño.`
		],
		ingredients: [
			`1 caramelo contiene:<br>
			<strong>&middot; Melatonina (1,0 mg)</strong><br>
			<strong>&middot; Vitamina B6 (0,7 mg)</strong>`
		],
		how_is_it_taken: [
			`Se recomienda tomar un gummy al día, procurando que la toma siempre sea media hora antes de acostarse.`,
			`El efecto beneficioso se obtiene con una ingesta de un gummy de melatonina un poco antes de irse a dormir.`
		],
		contraindications: [
			`Mantener fuera del alcance y de la vista de los niños más pequeños.`
		]
	},
	consumer_profile: [
		`Jóvenes y adultos que se introducen a la categoría y presentan una rotura del ritmo circadiano, con dificultades para conciliar el sueño, desajuste horario o jet lag. Además, buscan productos naturales.`
	]
}
</script>


<template>
<section class="bg-brand-blue pt-10">
	<Intro
		:type="prod_data.type"
		:name="prod_data.name"
		:intro="data.intro" />

	<div class="bg-brand-orange h-12 mt-36"></div>
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

				<img
					:src="data.prod_1.features.src"
					class="h-20 mx-auto mt-3"
					alt="Beneficios">

				<div class="mt-8">
					<a :href="data.prod_1.link" target="_blank" class="btn-primary block rounded-full">
						<span class="text-sm font-bold" v-html="`Etiquetaje de ${data.prod_1.name}`"/>
					</a>
				</div>
			</div>


			<div class="text-center md:-mt-36">
				<img
					:src="data.prod_2.img.src"
					:style="{height: data.prod_2.img.height}"
					class="mx-auto object-contain"
					alt="Imagen de producto">

				<div class="text-sm mt-8" v-html="data.prod_2.description"/>

				<img
					:src="data.prod_2.features.src"
					class="h-20 mx-auto mt-3"
					alt="Beneficios">

				<div class="mt-8">
					<a :href="data.prod_2.link" target="_blank"  class="btn-primary block rounded-full">
						<span class="text-sm font-bold" v-html="`Etiquetaje de ${data.prod_2.name}`"/>
					</a>
				</div>
			</div>
		</div>
	</div>




	<div class="pt-20">
		<SectionTitle
			title="¿Cómo funciona?"
			icon="howItWorks"
			color="blue" />

		<div class="bg-gray-light pt-7 pb-16">
			<div class="container max-w-sm mx-auto px-5 md:max-w-3xl xl:px-0">

				<div class="grid gap-10 pl-16 md:pl-28 md:grid-cols-2 md:gap-14">
					<div>
						<div class="font-bold" v-html="data.prod_1.name"/>

						<p
							v-for="(p, i) in data.prod_1.how_it_works"
							:key="i"
							class="leading-tight mt-3"
							v-html="p" />
					</div>

					<div>
						<div class="font-bold" v-html="data.prod_2.name"/>

						<p
							v-for="(p, i) in data.prod_2.how_it_works"
							:key="i"
							class="leading-tight mt-3"
							v-html="p" />
					</div>
				</div>

			</div>
		</div>




		<SectionTitle
			title="Ingredientes"
			icon="ingredients"
			color="blue" />

		<div class="bg-gray-light pt-7 pb-16">
			<div class="container max-w-sm mx-auto px-5 md:max-w-3xl xl:px-0">

				<div class="grid gap-10 pl-16 md:pl-28 md:grid-cols-2 md:gap-14">
					<div>
						<div class="font-bold" v-html="data.prod_1.name"/>

						<p
							v-for="(p, i) in data.prod_1.ingredients"
							:key="i"
							class="leading-tight mt-3"
							v-html="p" />
					</div>

					<div>
						<div class="font-bold" v-html="data.prod_2.name"/>

						<p
							v-for="(p, i) in data.prod_2.ingredients"
							:key="i"
							class="leading-tight mt-3"
							v-html="p" />
					</div>
				</div>

			</div>
		</div>




		<SectionTitle
			title="¿Cómo se toma?"
			icon="howItIsTaken"
			color="blue" />

		<div class="bg-gray-light pt-7 pb-16">
			<div class="container max-w-sm mx-auto px-5 md:max-w-3xl xl:px-0">

				<div class="grid gap-10 pl-16 md:pl-28 md:grid-cols-2 md:gap-14">
					<div>
						<div class="font-bold" v-html="data.prod_1.name"/>

						<p
							v-for="(p, i) in data.prod_1.how_is_it_taken"
							:key="i"
							class="leading-tight mt-3"
							v-html="p" />
					</div>

					<div>
						<div class="font-bold" v-html="data.prod_2.name"/>

						<p
							v-for="(p, i) in data.prod_2.how_is_it_taken"
							:key="i"
							class="leading-tight mt-3"
							v-html="p" />
					</div>
				</div>

			</div>
		</div>




		<SectionTitle
			title="Perfil del consumidor"
			icon="consumerProfile"
			color="blue" />

		<div class="bg-gray-light pt-7 pb-16">
			<div class="container max-w-sm mx-auto px-5 md:max-w-3xl xl:px-0">

			<div class="pl-16 md:pl-28">
				<p
					v-for="(p, i) in data.consumer_profile"
					:key="i"
					class="leading-tight mt-3"
					v-html="p" />
			</div>

			</div>
		</div>




		<SectionTitle
			title="Contraindicaciones"
			icon="contraindications"
			color="blue" />

		<div class="bg-gray-light pt-7 pb-16">
			<div class="container max-w-sm mx-auto px-5 md:max-w-3xl xl:px-0">

				<div class="grid gap-10 pl-16 md:pl-28 md:grid-cols-2 md:gap-14">
					<div>
						<div class="font-bold" v-html="data.prod_1.name"/>

						<List :data="data.prod_1.contraindications" class="pb-0 -ml-16 md:-ml-28" />
					</div>

					<div>
						<div class="font-bold" v-html="data.prod_2.name"/>

						<List :data="data.prod_2.contraindications" class="pb-0 -ml-16 md:-ml-28" />
					</div>
				</div>

			</div>
		</div>



		<div class="bg-gray-light h-20"></div>
	</div>
</section>
</template>
