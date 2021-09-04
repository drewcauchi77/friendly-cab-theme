let store = {
    debug: true,
    state: {
        showLoader: true,
        showError: false,
        headerContent: null,
        footerContent: null,
        homeContent: null,
        aboutContent: null,
        servicesContent: null,
        contactContent: null
    },
    setShowLoader(newValue, from) {
        if(this.debug) {
            console.log(`%c setShowLoader triggered from ${from}`, 'color: green')
        }
        this.state.showLoader = newValue
    },
    setShowError(newValue, from) {
        if(this.debug) {
            console.log(`%c setShowError triggered from ${from}`, 'color: green')
        }
        this.state.showError = newValue
    },
    setHeaderContent(newValue, from) {
        if(this.debug) {
            console.log(`%c setHeaderContent triggered from ${from}`, 'color: green')
        }
        this.state.headerContent = newValue
    },
    setFooterContent(newValue, from) {
        if(this.debug) {
            console.log(`%c setFooterContent triggered from ${from}`, 'color: green')
        }
        this.state.footerContent = newValue
    },
    setHomeContent(newValue, from) {
        if(this.debug) {
            console.log(`%c setHomeContent triggered from ${from}`, 'color: green')
        }
        this.state.homeContent = newValue
    },
    setAboutContent(newValue, from) {
        if(this.debug) {
            console.log(`%c setAboutContent triggered from ${from}`, 'color: green')
        }
        this.state.aboutContent = newValue
    },
    setServicesContent(newValue, from) {
        if(this.debug) {
            console.log(`%c setServicesContent triggered from ${from}`, 'color: green')
        }
        this.state.servicesContent = newValue
    },
    setContactContent(newValue, from) {
        if(this.debug) {
            console.log(`%c setContactContent triggered from ${from}`, 'color: green')
        }
        this.state.contactContent = newValue
    },
}

export default store