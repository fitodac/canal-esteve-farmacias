<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import {Inertia} from "@inertiajs/inertia";
import { onMounted } from 'vue';

const props = defineProps({
    course: {
        type: Object,
    },
    modules: {
        type: Object,
    },
    approved: Boolean,
    related: Object
})

const navCourse = (id) => {
    Inertia.visit('/curso/'+id);
}

const references = props.course?.references ? JSON.parse(props.course.references) : null


onMounted(() => {
    window.tarteaucitron.triggerJobsAfterAjaxCall()
})
</script>
<template>
    <div>
        <section class="px-5 py-4 mt-4 md:pt-10 md:pb-10">
            <div class="flex md:mt-4 flex-col justify-center">
                <div class="flex-1 flex items-center justify-center">
                    <svg class="w-8 md:w-20"
                        xmlns="http://www.w3.org/2000/svg"
                        version="1.0" viewBox="0 0 987 813" preserveAspectRatio="xMidYMid meet"
                        style="max-width:250px;"
                    >
                        <g fill="#378097" stroke-width="0">
                            <path
                                d="M483 11C471.5 13.4 76.6 131.9 74.2 133.7c-3.9 2.9-9.7 11.9-11.6 18-5.5 17.2 2.1 39.9 15.2 45.7 2 .9 43.5 13.5 92.1 28.1 48.6 14.6 88.6 26.7 88.8 26.9.2.2-4.8 22.9-11.2 50.5-12.6 55-12.9 57.1-10 74.8 4.3 26.6 18.5 46.7 41 58.4 10.6 5.5 112.2 41.9 117 41.9 5.3 0 11.5-3.2 14.4-7.5 4.8-7.2 2.6-19.3-4.5-23.9-1.3-.9-26.4-10.2-55.6-20.7-29.2-10.4-55.3-20.2-58-21.6-12.9-7-20.9-22.5-20.8-40.2.1-8.2 21.3-100.6 23.1-100.5.8.1 42.6 12.5 93 27.8 57.2 17.2 94.3 28 99 28.6 4.5.5 9.9.5 13.5 0 3.2-.4 47.7-13.5 98.8-28.9 51.1-15.5 93-28 93.1-27.9.2.2 5.2 22.1 11.3 48.8l11.1 48.5-1 7.8c-1.3 10.1-4.1 17.5-9 23.7-4.2 5.4-12 11.6-18.7 14.9-2.3 1.2-30 10.9-61.5 21.6-31.5 10.7-58.3 20.3-59.6 21.3-9.3 6.9-9.1 20.5.3 27.7 7.6 5.8 6.6 6 71.6-17 32.2-11.4 60.3-21.6 62.5-22.7 9.1-4.6 20.7-13.3 27.9-20.9 6.1-6.5 8.7-10.3 12.6-18.3 6.4-13.3 8.1-20.4 8.7-36.1l.5-13-11.1-48c-6.1-26.3-11.1-48.7-11.1-49.6 0-1 .8-2 1.8-2.3.9-.3 28.3-8.4 60.7-18.1 32.5-9.7 59.8-17.8 60.8-18.1 1.6-.5 1.7 2.5 1.7 53.2v53.7l2.5 4.3c4.6 7.8 15.1 10.6 22.9 6.1 4.8-2.7 7.5-6.2 8.6-11.3.5-2.1 1-29.2 1-60.1v-56.2l9.6-3.1c13.2-4.2 14.8-5.2 19.9-12 9-12.4 10.7-27.1 4.5-40.4-2.7-5.6-9.2-13.1-13.2-15.2-1.6-.8-93.3-28.5-203.6-61.5C489.1 6.9 495.2 8.5 483 11zm180 85.7 165.5 49.8-159 .5c-174.2.5-161.5.1-167.2 6.2-6.8 7.3-5 20.7 3.5 26l3.7 2.3 160.8.5 160.9.5-166.9 49.7c-91.7 27.4-167.9 50-169.3 50.3-1.4.4-5.9-.1-10-1-12.2-2.6-388.5-115.9-388.3-116.9.1-.8 363.7-110.3 388.3-117 3-.9 7.1-1.4 9-1.1 1.9.2 78 22.8 169 50.2zm195.5 264.6c-10.1 5.7-11.4 20.6-2.3 28.2 9.5 8 24.6 3.1 27.7-9.1 3.7-14.8-12.1-26.7-25.4-19.1z"/>
                            <path
                                d="M483 387.9c-5.5 1.7-11 5.3-15.1 9.9-14.2 15.8-9.4 41.2 9.6 51 6.6 3.3 18 4.2 25.1 1.8 8.1-2.7 14.4-8.2 18.4-16 3.2-6.3 3.5-7.6 3.5-15.5-.1-7.9-.3-9.2-3.5-14.9-6-11.3-16.1-17.3-28.8-17.1-3.7 0-7.8.4-9.2.8zm-59 111.3c-4.3 1.2-9.7 6.2-11.6 10.5-1.8 4.1-1.8 9.5 0 13.6 3.7 8.8 26.4 23.6 46.1 30 27.9 9.2 55.8 7 83-6.3 12.8-6.3 26.9-16.8 29.5-22 5.9-11.5-2.3-25.9-14.7-26-5.6 0-8.8 1.3-15.4 6.5-7.6 6-18.8 11.8-27.9 14.7-9.7 3-29.8 3.3-40 .5-9-2.4-21.4-8.7-28.6-14.5-3.4-2.8-7-5.4-8-6-3.2-1.6-8.7-2.1-12.4-1zm-98 70.9c-8.2 3.3-13.1 14.3-9.9 22.6 3.4 9.1 33.7 31.2 61.4 44.8 38.2 18.8 73.2 26.9 115 26.9 36.3-.1 68-6.6 101.5-20.9 27.7-11.8 67.9-38.6 73-48.6 3.8-7.3 1.7-16.6-4.9-22.2-5.7-4.8-15.1-4.7-21.5.1-1.9 1.5-7.7 5.9-12.8 9.8-24.4 18.6-53 32.4-82.9 39.8-66.4 16.5-136.5.8-192.4-42.9-5.4-4.3-11.4-8.4-13.2-9.1-3.7-1.6-9.7-1.7-13.3-.3z"/>
                            <path
                                d="M221.2 652.1c-4.7 1.4-10.7 7.8-11.9 12.7-2.2 8.5.6 13.9 12.2 23.8 54 45.8 122.6 78.4 193.5 91.8 78.2 14.9 158.7 6.9 232.5-22.9 26.8-10.9 49.6-22.8 74-38.9 23.6-15.6 48.2-35.2 51.2-40.9 2.1-4 2.1-12.3 0-16.4-3.7-7.2-12.7-11.5-19.5-9.5-4 1.2-4.8 1.8-21.8 15.5-55.1 44.6-124.8 73.6-197.4 82.4-18 2.1-62.8 2.4-80 .4-77.9-8.8-147.2-37.7-205.5-85.7-6.3-5.1-12.4-9.9-13.7-10.8-3.1-2-9.5-2.7-13.6-1.5z"/>
                        </g>
                    </svg>
                </div>
                <div class="text-2xl sm:text-3xl lg:text-5xl mt-2 mb-1 sm:mt-6 sm:mb-2 text-center">
                    <div class="text-xl sm:text-2xl lg:text-3xl text-primary-500">Curso&nbsp;</div>
                    <h1 class="font-bold">{{ props.course.name }}</h1>
                </div>
                <h2 class="text-xl font-bold text-center">{{ props.course.subtitle }}</h2>
            </div>
        </section>

        <div class="grid grid-cols-1 sm:grid-cols-2">
            <div
                class="bg-primary-500 text-white text-base items-center justify-center whitespace-pre-line w-full h-full p-4 flex 
												sm:w-auto sm:p-16 md:text-lg lg:text-xl lg:p-24">
                {{ props.course.long_description }}
            </div>
            <div class=" bg-gray-100 w-full sm:w-auto w-full h-full flex items-center justify-center">
                <figure class="w-full h-full object-cover"
                        style="max-height:60vh"
                >
                    <img
                        v-if="props.course.image"
                        :src="props.course.image"
                        alt="Imagen de Curso"
                        class="w-full h-full object-cover"/>
                    <img
                        v-else
                        src="/img/no-picture.svg"
                        alt="No hay imagen para este curso">
                </figure>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2">
            <div class="bg-gray-light">
                <div
                    class="half-container half-reduced ml-auto p-4 sm:px-4 sm:pl-0 sm:py-8 tracking-wide">
                    <h3 class="text-primary-500 text-base md:text-lg font-bold">Impartido por</h3>

                    <div class="w-full flex items-center my-2 sm:py-5" v-for="(teacher,idx) in JSON.parse(props.course.teacher)" :key="idx">
                        <div class="bg-primary-500"
                            v-if="teacher.image"
                            style="border-radius:50%;min-width:64px;max-width:64px;height:64px;"
                        >
                            <img :src="teacher.image" alt="avatar" style="width:100%;height:100%;border-radius:50%"/>
                        </div>
                        <svg
                            v-else
                            style="max-width: 64px"
                            xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 100 100">
                            <g fill="#F3F3F3" stroke-width="0">
                                <path
                                    d="M38 1.6C28.9 4 21.9 8.1 15 15 2.7 27.3-2.3 43.7 1.1 60.2c1.4 6.6 5.9 16.2 9.8 21l3.1 3.6 5.9-5.7c3.2-3.2 8.1-6.9 10.9-8.3l5.1-2.5-4-3.9c-5.8-5.6-8.3-11.5-8.3-19.4-.1-15.3 11.6-27.2 26.8-27.3 10.4-.1 18.9 4.9 24.4 14.3 2.3 3.9 2.7 5.6 2.7 12.5 0 9.4-1.8 13.9-8.1 20l-4.2 4.1 4.5 1.8c2.5 1.1 7.4 4.5 10.8 7.8l6.3 5.8 2.7-3.1c9-10.8 12.8-28.8 9-43.4-2.3-8.7-6.2-15.2-13.5-22.6C72.5 2.2 54.6-2.8 38 1.6z"/>
                                <path
                                    d="M42.5 24.9c-11.6 5.3-16.7 18.6-11.2 29.2 2.8 5.2 9.9 10.4 15.7 11.4 10.3 1.7 21.6-5.1 24.5-14.8 5.1-17.1-13-33.2-29-25.8zM44 72.1c-7.2 1.4-14.4 5.5-20 11.5l-5.3 5.6 4.4 2.9c10 6.7 25 9.5 37.2 7 5.9-1.3 18.6-7.1 20.6-9.5.9-1 .2-2.3-2.8-5.8-4.9-5.5-13.7-10.3-21.5-11.7-6.6-1.2-6.4-1.2-12.6 0z"/>
                            </g>
                            <path
                                d="M43.1 19.1C23.2 25.2 17.6 50 32.8 64.6l4.1 3.9-6.4 3.3c-3.5 1.9-8.5 5.6-11 8.3-4.5 4.8-4.6 5.1-3 6.9 1.7 1.9 1.9 1.7 6.7-3.5 3.2-3.6 7.3-6.6 11.6-8.7 6.1-3 7.4-3.3 16.2-3.3 8.6 0 10.1.3 15.5 3 3.2 1.7 8.2 5.4 11.1 8.2 5 5.1 5.2 5.2 6.9 3.3 1.7-1.8 1.5-2.1-3.4-6.9-2.8-2.7-7.7-6.2-10.9-7.8l-5.9-3 4-3.3c7.9-6.7 11.4-20.8 7.5-30.1-2.2-5-8.3-11.6-13.2-14.1-4.7-2.4-14.5-3.2-19.5-1.7zm17.7 6.1c11.1 5.2 15.5 20.7 8.8 30.8-4.2 6.3-9.6 9.4-17.6 9.8-7.5.5-12.3-1.3-17.4-6.4-8.2-8.3-8.2-20.7.3-29.7 6.9-7.5 16.1-9.1 25.9-4.5z"/>
                        </svg>
                        <div class="pl-4 sm:pl-6">
                            <div v-if="teacher.name" class="font-bold">{{ teacher.name }}</div>
                            <div v-if="teacher.specialty" class="text-sm">{{ teacher.specialty }}</div>
                            <div v-if="teacher.profession" class="text-sm">{{ teacher.profession }}</div>
                            <div v-if="teacher.description" class="text-sm">{{ teacher.description }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-primary-500 text-white">
                <div class=" half-container half-reduced mr-auto p-4 sm:px-4 sm:py-8 pl-4 sm:pl-16 tracking-wide">
                    <h3 class="text-white text-base md:text-lg font-bold">Complétalo y gana</h3>

                    <div class="w-full flex flex items-center my-2 sm:py-5">
                        <svg style="max-width:40px;"
                            xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 150 143">
                            <path fill="#FFF"
                                d="M64 23.5c-6.2 12.6-11.4 23.2-11.6 23.4-.2.3-10.4 1.9-22.7 3.7-12.2 1.8-23.8 3.6-25.7 4l-3.5.6 18.7 18.2 18.7 18.1-4.4 25.5c-2.4 14-4.3 25.6-4.2 25.7.2.1 10.6-5.2 23.1-11.8l22.9-12 10.6 5.5c5.8 3 16 8.4 22.6 11.9 9.4 5 12.1 6 12.3 4.7.2-.8-1.6-12.3-3.9-25.5l-4.1-24 18.7-18.1c15.7-15.2 18.4-18.2 16.7-18.6-1.2-.3-12.4-2.1-25.1-3.8-12.6-1.8-23.4-3.6-23.9-3.9-.5-.3-6.1-11-12.5-23.6L75.2.5 64 23.5z"/>
                        </svg>
                        <div class="pl-4 sm:pl-6">
                            <span class="text-5xl text-white font-bold">5 puntos</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-green-50" v-if="props.approved">
            <div class="container max-w-5xl px-5 mx-auto xl:px-0 py-4 sm:py-12 text-base sm:text-xl">
                ¡Felicidades, has aprobado este curso!
            </div>
        </div>

        <div class="container max-w-5xl px-5 mx-auto xl:px-0 my-4 sm:my-14 sm:pb-10">
            <h3 class="text-primary-500 text-base md:text-lg font-bold">{{ props.course.title }}</h3>
            <div class="whitespace-pre-wrap">
                {{ props.course.short_description }}
            </div>
        </div>

        <div class="container max-w-5xl px-5 mx-auto xl:px-0 my-4 sm:my-8">
            <div v-for="(module, index) in props.modules" :key="module.id"
                class="grid grid-cols-1 sm:flex my-2 sm:my-5">

                <div class="bg-primary-500 text-white font-bold text-center w-full sm:w-80 p-4 sm:p-8 flex-wrap flex items-center justify-center">
                    <div class="w-full text-base sm:text-8xl">{{index + 1}}</div>
                    <p class="w-full text-base py-0 sm:py-4 capitalize">{{ module.tag}}</p>
                </div>
                <div class="w-full sm:flex-1 bg-gray-200 p-4 sm:px-12 sm:pt-10 sm:pb-8 relative">
                    <h3 class="text-primary-500 text-base md:text-lg font-bold pb-0 sm:pb-2">
                        {{ module.title }}
                    </h3>
                    <p class="mb-4 sm:mb-10">
                        {{ module.description }}
                    </p>
                    <Link
                        :href="route('module.index', module.id)"
                        class="bg-primary-500 text-white text-sm leading-none font-bold
												pt-2 pb-3 px-16 transition-all select-none rounded-full
												hover:opacity-80">
                        Acceder
                    </Link>
                    <div class="absolute top-0 left-0 w-full h-full bg-gray-600 opacity-80 flex items-center justify-center"
                        v-if="!module.canAccess">
                        <svg
                            style="max-width:82px"
                            xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 200 272"><path fill="#FFF" d="M90.5 1C78.4 3 65.6 8.6 56.3 16.2c-11.2 9.2-21 25-23.2 37.2C32.4 57 32 75 32 98.7V138h-8.5c-5.9 0-9.6.5-11.6 1.6-5.9 3-5.9 2.8-5.9 65.7v57.4l2.3 3.4c4.1 6.1 1.4 6 96.6 5.7 83.2-.3 86.7-.4 89.4-2.2 5.8-4 5.7-2.3 5.7-65.1 0-51.6-.2-58-1.6-60.5-2.8-4.6-6.3-6-15.2-6h-8.1l-.3-40.3c-.4-39.4-.5-40.3-2.9-47.7-6.4-19.6-17.7-33.4-34.1-41.4-5.1-2.5-11.9-5.3-15.2-6.1C115.1.6 98.2-.2 90.5 1zm30.9 18c8.6 2.7 20.3 10.6 25.4 17.3 6.1 7.8 9.9 17 11.2 26.8.6 5.1 1 21.5.8 41.4l-.3 33-55.7.3-55.8.2.1-22.7c0-12.6.4-31.4.8-41.8.7-18.6.8-19.2 3.9-25.8C57.5 35.4 70.6 23.8 84 19.3c9-3.1 27.7-3.2 37.4-.3zM184 204.5V255H22V154h162v50.5z"/></svg>
                    </div>
                </div>
            </div>
        </div>


				<section v-if="references">
					<div v-if="references.title || references.content" class="">
						<div class="container max-w-5xl px-5 mx-auto xl:px-0">
							<div class="text-white flex flex-col center-align bg-gray-600 px-6 py-4">
								<h3 v-if="references.title" class="text-sm font-bold">{{ references.title }}</h3>
								<div v-if="references.content" class="text-xs" v-html="references.content.replace(/\n/g, '<br>')" />
							</div>
						</div>
					</div>
				</section>


        <div class="bg-gray-light px-5 pt-4 pb-12 sm:pt-10 mt-4 sm:mt-24" v-if="props.related.length">
            <div class="container mx-auto">
                <h3 class="text-base md:text-lg font-bold text-center mt-1 mb-2 sm:mb-12 sm:mt-4">Contenidos relacionados</h3>
                <div
                    class="w-full max-w-sm mx-auto grid gap-y-8 place-content-center
                                grid-cols-1
								md:max-w-full md:grid-cols-3 md:gap-x-6 md:gap-y-8
								lg:grid-cols-4 lg:gap-x-7 lg:gap-y-10">

                    <div
                        v-for="t in props.related"
                        :key="t.id"
                        @click.prevent="navCourse(t.id)"
                        class="hover:cursor-pointer"
                    >

                        <figure class="h-60">
                            <div class="bg-gray-100 w-full h-full flex items-center justify-center">
                                <img
                                    v-if="t.image"
                                    :src="t.image"
                                    alt="Imagen de formación"
                                    class="w-full h-full object-cover"/>

                                <img
                                    v-else
                                    src="/img/no-picture.svg"
                                    alt="no hay imagen para ésta formación">
                            </div>
                        </figure>

                        <div
                            class="bg-white border-b-6 px-5 py-6 pb-8 h-32"
                            :class="[`border-primary-500`]">
                            <div class="grid gap-y-1">
                                <div class="inline-flex items-center">
                                        <span
                                            class="text-xs tracking-wide text-primary-500 font-bold"
                                        >{{ t.format.type }}</span>
                                </div>
                                <h3 class="text-sm leading-tight mt-1 overflow-hidden text-ellipsis"> {{ t.name }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<style scoped>
@media (min-width: 640px) {

    .half-container {
        max-width: 320px;
    }
}

@media (min-width: 768px) {

    .half-container {
        max-width: 384px;
    }
}

@media (min-width: 1024px) {

    .half-container {
        max-width: 512px;
    }
}

@media (min-width: 1280px) {

    .half-container {
        max-width: 640px;
    }
}

@media (min-width: 1536px) {

    .half-container {
        max-width: 768px;
    }
}

.half-reduced {
    max-width: 544px;
}
</style>
