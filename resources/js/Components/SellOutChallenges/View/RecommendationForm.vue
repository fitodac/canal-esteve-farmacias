<script setup>
import { ref, onMounted, computed } from 'vue'
import VueDatePicker from '@vuepic/vue-datepicker'
import '@vuepic/vue-datepicker/dist/main.css'
import { useForm, usePage } from '@inertiajs/inertia-vue3'

import Checkbox from '@/Components/Form/Checkbox.vue'
import RadioButton from '@/Components/Form/RadioButton.vue'
import FileUploader from '@/Components/SellOutChallenges/View/FileUploader.vue'
import Button from '@/Components/SellOutChallenges/View/Button.vue'
import InputError from '@/Components/Form/InputError.vue'

const emit = defineEmits(['formSent'])
const { challenge } = defineProps({ challenge: Object })
const participation = JSON.parse(challenge.participation);

let products = participation.map(product =>
    ({
        name: product.name,
        slug: product.name.toLowerCase().replace(/ /g, '_').replace(/[^\w-]+/g, ''),
        qty: 0
    })
)

onMounted(() => {

	steps.value.querySelectorAll('.step').forEach((el, idx) => {
		if( el.querySelector('.step-number') ) el.querySelector('.step-number').remove()
		const div = document.createElement('div')
		div.innerText = ++idx
		div.className = 'step-number'
		el.prepend(div)
	})

})

const type = ref('ticket')
const steps = ref(null)
const acceptance = ref(false)
const uploader_title = computed(() => type.value === 'ticket' ? `Subida de Ticket` : `Subida de Listado de Ventas`)

const form = useForm({
	challenge_id: challenge.id,
	challenge_type: challenge.challenge_type,
	score: challenge.score,
	upload_type: type,
	date_start: new Date(),
	date_end: new Date(),
	products: products,
	file: null,
	mailing: usePage().props.value.auth.user.mailing === 'S' ? true : false
})

const setFileData = event => form.file = event

const submitForm = () => {
	form.post(route('sellout.store'), {
		onSuccess: () => {
			emit('formSent')
		},
		onError: () => {
			console.debug(form.errors?.general)
		}
	});
}
</script>


<template>
<form @submit.prevent="submitForm">
	<div class="steps" ref="steps">

		<div class="step">
			<div class="step-content">
				<div class="title">
					Por favor indica si quieres enviar un
					ticket o listado de ventas.
				</div>

				<div class="content">
					<div class="flex gap-x-8">
						<label 
							@click="type = 'ticket'" 
							class="leading-tight mt-3 flex gap-x-3 cursor-pointer">
							<RadioButton 
								value="ticket" 
								name="type"
								:checked="type === 'ticket'" />
							<span>Ticket</span>
						</label>

						<label 
							@click="type = 'list'" 
							class="leading-tight mt-3 flex gap-x-3 cursor-pointer">
							<RadioButton 
								value="list" 
								name="type" 
								:checked="type === 'list'"/>
							<span>Listado de ventas</span>
						</label>

						<InputError class="mt-2" :message="form.errors.upload_type" />
					</div>
				</div>
			</div>
		</div>


		<div class="step">
			<div class="step-content">
				<div class="title">
					Antes de continuar es necesario que aceptes las
					Bases Legales y la Política de Privacidad.
					Puedes leerlas aquí:
				</div>

				<div class="content">
					<div>
                        <a :href="challenge.legal" target="_blank" class="underline hover:text-primary">Bases Legales</a>
                        <span class="px-2">|</span>
                        <a href="https://www.esteveagora.com/es/privacidad" target="_blank" class="underline hover:text-primary">Política de privacidad</a>
					</div>

					<label class="leading-tight mt-3 flex gap-x-3 cursor-pointer" v-if="$page.props.auth.user.mailing !== 'S'">
						<Checkbox name="mailing" v-model:checked="form.mailing"/>
						<span class="max-w-md">Acepto recibir información u ofertas promocionales de ESTEVE PHARMACEUTICALS S.A.</span>
					</label>
                    <label class="leading-tight mt-3 flex gap-x-3 cursor-pointer">
                        <Checkbox v-model:checked="acceptance"/>
                        <span class="max-w-md">Acepto las bases legales y la política de privacidad</span>
                    </label>
				</div>
			</div>
		</div>


		<div class="step">
			<div class="step-content">
				<div class="title">
                    <p v-if="'ticket' === type">Por favor indica la fecha de <span class="underline">tu ticket</span></p>
                    <p v-if="'list' === type">Por favor indica el rango de fechas de <span class="underline">tu listado de ventas</span></p>
				</div>

				<div class="content">
					<div
						class="max-w-lg grid gap-3 mt-4 sm:grid-cols-2 sm:gap-8"
						:class="{'opacity-50 pointer-events-none': !acceptance}">

						<div class="grid gap-1 md:grid-cols-12">
							<div
								v-if="'list' === type"
								class="flex items-center select-none md:col-span-3">Inicio:</div>
							<div class="md:col-span-9">
								<VueDatePicker
									id="date_from"
									locale="es"
									class="mt-1 block w-full"
									v-model="form.date_start"
									placeholder="Fecha desde"
									cancelText="Cancelar"
									selectText="Aceptar"
									month-name-format="long"
									format="dd/MM/yyyy"
									:enable-time-picker="false" auto-apply
								/>
							</div>

                            <InputError class="mt-2" :message="form.errors.date_start" />
						</div>

						<div
							v-if="'list' === type"
							class="grid gap-1 md:grid-cols-12">
							<div class="flex items-center select-none md:col-span-3">Fin:</div>
							<div class="md:col-span-9">
								<VueDatePicker
									id="date_from"
									locale="es"
									class="mt-1 block w-full"
									v-model="form.date_end"
									placeholder="Fecha desde"
									cancelText="Cancelar"
									selectText="Aceptar"
									month-name-format="long"
									format="dd/MM/yyyy"
									:enable-time-picker="false" auto-apply
								/>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>


		<div class="step">
			<div class="step-content">
				<div class="title">
					Indica las unidades vendidas de cada producto.
				</div>

				<div class="content">
					<div>Recuerda que deben estar incluídas en
                        <span v-if="'ticket' === type" class="underline">tu ticket</span>
    				    <span v-if="'list' === type" class="underline">tu listado de ventas</span>
                    </div>

					<div
						class="grid gap-y-3 mt-8"
						:class="{'opacity-50 pointer-events-none': !acceptance}">
						<div
							v-for="(item, idx) in products"
							:key="idx"
							class="max-w-md grid grid-cols-12 gap-5 items-center">

							<div
								class="col-span-8 text-primary-500 text-sm font-medium leading-none
												sm:col-span-9 sm:text-base sm:leading-tight">{{ item.name }}</div>

							<div class="col-span-4 sm:col-span-3">
								<input
									type="number"
									v-model="form.products[idx].qty">
							</div>

							<InputError class="mt-2" :message="form.errors.products" />
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="step">
			<div class="step-content">
				<div class="title">
					Por último necesitamos que subas
					<span v-if="'ticket' === type" class="underline">tu ticket</span>
					<span v-if="'list' === type" class="underline">tu listado de ventas</span>
					donde se recojan los productos vendidos.
					Por favor elige la opción preferida, sube
					tu archivo y da click en ENVIAR.
				</div>

				<div class="content">
					<div>Recuerda que deben estar incluídas en <span class="underline">tu ticket</span></div>
				</div>
			</div>
		</div>

	</div>


	<FileUploader
		:type="challenge.challenge_type"
		:title="uploader_title"
		class="mt-10"
		:class="{'opacity-50 pointer-events-none': !acceptance}"
		@fileUpload="setFileData"/>

    <InputError class="mt-2" :message="form.errors.file" />

	<Button :enabled="!acceptance"/>
</form>
</template>


<style scoped>
input[type=number]{
	@apply bg-primary-100 border-primary-100 text-primary-500
						font-bold text-center w-full rounded-xl
						focus:ring-0;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
	-webkit-appearance: none;
	margin: 0;
}
</style>


<style>
.dp__main .dp__input_wrap > .dp__pointer{
	@apply bg-primary-100 border-primary-100 text-primary-500
						font-medium px-4 rounded-xl focus:ring-0;
}

.dp__main svg{
	display: none !important;
}

.dp__menu{
	@apply bg-primary-100 border-primary-100 rounded-lg;
}

.dp__arrow_top{
	@apply bg-primary-100 border-primary-100 rounded;
}

.dp__overlay_cell_active,
.dp__pointer.dp__active_date{
	@apply bg-primary-500;
}

.dp__date_hover:hover{
	background: transparent;
}

.dp__today{
	@apply border-primary-500 text-primary-500;
}

</style>
