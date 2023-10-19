<script setup>
import { ref } from 'vue'
import Layout from '@/Layouts/PageLayout.vue'
import { usePage } from '@inertiajs/inertia-vue3'

import Header from '@/Components/SellOutChallenges/View/Header.vue'
import Intro from '@/Components/SellOutChallenges/View/Intro.vue'
import RecommendationForm from '@/Components/SellOutChallenges/View/RecommendationForm.vue'
import VisibilityForm from '@/Components/SellOutChallenges/View/VisibilityForm.vue'
import ThankYouMessage from '@/Components/SellOutChallenges/View/ThankYouMessage.vue'
import CantParticipate from '@/Components/SellOutChallenges/View/CantParticipate.vue'

const { challenge, participation, score, total_participate_score } = defineProps({
    challenge: Object,
    participation: Object,
    score: Object,
    total_participate_score: Number
})

const form_type = ({
	'recommendation': RecommendationForm,
	'visibility': VisibilityForm
})[challenge.challenge_type]

const form_sent = ref(false)

const formSent = () => form_sent.value = true
const formReset = () => form_sent.value = false

const checkIfCanParticipate = () => {
    if( usePage().props.value.auth.user.role == 'titular' ) {
        return false;
    }

    if(total_participate_score >= challenge.score) {
        return false;
    }

    return true;
}
</script>



<template>
<Layout>
    <div v-if="checkIfCanParticipate()">
        <div v-if="!form_sent">
            <Header
                :name="challenge.title"
                :type="challenge.challenge_type"
                :img_url="challenge.image" />

            <Intro :challenge="challenge" />


            <section class="form-section">
                <div class="container mx-auto">
                    <div class="max-w-2xl mx-auto">

                        <h3>Enviar nueva participación</h3>
                        <component :is="form_type" :challenge="challenge" @formSent="formSent"/>

                    </div>
                </div>
            </section>
        </div>

        <div v-else>
            <ThankYouMessage @formReset="formReset" />
        </div>
    </div>
    <div v-else>
        <CantParticipate />
    </div>
</Layout>
</template>



<style scoped>
.form-section{
	@apply px-6 py-20;
}

.form-section h3{
	@apply text-primary-500 text-2xl font-bold text-center md:text-4xl;
}
</style>


<style>
.steps{
	@apply grid gap-y-20 mt-12;
}

.step{
	@apply grid grid-cols-12 gap-x-6;
}

.step-number{
	@apply text-primary-500 text-2xl font-bold leading-none col-span-1
						md:text-4xl;
}

.step-content{
	@apply col-span-11;
}

.step-content .title{
	@apply font-bold leading-tight md:text-xl md:leading-tight;
}

.step-content .content{
	@apply leading-tight mt-2;
}
</style>
