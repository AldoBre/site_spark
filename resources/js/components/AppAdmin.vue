<template>
    <v-app theme="dark">
      <v-navigation-drawer expand-on-hover rail permanent >
        <v-list>
          <v-list-item
            prepend-avatar="https://randomuser.me/api/portraits/women/85.jpg"
            title="Admin Belmira"
            subtitle="admin@admin.com.br"
          ></v-list-item>
        </v-list>

        <v-divider></v-divider>

        <v-list dense nav>
          <v-list-item
            prepend-icon="mdi-image-plus"
            title="Imagens Carrousel"
            to="images/carrousel"
          ></v-list-item>

          <v-list-item
            prepend-icon="mdi-store-plus"
            title="Cadastrar Clientes"
          ></v-list-item>

          <v-list-item
            prepend-icon="mdi-account-plus"
            title="Cadastrar Usuário"

          ></v-list-item>
          <v-list-item
            prepend-icon="mdi-account"
            title="Minha Conta"
          ></v-list-item>

          <v-list-item
            prepend-icon="mdi-logout"
            title="Sair"
          ></v-list-item>
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
              <v-progress-linear indeterminate color="white" class="mb-0"></v-progress-linear>
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

      <v-footer app >
        OPA
      </v-footer>
    </v-app>
  </template>


  <script>
  export default {
    data() {
      return {
        timeout: 3000,
        drawer: false,
        user: false,
      };
    },
    computed: {
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
      setMessage() {
        this.$store.dispatch("message", {
          text: "Mensagem de exemplo",
          color: "green",
        });
      },
      toggleDrawer() {
        this.drawer = !this.drawer;
      },
    },
  };
  </script>

  <style>

  .v-dialog {
    margin-top: 80px;
  }

  .v-snackbar {
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
  }
  </style>
