function showAvatar() {
    const upload = document.getElementById('avatar-upload-block')
    if (upload) upload.classList.remove('d-none')

    const input = document.getElementById('avatar-upload-input')
    if (input) input.classList.add('d-none')
}

function hideAvatar() {
    const upload = document.getElementById('avatar-upload-block')
    if (upload) upload.classList.add('d-none')

    const input = document.getElementById('avatar-upload-input')
    if (input) input.classList.remove('d-none')
}

function showCap() {
    const upload = document.getElementById('cap-upload-block')
    if (upload) upload.classList.remove('d-none')

    const input = document.getElementById('cap-upload-input')
    if (input) input.classList.add('d-none')
}

function hideCap() {
    const upload = document.getElementById('cap-upload-block')
    if (upload) upload.classList.add('d-none')

    const input = document.getElementById('cap-upload-input')
    if (input) input.classList.remove('d-none')
}

hideAvatar()
hideCap()
