import Vue from 'vue'
import VueRouter from 'vue-router'

const routes = [

    { path: '/', component: require('./../components/App.vue').default },
    { path: '/game/:gameId', component: require('../components/game/Game') },


]

const router = new VueRouter({
    routes
})

// VueRouter init
Vue.use(VueRouter)

export default router
