<script setup>
import { productsStore } from '@/store/productsStore.js'
import { useModal } from '@/store/modalStore.js'
import { storeToRefs } from 'pinia'
import ProductsLayout from '@/Layouts/ProductsLayout.vue'

import Navigation from '@/Components/Products/TabsNavigation.vue'
import Dormi from '@/Components/Products/Dormi.vue'
import Aquoral from '@/Components/Products/Aquoral.vue'
import Triptomax from '@/Components/Products/Triptomax.vue'
import Mosquitos from '@/Components/Products/Mosquitos.vue'
import Piel from '@/Components/Products/Piel.vue'
import NatColest from '@/Components/Products/NatColest.vue'

const prodStore = productsStore()
const { current_tab } = storeToRefs(prodStore)

</script>



<template>
<ProductsLayout>

	<div class="container mx-auto px-5">
		<Navigation navigationMethod="tabs" />
	</div>

	<Dormi v-if="'Dormi' === current_tab" />
	<Aquoral v-if="'Aquoral' === current_tab" />
	<Triptomax v-if="'Triptomax' === current_tab" />
	<Mosquitos v-if="'Mosquitos' === current_tab" />
    <NatColest v-if="'NatColest' === current_tab" />
	<Piel v-if="'Piel' === current_tab" />
</ProductsLayout>
</template>



<style lang="scss" scoped>


.intro{
	@apply bg-white py-10;
}
</style>
