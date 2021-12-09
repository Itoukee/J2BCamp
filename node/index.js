"use strict";

const express = require("express");
const router = require("./routes");
const {ValidationError} = require("express-json-validator-middleware");
const {getPriceFromKm} = require("./services/package-service");
const path = require("path");
const port = process.env.PORT;
const app = express();
app.use(express.static(__dirname + '/public'));
app.use(express.json());
app.use(router);
app.use((err, req, resp, next) => {
    if (err instanceof ValidationError) {
        resp.status(400).send(err.validationErrors);
        next();
    } else {
        next(err);
    }
});
app.listen(port, function () {
    console.log(`app listen ${port}`);
});
