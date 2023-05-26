<script setup>

const empresas = await fetch("http://localhost:8005/getPdcUnderReview.php");
const data = await empresas.json();

</script>

<template>
    <div class="ponto-wrapper" v-for="ponto in data">
        <h1> {{ ponto.PDC_ID }} </h1>
        <p>{{ ponto.PDC_STATUS }}</p>
        <p>{{ ponto.PDC_CEP }}</p>
    </div>

</template>

<style scoped>
    div.ponto-wrapper{
        display: flex;
        justify-content: center;
        width: 100%;
        height: 50vh;
        background-color: var(--white);
        border-bottom: solid #ccc 10px;
        box-shadow: #ccc 5px 5px 10px;
        transition: ease-in-out 400ms;
    }

    div.ponto-wrapper:hover{
        border-bottom: solid var(--green) 10px;
        
    }

</style>