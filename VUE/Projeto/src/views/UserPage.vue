<script setup>

import { logedUser, myCompany, userPoint, showMap } from '../assets/variaveis.js';
import { createNewCollectPoint, getCompany, getUserPoints } from '../assets/functions.js';
import { ref } from 'vue';
import CadastroCard from '../components/CadastroCard.vue';
import UserMenu from '../components/UserMenu.vue';
import CreateCollectPoint from '../components/CreateCollectPoint.vue';
import { selectedLocation } from '../components/CreateCollectPoint.vue';
import UserCompanyMessage from '../components/UserCompanyMessage.vue';

getUserPoints(logedUser.empresaID)

const pontoData = ref({
  lat: "",
  lon: ""
});


function resetInput() {
  pontoData.lat = "",
    pontoData.lon = ""
}

getCompany(logedUser.ID)

</script>

<template>
  <div class="content-wrapper">
    <UserMenu />
    <div class="main-content">
      <CadastroCard v-if="myCompany === false" />
      <UserCompanyMessage v-else-if="myCompany.EMP_STATUS === 'EM ANALISE'" />
      <div class="map-wrapper" v-else>
        <div class="create-message" v-if="showMap == false">
          <h1>Cadastre seu ponto de coleta.</h1>
          <button
            style="border: none; padding: 0.5em; width: 20%; border-radius: 0.3em; background: var(--green); color: var(--white); font-weight: 800; cursor: pointer;"
            @click="showMap = !showMap">Click aqui</button>
        </div>
        <CreateCollectPoint v-if="showMap === true" />
        <div v-if="showMap === true" class="teste-btn">
          <div v-if="selectedLocation.lat !== null && selectedLocation.lng !== null" class="btn"
            @click="createNewCollectPoint(selectedLocation.lat, selectedLocation.lng)">Criar Ponto</div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.create-message {
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

div.map-wrapper {
  position: absolute;
  width: 100%;
  height: 100%;
}

div.teste-btn {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  bottom: 0;
  transition: ease-in 2s;
}

.btn {
  border-radius: 0.3em 0.3em 0 0;
  width: fit-content;
  width: 50%;
  text-align: center;
  font-size: 2em;
  height: 100%;
  cursor: pointer;
  background-color: var(--green);
  color: var(--white);
}

div.content-wrapper {
  display: flex;
  position: relative;
  width: 100%;
  height: 100%;
}

div.main-content {
  position: relative;
  margin-left: 15%;
  display: flex;
  width: 100%;
  height: 100%;
  overflow-y: scroll;
}

/* create ponto */

.create {
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: purple;
}</style>