<script setup>

defineProps({
	enabled: Boolean
})

</script>

<template>
<div class="text-center mt-14">
	<button :disabled="enabled">
		Enviar
	</button>
</div>
</template>

<style scoped>
button{
	@apply bg-primary-500 text-white text-lg font-bold 
					leading-none text-center px-20 py-4 rounded-2xl
					transition-all select-none
}

button:not(:disabled){
	@apply hover:opacity-80;
}

button:disabled{
	@apply opacity-50;
}
</style>