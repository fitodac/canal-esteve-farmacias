<script setup>
defineProps(['value']);
</script>

<template>
	<label class="block font-medium text-sm text-gray-700">
		<span v-if="value">{{ value }}</span>
		<span v-else><slot /></span>
	</label>
</template>


<style scoped>
label{
	font-size: 1rem;
	@apply text-primary leading-none font-bold;
}
</style>