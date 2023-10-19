<script setup>
import { section3 as content } from '@/StaticContent/home.js'
</script>



<template>
    <section class="wrapper">
        <div class="container mx-auto">

            <h2 class="text-2xl font-bold leading-none text-center">{{ content.title }}</h2>

            <div class="grid gap-y-10 max-w-xs mx-auto mt-10 md:grid-cols-2 md:gap-14 md:max-w-full lg:grid-cols-4 lg:gap-12 xl:gap-x-12">
                <div
                    v-for="(item, i) in content.list"
                    :key="i"
                    class="bg-white select-none group relative">

                    <a :href="item.link" class="h-full">
                        <div class="overflow-hidden">
                            <img :src="item.img" alt="picture" class="w-full h-auto inline-block transition-all duration-500 group-hover:scale-110"/>
                        </div>

                        <div class="px-6 pb-6 pt-0">
                            <div class="text-primary leading-none font-bold mt-4">{{ item.subtitle }}</div>
                            <div v-html="item.title" class="text-sm leading-tight mt-1 overflow-hidden text-ellipsis"/>
                        </div>

                        <div class="subnote leading-tight h-7 sm:h-10 md:h-12 xl:h-9 2xl:h-7 mt-4 px-2">{{ item.subnote }}</div>

                        <div
                            class="w-full h-2 absolute bottom-0"
                            :class="`bg-brand-${item.color}`"></div>
                    </a>

                </div>
            </div>

        </div>
    </section>
</template>


<style scoped>
.wrapper{
    @apply bg-primary bg-opacity-10 px-5 pt-10 pb-20 relative
    md:pt-14 lg:px-0 lg:pt-16;
}
.subnote{
    font-size: 0.55rem;
}
</style>
