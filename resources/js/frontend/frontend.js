require("../bootstrap");

window.Vue = require("vue").default;

Vue.component("portfolio", require("./portfolio/portfolio.vue").default);
Vue.component("newsletter-component", require("./newsletter.vue").default);
Vue.component("search", require("./search.vue").default);

Vue.use(require("vue-moment"));


import VueToast from 'vue-toast-notification';
// Import one of the available themes
//import 'vue-toast-notification/dist/theme-default.css';
import 'vue-toast-notification/dist/theme-sugar.css';

Vue.use(VueToast);

const app = new Vue({
    el: "#app"
});
