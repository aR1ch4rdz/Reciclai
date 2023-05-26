<script setup>
const totalEmpresa = await fetch("http://localhost:8005/getEmpTotal.php")
const total = await totalEmpresa.json()
</script>

<template>
    <div class="card">
        <h1>Empresas Pendentes</h1>
        <p>{{ total[0].QTDE_EMPRESA }}</p>
    </div>
</template>

<style scoped>

div.card {
	background-color: white;
	height: fit-content;
	padding: 1em;
	border-bottom: 5px #cccccc solid;
	transition: all ease-in-out 200ms;
	box-shadow: hsla(0, 0%, 0%, 0.184) 0px 0px 8px;
	cursor: pointer;
}

div.card:hover {
	transform: scale(1.02);
	border-bottom: 5px var(--green) solid;
}


</style>