let users = document.querySelectorAll(
    "div.container div.user-search-users div"
);

let searchInput = document.querySelector("input[type='search']");

let searchEmptyField = document.getElementById("search-empty-field");

function searchGetInput() {
    return searchInput.value ? searchInput.value.toLowerCase() : null;
}

function searchCheckInclude(data) {
    return data.toLowerCase().includes(searchGetInput());
}

function searchUsersActive() {
    let count = 0;
    users.forEach((data) => {
        if (
            searchCheckInclude(data.getAttribute("name")) ||
            searchCheckInclude(data.getAttribute("desc")) ||
            searchCheckInclude(data.getAttribute("username"))
        ) {
            data.classList.remove("d-none");
            count += 1;
        } else {
            data.classList.add("d-none");
        }
    });

    return count;
}

function searchSeeAll() {
    users.forEach((data) => {
        data.classList.remove("d-none");
    });
}

function searchOnInput() {
    if (searchGetInput() !== null) {
        let count = searchUsersActive();

        count
            ? searchEmptyField.classList.add("d-none")
            : searchEmptyField.classList.remove("d-none");
    } else {
        searchSeeAll();
        searchEmptyField.classList.add("d-none");
    }
}
