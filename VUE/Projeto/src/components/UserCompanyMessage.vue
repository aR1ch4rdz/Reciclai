<script setup>
import { BuildingOfficeIcon } from '@heroicons/vue/24/outline'

</script>

<template>
  <div class="analise">
    <BuildingOfficeIcon class="icon" />
    <h1>Sua empresa foi enviada para analise.</h1>
    <h2>Volte mais tarde.</h2>
  </div>
</template>

<style scoped>
  div.analise{
    color: #1f1f1f;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    width: 100%;
    height: 100%;
  }

  .icon{
    color: #1f1f1f;
    height: 25%;
  }

</style>