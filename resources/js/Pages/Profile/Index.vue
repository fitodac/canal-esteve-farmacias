<script setup>
import { ref, onMounted } from 'vue'
import { useStore } from '@/store/mainStore.js'
import { useModal } from '@/store/modalStore.js'

import ProfileLayout from '@/Layouts/ProfileLayout.vue'
import { Link, useForm } from '@inertiajs/inertia-vue3'
import TextInput from '@/Components/Form/TextInput.vue'
import ParticipantsTable from '@/Components/Profile/ParticipantsTable.vue'
import AuxiliarTable from '@/Components/Profile/AuxiliarTable.vue'

const store = useStore()
const modal = useModal();

const props = defineProps({
    score: Object,
    until: String,
    participants_user: Object,
    pharmacy_users: Object,
    pharmacy_count: Number,
    participants_total: Object,
    qty_pharmacy: Number,
    qty_participants: Number,
    search_auxiliar: String,
    search_participants: String
})

onMounted(() => {
    modal.close()
})

const form = useForm({
    usu_numcolegiado: ''
})

let code_error = ref(false)
let code_unblocked = ref(false)

const submit = () => {
    form.post(route('my-account.updateCode'), {
        onSuccess: (res) => {
            store.setUser(res.props.auth.user)
            code_unblocked.value = true;
        },
        onFinish: () => {
        },
        onError: (res) => {
            code_error.value = true;
        }
    });
};

// const total = () => {
//     let value = (props.score?.score || 0)
//     return parseFloat(value * 100 / 70).toFixed(2)
// }

// const remaining = () => {
//     let value = (props.score?.accumulated || 0)
//     return parseFloat(value * 100 / 70).toFixed(2)
// }
</script>


<template>
<ProfileLayout>
	<h3 class="text-xl font-bold leading-none sm:text-2xl md:text-3xl">Hola {{ store.getName }}</h3>
    <div class="mt-1" v-if="!$page.props.auth.user.pharmacy_id">
        <div class="leading-tight mt-4">
            ¡Bienvenido! Para desbloquear todos los contenidos
            de esta web es necesario que introduzcas tu
            <span class="font-bold">código de invitación</span>.
            Si no lo tienes, ponte en
            <Link
                :href="route('contact')"
                class="text-primary font-bold hover:underline">
                Contacto
            </Link>
            con nosotros.
        </div>


        <div class="mt-7">
            <div class="font-bold">Introduce tu código de invitación aquí:</div>


            <form
                @submit.prevent="submit"
                class="grid gap-2 xl:max-w-xl sm:gap-5 sm:grid-cols-12">

                <div class="sm:col-span-9">
                    <TextInput
                        id="email"
                        type="text"
                        class="m-0 w-full"
                        v-model="form.usu_numcolegiado"
                    />
                </div>

                <div class="sm:col-span-3">
                    <button
                        type="submit"
                        class="bg-primary text-white text-sm font-bold
                                            leading-none w-32 h-10 mt-2 rounded-full
                                            md:w-full">Enviar</button>
                </div>
            </form>
        </div>
    </div>

    <div v-if="code_error" class="mt-7">
        <div class="bg-[#FFF7D8] px-5 py-3 select-none rounded-xl">
            <div class="flex gap-x-10 items-center">
                <div class="font-bold leading-tight flex-1">
                    Código no válido. Por favor introdúcelo de
                    nuevo o ponte en
                    <Link :href="route('contact')" class="text-primary font-bold hover:underline">
                    Contacto
                    </Link>
                    con nosotros.
                </div>

                <div class="w-10">
                    <button @click="code_error = false" class="hover:opacity-90">
                        <img src="/img/btn-close.svg" alt="cerrar" class="w-full">
                    </button>
                </div>
            </div>
        </div>
    </div>




    <div v-if="code_unblocked" class="xl:max-w-xl mt-7">
        <div class="bg-[#E8FFD8] px-5 py-3 select-none rounded-xl">
            <div class="flex gap-x-10 items-center">
                <div class="font-bold leading-tight flex-1">
                    Código válido. Contenido desbloqueado.
                </div>

                <div class="w-10">
                    <button @click="code_unblocked = false" class="hover:opacity-90">
                        <img src="/img/btn-close.svg" alt="cerrar" class="w-full">
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-7" v-if="$page.props.auth.user && $page.props.auth.user.role !== 'titular'">

        <div class="mt-10">
			<div class="leading-tight mt-4">Consulta el resumen de tu progreso</div>

			<div class="grid gap-5 mt-5 md:grid-cols-2">

				<div>
					<div class="bg-gray-100 min-h-[172px] px-10 py-6 grid gap-y-2 place-items-center rounded-lg">
						<div class="text-primary-500 text-lg font-bold leading-none text-center select-none">Puntos disponibles actualmente:</div>

						<div class="flex gap-x-1 justify-center items-center select-none">
							<svg class="fill-primary-500 w-8" viewBox="0 0 40 37">
								<g stroke="none" stroke-width="1" fill-rule="evenodd">
									<g transform="translate(-522.000000, -714.000000)">
										<polygon id="Star" points="542 744.75 529.950402 751.084848 532.251671 737.667424 522.503341 728.165152 535.975201 726.207576 542 714 548.024799 726.207576 561.496659 728.165152 551.748329 737.667424 554.049598 751.084848"></polygon>
									</g>
								</g>
							</svg>

							<span class="text-primary-500 text-5xl font-bold leading-none">{{ score?.score || 0 }}</span>
						</div>

						<div class="leadin-none select-none">puntos</div>

					</div>

					<div class="flex justify-center mt-4">
						<Link :href="route('cart.index')" class="btn-rounded">Canjear puntos</Link>
					</div>
				</div>



				<div>
					<div class="bg-gray-100 min-h-[172px] px-10 py-6 grid gap-y-2 place-items-center rounded-lg">
						<div class="text-lg font-bold leading-none text-center select-none">TOTAL de puntos acumulados:</div>

						<div class="flex gap-x-1 justify-center items-center select-none">
							<svg class="fill-gray-300 w-8" viewBox="0 0 40 37">
								<g stroke="none" stroke-width="1" fill-rule="evenodd">
									<g transform="translate(-522.000000, -714.000000)">
										<polygon id="Star" points="542 744.75 529.950402 751.084848 532.251671 737.667424 522.503341 728.165152 535.975201 726.207576 542 714 548.024799 726.207576 561.496659 728.165152 551.748329 737.667424 554.049598 751.084848"></polygon>
									</g>
								</g>
							</svg>

							<span class="text-gray-300 text-5xl font-bold leading-none">{{ score?.accumulated || 0 }}</span>
						</div>

						<div class="leadin-none select-none">puntos</div>

					</div>

					<div class="flex justify-center mt-4">
						<Link :href="route('points-history')" class="btn-rounded">Histórico de puntos</Link>
					</div>
				</div>

			</div>


			<!-- <div class="mt-7">
				<div class="bg-gray-100 w-full h-7 flex rounded-lg overflow-hidden md:h-8 lg:h-9">
					<div class="bg-primary-500 text-center" :style="{width:  total() + '%'}"></div>
					<div class="bg-gray-300 text-center" :style="{width: remaining() + '%'}"></div>
				</div>
			</div> -->

			<div class="leading-none mt-5">
				Recuerda: Tienes hasta el <span class="font-bold">{{ until }}</span> para canjear tus puntos.
			</div>
		</div>

		<div class="mt-20">
			<!-- <Table /> -->
		</div>


	</div>

    <!-- poner despues que no aparezca si esta vacio -->
    <div class="mt-7" v-if="$page.props.auth.user && $page.props.auth.user.role == 'titular'">
        Auxiliares registrados: {{ props.pharmacy_count }}
        <AuxiliarTable :list="props.pharmacy_users" :qty="props.qty_pharmacy" :search_auxiliar="props.search_auxiliar"/>
    </div>

    <!-- poner despues que no aparezca si esta vacio -->
    <div class="mt-7" v-if="$page.props.auth.user && $page.props.auth.user.role == 'titular'">
        Participación en los retos
        Total de participaciones: {{ props.participants_total?.total || 0 }}
        Total de puntos acumulados: {{ props.participants_total?.earned_points || 0 }} puntos
        <ParticipantsTable :list="props.participants_user" :qty="props.qty_participants" :search_participants="props.search_participants"/>
    </div>
</ProfileLayout>
</template>



<style lang="scss" scoped>
.btn-rounded{
	@apply bg-primary-500 text-white text-sm font-bold leading-none
						px-6 py-3 rounded-full transition-all hover:opacity-80;
}
</style>
