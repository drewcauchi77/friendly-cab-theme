<template>
    <div class="container header-section" v-if="!loading" >
        <div class="logo-section">
            <img :src="allHeaderData.acf.site_logo.url" :alt="allHeaderData.acf.site_logo.alt"/>
        </div>
        <Menu  class="header-menu"/>
        <div>
            <p v-html="allHeaderData.acf.additional_details.text"></p>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import Menu from './Menu'
import Loading from './Loading'


export default {
    name: 'Header',
    props: ['header'],
    components: {
        Menu,
        Loading
    },
     data() {
        return {
            loading: true,
            allHeaderData: []
        }
    },
    created() {
        this.fetchHeader()
    },
    methods: {
        async fetchHeader() {
            const response = await axios.get('/wp-json/wp/v2/menus?slug=header')

            this.allHeaderData = response.data[0]
            this.loading = false
        }
        
    }
    
}
</script>
