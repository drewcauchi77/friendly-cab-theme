<template>
    <section class="banner-section" v-if="bannerObject" :style="{ backgroundImage: 'url(' + bannerObject.acf.banner_section.background.url + ')' }">
        <div class="banner-container container">
            <h1>{{ bannerObject.acf.banner_section.title }}</h1>
            <h2>{{ bannerObject.acf.banner_section.tagline }}</h2>
        </div>
    </section>
</template>

<script>
import store from '../../../store/shared_state'

export default {
    name: 'BannerSection',
    props: {
        slug: String
    },
    computed: {
        bannerObject() {
            switch(this.slug) {
                case 'about':
                    return store.state.aboutContent
                    break
                case 'services':
                    return store.state.servicesContent
                    break
                case 'contact': 
                    return store.state.contactContent
                    break
                default: 
                    return 0
            }
        }
    }
}
</script>