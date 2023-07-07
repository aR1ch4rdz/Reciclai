<script>
import { Loader } from '@googlemaps/js-api-loader';
import { ref } from 'vue';

let igarassu = { lat: -7.834, lng: -34.906 };
const all = ref([]);

async function teste(){
    await fetch('http://localhost:8005/depuracao.php')
    .then(res=> res.json())
    .then(data => all.value = data);
 }

export default {
    name: 'APImaps',

    data(){
        return{
          map:null,
          takePlace:{lat:null, lng:null},
        }
    },

    mounted(){
        teste();
      const loader = new Loader({
          apiKey: 'AIzaSyBzrFQCiYK1UTkLVYIaW76YVZXmF1S1Ai0',
          version: 'weekly',
          libraries: ['places'],
      });

      loader.load().then(()=> {
        this.map = new google.maps.Map(this.$refs.map, {
        center: igarassu ,
        zoom: 10,
      });
        this.initMap();
      })
  },

    methods: {
        
        initMap(){
   
            all.value.forEach(el => { 
              const marker = new google.maps.Marker({
              position: {lat:parseFloat(el.EMP_LATITUDE),lng:parseFloat(el.EMP_LONGITUDE)},
              map: this.map, // map é a instância do mapa onde o marcador será exibido,
              icon: '../public/favicon.ico',
              title: 'Título do marcador'
            });
         //   console.log("foi", el)
          
        });

        
        
        }
    }
}

</script>

<template>
  <div id="container"> 
    <div ref="map" style="width:100%; height: 80vh; ">
      <input id="input" ref="searchInput" style="width: 30%; position: absolute;" type="text" >
    </div>
  </div>
</template>

<style>
    #container{
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 30%;
  height: 100%;
}
#listPoint{
  position: relative;
  text-align: center;
  width: 60%;
  height: 100%;
}
</style>