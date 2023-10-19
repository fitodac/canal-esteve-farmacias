<script setup>
import { mosquitos as data } from '@/StaticContent/products.js'

import Item from '@/Components/Products/ProductItem.vue'
</script>



<template>
<div 
	class="max-w-sm mx-auto grid gap-5 mt-20 select-none 
					md:max-w-2xl md:grid-cols-12 
					lg:max-w-3xl lg:gap-10">

	<div class="md:col-span-4 lg:col-span-3">
		<img 
			src="/img/afterbite/notepique.webp" 
			alt="RepelBite para que no te piquen"
			class="w-48 mx-auto md:m-0 md:w-64 lg:w-72">
	</div>

	<div class="text-white md:col-span-8 lg:col-span-9">
		<div class="font-bold text-xl leading-tight">
			Evita las picaduras de mosquitos y otros insectos con RepelBite.
		</div>
		
		<div class="mt-2 md:mt-0">
			La gama con citronella RepelBite incluye repelentes de insectos 
			a base de IR3535 o DEET y también pulseras con citronella y parches 
			de citronella para los más pequeños. Descubre las características 
			generales de la gama RepelBite de un solo vistazo.
		</div>
	</div>

</div>


<div 
	class="max-w-sm grid gap-6 mx-auto mt-10 
					md:max-w-2xl md:grid-cols-3
					lg:max-w-3xl">

	<Item 
		v-for="(prod, i) in data.products.repelbite"
		:key="i"
		:prod="prod"
		color="magenta" 
		:class="{'bg-natural': prod.natural}" />

</div>
</template>


<style scoped>
.bg-natural{
	background-image: url('/img/afterbite/texture.webp');
	background-size: auto 50%;
	background-position: center top;
}
</style>