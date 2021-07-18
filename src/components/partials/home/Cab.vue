<template>
    <section class="home-cab-section" v-if="!isHomeLoading"v-bind:style="{ backgroundImage: 'url(' + setCabSectionData.background.url + ')' }">
        <div class="container">
            <div class="lect-sec">
                <div v-html="setCabSectionData.title"></div>
                <p class="normal-text-white" v-html="setCabSectionData.details"></p>
                <a class="button-blue" :href="setCabSectionData.button.link">{{setCabSectionData.button.text}}</a>
            </div>
            <div class="right-sec">
                <img :src="setCabSectionData.image.url" :alt="setCabSectionData.image.url"/>
            </div>
        </div>
    </section>
</template>

<script>
import { setHomeContentMixin } from '../../../mixins'

export default {
    name: 'Cab',
    mixins: [setHomeContentMixin]
}
</script>