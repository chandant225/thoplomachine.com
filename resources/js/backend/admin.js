require("../bootstrap");

window.Vue = require("vue").default;

// backend components-------------------------------------------------------
Vue.component("contacts-component", require("./settings/contact.vue").default);
Vue.component("news-letter-component", require("./settings/newsletter").default);
// blog
Vue.component("blog-component", require("./pages/blog/Blog.vue").default);
Vue.component("blog-category-component", require("./pages/blog/Category.vue").default);
// portfolio
Vue.component("portfolio-component", require("./pages/portfolio/Portfolio.vue").default);
Vue.component(
    "portfolio-category-component",
    require("./pages/portfolio/category.vue").default
);

Vue.component("faq-component", require("./pages/faq/faq.vue").default);
Vue.component("faq-category-component", require("./pages/faq/category.vue").default);
// services
Vue.component("service-component", require("./pages/service/Service.vue").default);
Vue.component(
    "service-category",
    require("./pages/service/category.vue").default
);

// api management
Vue.component(
    "api-management",
    require("./settings/api-management.vue").default
);
// analytics
Vue.component("analytics", require("./settings/analytics").default);
// script
Vue.component("header-script", require("./settings/script").default);
// info----
// terms & condition - policies tec
Vue.component("infos", require("./info/infos").default);
// our teams
Vue.component("our-teams-component", require("./info/OurTeams").default);

Vue.component("logo", require("../components/logo.vue").default);

// global components
import { BootstrapVue } from "bootstrap-vue";
import FlashMessage from "@smartweb/vue-flash-message";
import Multiselect from "vue-multiselect";

Vue.component("pagination", require("laravel-vue-pagination"));
Vue.use(BootstrapVue);
Vue.use(FlashMessage);
Vue.use(require("vue-moment"));
Vue.component("multiselect", Multiselect);

import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';


import VueConfirmDialog from 'vue-confirm-dialog'

Vue.use(VueConfirmDialog)
Vue.component('vue-confirm-dialog', VueConfirmDialog.default)


Vue.use(VueToast);


const app = new Vue({
    el: "#app"
});
