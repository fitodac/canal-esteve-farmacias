<script setup>
import { aquoral } from '@/StaticContent/products.js'
import { usePage } from '@inertiajs/inertia-vue3'

import SectionTitle from '@/Components/Products/SectionTitle.vue'
import List from '@/Components/Products/List.vue'
import Intro from '@/Components/Products/Intro.vue'

const { product } = usePage().props.value
const prod_data = aquoral.products.filter(item => item.link.product === product)[0]

const data = {
	intro: [
		`<strong class="text-xl leading-tight">Gotas oftálmicas lubricantes con alta concentración de ácido hialurónico para un alivio rápido y duradero de las molestias del ojo seco.</strong>`,
		`<span class="text-sm">Aquoral cumple con la normativa de productos sanitarios. No utilizar en caso de sensibilidad a cualquiera de sus componentes.</span>`
	],
	name: "Aquoral&reg; Multidosis",
	img: {
		src: "/img/aquoral/aquoral-multidosis.webp",
		height: '300px'
	},
    link: "/materiales-productos/aquoral/Instrucciones_de_uso_Aquoral_Multidosis.pdf",
	reasons: [
		{
			title: "Ambiente ventoso",
			img: "/img/aquoral/icon-wind.webp"
		},
		{
			title: "Fatiga visual",
			img: "/img/aquoral/icon-eye.webp"
		},
		{
			title: "Ambiente seco",
			img: "/img/aquoral/icon-weather.webp"
		},
		{
			title: "Uso de lentes de contacto",
			img: "/img/aquoral/icon-lens.webp"
		},
		{
			title: "Humo",
			img: "/img/aquoral/icon-smoke.webp"
		},
		{
			title: "Edad, menopausia...",
			img: "/img/aquoral/icon-senior.webp"
		},
		{
			title: "Tiempo prolongado frente a pantallas",
			img: "/img/aquoral/icon-screen.webp"
		},
	],
	characteristics: [
		`20 monodosis con tapón recerrable`,
		`Reutilizables hasta 12 horas después de su apertura`,
		`Ácido hialurónico a alta concentración (0,4%)`,
		`Sin conservantes ni fosfatos`,
		`Apto para usar con lentes de contacto`
	],
	contraindications: [
		`Una vez abierto, el envase podrá utilizarse durante un máximo de 90 días.`,
		`No utilizar si el envase está dañado.`,
		`No utilizar en caso de sensibilidad a cualquiera de sus componentes.`,
		`No utilizar tras  la fecha de caducidad indicada en el producto.`,
		`No tocar el ojo con la punta del envase.`,
		`Tras su administración, puede observarse en raras ocasiones una leve visión borrosa transitoria a causa de la viscosidad de la solución. Por lo tanto, es aconsejable esperar unos segundos antes de realizar cualquier actividad que requiera agudeza visual.`,
		`Dejar al menos 10-15 minutos antes de administrar otro fármaco oftálmico.`,
		`Mantener fuera del alcance y de  la vista de los niños.`,
		`Para evitar el riesgo de colapso del envase, no administrar más de 30 gotas consecutivas.`
	]
}
</script>



<template>
<section class="bg-brand-sky pt-10">
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

			<div class="mt-5">
				<a :href="data.link" target="_blank" class="btn-primary block rounded-full">
					<span class="text-sm font-bold" v-html="`Instrucciones de uso ${data.name}`"/>
				</a>
			</div>
		</div>


		<div class="text-center max-w-2xl mx-auto -mt-20 md:-mt-16">
			<div class="text-brand-sky text-2xl font-bold leading-none">Aquoral&reg;: alivio rápido y duradero de la sequedad ocular.</div>
			<img
				src="/img/aquoral/hero-lg.webp"
				alt="irritación, sequedad, sensación de cuerpo extraño, picor"
				class="hidden w-10/12 mx-auto mt-5 md:block" />
			<img
				src="/img/aquoral/hero-sm.webp"
				alt="irritación, sequedad, sensación de cuerpo extraño, picor"
				class="w-60 mx-auto mt-5 md:hidden" />
		</div>

	</div>



	<div class="pt-20">
		<SectionTitle
			title="El uso de Aquoral&reg; es adecuado frente a diferentes causas del ojo seco"
			icon="drop"
			color="sky" />


		<div class="bg-gray-light pt-7 pb-16">
			<div class="container max-w-sm mx-auto px-5 md:max-w-3xl xl:px-0">
				<div class="grid gap-5 pl-16 md:pl-28 md:grid-cols-2 md:gap-x-14 md:gap-y-8">

					<div
						v-for="(item, i) in data.reasons"
						:key="i"
						class="flex items-center gap-8">

						<img
							:src="item.img"
							alt="icono"
							class="w-14" />

						<div class="leading-none">{{ item.title }}</div>

					</div>

				</div>
			</div>
		</div>




		<SectionTitle
			title="Características"
			icon="drop"
			color="sky" />

		<List :data="data.characteristics" />



		<SectionTitle
			title="Modo de uso"
			icon="howItWorks"
			color="sky" />

		<div class="bg-gray-light pt-7 pb-16">
			<div class="container max-w-sm mx-auto px-5 md:max-w-3xl xl:px-0">
				<div class="pl-16 md:pl-28">

					<div>1 gota en el ojo una o más veces cada día, según necesidad.</div>

					<img
						src="/img/aquoral/aquoral-multidosis-use-methods-sm.svg"
						alt="Modo de uso"
						class="mx-auto mt-8 md:hidden" />

					<img
						src="/img/aquoral/aquoral-multidosis-use-methods-lg.svg"
						alt="Modo de uso"
						class="mt-8 hidden md:block" />

					<div class="mt-10">
						Para más información,
						<a :href="data.link" target="_blank" class="text-primary font-bold">descarga</a>
						las instrucciones de uso de Aquoral&reg; Monodosis.</div>

				</div>
			</div>
		</div>


		<SectionTitle
			title="Contraindicaciones"
			icon="contraindications"
			color="sky" />

		<List :data="data.contraindications" />

	</div>
</section>
</template>
