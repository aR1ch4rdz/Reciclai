<script setup>
import { ref, reactive } from 'vue';
import { logedUser } from '../assets/variaveis';
import { getCompany } from '../assets/functions';
import InputForm from '../components/formulario/InputForm.vue';

const firstName = ref(logedUser.name.split(" ")[0])
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
  console.log(data)
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
      <h1 style="color: var(--green); margin-bottom: 0.2em;">Olá {{ firstName }}</h1>
      <p>
        Você está convidado(a) a fazer parte da nossa rede de coleta! Acreditamos que juntos podemos promover uma grande
        transformação no setor de reciclagem e preservação do meio ambiente.
        <br>
        Ao se cadastrar em nossa plataforma, você terá a oportunidade de ampliar sua visibilidade e  fortalecer sua marca.
      </p>
      <div class="cadastro-btn" @click="() => showForms()">Cadastrar Minha Empresa</div>
    </div>

    <div ref="formRef" class="form-wrapper">
      <form @submit.prevent="() => handleForm(empresaData)">
        <h1 style="color: var(--green); text-align: center; font-size: 2.5em; font-weight: 900;">Cadastrar Empresa</h1>
        <InputForm iWidth="80%" label="Nome da empresa" v-model="empresaData.nome" />
        <InputForm iWidth="80%" label="cnpj" v-model="empresaData.cnpj" />
        <InputForm iWidth="80%" label="cep" v-model="empresaData.cep" />
        <button class="form-btn">Cadastrar</button>
      </form>
    </div>
  </div>
</template>


<style scoped>
.form-btn{
  padding: 0.2emx;
  width: 80%;
  padding: 0.1em;
  border-radius: 0.3em;
  cursor: pointer;
  border: none;
  font-size: 1.3em;
  background: var(--green);
  color: var(--white);
}

div.cadastro-btn {
  width: 50%;
  margin-top: 1em;
  user-select: none;
  color: white;
  font-size: 1.3em;
  font-weight: 500;
  padding: 0.4em;
  box-shadow: #ccc 1px 2px 5px;
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
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  border-radius: 1em;
  padding: 1em;
  text-align: center;
}

div.card h1 {
  font-size: 3em;
}

div.card p {
  font-size: 1.5em;
  width: 65%;
}

div.content {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
}

div.form-wrapper {
  display: none;
  background-color: #ffffff;
  align-items: center;
  justify-content: center;
  position: absolute;
  width: 100%;
  height: 100%;
}

form {
  padding: 1em;
  background: #ffffff;
  display: flex;
  align-items: center;
  width: 50%;
  flex-direction: column;

}

</style>