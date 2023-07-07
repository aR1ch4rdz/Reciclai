import { reactive,ref } from 'vue';
import router from "../router/index";

const localUserRaw = sessionStorage.getItem('user');

export const showHeader = ref(true);
export const myCompany = ref(false);
export const haveCompany = ref(false);
export const userPoint = ref([])

export const logedUser = reactive({
  isLoged: false,
  ID: null,
  name: "",
  type: "",
  email: "",
  phone: "",
  empresaID: ""
});


export function userLogout(){
  sessionStorage.removeItem("user");
  setIsLoged(false,"","","","","","");
  myCompany.value = false
  userPoint.value = [];
  router.push('/');
}


export function setIsLoged(userStatus, userID , userName, userType, userEmail, userPhone,userEmpresaID){
  logedUser.isLoged = userStatus
  logedUser.ID = userID
  logedUser.name = userName;
  logedUser.email = userEmail;
  logedUser.phone = userPhone;
  logedUser.type = userType;
  logedUser.empresaID = userEmpresaID

  if(logedUser.isLoged){
    sessionStorage.setItem('user', JSON.stringify(logedUser));
    router.push('/dashboard');
  }
}


if (localUserRaw) {
  const { isLoged, ID, name, type, email, phone, empresaID} = JSON.parse(localUserRaw);
  setIsLoged(isLoged, ID, name, type, email, phone, empresaID);
}



export const userLocation = ref(router.currentRoute.value.path);