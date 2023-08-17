<template>
  <v-app theme="dark">
    <v-navigation-drawer expand-on-hover rail permanent v-if="user">
      <v-list>
        <v-list-item
          prepend-avatar="/img/img01.jpg"
          :title="user.name"
          :subtitle="user.email"
        ></v-list-item>
      </v-list>

      <v-divider></v-divider>

      <v-list dense nav>
        <v-list-item
          prepend-icon="mdi-image-plus"
          title="Imagens do Site"
          router-link
          to="/admin/images/carrousel"
          @click="setMessage()"
        ></v-list-item>

        <v-list-item
          prepend-icon="mdi-store-plus"
          title="Cadastrar Clientes"
          router-link
          to="/admin/cadastro/clientes"
        ></v-list-item>

        <v-list-item
          prepend-icon="mdi-account-plus"
          title="Cadastrar Usuário"
          router-link
          to="/admin/cadastro/usuario"
        ></v-list-item>
        <v-list-item
          prepend-icon="mdi-account"
          title="Minha Conta"
          router-link
          to="/admin/minhaconta"
        ></v-list-item>
        <v-list-item
          prepend-icon="mdi-chart-bell-curve"
          title="Disponibilidade do Sistema"
          router-link
          to="/admin/grafico"
        ></v-list-item>

        <v-list-item prepend-icon="mdi-logout" title="Sair" @click="logout">
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-main class="d-flex justify-center mt-5">
      <v-container>
        <router-view></router-view>
      </v-container>
      <v-dialog v-model="$store.getters.loading" persistent max-width="300">
        <v-card color="blue-darken-4" class="pa-4">
          <v-card-text>
            <p class="body-1 white--text">Carregando ...</p>
            <v-progress-linear
              indeterminate
              color="white"
              class="mb-0"
            ></v-progress-linear>
          </v-card-text>
        </v-card>
      </v-dialog>
    </v-main>

    <v-snackbar v-model="snackbar" :color="color" :timeout="timeout">
      {{ message }}
      <template v-slot:actions>
        <v-btn color="white" @click="snackbar = false">Close</v-btn>
      </template>
    </v-snackbar>
  </v-app>
</template>

  <script>
export default {
  data() {
    return {
      timeout: 3000,
      drawer: false,
    };
  },
  computed: {
    user() {
      return this.$store.state.user; // Use this.$store.state.user em vez de this.$store.state.user
    },
    message() {
      return this.$store.state.message.text;
    },
    color() {
      return this.$store.state.message.color;
    },
    snackbar: {
      get() {
        return !!this.message || !!this.color;
      },
      set() {
        this.$store.dispatch("message", { text: "", color: "" });
      },
    },
    loading() {
      return this.$store.getters.loading;
    },
  },
  methods: {
    toggleDrawer() {
      this.drawer = !this.drawer;
    },
    logout() {
      axios
        .post("/api/logout")
        .then((response) => {
          localStorage.removeItem("authTokenBelmira");

          this.$store.commit("SET_USER", null);
          this.$store.commit("SET_AUTH", false);

          this.$store.dispatch("message", {
            text: response.data.message,
            color: "green",
          });
          this.$router.push("/admin/login");
        })
        .catch((error) => {
          this.$store.dispatch("message", {
            text: error.message,
            color: "red",
          });
        });
    },
  },
  mounted() {
    const token = localStorage.getItem("authTokenBelmira");

    if (token) {
      axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;
      this.$store.dispatch("login").then((isLoggedIn) => {
        if (this.$route.path === "/admin/login") {
          this.$router.push("/admin/home");
          if (isLoggedIn) {
            this.$router.push("/admin/home");
          }
        } else {
          if (this.$route.meta.requiresAuth) {
            this.$router.push(this.$route.path);
          } else {
            this.$router.push("/admin/home");
          }
        }
      });
    }
  },
};
</script>

  <style>
.v-dialog {
  margin-top: 80px;
}
</style>
