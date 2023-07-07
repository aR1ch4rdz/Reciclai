<script setup>
import { FaceFrownIcon } from '@heroicons/vue/24/outline';

</script>

<template>
  <div class="empty-wrapper">
    <div class="message">
      <div class="icon-row">
        <FaceFrownIcon class="sad-icon" />
      </div>
      <div class="message-row">
        <h1 style="font-size: 1.5em; font-weight: 400;">Sem Empresas Para Analisar</h1>
      </div>
      <div class="message-row" style="border-top: 1px solid #ccc;">
        <p>Verifique novamente mais tarde.</p>
      </div>
    </div>
  </div>
</template>

<style scoped>
div.empty-wrapper {
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  width: 100%;
  height: 100%;
}

div.message {
  border-radius: 0.3em;
  background-color: white;
  box-shadow: 0px 0px 10px #ccc;
  width: 40%;
  height: 60%;
  padding: 2em;
}

div.message-row {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 20%;
}

div.icon-row {
  text-align: center;
  width: 100%;
  height: 30%;
  /* background-color: red; */
}

div.message-row p{
  font-size: 1.5em;
  margin-top: 5%;
  font-weight: 400;
}

.sad-icon {
  height: 100%;
}
</style>