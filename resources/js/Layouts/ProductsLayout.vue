<script setup>
import Header from '@/Components/Header.vue'
import Footer from '@/Components/Footer.vue'
import Modal from "@/Components/Modal.vue";
</script>


<template>
<div class="wrapper">
	<Header />
	<h2 class="page-title">Productos</h2>
	<slot />
	<Footer />

    <Teleport to="body">
			<Modal />
    </Teleport>
</div>
</template>


<style scoped>
.wrapper{
	@apply bg-gray-light;
}

.page-title{
	@apply text-primary-500 text-3xl font-bold text-center leading-none
						tracking-tight mt-8 md:text-4xl;
}
</style>
