<template>
    <section class="home-cab-section" v-if="homeObject" v-bind:style="{ backgroundImage: 'url(' + homeObject.acf.cab_section.background.url + ')' }">
        <div class="container">
            <div class="lect-sec">
                <div v-html="homeObject.acf.cab_section.title"></div>
                <p class="normal-text-white" v-html="homeObject.acf.cab_section.details"></p>
                <a class="button-blue" :href="homeObject.acf.cab_section.button.link">{{ homeObject.acf.cab_section.button.text }}</a>
            </div>
            <div class="right-sec">
                <img :src="homeObject.acf.cab_section.image.url" :alt="homeObject.acf.cab_section.image.url"/>
            </div>
        </div>
    </section>
</template>

<script>
import store from '../../../store/shared_state'

export default {
    name: 'Cab',
    computed: {
        homeObject() { return store.state.homeContent }
    }
}
</script>