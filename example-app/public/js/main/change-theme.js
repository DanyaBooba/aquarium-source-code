function ButtonAuto() {
    localStorage.removeItem('color-theme');
    CheckColorTheme()
    ThemeColorChange()
}

function ButtonLight() {
    localStorage.setItem('color-theme', 'light');
    CheckColorTheme()
    ThemeColorChange()
}

function ButtonDark() {
    localStorage.setItem('color-theme', 'dark');
    CheckColorTheme()
    ThemeColorChange()
}

function SetButton() {
    const colorTheme = localStorage.getItem('color-theme')

    const handleToggle = (value) => {
        const toggles = document.querySelectorAll('input[name="color-theme"]');
        toggles.forEach(toggle => {
            if(toggle.value == value) {
                toggle.setAttribute("checked", "true");
            }
            else {
                toggle.removeAttribute("checked");
            }
        })
    }

    switch(colorTheme) {
        case null:
            const buttonAuto = document.getElementById('changethemeauto')
            if(buttonAuto) buttonAuto.classList.add('active')
            handleToggle('auto')
            break
        case 'light':
            const buttonLight = document.getElementById('changethemelight')
            if(buttonLight) buttonLight.classList.add('active')
            handleToggle('light')
            break
        case 'dark':
            const buttonDark = document.getElementById('changethemedark')
            if(buttonDark) buttonDark.classList.add('active')
            handleToggle('dark')
            break
    }
}

SetButton()
