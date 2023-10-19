<script setup>
import PageLayout from '@/Layouts/PageLayout.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import InputError from '@/Components/Form/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue'
import Dropdown from '@/Components/Form/Dropdown.vue'
import Option from '@/Components/Form/DropdownOption.vue'

import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import { ref } from 'vue'

const props = defineProps({
    user: Object,
    roles: Object
});

const form = useForm({
    email: props.user.email,
    role: props.user.roles.length > 0 ? props.user.roles[0].id : '',
});

const role_dropdown = ref('Seleccione un rol')

const triggerDropdown = (opt) => {
    if(opt) {
        role_dropdown.value = opt.readable_name
        form.role = opt.id
    }
};

const selectedRole = props.roles.find((el) => el.id == form.role)

triggerDropdown(selectedRole);

const submit = () => {
    form.put(route('admin.users.update', props.user.id), {
        _method: 'put',
    });
};

</script>
<template>
    <PageLayout>

        <Head title="Editar rol de usuario" />

        <div class="container mx-auto mb-4">
            <form @submit.prevent="submit" class="max-w-xl mx-auto mt-10">

                <div class="mt-7">
                    <div class="text-primary leading-none font-bold block text-base">
                        Usuario
                    </div>
                    <h3>{{ props.user.email }}</h3>
                </div>

                <div class="mt-7">
                    <InputLabel for="rol" value="Rol" />

                    <Dropdown>
                        <template #trigger>
                            {{ role_dropdown }}
                        </template>

                        <template #content>
                            <Option v-for="opt in roles" :key="opt.id" @click="triggerDropdown(opt)">
                                {{ opt.readable_name }}
                            </Option>
                        </template>
                    </Dropdown>

                    <InputError class="mt-2" :message="form.errors.product_id" />
                </div>

                <div class="mt-10">

                    <PrimaryButton class="text-sm w-full sm:w-auto" :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing">
                        <div class="px-10 py-1">Guardar</div>
                    </PrimaryButton>

                    <Link
                        class="inline-flex items-center px-4 py-2 ml-4 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                        :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                        :href="route('admin.users.index')">
                    <div class="px-10 py-1">Volver</div>
                    </Link>

                </div>
            </form>
        </div>
    </PageLayout>
</template>
