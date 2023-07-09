<script setup>
import { ref } from 'vue';
import router from '../router/index';
import { userLogout } from '../assets/variaveis.js';
let option = ref(router.currentRoute.value.path)

function newPath(path) {
  option = path
  router.push(path)
}
</script>

<template>
  <div class="side-bar-wrapper">
    <p @click="newPath('/dashboard')" :class="[option == '/dashboard' ? 'selected' : '']">Dashboard</p>
    <p @click="newPath('/dashboard/empresa')" :class="[option == '/dashboard/empresa' ? 'selected' : '']">Empresas em analise</p>
    <p @click="newPath('/dashboard/pontos')" :class="[option == '/dashboard/pontos' ? 'selected' : '']">Pontos em analise</p>
    <p @click="userLogout()">Sair</p>
  </div>
</template>

<style scoped>
.side-bar-wrapper {
  width: 15%;
  height: 100%;
  position: fixed;
  top: 10%;
  bottom: 0;
  left: 0;
  border-right: solid #ccc 1px;
  background-color: var(--white);
}

p {
  cursor: pointer;
  padding: 0.5em;
}

p:hover{
  border-left: var(--green) 3px solid;
  background-color: #f7f7f7;
  
}

.selected {
  border-left: var(--green) 3px solid;
  background-color: #f7f7f7;

}
</style>