import axios from "axios";

export default {
  namespaced: true,
  state: {
    data: [],
    show: {},
  },
  mutations: {
    GET_DATA: (state, payload) => (state.data = payload),
    GET_SHOW: (state, payload) => (state.show = payload),
  },
  actions: {
    getDataProduct: ({ commit }, payload) => {
      axios.defaults.headers.common.Authorization =
        "Bearer " + localStorage.getItem("access_token");
      axios.defaults.baseURL = process.env.VUE_APP_API_URL;

      return new Promise((resolve, reject) => {
        const params = { ...payload };
        axios
          .get("product", { params: params })
          .then((res) => {
            commit("GET_DATA", res.data.data);
            resolve(res);
          })
          .catch((e) => {
            reject(e);
          });
      });
    },
    getShowProduct: ({ commit }, payload) => {
      axios.defaults.headers.common.Authorization =
        "Bearer " + localStorage.getItem("access_token");
      axios.defaults.baseURL = process.env.VUE_APP_API_URL;

      return new Promise((resolve, reject) => {
        const params = { ...payload };
        axios
          .get(`product/${payload.id}`, { params: params })
          .then((res) => {
            commit("GET_SHOW", res.data.data);
            resolve(res);
          })
          .catch((e) => {
            reject(e);
          });
      });
    },
  },
};
