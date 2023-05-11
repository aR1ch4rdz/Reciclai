<script setup>
import { logedUser } from '../assets/variaveis.js';
import { reactive } from 'vue';

const userUpdate = reactive({
  name: logedUser.name,

})


</script>

<template>
  <div class="container">
    <form action="">
      <h1>ATUALIZAR DADOS</h1>
        <div class="input-wrapper">
          <input v-model="userUpdate.name" type="text" placeholder="">
          <label for="">Nome da empresa</label>
        </div>
        <div class="input-wrapper">
          <input type="text" placeholder="">
          <label for="">Nova Senha</label>
        </div>
        <div class="input-wrapper">
          <input type="text" placeholder="">
          <label for="">Confirmar Senha</label>
        </div>
        <div class="input-wrapper">
          <button class="register-btn">Atualizar</button>
        </div>
    </form>
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

form {
  margin-top: 2rem;
  height: 100%;
  width: 100%;
  display: flex;
  justify-content: flex-start;
  flex-direction: column;
  align-items: center;
  gap: 1.5rem;
}

form h1 {
  color: var(--green);
}


div.input-wrapper {
  display: flex;
  justify-content: center;
  position: relative;
  width: 30%;
}

input {
  border: solid 1.5px #ccc;
  border-radius: 1rem;
  background: none;
  padding: 1rem;
  font-size: 1rem;
  color: black;
  width: 100%;
  transition: 150ms cubic-bezier(0.4, 0, 0.2, 1);
}

label {
  position: absolute;
  left: 16px;
  color: black;
  background-color: var(--white);
  pointer-events: none;
  transform: translateY(1rem);
  transition: 150ms cubic-bezier(0.4, 0, 0.2, 1);
}

input:focus {
  outline: none;
  border: 1.5px solid var(--green);
}

input:not(:placeholder-shown)~label {
  transform: translateY(-50%) scale(0.9);
  background-color: var(-white);
  padding: 0 0.2em;
}

input:focus~label {
  transform: translateY(-50%) scale(0.9);
  background-color: var(-white);
  padding: 0 0.2em;
}

button.register-btn {
  cursor: pointer;
  width: 100%;
  padding: 0.7em;
  border: none;
  border-radius: 1em;
  background: var(--green);
  color: var(--white);
  font-weight: bold;
  font-size: 1em;
}

</style>