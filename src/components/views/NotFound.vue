<template>
    <div class="error-content">
        <div class="page-content container">
            <h1>Oops! Page not found</h1>
            <img src="/wp-content/themes/zuus-vuejs-wp-theme-boilerplate/dist/assets/404.png">
            <router-link to="/" class="button-blue">Go to home</router-link>
        </div>
    </div>
</template>

<script>
import Loading from '../partials/global/Loading'

export default {
    name: 'NotFound',
    components: {
        Loading
    },
    data() {
        return {
            isErrorLoading: true
        }
    },
    mounted() {
        this.isErrorLoading = false
    }
}
</script>