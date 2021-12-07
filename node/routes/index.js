const express = require("express")
const {Validator} = require("express-json-validator-middleware")

const router = express.Router();
const {validate} = new Validator();
const userSchema = {
    type: "object",
    required: ["user"],
    properties: {
        "user": {
            type: "object",
            required: ["first_name", "last_name"],
            properties: {
                "first_name": {
                    type: "string",
                    minLength: 2,
                },
                "last_name": {
                    type: "string",
                    minLength: 2,
                },
                "age": {
                    type: "integer",
                    minimum: 18,
                },
                // "email": {
                //     type: "email"
                // }
            }
        }

    }

}
router.get('/bill', validate({body: userSchema}), (req, res, next) => {
    const user = req.body.user
    res.send(`you are ${user.first_name}`)
    next();

})

module.exports = router