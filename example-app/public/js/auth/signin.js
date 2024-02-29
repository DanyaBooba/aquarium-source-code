let chooseBlockSignin = document.getElementById("signin-choose");
let emailBlockSignin = document.getElementById("signin-email");

function signinBasic() {
    showChoose();
}

function showEmail() {
    chooseBlockSignin.classList.add("d-none");
    emailBlockSignin.classList.remove("d-none");
}

function showChoose() {
    chooseBlockSignin.classList.remove("d-none");
    emailBlockSignin.classList.add("d-none");
}

signinBasic();
