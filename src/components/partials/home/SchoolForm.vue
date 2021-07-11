<template>
    <section v-if="!isHomeLoading">
        <div class="container">
            <div class="section-title text-center lower-below-text-border" v-html="setSchoolFormSectionData.title"></div>

            <div class="school-form">
                
            </div>
        </div>
    </section>
</template>

<script>
import { setHomeContentMixin } from '../../../mixins'

export default {
    name: 'SchoolForm',
    mixins: [setHomeContentMixin]
}
</script>