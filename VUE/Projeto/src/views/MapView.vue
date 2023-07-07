<script setup>
import { onMounted, ref } from 'vue';
import showPoints from '../components/showPoints.vue';

let outro = ref({})

async function teste() {
  fetch('http://localhost:8005/depuracao.php')
    .then(res => res.json())
    .then(data => outro.value = data);
}

onMounted(() => {
  teste();
})
</script>

<template>
  <div class="content">
    <div class="map-wrapper">
      <h1 style="padding: 1em;
      font-size: 2em;">Localização do ponto</h1>
      <showPoints />
    </div>
    
    <div class="location-wrapper">
      <div class="empresa" v-for="opa in outro">
        <h1><a v-bind:href="'https://www.google.com.br/maps/place/' + opa.EMP_LATITUDE + ',' + opa.EMP_LONGITUDE">Empresa{{ opa.PDC_ID }}</a></h1>
        <br />
      </div>
    </div>
  </div>
</template>

<style scoped>
a {
  color: var(--green);
}

div.content {
  width: 100%;
  height: 100%;
  display: flex;
}

div.location-wrapper,
div.map-wrapper {
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}


div.empresa {
  cursor: default;
  padding: 1em;
  border-radius: 1em;
  width: 50%;
  height: max-content;
  margin-top: 1em;
  box-shadow: hsla(0, 0%, 0%, 0.384) 0px 0px 3px;
}

h1 {
  font-weight: bold;
  font-size: 1.3em;
  color: var(--green);
}

p {
  color: black;
}
</style>