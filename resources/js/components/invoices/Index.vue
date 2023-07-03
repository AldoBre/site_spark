<template>
  <v-container fluid>
    <v-row>
      <v-col cols="12">
        <div class="d-flex flex-column gap transparent-card pa-2 px-5">
          <div>
            <h1 class="text-h3 font-weight-black">
              Desenvolvimento de Software Personalizado
            </h1>
          </div>
          <div class="d-flex py-4">
            <p class="text-h5 w-75 ml-10">
              Somos a <strong>Spark Code</strong>, especialistas em
              desenvolvimento de software personalizado para impulsionar o
              crescimento e a eficiência do seu negócio.Transformamos ideias em
              realidade, proporcionando experiências digitais excepcionais e
              impulsionando o sucesso dos nossos clientes.
            </p>
          </div>
        </div>
      </v-col>
    </v-row>

    <v-row>
      <v-col cols="7">
        <div class="transparent-card pa-5 text-center">
          <h2>Nossos diferenciais</h2>

          <!-- Primeira linha -->
          <v-row class="mt-7">
            <v-col cols="4">
              <div>
                Experiência em desenvolvimento de software personalizado para
                atender às suas necessidades exclusivas;
              </div>
            </v-col>
            <v-col cols="4">
              <div>
                Soluções inovadoras e escaláveis para impulsionar o crescimento
                do seu negócio;
              </div>
            </v-col>
            <v-col cols="4">
              <div>
                Interface amigável e intuitiva para melhorar a experiência do
                usuário;
              </div>
            </v-col>
          </v-row>

          <!-- Segunda linha -->
          <v-row class="px-5 d-flex align-center justify-center mt-16">
            <v-col cols="4">
              <div>
                Atendimento personalizado e acompanhamento em todas as etapas do
                pré e do pós projeto;
              </div>
            </v-col>
            <v-col cols="4">
              <div>
                Experiência em desenvolvimento de software personalizado para
                atender às suas necessidades exclusivas;
              </div>
            </v-col>
          </v-row>
        </div>
      </v-col>
      <v-col cols="5">
        <v-carousel>
          <v-carousel-item
            src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
            cover
          ></v-carousel-item>

          <v-carousel-item
            src="https://cdn.vuetifyjs.com/images/cards/hotel.jpg"
            cover
          ></v-carousel-item>

          <v-carousel-item
            src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
            cover
          ></v-carousel-item>
        </v-carousel>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12">
        <div class="transparent-card pa-5 text-center">
          <v-col cols="12">
            <h2>Tecnologias utilizadas</h2>
          </v-col>
          <div class="d-flex align-center">

              <v-col cols="3">
                Laravel: Um framework PHP poderoso e elegante para desenvolvimento
                web.
              </v-col>
              <v-col cols="3">
                Vue.js: Um framework JavaScript progressivo para construir
                interfaces de usuário interativas.
              </v-col>
              <v-col cols="3">
                MySQL: Um sistema de gerenciamento de banco de dados relacional.
              </v-col>
              <v-col cols="3">
                Vuetify: Uma biblioteca de componentes de interface de usuário
                baseada no Vue.js.
              </v-col>
          </div>
        </div>
      </v-col>
    </v-row>
    <v-row>
        <v-col cols="12">
            <div class="transparent-card pa-5 text-center">
                <h2>Nossos Clientes e parceiros</h2>

            </div>
        </v-col>
    </v-row>
  </v-container>
</template>

  <script>
export default {};
</script>

<style>
.transparent-card {
  background-color: rgba(255, 255, 255, 0.1);
  border-radius: 8px;
  color: white;
}
.gap {
  gap: 3rem;
}
</style>
