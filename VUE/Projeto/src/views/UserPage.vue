<script setup>
import { logedUser, myCompany, userPoint } from '../assets/variaveis.js';
import { createNewCollectPoint, getCompany,getUserPoints } from '../assets/functions.js';
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

const showMap = ref(false);

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
      <CadastroCard v-if="myCompany === false " />
      <UserCompanyMessage v-else-if = "myCompany.EMP_STATUS === 'EM ANALISE' "/>
      <div class="create" v-else>
        <h1>Criar um ponto de coleta</h1>
        
      </div>

      <div class="map-wrapper" v-if="showMap">
        <CreateCollectPoint />
        <div class="teste-btn">
          <div class="btn" @click="createNewCollectPoint(selectedLocation.lat, selectedLocation.lng)">Criar Ponto</div>
        </div>
      </div>

    </div>
  </div>
</template>

<style scoped>
div.map-wrapper {
  width: 100%;
  height: 100%;
}

div.teste-btn {
  width: 100%;
  position: absolute;
  bottom: 0;
}

.btn {
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

div.main-content {
  position: relative;
  margin-left: 15%;
  display: flex;
  width: 100%;
  height: 100%;
  overflow-y: scroll;
}
/* create ponto */

.create{
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: purple;
}
</style>