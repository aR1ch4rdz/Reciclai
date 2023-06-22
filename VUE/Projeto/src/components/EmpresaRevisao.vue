<script setup>

const empresas = await fetch("http://localhost:8005/getEmpUnderReview.php");
const data = await empresas.json();

async function approveCompany(companyID, userID) {
  let formData = new FormData()
  formData.append('companyID', companyID)
  formData.append('userID', userID)

  console.log(userID)

  await fetch('http://localhost:8005/approveCompany.php', {
    method: "POST",
    body: formData
  }).then(async res => {
    let response = await res.json()
    if (response.success) {
      alert(response.message)
    }
    else {
      alert("erro:" + response.message)
    }
  })
}

</script>

<template>
  <div v-if="data.length < 0" class="empty">
    <h1>Sem empresas para analisar no momento</h1>
  </div>
  <div v-else v-for="ponto in data" @click="approveCompany(ponto.EMP_ID, ponto.EMP_USR_ID)" class="ponto-wrapper">
    <h1> {{ ponto.EMP_NOME }} </h1>
    <p>{{ ponto.EMP_CNPJ }}</p>
    <p>{{ ponto.EMP_CEP }}</p>
  </div>
</template>

<style scoped>

div.ponto-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  width: 100%;
  height: 50vh;
  background-color: var(--white);
  border-bottom: solid #ccc 10px;
  box-shadow: #ccc 5px 5px 10px;
  transition: ease-in-out 400ms;
}

div.ponto-wrapper:hover {
  border-bottom: solid var(--green) 10px;

}
</style>