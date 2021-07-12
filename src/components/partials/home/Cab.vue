<template>
    <div class="container" v-if="!isHomeLoading">
        <h1>CAB SECTION</h1>
        <p>{{ setCabSectionData }}</p>
    </div>
</template>

<script>
import { setHomeContentMixin } from '../../../mixins'

export default {
    name: 'Cab',
    mixins: [setHomeContentMixin]
}
</script>