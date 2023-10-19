<script setup>
import PageLayout from '@/Layouts/PageLayout.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import InputError from '@/Components/Form/InputError.vue';
import TextInput from '@/Components/Form/TextInput.vue';
import Dropdown from '@/Components/Form/Dropdown.vue'
import Option from '@/Components/Form/DropdownOption.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import SecondaryButton from '@/Components/SecondaryButton.vue'

import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import { ref } from 'vue'

const props = defineProps({
    resource: Object,
    categories: Object,
    channels: Object,
    contenttypes: Object,
    products: Object,
});

const form = useForm({
    material: props.resource.material,
    category_id: props.resource.category_id,
    content_type_id: props.resource.content_type_id,
    channel_id: props.resource.channel_id,
    link: props.resource.link,
    image: props.resource.image,
    file: null,
    url: null,
    products: null,
});

let url = ref(form.image)
let selectedProducts = [];

const submit = () => {

	form.image = form.url ?? props.resource.image
	form.link = form.file ?? props.resource.link
	form.products = selectedProducts

	form.put(route('admin.resources.update', props.resource.id), {
		onError: _ => {
			// form.link = form.file ?? props.resource.link
			// form.image = form.url ?? props.resource.image
			// url = props.resource.image
		},
	})
};

const category_dropdown = ref('Seleccione la categoría')
const channels_dropdown = ref('Seleccione el canal')
const contenttypes_dropdown = ref('Seleccione el tipo de contenido')

const triggerDropdown = (opt, dropdown) => {
    switch (dropdown) {
        case 'categories':
            category_dropdown.value = opt.name
            form.category_id = opt.id
            break;
        case 'channels':
            channels_dropdown.value = opt.channel
            form.channel_id = opt.id
            break;
        case 'contenttypes':
            contenttypes_dropdown.value = opt.type
            form.content_type_id = opt.id
            break;
    }
};

const selectedCategory = props.categories.find((el) => el.id == form.category_id)
const selectedChannel = props.channels.find((el) => el.id == form.channel_id)
const selectedContentType = props.contenttypes.find((el) => el.id == form.content_type_id)
selectedProducts = props.resource.products.map(e => e.id);

triggerDropdown(selectedCategory, 'categories');
triggerDropdown(selectedChannel, 'channels');
triggerDropdown(selectedContentType, 'contenttypes');

const previewImage = (e) => {
    const file = e.target.files[0];
    const reader = new FileReader();
    url.value = URL.createObjectURL(file);

    reader.onload = (f) => {
        form.url = f.target.result;
    }
    reader.readAsDataURL(file);
}

const fileDataProccess = file => {
    const reader = new FileReader()
    reader.addEventListener('load', () => form.file = reader.result)
    reader.readAsDataURL(file)
}

const handleFileUpload = event => fileDataProccess(event.target.files[0])
</script>
<template>
    <PageLayout>
        <Head title="Editar recurso" />

        <div class="container mx-auto mb-4">
            <form @submit.prevent="submit" class="max-w-xl mx-auto mt-10">

                <div class="mt-7">
                    <InputLabel for="materia" value="Material" />

                    <TextInput id="material" type="text" class="mt-1 block w-full" v-model="form.material" autocomplete="material" />

                    <InputError class="mt-2" :message="form.errors.material" />
                </div>

                <div class="mt-7">
                    <InputLabel for="link" value="Enlace" />

                    <a :href="form.link" target="_blank">{{ form.link }} </a>

                    <InputError class="mt-2" :message="form.errors.link" />

                </div>

                <div class="mt-7">
                    <InputLabel for="file" value="Archivo" />

                    <input
                        type="file"
                        @change="handleFileUpload"
                        ref="file_input" />
                </div>

                <div class="grid md:grid-cols-2 md:gap-x-5">
                    <div class="mt-7">
                        <InputLabel for="product" value="Producto" />

                        <select multiple class="mt-1 block w-full" v-model="selectedProducts">
                            <option v-for="opt in props.products" :key="opt.id" :value="opt.id" :selected="selectedProducts[opt.id] === opt.id">
                                {{ opt.name }}
                            </option>
                        </select>

                        <small>Presione Ctrl (windows) o cmd (Mac) para seleccionar multiples productos.</small>
                        <InputError class="mt-2" :message="form.errors.products" />
                    </div>

                    <div class="mt-7">
                        <InputLabel for="category" value="Categoría" />

                        <Dropdown>
                            <template #trigger>
                                {{ category_dropdown }}
                            </template>

                            <template #content>
                                <Option v-for="opt in categories" :key="opt.id" @click="triggerDropdown(opt, 'categories')" >
                                    {{ opt.name }}
                                </Option>
                            </template>
                        </Dropdown>

                        <InputError class="mt-2" :message="form.errors.category_id" />
                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-x-5">

                    <div class="mt-7">
                        <InputLabel for="channel" value="Canal" />

                        <Dropdown>
                            <template #trigger>
                                {{ channels_dropdown }}
                            </template>

                            <template #content>
                                <Option v-for="opt in channels" :key="opt.id" @click="triggerDropdown(opt, 'channels')">{{
                                opt.channel }}
                                </Option>
                            </template>
                        </Dropdown>

                        <InputError class="mt-2" :message="form.errors.channel_id" />
                    </div>

                    <div class="mt-7">
                        <InputLabel for="contenttype" value="Tipo de contenido" />

                        <Dropdown>
                            <template #trigger>
                                {{ contenttypes_dropdown }}
                            </template>

                            <template #content>
                                <Option v-for="opt in contenttypes" :key="opt.id"
                                    @click="triggerDropdown(opt,'contenttypes')">{{ opt.type }}
                                </Option>
                            </template>
                        </Dropdown>

                        <InputError class="mt-2" :message="form.errors.content_type_id" />
                    </div>

                </div>

                <div class="mt-7">
									<InputLabel for="image" value="Imagen" />
									<img v-if="url" :src="url" class="w-full mt-4 h-80" />
									<input @change="previewImage" type="file" class="mt-1 block w-full" />
									<InputError class="mt-2" :message="form.errors.image" />
                </div>

                <div class="mt-10">

                    <PrimaryButton class="text-sm w-full sm:w-auto" :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing">
                        <div class="px-10 py-1">Guardar</div>
                    </PrimaryButton>

                    <Link
                        class="inline-flex items-center px-4 py-2 ml-4 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                        :class="{ 'opacity-25': form.processing }" :disabled="form.processing" :href="route('admin.resources.index')">
                        <div class="px-10 py-1">Volver</div>
                    </Link>

                </div>
            </form>
        </div>
    </PageLayout>
</template>
