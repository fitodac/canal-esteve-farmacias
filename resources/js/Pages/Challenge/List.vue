<script setup>
import { ref } from 'vue'
import Layout from '@/Layouts/PageLayout.vue'
import Header from '@/Components/SellOutChallenges/Header.vue'
import { usePage, Link } from '@inertiajs/inertia-vue3'

import IconThumb from '@/Components/SellOutChallenges/IconThumb.vue'
import IconPillar from '@/Components/SellOutChallenges/IconPillar.vue'
import Girl from '@/Components/Faqs/QuestionGirl.vue'

const {
	recommendationChallenges,
	visibilityChallenges
} = defineProps({
	recommendationChallenges: Object,
	visibilityChallenges: Object
});

const cant = ref(1)

const setCant = e => {
	if( '+' === e ) cant.value++
	if( '-' === e ) if( (cant.value - 1) >= 0 ) cant.value--
}
</script>



<template>
<Layout>
	<Header/>

	<div class="container-wrapper py-12">
		<h3>¿Te atreves con nuestros retos?</h3>


		<div class="text-lg text-center leading-tight mt-3">
			Participar es muy sencillo, selecciona el reto
			activo en el que quieres participar y empieza
			a acumular <strong>puntos</strong> en tu cuenta.
		</div>
	</div>



	<section class="bg-primary py-12">
		<div class="container-wrapper">
			<div class="grid gap-y-10">

				<div v-if="recommendationChallenges.length">
					<h4 class="text-white">
						<IconThumb color="white" class="w-4 md:w-6"/>
						<span>Retos de recomendación</span>
					</h4>

					<div
						v-for="challenge in recommendationChallenges"
						:key="challenge.id"
						:id="challenge.id"
						class="mt-6">

						<img
							:src="challenge.image"
							:alt="challenge.title"
							class="w-full mt-3 object-cover rounded-lg" />

						<div class="text-center mt-5">
							<Link
								:href="route('sellout.show', challenge)"
								class="btn-white">
								Participar
							</Link>
						</div>

					</div>
				</div>


				<div v-if="visibilityChallenges.length" class="mt-8">
					<h4 class="text-white">
						<IconPillar color="white" class="w-4 md:w-6"/>
						<span>Reto de visibilidad</span>
					</h4>

					<div
						v-for="challenge in visibilityChallenges"
						:key="challenge?.id"
						:id="challenge?.id"
						class="">

							<img
							:src="challenge.image"
							:alt="challenge.title"
							class="w-full mt-3 object-cover rounded-lg" />

							<div class="text-center mt-5">
								<Link
									:href="route('sellout.show', challenge)"
									class="btn-white">
									Participar
								</Link>
							</div>
					</div>
				</div>

			</div>

			<div class="text-white text-center mt-12">
				<p>
					Mantente atento a próximos retos consultando nuestro <strong>calendario de eventos.</strong>
				</p>

				<div class="text-center mt-2">
					<Link
                        :href="route('calendar')"
						class="btn-white">
						<span class="px-2 py-3 inline-block">Ver calendario</span>
					</Link>
				</div>
			</div>
		</div>
	</section>



	<section class="bg-primary-100 pt-10 pb-20">
		<div class="container-wrapper">

			<h3>Participa, suma puntos y gana</h3>

			<div class="text-center mt-4 md:mt-5">
				Canjea tus puntos acumulados por tarjetas regalo online Click&Gift
				<br class="hidden md:block">
				y utilizarlas como quieras en tus tiendas favoritas
			</div>


			<div class="mt-10 grid gap-10
										md:mt-14 md:grid-cols-2 md:items-center">

				<div class="">
					<img
						class="w-full max-w-sm mx-auto md:max-w-screen"
						src="/img/sell-out-challenges/img-04.svg"
						alt="Tarjeta regalo 10 de euros"/>
				</div>


				<div class="">
					<div class="max-w-sm mx-auto md:max-w-screen">
						<div class="text-primary-500 font-bold ">
							Tarjeta regalo online Click&Gift 10 Euros
						</div>

						<div class="text-3xl font-bold leading-none lg:text-4xl">
							10 puntos
						</div>

						<div class="leading-tight mt-6 lg:text-lg lg:leading-tight">
							Recibirás por email una tarjeta que te permitirá acceder
							a la web Click&Gift y allí canjear su importe por un bono
							online para compras en la tienda colaboradora que elijas.
							También la podrás canjear por un bono físico y acudir a
							una tienda (limitado a algunas marcas).
						</div>

						<div class="mt-3 grid grid-cols-12 gap-8">
							<div class="col-span-5" v-if="false">
								<div class="w-full flex">
									<button class="btn-spinner rounded-l-lg" @click="setCant('-')">-</button>
									<input type="text" class="input-spinner" v-model="cant" readonly>
									<button class="btn-spinner rounded-r-lg" @click="setCant('+')">+</button>
								</div>
							</div>

							<div class="col-span-7">
								<Link :href="route('cart.index')"
									class="bg-white border border-primary text-primary
														text-sm font-semibold px-8 pt-1.5 pb-2 rounded-full
														select-none">
									<span class="inline-block">Canjear puntos</span>
								</Link>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>




	<section class="bg-white pt-12">
		<div class="container-wrapper">

			<div class="grid gap-10 md:grid-cols-12">
				<div class="text-center md:col-span-5 md:text-left md:pt-10">
					<div class="text-primary-500 text-3xl font-bold leading-none select-none
						md:text-3xl lg:text-4xl">¿Alguna duda?</div>

					<div class="mt-5">
						<Link
							:href="route('faqs')"
							class="bg-primary-500 text-white text-sm leading-none font-bold
												pt-2 pb-3 px-7 transition-all select-none rounded-full
												hover:opacity-80">
							Ver preguntas frecuentes
						</Link>
					</div>
				</div>

				<div class="md:col-span-7">
					<Girl class="w-72 md:w-[360px]"/>
				</div>
			</div>

		</div>
	</section>

</Layout>
</template>



<style scoped>
.container-wrapper{
	@apply container max-w-3xl px-5 mx-auto xl:px-0;
}

h3{
	@apply text-primary-500 text-3xl font-bold text-center leading-none select-none
						md:text-3xl lg:text-4xl;
}

h4{
	@apply text-xl font-bold leading-none select-none
					flex justify-center items-center gap-4 md:text-2xl;
}

.btn-white{
	@apply bg-white text-primary text-sm font-bold leading-none
						px-6 pt-1.5 pb-2 transition-all rounded-full hover:opacity-80;
}

.btn-spinner{
	@apply bg-primary bg-opacity-20 text-primary font-bold px-4
						transition-all select-none hover:bg-opacity-30;
}

.input-spinner{
	@apply bg-white border-white text-primary text-center w-full
						py-1 focus:ring-0;
}
</style>
