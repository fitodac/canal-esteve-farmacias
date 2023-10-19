<script setup>
import PageLayout from '@/Layouts/PageLayout.vue'
import Table from '@/Components/Tables/Table.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import { ref, watch } from "vue";
import debounce from 'lodash.debounce'
import { Inertia } from "@inertiajs/inertia";

import Pagination from '@/Components/Tables/Pagination.vue';

const props = defineProps({
    participations: Object,
    search: Object
});

let search = ref(props.search);

watch(search, value => {
    update(value)
});

const update = debounce( (value) => {
    Inertia.get(route('admin.participation.index'), { search: value }, {
        preserveState: true,
        replace: true
    });
}, 500)

const challenge_type = (type) => {
    return {
        'visibility': 'visibilidad',
        'recommendation': 'recomendación'
    }[type]
}

</script>

<template>
    <PageLayout>
        <Head title="Listado de participaciones" />

        <div class="container pt-10 pb-16 px-5 mx-auto lg:px-0">
            <h1 class="text-2xl font-medium text-gray-700 pb-2">Listado de Participaciones</h1>
            <div class="flex justify-end">
                <a :href="route('admin.participation.export')" class="px-4 py-2 bg-teal-500 text-white rounded hover:bg-teal-700 mr-3">Exportar Participaciones</a>
            </div>
            <div v-if="$page.props.flash.message"
                class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                <span class="font-medium">
                    {{ $page.props.flash.message }}
                </span>
            </div>
            <div class="container pb-16 px-5 mx-auto lg:px-0">
                <div class="px-5 py-10 mx-auto">
                    <div class="flex justify-end mb-3">
                        <input v-model="search" class="" type="search" placeholder="Buscar..."/>
                    </div>
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
                                                    Auxiliar</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Reto</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Tipo de reto</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Farmacia</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Aprobado</th>
                                                <th scope="col" class="relative px-6 py-3">
                                                    <span class="sr-only">Ver</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="bg-white" v-for="participation in props.participations.data" :key="participation?.id"
                                                :id="participation?.id">
                                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ participation.id }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ participation.user.name }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ participation.challenge.title }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap capitalize">{{ challenge_type(participation.challenge.challenge_type) }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ participation.pharmacy.name }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap"><span v-if="participation.approved !== null">
                                                    {{ participation.approved == 1 ? 'Si' : 'No' }}</span>
                                                </td>
                                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                    <Link tabIndex="1" className="px-4 py-2 text-sm text-white bg-blue-500 rounded"
                                                        :href="route('admin.participation.show', participation)">
                                                    Ver
                                                    </Link>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <Pagination class="mt-6" :links="props.participations.links" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </PageLayout>
</template>
