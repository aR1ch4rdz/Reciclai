<script setup>

let res = await fetch("http://localhost:8005/getUnderReview.php")
let empresas = await res.json()

</script>

<template>
  <div v-for="empresa in empresas" class="empresa">
    <h1>{{ empresa.EMP_ID }}</h1>
    <p>CNPJ - {{ empresa.EMP_CNPJ }}</p>
    <p>Telefone - {{ empresa.EMP_STATUS }}</p>
  </div>
</template>

<style scoped>
  
  div.empresa{
    border-radius: 0.5em;
    padding: 1em;
    height: 25%;
    box-shadow: hsla(0, 0%, 0%, 0.384) 0px 0px 5px;
    height: max-content;
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