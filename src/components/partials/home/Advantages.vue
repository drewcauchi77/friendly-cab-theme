<template>
    <div class="container" v-if="!isHomeLoading">
        <h1>ADVANTAGES SECTION</h1>
        <p>{{ allHomeContent.acf.advantages_section }}</p>
    </div>
</template>

<script>
import { setHomeContentMixin } from '../../../mixins'

export default {
    name: 'Advantages',
    mixins: [setHomeContentMixin]
}
</script>