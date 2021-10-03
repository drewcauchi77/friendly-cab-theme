<template >
    <nav class="navigation-menu" v-if="menuObject">
        <div v-if="menuObject.acf.main_menu.title" v-html="menuObject.acf.main_menu.title"></div>

        <ul class="container list-container">
            <li v-for="item in menuObject.acf.main_menu.item" :key="item.name">
                <router-link :to="item.link">
                    <span>{{item.name}}</span>
                </router-link>
            </li>
        </ul>
    </nav>
</template>

<script>
import store from '../../../store/shared_state'

export default {
    name: 'Menu',
    props: {
        slug: String
    },
    computed: {
        menuObject() {
            switch(this.slug) {
                case 'header':
                    return store.state.headerContent
                    break
                case 'footer':
                    return store.state.footerContent
                    break
                default:
                    return 0
            }
        }
    }
}
</script>
