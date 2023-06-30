<script setup>
import { logedUser } from '../assets/variaveis.js';
import { reactive, ref } from 'vue';
import CadastroCard from '../components/CadastroCard.vue';
import UserMenu from '../components/UserMenu.vue';
import BotaoAdicionar from '../components/BotaoAdicionar.vue';
import InputForm from '../components/formulario/InputForm.vue';
import CreateCollectPoint from '../components/CreateCollectPoint.vue';
import  {latLngTeste}  from '../components/CreateCollectPoint.vue';

window.addEventListener("click", ()=>{
  console.log(latLngTeste.value)
})
const pontoData = ref({
  cep: "",
  lat: latLngTeste.value.lat,
  lon: latLngTeste.value.lng
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
  console.log(logedUser.empresaID)
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
    <CreateCollectPoint/>
    
    <h1>Você não possui pontos cadastrados</h1>
    <h2>Adicione novos pontos de coleta </h2>
    {{latLngTeste.lat}}
    {{latLngTeste.lng}}

    <form @submit.prevent="handleForm(pontoData)">
       <div class="input-wrapper">
        <InputForm :value="123123123" label="CEP" />
      </div>
      
      <div class="input-wrapper">
        <InputForm type="number" :value="latLngTeste.lat"  label="Latitude" />
      </div>
      
      <div class="input-wrapper">
        <InputForm type="number" :value="latLngTeste.lng" label="Longitude" />
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
  flex-direction: row;
  justify-content: center;
  align-items: center;
  margin-left: 15%;
  width: 100%;
  height: 100%;
}

div.input-wrapper {
  display: none;
  justify-content: center;
  position: relative;
  width: 70%;
}

/* Codigo do futuro componente */
.btn {
  width: 30%;
}

#button{
  background-color:#23DE45;
  color: white;
  margin-bottom: 2%;
  padding: 10px 20px;
  border-radius: 12px;
  border: none;
  cursor: pointer;
}

form {
  height: 100%;
  width: 50%;
  display: flex;
  justify-content: center;
  flex-direction: column;
  align-items: center;
  gap: 1.5rem;
}

.input-wrapeper {
  display: none;
}
#point{
  display: flex;

}
</style>