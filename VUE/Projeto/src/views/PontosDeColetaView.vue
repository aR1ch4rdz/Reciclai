<script setup>
import { Suspense } from 'vue';
import PontoDeColeta from '../components/PontoDeColeta.vue';
import DashMenu from '../components/DashMenu.vue';
</script>

<template>
  <div class="content-wrapper">
    <DashMenu />
    <div class="content">
      <Suspense>
        <PontoDeColeta />
        <template #fallback>
          Carregando Pontos de coleta...
        </template>
      </Suspense>
    </div>
  </div>
</template>

<style scoped>
div.content-wrapper {
  position: relative;
  display: flex;
  grid-template-columns: 5fr 0.5fr;
  width: 100%;
  min-height: 90%;
}
div.content{
  width: 100%;
  min-height: 100%;
  display: grid;
  padding: 1em;
  gap: 1em;
  grid-template-columns: 9fr 9fr;
  background-color: #ededed;
}
</style>