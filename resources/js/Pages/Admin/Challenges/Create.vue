<script setup>
import PageLayout from '@/Layouts/PageLayout.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import InputError from '@/Components/Form/InputError.vue';
import TextInput from '@/Components/Form/TextInput.vue';
import Dropdown from '@/Components/Form/Dropdown.vue'
import Option from '@/Components/Form/DropdownOption.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DynamicFields from '@/Components/SellOutChallenges/DynamicFields.vue';
import RecommendationField from '@/Components/SellOutChallenges/RecommendationField.vue';

import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import { reactive, ref } from 'vue'

import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'

const props = defineProps({
    challenge_types: Object
});

const form = useForm({
    title: '',
    description: '',
    image: '',
    challenge_type: '',
    score: '',
    date_from: '',
    date_to: '',
    participation: '',
    legal: ''
});

let url = ref(form.image)

let participation = reactive([]);

const submit = () => {
    form.participation = JSON.stringify(participation)
    form.post(route('admin.challenges.store'));
};

const type_dropdown = ref('Seleccione un tipo')

const triggerDropdown = (opt, propertyName) => {
    type_dropdown.value = opt
    form.challenge_type = propertyName

    if(propertyName == 'visibility') {
        participation = reactive([]);
        participation.push({ name: '', material: '', score: '', image: '' })
    }

    if(propertyName == 'recommendation') {
        participation = reactive([]);
        participation.push({ name: '' })
    }
};

const previewImage = (e) => {
    const file = e.target.files[0];
    const reader = new FileReader();
    url.value = URL.createObjectURL(file);

    reader.onload = (f) => {
        form.image = f.target.result;
    }
    reader.readAsDataURL(file);
}

const addRow = () => {
    if (form.challenge_type == 'visibility') {
        participation.push({ name: '', material: '', score: '', image: '' })
    }

    if (form.challenge_type == 'recommendation') {
        participation.push({ name: '' })
    }
}

const removeRow = () => {
    participation.pop()
}

const fileDataProccess = file => {
    const reader = new FileReader()
    reader.addEventListener('load', () => form.legal = reader.result)
    reader.readAsDataURL(file)
}

const handleFileUpload = event => fileDataProccess(event.target.files[0])
</script>
<template>
    <PageLayout>

        <Head title="Crear un reto" />

        <div class="container mx-auto mb-4">
            <form @submit.prevent="submit" class="max-w-xl mx-auto mt-10">

                <div class="mt-7">
                    <InputLabel for="image" value="Imagen" />

                    <img v-if="url" :src="url" class="w-full mt-4 h-80" />

                    <input @change="previewImage" type="file" class="mt-1 block w-full" />

                    <InputError class="mt-2" :message="form.errors.image" />
                </div>

                <div class="mt-7">
                    <InputLabel for="legal" value="Bases legales" />

                    <input
                        type="file"
                        @change="handleFileUpload"
                        ref="file_input" />

                    <InputError class="mt-2" :message="form.errors.legal" />
                </div>

                <div class="mt-7">
                    <InputLabel for="title" value="Titulo" />

                    <TextInput id="title" type="text" class="mt-1 block w-full" v-model="form.title"
                        autocomplete="title" />

                    <InputError class="mt-2" :message="form.errors.title" />
                </div>

                <div class="mt-7">
                    <InputLabel for="description" value="Descripción" />

                    <TextInput id="description" type="textarea" class="mt-1 block w-full" v-model="form.description"
                        autocomplete="description" />

                    <InputError class="mt-2" :message="form.errors.description" />
                </div>

                <div class="grid md:grid-cols-2 md:gap-x-5">
                    <div class="mt-7">
                        <InputLabel for="challenge_type" value="Tipo" />

                        <Dropdown>
                            <template #trigger>
                                {{ type_dropdown }}
                            </template>

                            <template #content>
                                <Option v-for="(opt, key) in props.challenge_types" :key="key" @click="triggerDropdown(opt, key)">
                                    {{ opt }}
                                </Option>
                            </template>
                        </Dropdown>

                        <InputError class="mt-2" :message="form.errors.challenge_type" />
                    </div>

                    <div class="mt-7">
                        <InputLabel for="score" value="Máximo Puntaje que se puede alcanzar" />

                        <TextInput id="score" type="text" class="mt-1 block w-full" v-model="form.score" autocomplete="score" />

                        <InputError class="mt-2" :message="form.errors.score" />
                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-x-5">
                    <div class="mt-7">
                        <InputLabel for="date_from" value="Fecha desde" />

                        <VueDatePicker id="date_from" locale="es" class="mt-1 block w-full" v-model="form.date_from" placeholder="Fecha desde"
                            text-input
                            cancelText="Cancelar" selectText="Aceptar"
                            month-name-format="long"
                            format="dd/MM/yyyy"
                            :enable-time-picker="false" auto-apply
                        />

                        <InputError class="mt-2" :message="form.errors.date_from" />
                    </div>

                    <div class="mt-7">
                        <InputLabel for="date_to" value="Fecha hasta" />

                        <VueDatePicker id="date_to" locale="es" class="mt-1 block w-full" v-model="form.date_to" placeholder="Fecha hasta"
                            text-input
                            cancelText="Cancelar" selectText="Aceptar"
                            month-name-format="long" format="dd/MM/yyyy"
                            :enable-time-picker="false" auto-apply
                        />

                        <InputError class="mt-2" :message="form.errors.date_to" />
                    </div>
                </div>


                <div class="mt-7" v-if="form.challenge_type === 'visibility'">
                    <div class="text-primary leading-none font-bold block text-base">Participación</div>
                    <InputError class="mt-2" :message="form.errors.participation" />
                    <DynamicFields :participation="item" v-for="item,index in participation" :key="index"/>

                    <PrimaryButton class="text-sm w-full sm:w-auto" type="button" @click="addRow">+</PrimaryButton>
                    <SecondaryButton v-if="participation.length > 1" class="text-sm w-full sm:w-auto"
                        type="button" @click="removeRow">x</SecondaryButton>
                </div>


                <div class="mt-7" v-if="form.challenge_type === 'recommendation'">
                    <div class="text-primary leading-none font-bold block text-base">Participación</div>
                    <InputError class="mt-2" :message="form.errors.participation" />
                    <RecommendationField :participation="item" v-for="item, index in participation" :key="index"/>

                    <PrimaryButton class="text-sm w-full sm:w-auto" type="button" @click="addRow">+</PrimaryButton>
                    <SecondaryButton v-if="participation.length > 1" class="text-sm w-full sm:w-auto"
                        type="button" @click="removeRow">x</SecondaryButton>
                </div>


                <div class="mt-10">

                    <PrimaryButton class="text-sm w-full sm:w-auto" :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing">
                        <div class="px-10 py-1">Guardar</div>
                    </PrimaryButton>

                    <Link class="inline-flex items-center px-4 py-2 ml-4 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150" :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing" :href="route('admin.challenges.index')">
                        <div class="px-10 py-1">Volver</div>
                    </Link>

                </div>
            </form>
        </div>
    </PageLayout>
</template>
