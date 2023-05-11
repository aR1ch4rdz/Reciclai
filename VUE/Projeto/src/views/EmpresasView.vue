<script setup>
import Empresa from "../components/Empresa.vue"
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
  width: 100%;
  height: 90%;
  display: flex;
  flex-direction: column;
  align-items: center;
}
</style>