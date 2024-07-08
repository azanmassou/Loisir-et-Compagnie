import "./bootstrap";

window.addEventListener("load", function () {
    // Script Preloader
    var preloader = document.getElementById("preloader");
    preloader.style.display = "none";
});

function currentTime() {
    setInterval(() => {
        let date = new Date();

        let datePerso = date.toLocaleString("fr-FR", {
            weekday: "short",
            day: "numeric",
            month: "short",
            year: "2-digit",
            hour: "numeric",
            minute: "numeric",
            second: "numeric",
        });
        document.getElementById("current-time").innerHTML = datePerso;
    }, 1);
}

currentTime();
