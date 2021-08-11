<template>
    <div class="why-choose-us-section" v-if="!isAboutLoading" :style="{ backgroundImage: 'url(' + setBenefitsSectionData.background.url + ')' }">
        <div class="container">
            <h3 v-html="setBenefitsSectionData.tagline"></h3>
            <h2 v-html="setBenefitsSectionData.title"></h2>
            <div class="three-col-section">
                <div class="column" v-for="item in setBenefitsSectionData.benefits.benefits_list" :key="item.title">
                    <img :src="item.icon.url" :alt="item.icon.alt"/>
                    <h3 class="white-title">{{item.title}}</h3>
                    <p class="grey-text" v-html="item.details"></p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { setAboutContentMixin } from '../../../mixins'

export default {
    name: 'Benefits',
    mixins: [setAboutContentMixin]
}
</script>