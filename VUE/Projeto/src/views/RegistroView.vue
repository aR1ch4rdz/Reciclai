<script setup>
import { reactive, ref } from 'vue';
import { logedUser,showHeader } from "../assets/variaveis"
import { EyeIcon, EyeSlashIcon } from '@heroicons/vue/24/outline';
import router from '../router';
showHeader.value = false

const user = reactive({
  nome: "Farma2 Teste",
  email: "Farma2@rec.com",
  telefone: "12345",
  senha: "123"
});

let showPassword = ref(false);


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
  formData.append("phone", user.telefone);
  formData.append("password", user.senha);
  
  let response = await fetch('http://localhost:8005/createUser.php', {
    method: 'POST',
    body: formData
  })
  .then(async res =>{
    let response = await res.json()
    if(response.success){
      router.push('/login')
    }
    else{
      alert("erro:" + response.message)
    }
  })
  .finally(()=>{
    resetInputs()
  })
  
  
}

function togglePasswordVisibility() {
  showPassword.value = !showPassword.value
}


</script>

<template>
  <form v-if="logedUser.isLoged == false" @submit.prevent="formSubmit(user)">
    <img width="128" src="../assets/logo.svg" alt="Reciclai Logo">
    <h1>Cadastre-se</h1>
    <div class="input-wrapper">
      <input required type="text" placeholder="" v-model="user.nome">
      <label>Nome Completo</label>
    </div>
    <div class="input-wrapper">
      <input required type="email" placeholder="" v-model="user.email">
      <label>Email</label>
    </div>
    
    <div class="input-wrapper">
      <input required type="text" placeholder="" v-model="user.telefone">
      <label>Telefone (apenas número)</label>
    </div>
    <div class="input-wrapper">
      <input class="password-input" required :type="showPassword ? 'text' : 'password'" placeholder="" v-model="user.senha">
      <label>Senha teste</label>
      <div class="togglePass" @click="togglePasswordVisibility">
        <EyeSlashIcon class="passIcon" v-if="showPassword" />
        <EyeIcon v-else class="passIcon"/>
      </div>
    </div>
    <div class="input-wrapper">
      <button class="register-btn">Registrar</button>
    </div>
    <p><RouterLink to="/" >Voltar</RouterLink></p>
  </form>
</template>

<style scoped>
form {
  height: 100%;
  width: 100%;
  display: flex;
  justify-content: center;
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

.passIcon {
  width: 2rem;
  color: #ccc;
}
.togglePass {
  position: absolute;
  top: 50%;
  right: 0.5rem;
  transform: translateY(-45%);
  cursor: pointer;
}

.password-input {
  flex: 1;
  padding-right: 2.5rem;
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