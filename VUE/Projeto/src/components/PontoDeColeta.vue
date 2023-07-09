<script setup>
import router from '../router/index';

const pontosEmAnalise = await fetch("http://localhost:8005/getPdcUnderReview.php");
const data = await pontosEmAnalise.json();

</script>

<template>
  <div class="ponto-wrapper" v-for="ponto in data">
    
    <div class="card-row card-title">
      <h1>Ponto de coleta solicitado</h1>
    </div>
    <div class="card-row">
      <span class="title">Empresa solicitante </span>
      <p style="font-size: 1.5em;"> {{ ponto.EMP_NOME }}</p>
    </div>
    <div class="card-row">
    </div>
    <div class="card-row btn">
      <div class="review-btn" @click="router.push(`/dashboard/revisar_ponto/${ponto.PDC_ID}/${ponto.PDC_EMP_ID}`)">
        Analisar</div>
    </div>
  </div>
</template>

<style scoped>
div.ponto-wrapper {
  position: relative;
  text-align: center;
  display: flex;
  border-radius: 0.3em;
  flex-direction: column;
  width: 100%;
  height: 50vh;
  background-color: var(--white);
  box-shadow: #ccc 5px 5px 10px;
}

.review-btn{
  display: flex;
  justify-content: center;
  align-items: center;
  font-weight: 500;
  width: 25%;
  height: 50%;
  box-shadow: #ccc 1px 2px 5px;
  cursor: pointer;
  color: var(--white);
  background-color: #1cb138;
  border-radius: 0.2em;
}

.card-title{
  display: flex;
  justify-content: center;
  align-items: center;
  color: white;
  background-color: #1cb138;
}

.title {
  font-size: 2em;
}

.card-row {
  border-radius: 0.3em 0.3em 0 0 ;
  margin-bottom: 0.5em;
  width: 100%;
  height: 15%;
  padding: 0.5em;
  text-align: left;
}

.btn{
  display: flex;
  justify-content: flex-end;
  align-items: flex-end;
  height: 25%;
  position: absolute;
  bottom: 0;
}

div.review-btn:active{
  background-color: #158329;
  
}

</style>