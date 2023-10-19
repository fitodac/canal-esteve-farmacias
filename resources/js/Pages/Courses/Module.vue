<script setup>
import { onMounted, ref } from 'vue'
import Layout from '@/Layouts/PageLayout.vue'
import { Head, useForm } from '@inertiajs/inertia-vue3';
import RadioButton from '@/Components/Training/RadioButton.vue'
import MessagePassed from '@/Components/Training/MessagePassed.vue';
import MessageTryAgain from '@/Components/Training/MessageTryAgain.vue';
import MessageCompleted from '@/Components/Training/MessageCompleted.vue';

const props = defineProps({
    module: Object,
    next: Object,
    isApprovedByUser: Boolean
})

const module_references = props.module.references ? JSON.parse(props.module.references) : null

const references = props.module.questions.filter(function (question) {
    return question.references !== null && question.references !== undefined && question.references.trim() !== '';
}).map(function (question) {
    return question.references;
});

const showQuiz = ref(false);
const selectedAnswers = ref([]);
const showAlert = ref(false);
// FLOW AND VISUALIZATION
const showTest = ref(true);
const showMessagePassed = ref(false);
const showMessageTryAgain = ref(false);
const showMessageCompleted = ref(false);

const hideAllMessages = () =>{
    showMessagePassed.value = false;
    showMessageTryAgain.value = false;
    showMessageCompleted.value = false;
}

const tryAgain = () =>{
    hideAllMessages();
    showTest.value = true;
}

const form = useForm({
    answers: selectedAnswers
})

const submit = () => {
    if (!allAnswered()) {
        showAlert.value = true;
        return false;
    }

    form.post('/module/'+ props.module.id, {
        onSuccess: (res) => {
            if(res.props.flash.message == 'aprobado') {
                showMessagePassed.value = true;
            }

            if (res.props.flash.message == 'completo') {
                showMessageCompleted.value = true;
            }

            showTest.value = false;
        },
        onFinish: () => {
        },
        onError: _ => {
            showMessageTryAgain.value = true;
            showTest.value = false;
        }
    });
};

const allAnswered = () => {
    if (selectedAnswers.value.length === 0) {
        return false;
    } else {
        for (let i = 0; i < props.module.questions.length; i++) {
            if (isNaN(selectedAnswers.value[i])) {
                return false;
            }
        }
    }
    return true;
}

onMounted(() => {
    window.tarteaucitron.triggerJobsAfterAjaxCall()
})
</script>
<template>
    <Head title="Preguntas" />

    <Layout>
        <div v-show="showTest">
            <div class="container max-w-5xl px-5 mx-auto xl:px-0 my-4 sm:my-12">
                <div class="w-full flex items-center my-2 sm:py-5">
                    <svg class="w-8 md:w-20"
                        xmlns="http://www.w3.org/2000/svg"
                        version="1.0" viewBox="0 0 987 813" preserveAspectRatio="xMidYMid meet"
                        style="max-width:46px;"
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
                    <div class="pl-2 sm:pl-4">
                        <div class="leading-tight text-base sm:text-xl">Curso&nbsp;
                            {{ props.module.course.name }}
                        </div>
                        <div class="leading-tight font-bold text-base sm:text-xl text-primary-500">Módulo {{ props.module.order }}</div>
                    </div>
                </div>
                <h1 class="text-primary-500 font-bold text-2xl sm:text-5xl">{{ props.module.title }}</h1>
                <div class="video-container w-full h-0 relative overflow-hidden my-4 sm:mt-6 sm:mb-8 bg-gray-200"
                    style="padding-bottom: 56.25%"
                >
                    <div class="youtube_player video w-full h-full absolute top-0 left-0"
                        :videoID="props.module.video"
                        theme="light"
                        width="100%"
                        height="100%"
                        rel="0"
                        controls="1"
                        showinfo="0"
                        autoplay="0"
                        mute="0"
                        loop="0"
                        loading="1">
                    </div>
                </div>

							<div class="w-full flex items-center my-2 sm:py-5">
								<div class="text-primary-500 font-bold text-base sm:text-xl pr-1 sm:pr-4 sm:pr-16">
									Impartido por
								</div>
								<div class="bg-primary-500"
									v-if="JSON.parse(props.module.teacher).image"
									style="border-radius:50%;min-width:64px;max-width:64px;height:64px;"
								>
									<img :src="JSON.parse(props.module.teacher).image" alt="avatar" style="width:100%;height:100%;border-radius:50%"/>
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
									<div class="leading-5 text-base sm:text-xl font-bold">{{
											JSON.parse(props.module.teacher).name
										}}
									</div>
									<div class="leading-5 text-base sm:text-lg">{{
											JSON.parse(props.module.teacher).profession
										}}
									</div>
									<div class="leading-5 text-base sm:text-lg">{{
											JSON.parse(props.module.teacher).description
										}}
									</div>
								</div>
							</div>


							<section v-if="module_references">
								<div v-if="module_references.title || module_references.content" class="">
									<div class="container max-w-5xl mx-auto xl:px-0">
										<div class="text-white flex flex-col center-align bg-gray-600 px-6 py-4">
											<h3 v-if="module_references.title" class="text-sm font-bold">{{ module_references.title }}</h3>
											<div v-if="module_references.content" class="text-xs" v-html="module_references.content.replace(/\n/g, '<br>')" />
										</div>
									</div>
								</div>
							</section>

            </div>
            <div class="bg-gray-light">
                <div class="container max-w-5xl px-5 mx-auto xl:px-0 py-4 sm:py-12 text-base sm:text-xl">
                    {{ props.module.description }}
                </div>
            </div>
            <div class="bg-green-50" v-if="isApprovedByUser">
                <div class="container max-w-5xl px-5 mx-auto xl:px-0 py-4 sm:py-12 text-base sm:text-xl">
                    ¡Este módulo ya lo tienes aprobado, completa el siguiente!
                </div>
            </div>
            <div class="pb-2 sm:pb-12" style="background:#5A5E5E" v-if="!isApprovedByUser">
                <div class="container max-w-5xl px-5 mx-auto xl:px-0 text-base sm:text-xl pb-4 sm:pb-16 ">
                    <div class="grid grid-cols-1 sm:flex">
                        <div class="w-full sm:flex-1 py-4 sm:pt-10 sm:pb-4 relative text-white">
                            <p class="mb-4 sm:mb-6 sm:mt-9 text-base sm:text-3xl font-bold">
                                ¡Haz el test, aprueba <br class="hidden sm:block"/>
                                y desbloquea el siguiente módulo!
                            </p>
                            <button @click="showQuiz = true"
                                    class="bg-primary-500 text-white text-sm leading-none font-bold
												pt-3 pb-3 px-12 transition-all select-none rounded-full
												hover:opacity-80">
                                Comenzar test
                            </button>
                        </div>
                        <div
                            class="bg-primary-500 text-white font-bold text-center w-full sm:w-52 p-4 sm:py-6 sm:px-8 flex-wrap flex items-center justify-center hidden sm:block">
                            <div class="w-full text-base font-bold leading-tight">
                                Completa todos los módulos del curso para ganar
                            </div>
                            <div class="w-full text-base my-2">
                                <div class="w-full flex items-center justify-center">
                                    <svg style="max-width:40px;"
                                        xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 150 143">
                                        <path fill="#FFF"
                                            d="M64 23.5c-6.2 12.6-11.4 23.2-11.6 23.4-.2.3-10.4 1.9-22.7 3.7-12.2 1.8-23.8 3.6-25.7 4l-3.5.6 18.7 18.2 18.7 18.1-4.4 25.5c-2.4 14-4.3 25.6-4.2 25.7.2.1 10.6-5.2 23.1-11.8l22.9-12 10.6 5.5c5.8 3 16 8.4 22.6 11.9 9.4 5 12.1 6 12.3 4.7.2-.8-1.6-12.3-3.9-25.5l-4.1-24 18.7-18.1c15.7-15.2 18.4-18.2 16.7-18.6-1.2-.3-12.4-2.1-25.1-3.8-12.6-1.8-23.4-3.6-23.9-3.9-.5-.3-6.1-11-12.5-23.6L75.2.5 64 23.5z"/>
                                    </svg>
                                    <div class="px-2">
                                        <span class="text-5xl text-white font-bold">{{ props.module.course.score }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-base">Puntos</div>
                        </div>
                    </div>
                </div>

                <div class="container max-w-3xl px-5 mx-auto xl:px-0 text-base sm:text-xl text-white tracking-wide"
                    v-show="showQuiz"
                >
                    <form @submit.prevent="submit">
                        <div v-for="(question, qindex) in props.module.questions"
                            :key="'q'+question.id"
                            class="mb-2 mt-2 sm:mb-14 sm:mt-6"
                        >
                            <h3 class="font-bold text-xl">
                                <span>{{ qindex + 1 }}</span>. <span>{{ question.question }}</span>
                            </h3>
                            <div v-for="(answer, aindex) in JSON.parse(question.answers)" :key="aindex">
                                <label
                                    @click="selectedAnswers[qindex] = answer.id"
                                    class="leading-tight mt-3 flex gap-x-3 cursor-pointer flex flex items-center">
                                    <RadioButton
                                        :value="answer.id"
                                        :name="'answer'+qindex"
                                        :checked="selectedAnswers[qindex] === aindex"/>
                                    <span class="inline-block">{{
                                            String.fromCharCode(65 + aindex) + '. ' + answer.answer
                                        }}</span>
                                </label>
                            </div>
                        </div>

                        <div class="flex flex-col center-align my-2 sm:my-20 bg-gray-600 px-6 py-4" v-if="references && references.length > 0">
                            <h3 class="text-sm font-bold">{{ module.questions_references_title }}</h3>
                            <ul class="list-disc ml-4 mt-2">
                                <li class="text-white text-xs leading-tight tracking-tight" v-for="(reference,idx) in references" :key="idx">
                                    {{reference}}
                                </li>
                            </ul>
                        </div>

                        <div class="flex flex-col center-align my-2 sm:my-20">
                            <button type="submit" :disabled="form.processing"
                                    class="flex-1 bg-primary-500 text-white text-base leading-none font-bold
                                                    py-3 sm:py-7 px-20 transition-all select-none rounded-2xl
                                                    hover:opacity-80 mx-auto">
                                Envíar respuestas
                            </button>

                            <span v-show="showAlert"
                                class="inline-block flex-1 bg-red-100 border text-red-700 px-4 py-3 rounded-lg my-2 sm:my-8 text-base sm:text-lg text-center">
                                <strong class="font-bold">Alerta: </strong>
                                <span class="block sm:inline">Por favor contesta todas las preguntas antes de enviar tus respuestas</span>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <MessagePassed :next="next?.id" v-show="showMessagePassed"/>
        <MessageTryAgain @try-again-event="tryAgain()" v-show="showMessageTryAgain"/>
        <MessageCompleted v-show="showMessageCompleted"/>
    </Layout>
</template>
<style scoped>
h3 {
    padding-left: 1.25em;
    text-indent: -1.25em;
}
</style>
