function checkClosedAlerts() {
    let alerts = JSON.parse(localStorage.getItem("alerts_closed") ?? "[]");

    if (alerts.length > 0) {
        alerts.forEach((item) => {
            let find = document.getElementById(item);

            find?.classList.add("d-none");
        });
    }
}

function alertClose(id) {
    let find = document.getElementById(id);

    if (!find) return;

    let alerts = JSON.parse(localStorage.getItem("alerts_closed") ?? "[]");

    if (alerts.indexOf(id) < 0) alerts.push(id);

    localStorage.setItem("alerts_closed", JSON.stringify(alerts));
}

checkClosedAlerts();
