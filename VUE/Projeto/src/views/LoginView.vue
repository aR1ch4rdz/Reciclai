<script setup>
import { reactive, onMounted } from "vue";
import { logedUser, setIsLoged } from "../assets/variaveis";
import { RouterLink } from "vue-router";

const login = reactive({
  email: "",
  senha: ""
});

async function submitForm(user) {
  let data = null;
  let formData = new FormData();
  formData.append("email", user.email);
  formData.append("password", user.senha);
  
  let response = await fetch('http://localhost:8005/userAuth.php', {
    method: 'POST',
    body: formData
  }).then(async (res) => {
    if (res.status == 302) {
      data = await res.json()
      setIsLoged(true, data[0].nome, data[0].email, data[0].telefone, data[0].cnpj)
      logado()
    } 
  })

}

</script>

<template>
  <div class="container">
    <form v-if="logedUser.isLoged == false" @submit.prevent="submitForm(login)">
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
        <button class="register-btn">Fazer Login</button>
      </div>
    </form>
    <div v-else class="loged-message">
      <h1>Usuario Conectado</h1>
      <p>Clique no botão abaixo para acessar a sua página</p>
      <div class="page-btn">
        <RouterLink to="/userpage">Ir para pagina</RouterLink>
      </div>
    </div>
  </div>
</template>

<style scoped>
div.container {
  width: 100%;
  height: 80%;
  display: flex;
  justify-content: center;
  align-items: center;
}

form {
  margin-top: 2rem;
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

.loged-message{
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 0.2em;
  flex-direction: column;
}

.loged-message h1{
  color: var(--green);
}
.page-btn{

  border-radius: 0.8em;
  width: 20%;
  background-color: var(--green);
  padding: 0.3em;
}
.loged-message a{
  font-size: 1em;
  font-weight: bold;
  color: var(--white);
  display: inline-block;
  width: 100%;
  text-align: center;
}
</style>
