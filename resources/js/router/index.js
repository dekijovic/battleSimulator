import Vue from 'vue'
import VueRouter from 'vue-router'

const routes = [
    { path: '/', component: require('./../components/game/Games.vue').default },
    { path: '/game/:gameId', component: require('./../components/game/ManageGame.vue').default },
]

const router = new VueRouter({
    routes
})

// VueRouter init
Vue.use(VueRouter)

export default router
