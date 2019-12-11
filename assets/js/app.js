// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.css');

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');

import Vue from "vue";
import App from "./vue/App"

new Vue({
    components: { App },
    template: "<App/>"
}).$mount("#app");