<template>
     <div class="additional-section" v-if="aboutObject">
        <div class="container">
            <div v-html="aboutObject.acf.additional_section.tagline"></div>
            <div v-html="aboutObject.acf.additional_section.title"></div>
            <a class="button-blue" :href="aboutObject.acf.additional_section.button.link">{{ aboutObject.acf.additional_section.button.text }}</a>
        </div>
    </div>
</template>


<script>
import store from '../../../store/shared_state'

export default {
    name: 'Additional',
    computed: {
        aboutObject() { return store.state.aboutContent }
    }
}
</script>