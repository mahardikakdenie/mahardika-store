import axios from "axios";
export default {
  namespaced: true,
  state: {
    token: null || localStorage.getItem("token"),
  },
  mutations: {
    GET_TOKEN: (state, token) => (state.token = token),
  },
  actions: {
    login: ({ commit }, payload) => {
      axios.defaults.headers.common.Authorization =
        "Bearer " + localStorage.getItem("access_token");
      //   axios.defaults.baseURL = process.env.VUE_APP_API_URL;

      return new Promise((resolve, reject) => {
        axios
          .post(
            "https://tepang.herokuapp.com/v1/auth/login/super-administrator",
            {
              ...payload,
            },
            {
              headers: {
                "Content-Type": "application/json",
                "Access-Control-Allow-Origin":
                  "https://ba45-103-147-9-40.ngrok.io/api/auth/login",
                "Access-Control-Allow-Headers":
                  "Origin, X-Requested-With, Content-Type, Accept",
              },
            }
          )
          .then((res) => {
            const token = res.data.data;
            console.log(token);
            commit("GET_TOKEN", token);
            localStorage.setItem("access_token", token);
            resolve(res);
          })
          .catch((err) => {
            reject(err);
          });
      });
    },
  },
};
