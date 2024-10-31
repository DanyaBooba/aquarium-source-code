let inputs = document.querySelectorAll('#signin-email form input')
let button = document.querySelector('#signin-email form button:not(.button-submit-code)[type="submit"]')

function checkFormInput() {
    let status = true
    inputs.forEach(input => {
        if (['email', 'password', 'text'].includes(input.type) && input.value.length <= 2) status = false
        if (input.type === 'checkbox' && input.value === 'privacy' && !input.checked) status =  false
    })

    return status
}

function checkOnInput() {
    if (!button) return

    checkFormInput()
            ? button.removeAttribute('disabled')
            : button.setAttribute('disabled', true)
}

checkOnInput()
