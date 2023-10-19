<script setup>
import { reactive } from 'vue'
import Layout from '@/Layouts/PageLayout.vue'
import Header from '@/Components/PageHeader.vue'
import Girl from '@/Components/Faqs/QuestionGirl.vue'

import faq_data from '@/StaticContent/faq.js'

const data = reactive(faq_data)


const show_faq = i => {
	data.forEach(e => e.active = false)
	data[i].active = true
}
</script>


<template>
<Layout>
	<Header page="faq" />


	<div class="container px-5 mx-auto md:max-w-2xl xl:px-0">

		<div class="mt-14">
			<Girl />
		</div>
	
	
		<div class="grid gap-y-1">
			<div 
				v-for="(item, i) in data" 
				:key="i">

				<div 
					class="bg-primary-100 text-primary-500 leading-none 
										font-bold pl-8 pr-4 py-5 flex gap-x-4 rounded-xl 
										cursor-pointer transition-all
										md:text-[16px] md:leading-tight md:pl-10 md:pr-5 
										hover:bg-primary-400 hover:text-white"
										@click="show_faq(i)">
					
					<div class="flex-1">
						<p v-for="(q, ii) in item.q" :key="ii" v-html="q" />
					</div>
					
					<img 
						class="w-4 md:w-5"
						src="/img/angle-down.svg" 
						alt="icono que indica si la información está visible o no" />

				</div>


				<div 
					v-if="item.active"
					class="leading-tight px-8 pt-7 pb-14">
					<p 
						v-for="(p, i) in item.a" 
						:key="i" 
						v-html="p"
						:class="{'mt-5': i}" />
				</div>

			</div>
		</div>

	</div>


	<div class="h-20"></div>

</Layout>
</template>