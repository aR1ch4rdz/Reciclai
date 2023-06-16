<script setup>
  import { logedUser } from '../assets/variaveis';
</script>

<template>
  <header>
    <div class="wrapper">
    <div class="logo-wrapper"><img alt="Recicla ai logo" class="logo" src="@/assets/logo.svg"/></div>
      <nav>
        <RouterLink v-if="logedUser.type != 'ADMIN'" class="nav-item" to="/">Home</RouterLink>
        <RouterLink v-if="logedUser.type == 'ADMIN'" class="nav-item" to="/dashboard">Visão Geral</RouterLink>
        <RouterLink v-if="logedUser.type != 'ADMIN'" class="nav-item" to="/sobre">Sobre</RouterLink>
        <RouterLink v-if="logedUser.type == 'EMPRESA'" class="nav-item" to="/CreateCollectPoint">Criar Ponto</RouterLink>
        <RouterLink v-if="logedUser.isLoged == false" class="nav-item" to="/login">Login</RouterLink>
        <RouterLink v-if="logedUser.isLoged" class="nav-item" to="/userpage">{{ logedUser.name }}</RouterLink>
        <RouterLink v-if="logedUser.isLoged == true" class="nav-item" to="/login">LOGOUT</RouterLink>
      </nav>
    </div>
  </header>
</template>

<style scoped>
  img{
    height: 100%;
  }
  header{
    height: 10%;
    box-shadow: hsla(0, 0%, 0%, 0.384) 0px 0px 5px;
    padding: 0.2em;
    font-weight: 500;
    z-index: 1000;
    font-size: 1.2em;
    border-bottom: solid #ccc 1px;
  }
  div.wrapper{
    display: flex;
    height: 100%;
    width: 100%;
  }
  .logo-wrapper{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 15%;
  }

  nav{
    min-height:100%;
    width: 85%;
    display: flex;
    align-items: center;
    gap: 1em;
  }
  .nav-item{
    color: black;
    width: 100% ;
    text-align: center;
    transition: all 200ms;
  }
  .nav-item:hover{
    color: var(--green);
    
  }
  .currentPos{
    color: var(--green);
  }
  a{
    text-decoration: none;
  }
</style>