<script setup>
import { ref, computed } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'

import InputError from '@/Components/Form/InputError.vue'
import InputLabel from '@/Components/Form/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/Form/TextInput.vue'
import { Link, useForm } from '@inertiajs/inertia-vue3'
import { useStore } from '@/store/mainStore.js'
import { useModal } from "@/store/modalStore.js";
import { storeToRefs } from "pinia"

const modal = useModal();
const { isOpen } = storeToRefs(modal);

const form = useForm({
	usu_email: '',
	usu_password: ''
});

const store = useStore()
let code_error = ref(false)

const submit = () => {
	form.post(route('login'), {
		onSuccess: (res) => {
			store.setUser(res.props.auth.user);
			modal.close();
		},
		onFinish: () => {
			form.reset('password')
		},
		onError: () => {
			console.log(form.errors)
			code_error.value = true;
		}
	})
}

const clearErrors = () => {
	code_error.value = false
}

const auth = computed(() => usePage().props.value.auth)


const modal_Container_width = computed(() => {
	if( auth.value.user && !auth.value.user?.pharmacy_id ) return 'max-w-lg'
	return 'max-w-4xl'
})
</script>

<template>
<div
	v-if="isOpen"
	class="modal-wrapper"
	aria-labelledby="modal-title"
	role="dialog"
	aria-modal="true"
	id="modal">

	<div class="modal-container" :class="modal_Container_width">

		<button type="button" @click="modal.close()"
			class="modal-toggler">
			<svg viewBox="0 0 44 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			<g id="Login-y-registro" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
			<g id="EST-Home-sin-login-popup-inicio-de-sesion_V2" transform="translate(-1092.000000, -255.000000)">
			<g id="boton-cerrar" transform="translate(1092.000000, 255.000000)">
			<circle id="Oval" fill="#FFFFFF" cx="22" cy="22" r="22"></circle>
			<line x1="13.7717447" y1="12.7843179" x2="31.5451379" y2="30.5577111" id="Path-2" stroke="#5A5E5F" stroke-width="2" stroke-linecap="round"></line>
			<line x1="13.7717447" y1="12.7843179" x2="31.5451379" y2="30.5577111" id="Path-2-Copy" stroke="#5A5E5F" stroke-width="2" stroke-linecap="round" transform="translate(22.658441, 21.671014) scale(-1, 1) translate(-22.658441, -21.671014) "></line>
			</g>
			</g>
			</g>
			</svg>
		</button>



		<div
			v-if="$page.props.auth.user && $page.props.auth.user?.pharmacy_id == null"
			class="bg-white rounded-xl">

			<div class="px-8 pt-12 pb-6 sm:pb-10 lg:px-12">
				<div class="grid gap-8 sm:grid-cols-12">

					<div class="sm:col-span-4">
						<img src="img/icon-envelope.svg" alt="Sobre" class="w-28 h-auto sm:w-full">
					</div>

					<div class="sm:col-span-8">
						<div
							class="text-2xl font-medium leading-none tracking-tight
											sm:text-3xl">
							¡Bienvenido!
						</div>

						<div
							class="text-primary-500 font-bold leading-none mt-1
											sm:text-lg">
							¿Tienes código de invitación?
						</div>

						<div class="sm:text-lg sm:leading-tight">
							<strong>Introdúcelo y desbloquea</strong>
							los retos y todo el contenido disponible.
						</div>
					</div>
				</div>
			</div>



			<div class="grid gap-4 px-8 pb-8 sm:grid-cols-2 sm:pb-10 md:gap-x-5">
				<div class="">
					<PrimaryButton class="text-sm w-full">
						<Link href="/contacto" class="font-bold py-1 block">SOLICITAR código</Link>
					</PrimaryButton>
				</div>

				<div class="">
					<PrimaryButton class="text-sm w-full">
						<Link href="/mi-cuenta" class="font-bold py-1 block">INTRODUCIR código</Link>
					</PrimaryButton>
				</div>
			</div>

		</div>





		<div class="modal-body" v-if="!$page.props.auth.user">

			<div class="modal-banner">
				<h3>
					<strong>Regístrate</strong>
					<span> para tener acceso a todo el contenido de CANAL ESTEVE FARMACIAS</span>
				</h3>

				<div class="text-primary-500 text-sm mt-2 md:text-base md:leading-tight">
					<p>Podrás acceder a retos, webinars, recursos para tu farmacia y mucho más.</p>
					<p class="mt-1">Introduce tus datos y forma parte de la comunidad del
						<span class="font-bold">CANAL ESTEVE FARMACIAS.</span>
					</p>
				</div>

				<div class="text-xs mt-2 md:text-sm md:leading-tight md:mt-4">
					Si ya estás dado de alta en Canal OTC o ESTEVE ÁGORA, haz log-in con tu usuario y contraseña
				</div>

				<div class="mt-6">
					<PrimaryButton class="md:w-full rounded-lg">
							<a :href="route('register')"> <span class="text-sm font-bold px-6">Accede a todo el contenido registrándote</span> </a>
					</PrimaryButton>
				</div>

			</div>


			<div class="modal-form">
				<h3>
					<strong>Inicio de sesión</strong>
				</h3>

				<div class="text-sm mt-2 md:leading-tight">
					Si ya estas dado de alta en Canal OTC o ESTEVE AGORA introduce tu usuario y contraseña
				</div>

				<div v-if="(form.errors?.general && code_error)" class="mt-7">
						<div class="bg-[#FFF7D8] px-5 py-3 select-none rounded-xl">
								<div class="flex gap-x-10 items-center">
										<div class="font-bold leading-tight flex-1">
												<p v-if="form.errors?.general">{{ form.errors?.general }}</p>

												Por favor,
												<Link :href="route('contact')" class="text-primary font-bold hover:underline">
												Contacta
												</Link>
												con nosotros.
										</div>

										<div class="w-10">
												<button @click="clearErrors()" class="hover:opacity-90">
														<img src="/img/btn-close.svg" alt="cerrar" class="w-full">
												</button>
										</div>
								</div>
						</div>
				</div>

				<form
					@submit.prevent="submit"
					class="mt-5">
					<div>
						<InputLabel for="email" value="Email" />

						<TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.usu_email" required autofocus
								autocomplete="username" />

						<InputError class="mt-2" :message="form.errors.usu_email" />
					</div>

					<div class="mt-4">
						<InputLabel for="password" value="Password" />

						<TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.usu_password" required
								autocomplete="current-password" />

						<InputError class="mt-2" :message="form.errors.usu_password" />
					</div>

					<div class="grid gap-y-6 mt-5 md:grid-cols-2 md:gap-x-5">
						<div class="">
							<PrimaryButton class="md:w-full rounded-lg" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
								<span class="text-sm font-bold px-6">Entrar</span>
							</PrimaryButton>
						</div>


						<div class="pt-2">
							<Link :href="route('password.request')">¿Olvidaste la contraseña?</Link>


						</div>
					</div>
				</form>

			</div>

		</div>

	</div>

</div>
</template>



<style lang="scss" scoped>
.modal-wrapper{
	// background: rgba(0,105, 131, .9);
	@apply bg-primary-500 bg-opacity-90 p-8 fixed inset-0 overflow-y-auto md:grid md:place-content-center;
	z-index: 100;
}

.modal-container{ @apply mx-auto my-10 relative; }


.modal-body{
	@apply leading-tight grid relative
					md:leading-tight md:grid-cols-2
					lg:leading-tight
					xl:leading-tight;
}


.modal-banner{
	@apply bg-gray-100 px-7 pt-10 pb-8 rounded-t-xl
						md:py-8 md:pr-10 md:order-2 md:rounded-r-xl md:rounded-l-none;
}

h3{
	@apply text-primary-500 text-2xl leading-tight
						lg:text-3xl;

	strong{ @apply font-bold; }
}


.modal-form{
	@apply bg-white px-7 py-8 rounded-b-xl
					md:rounded-l-xl md:rounded-r-none;
}



.modal-toggler{
	@apply right-3 top-2 absolute z-10;

	svg{
		@apply w-9;
	}
}
</style>
