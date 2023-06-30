<script setup>
import { logedUser } from '../assets/variaveis.js';
import { reactive, ref } from 'vue';
import CadastroCard from '../components/CadastroCard.vue';
import UserMenu from '../components/UserMenu.vue';
import CreateCollectPoint from '../components/CreateCollectPoint.vue';
import { selectedLocation } from '../components/CreateCollectPoint.vue';

window.addEventListener("click", () => {
  console.log(selectedLocation.value)
})

console.log(logedUser.empresaID)
const pontoData = ref({
  lat: "",
  lon: ""
});

const showMap = ref(false);

function resetInput() {
  pontoData.lat = "",
  pontoData.lon = ""
}

async function handleForm(lat,lon) {
  let formData = new FormData();

  formData.append('empID', logedUser.empresaID)
  formData.append('status', 'EM ANALISE')
  formData.append('empLat', lat)
  formData.append('empLon', lon)

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

</script>

<template>
  <div class="content-wrapper">
    <UserMenu />
    <div class="content">
      <!-- <CadastroCard v-if="logedUser.type == 'PADRAO'" /> -->
      <!-- <div class="map-wrapper">
      </div> -->
      <CreateCollectPoint v-if="showMap" />
      <div class="teste-btn">
        <div class="btn" @click="handleForm(selectedLocation.lat,selectedLocation.lng)"><span>Criar Ponto</span></div>
      </div>
      <div @click="showMap = !showMap">MOSTRAR MAPA</div>

    </div>
  </div>
</template>

<style scoped>
div.teste-btn{
  width: 100%;
  position: absolute;
  bottom: 0;
}
.btn{
  width: fit-content;
  padding: 0.5em;
  height: 100%;
  background-color: var(--green);
  color: var(--white);
}
div.content-wrapper {
  display: flex;
  position: relative;
  width: 100%;
  height: 100%;
}

div.content {
  position: relative;
  margin-left: 15%;
  display: flex;
  width: 100%;
  height: 100%;
  overflow-y: scroll;
}
</style>