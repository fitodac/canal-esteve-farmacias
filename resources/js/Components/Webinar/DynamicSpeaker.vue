<script setup>
import InputLabel from '@/Components/Form/InputLabel.vue';
import TextInput from '@/Components/Form/TextInput.vue';
import TextArea from '@/Components/Form/TextArea.vue';
import { ref } from 'vue'

const props = defineProps({
    speaker: Object
})

let url = ref(props.speaker.image)

const previewImage = (e) => {
    const file = e.target.files[0];
    const reader = new FileReader();
    url.value = URL.createObjectURL(file);

    reader.onload = (f) => {
        props.speaker.image = f.target.result;
    }
    reader.readAsDataURL(file);
}

</script>
<template>
    <div class="p-2 shadow-md">
        <div class="mt-7">
            <InputLabel for="name" value="Nombre" />

            <TextInput id="name" type="text" class="mt-1 block w-full" v-model="speaker.name"
                autocomplete="name" />

        </div>

        <div class="mt-7">
            <InputLabel for="profession" value="Profesión" />

            <TextInput id="profession" type="text" class="mt-1 block w-full" v-model="speaker.profession"
                autocomplete="profession" />
        </div>

        <div class="mt-7">
            <InputLabel for="functions" value="Funciones" />

            <TextArea id="functions" type="textarea" class="mt-1 block w-full" v-model="speaker.description"
                autocomplete="functions" />
        </div>

        <div class="mt-7">
            <InputLabel for="image" value="Imagen" />

            <img v-if="url" :src="url" class="w-full mt-4 h-80" />

            <input @change="previewImage" type="file" class="mt-1 block w-full" />
        </div>
    </div>
</template>


