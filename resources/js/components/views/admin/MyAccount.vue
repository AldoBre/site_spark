<template>
  <v-container fluid>
    <v-row>
      <v-col cols="12">
        <v-card class="pa-5">
          <v-card-title class="text-center">Meus Dados</v-card-title>
          <v-row class="mt-3">
            <v-col cols="12" sm="6">
              <v-text-field
                label="Nome"
                variant="outlined"
                color="yellow"
                hint="Nome ou razão social"
              >
              </v-text-field>
              <v-text-field
                label="E-mail"
                variant="outlined"
                color="yellow"
                hint="Nome ou razão social"
              >
              </v-text-field>
               <v-row>
                <v-col align="center">
                    <v-btn>
                        Alterar Senha
                    </v-btn>
                </v-col>
               </v-row>

            </v-col>

            <v-col cols="12" sm="6"   class="d-flex flex-column justify-center align-center gap">

                <v-avatar
                size="200"
                class="mouse-pointer"
                >
                <v-img cover src="/img/img03.jpg" alt=""/>
                </v-avatar>
                <v-btn>Alterar Foto</v-btn>
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

    };
  },
  methods: {

  },
};
</script>

  <style>
.teste{
    border-radius: 100%;
}

</style>
