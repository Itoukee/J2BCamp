const handlebars = require("handlebars")
const helpers = require("../helpers/hbs_helper")
const puppeteer = require("puppeteer")
const fs = require("fs");
require('dayjs/locale/fr')
const dayjs = require("dayjs")
const path = require("path");
const VIEWS_FOLDER = "views"
const pdf_options = {
    format: 'a4',
    displayHeaderFooter: false,
    margin: {
        top: "70px",
        bottom: "70px",
        right: "50px",
        left: "50px"
    },
    preferCSSPageSize: true,
    printBackground: true,
    path: 'invoice.pdf'
}
dayjs.locale("fr")
handlebars.registerHelper(helpers);
function compileTemplate(data, template_name) {
    let full_path = path.join(process.cwd(), VIEWS_FOLDER, template_name)
    let templateRaw = fs.readFileSync(full_path, "utf-8");
    let template = handlebars.compile(templateRaw);
    return encodeURI(template(data));
}

async function genPdfFromHtml(html) {
    try {
        const browser = await puppeteer.launch({

            args: [
                '--headless',
                '--no-sandbox',
                '--disable-setuid-sandbox',
                '--disable-web-security'
            ]
        })
        const page = await browser.newPage();
        await page.emulateMediaType('screen');
        await page.goto(`data:text/html;charset=UTF-8,${html}`, {
            waitUntil: 'networkidle2'
        })
        await page.pdf(pdf_options)
        await browser.close()
        console.log("created pdf")
    } catch (err) {
        console.log("error:", err)
    }

}

module.exports = {compileTemplate, genPdfFromHtml}