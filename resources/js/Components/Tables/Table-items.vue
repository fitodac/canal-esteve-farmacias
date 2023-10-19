<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    id: Number,
    material: String,
    category: String,
    content_type: String,
    channel: String,
})

const form = useForm();
function destroy(id) {
    if (confirm("Are you sure you want to Delete")) {
        form.delete(route('admin.resources.destroy', id));
    }
}
</script>

<template>
    <tr class="bg-white">
        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{id}}</td>
        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ material }}</td>
        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ category }}</td>
        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ content_type }}</td>
        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ channel }}</td>
        <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
            <Link tabIndex="1" className="px-4 py-2 text-sm text-white bg-blue-500 rounded" :href="route('admin.resources.edit', id)">
            Editar
            </Link>
            <!-- <a href="#" class="text-blue-600 hover:text-blue-900">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                    </path>
                </svg>
            </a> -->
            <button @click="destroy(id)" tabIndex="-1" type="button"
                className="mx-1 px-4 py-2 text-sm text-white bg-red-500 rounded">
                Eliminar
            </button>
        </td>
    </tr>
</template>

