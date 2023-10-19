<script setup>
import Checkbox from '@/Components/Form/Checkbox.vue'
import Layout from '@/Layouts/LoginRegisterLayout.vue'
import InputError from '@/Components/Form/InputError.vue'
import InputLabel from '@/Components/Form/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/Form/TextInput.vue'
import { Link, useForm } from '@inertiajs/inertia-vue3'
import { useStore } from '@/store/mainStore.js'
import { ref } from "vue";

defineProps({
	canResetPassword: Boolean,
	status: String,
});

const form = useForm({
	usu_email: '',
	usu_password: '',
	remember: false,
});

const store = useStore()
let code_error = ref(false)

const submit = () => {
	form.post(route('login'), {
		onSuccess: (res) => {
			store.setUser(res.props.auth.user)
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
</script>

<template>
<Layout>

	<div class="text-center leading-tight select-none">
		<h2 class="text-primary-500 text-2xl font-bold tracking-tight md:text-4xl">Inicio de Sesión</h2>

		<div class="mt-3">
			Si ya estás <strong>dado de alta</strong> en Canal OTC o ESTEVE ÁGORA<br>
			introduce tu usuario y contraseña.
		</div>
    </div>

	<form
		@submit.prevent="submit"
		class="max-w-sm mx-auto mt-20">

        <div v-if="(form.errors?.general && code_error)" class="my-7">
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
                        <button @click.prevent="clearErrors()"  class="hover:opacity-90">
                            <img src="/img/btn-close.svg" alt="cerrar" class="w-full">
                        </button>
                    </div>
                </div>
            </div>
        </div>

		<div class="mt-7">
			<InputLabel for="email" value="Email" />

			<TextInput
				id="email"
				type="email"
				class="mt-1 block w-full"
				v-model="form.usu_email"
				required
				autofocus
				autocomplete="username"
			/>

			<InputError class="mt-2" :message="form.errors.usu_email" />
		</div>

		<div class="mt-4">
			<InputLabel for="password" value="Password" />

			<TextInput
				id="password"
				type="password"
				class="mt-1 block w-full"
				v-model="form.usu_password"
				required
				autocomplete="current-password"
			/>

			<InputError class="mt-2" :message="form.errors.usu_password" />
		</div>

		<div class="text-center mt-4">
			<Link
				v-if="canResetPassword"
				:href="route('password.request')"
				class="text-gray-600 hover:text-primary-500 rounded-md focus:text-primary-500">
				¿Olvidaste la contraseña?
			</Link>
		</div>


		<div class="text-center mt-8">
			<PrimaryButton class="rounded-lg" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
				<span class="text-sm px-10 py-1 block">Entrar</span>
			</PrimaryButton>
		</div>


		<div class="text-center mt-10">
			<Link
				:href="route('register')"
				class="text-gray-600 hover:text-primary-500 rounded-md focus:text-primary-500">
				<span>¿Aún no tienes cuenta?</span> <strong>Regístrate</strong>
			</Link>
		</div>
	</form>
</Layout>
</template>
