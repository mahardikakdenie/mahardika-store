import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import axios from "axios";
import "sweetalert2/dist/sweetalert2.min.css";
import VueSweetalert2 from "vue-sweetalert2";
import store from './store'

Vue.use(axios);
Vue.use(VueSweetalert2);

Vue.config.productionTip = false;

new Vue({
  router,
  store,
  render: (h) => h(App)
}).$mount("#app");
