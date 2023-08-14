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
    fetchUser({ commit }) {
        try {
          // Pega o token do Local Storage
          const token = localStorage.getItem("authTokenBelmira");

          if (token) {
            // Define o token no cabeçalho das requisições
            axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;

            // Faz a requisição para a rota /api/user
            const response = axios.get("/api/user");

            // Armazena as informações do usuário no state
            commit("SET_USER", response.data); // Você precisa ter a mutation SET_USER definida
          }
        } catch (error) {
          // Trate os erros conforme necessário
          console.error("Erro ao buscar informações do usuário:", error);
        }
      },
  },
});
