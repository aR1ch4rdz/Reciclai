<script setup>
import { logedUser } from '../assets/variaveis.js';
import { reactive } from 'vue';
import Empresa from '../components/Empresa.vue';

const userUpdate = reactive({
  name: logedUser.name,

})


</script>

<template>
  <div class="container">
    <Suspense>
      <Empresa></Empresa>
      <template #fallback>
        Carregando...
      </template>
    </Suspense>
  </div>
</template>

<style scoped>
div.container {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 80%;
}


</style>