<template>
  <v-app theme="dark">
    <v-app-bar app fixed class="pa-2">
      <v-container class="pa-2">
        <v-row align="center">
          <v-col cols="6" sm="2">
            <v-img  src="img/logonavbar.png" max-height="55"> </v-img>
          </v-col>
          <v-col cols="6" sm="10">
            <v-row class="d-flex align-center justify-center gap">
              <v-btn class="text-decoration-none hidden-sm-and-down"
                >Sobre Nós</v-btn
              >
              <v-btn class="text-decoration-none hidden-sm-and-down"
                >Diferenciais</v-btn
              >
              <v-btn class="text-decoration-none hidden-sm-and-down"
                >Como Fazemos</v-btn
              >
              <v-btn class="text-decoration-none hidden-sm-and-down"
                >Contato</v-btn
              >
              <v-btn
                prepend-icon="mdi-whatsapp"
                color="green"
                variant="outlined"
                elevation="4"
                class="hover text-decoration-none"
                >WhatsApp</v-btn
              >
            </v-row>
          </v-col>
        </v-row>
      </v-container>
    </v-app-bar>

    <v-main class="d-flex justify-center mt-5">
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

    <v-footer bottom color="grey-darken-3">
      <v-row align="center" no-gutters>
        <v-col>
          <h3>Belmira Tech</h3>
          <h5 class="ml-2 mb-2">
            Consultoria Bi e desenvolvimento personalizado de software
          </h5>
          <div>
            <h4 class="mb-2">Onde Estamos?</h4>
            <h5>Rua Tal, bairro tal, n00</h5>
            <h5>Inovale - Polo de Inovação Vale do Rio do Peixe</h5>
            <h5>Joaçaba - SC</h5>
          </div>
        </v-col>

        <v-col class="d-flex flex-column justify-center align-center">
          <a href="#"
            ><v-img width="90" cover src="img/logo_footer.png"> </v-img
          ></a>

          <v-col class="text-center">
            <a
              href="https://www.instagram.com/"
              target="_blank"
              class="text-decoration-none text-grey-lighten-5 text-caption"
            >
              <v-icon color="pink-lighten-1" size="30">mdi-instagram</v-icon>
            </a>
            <a
              href="https://www.instagram.com/"
              target="_blank"
              class="text-decoration-none text-grey-lighten-5 text-caption"
            >
              <v-icon color="blue" size="30">mdi-linkedin</v-icon>
            </a>
          </v-col>
          <v-img> </v-img>
        </v-col>

        <v-col>
          <div width="50" class="d-flex flex-column">
            <div>
              <h3 class="text-center mb-1">Contatos</h3>
            </div>
            <div class="text-center">
              <p>
                <v-icon start> mdi-email </v-icon>
                contato@belmiratech.com.br
              </p>
              <p>
                <v-icon start> mdi-whatsapp </v-icon>
                (49) 99973 - 3762
              </p>
            </div>
          </div>

          <v-col class="mt-1 d-flex justify-space-between">
            <a href="https://www.poloinovale.com.br/">
              <v-img width="90" src="img/inovale.png"></v-img>
            </a>
            <div class="d-flex align-end">
              <router-link
                class="text-decoration-none text-grey-lighten-5 text-caption al"
                to="/admin/login"
                >Area do Admin</router-link
              >
            </div>
          </v-col>
        </v-col>
      </v-row>
    </v-footer>
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
.toolbar-items-wrapper {
  display: flex;
  align-items: center;
  justify-content: center;
}
.gap {
  gap: 1rem;
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

.hover:hover {
  width: 15%;
  background: rgb(255, 255, 255);
}
</style>
