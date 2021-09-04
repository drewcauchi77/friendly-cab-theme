<template>
    <section class="home-banner-section" v-if="homeObject" :style="{ backgroundImage: 'url(' + homeObject.acf.introduction_section.background.url + ')' }">
        <div class="container">
            <div class="left-section">
                <div class="inner-sec">
                    <h1 class="title">{{ homeObject.acf.introduction_section.title}}</h1>
                    <div class="tagline" v-html="homeObject.acf.introduction_section.tagline"></div>
                    <a class="button-blue" :href="homeObject.acf.introduction_section.button.link">{{ homeObject.acf.introduction_section.button.text }}</a>
                </div>
            </div>
            <div class="right-section">
            </div>
        </div>
    </section>
</template>



<script>
import store from '../../../store/shared_state'

export default {
    name: 'Introduction',
    computed: {
        homeObject() { return store.state.homeContent }
    }
}
</script>