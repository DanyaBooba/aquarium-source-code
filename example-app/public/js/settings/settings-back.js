let changeForm = false;

let elementModal = document.querySelector("#exitModal");
let form = document.querySelector("form");
let modal;

if (elementModal) {
    modal = new bootstrap.Modal(elementModal);
}

function data() {
    changeForm = true;

    // window.addEventListener("beforeunload", (e) => {
    //     e.preventDefault();
    //     e.returnValue = true;
    // });
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

function sendForm() {
    // window.removeEventListener("beforeunload", (e) => {
    //     e.preventDefault();
    //     e.returnValue = true;
    // });

    form.submit();
}

function sendDiscardForm(route) {
    window.open(route, "_self");
}
