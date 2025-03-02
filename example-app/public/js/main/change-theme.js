function ButtonAuto() {
    localStorage.removeItem('color-theme');
}

function ButtonLight() {
    localStorage.setItem('color-theme', 'light');
}

function ButtonDark() {
    localStorage.setItem('color-theme', 'dark');
}

function SetButton() {
    const colorTheme = localStorage.getItem('color-theme')

    switch(colorTheme) {
        case null:
            const buttonAuto = document.getElementById('changethemeauto')
            if(buttonAuto) buttonAuto.classList.add('active')
            break
        case 'light':
            const buttonLight = document.getElementById('changethemelight')
            if(buttonLight) buttonLight.classList.add('active')
            break
        case 'dark':
            const buttonDark = document.getElementById('changethemedark')
            if(buttonDark) buttonDark.classList.add('active')
            break
    }
}

SetButton()
