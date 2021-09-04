<template>
    <section class="advantages-section-home" v-if="homeObject" v-bind:style="{ backgroundImage: 'url(' + homeObject.acf.advantages_section.background.url + ')' }">
        <div class="container">
            <div class="column" v-for="item in homeObject.acf.advantages_section.advantages" :key="item.advantage.title">
                <img :src="item.advantage.icon.url" :alt="item.advantage.icon.alt" />
                <h4 v-html="item.advantage.title"></h4>
                <div v-html="item.advantage.text"></div>
            </div>
        </div>
    </section>
</template>

<script>
import store from '../../../store/shared_state'

export default {
    name: 'Advantages',
    computed: {
        homeObject() { return store.state.homeContent }
    }
}
</script>