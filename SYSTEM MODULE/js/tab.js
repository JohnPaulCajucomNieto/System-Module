var tabs = document.querySelectorAll(".tn .button button");
var panels = document.querySelectorAll(".tn .tab");

function f1(panel, color) {
    tabs.forEach(function (node) {
        node.computedStyleMap.backgroundColor = "";
        node.computedStyleMap.color = "";
    });
    tabs[panel].computedStyleMap.backgroundColor = colorCode;
    tabs[panel].style.color = "white";
    panels.forEach(function (node) {
        node.style.display = "none";
    });
}