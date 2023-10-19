<script setup>
import InputLabel from '@/Components/Form/InputLabel.vue';
import TextInput from '@/Components/Form/TextInput.vue';

import { ref } from 'vue'


const props = defineProps({
    participation: Object
})

let url = ref(props.participation.image)

const previewImage = (e) => {
    const file = e.target.files[0];
    const reader = new FileReader();
    url.value = URL.createObjectURL(file);

    reader.onload = (f) => {
        props.participation.image = f.target.result;
    }
    reader.readAsDataURL(file);
}

</script>

<template>
    <div class="p-2 shadow-md">
        <div class="mt-7">
            <InputLabel for="name" value="Nombre gama" />

            <TextInput id="name" type="text" class="mt-1 block w-full" v-model="participation.name"
            autocomplete="name" />
        </div>

        <div class="grid md:grid-cols-2 md:gap-x-5">
            <div class="mt-7">
                <InputLabel for="material" value="Nombre material" />

                <TextInput id="material" type="text" class="mt-1 block w-full" v-model="participation.material"
                    autocomplete="material" />
            </div>

            <div class="mt-7">
                <InputLabel for="score" value="Puntos" />

                <TextInput id="score" type="text" class="mt-1 block w-full" v-model="participation.score"
                    autocomplete="score" />
            </div>
        </div>

        <div class="mt-7">
            <InputLabel for="image" value="Imagen" />

            <img v-if="url" :src="url" class="w-full mt-4 h-80" />

            <input @change="previewImage" type="file" class="mt-1 block w-full" />
        </div>
    </div>
</template>


