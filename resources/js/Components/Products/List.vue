<script setup>
defineProps({
	data: Object
})
</script>

<template>
<div class="pt-7 pb-16">
	<div class="container max-w-sm mx-auto px-5 md:max-w-3xl xl:px-0">
		
		<ul class="pl-16 md:pl-28">
			<li 
				v-for="(item, i) in data" 
				:key="i"
				class="text-sm leading-tight flex gap-x-3 md:text-base md:leading-tight"
				:class="{'mt-2': i}">
				<div>
					<span class="bg-gray-500 w-[3px] h-[3px] block top-2.5 relative rounded-full"></span>
				</div>
				<div v-html="item"/>
			</li>
		</ul>

	</div>
</div>
</template>