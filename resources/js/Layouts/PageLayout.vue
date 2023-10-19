<script setup>
import Header from '@/Components/Header.vue'
import Footer from '@/Components/Footer.vue'
import Modal from "@/Components/Modal.vue";
</script>


<template>
<div>
	<Header />
	<slot />
	<Footer />

    <Teleport to="body">
        <Modal />
    </Teleport>
</div>
</template>
