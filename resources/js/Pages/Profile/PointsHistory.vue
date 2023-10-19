<script setup>

import ProfileLayout from '@/Layouts/ProfileLayout.vue'
import Table from '@/Components/Profile/Table.vue'

const props = defineProps({
    score: {
        type: Object,
    },
    participation: {
        type: Object,
    },
    displayQty: {
        type: Number,
    }
});
</script>



<template>
<ProfileLayout>
	<h3 class="text-xl font-bold leading-none sm:text-2xl md:text-3xl">Histórico de puntos</h3>


	<!-- <div class="mt-4">
		<div class="grid gap-6 sm:grid-cols-2">

			<div>
				<div class="bg-gray-100 px-5 py-3 rounded-lg">
					<div class="leading-none flex gap-3">

						<svg class="fill-primary w-5 h-5" viewBox="0 0 40 37">
							<g stroke="none" stroke-width="1" fill-rule="evenodd">
								<g transform="translate(-522.000000, -714.000000)">
									<polygon id="Star" points="542 744.75 529.950402 751.084848 532.251671 737.667424 522.503341 728.165152 535.975201 726.207576 542 714 548.024799 726.207576 561.496659 728.165152 551.748329 737.667424 554.049598 751.084848"></polygon>
								</g>
							</g>
						</svg>

						<div class="select-none sm:pt-0.5">
							<span class="text-primary-500 font-extrabold">Puntos disponibles:
								<span>{{ 70 - (score?.score || 0) }}</span>
							</span>
							<span class="pl-1">puntos</span>
						</div>

					</div>
				</div>
			</div>


			<div>
				<div class="bg-gray-100 px-5 py-3 rounded-lg">
					<div class="leading-none flex gap-3">

						<svg class="fill-gray-300 w-5 h-5" viewBox="0 0 40 37">
							<g stroke="none" stroke-width="1" fill-rule="evenodd">
								<g transform="translate(-522.000000, -714.000000)">
									<polygon id="Star" points="542 744.75 529.950402 751.084848 532.251671 737.667424 522.503341 728.165152 535.975201 726.207576 542 714 548.024799 726.207576 561.496659 728.165152 551.748329 737.667424 554.049598 751.084848"></polygon>
								</g>
							</g>
						</svg>

						<div class="select-none sm:pt-0.5">
							<span class="text-gray-600 font-extrabold">Puntos totales:
								<span class="text-gray-300">{{ (score?.score || 0) }}</span>
							</span>
							<span class="text-gray-500 pl-1">puntos</span>
						</div>

					</div>
				</div>
			</div>

		</div>
	</div> -->

	<div class="mt-8">
        <Table :list="participation" :displayQty="displayQty"/>
	</div>
</ProfileLayout>
</template>
