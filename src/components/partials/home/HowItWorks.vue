<template>
    <div class="container" v-if="!isHomeLoading">
        <h1>HOW IT WORKS SECTION</h1>
        <p>{{ allHomeContent.acf.how_it_works_section }}</p>
    </div>
</template>

<script>
import { setHomeContentMixin } from '../../../mixins'

export default {
    name: 'HowItWorks',
    mixins: [setHomeContentMixin]
}
</script>