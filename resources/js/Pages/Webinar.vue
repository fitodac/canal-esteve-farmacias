<script setup>
import Layout from '@/Layouts/PageLayout.vue'
import { Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
    webinar: {
        type: Object,
    }
});

const references = props.webinar?.references ? JSON.parse(props.webinar.references) : null

console.log('references', references)

const getDay = (sqlDay) => {
    let textDay = "";
    if (sqlDay) {
        const arrDay = sqlDay.split("-");

        let month = "";
        switch (arrDay[1]) {
            case "01":
                month = "ENE";
                break;
            case "02":
                month = "FEB";
                break;
            case "03":
                month = "MAR";
                break;
            case "04":
                month = "ABR";
                break;
            case "05":
                month = "MAY";
                break;
            case "06":
                month = "JUN";
                break;
            case "07":
                month = "JUL";
                break;
            case "08":
                month = "AGO";
                break;
            case "09":
                month = "SEP";
                break;
            case "10":
                month = "OCT";
                break;
            case "11":
                month = "NOV";
                break;
            case "12":
                month = "DIC";
                break;
        }
        textDay = arrDay[2] + ' ' + month + ' ' + arrDay[0];
    }
    return textDay;
}
</script>


<template>
    <Layout>
        <div v-if="props.webinar !== null">
            <section class="px-5 py-4 mt-4 md:pt-10 md:pb-10">
                <div class="flex md:mt-4 flex-col justify-center">
                    <div class="flex-1 flex items-center justify-center">
                        <svg style="max-width:75px" xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 138 128">
                            <g fill="#388097" stroke-width="0">
                                <path
                                    d="M6.8 1.6C1.1 4.6 1 5.3 1 47.9c0 21.6.4 40.1.9 41.4.5 1.4 2.5 3.5 4.3 4.8 3.2 2.3 4.1 2.4 24.6 2.7l21.2.3v4c0 3.5-.4 4-3.4 5.3-5.7 2.4-6 8.3-.6 11.1 2.2 1.1 6.5 1.5 17 1.5 13.2 0 14.3.1 17.3 2.3 5.6 4.1 9.7 5.2 19.7 5.2 8.4 0 10.2-.3 15.1-2.8 6.3-3 12.5-9.2 16.1-15.9l2.3-4.3.3-47.7c.3-52.6.5-51-5.9-54.4-4.2-2.1-119.1-2-123.1.2zm122 4.2c1.3 1 2.7 3.6 3.3 5.7.5 2.2.9 17.3.8 33.5l-.1 29.5-2.4-2.8-2.4-2.8V40c0-15.8-.3-29.5-.6-30.4-.6-1.4-6.7-1.6-58.9-1.6-52.2 0-58.3.2-58.9 1.6-.3.9-.6 15.7-.6 32.9C9 74 8.7 76.7 5.5 74c-1.1-.9-1.4-6.5-1.4-29.8-.1-15.8.3-30.5.9-32.7C6.8 3.6 3.3 4 68.5 4c54 0 58.2.2 60.3 1.8zM61.8 42c.1 15.7 0 29.5-.3 30.7-.5 2.2-.6 2.2-23.9 2.2-20.2 0-23.5-.2-24-1.5-.8-2.2-.8-58.9.1-59.8.4-.3 11.3-.5 24.2-.4l23.6.3.3 28.5zm31-15.1c.3 13.6-.2 15.6-3.5 14.4-.8-.3-1.3-2.2-1.3-5.3 0-3-.6-5.2-1.5-6-1.1-.9-1.3-2.3-.9-5 .5-3.2.2-4-2.1-5.8-1.5-1.2-3.3-2.2-4-2.2-.7 0-2.5 1-4 2.2-2.3 1.8-2.6 2.6-2.1 5.8.4 2.7.2 4.1-.9 5-1 .8-1.5 3-1.5 6 0 4.8-1.1 6.2-3.7 5.2-1-.3-1.3-4-1.3-13.6 0-7.3.3-13.6.7-14 .4-.3 6.3-.5 13.2-.4l12.6.3.3 13.4zm30.7.6c0 13.3-.1 14-2 14-1.7 0-2.1-.8-2.5-5.1-.3-2.8-1.1-5.8-1.8-6.6-.7-.9-1-2.7-.6-4.4.7-3.7-2.7-8.4-6-8.4-3.5 0-7 4.3-6.3 7.8.4 1.7 0 3.7-.8 4.9-.8 1.1-1.5 4.2-1.7 6.9-.3 4.1-.6 4.9-2.3 4.9-1.9 0-2-.8-2.3-12.9-.1-7.2 0-13.6.2-14.3.4-1.1 3.4-1.3 13.3-1.1l12.8.3v14zm-11.5-4c0 1.7-1.7 2.8-3 2-.7-.4-.7-1.3 0-2.6 1.2-2.1 3-1.7 3 .6zm-30.4-.4c.9 1.5-1.1 3.3-3 2.6-.9-.4-1.3-1.3-1-2.2.7-1.7 3-2 4-.4zm.8 8.8c1.2 1.3 1.6 3.2 1.4 5.8-.3 3.7-.4 3.8-4.3 3.8-4 0-4 0-4.3-4.2-.2-3.3.1-4.4 2-5.7 2.8-2 3.1-2 5.2.3zm32 1.4c.3 1.2.6 3.4.6 4.9 0 2.6-.3 2.8-4.5 2.8H106v-3.9c0-2.9.6-4.4 2.1-5.4 2.6-1.9 5.6-1.1 6.3 1.6zM92.8 51.7c-.3 5.2-.6 5.8-3.5 7.4L86 61v-3.4c0-2.5-.7-4-2.6-5.5-3.4-2.6-4.5-2.6-7.9.1-2.2 1.7-2.6 2.7-2.2 5.4.3 2 0 3.9-.8 5.1-.8 1-1.5 3.9-1.5 6.4 0 3-.5 4.9-1.4 5.2-2.9 1.1-3.6-1.6-3.6-15V46h27.1l-.3 5.7zm31 2.7c.3 8.4-.6 10.9-3.2 8.3-.9-.8-2.1-1.7-2.7-1.9-.7-.2-1.2-1.9-1.3-3.7-.1-4.7-4.4-8-8.1-6.3-1.4.6-3 2.3-3.7 3.7-.9 1.9-1.9 2.5-4.5 2.5H97V45.9l13.3.3 13.2.3.3 7.9zm-42.5 1.2c.9.9-.4 3.4-1.8 3.4s-2.7-2.5-1.8-3.4c.4-.3 1.2-.6 1.8-.6.6 0 1.4.3 1.8.6zm31.2.3c.3.5.1 1.3-.5 1.6-1.5.9-4.3-.3-3.5-1.5.8-1.3 3.2-1.3 4-.1zm1.8 8.4c6.2 2.6 14 11.1 16.2 17.7 7 21-8.9 42.2-30.6 40.7-21.8-1.5-35.2-23.8-26.1-43.2 2.8-5.7 8.3-11.9 13.4-14.6 3.7-2.1 12.9-3.7 17.8-3.2 2.5.3 6.6 1.5 9.3 2.6zm-35.9 1.8c-.9 1-2.1 1.6-2.6 1.3-.5-.3-.2-1.4.8-2.5.9-1 2.1-1.6 2.6-1.3.5.3.2 1.4-.8 2.5zM67.2 83.9c-.5 8.6 1.2 8.1-29.5 8.1C7.1 92 6.9 92 5 84.9c-.6-2.2-.8-4.4-.5-4.9.4-.7 12-.9 31.8-.8l31.2.3-.3 4.4zm.4 17.3c1.5 4.4 1.1 4.6-6.3 4-4.5-.3-5.3-.7-5.3-2.4 0-4.2 1.9-5.9 6.2-5.6 3.7.3 4.2.6 5.4 4zm4.2 10c2.8 2.8 1.1 3.3-10 3-11.1-.3-13.7-1-12.4-3.1 1-1.6 20.8-1.5 22.4.1z" />
                                <path
                                    d="M32.5 23.2c-5.3 2.9-7 9.1-4 14.8 1.4 2.7 1.3 2.9-1.3 4.6-6.1 3.9-9.2 9.8-9.2 17.5 0 6.1-.4 6.1 21.5 5.7l17-.3.3-5.7c.4-7.2-2.3-12.8-7.8-16.4-3.8-2.5-3.9-2.7-2.4-5 2.1-3.1 2-8.8-.1-12-2.6-4.1-9.5-5.7-14-3.2zm9 4.4c4.8 3.2 1.9 11.4-4 11.4-3.2 0-6.5-3.3-6.5-6.4 0-2.5 4.1-6.6 6.7-6.6.7 0 2.5.7 3.8 1.6zm4.6 18.9c4 3 6.1 6.3 6.6 10.6l.6 3.9H21.7l.6-3.6c.8-4.7 4.3-9.8 8.2-11.8 4-2.1 12.3-1.6 15.6.9zm42.6 29.2c-.4.3-.7 7.4-.7 15.8 0 21.4-.9 20.9 17.4 10.1 11.7-7 14.4-9.1 13.6-10.1C117.5 89.7 92.2 75 90.6 75c-.7 0-1.6.3-1.9.7zm22.5 16.1c.5.5-2.6 2.9-8 6-4.9 2.9-9.2 5.2-9.6 5.2-.7 0-.8-20.5-.1-21.2.6-.5 15.8 8.1 17.7 10z" />
                            </g>
                        </svg>
                    </div>
                    <div class="text-2xl sm:text-3xl lg:text-5xl mt-2 mb-1 sm:mt-6 sm:mb-2 text-primary-500 text-center">
                        <div class="text-xl sm:text-2xl lg:text-3xl">Webinar&nbsp;</div>
                        <h1 class="font-bold">{{ props.webinar.title }}</h1>
                    </div>

                    <h2 class="text-xl font-bold text-center">{{ props.webinar.subtitle }}</h2>
                </div>
            </section>
            <div class="grid grid-cols-1 sm:grid-cols-2">
                <div
                    class="bg-primary-500 text-white text-base items-center justify-center whitespace-pre-line w-full h-full p-4 flex 
														sm:w-auto sm:p-16 md:text-lg lg:text-xl lg:p-24">
                    {{ props.webinar.description }}
                </div>
                <div class=" bg-gray-100 w-full sm:w-auto w-full h-full flex items-center justify-center">
                    <figure :class="props.webinar.image ? 'w-full h-full object-cover' : ''" style="max-height:60vh">
                        <img v-if="props.webinar.image" :src="props.webinar.image" alt="Imagen de Webinar"
                            class="w-full h-full object-cover" />
                        <img v-else src="/img/no-picture.svg" alt="No hay imagen para este webinar">
                    </figure>
                </div>
            </div>
            <section class="bg-gray-light">
                <div class="container max-w-5xl px-5 mx-auto xl:px-0 py-4 sm:py-8">
                    <div class="flex flex-wrap justify-between lg:flex-nowrap pt-2 sm:pt-4">
                        <div class="w-full lg:w-1/2 p-2">
                            <h3 class="text-primary-500 text-base sm:text-lg font-bold">Fecha</h3>
                            <div
                                class="w-full h-full flex text-white items-center justify-center bg-primary-500 text-base sm:text-4xl font-bold">
                                {{ getDay(props.webinar.appointment_day) }}
                            </div>
                        </div>
                        <div class="w-full lg:w-1/2 p-2 mt-2 sm:mt-0">
                            <h3 class="text-primary-500 text-base sm:text-lg font-bold">Hora</h3>
                            <div
                                class="w-full h-full flex text-white items-center justify-center bg-primary-500 text-base sm:text-4xl font-bold">
                                {{ props.webinar.appointment_hour }} h.
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap justify-between lg:flex-nowrap pt-6">
                        <div class="w-full p-2">
                            <h3 class="text-primary-500 text-base sm:text-lg font-bold">Ponentes</h3>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mt-4 sm:mt-8">
                        <div class="" v-for="person in JSON.parse(props.webinar.speaker)" :key="'p' + person.id">
                            <div class="w-full flex items-center my-1">
                                <div class="bg-primary-500" v-if="person.image"
                                    style="border-radius:50%;min-width:64px;max-width:64px;height:64px;">
                                    <img :src="person.image" alt="avatar"
                                        style="width:100%;height:100%;border-radius:50%" />
                                </div>
                                <svg v-else style="max-width: 64px" xmlns="http://www.w3.org/2000/svg" version="1.0"
                                    viewBox="0 0 100 100">
                                    <g fill="#F3F3F3" stroke-width="0">
                                        <path
                                            d="M38 1.6C28.9 4 21.9 8.1 15 15 2.7 27.3-2.3 43.7 1.1 60.2c1.4 6.6 5.9 16.2 9.8 21l3.1 3.6 5.9-5.7c3.2-3.2 8.1-6.9 10.9-8.3l5.1-2.5-4-3.9c-5.8-5.6-8.3-11.5-8.3-19.4-.1-15.3 11.6-27.2 26.8-27.3 10.4-.1 18.9 4.9 24.4 14.3 2.3 3.9 2.7 5.6 2.7 12.5 0 9.4-1.8 13.9-8.1 20l-4.2 4.1 4.5 1.8c2.5 1.1 7.4 4.5 10.8 7.8l6.3 5.8 2.7-3.1c9-10.8 12.8-28.8 9-43.4-2.3-8.7-6.2-15.2-13.5-22.6C72.5 2.2 54.6-2.8 38 1.6z" />
                                        <path
                                            d="M42.5 24.9c-11.6 5.3-16.7 18.6-11.2 29.2 2.8 5.2 9.9 10.4 15.7 11.4 10.3 1.7 21.6-5.1 24.5-14.8 5.1-17.1-13-33.2-29-25.8zM44 72.1c-7.2 1.4-14.4 5.5-20 11.5l-5.3 5.6 4.4 2.9c10 6.7 25 9.5 37.2 7 5.9-1.3 18.6-7.1 20.6-9.5.9-1 .2-2.3-2.8-5.8-4.9-5.5-13.7-10.3-21.5-11.7-6.6-1.2-6.4-1.2-12.6 0z" />
                                    </g>
                                    <path
                                        d="M43.1 19.1C23.2 25.2 17.6 50 32.8 64.6l4.1 3.9-6.4 3.3c-3.5 1.9-8.5 5.6-11 8.3-4.5 4.8-4.6 5.1-3 6.9 1.7 1.9 1.9 1.7 6.7-3.5 3.2-3.6 7.3-6.6 11.6-8.7 6.1-3 7.4-3.3 16.2-3.3 8.6 0 10.1.3 15.5 3 3.2 1.7 8.2 5.4 11.1 8.2 5 5.1 5.2 5.2 6.9 3.3 1.7-1.8 1.5-2.1-3.4-6.9-2.8-2.7-7.7-6.2-10.9-7.8l-5.9-3 4-3.3c7.9-6.7 11.4-20.8 7.5-30.1-2.2-5-8.3-11.6-13.2-14.1-4.7-2.4-14.5-3.2-19.5-1.7zm17.7 6.1c11.1 5.2 15.5 20.7 8.8 30.8-4.2 6.3-9.6 9.4-17.6 9.8-7.5.5-12.3-1.3-17.4-6.4-8.2-8.3-8.2-20.7.3-29.7 6.9-7.5 16.1-9.1 25.9-4.5z" />
                                </svg>
                                <div class="pl-4 sm:pl-6">
                                    <div class="font-bold">{{ person.name }}</div>
                                    <div>{{ person.occupation }}</div>
                                    <div>{{ person.description }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap justify-between lg:flex-nowrap pt-2">
                        <div class="w-full p-2">
                            <h3 class="text-primary-500 text-base sm:text-lg font-bold">Agenda</h3>
                            <div v-for="(item, index) in JSON.parse(props.webinar.schedule)" :key="index"
                                class="w-full flex items-center my-2 sm:py-3" :class="index % 2 === 0 ? 'bg-dark' : ''">
                                <div style="max-width: 138px;min-width: 138px;" class="p-2 sm:p-4">
                                    {{ item.from }} - {{ item.to }} h
                                </div>
                                <div class="pl-0 sm:pl-2">
                                    <h4 class="font-bold">{{ item.title }}</h4>
                                    <p>{{ item.description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h1
                        class="flex-1 text-2xl sm:text-3xl lg:text-5xl flex items-center justify-center mt-2 mb-3 sm:mt-8 sm:mb-2 text-primary-500 font-bold">
                        <span class="">¿Te interesa asistir?</span>
                    </h1>

                    <iframe width="100%" height="500" class="mt-14" frameborder="0" :src="props.webinar.registration_form"
                        :title="props.webinar.name"></iframe>
                </div>


								<div v-if="references">
									<div v-if="references.title || references.content" class="container max-w-5xl px-5 mx-auto py-10 xl:px-0">
										<h3 v-if="references.title" class="text-primary-500 text-xl font-bold">{{ references.title }}</h3>
										<div v-if="references.content" class="text-xs" v-html="references.content.replace(/\n/g, '<br>')" />
									</div>
								</div>
            </section>
        </div>

        <div v-else>
            <div class="container max-w-2xl px-5 mx-auto xl:px-0 text-base sm:text-xl tracking-wide my-2 sm:mt-24 sm:mb-32">
                <div class="w-full flex items-center my-2 sm:py-5 text-primary-500 ml-2 sm:ml-10">
                    <h1 class="text-3xl font-bold mb-8 text-center">¡Estamos preparando nuevos webinars!</h1>
                </div>
                <div class="flex flex-col center-align">
                    <div class="flex-1 text-base sm:text-xl text-center">
                        <p class="mb-4">Disculpa las molestias, actualmente no tenemos ningún webinar disponible. Sin
                            embargo, nuestro equipo está trabajando arduamente para preparar nuevos contenidos que serán de
                            gran interés para ti. ¡No te pierdas nuestras próximas actualizaciones!</p>
                    </div>
                </div>

                <div class="flex-1 text-center">
                    <Link href="/" class="bg-primary-500 text-white text-sm leading-none font-bold
                                                    pt-3 pb-3 px-12 transition-all select-none rounded-full
                                                    hover:opacity-80 mt-2 sm:mt-4 inline-block mx-2">
                    Volver al inicio
                    </Link>
                </div>
            </div>
        </div>
    </Layout>
</template>
<style scoped>
.bg-dark {
    background-color: #E1EBEE;
}
</style>