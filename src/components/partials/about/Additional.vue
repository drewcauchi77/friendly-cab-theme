<template>
     <div class="additional-section" v-if="!isAboutLoading">
        <div class="container">
            <div v-html="setAdditionalSectionData.tagline"></div>
            <div v-html="setAdditionalSectionData.title"></div>
            <a class="button-blue" :href="setAdditionalSectionData.button.link">{{setAdditionalSectionData.button.text}}</a>
        </div>
    </div>
</template>


<script>
import { setAboutContentMixin } from '../../../mixins'

export default {
    name: 'Additional',
    mixins: [setAboutContentMixin]
}
</script>