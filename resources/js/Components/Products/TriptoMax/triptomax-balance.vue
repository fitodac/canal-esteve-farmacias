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
		`Triptomax Balance, gracias a su completa e innovadora fórmula ayuda a gestionar el estrés<sup>1</sup>.`
	],
	name: "Triptomax",
	img: {
		src: "/img/triptomax/triptomax-balance.webp",
		height: '280px'
	},
	how_is_it_taken: [
		`Se debe tomar 1 comprimido al día, preferentemente por la mañana con el desayuno.`,
		`Tecnología bicapa con una capa de liberación inmediata y la otra de liberación retardada aporta un efecto prolongado para afrontar el estrés temporal durante todo el día.`,
		`Como cualquier complemento alimenticio, si el paciente está tomando algún tipo de medicación o sigue una dieta equilibrada, debe consultar previamente a su médico la conveniencia de tomar Triptomax Balance.`
	],
	consumer_profile: [
		`Personas que se encuentran en situaciones de estrés pasajero originado por:<br>
		<span class="pl-4 mt-3 block">- &nbsp;&nbsp; Trabajo: presentaciones, reuniones…</span>
		<span class="pl-4 mt-3 block">- &nbsp;&nbsp; Estudios: exámenes, entregas de trabajos…</span>
		<span class="pl-4 mt-3 block">- &nbsp;&nbsp; Conciliación familiar</span>
		<span class="pl-4 mt-3 block">- &nbsp;&nbsp; Ritmo de vida actual</span>`
	],
	ingredients: [
		`<strong>L-triptófano (100 mg):</strong> El triptófano es un aminoácido esencial que sólo se obtiene a través de la alimentación o a través de un complemento alimenticio y ayuda a nuestro cuerpo a producir serotonina, un neurotransmisor que interviene en la regulación de tu estado de ánimo<sup>6</sup>.`,
		`<strong>Albahaca Morada (80 mg):</strong> Ayuda a mantener la resistencia al estrés<sup>3</sup>.`,
		`<strong>Magnesio (60mg):</strong> El magnesio es un elemento esencial en el cuerpo humano ya que ayuda a disminuir el cansancio y la fatiga, y contribuye al funcionamiento normal del sistema nervioso, a la función psicológica normal y al metabolismo energético normal. Además participa en el metabolismo del triptófano, haciendo que nuestro cuerpo pueda transformar de forma eficaz el triptófano en serotonina<sup>4</sup>.`,
		`<strong>Ashwagandha (50 mg):</strong> Es una planta adaptógena que ayuda a mantener el equilibrio y la estabilidad emocional y también ayuda al cuerpo a lidiar con el estrés<sup>2</sup>.`,
		`<strong>Azafrán (30 mg):</strong> Ayuda a mantener un estado de ánimo positivo y apoyar la relajación<sup>1</sup>.`,
		`<strong>Vitamina B12 (5 mg).</strong>`,
		`<strong>Vitamina B6 (1,4 mg):</strong> participa en el metabolismo del triptófano, haciendo que nuestro cuerpo pueda transformar de forma eficaz el triptófano en serotonina<sup>5</sup>.`,
		`<strong>Vitamina B1 (1,1 mg).</strong>`,
	],
	link: "/materiales-productos/triptomax/Etiquetaje_Triptomax.pdf",
	contraindications: [
		`No superar la dosis diaria expresamente recomendada.`,
		`No debe ser consumido por mujeres embarazadas, ni por aquellas personas que estén siendo tratadas con antidepresivos, tranquilizantes o que padezcan insuficiencia renal.`,
		`Mantener fuera del alcance de los niños más pequeños.`,
		`No se recomienda su uso en niños menores de 12 años.`,
		`Consulte a un especialista en caso de uso prolongado.`
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
					<div>Triptomax Balance ayuda a gestionar las épocas de estrés temporal. <br>Te ayuda al:</div>

					<div class="flex items-center gap-x-7 mt-6">
						<img src="/img/triptomax/icon-heart.svg" alt="Bienestar emocional">
						<div><strong>Bienestar emocional:</strong> Ayuda a mantener un estado de ánimo positivo<sup>1</sup> y el equilibrio emocional<sup>2</sup></div>
					</div>

					<div class="flex items-center gap-x-7 mt-3">
						<img src="/img/triptomax/icon-brain.svg" alt="Bienestar mental">
						<div><strong>Bienestar mental:</strong> Ayuda a mantener la resistencia al estrés<sup>3</sup>.</div>
					</div>

					<div class="flex items-center gap-x-7 mt-3">
						<img src="/img/triptomax/icon-man.svg" alt="Bienestar físico">
						<div><strong>Bienestar físico:</strong> Ayuda a disminuir el cansancio y la fatiga<sup>4,5</sup>.</div>
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
					<div class="text-sm leading-tight md:text-base md:leading-tight">Con ingredientes de origen natural*. Ingredientes por dosis (1 comprimido):</div>

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

		<div class="bg-gray-light pt-7 pb-16">
			<div class="container max-w-sm mx-auto px-5 md:max-w-3xl xl:px-0">

				<div class="grid pl-16 md:pl-32 md:grid-cols-12 md:gap-8">
					<div class="md:col-span-8 lg:col-span-7">
						<ul class="pl-4 mt-6">
							<li
								v-for="(item, i) in data.how_is_it_taken"
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

					<div class="pl-6 pt-7 md:col-span-4 lg:col-span-5">
						<img
							src="/img/triptomax/bicapa.webp"
							alt="Tecnología bicapa">
					</div>
				</div>


			</div>
		</div>



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
					<p>* El Azafrán, la Albahaca Morada, la Aswhaganda, el Magnesio y el Triptófano son ingredientes de origen natural.</p>
					<p>1. EFSA ID2038</p>
					<p>2. EFSA ID4194</p>
					<p>3. EFSA ID2851</p>
					<p>4. EFSA ID244</p>
					<p>5. EFSA ID77</p>
					<p>6. Cataldo, R., et al. Role of peripheral serotonin in the insulin secretion and glucose homeostasis. Nutricion hospitalaria. 30. 498-508. 10.3305/nh.2014.30.3.7531</p>
				</div>
			</div>
		</div>
	</div>
</section>
</template>
