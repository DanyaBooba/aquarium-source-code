function ThemeColorChange() {
    const style = window.getComputedStyle(document.body)
    const newColorThemeColor = style.getPropertyValue('--page-main-accent')

    const themeColor = document.querySelector('head meta[name="theme-color"]')
    themeColor.content = newColorThemeColor ? newColorThemeColor : '#8D77FE'
}

ThemeColorChange()
