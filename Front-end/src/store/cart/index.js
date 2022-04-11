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
    DELETE_DATA: (state, data) => {
      const index = state.data.findIndex((x) => x.id === data.id);
      if (index !== -1) {
        state.data.splice(index, 1);
      }
    },
  },
  actions: {
    getDataCart: ({ commit }, payload) => {
      axios.defaults.headers.common.Authorization =
        "Bearer " + localStorage.getItem("access_token");
      axios.defaults.baseURL = process.env.VUE_APP_API_URL;

      return new Promise((resolve, reject) => {
        const params = { ...payload };
        axios
          .get("cart", { params: params })
          .then((res) => {
            commit("GET_DATA", res.data.data);
            resolve(res);
          })
          .catch((e) => {
            reject(e);
          });
      });
    },
    insertDataCart: ({ commit }, payload) => {
      axios.defaults.headers.common.Authorization =
        "Bearer " + localStorage.getItem("access_token");
      axios.defaults.baseURL = process.env.VUE_APP_API_URL;

      return new Promise((resolve, reject) => {
        axios
          .post("cart", { ...payload })
          .then((res) => {
            commit("INSERT_DATA", payload);
            resolve(res);
          })
          .catch((e) => {
            reject(e);
          });
      });
    },
    deleteDataCart: ({ commit }, data) => {
      axios.defaults.headers.common.Authorization =
        "Bearer " + localStorage.getItem("access_token");
      axios.defaults.baseURL = process.env.VUE_APP_API_URL;

      return new Promise((resolve, reject) => {
        axios
          .delete("cart/" + data.id)
          .then((res) => {
            commit("DELETE_DATA", data);
            resolve(res);
          })
          .catch((e) => {
            reject(e);
          });
      });
    },
  },
};
