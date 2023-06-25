<script setup>
import { onMounted, ref } from 'vue';
import DashMenu from '../components/DashMenu.vue';
import router from '../router/index.js';
import { MapPinIcon, BuildingOfficeIcon } from '@heroicons/vue/24/outline';

const companyID = router.currentRoute.value.params.companyID;
const pointID = router.currentRoute.value.params.pointID;
const currentPoint = ref({})

onMounted(() => {
  fetch(`http://localhost:8005/getCompanyAndPoint.php?companyID=${companyID}&pointID=${pointID}`, {
    method: 'GET'
  }).then(res => res.json()).then(data => currentPoint.value = data[0]);
})

function handleForm(pontoID){
  
  const formData = new FormData();
  formData.append('pontoID',pontoID);

  fetch('http://localhost:8005/aprovarPonto.php',{
    method: 'POST',
    body: formData
  })
  .then(res => res.json())
  .then((res)=>{
    if(res.success){
      alert(res.message)
      router.push('/dashboard/pontos')
    }
  });
}

</script>

<template>
  <div class="content-wrapper">
    <DashMenu />
    <div class="content">
      <div class="row">
        <span class="title">Solicitação para criação de ponto</span>
      </div>

      <div class="card-info">
        <form @submit.prevent="handleForm(pointID)">
          <div class="form-row" style="border-bottom: solid 3px #ccc; margin-bottom: 1em;">
            <span>Informações da empresa</span>
            <span>
              <BuildingOfficeIcon style="height: 100%;" />
            </span>
          </div>
          <label>NOME DA EMPRESA</label>
          <input :value="currentPoint.EMP_NOME" type="text" disabled>
          <label>CNPJ DA EMPRESA</label>
          <input :value="currentPoint.EMP_CNPJ" type="text" disabled>
          <label>STATUS DA EMPRESA</label>
          <input :value="currentPoint.EMP_STATUS" type="text" disabled>

          <div class="form-row" style="border-bottom: solid 3px #ccc; margin-bottom: 1em; margin-top: 1em;">
            <span>Informações do ponto</span>
            <span>
              <MapPinIcon style="height: 100%;" />
            </span>
          </div>
          <label>CEP</label>
          <input :value="currentPoint.PDC_CEP" type="text" disabled>
          <label>LATITUDE</label>
          <input :value="currentPoint.EMP_LATITUDE" type="text" disabled>
          <label>LONGITUDE</label>
          <input :value="currentPoint.EMP_LONGITUDE" type="text" disabled>
          <button class="apro">Aprovar Ponto</button>
          <div @click="router.push('/dashboard/pontos')" class="back-btn">Voltar</div>
        </form>

      </div>
      <!-- PDC_ID, EMP_NOME, EMP_CNPJ, EMP_LATITUDE, EMP_LONGITUDE, PDC_STATUS -->
      <!-- <h1>Empresa solicitando aprovação de ponto: {{ currentPoint.EMP_NOME }}</h1> -->
    </div>
  </div>
</template>

<style scoped>
div.back-btn{
  bottom: 0%;
  width: 15%;
  color: white;
  position: absolute;
  background: #f01919;
  padding: 0.3em;
  text-align: center;
  cursor: pointer;
  border-radius: 0.4em;

}

button.apro{
  position: absolute;
  bottom: 0;
  color: white;
  font-weight: 500;
  width: 15%;
  background-color: #1cb138;
  text-align: center;
  padding: 0.5em;
  align-self: flex-end;
  cursor: pointer;
  border: none;
  border-radius: 0.4em;
}
div.apro:active{
  background: #19a733;
}
div.form-row {
  display: flex;
  height: 8%;
}

div.form-row>span {
  height: 100%;
  display: flex;
  font-size: 2em;
  align-items: flex-end;
}

form {
  position: relative;
  display: flex;
  flex-direction: column;
  gap: 0.2em;
  width: 100%;
  height: 100%;
}

div.card-info {
  padding: 1em;
  width: 80%;
  height: 80%;
  border-radius: 0.3em;
  background-color: var(--white);
  box-shadow: 1px 2px 5px #ccc;
}

div.row {
  margin: 1.5em 0 1em 0;
  display: flex;
  border-radius: 0.2em;
  justify-content: flex-start;
  align-items: center;
  width: 80%;
  height: 10%;
  padding: 1em;
  background-color: var(--white);
  box-shadow: 1px 2px 5px #ccc;
}

.title {
  font-size: 2.5em;
  font-weight: 500;
  background-color: var(--white);
}


div.content-wrapper {
  display: flex;
  width: 100%;
  height: 100%;
}

div.content {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  flex-direction: column;
  width: 100%;
  height: 100%;
  margin-left: 15%;
  background-color: #ededed;
}</style>