<script setup>
import Logo from '@/Components/img/Logo.vue'
import { Link } from '@inertiajs/inertia-vue3'
import Corner from '@/Components/img/Corner.vue'
import Modal from "@/Components/Modal.vue";
</script>

<template>
<div class="px-5">
	<header>
		<Corner class="top-bar--corner"/>

		<div class="pt-12 pb-8 flex justify-center items-center md:pt-20 md:pb-14 lg:pt-28">
            <Link :href="route('home')">
			    <Logo class="fill-primary w-32 h-auto md:w-44"/>
            </Link>
		</div>
	</header>
	<slot />

	<div class="h-32"></div>
</div>

<Teleport to="body">
    <Modal />
</Teleport>
</template>



<style scoped>
header{
	background: url('/img/login-bg.svg') repeat-x center top / auto 100%;
}
</style>
