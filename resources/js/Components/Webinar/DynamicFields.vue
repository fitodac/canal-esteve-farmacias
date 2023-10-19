<script setup>
import InputLabel from '@/Components/Form/InputLabel.vue';
import TextInput from '@/Components/Form/TextInput.vue';
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'

const props = defineProps({
    schedule: Object
})

</script>
<template>
    <div class="p-2 shadow-md">
        <div class="mt-7">
            <InputLabel for="title" value="Titulo" />

            <TextInput id="title" type="text" class="mt-1 block w-full" v-model="schedule.title"
            autocomplete="title" />
        </div>

        <div class="mt-7">
            <InputLabel for="description" value="Description corta" />

            <TextInput id="description" type="text" class="mt-1 block w-full" v-model="schedule.description"
                autocomplete="description" />
        </div>

        <div class="grid md:grid-cols-2 md:gap-x-5">
            <div class="mt-7">
                <InputLabel for="description" value="Inicio" />

                <VueDatePicker id="appointment_hour" class="mt-1 block w-full" v-model="schedule.from" placeholder="Hora" time-picker
                    model-type="HH:mm"
                    cancelText="Cancelar" selectText="Aceptar"
                    format="HH:mm"/>
            </div>

            <div class="mt-7">
                <InputLabel for="score" value="Fin" />

                <VueDatePicker id="appointment_hour" class="mt-1 block w-full" v-model="schedule.to" placeholder="Hora" time-picker
                    model-type="HH:mm"
                    cancelText="Cancelar" selectText="Aceptar"
                    format="HH:mm"/>
            </div>
        </div>
    </div>
</template>


