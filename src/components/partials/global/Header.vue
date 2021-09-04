<template>
    <header v-if="headerObject" >
        <div class="container">
            <div class="header-container">
                <div class="site-logo">
                    <router-link to="/">
                        <img :src="headerObject.acf.site_logo.url" :alt="headerObject.acf.site_logo.alt">
                        <span class="company-title">FRIENDLY CABS</span>
                    </router-link>
                </div>

                <div class="menu">
                    <div class="mobile-menu-icon" @click="openNavMenu" :class="{ transform: navMenuOpen}">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <div class="navigation-container" :class="{ open: navMenuOpen }">
                        <Menu v-bind:slug="'header'"/>
                        <div class="phone-details">
                            <a :href="this.phoneNumber">
                                <div class="phone-icon">
                                    <PhoneIcon />
                                </div>
                                <div class="details-text" v-html="headerObject.acf.additional_details.text"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
import Menu from './Menu'
import PhoneIcon from '../../icons/PhoneIcon'

import store from '../../../store/shared_state'

export default {
    name: 'Header',
    components: {
        Menu,
        PhoneIcon
    },
    data() {
        return {
            navMenuOpen: false
        }
    },
    computed: {
        headerObject() { return store.state.headerContent },
        phoneNumber() {
            const getPhoneNumber = /<strong>(.*?)<\/strong>/g.exec(this.headerObject.acf.additional_details.text);
            return 'tel:'+getPhoneNumber[1]
        }
    },
    methods: {
        openNavMenu() {
            this.navMenuOpen = !this.navMenuOpen

            if(this.navMenuOpen){
                document.documentElement.style.overflowY = 'hidden'
            }else{
                document.documentElement.style.overflowY = 'auto'
            }
        }
    }
    
}
</script>
