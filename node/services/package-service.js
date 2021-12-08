const kilometersPackage = new Map()
kilometersPackage.set("<101", 55)
kilometersPackage.set(">100|<506", 165)
kilometersPackage.set(">505|<901", 225)
kilometersPackage.set(">899", 275)


function checkValidity(km, range) {
    let intervals = range.split("|")
    return intervals.every((curr) => {
        return eval(km.toString() + curr);
    })
}

function getPriceFromKm(km) {
    let final = 0
    kilometersPackage.forEach((value, key) => {
        if(checkValidity(km, key)){
            final = value
        }
    })
    return final
}

module.exports = {checkValidity, kilometersPackage,getPriceFromKm}
