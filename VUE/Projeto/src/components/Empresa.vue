<script setup>

let res = await fetch("http://localhost:8005/depuracao.php")
let empresas = await res.json()

</script>

<template>
  <div v-for="empresa in empresas" class="empresa">
    <h1>{{ empresa.name }}</h1>
    <p>Email - {{ empresa.email }}</p>
    <p>Telefone - {{ empresa.telefone }}</p>
    <p>Cnpj - {{ empresa.cnpj }}</p>
  </div>
</template>

<style scoped>
  div.empresa{
    width: 50%;
    height: max-content;
    border: solid 1px ;
  }
  h1{
    font-weight: bold;
    font-size: 1.3em;
    color: var(--green);
  }
  p{
    color: black;
  }
</style>