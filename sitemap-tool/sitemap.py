import asyncio
from time import sleep
from pyppeteer import launch

async def main():
    browser = await launch()

    page = await browser.newPage()

    await page.setUserAgent("Mozilla/5.0 (Windows NT 10.0; Win64; x64)")

    await page.goto('https://my.ucf.edu/')

    await page.click('form button')
    #await page.waitForNavigation()

    #await page.goto('https://idp-prod.cc.ucf.edu/idp/profile/SAML2/Redirect/SSO?execution=e3s1')

    #await page.focus('#username')

    await page.waitForSelector('#username')
    await page.type('#username', 'be322473')

    await page.type('#password', "")

    await page.click('.btn')

    await page.waitForNavigation({ 'waitUntil': 'networkidle0'})

    await page.waitForSelector('#fldra_FX_STUDENT_SLFSRV_MENU_90')
    
    #await page.click('#fldra_FX_STUDENT_SLFSRV_MENU_90')

    await page.screenshot({'path': 'page.png'})
    await browser.close()

asyncio.get_event_loop().run_until_complete(main())