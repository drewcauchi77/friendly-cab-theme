<template>
    <section class="additional-section" v-if="aboutObject">
        <div class="container">
            <div v-html="aboutObject.acf.additional_section.tagline"></div>
            <div v-html="aboutObject.acf.additional_section.title"></div>
            <router-link class="button-blue" :to="aboutObject.acf.additional_section.button.link">{{ aboutObject.acf.additional_section.button.text }}</router-link>
        </div>
    </section>
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