<template>
    <main class="page-content">
        <Header />
        <router-view></router-view>
        <Footer />
    </main>
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