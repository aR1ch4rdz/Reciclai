<script setup>
import { logedUser } from '../assets/variaveis.js';
import { reactive, ref } from 'vue';
import CadastroCard from '../components/CadastroCard.vue';
import UserMenu from '../components/UserMenu.vue';
import BotaoAdicionar from '../components/BotaoAdicionar.vue';

const pontoData = reactive({
  cep: "",
  lat: "",
  lon: ""
})

async function handleForm(data) {
  let formData = new FormData();

  formData.append('cep', data.cep)
  formData.append('usrID', data.usrID)

  await fetch('http://localhost:8005/createEmp.php', {
    method: 'POST',
    body: formData
  })
  .then(async res => {
    let response = await res.json()
    if (response.success) {
      alert("ponto criado")
    }
    else {
      alert("erro:" + response.message)
    }
  })

}

</script>

<template>
  <div class="content-wrapper">
    <UserMenu />
    <CadastroCard v-if="logedUser.type == 'PADRAO'" />
    <div class="add-content">
      <h1>Você não possui pontos cadastrados</h1>
      <h2>Adicione novos pontos de coleta </h2>
      <div class="btn">
        <BotaoAdicionar />
      </div>

      <form @submit.prevent="handleForm(pontoData)">
        <label>CEP</label>
        <input type="text" v-model="pontoData.cep">

        <label>latitude</label>
        <input type="text" v-model="pontoData.lat">

        <label>longitude</label>
        <input type="text" v-model="pontoData.lon">
      </form>
    </div>
  </div>
</template>

<style scoped>
div.content-wrapper {
  display: flex;
  position: relative;
  margin-left: 15%;
  width: 100%;
  height: 100%;
}

/* Codigo do futuro componente */
.btn{
  width: 15%;
}

div.add-content{
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
}


</style>