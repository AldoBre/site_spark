import Vuex from "vuex";
import axios from "axios";

export default new Vuex.Store({
  state: {
    message: {
      text: false,
      color: "",
    },
    loading: false,
    ignore: false,
    user: null,
  },

  getters: {
    message: (state) => {
      return state.message;
    },
    loading: (state) => {
      if (state.ignore) {
        return false;
      } else {
        return state.loading;
      }
    },
  },

  mutations: {
    MESSAGE(state, { text, color }) {
      state.message.text = text;
      state.message.color = color;
    },
    LOADING(state) {
      state.loading = true;
    },
    DONE(state) {
      state.loading = false;
      state.ignore = false;
    },
    IGNORE(state) {
      state.ignore = true;
    },
    SET_USER(state, userData) {
        state.user = userData;
      },
  },

  actions: {
    message({ commit }, { text, color }) {
        commit("MESSAGE", { text, color });
    },
    loading({ commit }) {
      commit("LOADING");
    },
    ignoreLoading({ commit }) {
      commit("IGNORE");
    },
    async getUserData({ commit }) {
        try {

          const token = localStorage.getItem("authTokenBelmira");

          if (token) {
            axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;

            const response = await axios.get("/api/user");
            console.log("User data response:", response.data);

            commit("SET_USER", response.data.user);
            console.log("User data stored in state:", response.data);
          }
        } catch (error) {
          console.error("Error fetching user information:", error);
        }
      },
      async login({ commit, dispatch }, userData) {
        await dispatch('getUserData'); // Chama o método para obter os dados do usuário
    ; // Define os dados do usuário na store
      },
  },
});
