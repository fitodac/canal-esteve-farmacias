<script setup>
import { ref, reactive, watch } from 'vue'
import { useDropZone } from '@vueuse/core'

defineProps({
	title: 'String',
    type: 'Strgng'
})

const emit = defineEmits(['fileUpload'])


const dropzone = ref(null)
const data = reactive({
	name: null,
	code: null
})
const file_input = ref(null)

const fileDataProccess = file => {
	data.name = file.name
	const reader = new FileReader()
	reader.addEventListener('load', () => data.code = reader.result)
	reader.readAsDataURL(file)
}

const onDrop = (file) => fileDataProccess(file[0])

const { isOverDropZone } = useDropZone(dropzone, onDrop)

const handleFileUpload = event => fileDataProccess(event.target.files[0])

const fileFocus = () => file_input.value.click()

watch(data, val => emit('fileUpload', val))
</script>


<template>
<div class="file-uploader">
	<div class="text-center">
		<h3>{{ title }}</h3>
		<div class="mt-1">
			<p v-if="type === 'visibility'">Formatos válidos: jpg, jpeg, png o pdf.</p>
			<p v-if="type === 'recommendation'">Formatos válidos: xls, xlsx, csv, doc, docx y pdf.</p>
			<p>
				Por favor procura que la imagen sea nítida.
				Ten en cuenta que si no somos capaces de poder
				ver claramente los productos incluídos no
				podremos validar la participación.
			</p>
		</div>
	</div>

	<div
		ref="dropzone"
		@click="fileFocus"
		class="dropzone">

		<div
			v-if="!data.name"
			class="square">

			<svg
				class="w-10 inline-block"
				viewBox="0 0 38 45" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				<g id="Retos" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round">
					<g id="EST-Reto-Visibilidad-1" transform="translate(-622.000000, -3071.000000)" stroke="#388097" stroke-width="2">
						<g id="icono-doc" transform="translate(622.073436, 3070.677407)">
							<path d="M34.946444,44.1256268 C35.587979,44.1256268 36.1078283,43.6057928 36.1078283,42.9642765 L36.1078283,14.1222874 C36.1078283,13.9293255 36.0311781,13.7441179 35.8945797,13.6075235 L23.8536432,1.56693924 C23.7173431,1.43064312 23.53213,1.35369695 23.3388642,1.35369695 L2.7494951,1.35369695 C2.10796001,1.35369695 1.5881108,1.87382919 1.5881108,2.51504727 L1.5881108,42.9642765 C1.5881108,43.6057928 2.10796001,44.1256268 2.7494951,44.1256268 L34.946444,44.1256268 Z" id="Stroke-1"></path>
							<path d="M23.640514,1.35378642 L23.640514,12.8429233 C23.640514,13.4656504 24.1454507,13.9705724 24.7681961,13.9705724 L36.1076494,13.9705724" id="Stroke-3"></path>

							<path
								d="M15.3698114,28.4309942 L15.3698114,38.4656096 C15.3698114,38.4876795 15.3880047,38.5058722 15.4100751,38.5058722 L22.2856252,38.5058722 C22.3079939,38.5058722 22.3261872,38.4876795 22.3261872,38.4656096 L22.3261872,28.4309942 L26.7540021,28.4309942 C26.8524245,28.4309942 26.9046182,28.3146802 26.8393015,28.2410147 L18.9356847,19.3418025 C18.8891578,19.2890139 18.8068409,19.2890139 18.7600156,19.3418025 L10.8566971,28.2410147 C10.7913805,28.3146802 10.8435742,28.4309942 10.9419966,28.4309942 L15.3698114,28.4309942 Z"
								id="arrow">
							</path>
						</g>
					</g>
				</g>
			</svg>

			<div
				class="text-primary-500 text-xl leading-none font-bold mt-2">
				Arrastra y suelta el fichero aquí
			</div>
			<div
				class="bg-white border border-primary-500 text-primary-500
									font-bold leading-none text-center px-3 pt-2 pb-2.5 mt-2
									inline-block rounded-full transition-all
									hover:bg-primary-500 hover:text-white">
				o selecciona un archivo
			</div>
			<div class="text-xs leading-none font-medium mt-2">Máximo 10MB</div>
		</div>

		<div v-else class="square">
			<div
				class="text-primary-500 font-bold overflow-hidden text-ellipsis whitespace-nowrap">
				{{ data.name }}
			</div>
		</div>

	</div>

	<input
		type="file"
		@change="handleFileUpload"
		ref="file_input"
		class="hidden" />
</div>
</template>



<style scoped>
.file-uploader{
	@apply bg-primary-100 px-10 py-10;
}


h3{
	@apply text-xl font-bold leading-tight;
}

p{
	@apply leading-tight;
}

.dropzone{
	@apply bg-white bg-opacity-50 p-3 mt-9 cursor-pointer;
}

.square{
	@apply border-primary border border-dashed
					text-center h-full p-8 select-none;
}

#arrow{
	animation-name: animate_arrow;
	animation-duration: 3s;
	animation-iteration-count: infinite;
}

@keyframes animate_arrow {
  0% { transform: translate(0, 30px); }
  15% { transform: translate(0, -2px); }
  90% { opacity: 1; transform: translate(0, -2px); }
  100% { opacity: 0; }
}
</style>
