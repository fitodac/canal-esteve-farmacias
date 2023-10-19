<script setup>
import { ref, watch } from "vue";
import { Link } from '@inertiajs/inertia-vue3';
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    list: Object,
    qty: String,
    search_auxiliar: String
});

let selected = ref(props.qty)
let search_auxiliar = ref(props.search_auxiliar);

watch(selected, value => {
    Inertia.get('/mi-cuenta', { qty_participants: value }, {
        preserveState: true,
        replace: true
    });
});

watch(search_auxiliar, value => {
    Inertia.get('/mi-cuenta', { search_auxiliar: value }, {
        preserveState: true,
        replace: true
    });
});
</script>


<template>
<div class="table">

	<div class="table-tob-bar">

		<div class="table-selector">
			<span class="select-none">Mostrar</span>

			<select v-model="selected">
				<option value="10">10</option>
				<option value="20">20</option>
				<option value="30">30</option>
				<option value="40">40</option>
			</select>

			<span class="select-none">registros</span>
        </div>

        <div class="table-search">
            <input v-model="search_auxiliar" type="search" placeholder="Buscar..."/>
        </div>
	</div>


	<div class="mt-6">
		<div class="table-header">
			<div class="table-header--li">Email</div>
			<div class="table-header--li">Nombre</div>
		</div>

		<div class="table-body" v-if="props.list">
			<div
                v-for="(li, idx) in props.list.data"
				:key="idx"
				class="table-body--row"
				:class="[idx % 2 ? 'odd' : 'even']">
				<div class="table-body--li">
					<div class="table-body--li-indicator">Email</div>
                    <div>{{ li.email }}</div>
				</div>
				<div class="table-body--li">
					<div class="table-body--li-indicator">Nombre</div>
                    <div>{{ li.name }}</div>
				</div>
			</div>
		</div>

        <div class="table-body table-body--row even" v-if="!props.list">
            <div class="table-body--li">No se encuentran registros</div>
        </div>
	</div>


    <div v-if="props.list && props.list.links && props.list.links.length > 3">
        <div class="pagination">
            <template v-for="(link, key) in props.list.links" :key="key">
                <button v-if="link.url === null" v-html="link.label"/>

                <button v-else-if="link.active"
                    v-html="link.label" />

                <Link v-else :href="link.url" v-html="link.label"/>
            </template>
        </div>
    </div>
</div>
</template>


<style scoped>
.table{
	@apply w-full;
}


.table-tob-bar{
	@apply grid gap-y-4 md:flex md:justify-between;
}


.table-selector{
	@apply flex items-center gap-x-2;
}

.table-selector select{
	@apply bg-gray-200 border border-gray-200 text-sm leading-none w-16 px-2 py-2 rounded-lg;
}



.table-search input{
	@apply bg-primary bg-opacity-10 border-none leading-none
						w-full px-4 pt-2 pb-2.5
						md:w-auto
						placeholder:font-medium
						focus:ring-primary focus:shadow-primary;
}


.table-header{
	@apply bg-primary-500 hidden md:flex;
}

.table-header--li{
	@apply text-white text-sm leading-none font-bold px-4 py-3 flex-1;
}


.table-body{}

.table-body--row{
	@apply py-2 md:py-0 md:flex;
}

.table-body--row.even{
	@apply bg-primary bg-opacity-5;
}

.table-body--li{
	@apply text-sm leading-none px-4 py-1.5 flex gap-x-5 md:py-3 md:flex-1;
}

.table-body--li-indicator{
	@apply text-primary-500 text-xs font-bold leading-none w-16 select-none md:hidden;
}


.pagination{
	@apply mt-6 flex gap-x-2;
}

.pagination button{
	@apply font-medium select-none hover:text-primary;
}
</style>
