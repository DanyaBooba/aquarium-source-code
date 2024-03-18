let chooseBlockSignin = document.getElementById("signin-choose");
let emailBlockSignin = document.getElementById("signin-email");

function showEmail() {
    if (chooseBlockSignin) chooseBlockSignin.classList.add("d-none");
    if (emailBlockSignin) emailBlockSignin.classList.remove("d-none");
}

function showChoose() {
    if (chooseBlockSignin) chooseBlockSignin.classList.remove("d-none");
    if (emailBlockSignin) emailBlockSignin.classList.add("d-none");
}

showChoose();
