<template>
    <v-container fluid class="fill-height d-flex align-center">
      <v-card justify-center color="grey-darken-4" class="mx-auto px-6 py-8" width="500">
        <div class="mb-5 text-h4">
            Área Administrativa
        </div>
        <v-form v-model="form" @submit.prevent="onSubmit">
          <v-text-field
            v-model="email"
            :readonly="loading"
            :rules="[required]"
            class="mb-2"
            clearable
            label="Email"
          ></v-text-field>

          <v-text-field
            v-model="password"
            :readonly="loading"
            :rules="[required]"
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
            to="/admin/home"
          >
            Entrar
          </v-btn>
        </v-form>
        <div class="text-center mt-5">
            Desenvolvido por <span class="text-yellow-darken-1">Belmira Tech</span> &reg;
        </div>
      </v-card>
    </v-container>
  </template>

  <script>
  export default {
    data: () => ({
      form: false,
      email: null,
      password: null,
      loading: false,
    }),

    methods: {
      onSubmit() {
        if (!this.form) return;

        this.loading = true;

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
