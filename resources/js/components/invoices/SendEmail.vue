<template>
    <v-container fluid class="fill-height">
      <v-row justify="center" align="center">
        <v-col cols="6">
          <div class="d-flex text-center flex-column gap transparent-card pa-2 px-5">
            <h2 class="font-weight-black">
              Recebemos seu e-mail, logo entraremos em contato, obrigado!
            </h2>
            <v-spacer></v-spacer>
            <h3>Você será redirecionado para a home em {{ countdown }}...</h3>
          </div>
        </v-col>
      </v-row>
    </v-container>
  </template>

<script>
export default {
  data() {
    return {
      countdown: 900000,
    };
  },
  mounted() {
    this.startCountdown();
  },
  methods: {
    startCountdown() {
      const interval = setInterval(() => {
        this.countdown -= 1;
        if (this.countdown === 1) {
          clearInterval(interval);
          this.$router.push("/");
        }
      }, 100000000);
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
</style>
