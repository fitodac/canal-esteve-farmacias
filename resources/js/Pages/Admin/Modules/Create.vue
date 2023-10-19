<script setup>
import PageLayout from '@/Layouts/PageLayout.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import InputError from '@/Components/Form/InputError.vue';
import TextInput from '@/Components/Form/TextInput.vue';
import TextArea from '@/Components/Form/TextArea.vue';
import Dropdown from '@/Components/Form/Dropdown.vue'
import Option from '@/Components/Form/DropdownOption.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'

import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import { reactive, ref } from 'vue'


const props = defineProps({
    courses: Object,
});

const form = useForm({
    course_id: '',
    title: '',
    description: '',
    teacher: '',
    tag: '',
    video: '',
    parent_module_id: '',
    order: '',
		references: {title: '', content: ''},
		questions_references_title: ''
});

const submit = () => {
    form.teacher = JSON.stringify(teacher);
    form.references = JSON.stringify(form.references);
    form.post(route('admin.modules.store'));
};

const modules = ref([]);

const courses_dropdown = ref('Seleccione el curso')
const modules_dropdown = ref('Seleccione el modulo')

const triggerDropdown = (opt, dropdown) => {
    switch (dropdown) {
        case 'courses':
            courses_dropdown.value = opt.name
            form.course_id = opt.id
            loadModules(opt.id)
            break;
        case 'modules':
            modules_dropdown.value = opt.title
            form.parent_module_id = opt.id
            break;
    }
};

const teacher = reactive({
    name: '',
    profession: '',
    description: '',
    specialty: '',
    image: '',
})

let url = ref(teacher.image)

const previewImage = (e) => {
    const file = e.target.files[0];
    const reader = new FileReader();
    url.value = URL.createObjectURL(file);

    reader.onload = (f) => {
        teacher.image = f.target.result;
    }
    reader.readAsDataURL(file);
}


const loadModules = async (course) => {
    try {
        const response = await axios.get(`/admin/modules/${course}`);
        modules.value = response.data;
    } catch (error) {
        console.log(error);
    }
}
</script>
<template>
    <PageLayout>

        <Head title="Agregar un modulo" />

        <div class="container mx-auto mb-4">
            <form @submit.prevent="submit" class="max-w-xl mx-auto mt-10">
                <div class="grid md:grid-cols-2 md:gap-x-5">
                    <div class="mt-7">
                        <InputLabel for="course" value="Curso" />

                        <Dropdown>
                            <template #trigger>
                                {{ courses_dropdown }}
                            </template>

                            <template #content>
                                <Option v-for="opt in courses" :key="opt.id" @click="triggerDropdown(opt, 'courses')">
                                    {{ opt.name }}
                                </Option>
                            </template>
                        </Dropdown>

                        <InputError class="mt-2" :message="form.errors.course_id" />
                    </div>

                    <div class="mt-7">
                        <InputLabel for="category" value="Módulo de dependencia" />

                        <Dropdown>
                            <template #trigger>
                                {{ modules_dropdown }}
                            </template>

                            <template #content>
                                <Option v-for="opt in modules" :key="opt.id" @click="triggerDropdown(opt, 'modules')">
                                    {{ opt.title }}
                                </Option>
                            </template>
                        </Dropdown>

                        <InputError class="mt-2" :message="form.errors.parent_module_id" />
                    </div>
                </div>

                <div class="mt-7">
                    <InputLabel for="order" value="Módulo Nro: " />

                    <TextInput id="order" type="text" class="mt-1 block w-full" v-model="form.order"
                        autocomplete="order" />

                    <InputError class="mt-2" :message="form.errors.order" />
                </div>

                <div class="mt-7">
                    <InputLabel for="title" value="Título" />

                    <TextInput id="title" type="text" class="mt-1 block w-full" v-model="form.title"
                        autocomplete="title" />

                    <InputError class="mt-2" :message="form.errors.title" />
                </div>

                <div class="mt-7">
                    <InputLabel for="description" value="Descripción" />

                    <TextArea id="description" type="text" class="mt-1 block w-full" v-model="form.description"
                        autocomplete="enlace" />

                    <InputError class="mt-2" :message="form.errors.description" />
                </div>

                <div class="mt-7">
                    <InputLabel for="tag" value="Palabra Clave" />

                    <TextInput id="tag" type="text" class="mt-1 block w-full" v-model="form.tag"
                        autocomplete="tag" />

                    <InputError class="mt-2" :message="form.errors.tag" />
                </div>

                <div class="mt-7">
                    <InputLabel for="video" value="Enlace del video" />

                    <TextInput id="video" type="text" class="mt-1 block w-full" v-model="form.video"
                        autocomplete="video" />

                    <InputError class="mt-2" :message="form.errors.video" />
                </div>

                <div class="grid">
                    <h2 class="text-primary font-bold mt-10 w-full">Impartido por:</h2>

                    <div class="md:grid-cols-2 md:gap-x-5">
                        <div class="mt-7">
                            <InputLabel for="name" value="Nombre" />

                            <TextInput id="name" type="text" class="mt-1 block w-full" v-model="teacher.name"
                                autocomplete="name" />

                        </div>

                        <div class="mt-7">
                            <InputLabel for="profession" value="Profesión" />

                            <TextInput id="profession" type="text" class="mt-1 block w-full" v-model="teacher.profession"
                                autocomplete="profession" />
                        </div>
                    </div>

                    <div class="mt-7">
                        <InputLabel for="functions" value="Funciones" />

                        <TextArea id="functions" type="textarea" class="mt-1 block w-full" v-model="teacher.description"
                            autocomplete="functions" />
                    </div>

                    <div class="mt-7">
                        <InputLabel for="specialty" value="Especialidad" />

                        <TextArea id="specialty" type="textarea" class="mt-1 block w-full" v-model="teacher.specialty"
                            autocomplete="specialty" />
                    </div>


										<div class="mt-7">
											<InputLabel for="questions_references_title" value="Título para las referencias en las preguntas" />

											<TextInput id="questions_references_title" type="text" class="mt-1 block w-full" v-model="form.questions_references_title"
												autocomplete="questions_references_title" />
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

                    <div class="mt-7">
                        <InputLabel for="image" value="Imagen" />

                        <img v-if="url" :src="url" class="w-full mt-4 h-80" />

                        <input @change="previewImage" type="file" class="mt-1 block w-full" />
                    </div>

                    <InputError class="mt-2" :message="form.errors.teacher" />
                </div>

                <div class="mt-10">

                    <PrimaryButton class="text-sm w-full sm:w-auto" :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing">
                        <div class="px-10 py-1">Guardar</div>
                    </PrimaryButton>

                    <Link class="inline-flex items-center px-4 py-2 ml-4 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150" :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing" :href="route('admin.modules.index')">
                        <div class="px-10 py-1">Volver</div>
                    </Link>

                </div>
            </form>
        </div>
    </PageLayout>
</template>
