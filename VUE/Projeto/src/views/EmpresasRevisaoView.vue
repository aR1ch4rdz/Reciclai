<script setup>
import { Suspense } from 'vue';
import PontoDeColeta from '../components/PontoDeColeta.vue';
import EmpresaRevisao from '../components/EmpresaRevisao.vue';
import DashMenu from '../components/DashMenu.vue';
</script>

<template>
  <div class="content-wrapper">
    <DashMenu />
    <div class="content">
      <Suspense>
        <EmpresaRevisao />
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
  grid-template-columns: 0.5fr 0.5fr;
  width: 100%;
  min-height: 100%;
}
div.content{
  width: 100%;
  margin-left: 15%;
  min-height: 100%;
  display: grid;
  padding: 1em;
  gap: 1em;
  grid-template-columns: 1fr 1fr;
  background-color: #ededed;
}
</style>