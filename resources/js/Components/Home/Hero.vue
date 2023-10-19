<script setup>
import Hero from '@/Components/img/Hero.vue'
import { Link } from '@inertiajs/inertia-vue3'
</script>

<template>
<div id="hero">
	<div class="grid grid-cols-12 gap-y-10 max-w-md mx-auto md:max-w-screen-2xl">

		<div class="col-span-12 md:col-span-4 md:col-start-8 md:order-2">
			<div class="text-center leading-none px-5 md:text-left md:h-full md:flex md:flex-col md:justify-center">
				<h2 class="text-primary text-5xl font-bold tracking-tight block leading-none select-none lg:text-6xl lg:leading-none">Avanza siempre</h2>
                <h3 class="mt-5 md:text-xl md:leading-none"><strong>en el cuidado de tus clientes y tu farmacia.</strong></h3>

				<div class="mt-8" v-if="!$page.props.auth.user">
					<div class="grid grid-cols-2 gap-5 md:gap-2 xl:gap-4 xl:w-3/4">
						<Link :href="route('register')" class="btn-primary rounded-full">Registro</Link>
						<Link :href="route('login')" class="btn-primary-outline rounded-full">Iniciar sesión</Link>
					</div>
				</div>
			</div>
		</div>

		<div class="col-span-12 md:col-span-6">
			<Hero class="hero-img"/>
		</div>
	</div>
</div>
</template>


<style lang="scss" scoped>
#hero{
	// background: url('../img/hero-bg.svg') no-repeat center top / 100% auto;
	background-image: url('/img/hero-bg.svg');
	background-repeat: no-repeat;
	background-position: center top;
	background-size: auto 100%;
	// height: 300px;
	padding-top: 40px;
	margin-top: 20px;
}

.hero-img{
	width: 90%;
	height: auto;
	margin: 0 5%;
}
</style>
