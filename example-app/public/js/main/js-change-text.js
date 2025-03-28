const listRu = [
    'красивая',
    'удобная',
    'современная',
    'доступная',
    'свободная'
]

const listEn = [
    'beautiful',
    'handy',
    'modern',
    'available',
    'free'
]

function random(min, max) {
    return Math.floor(Math.random() * (max - min) + min)
}

const textToChange = document.getElementById('js-change')
const locale = document.querySelector('html').lang.toLowerCase()
let startIndexList = random(-1, listRu.length - 1)

function textValue() {
    startIndexList += 1
    if (startIndexList >= listEn.length) startIndexList = 0

    switch (locale) {
        case 'ru':
            return listRu[startIndexList]
        default:
            return listEn[startIndexList]
    }
}

function delay(ms) {
    return new Promise((res) => setTimeout(res, ms))
}

const changeText = async () => {
    let d = random(50, 60)

    while (true) {
        await delay(3000)

        while (textToChange.textContent.length > 0) {
            let temp = textToChange.textContent
            textToChange.textContent = temp.substring(0, temp.length - 1)
            await delay(d)
        }

        let chooseText = textValue()
        let num = 1

        while (textToChange.textContent != chooseText) {
            textToChange.textContent = chooseText.substring(0, num)
            num += 1
            await delay(d)
        }
    }
};

function startChangeText() {
    if (!textToChange) return

    textToChange.textContent = textValue()
    changeText()
}

startChangeText()
