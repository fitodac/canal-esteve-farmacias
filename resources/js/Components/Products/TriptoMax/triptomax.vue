<script setup>
import { triptomax } from '@/StaticContent/products.js'
import { usePage } from '@inertiajs/inertia-vue3'

import SectionTitle from '@/Components/Products/SectionTitle.vue'
import List from '@/Components/Products/List.vue'
import Intro from '@/Components/Products/Intro.vue'

const { product } = usePage().props.value
const prod_data = triptomax.products.filter(item => item.link.product === product)[0]

const data = {
	intro: [
		`Triptomax es un complemento alimenticio a base de triptófano con vitaminas del grupo B, hierro y magnesio.`
	],
	name: "Triptomax",
	img: {
		src: "/img/triptomax/triptomax.webp",
		height: '280px'
	},
	how_is_it_taken: [
		`Toma 2 comprimidos al día.`,
		`Preferiblemente, tomar ambos comprimidos antes de cualquier comida. Si se prefiere, se puede tomar un comprimido antes del desayuno y otro antes del almuerzo o la cena.`,
		`Se puede tomar de forma continuada durante 3 meses y hacer un descanso de 1 mes.`,
		`Triptomax empieza a actuar desde la primera toma aunque sus efectos se perciben a partir de la primera semana de tomarlo.`,
		`Como cualquier complemento alimenticio, si el paciente está tomando alguna otra medicación o sigue una dieta controlada, debe consultar previamente a su médico la conveniencia de tomar Triptomax.`
	],
	consumer_profile: [
		`Personas que sienten cansancio o fatiga originado por:<br>
		<span class="pl-4 mt-3 block">- &nbsp;&nbsp; El día a día</span>
		<span class="pl-4 mt-3 block">- &nbsp;&nbsp; Períodos de cambios estacionales</span>
		<span class="pl-4 mt-3 block">- &nbsp;&nbsp; Períodos de dietas</span>`
	],
	ingredients: [
		`<strong>L-triptófano (600 mg):</strong> El triptófano es un aminoácido esencial que sólo se obtiene a través de la alimentación o a través de un complemento alimenticio y ayuda a nuestro cuerpo a producir serotonina, un neurotransmisor que interviene en la regulación de tu estado de ánimo.`,
		`<strong>Magnesio (120mg):</strong> El magnesio es un elemento esencial en el cuerpo humano ya que ayuda a disminuir el cansancio y la fatiga, y contribuye al funcionamiento normal del sistema nervioso, a la función psicológica normal y al metabolismo energético normal. Además participa en el metabolismo del triptófano, haciendo que nuestro cuerpo pueda transformar de forma eficaz el triptófano en serotonina.`,
		`<strong>Vitamina B3 (4,8 mg).</strong>`,
		`<strong>Hierro (4,2 mg):</strong> El hierro ayuda a disminuir el cansancio y la fatiga.`,
		`<strong>Vitamina B5 (4 mg).</strong>`,
		`<strong>Vitamina B6 (1,4 mg):</strong> Contribuye a la función psicológica normal y ayuda a disminuir el cansancio y la fatiga.`,
	],
	link: "/materiales-productos/triptomax/Etiquetaje_Triptomax.pdf",
	contraindications: [
		`No se recomienda usar este producto durante el período de lactancia.`,
		`No debe ser consumido por mujeres embarazadas, ni por aquellas personas que estén siendo tratadas con antidepresivos, tranquilizantes o que padezcan insuficiencia renal.`,
		`No recomendado en el caso de hipersensibilidad o alergia a cualquiera de los ingredientes.`,
		`No superar la dosis diaria recomendada.`,
		`Los complementos alimenticios no deben utilizarse como sustitutos de una dieta variada y equilibrada y de un estilo de vida saludable.`,
		`No se recomienda su uso en niños menores de 12 años.`,
		`Mantener fuera del alcance de los niños más pequeños.`
	]
}
</script>


<template>
<section class="bg-brand-purple pt-10">
	<Intro
		:type="prod_data.type"
		:name="prod_data.name"
		:intro="data.intro" />

	<div class="bg-brand-blue-600 h-12 mt-36"></div>
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
				src="/img/triptomax/triptomax-features-sm.svg"
				class="h-20 mx-auto mt-3 md:hidden"
				alt="Beneficios">

			<img
				src="/img/triptomax/triptomax-features-lg.svg"
				class="hidden h-24 mx-auto mt-3 md:block"
				alt="Beneficios">

			<div class="px-8 mt-8">
				<a :href="data.link" target="_blank" class="btn-primary block rounded-full">
					<span class="text-sm font-bold" v-html="`Etiquetaje de ${data.name}`"/>
				</a>
			</div>
		</div>

	</div>


	<div class="-mt-20">
		<SectionTitle
			title="¿Cómo funciona?"
			icon="howItWorks"
			color="purple" />

		<div class="bg-gray-light pt-7 pb-16">
			<div class="container max-w-sm mx-auto px-5 md:max-w-3xl xl:px-0">

				<div class="text-sm leading-tight pl-16 md:pl-32 md:text-base md:leading-tight">
					<div>Triptomax ayuda a gestionar las épocas en que te sientes con decaimiento y fatiga. <br>Te ayuda al:</div>

					<div class="flex items-center gap-x-7 mt-6">
						<img src="/img/triptomax/icon-heart.svg" alt="Bienestar emocional">
						<div><strong>Bienestar emocional:</strong> Contribuye al funcionamiento psicológico normal<sup>1</sup>.</div>
					</div>

					<div class="flex items-center gap-x-7 mt-3">
						<img src="/img/triptomax/icon-man.svg" alt="Bienestar físico">
						<div><strong>Bienestar físico:</strong> Ayuda a disminuir el cansancio y la fatiga<sup>2</sup>.</div>
					</div>
				</div>

			</div>
		</div>


		<SectionTitle
			title="Ingredientes"
			icon="ingredients"
			color="purple" />

		<div class="bg-gray-light pt-7 pb-16">
			<div class="container max-w-sm mx-auto px-5 md:max-w-3xl xl:px-0">

				<div class="pl-16 md:pl-32">
					<div class="text-sm leading-tight md:text-base md:leading-tight">Con ingredientes de origen natural*. Ingredientes por dosis (2 comprimidos):</div>

					<ul class="pl-4 mt-6">
						<li
							v-for="(item, i) in data.ingredients"
							:key="i"
							class="text-sm leading-tight flex gap-x-3 md:text-base md:leading-tight"
							:class="{'mt-2': i}">
							<div>
								<span class="bg-gray-500 w-[3px] h-[3px] block top-2.5 relative rounded-full"></span>
							</div>
							<div v-html="item"/>
						</li>
					</ul>
				</div>

			</div>
		</div>



		<SectionTitle
			title="¿Cómo se toma?"
			icon="howItIsTaken"
			color="purple" />

		<List :data="data.how_is_it_taken" />



		<SectionTitle
			title="Perfil del consumidor"
			icon="consumerProfile"
			color="purple" />

		<List :data="data.consumer_profile" />



		<SectionTitle
			title="Contraindicaciones"
			icon="contraindications"
			color="purple" />

		<List :data="data.contraindications" />



		<div class="bg-[#D9E6EB] py-4">
			<div class="container max-w-sm mx-auto px-5 md:max-w-3xl xl:px-0">
				<div class="text-xs">
					<p>1. La Vitamina B6 favorece el funcionamiento psicológico normal.</p>
					<p>2. El magnesio ayuda a disminuir el cansancio y la fatiga.</p>
					<p>* El triptófano y el magnesio son ingredientes de origen natural.</p>
				</div>
			</div>
		</div>
	</div>
</section>
</template>
