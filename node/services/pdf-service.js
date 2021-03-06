const handlebars = require("handlebars")
const helpers = require("../helpers/hbs_helper")
const puppeteer = require("puppeteer")
const fs = require("fs");
require('dayjs/locale/fr')
const dayjs = require("dayjs")
const path = require("path");
const VIEWS_FOLDER = "views"
const OUTPUT_PATH = "invoice.pdf"
const pdf_options = {
    format: 'a4',
    displayHeaderFooter: false,
    preferCSSPageSize: true,
    printBackground: true,
    path: OUTPUT_PATH
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
        //on crée tout d'abord un "navigateur" factice
        const browser = await puppeteer.launch({
            args: [
                '--headless',
                '--no-sandbox',
                '--disable-setuid-sandbox',
                '--disable-web-security'
            ]
        })
        //on crée une page en emulant un écran et on y insère le template genére
        const page = await browser.newPage();
        await page.emulateMediaType('screen');
        await page.goto(`data:text/html;charset=UTF-8,${html}`, {
            waitUntil: 'networkidle2'
        })
        //qu'on convertie en pdf par la suite
        await page.pdf(pdf_options)
        await browser.close()
        console.log("created pdf")
    } catch (err) {
        console.log("error:", err)
    }

}

module.exports = {compileTemplate, genPdfFromHtml, OUTPUT_PATH}