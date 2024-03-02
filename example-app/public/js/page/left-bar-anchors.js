let svgAnchor =
    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>';

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
        title.classList.add("title-anchor");
        title.innerHTML = `<a href='#${title.id}'
            onClick='copyLink("${window.location.href}#${title.id}")'>
            ${svgAnchor}</a>${title.innerHTML}`;
    });
}

function copyLink(link) {
    navigator.clipboard.writeText(link);
}

anchors();
