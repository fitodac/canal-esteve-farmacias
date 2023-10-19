<script setup>
import { onMounted, ref } from 'vue'
import { useModal } from '@/store/modalStore'
import RegisterModal from '@/Components/RegisterModal.vue'

import Layout from '@/Layouts/LoginRegisterLayout.vue'
import InputError from '@/Components/Form/InputError.vue'
import InputLabel from '@/Components/Form/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/Form/TextInput.vue'
import Dropdown from '@/Components/Form/Dropdown.vue'
import Option from '@/Components/Form/DropdownOption.vue'
import Checkbox from '@/Components/Form/Checkbox.vue'
import { Link, useForm } from '@inertiajs/inertia-vue3'
import {
    countries_dropdown_options,
    provinces_dropdown_options,
    population_dropdown_options,
    profile_dropdown_options
} from '@/StaticContent/register.js'

const modal = useModal();

onMounted(() => {
    modal.close()
    modal.registrationClose()
})

const form = useForm({
    usu_nombre: '',
    usu_email: '',
    usu_password: '',
	usu_password_confirmation: '',
	terms: false,

    usu_ape1: '',
    usu_ape2: '',
    usu_dni: '',
    usu_codpais: '042',
    usu_codprovestado: '',
    usu_ciudad: 'no introducido',
    usu_direccion: '',
    usu_cp: '',
    usu_telefono: '',
    usu_codperfil: '',
    usu_codespecialidad: 0,
    usu_codpoblacion: '',
    usu_empresa: '',
	invitation_code: '',
	mailing: false
});

const profile_dropdown = ref('Elige un perfil de usuario')
const country_dropdown = ref('España')
const provinces_dropdown = ref('Elige una provincia')
const population_dropdown = ref('Elige una población')
let population_dropdown_options_filtered = ref('')

const triggerDropdown = (opt, dropdown) => {
    switch (dropdown) {
        case 'profile':
            profile_dropdown.value = opt.label
            form.usu_codperfil = opt.value
            break;
        case 'provinces':
            provinces_dropdown.value = opt.label
            form.usu_codprovestado = opt.value
            population_dropdown_options_filtered = population_dropdown_options.filter(
                population => population.province == opt.value
            );
            break;
        case 'population':
            population_dropdown.value = opt.label
            form.usu_codpoblacion = opt.value
            break;
    }
};

const submit = () => {
	form.post(route('register'), {
        onSuccess: () => {
            console.log('muchas gracias por registrarse, recibirá un correo con un enlace para verificar');
        },
		onFinish: () => {
            form.reset('password', 'password_confirmation')
        },
        onError: () => {
            if (form.errors?.duplicateEmail) {
                modal.registrationOpen()
            }
            console.debug(form.errors?.general)
        }
	});
};
</script>

<template>
<Layout>

	<div class="text-center leading-tight select-none">
		<h2 class="text-primary-500 text-2xl font-bold tracking-tight md:text-4xl">Registro</h2>

		<div class="mt-3">
			Gracias por tu interés en CANAL ESTEVE FARMACIAS.<br>
			<strong>Por favor introduce tus datos.</strong>
		</div>

		<div class="text-sm mt-5">
			Si ya estás dado de alta en Canal OTC o ESTEVE ÁGORA,<br>
			haz
			<Link
				:href="route('login')"
				class="text-primary-500 font-bold">log-in</Link>
			con tu usuario y contraseña
		</div>
	</div>


	<form
		@submit.prevent="submit"
		class="max-w-xl mx-auto mt-10">

		<div>
			<InputLabel for="name" value="Nombre" />

			<TextInput
				id="name"
				type="text"
				class="mt-1 block w-full"
				v-model="form.usu_nombre"
				autocomplete="name"/>

			<InputError class="mt-2" :message="form.errors.usu_nombre" />
		</div>


		<div class="grid md:grid-cols-2 md:gap-x-5">

			<div class="mt-7">
				<InputLabel for="first_last_name" value="Primer apellido" />

				<TextInput
					id="first_last_name"
					type="text"
					class="mt-1 block w-full"
					v-model="form.usu_ape1"
					autocomplete="first_last_name"/>

				<InputError class="mt-2" :message="form.errors.usu_ape1" />
			</div>


			<div class="mt-7">
				<InputLabel for="second_last_name" value="Segundo apellido" />

				<TextInput
					id="second_last_name"
					type="text"
					class="mt-1 block w-full"
					v-model="form.usu_ape2"
					autocomplete="second_last_name"/>

				<InputError class="mt-2" :message="form.errors.usu_ape2" />
			</div>

		</div>


        <div class="mt-7">
			<InputLabel for="dni" value="DNI" />

			<TextInput
				id="dni"
				type="text"
				class="mt-1 block w-full"
				v-model="form.usu_dni"
				autocomplete="dni"/>

			<InputError class="mt-2" :message="form.errors.usu_dni" />
		</div>


        <div class="grid md:grid-cols-2 md:gap-x-5">

            <div class="mt-7">
                <InputLabel for="country" value="País" />

                <Dropdown>
                    <template #trigger>
                        {{ country_dropdown }}
                    </template>

                    <template #content>
                        <Option v-for="opt in countries_dropdown_options" :key="opt.value" @click="triggerDropdown(opt,'country')">{{ opt.label }}
                        </Option>
                    </template>
                </Dropdown>

                <InputError class="mt-2" :message="form.errors.usu_codpais" />
            </div>


            <div class="mt-7">
                <InputLabel for="province" value="Provincia" />

                <Dropdown>
                    <template #trigger>
                        {{ provinces_dropdown }}
                    </template>

                    <template #content>
                        <Option v-for="opt in provinces_dropdown_options" :key="opt.value" @click="triggerDropdown(opt, 'provinces')">{{
                        opt.label }}
                        </Option>
                    </template>
                </Dropdown>

                <InputError class="mt-2" :message="form.errors.usu_codprovestado" />
            </div>

        </div>

        <div class="mt-7">
            <InputLabel for="population" value="Población" />

            <Dropdown>
                <template #trigger>
                    {{ population_dropdown }}
                </template>

                <template #content>
                    <Option v-for="opt in population_dropdown_options_filtered" :key="opt.value"
                        @click="triggerDropdown(opt, 'population')">{{
                        opt.label }}
                    </Option>
                </template>
            </Dropdown>

            <InputError class="mt-2" :message="form.errors.usu_codpoblacion" />
        </div>

        <div class="mt-7">
            <InputLabel for="address" value="Dirección" />

            <TextInput id="address" type="text" class="mt-1 block w-full" v-model="form.usu_direccion" autocomplete="address" />

            <InputError class="mt-2" :message="form.errors.usu_direccion" />
        </div>


        <div class="mt-7">
            <InputLabel for="zip" value="Código postal" />

            <TextInput id="zip" type="text" class="mt-1 block w-full" v-model="form.usu_cp" autocomplete="zip" />

            <InputError class="mt-2" :message="form.errors.usu_cp" />
        </div>


        <div class="mt-7">
            <InputLabel for="phone" value="Teléfono" />

            <TextInput id="phone" type="text" class="mt-1 block w-full" v-model="form.usu_telefono" autocomplete="phone" />

            <InputError class="mt-2" :message="form.errors.usu_telefono" />
        </div>


		<div class="mt-7">
			<InputLabel value="Perfil de usuario" />

			<Dropdown>
				<template #trigger>
					{{ profile_dropdown }}
				</template>

				<template #content>
					<Option
						v-for="opt in profile_dropdown_options"
						:key="opt.value"
						@click="triggerDropdown(opt, 'profile')">{{ opt.label }}</Option>
				</template>
			</Dropdown>

			<div class="text-sm leading-none mt-2">
				*Los farmacéuticos titulares no podrán acceder a los retos de sell-out.
			</div>

			<InputError class="mt-2" :message="form.errors.usu_codperfil" />
		</div>

		<div class="mt-7">
			<InputLabel for="email" value="Email" />

			<TextInput
				id="email"
				type="email"
				class="mt-1 block w-full"
				v-model="form.usu_email"
				autocomplete="email"/>

			<InputError class="mt-2" :message="form.errors.usu_email" />
		</div>


		<div class="mt-7">
			<InputLabel for="password" value="Contraseña" />

			<TextInput
				id="password"
				type="password"
				class="mt-1 block w-full"
				v-model="form.usu_password"
				autocomplete="new-password"
			/>

			<InputError class="mt-2" :message="form.errors.usu_password" />
		</div>


		<div class="mt-7">
			<InputLabel for="password_confirmation" value="Confirmar Contraseña" />

			<TextInput
				id="password_confirmation"
				type="password"
				class="mt-1 block w-full"
				v-model="form.usu_password_confirmation"
				autocomplete="new-password"/>

			<InputError class="mt-2" :message="form.errors.usu_password_confirmation" />
		</div>


		<div class="mt-7">
			<InputLabel for="invitation_code" value="Código de invitación" />

			<TextInput
				id="invitation_code"
				type="text"
				class="mt-1 block w-full"
				v-model="form.invitation_code"
				autocomplete="invitation_code"/>

			<InputError class="mt-2" :message="form.errors.invitation_code" />
		</div>



		<div class="mt-7">
			<label class="flex items-center select-none">
				<Checkbox name="remember" v-model:checked="form.mailing" />
				<span class="ml-2 text-sm text-gray-600 cursor-pointer">
					Deseo recibir comunicaciones comerciales.
				</span>
			</label>


			<label class="flex items-center mt-3 select-none">
				<Checkbox name="remember" v-model:checked="form.terms" />
				<span class="ml-2 text-sm text-gray-600 cursor-pointer">
					Estoy de acuerdo con el
                    <a href="https://www.esteveagora.com/es/aviso-legal" target="_blank" class="nav-item">Aviso Legal</a>
                    <a href="https://www.esteveagora.com/es/privacidad" target="_blank" class="nav-item">Política de privacidad</a>
				</span>
			</label>
            <InputError class="mt-2" :message="form.errors.terms" />
		</div>



		<div class="mt-10">

			<PrimaryButton
				class="text-sm w-full sm:w-auto"
				:class="{ 'opacity-25': form.processing }"
				:disabled="form.processing">
				<div class="px-10 py-1">Registrar</div>
			</PrimaryButton>
		</div>
	</form>

    <Teleport to="body">
        <RegisterModal />
    </Teleport>
</Layout>
</template>
