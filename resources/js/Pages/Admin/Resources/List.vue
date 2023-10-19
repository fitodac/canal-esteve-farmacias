<script setup>

import PageLayout from '@/Layouts/PageLayout.vue'
import Table from '@/Components/Tables/Table.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    resources: Object
});

</script>

<template>
    <PageLayout>
        <Head title="Listado de recursos" />
        <div class="container pt-10 pb-16 px-5 mx-auto lg:px-0">
            <h1 class="text-2xl font-medium text-gray-700 pb-2">Listado de Recursos</h1>

            <div class="mb-2">
                <Link :href="route('admin.resources.create')">Agregar</Link>
            </div>
            <Table :resources="props.resources"/>
        </div>
    </PageLayout>
</template>
