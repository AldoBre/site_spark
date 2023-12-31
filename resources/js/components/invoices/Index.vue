<template>
  <v-container fluid>
    <v-row>
      <v-col cols="12">
        <div class="d-flex flex-column gap transparent-card pa-2 px-5 mt-5">
          <div>
            <h1 class="font-weight-black text-center">
              Consultoria Bi e Desenvolvimento de Sites e Sistemas Web
              Personalizados
            </h1>
          </div>
          <div class="d-flex py-4">
            <p class="text-h6 w-75 ml-10 d-none d-sm-flex">
              Transforme sua visão em realidade com soluções de software
              personalizadas e a poderosa inteligência do Power BI! Somos
              apaixonados por desenvolver as ferramentas tecnológicas ideais
              para atender às necessidades únicas do seu negócio. Nossa equipe
              altamente qualificada está pronta para entender seus desafios e
              criar soluções inovadoras que impulsionem a eficiência, a
              produtividade e o crescimento dos seus negócios. Seu sucesso é
              nossa missão!
            </p>

            <p class="d-sm-none">
              Oferecemos soluções personalizadas e inteligência do Power BI para
              transformar sua visão em realidade. Nossa equipe qualificada
              desenvolve ferramentas tecnológicas para atender às necessidades
              únicas do seu negócio e impulsionar seu crescimento e sucesso.
            </p>
          </div>
        </div>
      </v-col>
    </v-row>

    <v-row>
      <v-col cols="12" sm="7" xl="5">
        <div class="transparent-card pa-8 text-center">
          <h2>Nossos Diferenciais</h2>

          <v-row class="mt-7">
            <v-col cols="12" sm="4" xs-12>
              <v-icon size="60">mdi-factory</v-icon>
              <h4>
                Soluções sob medida para atender às necessidades específicas do
                seu negócio.
              </h4>
            </v-col>
            <v-col cols="12" sm="4" xs-12>
              <v-icon size="60">mdi-account-group</v-icon>
              <h4>
                Experiência e expertise de uma equipe altamente qualificada.
              </h4>
            </v-col>
            <v-col cols="12" sm="4">
              <v-icon size="60" xs-12>mdi-application-brackets</v-icon>
              <h4>Inovação tecnológica constante.</h4>
            </v-col>
          </v-row>

          <v-row class="px-5 d-flex align-center justify-center mt-16">
            <v-col cols="12" sm="4">
              <v-icon size="60">mdi-chart-line</v-icon>
              <h4>Análises avançadas para insights poderosos.</h4>
            </v-col>
            <v-col cols="12" sm="4">
              <v-icon size="60">mdi-chart-box</v-icon>
              <h4>Visualizações impactantes em dashboards interativos.</h4>
            </v-col>
            <v-col cols="12" sm="4">
              <v-icon size="60">mdi-database-check</v-icon>
              <h4>Conectividade com diversas fontes de dados.</h4>
            </v-col>
          </v-row>
        </div>
      </v-col>

      <v-col cols="12" sm="5" xl="7">
        <v-carousel cycle>
          <v-carousel-item src="img/img01.jpg" cover></v-carousel-item>

          <v-carousel-item src="img/img02.jpg" cover></v-carousel-item>

          <v-carousel-item src="img/img03.jpg" cover></v-carousel-item>
        </v-carousel>
      </v-col>
    </v-row>

    <v-row>
  <v-col cols="12">
    <div class="transparent-card pa-5 text-center">
      <h2>Nossos Clientes e Parceiros</h2>

      <v-col class="d-flex justify-center align-center pa-5">
        <v-btn @click="prevSlide" class="mr-3" v-if="images.length > 4">
          <v-icon v-if="isSmallScreen">mdi-chevron-up</v-icon>
          <v-icon v-else>mdi-chevron-left</v-icon>
        </v-btn>
        <div class="d-flex flex-wrap justify-center gap">
          <div v-for="(image, index) in visibleImages" :key="index">
            <v-card
              :cols="isSmallScreen ? 12 : 3"
              :elevation="isHovering ? 12 : 2"
              class="image-card"
            >
              <v-img
                width="200"
                :aspect-ratio="1"
                :src="image.name"
                alt="Image"
                cover
              >
                <div class="link-container">
                  <a
                    class="text-decoration-none text-white"
                    target="_blank"
                    :href="image.site"
                  >
                    {{ image.title }}
                    <v-icon icon="mdi-arrow-right"></v-icon>
                  </a>
                </div>
              </v-img>
            </v-card>
          </div>
        </div>
        <v-btn @click="nextSlide" class="ml-3" v-if="images.length > 4"><v-icon v-if="isSmallScreen">mdi-chevron-down</v-icon>
          <v-icon v-else>mdi-chevron-right</v-icon></v-btn>
      </v-col>
    </div>
  </v-col>
</v-row>


    <v-row>
      <v-col cols="12">
        <div class="transparent-card pa-5 text-center">
          <h2>Tecnologias Utilizadas</h2>

          <v-row class="mt-7 d-flex align-center justify-center">
            <v-col cols="12" md="2">
              <div>
                <v-icon size="50">mdi-laravel</v-icon>
                <p>
                  Laravel: Um framework PHP poderoso e elegante para
                  desenvolvimento web.
                </p>
              </div>
            </v-col>

            <v-col cols="12" md="2">
              <v-icon size="50">mdi-vuejs</v-icon>
              <p>
                Vue.js: Um framework JavaScript progressivo para construir
                interfaces de usuário interativas.
              </p>
            </v-col>

            <v-col cols="12" md="2">
              <v-icon size="50">mdi-database-cog</v-icon>
              <p>
                MySQL: Um sistema de gerenciamento de banco de dados relacional.
              </p>
            </v-col>

            <v-col cols="12" md="2">
              <v-icon size="50">mdi-vuetify</v-icon>
              <p>
                Vuetify: Uma biblioteca de componentes de interface de usuário
                baseada no Vue.js.
              </p>
            </v-col>

            <v-col cols="12" md="2">
              <v-icon size="50">mdi-tailwind</v-icon>
              <p>
                TailwindCSS: Framework para desenvolvimento de interfaces
                modernas de forma rápida e flexível.
              </p>
            </v-col>
            <v-col cols="12" md="2">
              <v-icon size="50">mdi-chart-tree</v-icon>
              <p>
                Power BI: Plataforma poderosa para análise de dados e dashboards
                intuitivos.
              </p>
            </v-col>
          </v-row>
        </div>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      images: [
        {
          name: "img/logo-myvos.jpg",
          title: "MyVos",
          site: "https://myvos.com.br/",
        },
        {
          name: "img/ere.jpg",
          title: "Método éRe",
          site: "https://metodoere.use303.com.br/",
        }
      ],
      currentPosition: 0,
      imagesPerSlide: 4,
      isSmallScreen: window.innerWidth < 768
    };
  },
  computed: {
    visibleImages() {
      const startIndex = this.currentPosition;
      const endIndex = startIndex + this.imagesPerSlide;
      return this.images.slice(startIndex, endIndex);
    },
  },
  methods: {
    nextSlide() {
      if (this.currentPosition + this.imagesPerSlide < this.images.length) {
        this.currentPosition++;
      }
    },
    prevSlide() {
      if (this.currentPosition > 0) {
        this.currentPosition--;
      }
    },
  },
};
</script>

<style scoped>
.transparent-card {
  background-color: rgba(255, 255, 255, 0.1);
  border-radius: 8px;
  color: white;
}
.gap {
  gap: 1rem;
}

/* CSS para o efeito de hover */
.image-card {
  position: relative;
  overflow: hidden;
  cursor: pointer;
  transition: all 0.3s ease; /* Transição suave */
}

.image-card:hover {
  opacity: 0.8; /* Diminui a opacidade ao passar o mouse */
}

/* CSS para a div com o link para o site */
.image-card .link-container {
  position: absolute;
  bottom: -100%; /* Inicialmente, a div está escondida acima da imagem */
  left: 0;
  width: 100%;
  background-color: rgba(0, 0, 0, 0.8);
  color: white;
  padding: 10px;
  transition: bottom 0.3s ease; /* Efeito de deslizamento de baixo para cima */
}

.image-card:hover .link-container {
  bottom: 0; /* Mostra a div com o link ao passar o mouse */
}
</style>
