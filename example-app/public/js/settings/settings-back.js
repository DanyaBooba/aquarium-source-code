let changeForm = false;

function settingsSetChangeFormTrue() {
    changeForm = true;
}

function settingsLinkBack(route) {
    if (!changeForm) {
        window.open(route, "_self");
    } else {
        alert("no!");
    }
}

function settingsConfirmForm() {
    console.log("confirm form");
}
