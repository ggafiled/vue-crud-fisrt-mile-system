/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");
import "flag-icon-css/css/flag-icon.css";
import "fullcalendar/dist/fullcalendar.css";

window.Vue = require("vue");
window.axios = require("axios");
const { shortText } = require("limit-text-js");
window.shortText = shortText;
window.translate = require("./VueTranslation/Translation").default.translate;
import moment from "moment";

import { Form, HasError, AlertError } from "vform";
window.Form = Form;

import Gate from "./Gate";
var gate = new Gate("user" in window.Laravel ? window.Laravel.user : []);
Vue.prototype.$gate = gate;

Vue.prototype.$shortText = shortText;

// If you want to use it in your vue components
Vue.prototype.translate = require("./VueTranslation/Translation").default.translate;

import Swal from "sweetalert2";

const Toast = Swal.mixin({
    toast: true,
    position: "bottom-right",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: toast => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    }
});
window.Swal = Swal;
window.Toast = Toast;

import VueMeta from "vue-meta";
Vue.use(VueMeta);

import Vuetify from "vuetify";
Vue.use(Vuetify);

import VueTimeline from "@growthbunker/vuetimeline";
Vue.use(VueTimeline);

/**
 * Custom mixins function to rename title.
 */
import titleMixin from "./partials/mixins/title";
Vue.mixin(titleMixin);

/**
 * FullCalendar imports and assigning
 */
import FullCalendar from "vue-full-calendar";
Vue.use(FullCalendar);

import Select2 from "v-select2-component";

Vue.component("Select2", Select2);

import VueProgressBar from "vue-progressbar";
Vue.use(VueProgressBar, {
    color: "rgb(143, 255, 199)",
    failedColor: "red",
    height: "3px"
});

Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

// ตรงนี้เพิ่มมาเพื่อแก้ปัญาตัว adminlte กับ router-link ไม่ active path ที่มีอะไรต่อท้ายเพิ่มจากที่กำหนดใน adminlte.config ให้
// หากจะใช้ก็แค่เพิ่ม attribute : active_url ในไฟล์ adminlte.config โดยใส่เป็น path เริ่มต้นที่จะให้แมทช์
Vue.directive("active-when", {
    bind(el, binding, vnode) {
        // console.log(binding.expression);
        var regexActiveRoute = new RegExp(
            "/([/]?" + binding.expression + "[/]?([A-Z0-9]*)?)/"
        );
        if (regexActiveRoute.test(window.location.pathname)) {
            // console.log(el);
            $(el).addClass("router-link-exact-active");
        }
    }
});

/**
 * Vuex imports and assigning
 */
import store from "./store/index";

/**
 * Routes imports and assigning
 */
import VueRouter from "vue-router";
Vue.use(VueRouter);
import routes from "./routes";
import Vue from "vue";

const router = new VueRouter({
    mode: "history",
    routes
});
router.beforeEach((to, from, next) => {
    if (
        to.matched.some(route => route.meta.requiresAuth) &&
        !gate.isAuthenticated()
    ) {
        window.location.href = "/login";
        return next(false);
    }

    if (!gate.hasPermissionsNeeded(to)) return next("/dashboard");

    next();
});
// Routes End

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Components
Vue.component("pagination", require("laravel-vue-pagination"));
Vue.component("dashboard", require("./components/Dashboard.vue"));
// Vue.component("building", require("./components/Building.vue"));

Vue.component(
    "passport-clients",
    require("./components/passport/Clients.vue").default
);

Vue.component("app-view", require("./components/App.vue").default);

Vue.component(
    "passport-authorized-clients",
    require("./components/passport/AuthorizedClients.vue").default
);

Vue.component(
    "passport-personal-access-tokens",
    require("./components/passport/PersonalAccessTokens.vue").default
);

Vue.component(
    "window-portal",
    require("./components/partials/WindowPortal.vue").default
);

Vue.component("not-found", require("./components/NotFound.vue").default);

// Filter Section

Vue.filter("myDate", function(created) {
    return moment(created).format("MMMM Do YYYY");
});

Vue.filter("yesno", value =>
    value ?
    '<i class="fas fa-check green"></i>' :
    '<i class="fas fa-times red"></i>'
);

// end Filter

const app = new Vue({
    el: "#app",
    store,
    router,
    vuetify: new Vuetify()
});

let pusher = new Pusher("914457", {
    cluster: "ap1",
    encrypted: false
});

//Subscribe to the channel we specified in our Adonis Application
let channel = pusher.subscribe("building-channel");

channel.bind("new-building", data => {
    app.$store.commit("ADD_BUILDINGS", data.building);
});
