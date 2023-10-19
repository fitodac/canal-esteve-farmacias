<script setup>
import { ref } from 'vue'
import { productsStore } from '@/store/productsStore.js'
import { storeToRefs } from 'pinia'

import { Link } from '@inertiajs/inertia-vue3'

const store = productsStore()
const { current_tab } = storeToRefs(store)

const {
	navigationMethod
} = defineProps({
	/*
		* Esta variable define cómo se usará este
		* componente, ya sea como tabs o como
		* links a otras páginas.
	 */
	navigationMethod: String // opciones: tabs / route
})


const clickAction = val => store.toggleTab(val)

const tabs = [
	{
		text: 'Dormi',
		class_name: 'tab-item-dormi',
		img: '/img/logo-dormidina.webp',
		img_active: '/img/logo-dormidina-white.webp'
	},
	{
		text: 'Aquoral',
		class_name: 'tab-item-aquoral',
		img: '/img/logo-aquoral.webp',
		img_active: '/img/logo-aquoral.webp'
	},
	{
		text: 'Triptomax',
		class_name: 'tab-item-triptomax',
		img: '/img/logo-tripto-max.webp',
		img_active: '/img/logo-tripto-max-white.webp'
	},
    {
        text: 'NatColest',
        class_name: 'tab-item-natcolest',
        img: '/img/logo-natcolest.webp',
        img_active: '/img/logo-natcolest-white.webp'
    },
	{
		text: 'Mosquitos',
		class_name: 'tab-item-mosquitos',
		img: '/img/logo-afterbite.webp',
		img_active: '/img/logo-afterbite-white.webp'
	},
    {
        text: 'Piel',
        class_name: 'tab-item-calmiox',
        img: '/img/logo-calmiox.webp',
        img_active: '/img/logo-calmiox-white.webp'
    },
]
</script>


<template>
<div>

	<div
		v-if="'tabs' === navigationMethod"
		class="tabs">

		<div
			v-for="(tab, i) in tabs"
			:key="i"
			class="tab-item"
			:class="[tab.class_name, {'tab-item-active': (tab.text === current_tab)}]"
			@click="clickAction(tab.text)">

			<span>{{ tab.text }}</span>
			<img v-if="tab.text !== current_tab" :src="tab.img" :alt="tab.text" />
			<img v-if="tab.text === current_tab" :src="tab.img_active" :alt="tab.text" />

		</div>

	</div>



	<div
		v-if="'route' === navigationMethod"
		class="tabs">

		<Link
			v-for="(tab, i) in tabs"
			:key="i"
			class="tab-item"
			:class="[tab.class_name, {'tab-item-active': (tab.text === current_tab)}]"
			@click="clickAction(tab.text)"
			:href="route('products')">

			<span>{{ tab.text }}</span>
			<img v-if="tab.text !== current_tab" :src="tab.img" :alt="tab.text" />
			<img v-if="tab.text === current_tab" :src="tab.img_active" :alt="tab.text" />

		</Link>
	</div>

</div>
</template>



<style lang="scss" scoped>
.tabs{
	@apply mx-auto mt-8 mb-4 grid grid-cols-2 gap-2 relative
					md:grid-cols-6 md:mt-10 md:-mb-16 lg:max-w-5xl;

	.tab-item{
		@apply bg-white text-center transition-all cursor-pointer
							p-3 select-none;

		&:hover{
			background: #EBF2F4;
		}

		span{
			@apply text-sm leading-none;
		}

		img{
			@apply w-10/12 mx-auto mt-2 mb-5 pointer-events-none md:mt-4 md:mb-8 lg:w-full;
		}
	}


	.tab-item-active{
		@apply text-white;
	}

	.tab-item-dormi.tab-item-active{
		@apply bg-brand-blue;
	}

	.tab-item-aquoral.tab-item-active{
		@apply bg-brand-sky;
	}

	.tab-item-triptomax.tab-item-active{
		@apply bg-brand-purple;
	}

    .tab-item-natcolest.tab-item-active{
        @apply bg-brand-green-dark;
    }

	.tab-item-mosquitos.tab-item-active{
		@apply bg-brand-magenta;
	}

    .tab-item-calmiox.tab-item-active{
        @apply bg-brand-blue-light;
    }
}
</style>
