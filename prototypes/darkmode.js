document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("darkmode").style.display = "none";
    document.getElementById("lightmode").style.display = "initial";
  });
let dark = false;
function swapStyleSheet(sheet) {
    if (dark) {
        document.getElementById("darkmode").style.display = "none";
        document.getElementById("pagestyle").setAttribute("href", "./base.css");
        document.getElementById("lightmode").style.display = "initial";
        dark = false;
        return;
    }
    if (!(dark)) {
        document.getElementById("lightmode").style.display = "none";
        document.getElementById("pagestyle").setAttribute("href", "./dark.css");
        document.getElementById("darkmode").style.display = "initial";
        dark = true;
        return;
    }
}