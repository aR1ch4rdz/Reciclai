<script setup>
import { logedUser } from '../assets/variaveis.js';
import { reactive, ref } from 'vue';
import CadastroCard from '../components/CadastroCard.vue';

import UserMenu from '../components/UserMenu.vue';
import BotaoAdicionar from '../components/BotaoAdicionar.vue';
import InputForm from '../components/formulario/InputForm.vue';

const pontoData = reactive({
  cep: "",
  lat: "",
  lon: ""
})
function resetInput(){
  pontoData.cep = "",
  pontoData.lat = "",
  pontoData.lon = ""
}

async function handleForm(data) {
  let formData = new FormData();
  console.log(data)

  formData.append('cep', data.cep)
  formData.append('empID', logedUser.empresaID)
  formData.append('status', 'EM ANALISE')
  formData.append('empLat', data.lat)
  formData.append('empLon', data.lon)
  await fetch('http://localhost:8005/createPdc.php', {
    method: 'POST',
    body: formData
  })
    .then(async res => {
      let response = await res.json()
      if (response.success) {
        alert("ponto criado")
      }
      else {
        alert("erro:" + response.message)
      }
    }).finally(resetInput())
}

function teste() {
  console.log(pontoData)
}

</script>

<template>
  <div class="content-wrapper">
    <UserMenu />
    <CadastroCard v-if="logedUser.type == 'PADRAO'" />
    <h1>Você não possui pontos cadastrados</h1>
    <h2>Adicione novos pontos de coleta </h2>

    <form @submit.prevent="handleForm(pontoData)">
      <div class="input-wrapper">
        <InputForm v-model="pontoData.cep" label="CEP" />
      </div>

      <div class="input-wrapper">
        <InputForm v-model="pontoData.lat" label="Latitude" />
      </div>

      <div class="input-wrapper">
        <InputForm v-model="pontoData.lon" label="Longitude" />
      </div>
      <button class="btn">
        <BotaoAdicionar />
      </button>
    </form>
  </div>
</template>

<style scoped>
div.content-wrapper {
  display: flex;
  position: relative;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin-left: 15%;
  width: 100%;
  height: 100%;
}

div.input-wrapper {
  display: flex;
  justify-content: center;
  position: relative;
  width: 70%;
}

/* Codigo do futuro componente */
.btn {
  width: 30%;
}

/* 
div.add-content {
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content:center;
} 
*/
form {
  height: 100%;
  width: 50%;
  display: flex;
  justify-content: center;
  flex-direction: column;
  align-items: center;
  gap: 1.5rem;
}
</style>