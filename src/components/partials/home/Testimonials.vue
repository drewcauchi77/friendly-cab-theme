<template>
    <div class="container" v-if="!isHomeLoading">
        <h1>TESTIMONIALS SECTION</h1>
        <!-- <p>{{ setTestimonialsSectionData }}</p> -->
    </div>
</template>

<script>
import { setHomeContentMixin } from '../../../mixins'

export default {
    name: 'Testimonials',
    mixins: [setHomeContentMixin]
}
</script>