import asyncio
from time import sleep
from pyppeteer import launch

links = set()

async def scanForLinks(page):
    global links
    # Refresh and parse anchors
    all_anchors = await page.querySelectorAll('a')
    for anchor in all_anchors:
        anchor_href = await anchor.getProperty('href')
        anchor_text = await anchor.getProperty('textContent')
        href_value = await anchor_href.jsonValue()
        text_value = await anchor_text.jsonValue()
        if href_value != "" or text_value != "":
            links.add((text_value, href_value))
            #links.add(""+text_value+" => "+href_value)

async def expandToggles(page, exec):
    # Expand all sections (only works one by one...)
    nav_toggles = await page.querySelectorAll('.ptnav2toggle')
    for toggle in nav_toggles:
        await toggle.hover()
        await toggle.click()

        await page.waitFor(1000)

        await page.screenshot({'path': 'page1.png', 'fullPage': True})

        await exec(page)

        nav_toggles2 = await page.querySelectorAll('.ptnav2toggle')
        for toggle2 in nav_toggles2:
                await toggle2.hover()
                await toggle2.click()

                await page.waitFor(1000)

                await page.screenshot({'path': 'page1.png', 'fullPage': True})

                await exec(page)

async def main():
    global links

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

    try:
        with open("./password","r") as file:
            file.seek(0)
            password = file.readline()
            await page.type('#password', password)
    except:
        print("Please put your password in a text file named 'password' (no extension.)")

    await page.click('.btn')

    await page.waitForNavigation({ 'waitUntil': 'networkidle0'})

    await page.waitForSelector('#fldra_FX_STUDENT_SLFSRV_MENU_90')
    
    #await page.click('#fldra_FX_STUDENT_SLFSRV_MENU_90')

    await page.screenshot({'path': 'page.png', 'fullPage': True})

    await expandToggles(page, scanForLinks)

    for link in links:
        print(link)
    print("Found %s unique links." % (len(links)))

    await browser.close()

asyncio.get_event_loop().run_until_complete(main())