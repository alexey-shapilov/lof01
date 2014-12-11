$(document).ready(function () {
    var media_query_lt320 = window.matchMedia("screen and (min-width : 321px)");
    var media_query_lt960 = window.matchMedia("screen and (min-width : 960px)");

    if (media_query_lt320.matches) {
        var social = $('#social-block');
        social.detach();
        social.insertAfter('#header-block');
    }

    if (media_query_lt960.matches) {
        var contacts = $('#contacts-block');
        contacts.detach();
        contacts.appendTo('#nav-block');
    }
});