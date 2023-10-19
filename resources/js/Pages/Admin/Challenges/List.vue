<script setup>

import PageLayout from '@/Layouts/PageLayout.vue'
import Table from '@/Components/Tables/Table.vue'
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import { formatDate } from '@vueuse/core'
import { ref } from 'vue'

import Pagination from '@/Components/Tables/Pagination.vue';


const props = defineProps({
    challenges: Object
});

const form = useForm();

const destroy = (challenge) => {
    if (confirm("Are you sure you want to Delete")) {
        form.delete(route('admin.challenges.destroy', challenge));
    }
}
</script>

<template>
    <PageLayout>
        <Head title="Listado de retos" />
        <div class="container pt-10 pb-16 px-5 mx-auto lg:px-0">
            <h1 class="text-2xl font-medium text-gray-700 pb-2">Listado de Retos</h1>

            <div class="mb-2">
                <Link :href="route('admin.challenges.create')">Agregar</Link>
            </div>
            <div v-if="$page.props.flash.message"
                class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                <span class="font-medium">
                    {{ $page.props.flash.message }}
                </span>
            </div>

            <div v-if="$page.props.errors && $page.props.errors[0]"
                class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="font-medium">
                    {{ $page.props.errors[0] }}
                </span>
            </div>

            <div class="container pb-16 px-5 mx-auto lg:px-0">
                <div class="px-5 py-10 mx-auto">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                <div class="overflow-hidden sm:rounded">
                                    <table class="min-w-full">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    #</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    &nbsp;</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Titulo</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Tipo</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Puntaje</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Fecha Desde</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Fecha Hasta</th>
                                                <th scope="col" class="relative px-6 py-3">
                                                    <span class="sr-only">Editar</span>
                                                    <span class="sr-only">Eliminar</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="bg-white" v-for="challenge in props.challenges.data" :key="challenge?.id"
                                                :id="challenge?.id">
                                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{challenge.id}}</td>
                                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap w-1/6">
                                                    <img :src="challenge.image" class="h-auto max-h-14 rounded-lg" alt="" />
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ challenge.title }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ challenge.challenge_type }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ challenge.score }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ formatDate(new Date(challenge.date_from), 'DD-MM-YYYY') }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ formatDate(new Date(challenge.date_to), 'DD-MM-YYYY') }}</td>
                                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                    <Link tabIndex="1" class="mx-1 px-4 py-2 text-sm text-white rounded"
                                                            :href="route('admin.challenges.toggle.active', challenge.id)"
                                                            :class="{ 'bg-orange-300': challenge.active, 'bg-green-300': !challenge.active }">
                                                        {{ challenge.active ? 'Desactivar' : 'Activar' }}
                                                    </Link>
                                                    <Link tabIndex="1" className="px-4 py-2 text-sm text-white bg-blue-500 rounded"
                                                        :href="route('admin.challenges.edit', challenge)">
                                                    Editar
                                                    </Link>
                                                    <button @click="destroy(challenge)" tabIndex="-1" type="button"
                                                        className="mx-1 px-4 py-2 text-sm text-white bg-red-500 rounded">
                                                        Eliminar
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <Pagination class="mt-6" :links="props.challenges.links" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </PageLayout>
</template>
