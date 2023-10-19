<script setup>
import { mosquitos as data } from '@/StaticContent/products.js'
import { useModal } from "@/store/modalStore.js";
import { useStore } from "@/store/mainStore.js";
import { storeToRefs } from 'pinia'

import Section1 from '@/Components/Products/MosquitosSection1.vue'
import Section2 from '@/Components/Products/MosquitosSection2.vue'
import Section3 from '@/Components/Products/MosquitosSection3.vue'

const modal = useModal();
const store = useStore();
const { user } = storeToRefs(store)

const handleOpenModal = (bypass, e) => {
    if (!user) {
        e.preventDefault();
        modal.open();
    }

    if (bypass) {
        if (user && !user.pharmacy_id) {
            e.preventDefault();
            modal.open();
        }
    }
}
</script>

<template>
<section class="wrapper">
	<div class="product-intro">
		<div class="container px-5 mx-auto md:px-0 lg:max-w-3xl lg:px-0">

			<div class="grid gap-10 md:grid-cols-12 md:gap-20 lg:grid-cols-10 lg:gap-10">
				<div class="md:col-span-4 lg:col-span-3">
					<img
						class="w-56 mx-auto pointer-events-none md:w-[300px] mx:max-w-[300px] lg:w-72 lg:m-0"
						src="/img/afterbite/hero.webp"
						alt="Hero" />
				</div>


				<div class="md:col-span-6 lg:col-start-5 xl:col-span-7 xl:col-start-5">
					<div>
						<h2
							class="text-brand-magenta text-2xl font-bold leading-none
												md:text-2xl md:leading-none lg:text-3xl lg:leading-none">
							Toda la información detallada de la gama AfterBite
							y RepelBite a tu alcance.
						</h2>

						<div class="leading-tight mt-3 lg:mt-4">
							Gama completa y eficaz de soluciones para
							el alivio y la protección de picaduras de
							mosquitos y otros insectos.
						</div>


						<div class="grid gap-3 mt-4 sm:flex md:gap-5">
							<a :href="route('resources')" @click="handleOpenModal('',$event)" class="btn-primary rounded-full">
								<span class="font-bold px-6">Biblioteca ESTEVE</span>
							</a>

							<a href="#" class="btn-primary rounded-full" style="display: none">
								<span class="font-bold px-6">Formación</span>
							</a>
						</div>

					</div>
				</div>
			</div>

		</div>
	</div>


	<div class="container pt-10 pb-16 px-5 mx-auto lg:px-0">

		<h3
			class="text-white text-3xl font-bold leading-none text-center">
			Productos AfterBite y RepelBite
		</h3>

		<Section1 />
		<Section2 />
		<Section3 />

	</div>
</section>
</template>



<style scoped>
.wrapper{
	@apply bg-brand-magenta;
}
</style>
