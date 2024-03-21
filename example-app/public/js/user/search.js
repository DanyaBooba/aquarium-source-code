let users = document.querySelectorAll(
    "div.container div.user-search-users div"
);

let searchInput = document.querySelector("input[type='search']");
let searchEmptyField = document.getElementById("search-empty-field");
let selectInput = document.querySelector(".user-search select");

function searchCorrectUser(user, search, select) {
    let name = user.getAttribute("name");
    let username = user.getAttribute("username");
    let desc = user.getAttribute("desc");
    let sex = user.getAttribute("sex");

    let checkSearch =
        search === null
            ? true
            : name.toLowerCase().includes(search) ||
              username.toLowerCase().includes(search) ||
              desc.toLowerCase().includes(search);
    let checkSelect = select === true ? true : sex === select;

    return checkSearch && checkSelect;
}

function search() {
    let search = searchInput.value ? searchInput.value.toLowerCase() : null;
    let select = selectInput.value === "any" ? true : selectInput.value;

    let count = 0;
    users.forEach((user) => {
        if (searchCorrectUser(user, search, select)) {
            count += 1;
            user.classList.remove("d-none");
        } else {
            console.log("not");
            user.classList.add("d-none");
        }
    });

    if (count === 0) {
        searchEmptyField.classList.remove("d-none");
    } else {
        searchEmptyField.classList.add("d-none");
    }
}

function searchDropFilter() {
    searchInput.value = null;
    selectInput.value = "any";
    search();
}

function searchOnInput() {
    search();
}

function selectOnInput() {
    search();
}
