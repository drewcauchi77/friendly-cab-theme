<template>
    <section class="home-banner-section" v-if="!isHomeLoading" v-bind:style="{ backgroundImage: 'url(' + setIntroductionSectionData.background.url + ')' }">
        <div class="container">
            <div class="left-section">
                <div class="inner-sec">
                    <h1 class="title">{{ setIntroductionSectionData.title}}</h1>
                    <div class="tagline" v-html="setIntroductionSectionData.tagline"></div>
                    <a class="button-blue" :href="setIntroductionSectionData.button.link">{{setIntroductionSectionData.button.text}}</a>
                </div>
            </div>
            <div class="right-section">
            </div>
        </div>
    </section>
</template>



<script>
import { setHomeContentMixin } from '../../../mixins'

export default {
    name: 'Introduction',
    mixins: [setHomeContentMixin]
}
</script>