<template>
  <v-container fluid class="fill-height d-flex align-center">
    <v-row justify="center" align="center">
      <v-col cols="6" align="center">
        <v-card class="pa-5 mx-auto">
          <v-col cols="12" sm="6">
            <v-text-field
              label="Senha"
              v-model="form.password"
              variant="outlined"
              :rules="[rules.required, rules.min, rules.matchPasswords]"
              :append-icon="visibility ? 'mdi-eye' : 'mdi-eye-off'"
              @click:append="() => (visibility = !visibility)"
              :type="visibility ? 'text' : 'password'"
              counter
              autocomplete="new-password"
            ></v-text-field>
          </v-col>
          <v-col cols="12" sm="6">
            <v-text-field
              label="Repete Senha"
              v-model="form.password_confirmation"
              variant="outlined"
              :rules="[rules.required, rules.min, rules.matchPasswords]"
              :append-icon="visibility ? 'mdi-eye' : 'mdi-eye-off'"
              @click:append="() => (visibility = !visibility)"
              counter
              :type="visibility ? 'text' : 'password'"
              autocomplete="new-password"
            ></v-text-field>
          </v-col>
          <v-btn @click="reset" :disabled="!passwordsMatch">
            Redefinir Senha
          </v-btn>
        </v-card>
        <div class="text-center mt-1">
          Desenvolvido por
          <a
            target="_blank"
            class="text-decoration-none text-white"
            href="http://belmiratech.com.br"
            ><span class="text-yellow-darken-1">Belmira Tech</span> &copy;</a
          >
        </div>
      </v-col>
    </v-row>
  </v-container>
</template>

  <script>
import axios from "axios";
export default {
  data() {
    return {
      form: {
        token: null,
        email: null,
        password: "",
        password_confirmation: "",
      },
      visibility: false,
      rules: {
        required: (value) => !!value || "Obrigatório.",
        matchPasswords: (v) =>
          v === this.form.password || "As senhas não coincidem.",
        min: (v) => v.length >= 8 || "Min 8 caracteres",
      },
    };
  },
  created() {
    this.form.email = this.$route.query.email;
    this.form.token = this.$route.params.token;
  },
  computed: {
    passwordsMatch() {
      return this.form.password === this.form.password_confirmation;
    },
  },
  methods: {
    reset() {
      console.log(this.form);
      axios
        .post("/api/password/reset", this.form)
        .then((response) => {
          this.$store.dispatch("message", {
            text: response.data.message,
            color: "green",
          });
          this.$router.push({ path: "/admin/login" });
        })
        .catch((error) => {
          this.$store.dispatch("message", {
            text: error.response.data.message,
            color: "red",
          });
        });
    },
  },
};
</script>

  <style>
</style>
