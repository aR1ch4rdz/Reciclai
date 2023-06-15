<script setup>
import { logedUser } from '../assets/variaveis.js';
import { ref, onMounted } from 'vue';
import  BotaoAdicionar  from '../components/BotaoAdicionar.vue'
const hiddenForm = ref(true);

const formRef = ref(null);
function showForm() {
  hiddenForm.value = !hiddenForm.value;
  if (!hiddenForm.value) {
    formRef.value.style.display = "flex";
  } else {
    formRef.value.style.display = "none";
  }
}

</script>

<template>
  <div class="container">
        <BotaoAdicionar @click="showForm()" />

    <form ref="formRef">
      <label for="">adwad</label>
      <input type="text" name="" id="">

      <label for="">adwad</label>
      <input type="text" name="" id="">

      <label for="">adwad</label>
      <input type="text" name="" id="">

    </form>

  </div>
</template>

<style scoped>
form {
  display: none;
  flex-direction: column;
}

div.container {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
}

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

.text-wrapper{
  display: inline-flex;
  align-items: center;
  padding: 0 0.5em;
  color: white;  
}
.icon{
  color: white;
  height: 100%;
}
.icon-wrapper{
  height: 100%;
  padding: 0 0.5em;
}

</style>