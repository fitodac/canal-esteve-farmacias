<script setup>

import PageLayout from '@/Layouts/PageLayout.vue'
import Table from '@/Components/Tables/Table.vue'
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

import Pagination from '@/Components/Tables/Pagination.vue';


const props = defineProps({
    giftcards: Object,
    file: String,
});

const form = useForm();

const destroy = (giftcard) => {
    if (confirm("Are you sure you want to Delete")) {
        form.delete(route('admin.giftcards.destroy', giftcard));
    }
}
</script>

<template>
    <PageLayout>
        <Head title="Listado de tarjetas de regalo" />
        <div class="container pt-10 pb-16 px-5 mx-auto lg:px-0">
            <h1 class="text-2xl font-medium text-gray-700 pb-2">Listado de tarjetas de regalo</h1>

            <div class="grid grid-cols-2">
                <a class="text-left" :href="file">Archivo de Ejemplo</a>
                <Link class="text-right" :href="route('admin.giftcards.create')">Importar</Link>
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
                                                    Usuario</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Contraseña</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Creado el</th>
                                                <th scope="col" class="relative px-6 py-3">
                                                    <span class="sr-only">Eliminar</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="bg-white" v-for="giftcard in props.giftcards.data" :key="giftcard?.id"
                                                :id="giftcard?.id">

                                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ giftcard.id }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ giftcard.username }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ giftcard.password }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ giftcard.created_at }}</td>
                                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                    <button @click="destroy(giftcard)" tabIndex="-1" type="button"
                                                        className="mx-1 px-4 py-2 text-sm text-white bg-red-500 rounded">
                                                        Eliminar
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <Pagination class="mt-6" :links="props.giftcards.links" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </PageLayout>
</template>
