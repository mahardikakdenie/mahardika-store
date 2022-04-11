import axios from "axios";
export default {
  namespaced: true,
  state: {
    data: [],
  },
  mutations: {
    GET_DATA: (state, payload) => (state.data = payload),
    INSERT_DATA: (state, payload) => {
      const data = state.data;
      data.push(payload);
      state.data = data;
    },
  },
  actions: {
    getDataTransaction: ({ commit }, payload) => {
      axios.defaults.headers.common.Authorization =
        "Bearer " + localStorage.getItem("access_token");
      axios.defaults.baseURL = process.env.VUE_APP_API_URL;

      return new Promise((resolve, reject) => {
        const params = { ...payload };
        axios
          .get("transaction", { params: params })
          .then((res) => {
            commit("GET_DATA", res.data.data);
            resolve(res);
          })
          .catch((e) => {
            reject(e);
          });
      });
    },
    storeDataTransaction: ({ commit }, payload) => {
      axios.defaults.headers.common.Authorization =
        "Bearer " + localStorage.getItem("access_token");
      axios.defaults.baseURL = process.env.VUE_APP_API_URL;

      return new Promise((resolve, reject) => {
        axios
          .post("transaction", { ...payload })
          .then((res) => {
            resolve(res);
            commit("INSERT_DATA", payload);
          })
          .catch((e) => {
            reject(e);
          });
      });
    },
  },
};
