<template>
    <div class="container">
        <h2>{{ allBannerContent.tagline }}</h2>
        <h1>{{ allBannerContent.title }}</h1>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'BannerSection',
    data() {
        return {
            loading: true,
            allBannerContent: []
        }
    },
    props: {
        slug: String
    },
    created() {
        this.fetchBannerContent()
    },
    methods: {
        async fetchBannerContent() {
            const response = await axios.get('/wp-json/wp/v2/pages?slug='+this.slug)
            this.allBannerContent = response.data[0].acf.banner_section
            this.loading = false
        }
    }
}
</script>