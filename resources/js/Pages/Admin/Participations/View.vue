<script setup>
import PageLayout from '@/Layouts/PageLayout.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import { formatDate } from '@vueuse/core'

const { participation } = defineProps({
    participation: Object
});

const formdata = JSON.parse(participation.formdata)
const challengeType = () => {
    return participation.challenge.challenge_type == 'recommendation' ? 'Recomendación' : 'Visibilidad';
}

let approved_score = ref(null);
</script>

<template>
    <PageLayout>
        <Head title="Ver participación" />

        <div class="container pt-10 pb-16 px-5 mx-auto lg:px-0">
            <h3
                class="text-primary text-2xl font-bold leading-none text-center">
                {{ participation.challenge?.title }}
                <br/>
                <small class="text-primary text-center">Tipo: {{challengeType()}}</small>
            </h3>
            <div class="max-w-sm  gap-6 mx-auto mt-10 bg-gray-100 rounded p-4
                    md:max-w-2xl
                    lg:max-w-3xl">


                <p><strong>Usuario:</strong> {{ participation.user?.name }}</p>
                <p><strong>Farmacia:</strong> {{ participation.pharmacy?.name }}</p>
                <p><strong>Archivo Adjunto:</strong> <a :href="participation.file" target="_blank">{{ participation.file }}</a></p>
                <div v-if="participation.challenge.challenge_type !== 'recommendation'">
                    <label class="font-bold mr-3" for="approved_score">Puntaje a asignar:</label>
                    <input id="approved_score" type="number" v-model="approved_score" min="0" :max="participation.challenge.score"/>
                </div>

                <div v-if="participation.challenge.challenge_type == 'recommendation'">
                    Productos y cantidades.
                    <br />
                    <span><strong>Desde:</strong> {{ formatDate(new Date(formdata.date_start), 'DD-MM-YYYY') }}</span>
                    <span class="ml-2" v-if="formdata?.date_end"><strong>Hasta:</strong> {{ formatDate(new Date(formdata?.date_end), 'DD-MM-YYYY') }}</span>
                    <ul>
                        <li class="list-disc ml-4" v-for="(item, idx) in formdata.products" :key="idx">
                            {{item.name}}: {{ item.qty }}
                        </li>
                    </ul>
                </div>
                <div v-if="$page.props.errors && $page.props.errors[0]"
                    class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 my-3 rounded relative" role="alert">
                    <span class="font-medium">
                        {{ $page.props.errors[0] }}
                    </span>
                </div>
            </div>

            <div class="py-4 text-center">
                <Link tabIndex="1" className="px-4 py-2 mr-3 text-white bg-orange-500 rounded font-medium"
                    v-if="!participation.approved && participation.approved != 0" :href="route('admin.participation.approve', [participation.id, 'approve', approved_score])">
                Aprobar
                </Link>
                <Link tabIndex="1" className="px-4 py-2 text-white bg-red-500 rounded font-medium"
                    v-if="!participation.approved && participation.approved != 0" :href="route('admin.participation.approve', [participation.id, 'disapprove'])">
                Desaprobar
                </Link>
            </div>
        </div>


    </PageLayout>
</template>
