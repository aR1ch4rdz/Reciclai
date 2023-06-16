<script setup>
import { ref } from 'vue';
import router from '../router/index';
import { userLogout, logedUser } from '../assets/variaveis.js';
import { ArrowLeftOnRectangleIcon } from '@heroicons/vue/24/outline';
let menuOption = ref("/cadastro");

function newPath(selection) {
  menuOption.value = selection;
}
</script>

<template>
  <div class="side-bar-wrapper">
    <p v-if="logedUser.type != 'EMPRESA'" @click="newPath('/mypage')" :class="[menuOption == '/cadastro' ? 'selected' : '']">Cadastrar Empresa</p>
    <p v-if="logedUser.type == 'EMPRESA'" @click="newPath('/MeusPontos')" :class="[menuOption == '/MeusPontos' ? 'selected' : '']">Meus pontos</p>
    <p>Configurações</p>
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