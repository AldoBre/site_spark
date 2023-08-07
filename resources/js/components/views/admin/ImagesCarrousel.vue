<template>
  <v-container fluid>
    <v-row>
      <v-col cols="12">
        <v-card class="pa-5">
          <v-card-title class="text-center"> Imagem do Banner </v-card-title>
          <v-card-text class="text-center">
            Aqui é possivel adicionar a imagem do banner principal do site.
          </v-card-text>
          <v-row>
            <v-col cols="12" sm="6">
              <div>
                <div class="d-flex flex-column gap">
                  Selecione a imagem
                  <div>
                    <v-file-input
                      variant="outlined"
                      color="yellow"
                      counter
                      label="Selecione seu banner"
                      prepend-icon="mdi-camera"
                    >
                    </v-file-input>
                  </div>
                </div>
              </div>
            </v-col>
            <v-col cols="12" sm="6">
                <div>
                <div>Esse é seu banner atual</div>
                <div class="d-flex justify-center align-center">
                  <v-img> </v-img>
                </div>
              </div>
            </v-col>
          </v-row>
        </v-card>
      </v-col>
    </v-row>
    <v-row justify="center">
      <v-col cols="12">
        <v-card class="pa-5">
          <v-card-title primary-title class="text-center">
            Imagens do Carrousel
          </v-card-title>
          <v-card-text class="text-center">
            Aqui é possível adicionar até 5 imagens.
          </v-card-text>
          <v-row>
            <v-col cols="12" sm="6">
              <div>
                <div class="d-flex flex-column gap">
                  Selecione as Imagens
                  <div>
                    <v-file-input
                      variant="outlined"
                      color="yellow"
                      multiple
                      counter
                      label="Selecione 3 imagens"
                      prepend-icon="mdi-camera"
                    >
                    </v-file-input>
                  </div>
                </div>
              </div>
            </v-col>
            <v-col cols="12" sm="6">
              <div>
                <div>Veja suas imagens</div>
                <div class="d-flex justify-center align-center">
                  <v-img> </v-img>
                </div>
              </div>
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="12" align="center">
              <v-btn> Confirmar Alterações </v-btn>
            </v-col>
          </v-row>
        </v-card>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12">
        <v-card class="pa-5">
          <v-card-title class="text-center"> Imagens do Elenco</v-card-title>
          <v-card-text class="text-center">
            Aqui você pode adicionar as fotos do seu time e inserir as
            informações dos atetlas.
          </v-card-text>
          <v-row>
            <v-col cols="12" sm="6">
              <div>
                <div class="d-flex flex-column gap">
                  Selecione as Imagens
                  <div>
                    <v-file-input
                      variant="outlined"
                      color="yellow"
                      multiple
                      counter
                      label="Seleciona as Imagens"
                      prepend-icon="mdi-camera"
                    >
                    </v-file-input>
                  </div>
                </div>
              </div>
            </v-col>
            <v-col cols="12" sm="6">
              <div>
                <div>
                  <p>Seu elenco de (N. jogadores)</p>
                </div>
              </div>
            </v-col>
            <v-col cols="12">
              Essa div vai abrir para inserir os dados de todos os jogadores
              <div class="d-flex">
                <div class="d-flex flex-column">
                  <v-img>IMAGEM</v-img>
                </div>
              </div>
            </v-col>
            <div class="mx-auto">
              <v-btn> Confirmar Alterações </v-btn>
            </div>
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
</style>
