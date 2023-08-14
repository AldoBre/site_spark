<template>
  <v-container fluid>
    <v-row>
      <v-col cols="12">
        <v-card class="pa-5">
          <v-card-title class="text-center">Cadastro de Clientes</v-card-title>
          <v-row class="mt-3">
            <v-col cols="12" sm="6">
              <v-text-field
                label="Nome"
                variant="outlined"
                color="yellow"
                hint="Nome ou razão social"
              >
              </v-text-field>
            </v-col>
            <v-col cols="12" sm="6">
              <v-text-field
                label="E-mail"
                variant="outlined"
                color="yellow"
                hint="E-mail "
              >
              </v-text-field>
            </v-col>
          </v-row>

          <v-row class="d-flex justify-center align-center">
            <v-col cols="12" sm="4">
              <v-text-field
                label="Senha"
                v-model="password"
                variant="outlined"
                :rules="[rules.required, rules.min, rules.matchPasswords]"
                :append-icon="visibility ? 'mdi-eye' : 'mdi-eye-off'"
                @click:append="() => (visibility = !visibility)"
                :type="visibility ? 'text' : 'password'"
                counter
                autocomplete="new-password"
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="4">
              <v-text-field
              label="Repete Senha"
              v-model="confirmPassword"
              variant="outlined"
              :rules="[rules.required, rules.min, rules.matchPasswords]"
              :append-icon="visibility ? 'mdi-eye' : 'mdi-eye-off'"
              @click:append="() => (visibility = !visibility)"
              counter
              :type="visibility ? 'text' : 'password'"
              autocomplete="new-password"
            ></v-text-field>
            </v-col>
          </v-row>

          <v-row>
            <v-col cols="12" align="center">
              <v-btn :disabled="!passwordsMatch"> Cadastrar Cliente </v-btn>
            </v-col>
          </v-row>

        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      password: "",
      confirmPassword: "",
      visibility: false,
      rules: {
                required: value => !!value || 'Obrigatório.',
                min: v => v.length >= 8 || 'Min 8 characters',
                matchPasswords: v => v === this.password || 'As senhas não coincidem.'
            }
    };
  },
  computed: {
    passwordsMatch() {
      return this.password === this.confirmPassword;
    },
  },

};
</script>

<style>
</style>
