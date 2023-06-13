<script setup>
import Chart from 'chart.js/auto'
import { onMounted } from 'vue';

const data = [
  { month: "Janeiro", count: getRandomNumber() },
  { month: "Fevereiro", count: getRandomNumber() },
  { month: "Março", count: getRandomNumber() },
  { month: "Abril", count: getRandomNumber() },
  { month: "Maio", count: getRandomNumber() },
  { month: "Junho", count: getRandomNumber() },
  { month: "Julho", count: getRandomNumber() },
  { month: "Agosto", count: getRandomNumber() },
  { month: "Setembro", count: getRandomNumber() },
  { month: "Outubro", count: getRandomNumber() },
  { month: "Novembro", count: getRandomNumber() },
  { month: "Dezembro", count: getRandomNumber() }
];

var chartOptions = {
  scales: {
    y: {
      beginAtZero: true,
      max: 100
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