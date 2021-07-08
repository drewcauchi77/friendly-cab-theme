<template>
    <div class="container" v-if="!isHomeLoading">
        <h1>SCHOOL FORM SECTION</h1>
        <p>{{ allHomeContent.acf.school_form_section }}</p>
    </div>
</template>

<script>
import { setHomeContentMixin } from '../../../mixins'

export default {
    name: 'SchoolForm',
    mixins: [setHomeContentMixin]
}
</script>