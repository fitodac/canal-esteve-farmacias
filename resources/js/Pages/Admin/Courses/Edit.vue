<script setup>
import PageLayout from '@/Layouts/PageLayout.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import InputError from '@/Components/Form/InputError.vue';
import TextInput from '@/Components/Form/TextInput.vue';
import Dropdown from '@/Components/Form/Dropdown.vue'
import Option from '@/Components/Form/DropdownOption.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextArea from '@/Components/Form/TextArea.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue'
import DynamicSpeaker from '@/Components/Webinar/DynamicSpeaker.vue';

import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import { ref, reactive } from 'vue'

const props = defineProps({
    course: Object,
    categories: Object,
    format: Object,
});

const form = useForm({
    name: props.course.name,
    format_id: props.course.format_id,
    subtitle: props.course.subtitle,
    short_description: props.course.short_description,
    score: props.course.score,
    title: props.course.title,
    long_description: props.course.long_description,
    category_id: props.course.category_id,
    image: props.course.image,
    teacher: props.course.teacher,
    video: props.course.video,
		references: props.course.references ? JSON.parse(props.course.references) : {title: '', content: ''}
});

let url = ref(form.image)

const speaker = reactive(JSON.parse(form.teacher));

const addSpeaker = () => {
    speaker.push({ name: '', profession: '', description: '', image: '', })
}

const removeSpeaker = () => {
    speaker.pop()
}

const submit = () => {
    form.teacher = JSON.stringify(speaker);
    form.put(route('admin.courses.update', props.course.id));
};

const category_dropdown = ref('Seleccione la categoría')
const format_dropdown = ref('Seleccione el formato')

const triggerDropdown = (opt, dropdown) => {
    switch (dropdown) {
        case 'category':
            category_dropdown.value = opt.name
            form.category_id = opt.id
            break;
        case 'format':
            format_dropdown.value = opt.type
            form.format_id = opt.id
            break;
    }
};

const selectedCategory = props.categories.find((el) => el.id == form.category_id)
const selectedFormat = props.format.find((el) => el.id == form.format_id)

triggerDropdown(selectedCategory, 'category');
triggerDropdown(selectedFormat, 'format');

const previewImage = (e) => {
    const file = e.target.files[0];
    const reader = new FileReader();
    url.value = URL.createObjectURL(file);

    reader.onload = (f) => {
        form.image = f.target.result;
    }
    reader.readAsDataURL(file);
}

</script>
<template>
    <PageLayout>
        <Head title="Editar curso" />

        <div class="container mx-auto mb-4">
            <form @submit.prevent="submit" class="max-w-xl mx-auto mt-10">

                <div class="mt-7">
                    <InputLabel for="name" value="Nombre" />

                    <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name"
                        autocomplete="name" />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="mt-7">
                    <InputLabel for="subtitle" value="Subtitulo" />

                    <TextInput id="subtitle" type="text" class="mt-1 block w-full" v-model="form.subtitle"
                        autocomplete="subtitle" />

                    <InputError class="mt-2" :message="form.errors.subtitle" />
                </div>

                <div class="mt-7">
                    <InputLabel for="category" value="Categoría" />

                    <Dropdown>
                        <template #trigger>
                            {{ category_dropdown }}
                        </template>

                        <template #content>
                            <Option v-for="opt in categories" :key="opt.id" @click="triggerDropdown(opt, 'category')">
                                {{ opt.name }}
                            </Option>
                        </template>
                    </Dropdown>

                    <InputError class="mt-2" :message="form.errors.category_id" />
                </div>

                <div class="grid md:grid-cols-2 md:gap-x-5">
                    <div class="mt-7">
                            <InputLabel for="format" value="Formato" />

                            <Dropdown>
                                <template #trigger>
                                    {{ format_dropdown }}
                                </template>

                                <template #content>
                                    <Option v-for="opt in format" :key="opt.id" @click="triggerDropdown(opt, 'format')">
                                        {{ opt.type }}
                                    </Option>
                                </template>
                            </Dropdown>

                            <InputError class="mt-2" :message="form.errors.category_id" />
                        </div>

                    <div class="mt-7">
                        <InputLabel for="score" value="Puntos" />

                        <TextInput id="score" type="text" class="mt-1 block w-full" v-model="form.score"
                            autocomplete="score" />

                        <InputError class="mt-2" :message="form.errors.score" />
                    </div>
                </div>

                <div class="mt-7">
                    <InputLabel for="title" value="Título" />

                    <TextInput id="title" type="text" class="mt-1 block w-full" v-model="form.title"
                        autocomplete="title" />

                    <InputError class="mt-2" :message="form.errors.title" />
                </div>

                <div class="mt-7">
                    <InputLabel for="long_description" value="Descripción larga" />

                    <TextArea id="long_description" type="textarea" class="mt-1 block w-full" v-model="form.long_description"
                        autocomplete="long_description" />

                    <InputError class="mt-2" :message="form.errors.long_description" />
                </div>

                <div class="mt-7">
                    <InputLabel for="short_description" value="Descripción corta" />

                    <TextArea id="short_description" type="textarea" class="mt-1 block w-full" v-model="form.short_description"
                        autocomplete="short_description" />

                    <InputError class="mt-2" :message="form.errors.short_description" />
                </div>


								<div class="border-y border-stone-200 space-y-6 py-7 mt-7">
									<InputLabel value="Referencias" />

									<div>
										<InputLabel 
											for="referencesTitle" 
											value="Título" />

										<TextInput 
											id="referencesTitle" 
											type="text" 
											class="mt-1 block w-full" 
											v-model="form.references.title"
											autocomplete="references.title" />

										<InputError 
											class="mt-2" 
											:message="form.errors.references?.title" />
									</div>

									<div>
										<InputLabel 
											for="referencesContent" 
											value="Contenido" />

										<TextArea 
											id="referencesContent" 
											type="text" 
											class="mt-1 block w-full" 
											v-model="form.references.content" 
											autocomplete="references.content" />

										<InputError 
											class="mt-2" 
											:message="form.errors.references?.content" />
									</div>
								</div>


                <div class="mt-7" v-if="format_dropdown == 'Webinar'">
                    <InputLabel for="video" value="ID del video" />

                    <TextInput id="video" type="text" class="mt-1 block w-full" v-model="form.video"
                        autocomplete="video" />

                    <InputError class="mt-2" :message="form.errors.video" />
                </div>

                <div class="mt-7">
                    <InputLabel for="image" value="Imagen" />

                    <img v-if="url" :src="url" class="w-full mt-4 h-80" />

                    <input @change="previewImage" type="file" class="mt-1 block w-full" />

                    <InputError class="mt-2" :message="form.errors.image" />
                </div>

                <div class="grid">
                    <h2 class="text-primary font-bold mt-10 w-full">Impartido por:</h2>
                    <InputError class="mt-2" :message="form.errors.teacher" />
                    <DynamicSpeaker :speaker="item" v-for="item, index in speaker" :key="index"/>

                    <PrimaryButton class="text-sm w-full sm:w-auto" type="button" @click="addSpeaker">+</PrimaryButton>
                    <SecondaryButton v-if="speaker.length > 1" class="text-sm w-full sm:w-auto"
                        type="button" @click="removeSpeaker">x</SecondaryButton>
                </div>

                <div class="mt-10">

                    <PrimaryButton class="text-sm w-full sm:w-auto" :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing">
                        <div class="px-10 py-1">Guardar</div>
                    </PrimaryButton>

                    <Link class="inline-flex items-center px-4 py-2 ml-4 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150" :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing" :href="route('admin.courses.index')">
                        <div class="px-10 py-1">Volver</div>
                    </Link>

                </div>
            </form>
        </div>
    </PageLayout>
</template>
