<script setup>
import { reactive, ref } from 'vue';
import { logedUser, setIsLoged } from "../assets/variaveis"


const user = reactive({
  nome: "",
  email: "",
  cnpj: "",
  telefone: "",
  senha: ""
});

function resetInputs() {
  user.nome = ""
  user.email = ""
  user.cnpj = ""
  user.telefone = ""
  user.senha = ""
}

async function formSubmit(user) {

  let formData = new FormData();
  formData.append("name", user.nome);
  formData.append("email", user.email);
  formData.append("cnpj", user.cnpj);
  formData.append("phone", user.telefone);
  formData.append("password", user.senha);

  let response = await fetch('http://localhost:8005/createUser.php', {
    method: 'POST',
    body: formData
  })
  .then((res)=>{
    if(res.status == 200){
      alert("conta criada")
    }else{
      alert("erro de email cadastrado")
    }
  })
  .finally(()=>{
    resetInputs()
  })
  
  
}

function showPass() {
  if (senha.value.type === "password") {
    senha.value.type = "text"
    senhaConfirmar.value.type = "text"
  } else {
    senha.value.type = "password"
    senhaConfirmar.value.type = "password"
  }
}

const senha = ref([]);
const senhaConfirmar = ref([]);

</script>

<template>
  <form v-if="logedUser.isLoged == false" @submit.prevent="formSubmit(user)">
    <h1>Registrar Empresa</h1>
    <div class="input-wrapper">
      <input required type="text" placeholder="" v-model="user.nome">
      <label>Nome</label>
    </div>
    <div class="input-wrapper">
      <input required type="email" placeholder="" v-model="user.email">
      <label>Email</label>
    </div>
    <div class="input-wrapper">
      <input required type="text" minlength="14" maxlength="14" placeholder="" v-model="user.cnpj">
      <label>CNPJ</label>
    </div>
    <div class="input-wrapper">
      <input required type="text" placeholder="" v-model="user.telefone">
      <label>Telefone</label>
    </div>
    <div class="input-wrapper">
      <input ref="senha" type="password" placeholder="" v-model="user.senha">
      <label>Senha</label>
    </div>
    <div class="input-wrapper">
      <button class="register-btn">Registrar</button>
    </div>
  </form>
</template>

<style scoped>
form {
  margin-top: 2rem;
  height: 80%;
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

.invalidInput {
  border: 1px solid red;
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