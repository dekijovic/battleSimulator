<template>
    <div class="align-content-center">
        <div class="container align-items-center">
            <h1 class="text-center">Welcome to battle Simulator</h1>
            <form style="padding: 50px">
                <input type="text" v-model="game.name">
                <button @click.prevent="createGame">Create Game</button>
            </form>
        </div>
        <div class="container" style="margin: 20px 0">
            <h2>list of games</h2>
            <ul class="list-group">
                <li class="list-group-item" v-for="lgame in games">
                    <a :href="'/#/game/'+lgame.id">{{lgame.name}} ({{lgame.game_uuid}})</a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    name: 'Games',
    data(){
        return {
            games:[],
            game:{
                name:''
            }
        }
    },
    mounted() {
        this.getGames()
    },
    methods:{
        getGames(){
            axios.get(`/game`)
                .then((response) => {
                    this.games = response.data
                })
        },
        createGame(){
            let route = '/game'
            axios.post(route, this.game
            ).then(
                response => (
                    this.getGames(),
                        this.game.name = ''

                )).catch(e => (this.error(e)))
        }
    }
}
</script>

<style scoped>

</style>
