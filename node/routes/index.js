const express = require("express")
const bill = require("../schemas/bill")
const {Validator} = require("express-json-validator-middleware")
const {compileTemplate, genPdfFromHtml} = require("../services/pdf-service")

const router = express.Router();
const {validate} = new Validator();

router.get('/bill', validate({body: bill}), (req, res) => {
    let html = compileTemplate(req.body, "bill.hbs")
    genPdfFromHtml(html)
        .then(r => res.json({"data": "pdf done"}))
        .catch(e => res.json({"data": e}))

});


module.exports = router