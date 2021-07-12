<template>
    <div class="container" v-if="!isHomeLoading">
        <h1>HOW IT WORKS SECTION</h1>
        <p>{{ setHowItWorksSectionData }}</p>
    </div>
</template>

<script>
import { setHomeContentMixin } from '../../../mixins'

export default {
    name: 'HowItWorks',
    mixins: [setHomeContentMixin]
}
</script>