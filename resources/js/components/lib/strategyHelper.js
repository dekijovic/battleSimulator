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
            let rand = Math.floor(Math.random() * Math.floor(defenders.length));
            defender = defenders[rand]
        }

        return defender;

    },
    sortedDefenders(armies, currentAttacker)
    {
        let sortingArmies = this.unitSorter(armies)
        return sortingArmies.filter(function(army){

            return army.id !== currentAttacker.id || army.units === 0
        })
    },
    attack(currentAttacker){
        let numberOfAttacks = this.numberOfReloads(currentAttacker)
        let i
        let damage = this.damage(currentAttacker);
        let totalDamage = 0;
        let successAttacks = 0;
        for(i=1; i < numberOfAttacks+1; i++){
            if(this.attackSuccess(currentAttacker)){
                totalDamage = totalDamage + damage
                successAttacks++
            }

        }
        return {
            numberOfAttacks: numberOfAttacks,
            totalDamage:totalDamage,
            successAttacks:successAttacks
        }
    },
    attackSuccess(currentAttacker){

        let probability = currentAttacker.units;
        let rand = Math.floor(Math.random() * Math.floor(100));
        if(probability === 100 || rand < probability){
            return true
        }
        return false
    },
    numberOfReloads(currentAttacker){
        return Math.floor(100/currentAttacker.units);
    },
    damage(currentAttacker){
        if(currentAttacker.units > 1) {
            return currentAttacker.units * 0.5
        }
        return 1
    }
}
