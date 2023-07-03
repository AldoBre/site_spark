import Vuex from "vuex";

export default new Vuex.Store({
  state: {
    message: {
      text: false,
      color: "",
    },
    loading: false,
    ignore: false, // Adicionado o estado 'ignore'
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
  },
});
