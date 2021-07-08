<template>
    <div class="container">
        <Header />
        <router-view></router-view>
        <Footer />
    </div>
</template>

<script>
import Header from './components/partials/global/Header'
import Footer from './components/partials/global/Footer'

export default {
    components: {
        Header,
        Footer
    }
}
</script>