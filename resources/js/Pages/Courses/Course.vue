<script setup>
import Layout from '@/Layouts/PageLayout.vue'
import CourseComponent from '@/Components/Courses/CourseComponent.vue'
import WebinarComponent from '@/Components/Courses/WebinarComponent.vue'

const props = defineProps({
    course: {
        type: Object,
    },
    modules: {
        type: Object,
    },
    approved: Boolean,
    related: Object
})

</script>
<template>
    <Layout>
        <CourseComponent v-if="props.course.format_id === 1"
            :course="props.course"
            :modules="props.modules"
            :approved="props.approved"
            :related="props.related"
        ></CourseComponent>

        <WebinarComponent v-if="props.course.format_id === 2" :course="props.course"
        ></WebinarComponent>
    </Layout>
</template>
