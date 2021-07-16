window._ = require("lodash");

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require("popper.js").default;
    window.$ = window.jQuery = require("jquery");

    require("bootstrap");
    require("admin-lte");
    require("bootstrap-select");

    require("bootstrap-select/js/i18n/defaults-de_DE");

    var dt = require("datatables.net-dt");
    var buttons = require("datatables.net-buttons")();
    require("datatables.net-buttons/js/buttons.colVis.js")();
    require("datatables.net-buttons/js/buttons.html5.js")();
    require("datatables.net-buttons/js/buttons.flash.js")();
    require("datatables.net-buttons/js/buttons.print.js")();
    require("datatables.net-fixedcolumns");
    require("datatables.net-dt/css/jquery.datatables.css");
    require("datatables.net-select");

    //Custom theme
    require("datatables.net-buttons-dt/css/buttons.datatables.css");
    require("jquery-datatables-checkboxes");

    //Bootstrap icon
    require("bootstrap-icons/font/bootstrap-icons.css");
    require("jquery-contextmenu");
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
window.axios.defaults.headers.common.crossDomain = true;
// window.axios.defaults.baseURL = "/api";

$.ajaxSetup({
    headers: {
        "X-Requested-With": "XMLHttpRequest",
        crossDomain: true,
        "X-CSRF-TOKEN": document.head.querySelector('meta[name="csrf-token"]')
            .content
    }
});

window.moment = require("moment");
/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common["X-CSRF-TOKEN"] = token.content;
} else {
    console.error(
        "CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token"
    );
}

window.Pusher = require("pusher-js");