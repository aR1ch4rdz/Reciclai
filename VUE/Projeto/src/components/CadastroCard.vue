<script setup>
import { ref, reactive } from 'vue';
import { logedUser } from '../assets/variaveis';
import { getCompany } from '../assets/functions'

const empresaData = reactive({
  nome: "",
  cnpj: "",
  cep: "",
  status: "EM ANALISE",
  usrID: logedUser.ID
});

const formRef = ref(null);
const showForm = ref(false);

function showForms() {
  showForm.value = !showForm.value
  if (showForm.value) {
    formRef.value.style.display = "flex"
  } else {
    formRef.value.style.display = "none"
  }
}

async function handleForm(data) {
  let formData = new FormData();

  formData.append('nome', data.nome)
  formData.append('cnpj', data.cnpj)
  formData.append('cep', data.cep)
  formData.append('status', data.status)
  formData.append('usrID', data.usrID)
  console.log(data);
  await fetch('http://localhost:8005/createEmp.php', {
    method: 'POST',
    body: formData
  })
  .then(async res => {
    let response = await res.json()
    if (response.success) {
      alert("empresa criada");
      getCompany(logedUser.ID)
    }
    else {
      alert("erro:" + response.message);

    }
  })

}


</script>

<template>
  <div class="content">
    <div class="card">
      <h1 style="color: var(--green);">Bem vindo pipipi popopo</h1>
      <p>
        ---&gt; Fingir que existe um texto motivacional nesse local &lt;---
      </p>
      <div class="cadastro-btn" @click="() => showForms()">Cadastrar Minha Empresa</div>
    </div>
    <div ref="formRef" class="form-wrapper">
      <form @submit.prevent="() => handleForm(empresaData)">
        <label for="">nome</label>
        <input type="text" v-model="empresaData.nome">

        <label for="">cnpj</label>
        <input type="text" v-model="empresaData.cnpj">

        <label for="">cep</label>
        <input type="text" v-model="empresaData.cep">
        <button>enviar</button>
      </form>
    </div>
  </div>
</template>


<style scoped>
div.cadastro-btn {
  position: absolute;
  bottom: 5%;
  width: 50%;
  user-select: none;
  color: white;
  font-weight: 500;
  padding: 0.4em;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
  background-color: var(--green);
}

div.cadastro-btn:active {
  background-color: #1fb93b;
}


div.card {
  position: relative;
  width: 40%;
  height: 80%;
  display: flex;
  align-items: center;
  flex-direction: column;
  border: solid 1px;
  border-radius: 1em;
  padding: 1em;

}

div.content {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
}

/* tse */

div.form-wrapper {
  backdrop-filter: blur();
  display: none;
  align-items: center;
  justify-content: center;
  position: absolute;
  width: 100%;
  height: 100%;
  backdrop-filter: blur(1px);
  
}

form {
  background: #1fb93b;
  display: flex;
  width: 30%;
  height: 80%;
  border: solid 1px;
  flex-direction: column;
}
</style>