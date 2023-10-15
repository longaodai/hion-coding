$(document).ready(function () {
    var $backToTopButton = $('#backToTopButton');

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $backToTopButton.show();
        } else {
            $backToTopButton.hide();
        }
    });

    $backToTopButton.click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 1000);
    });
});
