<script setup>
import { reactive } from 'vue'
import { resourcesStore } from '@/store/resourcesStore.js'
import { storeToRefs } from 'pinia'

import Dropdown from '@/Components/Form/Dropdown.vue'
import Option from '@/Components/Form/DropdownOption.vue'

const store = resourcesStore()
// const { current_tab } = storeToRefs(prodStore)


const { filters } = defineProps({ filters: Object })

const orig_filter_data = {
	category: 'Categoría',
	product: 'Producto',
	content_type: 'Tipo de contenido'
}

const filter_data = reactive({...orig_filter_data})

const categories = filters.categories.map(item => ({ label: item.name, value: item.id}))
const products = filters.products.map(item => ({ label: item.name, value: item.id}))
const content_type = filters.content_type.map(item => ({ label: item.type, value: item.id}))
</script>



<template>
<div class="px-5 py-3 md:py-5">
	<div class="container mx-auto">
		<div class="grid gap-1 md:gap-5 lg:grid-cols-4">

			<div>
				<Dropdown>
					<template #trigger>
						<span class="text-sm leading-none">{{ store.filterCategoryName }}</span>
					</template>

					<template #content>
						<Option
							v-for="opt in categories"
							:key="opt.value"
							@click="store.filterByCategory(opt.value)">
							{{ opt.label }}
						</Option>
					</template>
				</Dropdown>
			</div>


			<div>
				<Dropdown>
					<template #trigger>
						<span class="text-sm leading-none">{{ store.filterProductName }}</span>
					</template>

					<template #content>
						<Option
							v-for="opt in products"
							:key="opt.value"
							@click="store.filterByProduct(opt.value)">
							{{ opt.label }}
						</Option>
					</template>
				</Dropdown>
			</div>


			<div>
				<Dropdown>
					<template #trigger>
						<span class="text-sm leading-none">{{ store.filterContentTypeName }}</span>
					</template>

					<template #content>
						<Option
							v-for="opt in content_type"
							:key="opt.value"
							@click="store.filterByContentType(opt.value)">
							{{ opt.label }}
						</Option>
					</template>
				</Dropdown>
			</div>

			<div class="self-center justify-self-end pt-3 md:pt-0">
				<button
					class="text-primary font-bold leading-none"
					@click="store.resetFilters">
					Borrar filtros
				</button>
			</div>

		</div>
	</div>
</div>
</template>
