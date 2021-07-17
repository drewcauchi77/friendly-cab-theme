<template>
    <div class="container how-it-works" v-if="!isHomeLoading">
        <div class="section-title text-center lower-below-text-border" v-html="setHowItWorksSectionData.title"></div>
        <div class="three-col-section">
            <div class="column" v-for="item in setHowItWorksSectionData.details" :key="item.item.title">
                <img :src="item.item.icon.url" :alt="item.item.icon.alt"/>
                <h3>{{item.item.title}}</h3>
                <p class="normal-text" v-html="item.item.text"></p>
            </div>
        </div>
    </div>
</template>

<script>
import { setHomeContentMixin } from '../../../mixins'

export default {
    name: 'HowItWorks',
    mixins: [setHomeContentMixin]
}
</script>