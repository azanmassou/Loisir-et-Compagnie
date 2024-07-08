import "./bootstrap";
import "./like";
import "./admin/vendor.bundle.base.js";
import "./admin/dashboard.js";
import "./admin/todolist.js";
import "./admin/jquery.cookie.js";
import "./admin/Chart.min.js";

function dateNow() {
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
        document.getElementById("p").innerHTML = datePerso;
    }, 1);
}

dateNow();

console.log("happy");
