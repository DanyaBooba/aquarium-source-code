function appearanceShow(blockId) {
    const block = document.getElementById(blockId)
    if (block) block.classList.remove('d-none')
}

function appearanceHide(blockId) {
    const block = document.getElementById(blockId)
    if (block) block.classList.add('d-none')
}

function getAvatar() {
    console.log('avatar')
    appearanceShow('avatar-upload-block')
    appearanceHide('avatar-upload-input')

    appearanceHide('cap-upload-block')
    appearanceHide('cap-upload-input')
    appearanceShow('cap-upload-empty')
}

function getCap() {
    console.log('cap')
    appearanceShow('cap-upload-block')
    appearanceHide('cap-upload-input')

    appearanceHide('avatar-upload-block')
    appearanceHide('avatar-upload-input')
    appearanceShow('avatar-upload-empty')
}
