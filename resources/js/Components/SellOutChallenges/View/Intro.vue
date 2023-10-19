<script setup>
import { useStore } from '@/store/mainStore.js'

import {
	recommendationChallengeIntro,
	visibilityChallengeIntro
} from '@/Composables/ChallengeIntro.js'


const store = useStore()
const name = store.getName

const { challenge } = defineProps({ challenge: Object })

let considerations = null
let instructions = null
let participation = null

if( 'recommendation' === challenge.challenge_type ){
	instructions = recommendationChallengeIntro(challenge).intructions
	considerations = recommendationChallengeIntro(challenge).considerations
}else if( 'visibility' === challenge.challenge_type ){
	instructions = visibilityChallengeIntro(challenge).intructions
	considerations = visibilityChallengeIntro(challenge).considerations
    participation = JSON.parse(challenge.participation)
}

</script>

<template>
<section class="section-rimary bg-primary-500">
	<div class="container mx-auto">
		<h3>
			<span class="pr-2">Hola</span>
			<span>{{ name }}</span>
		</h3>

		<h4>
			Participar es muy sencillo:
		</h4>


		<div class="max-w-xl mx-auto mt-10">
			<div class="font-bold">Instrucciones</div>

			<ul class="mt-2">
				<li
					v-for="(item, idx) in instructions"
					:key="idx">

					<strong
						v-if="item.title"
						v-html="item.title"
						class="pr-1" />

					<span
						v-if="item.content"
						v-html="item.content" />

				</li>
			</ul>



			<div class="grid gap-x-5 gap-y-8 mt-8 place-content-center sm:grid-cols-2" v-if="'visibility' === challenge.challenge_type">
				<div v-for="(card, idx) in participation" :key="idx" class="">
					<div class="card">
						<div class="card-image">
							<img :src="card.image" alt="">
						</div>
						<div class="card-body">
							<div class="card-title">{{card.name}}</div>
							<div class="card-content">{{card.material}}</div>
							<div class="card-footer">
								<img src="/img/icon-star.svg" alt="">
								<span>Vale {{card.score}} puntos</span>
							</div>
						</div>
					</div>
				</div>

				<div class=""></div>
			</div>


		</div>

	</div>
</section>



<section class="section-dark bg-gray-800">
	<div class="container mx-auto">
		<div class="max-w-xl mx-auto">
			<div class="font-bold">Consideraciones</div>

			<ul class="mt-2">
				<li
					v-for="(item, idx) in considerations"
					:key="idx">

					<strong
						v-if="item.title"
						v-html="item.title"
						class="pr-1" />

					<span
						v-if="item.content"
						v-html="item.content" />

				</li>
			</ul>

		</div>
	</div>
</section>
</template>


<style scoped>
section{
	@apply text-white px-6 py-10;
}

h3{
	@apply text-2xl leading-none text-center select-none
					sm:text-4xl;
}

h4{
	@apply text-xl leading-none font-bold text-center mt-1 select-none md:text-3xl;
}

ul{
	@apply mt-2;
}

li{
	@apply leading-tight pl-6 mt-3 relative;
}

li::before{
	content: '•';
	@apply left-0 top-0 absolute;
}


.card{
	@apply max-w-xs grid sm:max-w-lg;
}
.card-image img{
	@apply w-full h-60 object-cover rounded-t-xl;
}

.card-body{
	@apply bg-white text-gray-600 h-full px-6 pt-3 pb-5 rounded-b-xl;
}

.card-title{
	@apply text-primary-500 font-bold;
}

.card-content{
	@apply text-lg leading-none mt-1;
}

.card-footer{
	@apply text-primary-500 text-2xl font-bold mt-5 flex gap-x-2;
}
</style>
