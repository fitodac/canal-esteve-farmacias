<script setup>
import PageLayout from '@/Layouts/PageLayout.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import InputError from '@/Components/Form/InputError.vue';
import TextInput from '@/Components/Form/TextInput.vue';
import TextArea from '@/Components/Form/TextArea.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue'
import SecondaryButton from '@/Components/SecondaryButton.vue';
import VueDatePicker from '@vuepic/vue-datepicker';
import DynamicFields from '@/Components/Webinar/DynamicFields.vue';
import DynamicSpeaker from '@/Components/Webinar/DynamicSpeaker.vue';
import '@vuepic/vue-datepicker/dist/main.css'

import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import { reactive, ref } from 'vue'

const props = defineProps({
    webinar: Object,
});

const form = useForm({
    title: props.webinar.title,
    subtitle: props.webinar.subtitle,
    description: props.webinar.description,
    speaker: props.webinar.speaker,
    schedule: props.webinar.schedule,
    image: props.webinar.image,
    appointment_day: props.webinar.appointment_day,
    appointment_hour: props.webinar.appointment_hour,
    registration_form: props.webinar.registration_form,
		references: props.webinar.references ? JSON.parse(props.webinar.references) : {title: '', content: ''}
});

console.log('form:', form)

let url = ref(form.image)

const submit = () => {
    form.speaker = JSON.stringify(speaker);
    form.schedule = JSON.stringify(schedule);
    form.put(route('admin.webinars.update', props.webinar.id));
};

const speaker = reactive(JSON.parse(form.speaker))

const addSpeaker = () => {
    speaker.push({ name: '', profession: '', description: '', image: '', })
}

const removeSpeaker = () => {
    speaker.pop()
}

const previewImage = (e) => {
    const file = e.target.files[0];
    const reader = new FileReader();
    url.value = URL.createObjectURL(file);

    reader.onload = (f) => {
        form.image = f.target.result;
    }
    reader.readAsDataURL(file);
}

let schedule = reactive(JSON.parse(form.schedule));

const addRow = () => {
    schedule.push({ title: '', description: '', from: '', to: '' })
}

const removeRow = () => {
    schedule.pop()
}
</script>
<template>
    <PageLayout>

        <Head title="Agregar un curso" />

        <div class="container mx-auto mb-4">
            <form @submit.prevent="submit" class="max-w-xl mx-auto mt-10">


                <div class="mt-7">
                    <InputLabel for="title" value="Título" />

                    <TextInput id="title" type="text" class="mt-1 block w-full" v-model="form.title" autocomplete="title" />

                    <InputError class="mt-2" :message="form.errors.title" />
                </div>

                <div class="mt-7">
                    <InputLabel for="subtitle" value="Subtitulo" />

                    <TextInput id="subtitle" type="text" class="mt-1 block w-full" v-model="form.subtitle"
                        autocomplete="subtitle" />

                    <InputError class="mt-2" :message="form.errors.subtitle" />
                </div>

                <div class="mt-7">
                    <InputLabel for="description" value="Descripción" />

                    <TextArea id="description" type="textarea" class="mt-1 block w-full" v-model="form.description"
                        autocomplete="description" />

                    <InputError class="mt-2" :message="form.errors.description" />
                </div>

                <div class="grid md:grid-cols-2 md:gap-x-5">
                    <div class="mt-7">
                        <InputLabel for="appointment_day" value="Fecha" />

                        <VueDatePicker id="appointment_day" locale="es" class="mt-1 block w-full"
                            v-model="form.appointment_day" placeholder="Fecha" text-input cancelText="Cancelar"
                            selectText="Aceptar" month-name-format="long" format="dd/MM/yyyy" model-type="yyyy-MM-dd"
                            :enable-time-picker="false" auto-apply :min-date="new Date()" />

                        <InputError class="mt-2" :message="form.errors.appointment_day" />
                    </div>

                    <div class="mt-7">
                        <InputLabel for="appointment_hour" value="Hora" />

                        <VueDatePicker id="appointment_hour" class="mt-1 block w-full" v-model="form.appointment_hour"
                            placeholder="Hora" time-picker model-type="HH:mm" cancelText="Cancelar" selectText="Aceptar"
                            format="HH:mm" />

                        <InputError class="mt-2" :message="form.errors.appointment_hour" />
                    </div>
                </div>

                <div class="mt-7">
                    <InputLabel for="registration_form" value="Url del formulario de registro" />

                    <TextInput id="registration_form" type="text" class="mt-1 block w-full" v-model="form.registration_form"
                        autocomplete="registration_form" />

                    <InputError class="mt-2" :message="form.errors.registration_form" />
                </div>


                <div class="mt-7">
                    <InputLabel for="image" value="Imagen" />

                    <img v-if="url" :src="url" class="w-full mt-4 h-80" />

                    <input @change="previewImage" type="file" class="mt-1 block w-full" />

                    <InputError class="mt-2" :message="form.errors.image" />
                </div>

                <div class="grid">
                    <h2 class="text-primary font-bold mt-10 w-full">Impartido por:</h2>
                    <InputError class="mt-2" :message="form.errors.speaker" />
                    <DynamicSpeaker :speaker="item" v-for="item, index in speaker" :key="index"/>

                    <PrimaryButton class="text-sm w-full sm:w-auto" type="button" @click="addSpeaker">+</PrimaryButton>
                    <SecondaryButton v-if="speaker.length > 1" class="text-sm w-full sm:w-auto"
                        type="button" @click="removeSpeaker">x</SecondaryButton>
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


                <div class="grid mt-5">
                    <div class="text-primary leading-none font-bold block text-base">Agenda</div>
                    <InputError class="mt-2" :message="form.errors.schedule" />
                    <DynamicFields :schedule="item" v-for="item, index in schedule" :key="index" />

                    <PrimaryButton class="text-sm w-full sm:w-auto" type="button" @click="addRow">+</PrimaryButton>
                    <SecondaryButton v-if="schedule.length > 1" class="text-sm w-full sm:w-auto" type="button"
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
                        :href="route('admin.webinars.index')">
                    <div class="px-10 py-1">Volver</div>
                    </Link>

                </div>
            </form>
        </div>
    </PageLayout>
</template>
