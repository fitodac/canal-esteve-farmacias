<script setup>
import { ref, onMounted } from 'vue'
import Checkbox from '@/Components/Form/Checkbox.vue'
import FileUploader from '@/Components/SellOutChallenges/View/FileUploader.vue'
import Button from '@/Components/SellOutChallenges/View/Button.vue'
import { useForm, usePage } from '@inertiajs/inertia-vue3'
import InputError from '@/Components/Form/InputError.vue'

const emit = defineEmits(['formSent'])

onMounted(() => {

	steps.value.querySelectorAll('.step').forEach((el, idx) => {
		if( el.querySelector('.step-number') ) el.querySelector('.step-number').remove()
		const div = document.createElement('div')
		div.innerText = ++idx
		div.className = 'step-number'
		el.prepend(div)
	})

})

const { challenge } = defineProps({ challenge: Object })

const participation = JSON.parse(challenge.participation).map(product => product.name).join(', ');

const steps = ref(null)
const acceptance = ref(false)

const form = useForm({
    challenge_id: challenge.id,
    challenge_type: challenge.challenge_type,
    score: challenge.score,
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
					Antes de comenzar es necesario que aceptes las
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
						<Checkbox name="mailing" v-model:checked="form.mailing" />
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
					Coloca el material de comunicación  de {{participation}} en tu farmacia.
				</div>
			</div>
		</div>

		<div class="step">
			<div class="step-content">
				<div class="title">
					Realiza una foto con calidad suficiente para visualizar el material de comunicación expuesto en la farmacia, y súbela a continuación
				</div>
			</div>
		</div>

	</div>


	<FileUploader
        :type="challenge.challenge_type"
		title="Sube tu foto"
		class="mt-10"
		:class="{'opacity-50 pointer-events-none': !acceptance}"
		@fileUpload="setFileData"/>

    <InputError class="mt-2" :message="form.errors.file" />

	<Button :enabled="!acceptance"/>
</form>
</template>


<style scoped>

</style>
