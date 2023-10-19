<script setup>
const {
	name,
	type
} = defineProps({
	name: String,
	type: String,
	img_url: String
})

const challenge_type = ({
	'visibility': 'visibilidad',
	'recommendation': 'recomendación'
})[type]
</script>


<template>
<section class="header">
	<div class="container mx-auto py-12">
		<div class="text-center">
			<img
				src="/img/icon-challenge.svg"
				alt="Reto"
				class="w-10 inline-block md:w-20">

			<h2>
				<span>Reto</span>
				<span class="font-bold">{{ name }}</span>
			</h2>

			<h3>Reto de {{ challenge_type }}</h3>
		</div>

		<div class="mx-auto">
			<img
				class="cover"
				:src="img_url"
				:alt="name">
		</div>
	</div>
</section>
</template>



<style scoped>
.header{
	@apply md:pt-6;
}

h2{
	@apply text-primary-500 text-3xl mt-4 select-none
					sm:text-4xl md:text-5xl lg:text-6xl;
}

h3{
	@apply font-bold tracking-wide mt-2 select-none lg:text-lg;
}

.cover{
	@apply w-10/12 mx-auto mt-6 object-cover rounded-xl md:w-10/12 lg:w-9/12 xl:w-7/12;
}
</style>
