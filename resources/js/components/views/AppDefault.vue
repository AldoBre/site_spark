<template>
  <v-app theme="dark">
    <v-app-bar app fixed class="pa-2">
      <v-container class="pa-2">
        <v-row align="center">
          <v-col cols="6" sm="2">
            <v-img src="img/logonavbar.png" max-height="55"> </v-img>
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
              <v-btn
                class="text-decoration-none hidden-sm-and-down"
                @click="dialog = true"
                >Contato</v-btn
              >
              <v-btn
                prepend-icon="mdi-whatsapp"
                color="green"
                variant="outlined"
                elevation="4"
                href="https://api.whatsapp.com/send?phone=5549999733762"
                target="_blank"
                class="hover text-decoration-none"
                >WhatsApp</v-btn
              >
            </v-row>
          </v-col>
        </v-row>
      </v-container>
    </v-app-bar>

    <v-main class="d-flex justify-center">
      <router-view></router-view>
    </v-main>

    <v-footer bottom class="teste2" color="grey-darken-3">
      <v-row align="center" no-gutters>
        <v-col>
          <h3>Belmira Tech</h3>
          <p class="ml-2 mb-2">
            Consultoria Bi e desenvolvimento personalizado de software
          </p>
          <div>
            <h4 class="mb-2">Onde Estamos?</h4>
            <p>Rua Antônio Adolpho Maresch, 68</p>
            <p>
              Flor da Serra | Joaçaba - SC
              <v-icon color="red-darken-2">mdi-map-marker-radius</v-icon>
            </p>
            <p class="font-weight-bold">
              Inovale - Polo de Inovação Vale do Rio do Peixe
            </p>
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
                <a
                  class="text-decoration-none text-white"
                  href="mailto:contato@belmiratech.com.br"
                >
                  contato@belmiratech.com.br</a
                >
              </p>
              <p>
                <v-icon color="green" start> mdi-whatsapp </v-icon>
                <a
                  target="_blank"
                  class="text-decoration-none text-white"
                  href="https://api.whatsapp.com/send?phone=5549999733762"
                  >(49) 9 9973-3762</a
                >
              </p>
            </div>
          </div>

          <v-col class="mt-1 d-flex justify-space-between">
            <a target="_blank" href="https://www.poloinovale.com.br/">
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
    <div class="bg-black text-center pa-1">
      Desenvolvido por Belmira Tech - 2023 &copy; Todos os direitos reservados.
    </div>
    <v-dialog v-model="dialog" persistent width="1024">
      <v-card>
        <v-card-title class="text-center pt-5">
          <span class="text-h5">Envie uma Menssagem para Nós</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12">
                <v-text-field
                  label="Nome Completo*"
                  required
                  v-model="nome"
                ></v-text-field>
              </v-col>

              <v-col cols="12" sm="6">
                <v-text-field
                  label="Email*"
                  required
                  v-model="email"
                ></v-text-field>
              </v-col>

              <v-col cols="12" sm="6">
                <v-text-field
                  label="Telefone*"
                  required
                  v-model="telefone"
                ></v-text-field>
              </v-col>

              <v-col cols="12" sm="6">
                <v-select
                  :items="[
                    'Alimentação e Bebidas',
                    'Vestuário e calçados',
                    'Construção',
                    'Saúde',
                    'Educação',
                    'Prestador de Serviços',
                    'Informática',
                    'Entretenimento',
                    'Startup',
                    'Outros',
                  ]"
                  label="Seguimento*"
                  required
                  v-model="seguimento"
                ></v-select>
              </v-col>

              <v-col cols="12" sm="6">
                <v-select
                  :items="[
                    'Site Institucional',
                    'Site Landinpage',
                    'Sistema Web',
                    'Consultoria de BI',
                    'Outras dúvidas',
                  ]"
                  label="Serviço Desejado*"
                  required
                  v-model="servico"
                ></v-select>
              </v-col>

              <v-col cols="12">
                <v-textarea
                  clearable
                  v-model="duvida"
                  label="Sua Dúvida"
                  placeholder="Ex: Gostaria de mais informações sobre o desenvolvimento de um site"
                ></v-textarea>
              </v-col>
            </v-row>
          </v-container>
          <small>*indicador de campos obrigatórios</small>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue-darken-1" variant="text" @click="dialog = false">
            Cancelar
          </v-btn>
          <v-btn color="blue-darken-1" variant="text" @click="sendForm"   :disabled="!isValidForm() || dialog1">
            Enviar
          </v-btn>
        </v-card-actions>
      </v-card>
      <div v-if="dialog1" class="loading-overlay">
        <v-card
        color="blue"
      >
        <v-card-text>
          Enviando e-mail
          <v-progress-linear
            indeterminate
            color="white"
            class="mb-0"
          ></v-progress-linear>
        </v-card-text>
      </v-card>
    </div>
    </v-dialog>
  </v-app>
</template>

  <script>
export default {
  data() {
    return {
      dialog: false,
      dialog1: false,
      nome: "",
      email: "",
      telefone: "",
      seguimento: "",
      servico: "",
      duvida: "",
    };
  },
  methods: {
    sendForm() {
      const formData = {
        nome: this.nome,
        email: this.email,
        telefone: this.telefone,
        seguimento: this.seguimento,
        servico: this.servico,
        duvida: this.duvida,
      };

      this.dialog1 = true; // Show loading overlay

      axios
        .post("/enviar-email", formData)
        .then((response) => {
          this.dialog1 = false; // Hide loading overlay
          this.dialog = false; // Close dialog
        })
        .catch((error) => {
          console.log(error);
          this.dialog1 = false; // Hide loading overlay
        });
    },
    isValidForm() {
      return (
        this.nome !== '' &&
        this.email !== '' &&
        this.telefone !== '' &&
        this.seguimento !== '' &&
        this.servico !== '' &&
        this.duvida !== ''
      );
    }
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
