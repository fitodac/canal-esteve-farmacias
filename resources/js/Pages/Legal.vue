<script setup>
import Layout from '@/Layouts/LoginRegisterLayout.vue'
import Content from '@/Components/LegalsContent.vue'
import Footer from '@/Components/Footer.vue'

import {
	conditions,
	societies
} from '@/StaticContent/legal.js'
</script>



<template>
<Layout>
	<div class="text-center">
		<h2 class="text-primary-500 text-3xl font-bold leading-none">Aviso Legal</h2>
	</div>


	<div class="container mx-auto">
		<Content :data="conditions" />
		<Content :data="societies" />
	</div>

</Layout>

<Footer/>
</template>