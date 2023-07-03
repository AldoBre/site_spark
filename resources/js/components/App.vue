<template>
  <v-app theme="dark">
    <nav>
      <v-app-bar>
        <v-col cols="1">
            <router-link to="/">
              <v-img src="caminho_para_a_imagem">Spark Code</v-img>
            </router-link>
        </v-col>

        <v-col cols="10">

            <div class="d-flex text-center justify-center gap">
              <v-btn text to="/">Porque Nos?</v-btn>
              <v-btn text to="/about">Como Fazemos?</v-btn>
              <v-btn text to="/contato">Quem Ajudamos?</v-btn>
              <v-btn text to="/contato">Nossos Contatos</v-btn>
            </div>
        </v-col>
        <v-col cols="1">

            <div class="d-flex text-center">
            <v-btn text to="/" class="vibrate">WHATSAPP</v-btn>
            </div>
        </v-col>

        <div class="text-center">
            Teste
        </div>
      </v-app-bar>
    </nav>

    <v-main class="d-flex justify-center teste">
      <router-view></router-view>
    <!--   <v-dialog v-model="$store.getters.loading" persistent width="300">
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
      </v-dialog> -->
    </v-main>

    <v-snackbar v-model="snackbar" :color="color" :timeout="timeout">
      {{ message }}
      <template v-slot:actions>
        <v-btn color="white" @click="snackbar = false"> Close </v-btn>
      </template>
    </v-snackbar>

    <v-footer app bottom fixed color="grey-darken-3">
      <div class="d-flex justify-end w-100">
        <router-link
          class="text-decoration-none text-grey-lighten-5 text-caption"
          to="/admin/login"
          >Area do Admin</router-link
        >
      </div>
    </v-footer>
  </v-app>
</template>

  <script>
export default {
  data() {
    return {
      timeout: 3000,
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
  },
};
</script>

<style>
.gap{
    gap: 1rem;
}
.teste {
  background: black;
}
.loading-overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: rgba(0, 0, 0, 0.5);
  color: #fff;
}

.loading-content {
  display: flex;
  flex-direction: column;
  align-items: center;
}

@keyframes vibrate {
  0% {
    transform: translate(0, 0);
  }
  25% {
    transform: translate(2px, -2px);
  }
  50% {
    transform: translate(0, 0);
  }
  75% {
    transform: translate(-2px, 2px);
  }
  100% {
    transform: translate(0, 0);
  }
}

.vibrate {
  animation: vibrate 0.3s infinite;
}

</style>
