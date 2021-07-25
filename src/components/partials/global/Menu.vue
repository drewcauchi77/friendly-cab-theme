<template >
    <nav class="navigation-menu" v-if="!loading">
        <div v-if="allMenuItems.title" v-html="allMenuItems.title"></div>

        <ul class="container list-container">
            <li v-for="item in allMenuItems.item" :key="item.name">
                <router-link :to="item.link">
                    <span>{{item.name}}</span>
                </router-link>
            </li>
        </ul>
    </nav>
</template>

<script>
import axios from 'axios'

export default {
    name: 'Menu',  
    data() {
        return {
            loading: true,
            allMenuItems: []
        }
    },
    props: {
        slug: String
    },
    created() {
        this.fetchMenuItems()
    },
    methods: {
        async fetchMenuItems() {
            const response = await axios.get('/wp-json/wp/v2/menus?slug='+this.slug)
            this.allMenuItems = response.data[0].acf.main_menu
            this.loading = false
        }
    }
}
</script>
