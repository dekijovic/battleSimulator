import Vue from 'vue'
import App from './components/App'
import './bootstrap'

// Import all components
import './components'

new Vue({
    render: h => h(App)
}).$mount('#app')
