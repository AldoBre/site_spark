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
          color="yellow"
          clearable
          label="Password"
          placeholder="Enter your password"
        ></v-text-field>

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
        <span class="text-yellow-darken-1">Belmira Tech</span> &reg;
      </div>
    </v-card>
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
          this.$store.dispatch("message", {
            text: response.data.message,
            color: "green",
          });
          this.$router.push("/admin/home");
          console.log(response.data)
        })
        .catch((error) => {
          this.$store.dispatch("message", {
            text: error.response.data.message,
            color: "red",
          });
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
  },
};
</script>

  <style>
</style>
