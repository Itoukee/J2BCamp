const handlebars = require("handlebars")
const puppeteer = require("puppeteer")
const fs = require("fs");
const path = require("path");
const VIEWS_FOLDER = "views"
const pdf_options = {
    format: 'a4',
    displayHeaderFooter: false,
    margin: {
        top: "40px",
        bottom: "100px"
    },
    printBackground: true,
    path: 'invoice.pdf'
}
handlebars.registerHelper("log", function (str) {
    console.log(str)
})

function compileTemplate(data, template_name) {
    let full_path = path.join(process.cwd(), VIEWS_FOLDER, template_name)
    let templateRaw = fs.readFileSync(full_path, "utf-8");
    let template = handlebars.compile(templateRaw);
    return encodeURI(template(data));
}

async function genPdfFromHtml(html) {
    try{
        console.log(process.env.CHROME_BIN)
        // const browser = await puppeteer.launch({
        //     args: ["--no-sandbox",'--headless'],
        // })
        // const page = await browser.newPage();
        // await page.goto(`data:text/html;charset=UTF-8,${html}`,{
        //     waitUntil: 'networkidle0'
        // })
        // await page.pdf(pdf_options)
        // await browser.close()
        console.log("created pdf")
    }catch (err){
        console.log("error:",err)
    }

}

module.exports = {compileTemplate, genPdfFromHtml}