<script setup>
import { Link, usePage } from "@inertiajs/inertia-vue3"
import Logo from "@/Components/img/Footer.vue"
import Esteve from "@/Components/img/Esteve.vue"
import { useModal } from "@/store/modalStore.js";
import { useStore } from "@/store/mainStore.js";
import { storeToRefs } from 'pinia'

const modal = useModal();
const store = useStore();
const { user } = storeToRefs(store)

const handleOpenModal = (bypass, e) => {
    if (!user.value) {
        e.preventDefault();
        modal.open();
    }

    if (bypass) {
        if (user.value && !user.value.pharmacy_id) {
            e.preventDefault();
            modal.open();
        }
    }
}

const openCookieModal = () =>  {
    tarteaucitron.userInterface.openPanel();
}

</script>



<template>
<footer id="mainFooter">

	<div class="container mx-auto px-5">

		<div class="grid grid-cols-12 gap-x-6 gap-y-10 md:gap-6">
			<div class="hidden col-span-3 lg:block">
				<Link :href="route('home')">
					<Logo class="fill-white w-40 h-auto" />
				</Link>
			</div>


			<div class="col-span-12 md:col-span-6 lg:col-span-4">
				<div class="grid grid-cols-2 gap-x-5 gap-y-3 md:grid-cols-1 md:gap-y-2">
					<Link :href="route('products')" class="nav-item">Productos</Link>
                    <Link :href="route('webinar')" class="nav-item">Webinars</Link>
                    <a @click="handleOpenModal('',$event)" :href="route('courses.index')" class="nav-item">Formación</a>
					<a @click="handleOpenModal('',$event)" :href="route('resources')" class="nav-item">Biblioteca ESTEVE</a>
					<a @click="handleOpenModal(true,$event)" :href="route('sellout.index')" class="nav-item">Retos sell-out</a>
				</div>
			</div>

			<div class="col-span-12 md:col-span-6 lg:col-span-5 xl:col-span-4 xl:col-start-9">
				<div class="grid md:flex md:justify-between md:items-start">
					<div class="grid gap-y-5 md:flex">
						<Link :href="route('faqs')" class="nav-item">Preguntas frecuentes</Link>
						<Link :href="route('calendar')" class="nav-item md:ml-8">Calendario</Link>
					</div>

					<div class="mt-3 md:mt-0 md:flex md:items-start">
						<Link :href="route('contact')" class="nav-item">Contacto</Link>
					</div>
				</div>
			</div>
		</div>

	</div>


	<div class="footer-secondary">
		<div class="container mx-auto">
			<div class="flex flex-col items-center md:flex-row md:justify-between">
				<Link :href="route('home')">
					<Esteve />
				</Link>

				<div class="text-sm text-center mt-5 items-center md:text-right md:mt-0 md:gap-0">
					<div class="grid gap-y-3 md:flex">
						<a href="https://www.esteveagora.com/es/aviso-legal" target="_blank" class="nav-item">Aviso Legal</a>
						<span class="mx-3 hidden md:inline-block">|</span>
						<a href="https://www.esteveagora.com/es/privacidad" target="_blank" class="nav-item">Política de privacidad</a>
						<span class="mx-3 hidden md:inline-block">|</span>
						<a @click="openCookieModal" href="#" class="nav-item">Política de cookies</a>
					</div>
					<div class="select-none mt-3 md:mt-0">Esteve&reg; 2023</div>
				</div>
			</div>
		</div>
	</div>
</footer>
</template>





<style scoped>
#mainFooter{
	@apply bg-primary-500 text-white pt-10;

	--brand-primary: #FFF;
}

.nav-item{
	@apply text-sm font-medium leading-none select-none;
}

.footer-secondary{
	@apply bg-white text-primary px-5 py-7 mt-10;
}
</style>
