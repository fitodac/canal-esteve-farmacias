<script setup>
import { ref, watch, reactive } from "vue";
import {Inertia} from "@inertiajs/inertia";

import Layout from '@/Layouts/PageLayout.vue'
import Header from '@/Components/Training/Header.vue'

import Dropdown from '@/Components/Form/Dropdown.vue'
import Option from '@/Components/Form/DropdownOption.vue'

import FooterCalendar from '@/Components/FooterCalendar.vue'
import Pagination from '@/Components/Training/Pagination.vue';

const categories_dropdown = ref('Categoría')
const formats_dropdown = ref('Formato')

const props = defineProps({
    courses: Object,
    categories: Object,
    formats: Object,
    filters: Object
})

let catValue = ref(props.filters.category)
let forValue = ref(props.filters.format)
let filters = reactive({
    category: catValue.value, format: forValue.value
})
/**
 * Handles the data request applying the filters
 * @param page
 */
const applyFilter = (page = 1) => {
    Inertia.get('/formacion?page=' + page + '&category=' + catValue.value + '&format=' + forValue.value, {}, {
        preserveScroll: true
    })
}

watch(filters, _ => {
    Inertia.get('/formacion', { filters: filters }, {
        preserveScroll: true,
        preserveState: true,
        replace: true
    });
});

const triggerDropdown = (opt, dropdown) => {
    if (opt) {
        switch (dropdown) {
            case 'categories':
                catValue.value = opt.id;
                categories_dropdown.value = opt.name;
                filters.category = opt.id
                break;
            case 'formats':
                forValue.value = opt.id;
                formats_dropdown.value = opt.type;
                filters.format = opt.id
                break;
        }
    }
};

const cleanDropdowns = () => {
    catValue.value = filters.category = null;
    forValue.value = filters.format = null;
    categories_dropdown.value = 'Categoría';
    formats_dropdown.value = 'Formato';
}

const navCourse = (id) => {
    Inertia.visit('/curso/'+id);
}

</script>
<template>
    <Layout>
        <Header/>

        <div class="container-wrapper container mx-auto pt-12 pb-1">
            <div class="container mx-auto text-center font-bold">
                <h3 class="text-xl">Contenidos formativos</h3>
            </div>
        </div>

        <div class="px-5 py-3 md:py-5">
            <div class="container mx-auto">
                <div class="grid gap-1 md:gap-5 lg:grid-cols-5">

                    <div>
                        <Dropdown>
                            <template #trigger>
                                <span class="text-sm leading-none">{{ categories_dropdown }}</span>
                            </template>

                            <template #content>
                                <Option
                                    v-for="opt in categories"
                                    :key="opt.name"
                                    @click="triggerDropdown(opt,'categories')">
                                    {{ opt.name }}
                                </Option>
                            </template>
                        </Dropdown>
                    </div>


                    <div>
                        <Dropdown>
                            <template #trigger>
                                <span class="text-sm leading-none">{{ formats_dropdown }}</span>
                            </template>

                            <template #content>
                                <Option
                                    v-for="opt in formats"
                                    :key="opt.type"
                                    @click="triggerDropdown(opt,'formats')">
                                    {{ opt.type }}
                                </Option>
                            </template>
                        </Dropdown>
                    </div>
                    <div class="hidden lg:block">&nbsp;</div>
                    <div class="hidden lg:block">&nbsp;</div>

                    <div class="self-center justify-self-end pt-3 md:pt-0">
                        <button
                            class="text-primary font-bold leading-none"
                            @click="cleanDropdowns()">
                            Borrar filtros
                        </button>
                    </div>

                </div>
            </div>
        </div>


        <div class="bg-white px-5 pt-4 pb-12 sm:pt-10">
            <div class="container mx-auto">
                <div
                    class="w-full max-w-sm mx-auto grid gap-y-8 place-content-center
                                grid-cols-1
								md:max-w-full md:grid-cols-3 md:gap-x-6 md:gap-y-8
								lg:grid-cols-4 lg:gap-x-7 lg:gap-y-10">

                    <div
                        v-for="course in courses.data"
                        :key="course.id"
                        @click.prevent="navCourse(course.id)"
                        class="flex flex-col hover:cursor-pointer"
                    >

                        <figure class="h-52">
                            <div class="bg-gray-100 w-full h-full flex items-center justify-center">
                                <img
                                    v-if="course.image"
                                    :src="course.image"
                                    alt="Imagen de formación"
                                    class="w-full h-full object-cover"/>

                                <img
                                    v-else
                                    src="/img/no-picture.svg"
                                    alt="no hay imagen para este producto">
                            </div>
                        </figure>

                        <div
                            class="bg-gray-light border-b-6 px-5 py-6 pb-6 flex-1"
                            :class="[`border-brand-${course.category.color}`]">

                            <div class="space-y-1">
                                <div class="inline-flex items-center">
                                    <div class="rounded text-white px-3 py-1 mr-2 text-xs tracking-wide leading-45 bg-primary-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 495 338"
                                            class="w-3.5 pb-1 inline-block mr-1">
                                            <g fill="#fff" stroke-width="0">
                                                <path d="M31 2.1C15.6 3.9 3.7 15.4 1 31 .2 35.6 0 76.9.2 173c.3 125.1.4 135.8 2 139.8 4.4 10.8 13.2 18.9 23.9 21.8 4.6 1.2 28.5 1.4 160.6 1.4 106.2 0 156.8-.4 160.2-1.1 10.9-2.3 10.2-1.6 102-102.9 4.7-5.2 11.3-12.4 14.7-16 14.9-16 24.7-27.7 27.1-32.4 3.4-6.7 4.2-17 1.9-24.8-2.1-7.2-5.5-11.5-31-39.4-11.5-12.6-38.6-42.3-60.2-66.1-21.7-23.7-40.6-44-42.1-45-1.5-1.1-5.3-3-8.3-4.3l-5.5-2.3L191 1.6c-85-.1-157 .2-160 .5z"/>
                                            </g>
                                        </svg>
                                        <span>{{ course.format.type }}</span>
                                    </div>
                                </div>
                                <div class="text-sm leading-tight mt-1 overflow-hidden text-ellipsis">{{ course.name }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mx-auto">
                <Pagination class="mt-6" :links="props.courses.links" :category="catValue" :format="forValue"  />
            </div>
        </div>
        <section class="bg-gray-light py-12">
            <FooterCalendar/>
        </section>
    </Layout>
</template>


<style scoped>
</style>
