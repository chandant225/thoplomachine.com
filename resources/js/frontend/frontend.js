require("../bootstrap");

window.Vue = require("vue").default;

Vue.component("logo", require("../components/logo.vue").default);
Vue.component("portfolio", require("./portfolio/portfolio.vue").default);
Vue.component("newsletter", require("./newsletter.vue").default);
Vue.component("search", require("./search.vue").default);

Vue.use(require("vue-moment"));

const app = new Vue({
    el: "#app"
});
