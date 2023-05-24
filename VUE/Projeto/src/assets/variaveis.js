import { reactive } from 'vue'
import router from "../router/index"

const localUserRaw = sessionStorage.getItem('user');

export const logedUser = reactive({
  isLoged: false,
  ID: null,
  name: "",
  type: "",
  email: "",
  phone: ""
})

export function userLogout(){
  sessionStorage.removeItem("user")
  setIsLoged(false,"","","","")
} 

export function setIsLoged(userStatus, userID , userName, userType, userEmail, userPhone){
  logedUser.isLoged = userStatus
  logedUser.ID = userID
  logedUser.name = userName;
  logedUser.email = userEmail;
  logedUser.phone = userPhone;
  logedUser.type = userType;

  if(logedUser.isLoged){
    sessionStorage.setItem('user', JSON.stringify(logedUser))
    router.push('/userPage')
  }
}

if (localUserRaw) {
  const { isLoged, ID, name, type, email, phone} = JSON.parse(localUserRaw)
  setIsLoged(isLoged, ID, name, type, email, phone)
}