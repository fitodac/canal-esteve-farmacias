<script setup>
import { ref, computed, onMounted } from 'vue'
import { useStore } from '@/store/mainStore.js'
import { storeToRefs } from 'pinia'

import ProfileLayout from '@/Layouts/ProfileLayout.vue'
import { Link } from '@inertiajs/inertia-vue3'
import Sidebar from '@/Components/Profile/Sidebar.vue'
import TextInput from '@/Components/Form/TextInput.vue'


const store = useStore()

const logout = () => {
	store.deleteUser()
}

</script>

<template>
<ProfileLayout>
	<div class="container px-5 pt-2 pb-16 mx-auto
								md:pt-10 md:max-w-4xl
								lg:px-0 lg:max-w-5xl">

		<div class="grid gap-5 md:gap-8 md:grid-cols-12">

			<div class="md:col-span-10 md:pl-10 lg:pl-20">
				<section class="max-w-xl">
					<h3 class="text-xl font-bold leading-none sm:text-2xl md:text-3xl">
						¿Estás seguro que quieres salir?
					</h3>

					<div class="mt-7">
						<Link :href="route('logout')" method="post" class="inline-block">
							<button
								class="bg-primary text-white text-sm font-bold
													leading-none px-8 py-3 rounded-full
													md:w-full"
								@click="logout">
								Confirmar y salir
							</button>
						</Link>
					</div>

				</section>
			</div>

		</div>

	</div>
</ProfileLayout>
</template>
