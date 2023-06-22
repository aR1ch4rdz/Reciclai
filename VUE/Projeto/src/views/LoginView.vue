<script setup>
import { logedUser, setIsLoged, userLogout, showHeader } from "../assets/variaveis";
import { reactive } from "vue";
showHeader.value = false

function resetInputs() {
  login.email = ""
  login.senha = ""
}

async function getCompanyId(userData) {
  if (userData.USR_TYPE === "EMPRESA") {

    fetch(`http://localhost:8005/getCompany.php?user=${userData.USR_ID}`, {
      method: "GET",
    }).then(async (res) => {
      let empresa = await res.json();
      setIsLoged(true, userData.USR_ID, userData.USR_NAME, userData.USR_TYPE, userData.USR_EMAIL, userData.USR_PHONE, empresa[0].EMP_ID)
      resetInputs()
    })
  } else {
    setIsLoged(true, userData.USR_ID, userData.USR_NAME, userData.USR_TYPE, userData.USR_EMAIL, userData.USR_PHONE)
    resetInputs()
  }
}

const login = reactive({
  email: "anthony@gmail.com",
  senha: "123"
});

async function submitForm(user) {
  let data = null;
  let formData = new FormData();
  formData.append("email", user.email);
  formData.append("password", user.senha);

  await fetch('http://localhost:8005/actionLogin.php', {
    method: 'POST',
    body: formData
  }).then(async (res) => {
    if (res.status == 200) {
      data = await res.json()
    }
  }).finally(async () => {
    getCompanyId(data[0])
  })

}
</script>

<template>
  <div class="container">
    <form v-if="logedUser.isLoged == false" @submit.prevent="submitForm(login)">
      <img width="128" src="../assets/logo.svg" alt="reciclai logo">
      <h1>LOGIN</h1>
      <div class="input-wrapper">
        <input type="email" placeholder="" v-model="login.email">
        <label>Email</label>
      </div>
      <div class="input-wrapper">
        <input type="password" placeholder="" v-model="login.senha">
        <label>Senha</label>
      </div>
      <div class="input-wrapper">
        <button class="login-btn">Fazer Login</button>
      </div>
      <p>Não possui uma empresa registrada? <RouterLink to="registrar">Clique aqui!</RouterLink>
      </p>
      <p>
        <RouterLink to="/">Voltar</RouterLink>
      </p>
    </form>
  </div>
</template>

<style scoped>
div.container {
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

form {
  height: 100%;
  width: 50%;
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
  width: 50%;
}

input {
  border: solid 1.5px #ccc;
  border-radius: 0.7rem;
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

button.login-btn {
  cursor: pointer;
  width: 100%;
  padding: 0.7em;
  border: none;
  border-radius: 0.7em;
  background: var(--green);
  color: var(--white);
  font-weight: bold;
  font-size: 1em;
}
</style>
