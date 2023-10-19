<script setup>
import { computed } from 'vue'
const { bc_step } = defineProps({ bc_step: Number })

const steps = [
	'Carrito',
	'Pedido completado'
]
</script>


<template>
<section class="breadcrumbs">

	<div class="flex justify-center gap-x-5 md:gap-x-8">
		<div 
			v-for="(step, i) in steps"
			:key="i"
			class="breadcrumb-item"
			:class="{'active': bc_step === i}">
			
			<div v-if="i">
				<svg 
					class="breadcrumb-arrow" 
					viewBox="0 0 12 20" 
					version="1.1" 
					xmlns="http://www.w3.org/2000/svg" 
					xmlns:xlink="http://www.w3.org/1999/xlink">
					<g id="Carrito-de-compra" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<g id="EST-Canje-de-puntos---Carrito" transform="translate(-351.000000, -427.000000)">
							<g id="Group" transform="translate(194.000000, 416.000000)">
								<g transform="translate(142.822176, 1.000000)" id="boton-flecha-abajo">
									<g transform="translate(20.000000, 20.000000) rotate(-90.000000) translate(-20.000000, -20.000000) ">
										<rect id="Rectangle" x="0" y="0" width="40" height="40"></rect>
										<polyline id="Rectangle" stroke="#5A5E5F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" transform="translate(19.944059, 15.944059) rotate(45.000000) translate(-19.944059, -15.944059) " points="25.8881179 10 25.8881179 21.8881179 14 21.8881179"></polyline>
									</g>
								</g>
							</g>
						</g>
					</g>
				</svg>
			</div>

			<span>{{ step }}</span>

		</div>
	</div>
</section>
</template>


<style scoped>
.breadcrumbs{
	@apply pt-10 select-none;
}

.breadcrumb-item{
	@apply text-[#CFD0D0] font-bold flex md:text-xl;
}

.breadcrumb-item.active{ @apply text-primary-500; }

.breadcrumb-arrow{
	@apply w-2 h-4 mr-5 top-1 relative md:w-6 md:mr-8 md:top-2;
}
</style>