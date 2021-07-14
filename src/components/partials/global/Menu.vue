<template >
    <nav class="navigation-menu" v-if="!loading">
        <ul class="container list-container">
            <li  v-for="item in allMenuItems" :key="item.name">
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
    created() {
        this.fetchMenuItems()
    },
    methods: {
        async fetchMenuItems() {
            const response = await axios.get('/wp-json/wp/v2/menus?slug=header')
            this.allMenuItems = response.data[0].acf.main_menu.item
            this.loading = false
        }
    }
}
</script>
