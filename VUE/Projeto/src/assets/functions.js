import { logedUser, myCompany, userPoint } from "./variaveis"

export async function createNewCollectPoint(lat, lon) {
  let formData = new FormData();

  formData.append('empID', logedUser.empresaID)
  formData.append('status', 'EM ANALISE')
  formData.append('empLat', lat)
  formData.append('empLon', lon)

  await fetch('http://localhost:8005/createPdc.php', {
    method: 'POST',
    body: formData
  })
  .then(async res => {
    let response = await res.json()
    if (response.success) {
      alert("ponto criado")
    }
    else {
      alert("erro:" + response.message)
    }
  })
}

export async function getCompany(empID) {
  fetch(`http://localhost:8005/getCompany.php?user=${empID}`, {
    method: "GET",
  }).then(async (res) => {
    let empresa = await res.json();
    if (empresa.length > 0) {
      myCompany.value = empresa[0];
      // console.log(myCompany.value);

    }
  })
}

export function getUserPoints(empID){
  fetch(`http://localhost:8005/getUserPdc.php?id=${empID}}`, {
    method: "GET",
  }).then( res=> res.json())
  .then((data)=>{
    if (data.length > 0) {      
      userPoint.value = data;
      console.log(userPoint.value);
    }else{
      console.log("usuário não possui pontos cadastrados")
    }
  })
}
