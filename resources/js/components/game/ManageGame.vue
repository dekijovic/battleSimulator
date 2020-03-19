<template>
<div>
    <h1 class="text-center">Welcome to the ancient battle of {{game.name}}</h1>
    <h2 class="text-center">Yo are a brave soul standing in this dangerous ground</h2>
    <div class="row">
        <div class="col-4 col-sm-4 col-lg-4">
            <form>
                <div class="form-group">
                    <label for="armyname">Name</label>
                        <input type="text" class="form-control" id="armyname" v-model="addArmy.name">
                </div>
                <div class="form-group">
                    <label for="armyunit">Unit</label>
                    <input type="text"  class="form-control" id="armyunit" v-model="addArmy.name">
                </div>
                <div class="form-group">
                    <button @click.prevent="addAnArmy()">Add an Army</button>
                </div>
            </form>
        </div>
        <div class="col-8 col-sm-8 col-lg-8">
            <h3>Armies</h3>
            <div class="container">
                <div class="" v-for="army in armies">
                    <span><i class="rounded-circle"></i><b>{{army.name}}</b></span>  units:<span>{{army.units}}</span></div>
            </div>
        </div>
    </div>
    <div class="row container">
        <button> Start Battle</button>
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
                name:null
            },
            addArmy:{
                name:null,
                unit:null,
                strategy:null
            },
            armies: []
        }
    },
    mounted() {
       let id = this.$route.params.gameId
        this.getGame(id)
        this.getArmies(id)
    },
    methods:{
        getGame(id){
            axios.get(`/game/${id}`)
                .then((response) => {
                    this.game = response.data
                })
        },
        getArmies(id){
            axios.get(`/game/${id}/army`)
                .then((response) => {
                    this.armies = response.data
                })
        },
        addAnArmy(){
            axios.post(`/game/${this.$route.params.gameId}/army`,this.addArmy)
                .then((response) => {
                    this.game = response.data
                })

        }
    }

}
</script>

<style scoped>

</style>
