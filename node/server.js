'use strict'

const express = require('express')

const PORT = 4242
const HOST = '0.0.0.0'

const app = express();
app.get("/", (req, res) => {
    res.send('Hello');
})
app.listen(PORT,HOST)
