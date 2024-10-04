const inputChoose = document.querySelector('.import-post__link input')

function chooseChange(current) {

    switch (current) {
        case 'telegram':
            document.getElementById('choose-telegram').classList.add('active')
            document.getElementById('choose-vk').classList.remove('active')
            inputChoose.placeholder = 'https://telegram.org/...'
            break
        case 'vk':
            document.getElementById('choose-vk').classList.add('active')
            document.getElementById('choose-telegram').classList.remove('active')
            inputChoose.placeholder = 'https://vk.com/...'
            break
    }

}

function sendLink() {

}

chooseChange('telegram')
