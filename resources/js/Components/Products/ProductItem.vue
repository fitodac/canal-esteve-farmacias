<script setup>
import { Link } from '@inertiajs/inertia-vue3'

defineProps({
	prod: Object,
	color: String
})
</script>



<template>
<div class="bg-white px-6 py-8 rounded-lg">
	<div 
		v-if="prod.img.src"
		class="h-48 flex items-center">
		<img 
			:src="prod.img.src" 
			:alt="prod.name"
			:style="{width: prod.img.width}"
			class="mx-auto object-cover">
	</div>

	<div 
		v-if="prod.name"
		class="text-2xl font-bold leading-none mt-6" 
		:class="[`text-brand-${color}`]"
		v-html="prod.name"/>

	<div 
		v-if="prod.type"
		class="text-sm font-bold italic leading-none mt-2"
		:class="[`text-brand-${color}`]">{{ prod.type }}</div>

	<div 
		v-if="prod.description"
		class="text-sm font-medium leading-tight mt-3" 
		v-html="prod.description"/>

	<div
		v-if="prod.link.category && prod.link.product"
		class="mt-5">
		<Link 
			:href="route(
				'product', {
					category: prod.link.category, 
					product: prod.link.product
				}
			)" 
			class="btn-primary inline-block rounded-full">
			<span class="font-bold px-6">Más información</span>
		</Link>
	</div>

	<div 
		v-if="prod.caution"
		class="text-xs leading-tight mt-4"
		v-html="prod.caution"/>
</div>
</template>