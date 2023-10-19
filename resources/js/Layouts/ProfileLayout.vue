<script setup>
import Header from '@/Components/Header.vue'
import Sidebar from '@/Components/Profile/Sidebar.vue'
import Footer from '@/Components/Footer.vue'
import Modal from "@/Components/Modal.vue";
</script>


<template>
<Header />

<div class="profile-bar">
	<div class="container px-5 pb-2 mx-auto md:max-w-4xl lg:px-0 lg:max-w-5xl">
		<div class="grid grid-cols-3 gap-5 lg:grid-cols-12 lg:gap-10">

			<div class="col-span-2 lg:col-span-10">
				<h2>Mi Cuenta</h2>
				<h3>{{ $page.props.auth.user.usu_nombre }}</h3>
			</div>

			<div class="flex justify-end lg:col-span-2">
				<img
					src="img/icon-user.svg"
					class="w-10 h-10 md:w-14 md:h-14 lg:w-20 lg:h-20"
					alt="user">
			</div>

		</div>
	</div>
</div>



<div class="container px-5 pt-2 pb-16 mx-auto
								md:pt-10 md:max-w-4xl
								lg:px-0 lg:max-w-5xl">
	<div class="grid gap-5 md:gap-8 md:grid-cols-12">

		<div class="md:col-span-2">
			<Sidebar/>
		</div>

		<div class="md:col-span-10 md:pl-10 lg:pl-20">
			<section class="lg:max-w-2xl xl:max-w-3xl">
				<slot />
			</section>
		</div>

	</div>
</div>

<Footer />

<Teleport to="body">
    <Modal />
</Teleport>
</template>


<style lang="scss" scoped>
.profile-bar{
	@apply bg-primary-100 py-10 mt-8;

	h2{
		@apply text-primary text-2xl font-bold leading-none tracking-tight select-none
							lg:text-4xl;
	}

	h3{
		@apply lg:text-xl;
	}
}
</style>
