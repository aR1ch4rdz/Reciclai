import { ref } from 'vue';
import showPoints from '../components/showPoints.vue';
import { getReverseGeolocation } from './functions';

let points = ref({});
export let distance;


export const proxPoints = ref([]);

let outro = [];

  export async function positionDistance(dis){
    proxPoints.value = [];
     
        await fetch("http://localhost:8005/depuracao.php")
        .then((res) => res.json())
        .then((data) => points.value = data);
      // console.log(points)
    if(navigator.geolocation){

     navigator.geolocation.getCurrentPosition((e)=>{
      points.value.forEach((el) => {
        distance = getDistanceBetweenPointsNew(e.coords.latitude, e.coords.longitude, parseFloat(el.EMP_LATITUDE), parseFloat(el.EMP_LONGITUDE), "kilometers");
        if(distance <= parseInt(dis)){
          proxPoints.value.push(el);//vai para a lista de pontos prox
          outro.push(el);// para os marcadores
        }
      });
      // showPoints.methods.initMap(outro);
      // CreateCollectPoint.methods.teste(outro);
      
      });

    }else{
      console.log("não veio sua location");
    }
    }

    function deg2rad(graus){
        return (graus * Math.PI) / 180;;
    }

    function rad2deg(radianos) {
        return radianos * (180 / Math.PI); 
    }

function getDistanceBetweenPointsNew(latitude1, longitude1, latitude2, longitude2, unit) {
    
    let theta = longitude1 - longitude2; 
    let distance = (Math.sin(deg2rad(latitude1)) * Math.sin(deg2rad(latitude2))) + 
    (Math.cos(deg2rad(latitude1)) * Math.cos(deg2rad(latitude2)) * Math.cos(deg2rad(theta)));

    distance = Math.acos(distance); 
    distance = rad2deg(distance); 
    distance = distance * 60 * 1.1515; 

    switch(unit) { 
      case 'miles': 
        break; 
      case 'kilometers' : 
        distance = distance * 1.609344; 
    } 
    
    return distance; 
  }