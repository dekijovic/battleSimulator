import Vue from 'vue'
import App from './components/App'
import './bootstrap'
import router from './router'

// Import all components
import './components'

new Vue({
    router,
    render: h => h(App)
}).$mount('#app')
