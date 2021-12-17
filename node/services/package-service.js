//on peut definir les intervalles de kilometrage avec un prix associé
const kilometersPackage = new Map()
kilometersPackage.set("<101", 55)
kilometersPackage.set(">100|<506", 165)
kilometersPackage.set(">505|<901", 225)
kilometersPackage.set(">899", 275)

//permet de verifier si une distance est dans un range specifié
function checkValidity(km, range) {
    let intervals = range.split("|")
    return intervals.every((curr) => {
        return eval(km.toString() + curr);
    })
}

//a partir d'une distance, on recupere le forfait kilometrage
function getPriceFromKm(km) {
    let final = 0
    kilometersPackage.forEach((value, key) => {
        if(checkValidity(km, key)){
            final = value
        }
    })
    return final
}

module.exports = {getPriceFromKm}
