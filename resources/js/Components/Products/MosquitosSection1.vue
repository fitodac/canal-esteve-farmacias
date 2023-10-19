<script setup>
import { mosquitos as data } from '@/StaticContent/products.js'

import Item from '@/Components/Products/ProductItem.vue'
</script>



<template>
<div 
	class="max-w-sm mx-auto grid gap-5 mt-8 select-none 
					md:max-w-2xl md:grid-cols-12 
					lg:max-w-3xl lg:gap-10">

	<div class="md:col-span-4 lg:col-span-3">
		<img 
			src="/img/afterbite/tepique.webp" 
			alt="AfterBite te pique lo que te pique"
			class="w-48 mx-auto md:m-0 md:w-64 lg:w-72">
	</div>

	<div class="text-white md:col-span-8 lg:col-span-9">
		<div class="font-bold text-xl leading-tight">
			Alivia y calma inmediatamente el picor ocasionado por picaduras 
			de mosquitos, medusas* y plantas de toda la familia. Hay un 
			AfterBite para cada necesidad. Toda la gama es apta para 
			embarazadas y está dermatológicamente testeada.
		</div>

		<div class="grid mt-5 md:grid-cols-12 md:gap-3">
			<div 
				class="flex gap-4 
								md:col-span-4 md:py-1
								lg:col-span-5 lg:py-0">
				<span class="bg-white w-[4px] h-[3px] block top-1.5 relative rounded-full"></span>
				<span class="leading-tight">30 años de experiencia en el alivio del picor</span>
			</div>

			<div 
				class="flex gap-4 mt-3 
								md:border-l md:border-white md:col-span-4 md:pl-5 md:mt-0 md:py-1 
								lg:col-span-5 lg:pl-7 lg:py-0">
				<span class="bg-white w-[4px] h-[3px] block top-1.5 relative rounded-full"></span>
				<span class="leading-tight">8 de cada 10 consumidores conocen la marca**</span>
			</div>

			<div class="mt-3 
										md:border-l md:border-white md:col-span-4 md:pl-5 md:mt-0 md:py-1 
										lg:col-span-2 lg:pl-4 lg:py-0">
				<img 
					src="/img/afterbite/apto-embarazo.svg" 
					alt="Apto embarazo"
					class="w-[80px] h-auto lg:w-[70px]">
			</div>
		</div>

		<div class="mt-6">Descubre las características generales de la gama AfterBite en un solo vistazo.</div>
	</div>

</div>



<div 
	class="max-w-sm grid gap-6 mx-auto mt-10 
					md:max-w-2xl md:grid-cols-3
					lg:max-w-3xl">

	<Item 
		v-for="(prod, i) in data.products.afterbite"
		:key="i"
		:prod="prod"
		color="magenta" />

</div>
</template>