<script setup>
import { ref, computed } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'
import { resourcesStore } from '@/store/resourcesStore.js'
import { storeToRefs } from 'pinia'

import PageLayout from '@/Layouts/PageLayout.vue'
import Header from '@/Components/Resources/Header.vue'
import Filter from '@/Components/Resources/Filter.vue'

const store = resourcesStore()
const { current_page } = storeToRefs(store)
const { filters, content } = usePage().props.value


store.setContent(content)
store.setParams(filters)

const pages = computed(() => store.pages)
</script>


<template>
<PageLayout>
	<Header />
	<Filter :filters="filters"/>


	<div class="bg-gray-light px-5 pt-10 pb-12">
		<div class="container mx-auto">
			<div
				class="w-full max-w-sm mx-auto grid gap-y-8 place-content-center
								md:max-w-full md:grid-cols-2 md:gap-x-6 md:gap-y-8
								lg:grid-cols-3 lg:gap-x-7 lg:gap-y-10">

				<div
					v-for="p in pages[store.currentPage]"
					:key="p.id">

					<figure class="h-40">
						<div class="bg-gray-100 w-full h-full flex items-center justify-center">
							<img
								v-if="p.image"
								:src="p.image"
								alt="imagen de producto"
								class="w-full h-full object-cover"/>

							<img
								v-else
								src="/img/no-picture.svg"
								alt="no hay imagen para este producto">
						</div>
					</figure>


					<div
						class="bg-white border-b-4 px-5 py-3"
						:class="[`border-brand-${p.color}`]">

						<div class="grid gap-y-1">
							<h3
							class="font-bold leading-none"
							:class="[`text-brand-${p.color}`]">{{ p.name }}</h3>

							<h3 class="leading-none">Tipo de contenido: {{ p.content_type.name }}</h3>
							<h3 class="leading-none">Categoría: {{ p.category.name }}</h3>
						</div>

						<div class="mt-4 flex gap-x-3">
							<a
								:href="p.link"
								target="_blank"
								class="w-12 h-7 flex justify-center items-center rounded-lg hover:opacity-80"
								:class="[`bg-brand-${p.color}`]">
								<img src="/img/icon-eye.svg?v1" alt="ver" class="h-4">
							</a>

							<a
								:href="p.link"
								:download="p.filename"
								target="_blank"
								class="w-12 h-7 flex justify-center items-center rounded-lg hover:opacity-80"
								:class="[`bg-brand-${p.color}`]">
								<img src="/img/icon-download.svg?v1" alt="descargar" class="h-4">
							</a>
						</div>
					</div>

				</div>

			</div>
		</div>


		<div class="flex justify-center mt-10">
			<div class="flex justify-center items-center gap-x-0.5">
				<button
					:disabled="current_page < 1"
					@click="store.setCurrentPage(current_page - 1)"
					class="pager">
					<span>&lt;&lt;</span>
				</button>

				<button
					v-for="(page, i) in pages"
					:key="i"
					:class="{'active': i === current_page}"
					@click="store.setCurrentPage(i)"
					class="pager">
					{{ i+1 }}
				</button>

				<button
					:disabled="current_page === (pages.length - 1)"
					@click="store.setCurrentPage(current_page + 1)"
					class="pager">
					<span>&gt;&gt;</span>
				</button>
			</div>
		</div>

	</div>
</PageLayout>
</template>



<style scoped>
.pager{
	@apply font-semibold leading-none tracking-tight w-7 h-7
						flex justify-center items-center cursor-pointer
						rounded-md select-none;
}

.pager.active{
	@apply bg-primary text-white;
}

.pager:not(:disabled):not(.active){
	@apply hover:bg-gray-200 hover:text-primary;
}

.pager:disabled{
	@apply opacity-40 cursor-default;
}
</style>
