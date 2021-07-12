<template >
    <div v-if="!loading">
        <li  v-for="item in Menu" :key="item.name">
            <router-link :to="item.link">{{item.name}}</router-link>
        </li>
    </div>
   <Loading v-else />
</template>

<script>
import axios from 'axios'
import Loading from './Loading'


export default {
    name: 'Menu',  
    components: {
        Loading
    },
    data() {
        return {
            loading: true,
            Menu: []
        }
    },
    created() {
        this.fetchMenu()
    },
    methods: {
        async fetchMenu() {
            const response = await axios.get('/wp-json/wp/v2/menus?slug=header')

            this.Menu = response.data[0].acf.main_menu.item
            console.log(this.Menu);
            this.loading = false
        }
        
    }
}
</script>
