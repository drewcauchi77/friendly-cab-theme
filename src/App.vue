<template>
    <div class="container">
        <Header />
        <router-view></router-view>
        <Footer />
    </div>
</template>

<script>
import Header from './components/partials/Header'
import Footer from './components/partials/Footer'

export default {
    components: {
        Header,
        Footer
    }
}
</script>

<style lang="scss" scoped>

</style>