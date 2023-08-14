<template>
  <v-container fluid>
    <v-row>
      <v-col cols="12">
        <v-card class="pa-5">
          <div class="title-container">
            <v-card-title class="text-center"
              >Cadastro de Clientes</v-card-title
            >
          </div>

          <div class="button-container">
            <v-btn>Lista de Clientes</v-btn>
          </div>

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
                label="CNPJ"
                variant="outlined"
                color="yellow"
                hint="Informe o cnpj do cliente"
              >
              </v-text-field>
            </v-col>
          </v-row>

          <v-row>
            <v-col cols="12" sm="6">
              <v-text-field
                label="Nome Fantasia"
                variant="outlined"
                color="yellow"
                hint="Nom fantasia se houver"
              >
              </v-text-field>
            </v-col>
            <v-col cols="12" sm="6">
              <v-text-field
                label="Inscrição Estadual"
                variant="outlined"
                color="yellow"
                hint="Inscrição estadual ou municipal"
              >
              </v-text-field>
            </v-col>
          </v-row>

          <v-row>
            <v-col cols="12" sm="3">
              <v-text-field label="CEP" variant="outlined" color="yellow">
              </v-text-field>
            </v-col>

            <v-col cols="8" sm="7">
              <v-text-field label="Cidade" variant="outlined" color="yellow">
              </v-text-field>
            </v-col>

            <v-col cols="4" sm="2">
              <v-text-field label="Estado" variant="outlined" color="yellow">
              </v-text-field>
            </v-col>
          </v-row>

          <v-row>
            <v-col cols="12" sm="6">
              <v-text-field label="Rua" variant="outlined" color="yellow">
              </v-text-field>
            </v-col>

            <v-col cols="12" sm="4">
              <v-text-field label="Bairro" variant="outlined" color="yellow">
              </v-text-field>
            </v-col>

            <v-col cols="6" sm="2">
              <v-text-field label="Número" variant="outlined" color="yellow">
              </v-text-field>
            </v-col>
          </v-row>

          <v-row>
            <v-col cols="12" sm="4">
              <v-text-field label="E-mail" variant="outlined" color="yellow">
              </v-text-field>
            </v-col>

            <v-col cols="12" sm="4">
              <v-text-field label="Telefone" variant="outlined" color="yellow">
              </v-text-field>
            </v-col>

            <v-col cols="12" sm="4">
              <v-text-field
                label="Nome do Contato"
                variant="outlined"
                color="yellow"
              >
              </v-text-field>
            </v-col>
          </v-row>

          <v-row>
            <v-col align="center" cols="12" sm="4">
              <v-text-field
                label="Serviço Desejado"
                variant="outlined"
                color="yellow"
              >
              </v-text-field>
            </v-col>
          </v-row>

          <v-row>
            <v-col cols="12" align="center">
              <v-btn> Cadastrar Cliente </v-btn>
            </v-col>
          </v-row>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {};
</script>

<style>
.button-container {
  position: absolute;
  top: 0;
  right: 0;
  margin-top: 1.5rem;
  margin-right: 1rem;
}

@media (max-width: 600px) {
  .button-container {
    position: static;
    text-align: center;
    margin-top: 20px;
  }
}
</style>
