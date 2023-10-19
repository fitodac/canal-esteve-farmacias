<script setup>
import InputLabel from '@/Components/Form/InputLabel.vue';
import TextInput from '@/Components/Form/TextInput.vue';

const props = defineProps({
    participation: Object
})


</script>

<template>
    <div class="p-2 shadow-md">
        <div class="mt-7">
            <InputLabel for="name" value="Producto promocionado" />
            <TextInput id="name" type="text" class="mt-1 block w-full" v-model="participation.name" autocomplete="name" />
        </div>
    </div>
</template>


