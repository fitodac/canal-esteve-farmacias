<script setup>
defineProps(['data'])
</script>



<template>
<div class="mt-14">
	<h3 
		v-if="data.title" 
		class="text-3xl leading-none tracking-tight select-none">{{ data.title }}</h3>

	<div 
		v-if="data.content"
		class="mt-5">
		
		<div 
			v-for="(item, i) in data.content"
			:key="i"
			:class="{'mt-10': i}">

			<h4 
				v-html="item.title" 
				class="text-primary-500 text-xl font-bold leading-none select-none"/>

			<p 
				v-for="(p,i) in item.content" 
				:key="i" 
				v-html="p" 
				class="leading-tight"
				:class="{'mt-4': i, 'mt-2': !i}" />


			<div v-if="item.list" class="mt-12">
				<div 
					v-for="(li, i) in item.list" 
					:key="i"
					class="flex gap-6 mt-4">
					<div v-html="li.index"/>
					
					<div 
						v-for="(p,i) in li.content"
						:key="i"
						v-html="p"
						class="leading-tight" />
				</div>
			</div>

		</div>

	</div>
</div>
</template>