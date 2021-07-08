<template>
    <div class="container" v-if="!isHomeLoading">
        <h1>HOME BANNER + BOOK CAB FORM</h1>
        <p v-if="allHomeContent.acf.introduction_section">{{ allHomeContent.acf.introduction_section }}</p>
    </div>
</template>

<script>
import { setHomeContentMixin } from '../../../mixins'

export default {
    name: 'Introduction',
    mixins: [setHomeContentMixin]
}
</script>