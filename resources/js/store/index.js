import Vuex from "vuex";
import axios from "axios";
import router from '../router';

export default new Vuex.Store({
    state: {
        message: {
            text: false,
            color: "",
        },
        loading: false,
        ignore: false,
        user: null,
        isAuthenticated: false
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
        SET_AUTH(state, isAuthenticated) {
            state.isAuthenticated = isAuthenticated;
        }
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
                    commit("SET_USER", response.data.user);
                }
            } catch (error) {
                console.error("Error fetching user information:", error);
            }
        },
        async login({ commit, dispatch }, userData) {
            await dispatch('getUserData');
        },

        async checkAuth({ commit, dispatch }) {
            try {
                const response = await axios.post('/api/check-token', {
                    token: localStorage.getItem('authTokenBelmira')
                });

                const isValidToken = response.data.isValid;

                if (isValidToken) {
                    commit('SET_AUTH', true);
                    return true;
                } else {
                    commit('SET_AUTH', false);
                    return false;
                }
            } catch (error) {
                console.error('Error ao verificar autenticação:', error);

                if (error.response && error.response.status === 401) {
                    dispatch("message", {
                        text: 'Usuário não atenticado.',
                        color: "red"
                    });
                    router.push('/admin/login');
                }

                commit('SET_AUTH', false);
                return false;
            }
        }

    },

});
