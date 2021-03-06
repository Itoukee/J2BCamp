const express = require("express")
const bill = require("../schemas/bill")
const {Validator} = require("express-json-validator-middleware")
const {compileTemplate, genPdfFromHtml, OUTPUT_PATH} = require("../services/pdf-service")
const path = require("path");

const router = express.Router();
const {validate} = new Validator();

router.get('/bill', validate({body: bill}), (req, res) => {
    //on compile le template avec les données
    let html = compileTemplate(req.body, "bill.hbs")
    let opt = {
        root: path.dirname(require.main.filename)
    }
    //on genere le pdf
    genPdfFromHtml(html)
        .then(r => {
            //on envoie directement le pdf en binaire en tant que reponse(generé auparavant)
            res.sendFile(OUTPUT_PATH, opt, function (err) {
                if (err) {
                    console.log("Error", err)
                    res.status(400).send({
                        err

                    })
                } else {
                    console.log("Sent:", OUTPUT_PATH)
                }
            })
        })
        .catch(e => res.json({"data": "error"}))
});


module.exports = router