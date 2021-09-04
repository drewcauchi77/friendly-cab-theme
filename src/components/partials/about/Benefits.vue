<template>
    <div class="why-choose-us-section" v-if="aboutObject" :style="{ backgroundImage: 'url(' + aboutObject.acf.benefits_section.background.url + ')' }">
        <div class="container">
            <h3 v-html="aboutObject.acf.benefits_section.tagline"></h3>
            <h2 v-html="aboutObject.acf.benefits_section.title"></h2>
            <div class="three-col-section">
                <div class="column" v-for="item in aboutObject.acf.benefits_section.benefits.benefits_list" :key="item.title">
                    <img :src="item.icon.url" :alt="item.icon.alt"/>
                    <h3 class="white-title">{{item.title}}</h3>
                    <p class="grey-text" v-html="item.details"></p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import store from '../../../store/shared_state'

export default {
    name: 'Benefits',
    computed: {
        aboutObject() { return store.state.aboutContent }
    }
}
</script>