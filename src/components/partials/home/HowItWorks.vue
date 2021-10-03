<template>
    <section class="container how-it-works" v-if="homeObject">
        <div class="section-title text-center lower-below-text-border" v-html="homeObject.acf.how_it_works_section.title"></div>
        <div class="three-col-section">
            <div class="column" v-for="item in homeObject.acf.how_it_works_section.details" :key="item.item.title">
                <img :src="item.item.icon.url" :alt="item.item.icon.alt"/>
                <h3>{{item.item.title}}</h3>
                <p class="normal-text" v-html="item.item.text"></p>
            </div>
        </div>
    </section>
</template>

<script>
import store from '../../../store/shared_state'

export default {
    name: 'HowItWorks',
    computed: {
        homeObject() { return store.state.homeContent }
    }
}
</script>