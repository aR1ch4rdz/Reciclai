import { reactive } from 'vue'
export const logedUser = reactive({
  isLoged: false,
  name: "",
  email: "",
  telefone: "",
  cnpj: ""
})

export function setIsLoged(userStatus,userName,userEmail,userPhone,userCNPJ){
  logedUser.isLoged = userStatus
  logedUser.name = userName;
  logedUser.email = userEmail;
  logedUser.telefone = userPhone;
  logedUser.cnpj = userCNPJ;
}