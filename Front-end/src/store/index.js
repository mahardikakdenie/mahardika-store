import Vue from "vue";
import Vuex from "vuex";
import createPersistedState from "vuex-persistedstate";
import auth from "./auth";
import cart from "./cart";
import products from "./product/index";
import transaction from "./transaction";

Vue.use(Vuex);

/* eslint-disable no-new */
const store = new Vuex.Store({
  plugins: [createPersistedState()],
  modules: {
    auth: auth,
    product: products,
    cart: cart,
    transaction: transaction,
  },
});

export default store;
