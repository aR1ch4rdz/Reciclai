import { reactive,ref } from 'vue';
import router from "../router/index";

const localUserRaw = sessionStorage.getItem('user');
export const showHeader = ref(true);

export const logedUser = reactive({
  isLoged: false,
  ID: null,
  name: "",
  type: "",
  email: "",
  phone: ""
});

export function userLogout(){
  sessionStorage.removeItem("user");
  setIsLoged(false,"","","","");
  router.push('/');
} 

export function setIsLoged(userStatus, userID , userName, userType, userEmail, userPhone){
  logedUser.isLoged = userStatus
  logedUser.ID = userID
  logedUser.name = userName;
  logedUser.email = userEmail;
  logedUser.phone = userPhone;
  logedUser.type = userType;

  if(logedUser.isLoged){
    sessionStorage.setItem('user', JSON.stringify(logedUser));
    router.push('/dashboard');
  }
}

if (localUserRaw) {
  const { isLoged, ID, name, type, email, phone} = JSON.parse(localUserRaw);
  setIsLoged(isLoged, ID, name, type, email, phone);
}

export const userLocation = ref(router.currentRoute.value.path);