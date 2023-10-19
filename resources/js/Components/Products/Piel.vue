<script setup>
import SectionTitle from '@/Components/Products/SectionTitle.vue'

import List from '@/Components/Products/List.vue'

const data = {
	intro: {
		title: `Calmiox&reg;`,
		subtitle: `¿Qué es?`,
		content: `<strong class="">
								Medicamento de uso cutáneo con hidrocortisona,
								para aliviar el picor de la piel.
							</strong>
							<br>
							Ofrece una acción antiinflamatoria,
							vasoconstrictora y antipruriginosa.`,
		presentation: `Calmiox se presenta en dos formatos: <br>
										Calmiox Crema y Calmiox Espuma.`
	},
	prod_1: {
		name: "Calmiox Crema",
		img: {
			src: "/img/calmiox/calmiox-crema.webp",
			height: '160px'
		},
		description: `Útil en zonas pequeñas, alivia el picor
									de la piel por irritaciones y dermatitis
									de contacto, especial para el uso en
									prurito o irritación anal asociado con
									hemorroides.`,
		links: [
			{
				text: 'Prospecto',
				link: `/materiales-productos/calmiox/EX3334-22-01 Calmiox crema_Prospecto.pdf`
			},
			{
				text: 'Ficha técnica',
				link: `/materiales-productos/calmiox/AUTO-spc-Calmiox crema-IBexcipientes-8Nov22_FT.pdf`
			}
		],
		characteristics: [
			`Útil en zonas pequeñas, especial para el uso en
			prurito o irritación anal asociado con hemorroides.`,
			`Para el alivio temporal sintomático del picor de la
			piel (pero no del dolor) debido a pequeñas irritaciones
			de la misma, alergia por contacto con jabones,
			detergentes, metales, picaduras de insectos y ortigas`,
			`Tratamiento local, temporal y sintomático de la
			irritación y prurito externo anal asociado con
			hemorroides.`
		],
		composition: [
			`El principio activo es hidrocortisona.`,
			`Cada gramo de Calmiox crema contiene 5
			mg de hidrocortisona (5mg/g).`,
			`Los demás componentes son: palmitoestearato
			de etilen y polietilenglicol, glicéridos
			polioxietilenados glicolizados, parafina
			líquida, ácido benzoico (E-210), edetato
			disódico, butilhidroxianisol (E-320),
			bronopol y agua purificada.`
		],
		contraindications: [
			`Hipersensibilidad al principio activo o a alguno
			de los excipientes incluidos en la sección
			“Composición”`,
			`No usar sobre piel infectada por virus, bacterias
			u hongos, heridas, acné, pie de atleta, úlcera de
			encamados ni escoceduras o irritaciones de los
			pañales.`,
			`No aplicar sobre ojos ni mucosas (anal, genital, bucal).`,
			`No debe aplicarse internamente en la zona anal ni
			en la genital. Este preparado es únicamente de
			uso externo.`,
			`No aplicar en caso de prurito que no presente
			inflamación.`
		]
	},
	prod_2: {
		name: "Calmiox Espuma",
		img: {
			src: "/img/calmiox/calmiox-expuma-cutanea.webp",
			height: '160px'
		},
		description: `Útil cuando se usa en superficies
									extensas, especial para usar en zonas
									como el cuero cabelludo. Alivia el
									picor de la piel por irritaciones,
									dermatitis de contacto.`,
		links: [
			{
				text: 'Prospecto',
				link: `/materiales-productos/calmiox/EX3663-19-05_Calmiox_5_mgg_espuma_cutanea_Prospecto.pdf`
			},
			{
				text: 'Ficha técnica',
				link: `/materiales-productos/calmiox/Auto-SPC-Calmiox_5_mgg_espuma_cutanea_-Esteve_Pharmaceuticals-Feb2019_FT.pdf`
			}
		],
		characteristics: [
			`Útil cuando se usa en superficies extensas,
			especial para usar en zonas como el cuero cabelludo.`,
			`Para el alivio temporal sintomático del picor
			de la piel (pero no del dolor) debido a pequeñas
			irritaciones de la misma, alergia por contacto
			con jabones, detergentes, metales, picaduras de
			insectos y ortigas.`
		],
		composition: [
			`El principio activo es hidrocortisona.`,
			`Cada gramo de Calmiox espuma contiene 5
			mg de hidrocortisona (5 mg/g).`,
			`Los demás componentes son ácido esteárico,
			octanoato cetearilo, octildodecanol,
			parahidroxibenzoato de metilo (E218),
			parahidroxibenzoato de propilo (E216),
			butilhidroxitolueno (E321), edetato
			disódico, estearato sorbitan, polisorbato
			60, carbomero, hidróxido sódico, bronopol,
			agua purificada y propano/isobutano.`
		],
		contraindications: [
			`Hipersensibilidad al principio activo o a
			alguno de los excipientes incluidos en la
			sección “Composición”.`,
			`No usar sobre piel infectada por virus,
			bacterias u hongos, 	heridas, acné, pie
			de atleta, úlcera de encamados ni escoceduras
			o irritaciones de los pañales.`,
			`No aplicar sobre ojos ni mucosas (anal,
			genital, bucal). Este medicamento está
			destinado únicamente a su uso sobre
			la piel.`
		]
	},
	how_to_use: [
		`<strong>Uso cutáneo (externo).</strong>`,
		`<strong>Adultos y adolescentes a partir de 12
		años:</strong><br>
		Aplicar sobre la zona afectada una fina película.
		La dosis normal es de 1 o 2 aplicaciones al día.`,
		`<strong>Uso en niños:</strong><br>
		<div>
			<span class="px-3">&middot;</span> Niños menores de 12 años: consultar al médico.
		</div>
		<div>
			<span class="px-3">&middot;</span> Uso en mayores de 65 años: consultar al médico.
		</div>`,
		`<strong>Lávese bien las manos después de su uso.</strong>`,
		`<strong>No aplicar más de 7 días seguidos sin consultar al médico, en ningún caso.</strong>`
	],
	consumer_profile: [
		`Jóvenes y adultos que se introducen a la categoría y presentan una rotura del ritmo circadiano, con dificultades para conciliar el sueño, desajuste horario o jet lag. Además, buscan productos naturales.`
	]
}
</script>


<template>
<section class="wrapper">
	<div class="product-intro">
		<div class="container px-5 mx-auto md:px-0 lg:max-w-3xl lg:px-0">

			<div class="grid gap-10 md:grid-cols-12 md:gap-20 lg:grid-cols-10 lg:gap-10">
				<div class="md:col-span-4 lg:col-span-3">
					<img
						class="w-40 mx-auto mt-12 mb-3 pointer-events-none md:w-[300px] mx:max-w-[300px] lg:w-72"
						src="/img/logo-calmiox.webp"
						alt="Hero" />
				</div>


				<div class="md:col-span-6 lg:col-start-5 xl:col-span-7 xl:col-start-5">
					<div>
						<h2
							class="text-brand-blue-light text-2xl font-bold leading-none
												md:text-2xl md:leading-none lg:text-3xl lg:leading-none">
							Toda la información detallada de la gama Calmiox a tu alcance.
						</h2>

						<div class="leading-tight mt-3 lg:mt-4">
							La dermatitis afecta a entre 2-6%* de adultos. Para la
							irritación de la piel y dermatitis, Calmiox es la opción
							más eficaz, segura y tolerable.
						</div>


                        <div class="grid gap-3 mt-6 sm:flex md:gap-5">
                            <a :href="route('resources')" @click="handleOpenModal($event)" class="btn-primary rounded-full">
                                <span class="font-bold px-6">Biblioteca ESTEVE</span>
                            </a>

                            <a href="#" class="btn-primary rounded-full" v-if="false">
                                <span class="font-bold px-6">Formación</span>
                            </a>
                        </div>

					</div>
				</div>
			</div>

		</div>
	</div>




	<section class="bg-brand-blue-light pt-10">
		<div class="container text-white px-5 mx-auto lg:px-0">

			<div class="text-center">
				<div class="leading-none mb-8">Medicamento</div>
				<h3 class="text-3xl font-bold leading-none" v-html="data.intro.title" />
				<h3 class="text-2xl font-bold leading-none mt-10" v-html="data.intro.subtitle" />
				<div class="mt-8" v-html="data.intro.content" />
				<div class="text-sm font-bold mt-6" v-html="data.intro.presentation" />
			</div>

		</div>

		<div class="bg-brand-teal h-12 mt-20"></div>
	</section>

</section>



<section class="bg-white">
	<div class="container max-w-sm mx-auto px-5 md:max-w-3xl xl:px-0">
		<div class="grid gap-20 md:grid-cols-2">
			<div class="text-center -mt-24">
				<img
					:src="data.prod_1.img.src"
					:style="{height: data.prod_1.img.height}"
					class="mx-auto object-contain"
					alt="Imagen de producto">

				<div class="text-sm mt-4" v-html="data.prod_1.description"/>

				<div class="mt-6 flex justify-center gap-x-10">
					<a
						v-for="(btn, i) in data.prod_1.links"
						:key="i"
						:href="btn.link"
						target="_blank"
						class="btn-primary block rounded-full">
						<span class="text-sm font-bold px-4" v-html="btn.text"/>
					</a>
				</div>
			</div>


			<div class="text-center md:-mt-24">
				<img
					:src="data.prod_2.img.src"
					:style="{height: data.prod_2.img.height}"
					class="mx-auto object-contain"
					alt="Imagen de producto">

				<div class="text-sm mt-4" v-html="data.prod_2.description"/>

				<div class="mt-6 flex justify-center gap-x-10">
					<a
						v-for="(btn, i) in data.prod_2.links"
						:key="i"
						:href="btn.link"
						target="_blank"
						class="btn-primary block rounded-full">
						<span class="text-sm font-bold px-4" v-html="btn.text"/>
					</a>
				</div>

			</div>
		</div>
	</div>
</section>



<div class="bg-white pt-20">
	<SectionTitle
		title="Características"
		icon="checklist"
		color="blue-light" />


	<div class="bg-gray-light pt-7 pb-16">
		<div class="container max-w-sm mx-auto px-5 md:max-w-3xl xl:px-0">

			<div class="grid gap-10 pl-16 md:pl-28 md:grid-cols-2 md:gap-14">
				<div>
					<div class="font-bold" v-html="data.prod_1.name"/>

					<p
						v-for="(p, i) in data.prod_1.characteristics"
						:key="i"
						class="leading-tight mt-3"
						v-html="p" />
				</div>

				<div>
					<div class="font-bold" v-html="data.prod_2.name"/>

					<p
						v-for="(p, i) in data.prod_2.characteristics"
						:key="i"
						class="leading-tight mt-3"
						v-html="p" />
				</div>
			</div>

		</div>
	</div>


	<SectionTitle
		title="Modo de empleo"
		icon="howItWorks"
		color="blue-light" />

	<div class="bg-gray-light pt-7 pb-16">
			<div class="container max-w-sm mx-auto px-5 md:max-w-3xl xl:px-0">

			<div class="pl-16 md:pl-28">
				<p
					v-for="(p, i) in data.how_to_use"
					:key="i"
					class="leading-tight mt-3"
					v-html="p" />
			</div>

			</div>
		</div>




	<SectionTitle
		title="Composición"
		icon="bottle"
		color="blue-light" />

	<div class="bg-gray-light pt-7 pb-16">
		<div class="container max-w-sm mx-auto px-5 md:max-w-3xl xl:px-0">

			<div class="grid gap-10 pl-16 md:pl-28 md:grid-cols-2 md:gap-14">
				<div>
					<div class="font-bold" v-html="data.prod_1.name"/>

					<p
						v-for="(p, i) in data.prod_1.composition"
						:key="i"
						class="leading-tight mt-3"
						v-html="p" />
				</div>

				<div>
					<div class="font-bold" v-html="data.prod_2.name"/>

					<p
						v-for="(p, i) in data.prod_2.composition"
						:key="i"
						class="leading-tight mt-3"
						v-html="p" />
				</div>
			</div>

		</div>
	</div>




	<SectionTitle
		title="Contraindicaciones"
		icon="contraindications"
		color="blue-light" />

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
    <div class="text-xs font-medium leading-tight text-center mt-8 pb-8 lg:mt-13">
        <div>*Fuente: https://www.actasdermo.org/es-estudio-epidemiologico-dermatitis-alergica-contacto-articulo-13057285. (07/02/2023)</div>

    </div>

</div>
</template>



<style scoped>
.wrapper{
	@apply bg-brand-blue-light;
}
</style>
