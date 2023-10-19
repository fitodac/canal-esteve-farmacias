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
		`<strong class="text-xl leading-tight">El efecto de la renovación durante el sueño.</strong>`,
		`DormiNatur&reg; TripleAcción son comprimidos específicamente formulados para favorecer el descanso mientras potencia los efectos renovadores del sueño. Sus comprimidos con tecnología T-I-T (Tablet in tablet), permite una combinación única de ingredientes que ofrecen un triple beneficio sobre el sueño, la renovación física y la función cognitiva.`
	],
	name: "DormiNatur&reg; Triple Acción",
	img: {
		src: "/img/dormi/dorminatur-triple-accion.webp",
		height: '400px'
	},
	features: {
		src: "/img/dormi/dorminatur-triple-accion-features.svg"
	},
    link: "/materiales-productos/dormidina/Etiquetaje_DormiNatur_Triple_Accion.pdf",
	how_it_works: [
		`Gracias a sus ingredientes de origen natural, se podrá tener un sueño reparador y que renueva tanto a nivel físico, como mental y emocional.`
	],
	ingredients: [
		`<strong>Melatonina (1,85 mg):</strong> Contribuye a disminuir el tiempo necesario para conciliar el sueño. El efecto beneficioso se obtiene con una ingesta de 1 mg de melatonina poco antes de irse a dormir.`,
		`<strong>Ginkgo (120 mg):</strong> Favorece la función cognitiva.`,
		`<strong>GABA (100 mg)</strong>`,
		`<strong>Cúrcuma (20 mg):</strong> Contribuye a la protección frente al daño oxidativo.`,
		`<strong>Vitamina B5 (6 mg):</strong> Contribuye al rendimiento intelectual normal.`,
		`<strong>Vitamina B6 (1,4mg):</strong> Favorece la función psicológica normal y disminuye el cansancio y la fatiga.`,
		`<strong>Vitamina D (5 µg):</strong> Contribuye al funcionamiento normal del sistema inmunitario y muscular.`
	],
	how_is_it_taken: [
		`Se recomienda tomar un comprimido al día antes de acostarse.`
	],
	consumer_profile: [
		`Adultos propensos a cuidarse con suplementos nutricionales y que necesitan un plus en su producto para dormir: quieren un sueño reparador para rendir mejor en el día a día.`,
		`Adultos +50 años que se introducen a la categoría y, además de un complemento que les ayude a la inducción del sueño, necesitan un producto que contribuya tanto una renovación física como a favorecer la función cognitiva.`,
		`Deportistas que, por su día a día, tienen mucho desgaste físico y mental. Requieren de un producto que les ayude a conciliar el sueño y que, además, tenga un efecto reparador tanto a nivel físico como mental.`
	],
	contraindications: [
		`No utilizar en mujeres embarazadas en periodo de lactancia, niños menores de 12 años, en personas con cálculos biliaries, en tratamiento con anticoagulantes o antidepresivos.`,
		`Mantener fuera del alcance de los niños más pequeños.`
	]
}
</script>


<template>
<section class="bg-brand-blue pt-10">
	<Intro
		:type="prod_data.type"
		:name="prod_data.name"
		:intro="data.intro" />

	<div class="bg-brand-sky-600 h-12 mt-36"></div>
</section>


<section class="bg-white">
	<div class="container mx-auto px-5 xl:px-0">

		<div class="text-center max-w-sm mx-auto -top-36 relative">
			<img
				:src="data.img.src"
				:style="{height: data.img.height}"
				class="mx-auto object-contain"
				alt="Imagen de producto">

			<img
				:src="data.features.src"
				class="h-20 mx-auto mt-3"
				alt="Beneficios">

			<div class="px-8 mt-5">
				<a :href="data.link" target="_blank" class="btn-primary block rounded-full">
					<span class="text-sm font-bold" v-html="`Etiquetaje de ${data.name}`"/>
				</a>
			</div>
		</div>

	</div>



	<div class="pt-20 -mt-36">
		<SectionTitle
			title="¿Cómo funciona?"
			icon="howItWorks"
			color="blue" />

		<List :data="data.how_it_works" />


		<SectionTitle
			title="Ingredientes"
			icon="ingredients"
			color="blue" />

		<List :data="data.ingredients" />


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

		<List :data="data.contraindications" />

	</div>
</section>
</template>
