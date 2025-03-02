function CheckColorTheme() {
    const colorTheme = localStorage.getItem('color-theme')

    if(colorTheme === null) return

    const darkMedia = document.getElementById('stylesheetdark')
    const darkMediaBase = document.getElementById('stylesheetdark_base')
    const lightMedia = document.getElementById('stylesheetlight')
    const lightMediaBase = document.getElementById('stylesheetlight_base')

    if(colorTheme === 'dark') {
        lightMedia.media = "not all"
        lightMediaBase.media = "not all"
        darkMedia.media = "all"
        darkMediaBase.media = "all"
    }
    else if(colorTheme === 'light') {
        lightMedia.media = "all"
        lightMediaBase.media = "all"
        darkMedia.media = "not all"
        darkMediaBase.media = "not all"
    }
}

CheckColorTheme()
