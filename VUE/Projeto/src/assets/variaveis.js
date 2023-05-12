import { reactive } from 'vue'

const localUserRaw = sessionStorage.getItem('user');

export const logedUser = reactive({
  isLoged: false,
  name: "",
  email: "",
  telefone: "",
  cnpj: ""
})

export function userLogout(){
  sessionStorage.removeItem("user")
  setIsLoged(false,"","","","")
}

export function setIsLoged(userStatus,userName,userEmail,userPhone,userCNPJ){
  logedUser.isLoged = userStatus
  logedUser.name = userName;
  logedUser.email = userEmail;
  logedUser.telefone = userPhone;
  logedUser.cnpj = userCNPJ;

  if(logedUser.isLoged){
    sessionStorage.setItem('user', JSON.stringify(logedUser))
    console.log(sessionStorage.getItem('user'))
    console.log(logedUser) 
  }
}

if (localUserRaw) {
  const { isLoged, name, email, telefone, cnpj } = JSON.parse(localUserRaw)
  setIsLoged(isLoged, name, email, telefone, cnpj)
}