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

function handle_price(price) {
    return price.toFixed(2)
}

function handle_package(km) {
    return package.getPriceFromKm(km)
}

function get_tva(infos) {

    return (infos.tva.toFixed(1) / 100) * handle_total_ht(infos)
}

function handle_total_ht(infos) {
    return (infos.price * infos.days) + (handle_package(infos.km) * infos.days)

}

function handle_total_tva(infos) {
    const ht = handle_total_ht(infos)
    return ht + get_tva(infos)
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
    format_date_full,
    to_date,
    curr_date,
    handle_opt,
    upper,
    lower,
    mult,
    handle_day,
    handle_package,
    handle_total_tva,
    handle_total_ht,
    get_tva,
    handle_price
}

