<template>
    <div>
        <h1>Welcome to battle Simulator</h1>

        <form>
            <input type="text" v-model="game.name">
            <button @click.prevent="createGame">create</button>
        </form>

        <h2>list of games</h2>
        <ul>
            <li v-for="lgame in games">
                <a href="'#game'+game.id">{{lgame.name}} ({{lgame.game_uuid}})</a>
            </li>
        </ul>

    </div>
</template>

<script>
import axios from 'axios'
export default {
    name: 'ProApp',
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
