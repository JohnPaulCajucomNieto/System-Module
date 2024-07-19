const a = document.getElementById("bell");
const hs = document.querySelector("#contain");
let ic = true;

a.addEventListener("click", func);

function func() {
    if (ic) {
        hs.style.display = "block";
        ic = false;
    } else {
        hs.style.display = 'none';
        ic = true;
    }
}
