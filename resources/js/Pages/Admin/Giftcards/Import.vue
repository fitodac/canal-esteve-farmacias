<script setup>
import PageLayout from '@/Layouts/PageLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue'
import InputLabel from '@/Components/Form/InputLabel.vue';
import InputError from '@/Components/Form/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';


const form = useForm({
    file: '',
});

const submit = () => {
    form.post(route('admin.giftcards.import'));
};

const fileDataProccess = file => {
    const reader = new FileReader()
    reader.addEventListener('load', () => form.file = reader.result)
    reader.readAsDataURL(file)
}

const handleFileUpload = event => fileDataProccess(event.target.files[0])
</script>
<template>
    <PageLayout>

        <Head title="Importar archivo de tarjetas de regalo" />

        <div class="container mx-auto mb-4">
            <form @submit.prevent="submit" class="max-w-xl mx-auto mt-10">
                <div class="mt-7">
                    <InputLabel for="import_file" value="Archivo csv" />

                    <input
                        type="file"
                        @change="handleFileUpload"
                        ref="file_input" />

                    <InputError class="mt-2" :message="form.errors.file" />

                    <div v-if="$page.props.errors && $page.props.errors[0]"
                        class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span class="font-medium">
                            {{ $page.props.errors[0] }}
                        </span>
                    </div>
                </div>
                <div class="mt-10">

                    <PrimaryButton class="text-sm w-full sm:w-auto" :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing">
                        <div class="px-10 py-1">Guardar</div>
                    </PrimaryButton>

                    <Link
                        class="inline-flex items-center px-4 py-2 ml-4 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                        :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                        :href="route('admin.giftcards.index')">
                    <div class="px-10 py-1">Volver</div>
                    </Link>

                </div>
            </form>
        </div>
    </PageLayout>
</template>
