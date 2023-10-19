<script setup>

import PageLayout from '@/Layouts/PageLayout.vue'
import Table from '@/Components/Tables/Table.vue'
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import Pagination from '@/Components/Tables/Pagination.vue';
import debounce from 'lodash.debounce'
import { Inertia } from "@inertiajs/inertia";
import { ref, watch } from "vue";

const props = defineProps({
    users: Object,
    search: String,
});

const form = useForm();
let search = ref(props.search);

const destroy = (pharmacy) => {
    if (confirm("Are you sure you want to Delete")) {
        form.delete(route('admin.users.destroy', pharmacy));
    }
}

watch(search, value => {
    update(value)
});

const update = debounce((value) => {
    Inertia.get(route('admin.users.index'), { search: value }, {
        preserveState: true,
        replace: true
    });
}, 500)

</script>

<template>
    <PageLayout>
        <Head title="Listado de usuarios" />

        <div class="container pt-10 pb-16 px-5 mx-auto lg:px-0">
            <h1 class="text-2xl font-medium text-gray-700 pb-2">Listado de usuarios</h1>
            <div class="flex justify-end">
                <a :href="route('admin.users.export')" class="px-4 py-2 bg-teal-500 text-white rounded hover:bg-teal-700 mr-3">Exportar Usuarios Registrados</a>
                <a :href="route('admin.users.exportusersbypharmacy')" class="px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-700">Exportar Usuarios por Farmacia</a>
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
                                                    Nombre</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Email</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Rol</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Farmacia</th>
                                                <th scope="col" class="relative px-6 py-3">
                                                    <span class="sr-only">Editar</span>
                                                    <span class="sr-only">Eliminar</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="bg-white" v-for="user in props.users.data" :key="user?.id"
                                                :id="user?.id">
                                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{user.id}}</td>
                                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ user.name }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ user.email }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap capitalize">
                                                    {{ user.roles.length > 0 ? user.roles[0].readable_name : 'No tiene rol' }}
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ user.pharmacy['name'] }}</td>
                                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                    <Link tabIndex="1" className="px-4 py-2 text-sm text-white bg-blue-500 rounded"
                                                        :href="route('admin.users.edit', user)">
                                                    Editar
                                                    </Link>
                                                    <button @click="destroy(user)" tabIndex="-1" type="button"
                                                        className="mx-1 px-4 py-2 text-sm text-white bg-red-500 rounded">
                                                        Eliminar
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <Pagination class="mt-6" :links="props.users.links" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </PageLayout>
</template>
