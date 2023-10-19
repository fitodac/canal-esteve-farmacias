<script setup>

import PageLayout from '@/Layouts/PageLayout.vue'
import Table from '@/Components/Tables/Table.vue'
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import { ref } from 'vue'

import Pagination from '@/Components/Tables/Pagination.vue';


const props = defineProps({
    webinars: Object
});

const form = useForm();

const destroy = (webinars) => {
    if (confirm("Are you sure you want to Delete")) {
        form.delete(route('admin.webinars.destroy', webinars));
    }
}
</script>

<template>
    <PageLayout>
        <Head title="Listado de webinarios" />
        <div class="container pt-10 pb-16 px-5 mx-auto lg:px-0">
            <h1 class="text-2xl font-medium text-gray-700 pb-2">Listado de Webinarios</h1>

            <div class="mb-2">
                <Link :href="route('admin.webinars.create')">Agregar</Link>
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
                                                    Impartido por</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Fecha/Hora</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Activo</th>
                                                <th scope="col" class="relative px-6 py-3">
                                                    <span class="sr-only">Editar</span>
                                                    <span class="sr-only">Eliminar</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="bg-white" v-for="webinar in props.webinars.data" :key="webinar?.id"
                                                :id="webinar?.id">
                                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ webinar.id }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap w-1/6">
                                                    <img :src="webinar.image" class="h-auto max-h-14 rounded-lg" alt="" />
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ webinar.title }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ JSON.parse(webinar.speaker)['name'] }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ `${webinar.appointment_day} - ${webinar.appointment_hour}` }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ webinar.active ? 'Si' : 'No' }}</td>
                                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                    <Link tabIndex="1" class="mx-1 px-4 py-2 text-sm text-white rounded"
                                                            :href="route('admin.webinars.toggle.active', webinar.id)"
                                                            :class="{ 'bg-orange-300': webinar.active, 'bg-green-300': !webinar.active }">
                                                        {{ webinar.active ? 'Desactivar' : 'Activar' }}
                                                    </Link>
                                                    <Link tabIndex="1" className="px-4 py-2 text-sm text-white bg-blue-500 rounded"
                                                        :href="route('admin.webinars.edit', webinar.id)">
                                                    Editar
                                                    </Link>
                                                    <button @click="destroy(webinar)" tabIndex="-1" type="button"
                                                        className="mx-1 px-4 py-2 text-sm text-white bg-red-500 rounded">
                                                        Eliminar
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <Pagination class="mt-6" :links="props.webinars.links" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </PageLayout>
</template>
