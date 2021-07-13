<template>
    <div class="container home-banner-section row" v-if="!isHomeLoading">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <h1 class="title">{{ setIntroductionSectionData.title}}</h1>
            <div v-html="setIntroductionSectionData.tagline"></div>
            <a :href="setIntroductionSectionData.button.link">{{setIntroductionSectionData.button.text}}</a>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
        </div>
    </div>
</template>



<script>
import { setHomeContentMixin } from '../../../mixins'

export default {
    name: 'Introduction',
    mixins: [setHomeContentMixin]
}
</script>