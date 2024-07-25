function profileContentDetectWrap() {
    const content = document.querySelector('.user-profile-content')
    if (content.offsetHeight > 120) {
        console.log('wrap!')
    }
    else {
        console.log('no wrap!')
    }
}

profileContentDetectWrap()
