let changeForm = false;

let elementModal = document.querySelector("#exitModal");
let modal;

if (elementModal) {
    modal = new bootstrap.Modal(elementModal);
}

function settingsSetChangeFormTrue() {
    changeForm = true;
}

function settingsLinkBack(route) {
    if (!changeForm) {
        window.open(route, "_self");
    } else {
        if (modal) {
            modal.show();
        }
    }
}

function settingsConfirmForm(route) {
    if (!changeForm) {
        window.open(route, "_self");
    } else {
        if (modal) {
            modal.show();
        }
    }
}
