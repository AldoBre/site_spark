<template>
  <v-container fluid class="fill-height d-flex align-center">
    <v-card
      justify-center
      color="grey-darken-4"
      class="mx-auto px-6 py-8"
      width="500"
    >
      <div class="mb-5 text-h4">Área Administrativa</div>
      <v-form v-model="form" @submit.prevent="onSubmit">
        <v-text-field
          v-model="email"
          :readonly="loading"
          :rules="[required]"
          class="mb-2"
          variant="outlined"
          color="yellow"
          clearable
          label="Email"
        ></v-text-field>

        <v-text-field
          v-model="password"
          :readonly="loading"
          :rules="[required]"
          variant="outlined"
          :append-icon="visibility ? 'mdi-eye' : 'mdi-eye-off'"
          @click:append="() => (visibility = !visibility)"
          :type="visibility ? 'text' : 'password'"
          color="yellow"
          clearable
          label="Password"
          placeholder="Insira sua senha"
        ></v-text-field>

        <div class="text-end">
          <a
            class="text-center text-caption text-decoration-none text-blue"
            @click="openForgotPasswordModal"
          >
            Esqueceu sua senha?
          </a>
        </div>

        <br />

        <v-btn
          :loading="loading"
          block
          color="blue-darken-4"
          size="large"
          type="submit"
          variant="elevated"
        >
          Entrar
        </v-btn>
      </v-form>
      <div class="text-center mt-5">
        Desenvolvido por
        <span class="text-yellow-darken-1">Belmira Tech</span> &copy;
      </div>
    </v-card>

    <v-dialog v-model="forgotPasswordModal" max-width="500">
      <v-card>
        <v-card-title class="text-h5"> Recuperação de Senha </v-card-title>
        <v-card-text>
          <v-form
            v-model="forgotPasswordForm"
            @submit.prevent="submitForgotPasswordForm"
          >
            <v-text-field
              :rules="[required]"
              variant="outlined"
              color="yellow"
              clearable
              label="email"
              v-model="formForgot.email"
            >
            </v-text-field>
            <v-btn
              :loading="loading1"
              block
              color="blue-darken-4"
              size="large"
              type="submit"
              variant="elevated"
            >
              Enviar
            </v-btn>
          </v-form>
        </v-card-text>
      </v-card>
    </v-dialog>
  </v-container>
</template>

  <script>
import axios from "axios";
export default {
  data: () => ({
    form: false,
    email: null,
    password: null,
    loading: false,
    loading1: false,
    visibility: false,
    forgotPasswordModal: false,
    forgotPasswordForm: false,
    forgotPasswordEmail: null,
    formForgot: {
      email: null,
    },
  }),

  methods: {
    confirmLogin() {
      const localStorage = window.localStorage;
      const formData = new FormData();
      formData.append("email", this.email);
      formData.append("password", this.password);

      axios
        .post("/api/login", formData)
        .then((response) => {
          localStorage.setItem("authTokenBelmira", response.data.token);

          this.$store.dispatch("login", response.data.user);

          this.$store.dispatch("message", {
            text: response.data.message,
            color: "green",
          });
          this.$router.push("/admin/home");
        })
        .catch((error) => {
          this.$store.dispatch("message", {
            text: error.response.data.message,
            color: "red",
          });
          this.email = "";
          this.password = "";
        });
    },
    onSubmit() {
      if (!this.form) return;

      this.loading = true;
      this.confirmLogin();
      setTimeout(() => (this.loading = false), 2000);
    },
    required(v) {
      return !!v || "Campo obrigatório!";
    },
    openForgotPasswordModal() {
      this.forgotPasswordModal = true;
      this.forgotPasswordForm = true;
      this.forgotPasswordEmail = null;
    },
    submitForgotPasswordForm() {
      if (!this.forgotPasswordForm) return;
      this.loading1 = true;
      axios
        .post("/api/password/email", this.formForgot)
        .then((response) => {
          this.$store.dispatch("message", {
            text: response.data.message,
            color: "green",
          });
          this.forgotPasswordForm = false;
          this.forgotPasswordModal = false;
          this.loading1 = false;
          this.formForgot.email;
        })
        .catch((error) => {
          this.$store.dispatch("message", {
            text: error.response.data.message,
            color: "red",
          });
          setTimeout(() => (this.loading1 = false), 2000);
        });
    },
  },
};
</script>

  <style>
</style>
