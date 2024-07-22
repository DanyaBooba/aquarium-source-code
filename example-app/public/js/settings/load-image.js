function showAvatar() {
    const upload = document.getElementById('block-upload-demo')
    if (upload) upload.classList.remove('d-none')

    const input = document.getElementById('block-upload-input')
    if (input) input.classList.add('d-none')
}

function hideAvatar() {
    const upload = document.getElementById('block-upload-demo')
    if (upload) upload.classList.add('d-none')

    const input = document.getElementById('block-upload-input')
    if (input) input.classList.remove('d-none')
}

hideAvatar()
