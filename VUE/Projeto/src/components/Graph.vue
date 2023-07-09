<script setup>
import Chart from 'chart.js/auto'
import { onMounted } from 'vue';

const data = [
  { month: "Janeiro", count: 5 },
  { month: "Fevereiro", count: 10 },
  { month: "Março", count: 8 },
  { month: "Abril", count: 20 },
  { month: "Maio", count: 25 },
  { month: "Junho", count: 20 },
  { month: "Julho", count: 30 },
  { month: "Agosto", count: 0 },
  { month: "Setembro", count: 0 },
  { month: "Outubro", count: 0 },
  { month: "Novembro", count: 0 },
  { month: "Dezembro", count: 0 }
];

var chartOptions = {
  scales: {
    y: {
      beginAtZero: true,
      max: 50
    }
  }
};

function getRandomNumber(){
  return Math.floor(Math.random() * 101);
}

onMounted(() => {


  new Chart(
    document.getElementById('myChart'),
    {
      data: {
        labels: data.map(row => row.month),
        datasets: [
          {
            type: 'bar',
            backgroundColor: "#23DE45",
            label: 'Empresas cadastradas',
            data: data.map(row => row.count)
          }
        ]
      },
      options: chartOptions,
    }
  );
})



</script>

<template>
  <div class="graph">
    <canvas width="100%" height="100%" id="myChart"></canvas>
  </div>
</template>

<style scoped>
div.graph {
  padding: 1em;
  width: 100%;
  height: 100%;
  background-color: var(--white);
}
</style>