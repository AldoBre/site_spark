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
                      v-model="selectedImage"
                      @change="handleImageChange"
                      variant="outlined"
                      color="yellow"
                      counter
                      label="Selecione seu banner"
                      prepend-icon="mdi-camera"
                    >
                    </v-file-input>
                  </div>
                </div>
                <div v-if="imagePreview" class="d-flex align-top">
                        <legend>Sua Imagem:</legend>
                    <v-img :src="imagePreview" alt="Preview"  max-height="150"></v-img>
                </div>
              </div>
            </v-col>
            <v-col cols="12" sm="6">
              <div>
                <div>Esse é seu banner atual</div>
                <div class="d-flex justify-center align-center">
                    <v-img :src="bannerImage[0]" alt="Banner Image"></v-img>
                </div>
              </div>
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="12" align="center">
              <v-btn @click="uploadImage"> Confirmar Alterações </v-btn>
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
            Aqui é possível adicionar até 3 imagens.
          </v-card-text>
          <v-row>
            <v-col cols="12" sm="6">
              <div>
                <div class="d-flex flex-column gap">
                  Selecione as Imagens
                  <div>
                    <v-file-input
                    v-model="selectedImages"
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
              <v-btn @click="uploadCarrousels"> Confirmar Alterações </v-btn>
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
import axios from "axios";

export default {
  data() {
    return {
      selectedImage: null,
      selectedImages: [],
      bannerImage: [],
      imagePreview: null,
    };
  },
  methods: {
    handleImageChange() {
      if (this.selectedImage) {
        const file = this.selectedImage[0];
        this.imagePreview = URL.createObjectURL(file); // Cria um URL temporário para o preview
      } else {
        this.imagePreview = '';
      }
    },

    uploadImage() {
      if (!this.selectedImage) {
        this.$store.dispatch("message", {
          text: "Nenhuma imagem selecionada.",
          color: "red",
        });
        return;
      }

      const formData = new FormData();
      formData.append("image_banner", this.selectedImage[0]);

      axios
        .post("/api/imageBanner", formData)
        .then((response) => {
          this.$store.dispatch("message", {
            text: response.data.message,
            color: "green",
          });
        })
        .catch((error) => {
          this.$store.dispatch("message", {
            text: "Erro ao enviar imagem.",
            color: "red",
          });
        });
    },

    uploadCarrousels(){
        if(this.selectedImages.length !== 3){
            this.$store.dispatch("message",{
                text: "Selecione 3 imagens.",
                color: "red",
            });
            return;
        }

        const formData = new FormData();

        this.selectedImages.forEach((image, index) => {
            formData.append(`image_${index + 1}`, image);
        });

        console.log(this.selectedImages)
        axios.post('/api/imageCarrousel', formData)
        .then((response) =>{
            console.log(response.data)
            this.$store.dispatch("message", {
            text: response.data.message,
            color: "green",
          });
        })
        .catch((error) => {
          this.$store.dispatch("message", {
            text: "Erro ao enviar imagens.",
            color: "red",
          });
        });

    },

    getImages() {
      axios.get("/api/imageBanner").then((response) => {
        if (response.data.length > 0) {
          this.bannerImage = response.data.map(
            (imageName) => `/storage/${imageName}`
          );
        }
      });
    },


  },
  watch: {
    selectedImage: function(newVal, oldVal) {
      if (!newVal || newVal.length === 0) {
        this.imagePreview = null; // Clear the image preview when selectedImage is cleared
      }
    },
    },
  created() {
    this.getImages();
  },
};
</script>

<style>
</style>
