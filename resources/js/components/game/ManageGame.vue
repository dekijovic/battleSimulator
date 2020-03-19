<template>
<div>
    <h1 class="text-center">Welcome to the ancient battle of {{game.name}}</h1>
    <h5 class="text-center">Yo are a brave soul standing in this dangerous ground - <b>Status: {{game.status}}</b></h5>
    <div class="row border-top" style="height: 50px"></div>
    <div class="row">
        <div class="col-4 col-sm-4 col-lg-4">
            <h3 class=" border-bottom">Add new army</h3>
            <form class="border-danger">
                <div class="form-group">
                    <label for="armyname">Name:</label>
                        <input type="text" class="form-control" id="armyname" v-model="addArmy.name">
                </div>
                <div class="form-group">
                    <label for="armyunit">Unit:</label>
                    <input type="number"  class="form-control" id="armyunit" v-model="addArmy.units">
                </div>
                <div class="form-group">
                    <label for="armystrategy">Strategy:</label>
                    <select class="form-control" id="armystrategy" v-model="addArmy.strategy">
                        <option>RANDOM</option>
                        <option>WEAKEST</option>
                        <option>STRONGEST</option>
                    </select>
                </div>
                <div class="form-group">
                    <button @click.prevent="addAnArmy()">Add an Army</button>
                </div>
            </form>
        </div>
        <div class="col-8 col-sm-8 col-lg-8">
            <h3 class=" border-bottom">Armies</h3>
            <div class="container">
                <div class="row" v-for="army in armies">
                    <div class="col-4 col-sm-4 col-lg-4"><b>{{army.name}}</b></div>
                    <div class="col-4 col-sm-4 col-lg-4">units: {{army.units}}</div>
                    <div class="col-4 col-sm-4 col-lg-4">strategy: {{army.strategy}}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" v-if="this.armies.length > 4">
        <button v-if="game.status === 'START'" type="button" class="btn btn-primary btn-lg btn-block btn-dark" @click="battleStatus"> Start Battle</button>
        <div class="row col-12" v-if="game.status === 'PROCESS'">
            <button type="button" class="btn btn-primary btn-lg btn-block btn-dark" @click="battleStatus"> Restart Battle</button>
            <button type="button" class="btn btn-primary btn-lg btn-blue m-2" @click="turn"> Turn </button>
            <button type="button" class="btn btn-primary btn-lg btn-blue m-2" @click="automaticPlay"> Automatic Play </button>
        </div>
    </div>
    <div class="text-lg-center border-bottom" v-else>
        <b>In order to start the battle 5 armies must be added</b>
    </div>
    <div class="row">
        <b>Battle log</b>
        <div class="row container">
            <ul v-for="logitem in log">
                <li></li>
            </ul>

        </div>
    </div>
</div>
</template>

<script>
export default {
    name: "ManageGame",
    data() {
        return {
            id: null,
            game: {
                name:null,
                status:'START'
            },
            addArmy:{
                name:null,
                units:0,
                strategy:'RANDOM'
            },
            armies: [],
            log:[]
        }
    },
    computed: {
    },
    mounted() {
       this.id = this.$route.params.gameId
        this.getGame()
        this.getArmies()
        console.log(this.armies)
        console.log('asdgasdgas')
    },
    methods:{
        getGame(){
            axios.get(`/game/${ this.id}`)
                .then((response) => {
                    this.game = response.data
                })
        },
        getArmies(){
            axios.get(`/game/${ this.id}/army`)
                .then((response) => {
                    this.armies = response.data
                })
        },
        addAnArmy(){
            axios.post(`/game/${this.id}/army`,this.addArmy)
                .then((response) => {
                    this.game = response.data,
                        this.getArmies(this.id)
                })

        },
        battleStatus(){

            if(this.game.status === "START"){
                this.game.status = "PROCESS"
                this.updateGame();
            }
            if(this.game.status === "PROCESS"){
                this.game.status = "START"
                this.updateGame();
            }

        },
        updateGame(){
            axios.put(`/game/${ this.id}`, this.game)
                .then((response) => {
                    this.game = response.data
                })
        },
        turn(){

        },
        automaticPlay(){
            alert('not finished')

        }
    }

}
</script>

<style scoped>

</style>
