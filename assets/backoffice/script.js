// SCRIPT ACCORDEON MENU

var buttons = document.querySelectorAll(".accordion");
var i;

for (i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener("click",showAccordion);

    function showAccordion() {
        this.classList.toggle("active");
        var accordionContent = this.nextElementSibling;

        if (accordionContent.style.display === "block") {
            accordionContent.style.display = "none";
        } else {
            accordionContent.style.display = "block";
        }
    }
}