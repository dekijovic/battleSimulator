export default {

    unitSorter(sortingArmies) {
        sortingArmies.sort(function (a, b) {
            if (a.units > b.units) {
                return 1
            }
            if (a.units < b.units) {
                return -1
            }
            return 0
        })
        return sortingArmies
    },
    defender(armies, currentAttacker){
        let defenders = this.sortedDefenders(armies, currentAttacker)
        let defender = 0;
        if(currentAttacker.strategy === "WEAKEST"){
            defender = defenders[0];
        }

        if(currentAttacker.strategy === "STRONGEST"){
            defender = defenders[defenders.length - 1]
        }

        if(currentAttacker.strategy === "RANDOM"){
            let rand = Math.floor(Math.random() * Math.floor(sortingArmies.length));
            defender = defenders[rand]
        }

        return defender;

    },
    sortedDefenders(armies, currentAttacker)
    {
        let sortingArmies = this.unitSorter(armies)
        return sortingArmies.filter(function(army){
            return army.id !== currentAttacker.id
        })
    }
}
