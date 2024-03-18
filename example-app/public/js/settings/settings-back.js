let changeForm = false;

function settingsSetChangeFormTrue() {
    changeForm = true;
}

function settingsCheckChangeForm() {
    changeForm = !changeForm;
}

function settingsLinkBack(route) {
    settingsCheckChangeForm();
    console.log("go back: " + !changeForm);

    // window.open(route, "_self");
}

function settingsConfirmForm() {
    console.log("confirm form");
}
