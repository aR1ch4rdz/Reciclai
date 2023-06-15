<script setup>
import { PlusCircleIcon, MapPinIcon } from '@heroicons/vue/24/outline';

</script>

<template>
  <div class="button-wrapper">
    <span class="icon-wrapper">
      <PlusCircleIcon class="icon" />
    </span>
    <span class="text-wrapper">
      Adicionar Novo Ponto
    </span>
  </div>
</template>

<style scoped>

.button-wrapper {
  user-select: none;
  display: inline-flex;
  height: 5%;
  background-color: var(--green);
  overflow: hidden;
  border-radius: 5px;
  font-size: 1em;
  font-weight: 500;
  cursor: pointer;
}

.text-wrapper {
  display: inline-flex;
  align-items: center;
  padding: 0 0.5em;
  color: white;
}

.icon {
  color: white;
  height: 100%;
}

.icon-wrapper {
  height: 100%;
  padding: 0 0.5em;
}
</style>