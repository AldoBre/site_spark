<template>
    <div>
      <p>Free Memory: {{ Math.floor(memoryData.free_memory_mb) }} MB</p>
      <p>Total Memory: {{ Math.floor(memoryData.total_memory_mb) }} MB</p>
      <p>Used Memory: {{ Math.floor(memoryData.used_memory_mb) }} MB</p>
      <p>Shared Memory: {{ Math.floor(memoryData.share_memory_mb) }} MB</p>
      <p>Cache Memory: {{ Math.floor(memoryData.cache_memory_mb) }} MB</p>
    </div>
  </template>

  <script>
  import axios from "axios";

  export default {
    data() {
      return {
        memoryData: {},
      };
    },
    mounted() {
      this.fetchMemoryData(); // Chama a função para buscar os dados assim que o componente é montado
      this.updateMemoryData(); // Chama a função para atualizar os dados a cada 1 segundo
    },
    methods: {
      fetchMemoryData() {
        axios
          .get("http://191.252.113.222:5000/api/memory_usage") // Substitua SUA_API_URL pela URL real da sua API
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
