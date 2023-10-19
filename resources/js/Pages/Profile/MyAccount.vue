<script setup>
import { ref, computed, onMounted } from 'vue'
import { useStore } from '@/store/mainStore.js'
import { storeToRefs } from 'pinia'

import ProfileLayout from '@/Layouts/ProfileLayout.vue'
import { Link, useForm, usePage } from '@inertiajs/inertia-vue3'
import Sidebar from '@/Components/Profile/Sidebar.vue'
import InputError from '@/Components/Form/InputError.vue'
import InputLabel from '@/Components/Form/InputLabel.vue'
import TextInput from '@/Components/Form/TextInput.vue'
import Dropdown from '@/Components/Form/Dropdown.vue'
import Option from '@/Components/Form/DropdownOption.vue'
import Checkbox from '@/Components/Form/Checkbox.vue'

import {
    countries_dropdown_options,
    provinces_dropdown_options,
    population_dropdown_options,
    profile_dropdown_options
} from '@/StaticContent/register.js'

const props = defineProps({
    blogs: {
        type: Object,
        default: () => ({}),
    },
});

const user = usePage().props.value.auth.user;

const form = useForm({
    usu_codusuario: user.usu_codusuario,
    usu_nombre: user.usu_nombre,
    usu_email: user.usu_email,

    usu_ape1: user.usu_ape1,
    usu_ape2: user.usu_ape2,
    usu_dni: user.usu_dni,
    usu_codpais: user.usu_codpais,
    usu_codprovestado: user.usu_codprovestado,
    usu_ciudad: user.usu_ciudad,
    usu_direccion: user.usu_direccion,
    usu_numcolegiado: user.usu_numcolegiado,
    usu_cp: user.usu_cp,
    usu_telefono: user.usu_telefono,
    usu_codperfil: user.usu_codperfil,
    usu_codespecialidad: user.usu_codespecialidad,
    usu_codpoblacion: user.usu_codpoblacion,
    usu_empresa: user.usu_empresa,
    mailing: user.mailing == 'S' ? true : false
});

const passwordForm = useForm({
    password: '',
    new_password: ''
})

const profile_dropdown = ref('Elige un perfil de usuario')
const provinces_dropdown = ref('Elige una provincia')
const population_dropdown = ref('Elige una población')
let population_dropdown_options_filtered = ref('')

const triggerDropdown = (opt, dropdown) => {
    if(opt) {
        switch (dropdown) {
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
    }
};

const country_dropdown = ref('España')
const selectedProvince = provinces_dropdown_options.find((el) => el.value == form.usu_codprovestado)
const selectedPopulation = population_dropdown_options.find((el) =>
    el.province == selectedProvince.value && el.value == form.usu_codpoblacion
)

if (selectedProvince) {
    triggerDropdown(selectedProvince, 'provinces');
}
if (selectedPopulation) {
    triggerDropdown(selectedPopulation, 'population');
}

const store = useStore()

const submit = () => {
    form.post(route('my-account.update'), {
        onSuccess: (res) => {
            store.setUser(res.props.auth.user)
        },
        onError: () => {
            console.debug(form.errors?.general)
        }
    });
};

const submitPassword = () => {
    passwordForm.put(route('password.update'), {
        onSuccess: () => {
            code_success.value = true;
            code_error.value = false;
        },
        onFinish: () => {
            passwordForm.reset('password', 'new_password')
        },
        onError: () => {
            code_error.value = true
        }
    });
};

let code_error = ref(false)
let code_success = ref(false)

const clearErrors = () => {
    code_error.value = false
}
</script>



<template>
<ProfileLayout>
	<h3 class="text-xl font-bold leading-none sm:text-2xl md:text-3xl">Mis datos</h3>

    <div v-if="(form.errors?.general || passwordForm.errors?.general) && code_error" class="mt-7">
        <div class="bg-[#FFF7D8] px-5 py-3 select-none rounded-xl">
            <div class="flex gap-x-10 items-center">
                <div class="font-bold leading-tight flex-1">
                    <p v-if="form.errors?.general">{{ form.errors?.general }}</p>
                    <p v-if="passwordForm.errors?.general">{{ passwordForm.errors?.general }}</p>

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

    <div v-if="code_success" class="xl:max-w-xl mt-7">
        <div class="bg-[#E8FFD8] px-5 py-3 select-none rounded-xl">
            <div class="flex gap-x-10 items-center">
                <div class="font-bold leading-tight flex-1">
                    Actualización correcta..
                </div>

                <div class="w-10">
                    <button @click="code_unblocked = false" class="hover:opacity-90">
                        <img src="/img/btn-close.svg" alt="cerrar" class="w-full">
                    </button>
                </div>
            </div>
        </div>
    </div>

	<div class="py-7 sm:py-8 md:py-10">
		<div class="text-xl leading-none sm:text-2xl">Nombre de usuario: <span class="font-bold">{{ $page.props.auth.user.usu_email }}</span></div>

		<form @submit.prevent="submit" class="mt-10">

            <div>
                <InputLabel for="name" value="Nombre" />

                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.usu_nombre" autocomplete="name" />

                <InputError class="mt-2" :message="form.errors.usu_nombre" />
            </div>


            <div class="grid md:grid-cols-2 md:gap-x-5">

                <div class="mt-7">
                    <InputLabel for="first_last_name" value="Primer apellido" />

                    <TextInput id="first_last_name" type="text" class="mt-1 block w-full" v-model="form.usu_ape1"
                        autocomplete="first_last_name" />

                    <InputError class="mt-2" :message="form.errors.usu_ape1" />
                </div>


                <div class="mt-7">
                    <InputLabel for="second_last_name" value="Segundo apellido" />

                    <TextInput id="second_last_name" type="text" class="mt-1 block w-full" v-model="form.usu_ape2"
                        autocomplete="second_last_name" />

                    <InputError class="mt-2" :message="form.errors.usu_ape2" />
                </div>

            </div>


            <div class="mt-7">
                <InputLabel for="dni" value="DNI" />

                <TextInput id="dni" type="text" class="mt-1 block w-full" v-model="form.usu_dni" autocomplete="dni" />

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
                            <Option v-for="opt in countries_dropdown_options" :key="opt.value"
                                @click="triggerDropdown(opt,'country')">{{ opt.label }}
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
                            <Option v-for="opt in provinces_dropdown_options" :key="opt.value"
                                @click="triggerDropdown(opt, 'provinces')">{{
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

                <InputError class="mt-2" :message="form.errors.usu_codprovestado" />
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
                <label class="flex items-center select-none">
                    <Checkbox name="remember" v-model:checked="form.mailing" />
                    <span class="ml-2 text-sm text-gray-600 cursor-pointer">
                        Deseo recibir comunicaciones comerciales.
                    </span>
                </label>
            </div>

			<div class="sm:col-span-3">
                <button
					type="submit"
					class="bg-primary text-white text-sm
                        font-bold leading-none w-32 h-10 mt-2 rounded-full
                        md:w-full"
                        :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                >Actualizar</button>
			</div>
		</form>
	</div>



	<div class="border-t border-gray-300 py-7 sm:py-8 md:py-10">
		<div class="text-xl leading-none sm:text-2xl">Actualizar contraseña</div>

        <form
			@submit.prevent="submitPassword"
			class="">


            <div class="mt-7">
                <InputLabel for="password" value="Contraseña" />

                <TextInput id="password" type="password" class="mt-1 block w-full" v-model="passwordForm.password"
                    autocomplete="password" />

                <InputError class="mt-2" :message="passwordForm.errors.password" />
            </div>

            <div class="mt-7">
                <InputLabel for="new_password" value="Nueva Contraseña" />

                <TextInput id="new_password" type="password" class="mt-1 block w-full" v-model="passwordForm.new_password"
                    autocomplete="new-password" />

                <InputError class="mt-2" :message="passwordForm.errors.new_password" />
            </div>

            <div class="sm:col-span-3 mt-2">
                <button type="submit" class="bg-primary text-white text-sm
                                    font-bold leading-none w-32 h-10 mt-2 rounded-full
                                    md:w-full" :class="{ 'opacity-25': passwordForm.processing }"
                    :disabled="passwordForm.processing">Actualizar</button>
            </div>
		</form>
	</div>
</ProfileLayout>
</template>
