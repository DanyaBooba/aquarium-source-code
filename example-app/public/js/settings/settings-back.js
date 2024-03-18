let elementModal = document.querySelector("#exitModal");
let modal;

if (elementModal) {
    modal = new bootstrap.Modal(elementModal);
}

if (modal) {
    modal.show();
}

let changeForm = false;

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

function settingsConfirmForm() {
    console.log("confirm form");
}
