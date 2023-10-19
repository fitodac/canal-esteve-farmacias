<script setup>
import { section1 as content } from '@/StaticContent/home.js'
import { useModal } from "@/store/modalStore.js";
import { useStore } from '@/store/mainStore.js'
import { storeToRefs } from 'pinia'
import { onMounted } from 'vue';

const modal = useModal();
const store = useStore()
const { user } = storeToRefs(store)

const handleOpenModal = (bypass, e) => {
    if (!user.value) {
        e.preventDefault();
        modal.open();
    }

    if (bypass) {
        if (user.value && !user.value.pharmacy_id) {
            e.preventDefault();
            modal.open();
        }
    }
}

onMounted( () => {
    window.tarteaucitron.triggerJobsAfterAjaxCall()
})
</script>



<template>
<section class="wrapper">
	<div class="container mx-auto">
		<div class="text-center md:px-32 xl:px-40">
			<h2 class="title">{{ content.title }}</h2>
			<h3 class="intro">{{ content.intro }}</h3>
		</div>

		<div class="grid gap-y-10 mt-12 md:grid-cols-2 md:gap-x-8 lg:grid-cols-4">
			<div
				v-for="(item, i) in content.list"
				:key="i"
				class="text-center select-none">

				<img :src="item.img" alt="circle image" class="w-32 h-auto inline-block">
				<div class="leading-tight h-16 mt-2 lg:h-20 lg:mt-3" v-html="item.description" />

				<div class="mt-7" v-if="item.btn.link">
					<a :href="item.btn.link"
						v-if="item.btn.link === 'biblioteca-esteve'"
						@click="handleOpenModal('',$event)"
						class="btn-primary w-40 inline-block rounded-full">{{ item.btn.text }}</a>

					<a :href="item.btn.link"
						v-if="item.btn.link === 'formacion'"
						@click="handleOpenModal(true, $event)"
						class="btn-primary w-40 inline-block rounded-full">{{ item.btn.text }}</a>

                    <a :href="item.btn.link"
						v-if="item.btn.link === 'retos'"
						@click="handleOpenModal(true, $event)"
						class="btn-primary w-40 inline-block rounded-full">{{ item.btn.text }}</a>

					<a :href="item.btn.link"
						v-if="item.btn.link === 'productos'"
						class="btn-primary w-40 inline-block rounded-full">{{ item.btn.text }}</a>
				</div>

				<div class="mt-7" v-else>
					<button
						class="btn-primary w-40 inline-block rounded-full"
						disabled>
						{{ item.btn.text }}
					</button>
				</div>

			</div>

		</div>
	</div>
</section>

<div class="media-box">
    <div class="youtube_player w-full h-full"
        videoID="uqz8mdIrx9I"
        theme="light"
        width="100%"
        height="100%"
        rel="0"
        controls="1"
        showinfo="0"
        autoplay="0"
        mute="0"
        loop="0"
        loading="1"
        allowfullscreen="1"
    >
    </div>
</div>
</template>



<style scoped>
.wrapper{
	@apply bg-primary bg-opacity-10 px-5 pt-10 pb-40 relative
						md:pt-14 lg:px-0 lg:pt-16;
}
.title{
	@apply text-primary text-2xl font-medium leading-none md:text-3xl;
}
.intro{
	@apply leading-tight mt-5;
}

.media-box{
	@apply bg-slate-300 w-11/12 max-w-3xl h-[32] md:h-[48] xl:h-[96] 2xl:h-[96] aspect-video -mt-20 block mx-auto relative
						md:w-10/12 lg:w-8/12 z-0;
}
.decoration{
	@apply opacity-10 -left-[60%] -top-1/2 absolute;
}
</style>
