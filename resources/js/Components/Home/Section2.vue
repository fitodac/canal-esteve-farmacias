<script setup>
import { section2 as content } from '@/StaticContent/home.js'
import { productsStore } from '@/store/productsStore.js'
import { Link } from '@inertiajs/inertia-vue3';

const prodStore = productsStore()

const setTab = (tab) => {
    prodStore.toggleTab(tab)
}
</script>



<template>
    <section class="wrapper">
        <div class="container mx-auto">

            <h2 class="text-2xl font-bold leading-none text-center">{{ content.title }}</h2>

            <div class="grid gap-y-10 max-w-xs mx-auto mt-12 md:grid-cols-2 md:gap-x-4 md:max-w-full lg:grid-cols-3 xl:gap-x-12">
                <div
                    v-for="(item, i) in content.list"
                    :key="i"
                    class="text-center select-none">

                    <img :src="item.logo" alt="logo" class="w-44 h-auto inline-block"/>
                    <div class="text-xl font-bold">{{ item.name }}</div>
                    <div class="text-xl leading-none lg:h-16" v-html="item.slogan"></div>
                    <div class="text-sm leading-tight h-6 mt-4"
                         :class="{'subnote': item.name==='NatColest'}"
                    >{{ item.note }}</div>

                    <div class="mt-5">
                        <Link :href="route('products')" @click="setTab(item.tab)" class="btn-primary w-32 inline-block rounded-full">{{ item.btn.text }}</Link>
                    </div>
                </div>
            </div>

        </div>
    </section>
</template>



<style scoped>
.wrapper{
    @apply px-5 pt-20 pb-32 lg:pb-40;
}
.subnote{
    font-size: .55rem;
}
</style>
