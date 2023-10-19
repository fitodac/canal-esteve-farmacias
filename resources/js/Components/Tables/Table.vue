<script setup>
import TableItems from './Table-items.vue';
import Pagination from './Pagination.vue';

const props = defineProps({
    resources: Object,
})

</script>

<template>
    <section class="text-gray-600">
        <div v-if="$page.props.flash.message"
            class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
            <span class="font-medium">
                {{ $page.props.flash.message }}
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
                                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">#</th>
                                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Material</th>
                                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Categoría</th>
                                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Tipo de contenido</th>
                                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Canal</th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Editar</span>
                                                <span class="sr-only">Eliminar</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <TableItems
                                            v-for="resource in resources.data"
                                                :key="resource?.id"
                                                :id="resource?.id"
                                                :material="resource?.material"
                                                :category="resource?.category?.name"
                                                :content_type="resource?.contenttype?.type"
                                                :channel="resource?.channel?.channel"
                                            />
                                    </tbody>
                                </table>

                                <Pagination class="mt-6" :links="resources.links" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
