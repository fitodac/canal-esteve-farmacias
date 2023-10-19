<script setup>
defineProps([
	'type',
	'name',
	'intro'
])
</script>



<template>
<div class="container max-w-3xl mx-auto px-5 xl:px-0">

	<div class="text-white text-center">
		
		<div 
			v-if="type"
			class="text-sm select-none" 
			v-html="type"/>
		
		<h2
			v-if="name"
			class="text-3xl font-bold leading-none mt-3 select-none md:text-4xl" 
			v-html="name"/>

		<div 
			v-if="intro"
			class="text-xl font-bold leading-none mt-10 select-none md:text-2xl lg:text-3xl">
			¿Qué es?
		</div>

		<div 
			v-if="intro"
			class="max-w-lg mx-auto mt-5 select-none">
			<p 
				v-for="(p, i) in intro" 
				:key="i" 
				class="leading-tight mt-3"
				v-html="p" />
		</div>

	</div>

</div>
</template>