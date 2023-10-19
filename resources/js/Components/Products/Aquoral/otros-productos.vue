<script setup>
import { onMounted } from 'vue'
import { aquoral } from '@/StaticContent/products.js'
import { usePage } from '@inertiajs/inertia-vue3'

import SectionTitle from '@/Components/Products/SectionTitle.vue'
import List from '@/Components/Products/List.vue'
import Intro from '@/Components/Products/Intro.vue'

const { product } = usePage().props.value
const prod_data = aquoral.products.filter(item => item.link.product === product)[0]

onMounted(() => {
	if( product ){
		const _top = Math.round(document.getElementById(product).getBoundingClientRect().top)
		let _diff = 0
		if( window.innerWidth > 768 ) _diff = 60
		window.scrollTo({ top: (_top - _diff), behavior: 'smooth' })
	}
})

const data = {
	type: "Productos Aquoral&reg;",
	name: "Otros productos Aquoral&reg;",

	products: [
		{
			id: 'aquoral-forte',
			name: "Aquoral&reg; Forte",
			img: {
				src: "/img/aquoral/aquoral-forte.webp",
				height: '280px'
			},
			features: [
				`Aquoral Forte: <strong>‘Forte en Permanencia’</strong>`,
				`<strong>En pacientes con Ojo Seco Acuo-deficiente y Mixto relacionado con:</strong> lesión de la superficie ocular, cirugía oftálmica, glaucoma, menopausia, diabetes mellitus, edad<sup>1</sup>.`,
				`<strong>Más permanencia sobre la superficie ocular y más regeneración de la superficie ocular</strong> en los pacientes con Enfermedad del Ojo Seco gracias a su composición con <strong>ácido hialurónico 0,4% y galacto-xiloglucano 0,2%</strong>, sin conservantes ni fosfatos<sup>2</sup>.`,
				`<strong>Beneficios en la recuperación de la superficie ocular lesionada:</strong> estudios clínicos que demuestran la recuperación de la córnea y la conjuntiva<sup>2,3</sup>.`,
				`Ideal en los <strong>protocolos pre y post-quirúrgicos</strong>.`
			],
			caution: [
				`Este producto cumple con la normativa de productos sanitarios. No utilizar en caso de sensibilidad a cualquiera de sus componentes.`,
				`1. Instrucciones de uso Aquoral Forte.`,
				`2. United States Patent. Del Prete A, Sanso M. Ophthalmic compositions based on tamarind seed polysaccharide and hyaluronic acid. Jun 4, 2013. Patent nº US 8,455,462 B2. Con­sultado en Noviembre 2018: https://patents.google.com/patent/US8455462B2/en.`,
				`3.  Molina P. et al. Improved Tear Film Stability in Patients with Dry Eye After Hyaluronic Acid and Galactoxyloglucan Use. Clin Ophthal 14, 1153-1159, 2020.`
			],
			link: "/materiales-productos/aquoral/Instrucciones_de_uso_Aquoral_Forte_Monodosis_multidosis.pdf",
			contraindications: [
				{
					title: `Contraindicaciones Aquoral® Forte Monodosis`,
					list: [
						`No utilizar en caso de sensibilidad a cualquiera de los componentes de este producto.`,
						`Cada monodosis puede utilizarse hasta 12 horas después de su apertura.`,
						`Mantener fuera del alcance y de la vista de los niños.`
					]
				},
				{
					title: `Contraindicaciones Aquoral® Forte Multidosis`,
					list: [
						`No utilizar en caso de sensibilidad a cualquiera de sus  componentes.`,
						`Una vez abierto, el envase podrá utilizarse durante un máximo de 90 días.`,
						`Mantener fuera del alcance y de la vista de los niños.`
					]
				}
			]
		},

		{
			id: 'aquoral-lipo',
			name: "Aquoral&reg; Lipo",
			img: {
				src: "/img/aquoral/aquoral-lipo.webp",
				height: '280px'
			},
			features: [
				`Aquoral&reg; Lipo: <strong>‘La Estabilización Completa de la Película Lagrimal’</strong>`,
				`<strong>En pacientes con Ojo Seco Evaporativo y Mixto relacionado con:</strong> disfunción de las glándulas de Meibomio (DGM), blefaritis, alergia, inflamación de la superficie ocular, lentes de contacto, patología dermatológica<sup>1</sup>.`,
				`<strong>Actuando sobre las tres capas de la película lagrimal, aborda de forma integral el tratamiento del Ojo Seco</strong> Evaporativo y Mixto que es mayoritario.`,
				`<strong>Mejora la cantidad y la calidad de la lágrima</strong> con beneficios en la recuperación de la superficie ocular<sup>2</sup>.`,
				`<strong>Innovador en su composición y sinergia de sus componentes:</strong> ácido hialurónico cross-linkado (mayor mucoadhesividad y protección), liposomas en alta concentración (estabilizan la lágrima, evitan la evaporación) y crocina con efecto antiinflamatorio, antioxidante y fotoprotector. Sin conservantes ni fosfatos<sup>1</sup>.`
			],
			caution: [
				`Este producto cumple con la normativa de productos sanitarios. No utilizar en caso de sensibilidad a cualquiera de sus componentes.`,
				`1. Instrucciones de uso Aquoral Lipo.`,
				`2. Villani E. Studio in vivo dei cambiamenti dinamici del film lacrimale dopo instillazione di 3 diverse lacrime artificiali. Viscochirurgia. 2017 Apr.`
			],
			link: "/materiales-productos/aquoral/Instrucciones_de_uso_Aquoral_Lipo.pdf",
			contraindications: [
				{
					title: `Contraindicaciones`,
					list: [
						`Lavar cuidadosamente las manos antes de utilizar el producto.`,
						`No utilizar el producto en caso de alergia o hipersensibilidad conocida a cualquiera de los componentes.`,
						`No utilizar el producto transcurridos 60 días desde su apertura.`,
						`No utilizar el producto después de la fecha de caducidad indicada en el frasco.`,
						`Mantener alejado de fuentes de calor y del alcance de los niños.`,
						`No utilizar el producto si el envase no está en perfecto estado.`,
						`En caso de reacciones adversas, interrumpir el uso del producto y consultar con un médico.`,
						`Instilar el producto con cuidado para que la punta del frasco no llegue a tocar el ojo.`
					]
				}
			]
		},

		{
			id: 'aquoral-noche',
			name: "Aquoral&reg; Noche",
			img: {
				src: "/img/aquoral/aquoral-noche.webp",
				height: '280px'
			},
			features: [
				`Aquoral&reg; Noche: <strong>‘Un sueño de hidratación’</strong>`,
				`En pacientes que necesitan <strong>restaurar el estado de la película</strong> lagrimal y también para la <strong>oclusión mecánica nocturna</strong>.`,
				`<strong>Tratamiento nocturno del ojo seco</strong> y en pacientes que necesitan oclusión mecánica, tanto a nivel ambulatorio como hospitalario.`,
				`<strong>Aquoral&reg; Noche ayuda a restaurar el estado fisiológico de la película lagrimal y protege la superficie ocular</strong> gracias a las <strong>propiedades lubricantes y humectantes de la Vitamina A<sup>1</sup></strong>.`,
				`<strong>Aquoral&reg; Noche</strong> es una pomada ocular lubricante <strong>sin conservantes ni lanolina</strong>, con Vitamina A Palmitato 0,025%, parafina líquida y parafina blanda blanca<sup>1</sup>.`
			],
			caution: [
				`Este producto cumple con la normativa de productos sanitarios. No utilizar en caso de sensibilidad a cualquiera de sus componentes.`,
				`1. Instrucciones de uso Aquoral Noche.`
			],
			link: "/materiales-productos/aquoral/Instrucciones_de_uso_Aquoral_Noche.pdf",
			contraindications: [
				{
					title: `Contraindicaciones`,
					list: [
						`No utilizar en caso de sensibilidad a cualquiera de sus componentes.`,
						`Una vez abierto, el envase podrá utilizarse durante un máximo de 90 días.`,
						`Mantener fuera de la vista y alcance de los niños.`,
						`Retirar las lentes de contacto antes de utilizar el producto.`
					]
				}
			]
		}
	]
}
</script>



<template>
<section class="bg-brand-sky pt-10">
	<Intro
		:type="data.type"
		:name="data.name" />

	<div class="bg-brand-blue-600 h-12 mt-20"></div>
</section>


<section class="bg-white">
	<div class="container max-w-5xl mx-auto px-5 pt-10 xl:px-0">

		<div
			v-for="(prod, i) in data.products"
			:key="i"
			class="grid md:grid-cols-12 md:gap-10 lg:gap-20"
			:class="{'mt-28': i}"
			:id="prod.id">

			<div class="md:col-span-5">
				<img
					:src="prod.img.src"
					alt="imagen de producto"
					class="w-full max-w-sm mx-auto md:max-w-2xl" />
			</div>

			<div class="md:col-span-7">
				<div
					v-html="prod.name"
					class="text-brand-sky text-xl font-bold leading-none select-none
										md:text-2xl md:leading-none"/>

				<div class="mt-8">
					<p
						v-for="(p,ii) in prod.features"
						:key="ii"
						class="leading-tight flex gap-x-5"
						:class="{'mt-4': ii}">
						<span class="bg-gray-500 w-[4px] h-[4px] top-2 relative rounded-full"></span>
						<span v-html="p" class="flex-1"/>

					</p>
				</div>


				<div class="mt-5">
					<a :href="prod.link" target="_blank" class="btn-primary block rounded-full">
						<span class="text-sm font-bold" v-html="`Instrucciones de uso de ${prod.name}`"/>
					</a>
				</div>

				<div 
					v-for="(data, i) in prod.contraindications" 
					:key="i" 
					class="mt-8">
					
					<SectionTitle
						:title="data.title"
						icon="contraindications"
						color="sky" />
					
					<div class="pl-16 md:pl-28 mt-2">
						<div 
							v-for="(item, i) in data.list"
							:key="i"
							class="text-sm leading-tight flex gap-x-3
											md:text-base md:leading-tight"
							:class="{'mt-2': i}">
							<div>
								<span class="bg-gray-500 w-[3px] h-[3px] block top-2.5 relative rounded-full"></span>
							</div>
							<div v-html="item"/>
						</div>
					</div>

				</div>


				<div class="border-t border-gray-300 pt-10 mt-8">
					<p
						v-for="(p,ii) in prod.caution"
						:key="ii"
						v-html="p"
						class="text-xs leading-tight"
						:class="{'mt-3': ii}"/>
				</div>

			</div>

		</div>


		<div class="h-28"></div>

	</div>
</section>
</template>
