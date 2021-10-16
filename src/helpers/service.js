import store from '../store/shared_state'
import axios from 'axios'

const getContentObject = () => new Promise((resolve) => {

    try {
        axios.get('/wp-json/wp/v2/menus?slug=header').then(function(response) {
            store.setHeaderContent(response.data[0], 'getContentObject()')
        })

        axios.get('/wp-json/wp/v2/menus?slug=footer').then(function(response) {
            store.setFooterContent(response.data[0], 'getContentObject()')
        })

        axios.get('/wp-json/wp/v2/pages?slug=home').then(function(response) {
            store.setHomeContent(response.data[0], 'getContentObject()')
        })
        
        axios.get('/wp-json/wp/v2/pages?slug=about').then(function(response) {
            store.setAboutContent(response.data[0], 'getContentObject()')
        })

        axios.get('/wp-json/wp/v2/pages?slug=services').then(function(response) {
            store.setServicesContent(response.data[0], 'getContentObject()')
        })

        axios.get('/wp-json/wp/v2/pages?slug=contact').then(function(response) {
            store.setContactContent(response.data[0], 'getContentObject()')
        })
    } catch(error) {
        store.setShowError(true, 'getContentObject()')
    } finally {
        resolve(true)
    }

})

export { getContentObject }