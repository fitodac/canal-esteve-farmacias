<script setup>
import PageLayout from '@/Layouts/PageLayout.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import InputError from '@/Components/Form/InputError.vue';
import TextInput from '@/Components/Form/TextInput.vue';
import TextArea from '@/Components/Form/TextArea.vue';
import Dropdown from '@/Components/Form/Dropdown.vue'
import Option from '@/Components/Form/DropdownOption.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import SecondaryButton from '@/Components/SecondaryButton.vue'
import Checkbox from '@/Components/Form/Checkbox.vue'

import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import { reactive, ref } from 'vue'


const props = defineProps({
    courses: Object,
    question: Object,
    answers: Object,
    selectedCourse: Object,
});

const form = useForm({
    module_id: props.question.module_id,
    question: props.question.question,
    answers: props.answers,
    references: props.question.references
});


const submit = () => {
    form.answers = JSON.stringify(answers);
    form.put(route('admin.questions.update', props.question.id));
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
            form.module_id = opt.id
            break;
    }
};

const answers = reactive(JSON.parse(form.answers))

const loadModules = async (course) => {
    try {
        const response = await axios.get(`/admin/modules/${course}`);
        modules.value = response.data;

        const { id, title } = modules.value.find((el) => el.id == form.module_id)
        triggerDropdown({ id, title }, 'modules');
    } catch (error) {
        console.log(error);
    }
}

triggerDropdown(props.selectedCourse, 'courses');

const getLastId = () => {
    const [key, value] = Object.entries(answers).pop();
    return parseInt(value.id) + 1;
}

const addRow = () => {
    answers.push({ id: getLastId(), answer: '', valid: false })
}

const removeRow = () => {
    answers.pop()
}

</script>
<template>
    <PageLayout>

        <Head title="Editar preguntas" />

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
                        <InputLabel for="module" value="Módulo" />

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

                        <InputError class="mt-2" :message="form.errors.module_id" />
                    </div>
                </div>

                <div class="mt-7">
                    <InputLabel for="question" value="Pregunta" />

                    <TextInput id="question" type="text" class="mt-1 block w-full" v-model="form.question"
                        autocomplete="question" />

                    <InputError class="mt-2" :message="form.errors.question" />
                </div>

                <div class="mt-7">
                    <InputLabel for="references" value="Referencias" />

                    <TextArea id="references" type="text" class="mt-1 block w-full" v-model="form.references" autocomplete="references" />

                    <InputError class="mt-2" :message="form.errors.references" />
                </div>

                <div class="mt-7">
                    <div class="text-primary leading-none font-bold block text-base">Respuestas</div>
                    <InputError class="mt-2" :message="form.errors.answers" />

                    <div class="p-2 shadow-md" v-for="(answer, idx) in answers" :key="idx">
                        <div class="grid md:grid-cols-3 md:gap-x-2">
                            <div class="mt-7 col-span-2">
                                <InputLabel :for="answer" value="Respuesta" />

                                <TextInput :id="answer" type="text" class="mt-1 block w-full" v-model="answer.answer"
                                    :autocomplete="answer" />
                            </div>

                            <div class="mt-7">
                                <label class="flex items-center">
                                    <Checkbox name="answer" v-model:checked="answer.valid" />

                                    <span class="text-primary font-bold cursor-pointer pl-3">
                                        Respuesta Correcta?
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <PrimaryButton class="text-sm w-full sm:w-auto" type="button" @click="addRow()">+</PrimaryButton>
                    <SecondaryButton v-if="answers.length > 1" class="text-sm w-full sm:w-auto" type="button"
                        @click="removeRow">x</SecondaryButton>
                </div>

                <div class="mt-10">

                    <PrimaryButton class="text-sm w-full sm:w-auto" :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing">
                        <div class="px-10 py-1">Guardar</div>
                    </PrimaryButton>

                    <Link
                        class="inline-flex items-center px-4 py-2 ml-4 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                        :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                        :href="route('admin.questions.index')">
                    <div class="px-10 py-1">Volver</div>
                    </Link>

                </div>
            </form>
        </div>
    </PageLayout>
</template>
