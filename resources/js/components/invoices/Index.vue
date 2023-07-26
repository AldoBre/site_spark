<template>
  <v-container fluid>
    <v-row>
      <v-col cols="12">
        <div class="d-flex flex-column gap transparent-card pa-2 px-5">
          <div>
            <h2 class="text-h4 font-weight-black">
                Consultoria Bi e Desenvolvimento Personalizado de Software
            </h2>
          </div>
          <div class="d-flex py-4">
            <p class="text-h6 w-75 ml-10">
                Transforme sua visão em realidade com soluções de software personalizadas e a poderosa inteligência do Power BI! Somos apaixonados por desenvolver as ferramentas tecnológicas ideais para atender às necessidades únicas do seu negócio. Nossa equipe altamente qualificada está pronta para entender seus desafios e criar soluções inovadoras que impulsionem a eficiência, a produtividade e o crescimento dos seus negócios. Seu sucesso é nossa missão!
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
                Soluções sob medida para atender às necessidades específicas do seu negócio.
              </div>
            </v-col>
            <v-col cols="4">
              <div>
                Experiência e expertise de uma equipe altamente qualificada.
              </div>
            </v-col>
            <v-col cols="4">
              <div>
                Inovação tecnológica constante.
              </div>
            </v-col>
          </v-row>

          <!-- Segunda linha -->
          <v-row class="px-5 d-flex align-center justify-center mt-16">
            <v-col cols="4">
              <div>
                Análises avançadas para insights poderosos.
              </div>
            </v-col>
            <v-col cols="4">
              <div>
                Visualizações impactantes em dashboards interativos.
              </div>
            </v-col>
            <v-col cols="4">
              <div>
                Conectividade com diversas fontes de dados.
              </div>
            </v-col>
          </v-row>
        </div>
      </v-col>
      <v-col cols="5">
        <v-carousel>
          <v-carousel-item
            src="img/img01.jpg"
            cover
          ></v-carousel-item>

          <v-carousel-item
            src="img/img02.jpg"
            cover
          ></v-carousel-item>

          <v-carousel-item
            src="img/img03.jpg"
            cover
          ></v-carousel-item>
        </v-carousel>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12">
        <div class="transparent-card pa-5 text-center">
          <v-col cols="12">
            <h2>Tecnologias Utilizadas</h2>
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
  gap: 1rem;
}
</style>
