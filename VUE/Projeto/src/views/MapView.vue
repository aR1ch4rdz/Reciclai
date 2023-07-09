<script setup>
import { onMounted, ref } from 'vue';
import showPoints from '../components/showPoints.vue';
import { positionDistance, proxPoints } from '../assets/distance';

onMounted(() => {
  positionDistance(10);
})

</script>

<template>
  <div class="content">
    <div class="map-wrapper">
      <showPoints />
    </div>

    <!-- <div class="location-wrapper">
      <h1 style="color: var(--green);">Pontos Proximos</h1>
      <div class="empresa" v-for="opa in proxPoints">
        <h1><a target="_blank"
            v-bind:href="'https://www.google.com.br/maps/place/' + opa.EMP_LATITUDE + ',' + opa.EMP_LONGITUDE">
            {{ opa.data }} </a></h1>
        <br />
        <br />
      </div>
    </div> -->
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

div.map-wrapper {
  width: 100%;
  height: 100%;
}

div.location-wrapper {
  overflow-y: scroll;
  text-align: center;
  padding: 1em;
  width: 30%;
}

div.empresa {
  cursor: default;
  padding: 1em;
  text-align: start;
  border-radius: 1em;
  width: 100%;
  height: max-content;
  margin-top: 1em;
  box-shadow: hsla(0, 0%, 0%, 0.384) 0px 0px 3px;
}

p {
  color: black;
}

</style>