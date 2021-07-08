import axios from 'axios'

export const setHomeContentMixin = {
    data() {
        return {
            allHomeContent: [],
            isHomeLoading: true
        }
    },
    created() {
        this.fetchHomeContent()
    },
    methods: {
        async fetchHomeContent(){
            const response = await axios.get('/wp-json/wp/v2/pages?slug=home')
            this.allHomeContent = response.data[0]
            this.isHomeLoading = false
        }
    },
}