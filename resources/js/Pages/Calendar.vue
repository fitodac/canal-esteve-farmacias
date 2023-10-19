<script setup>
import { Link } from '@inertiajs/inertia-vue3'

import Layout from '@/Layouts/PageLayout.vue'
import Header from '@/Components/PageHeader.vue'
</script>


<template>
<Layout>
	<Header page="calendar" />


	<div class="pb-10">
		<a 
			href="/img/calendar.webp"
			target="_blank">
			<img 
				src="/img/calendar.webp" 
				alt="Calendario"
				class="w-full">
		</a>
	</div>

</Layout>
</template>