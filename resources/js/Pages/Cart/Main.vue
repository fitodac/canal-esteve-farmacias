<script setup>
import { ref, computed } from 'vue'
import { useForm, Link } from '@inertiajs/inertia-vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue'

import Layout from '@/Layouts/PageLayout.vue'
import Header from '@/Components/Cart/Header.vue'
import BreadCrumbs from '@/Components/Cart/BreadCrumbs.vue'
import Success from '@/Components/Cart/Success.vue'

const form = useForm({
	qty: '1',
	total: 10,
});

const products = [
	{ title: 'Tarjeta regalo online Click&Gift 10 Euros' }
]

/** Spinneeeer! Hamburguejas al vapor... */
const handleSpinnerChange = type => {
	switch(type){
		case '+':
            form.qty++;
            form.total += 10
            break;
		case '-':
			if(form.qty > 1) {
                form.qty--
                form.total -= 10
            }
			break;
	}
}
/******* Spinner ends */


let success = ref(false)

const submit = () => {
	form.post(route('cart.store'), {
		onSuccess: () => {
			success.value = true;
		},
		onError: () => {
			success.value = false;
		}
	});
}

const step = computed(() => !success.value ? 0 : 1)
</script>


<template>
	<Layout>
		<Header/>

		<div class="container max-w-5xl px-5 mx-auto xl:px-0">
			<BreadCrumbs :bc_step="step"/>
		</div>


		<section v-if="!success">
			<div class="container max-w-5xl px-5 mx-auto xl:px-0">
				<div
					v-for="(item, i) in products"
					:key="i"
					class="mt-10">

					<div v-if="!i">
						<div class="table-head">
							<div class="table-head-th col-span-6">Producto</div>
							<div class="table-head-th col-span-2">Precio</div>
							<div class="table-head-th col-span-2">Cantidad</div>
							<div class="table-head-th col-span-2">Subtotal</div>
						</div>

						<div class="table-row">
							<div class="table-td md:col-span-6">
								<div class="table-td-title">Producto</div>

								<div class="grid gap-3 md:flex md:gap-5">
									<img
										class="w-24"
										src="img/giftcard.webp"
										alt="Tarjeta de regalo">

									<div class="text-lg leading-tight md:pt-3">{{ item.title }}</div>
								</div>

							</div>

							<div class="table-td md:col-span-2">
								<div class="table-td-title">Precio</div>
								<p class="text-primary font-bold md:pt-3">10 puntos</p>
							</div>
							<div class="table-td md:col-span-2">
								<div class="table-td-title">Cantidad</div>
								<div class="md:pt-3">
									<div class="spinner">
										<button @click="handleSpinnerChange('-')" :disabled="form.qty === 1">-</button>
										<div>{{ form.qty }}</div>
										<button @click="handleSpinnerChange('+')">+</button>
									</div>
								</div>
							</div>
							<div class="table-td md:col-span-2">
								<div class="table-td-title">Subtotal</div>
								<p class="text-primary font-bold md:pt-3">{{ `${form.total} puntos` }}</p>
							</div>
						</div>
					</div>
				</div>


				<div class="mt-8 mb-14 flex justify-center">
					<Link
						:href="route('sellout.index')"
						class="btn-outline">
						← Seguir participando
					</Link>
				</div>
			</div>




			<section class="bg-primary-100 pt-16 pb-14">
				<div class="container max-w-5xl px-5 mx-auto xl:px-0">

					<h3
						class="text-2xl font-bold leading-none text-center
										md:text-3xl">
						Total del carrito
					</h3>

					<form
						@submit.prevent="submit"
						class="max-w-lg mx-auto mt-8">

						<div class="grid">
							<div class="cart-row">
								<div class="font-medium">Subtotal</div>
								<div class="text-primary-500 font-bold">{{ `${form.total} puntos` }}</div>
							</div>

							<div class="cart-row">
								<div class="font-bold">Total</div>
								<div class="text-primary-500 font-bold">{{ `${form.total} puntos` }}</div>
							</div>
						</div>

						<div class="mt-6">
							<div v-if="$page.props.errors && $page.props.errors[0]"
								class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
								<span class="font-medium">
									{{ $page.props.errors[0] }}
								</span>
							</div>

							<PrimaryButton
								class="w-full"
								:class="{ 'opacity-25': form.processing }"
								:disabled="form.processing">
								<div class="text-sm tracking-wide font-bold px-10 py-1 lg:py-2.5">Finalizar compra</div>
							</PrimaryButton>
						</div>
					</form>
				</div>
			</section>
		</section>

		<Success v-else/>

	</Layout>
</template>



<style scoped>
.table-head{
	@apply border-b-2 border-gray-600 hidden grid-cols-12 select-none md:grid;
}

.table-head-th{ @apply font-bold px-5 py-3; }

.table-row{
	@apply border-b border-dashed border-gray-300 grid gap-y-3 md:grid-cols-12;
}

.table-td{
	@apply border-b border-gray-300 leading-tight pb-4 select-none
					md:border-none md:px-5 md:py-3;
}

.table-td-title{
	@apply text-primary text-xs font-bold leading-tight pb-0 md:hidden;
}


.spinner{ @apply flex; }

.spinner button:not(:disabled){
	@apply bg-primary-500 bg-opacity-20 w-6 h-8
						transition-all hover:bg-primary hover:text-white;
}

.spinner button:disabled{
	@apply bg-primary-500 bg-opacity-20 w-6 h-8 opacity-50;
}

.spinner button:first-of-type{ @apply rounded-l-xl; }

.spinner button:last-of-type{ @apply rounded-r-xl; }

.spinner div{
	@apply text-primary-500 w-12 grid place-content-center;
}


.btn-outline{
	@apply bg-white border border-primary-500 text-primary-500
						font-bold leading-none px-6 py-2.5 transition-all rounded-full
						hover:bg-primary-500 hover:text-white;
}


.cart-row{
	@apply px-4 py-3 flex justify-between;
}

.cart-row + .cart-row{
	@apply border-t-2 border-gray-500;
}
</style>
