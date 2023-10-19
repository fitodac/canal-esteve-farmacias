<script setup>
import PageLayout from '@/Layouts/PageLayout.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import InputError from '@/Components/Form/InputError.vue';
import TextInput from '@/Components/Form/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue'
import SecondaryButton from '@/Components/SecondaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    name: '',
    code: '',
    nif: '',
    delegate: '',
});

const submit = () => {
    form.post(route('admin.pharmacies.store'));
};

</script>
<template>
    <PageLayout>

        <Head title="Agregar una farmacia" />

        <div class="container mx-auto mb-4">
            <form @submit.prevent="submit" class="max-w-xl mx-auto mt-10">

                <div class="mt-7">
                    <InputLabel for="name" value="Nombre" />

                    <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name"
                        autocomplete="name" />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="mt-7">
                    <InputLabel for="delegate" value="Delegado" />

                    <TextInput id="delegate" type="text" class="mt-1 block w-full" v-model="form.delegate"
                        autocomplete="delegate" />

                    <InputError class="mt-2" :message="form.errors.delegate" />
                </div>

                <div class="grid md:grid-cols-2 md:gap-x-5">
                    <div class="mt-7">
                        <InputLabel for="code" value="Código" />

                        <TextInput id="code" type="text" class="mt-1 block w-full" v-model="form.code" autocomplete="code" />

                        <InputError class="mt-2" :message="form.errors.code" />
                    </div>

                    <div class="mt-7">
                        <InputLabel for="nif" value="NIF" />

                        <TextInput id="nif" type="text" class="mt-1 block w-full" v-model="form.nif" autocomplete="nif" />

                        <InputError class="mt-2" :message="form.errors.nif" />
                    </div>
                </div>

                <div class="mt-10">

                    <PrimaryButton class="text-sm w-full sm:w-auto" :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing">
                        <div class="px-10 py-1">Guardar</div>
                    </PrimaryButton>

                    <Link class="inline-flex items-center px-4 py-2 ml-4 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150" :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing" :href="route('admin.pharmacies.index')">
                        <div class="px-10 py-1">Volver</div>
                    </Link>

                </div>
            </form>
        </div>
    </PageLayout>
</template>
