<template>
    <div>
      <p>Free Memory: {{ Math.floor(memoryData.free_memory_mb) }} MB</p>
      <p>Total Memory: {{ Math.floor(memoryData.total_memory_mb) }} MB</p>
      <p>Used Memory: {{ Math.floor(memoryData.used_memory_mb) }} MB</p>
      <p>Shared Memory: {{ Math.floor(memoryData.share_memory_mb) }} MB</p>
      <p>Cache Memory: {{ Math.floor(memoryData.cache_memory_mb) }} MB</p>
    </div>
    <Bar
    id="my-chart-id"
    :options="chartOptions"
    :data="chartData"
  />
  </template>

  <script>
  import axios from "axios";
  import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

  export default {
    components: { Bar },
    data() {
      return {
        memoryData: {},
        chartData: {
        labels: [ 'January', 'February', 'March' ],
        datasets: [ { data: [40, 20, 12] } ]
      },
      chartOptions: {
        responsive: true
      }
      };
    },
    mounted() {
      this.fetchMemoryData(); // Chama a função para buscar os dados assim que o componente é montado
      this.updateMemoryData(); // Chama a função para atualizar os dados a cada 1 segundo
    },
    methods: {
      fetchMemoryData() {
        axios
          .get("https://sparkdev.com.br/api/memory_usage") // Substitua SUA_API_URL pela URL real da sua API
          .then((response) => {
            this.memoryData = response.data;
          })
          .catch((error) => {
            console.error("Erro ao buscar os dados da API:", error);
          });
      },
      updateMemoryData() {
        setInterval(() => {
          this.fetchMemoryData(); // Chama a função para buscar os dados a cada 1 segundo
        }, 1000); // Atualiza os dados a cada 1 segundo (1000 ms)
      },
    },
  };
  </script>
