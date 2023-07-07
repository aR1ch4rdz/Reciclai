<script setup>
import { haveCompany } from '../assets/variaveis';
import { Suspense } from 'vue';
import EmpresaRevisao from '../components/EmpresaRevisao.vue';
import DashMenu from '../components/DashMenu.vue';
import EmptyMessage from '../components/EmptyMessage.vue';
</script>

<template>
  <div class="content-wrapper">
    <DashMenu />
    <div class="content">
      <EmptyMessage v-if="haveCompany === false" />
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
  width: 100%;
  min-height: 100%;
}
div.content{
  position: relative;
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