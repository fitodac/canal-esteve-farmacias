<script setup>
import { onMounted, reactive } from 'vue'
import Layout from '@/Layouts/PageLayout.vue'
import Header from '@/Components/PageHeader.vue'
import InputError from '@/Components/Form/InputError.vue'
import InputLabel from '@/Components/Form/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/Form/TextInput.vue'
import { Link, useForm } from '@inertiajs/inertia-vue3'
import Checkbox from '@/Components/Form/Checkbox.vue'
import { useModal } from '@/store/modalStore.js'

const modal = useModal();

onMounted(() => {
    modal.close()
    modal.registrationClose()
})

const form = useForm({
	name: 		'',
	lastname: 	'',
	email: 		'',
	phone: 		'',
	pharm: 		'',
	message: 	'',
	acceptance: false
})

const submit = () => {
    form.post(route('contact.store'), {
		onSuccess: () => {
            form.reset()
		},
		onError: () => console.log('error')
	})
}
</script>


<template>
<Layout>
	<Header page="contact" />
    <div v-if="$page.props.flash.message"
        class="p-4 mb-4 text-sm text-green-700 text-center bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
        <span class="font-medium">
            {{ $page.props.flash.message }}
        </span>
    </div>
	<div class="container px-5 mx-auto md:max-w-xl xl:px-0">
        <p class="text-telf font-bold text-lg text-primary-500">Contáctanos mediante el formulario que tienes a continuación o llámanos al 669423346 .<br>
            <span class="text-primary-500 font-medium text-sm ">*El horario de atención es de 9h a 18h de Lunes a Jueves y de 9h a 14h los Viernes</span></p>
		<form
			class="pt-8 pb-20"
			@submit.prevent="submit">

			<div class="">
				<InputLabel value="Nombre" />

				<TextInput
					id="name"
					type="text"
					class="mt-2 block w-full"
					v-model="form.name"/>

                <InputError class="mt-2" :message="form.errors.name" />
			</div>

			<div class="mt-6">
				<InputLabel value="Apellido" />

				<TextInput
					id="lastname"
					type="text"
					class="mt-2 block w-full"
					v-model="form.lastname"/>

                <InputError class="mt-2" :message="form.errors.lastname" />
			</div>

			<div class="mt-6">
				<InputLabel value="Correo electrónico" />

				<TextInput
					id="email"
					type="text"
					class="mt-2 block w-full"
					v-model="form.email"/>

                <InputError class="mt-2" :message="form.errors.email" />
			</div>

			<div class="mt-6">
				<InputLabel value="Teléfono" />

				<TextInput
					id="phone"
					type="text"
					class="mt-2 block w-full"
					v-model="form.phone"/>

                <InputError class="mt-2" :message="form.errors.phone" />
			</div>

			<div class="mt-6">
				<InputLabel value="Farmacia" />

				<TextInput
					id="pharm"
					type="text"
					class="mt-2 block w-full"
					v-model="form.pharm"/>

                <InputError class="mt-2" :message="form.errors.pharm" />
			</div>

			<div class="mt-6">
				<InputLabel value="Mensaje" />

				<textarea
					id="message"
					class="mt-2 block w-full h-40 bg-color-form border-color-form w-full px-4 py-2.5 mt-2
						leading-none rounded-lg resize-none focus:border-primary-500"
					v-model="form.message"></textarea>

                <InputError class="mt-2" :message="form.errors.message" />
			</div>



			<div class="block mt-6 select-none">
				<label class="flex items-center">
					<Checkbox name="remember" v-model:checked="form.acceptance" />

					<span
						class="text-gray-600 cursor-pointer pl-3">
						He leído y acepto la

						<Link
							:href="route('password.request')"
							class="text-primary-500 font-bold pl-0.5 hover:underline">
							política de privacidad
						</Link>
					</span>
				</label>
                <InputError class="mt-2" :message="form.errors.acceptance" />
			</div>


			<div class="mt-7">
				<PrimaryButton
					class="text-sm w-full sm:w-auto"
					:class="{ 'opacity-25': form.processing }"
					:disabled="form.processing">
					<div class="px-20 py-2">Enviar</div>
				</PrimaryButton>
			</div>

		</form>
	</div>

</Layout>
</template>
