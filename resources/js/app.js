document.addEventListener("DOMContentLoaded", function() {
    let removeTaste = window.setTimeout(function () {
        let taste = document.getElementById("taste");

        if (taste) {
            taste.classList.add('hide');

            window.setTimeout(function () {
                taste.remove();
            }, 400);
        }
    }, 6000);

    let close = document.getElementById('dialog-close');

    if (close) {
        close.addEventListener('click', function () {
            let dialog = document.getElementById('dialog');

            if (dialog) {
                window.setTimeout(function () {
                    dialog.classList.add('hide');
                    document.body.classList.remove('active-dialog');
                    dialog.remove();
                }, 400);
            }
        }, false)
    }
});