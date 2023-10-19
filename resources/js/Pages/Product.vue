<script setup>
import {ref, defineAsyncComponent} from 'vue'
import {usePage} from '@inertiajs/inertia-vue3'
import {productsStore} from '@/store/productsStore.js'

import ProductsLayout from '@/Layouts/ProductsLayout.vue'

import Navigation from '@/Components/Products/TabsNavigation.vue'

const prodStore = productsStore()

const {
    category,
    product
} = usePage().props.value


const Content = defineAsyncComponent(async () => {

    const cat = ({
        dormidina: 'Dormidina',
        aquoral: 'Aquoral',
        triptomax: 'TriptoMax',
        afterbite: 'AfterBite',
        repelbite: 'RepelBite',
        natcolest: 'NatColest',
        piel: 'Piel'
    })[category]

    // case when there is no content for both
    if (category === 'natcolest') {
        return import(/* @vite-ignore */ `../Components/Products/NatColest.vue`)
    }

    return import(`../Components/Products/${cat}/${product}.vue`)
})

const currentTab = ref(({
    dormidina: 'Dormi',
    aquoral: 'Aquoral',
    triptomax: 'Triptomax',
    afterbite: 'Mosquitos',
    repelbite: 'Mosquitos',
    natcolest: 'NatColest',
    piel: 'Piel'
})[category])

prodStore.toggleTab(currentTab.value)

</script>


<template>
    <ProductsLayout>

        <section class="wrapper">
            <Navigation navigationMethod="route" />

            <div class="bg-white h-16"/>
        </section>

        <Content />

    </ProductsLayout>
</template>
