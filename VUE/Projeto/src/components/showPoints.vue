<script>
import { Loader } from '@googlemaps/js-api-loader';

let igarassu = { lat: -7.834, lng: -34.906 };
let all = []

async function teste(){
    await fetch('http://localhost:8005/depuracao.php')
    .then(res=> res.json())
    .then(data => all = data);
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
          apiKey: 'API-KEY',
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
        all.forEach(el=>{
            new google.maps.Marker({
        position:{lat:parseFloat(el.EMP_LATITUDE), lng:parseFloat(el.EMP_LONGITUDE)},
        map: this.map
            });
        })
        
        
        }
    }
}

</script>

<template>
  <div id="container"> 
    <div ref="map" style="width:100%; height: 80vh; ">
      <input id="input" ref="searchInput" style="width: 30%; position: absolute;" type="text" >
      <button style="position: absolute;">oi</button>
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