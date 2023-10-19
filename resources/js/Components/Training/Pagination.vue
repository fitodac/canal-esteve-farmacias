<template>
    <div v-if="links && links.length > 3">
        <div class="mt-8 text-center">
            <template v-for="(link, key) in links" :key="key">
                <div v-if="link.url === null" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded inline-block"
                    v-html="link.label" />

                <Link v-else
                      preserve-scroll
                    class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-primary focus:text-primary"
                    :class="{ 'bg-primary-500 text-white': link.active }"
                      :href="link.url+'&category=' + category + '&format=' + format"
                      v-html="link.label" />
            </template>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    links: Array,
    category: String,
    format: String
})

</script>
