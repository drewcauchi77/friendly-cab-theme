<template>
    <section class="advantages-section-home" v-if="!isHomeLoading" v-bind:style="{ backgroundImage: 'url(' + setAdvantagesSectionData.background.url + ')' }">
        <div class="container">
            <div class="column" v-for="item in setAdvantagesSectionData.advantages" :key="item.advantage.title">
                <img :src="item.advantage.icon.url" :alt="item.advantage.icon.alt" />
                <h4 v-html="item.advantage.title"></h4>
                <div v-html="item.advantage.text"></div>
            </div>
        </div>
    </section>
</template>

<script>
import { setHomeContentMixin } from '../../../mixins'

export default {
    name: 'Advantages',
    mixins: [setHomeContentMixin]
}
</script>