const express = require("express")
const bill = require("../schemas/bill")
const {Validator} = require("express-json-validator-middleware")
const router = express.Router();
const {validate} = new Validator();

router.get('/bill', validate({body: bill}), (req, res, next) => {
    res.send(`you are ${req.body.id_bill}`)
    next();

})

module.exports = router