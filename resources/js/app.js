document.addEventListener("DOMContentLoaded", function() {
    let removeTaste = window.setTimeout(function () {
        let taste = document.getElementById("taste");

        taste.classList.add('hide');

        window.setTimeout(function () {
            taste.remove();
        }, 400)
    }, 6000);
});