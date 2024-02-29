function clearLink(text) {
    var text = text.toLowerCase();

    text = text.replaceAll(" ", "");
    text = text.replaceAll(".", "");
    text = text.replaceAll("«", "");
    text = text.replaceAll("»", "");
    text = text.replaceAll("_", "");
    text = text.replaceAll(",", "");

    return text;
}

function anchors() {
    let list = document.getElementById("left-bar-anchors");

    if (!list) return;

    document.querySelectorAll("h2, h3, h4, h5, h6").forEach((title) => {
        title.id = clearLink(title.textContent);
        list.insertAdjacentHTML(
            "beforeend",
            `<li><a href='#${title.id}'>${title.textContent}</a></li>`
        );
        title.innerHTML += " <a href='#" + title.id + "'>#</a>";
    });
}

anchors();
