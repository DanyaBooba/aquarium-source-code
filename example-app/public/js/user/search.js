let users = document.querySelectorAll(
    "div.container div.user-search-users div"
);

let searchInput = document.querySelector("input[type='search']");

let searchEmptyField = document.getElementById("search-empty-field");

function searchGetInput() {
    return searchInput.value ? searchInput.value.toLowerCase() : null;
}

function searchUsersActive() {
    let count = 0;
    users.forEach((data) => {
        if (
            data
                .getAttribute("name")
                .toLowerCase()
                .includes(searchGetInput()) ||
            data.getAttribute("desc").toLowerCase().includes(searchGetInput())
        ) {
            data.classList.remove("d-none");
            count += 1;
        } else {
            data.classList.add("d-none");
        }
    });

    return count;
}

function searchOnInput() {
    if (searchGetInput() !== null) {
        let count = searchUsersActive();

        count
            ? searchEmptyField.classList.add("d-none")
            : searchEmptyField.classList.remove("d-none");
    }
}
