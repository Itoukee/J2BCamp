let dayjs = require("dayjs")
let package = require("../services/package-service")

function format_date_full(date) {

    return date.format("DD-MMMM-YYYY")
}

function to_date(str) {
    return dayjs(str)
}

function curr_date(form) {
    return dayjs().format(form)
}

function handle_opt(obj) {
    return obj == null ? "-" : obj
}

function handle_day(day) {
    return day > 1 ? "jours" : "jour";
}
function handle_price(price){
    return price.toFixed(2)
}
function handle_package(km) {
    return package.getPriceFromKm(km)
}

function upper(string) {
    return string.toString().toUpperCase()
}

function lower(string) {
    return string.toString().toLowerCase()
}

function mult(a, b) {
    return a * b
}

module.exports = {
    format_date_full, to_date, curr_date, handle_opt, upper, lower, mult, handle_day,handle_package
}

