<script setup>
import { dormi as data } from '@/StaticContent/products.js'
import { useModal } from "@/store/modalStore.js";
import { useStore } from "@/store/mainStore.js";
import { storeToRefs } from 'pinia'

import Item from '@/Components/Products/ProductItem.vue'

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
						class="w-52 mx-auto pointer-events-none lg:w-full lg:m-0"
						src="/img/dormi/hero.webp"
						alt="Hero" />
				</div>


				<div class="md:col-span-6 lg:col-start-5 xl:col-span-7 xl:col-start-5">
					<div>
						<h2
							class="text-brand-blue text-2xl font-bold leading-none
												md:text-2xl md:leading-none lg:text-3xl lg:leading-none">
							Toda la información detallada de la gama Dormi a tu alcance.
						</h2>

						<div class="leading-tight mt-2 lg:mt-3">
							Dormir es salud y para disfrutar de un placentero
							sueño es importante poder hacerlo profundamente,
							toda la noche y sin interrupciones. En Dormidina
							sabemos de la importancia de dormir bien, por eso
							llevamos más de 30 años cuidando del sueño.
						</div>

						<div class="grid gap-3 mt-6 sm:flex md:gap-5">
							<a :href="route('resources')" @click="handleOpenModal('',$event)" class="btn-primary rounded-full">
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



	<div class="container pt-10 pb-16 px-5 mx-auto lg:px-0">

		<h3
			class="text-white text-3xl font-bold leading-none text-center">
			Productos Dormi
		</h3>

		<div
			class="max-w-sm grid gap-6 mx-auto mt-10
							md:max-w-2xl md:grid-cols-2
							lg:max-w-3xl">

			<Item
				v-for="(prod, i) in data.products"
				:key="i"
				:prod="prod"
				color="blue" />

		</div>

	</div>
</section>
</template>



<style scoped>
.wrapper{
	@apply bg-brand-blue;
}
</style>
