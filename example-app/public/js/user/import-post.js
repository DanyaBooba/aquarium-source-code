function chooseChange(current) {
    switch (current) {
        case 'telegram':
            document.getElementById('choose-telegram').classList.add('active')
            document.getElementById('choose-vk').classList.remove('active')
            break
        case 'vk':
            document.getElementById('choose-vk').classList.add('active')
            document.getElementById('choose-telegram').classList.remove('active')
            break
    }
}

chooseChange('telegram')
