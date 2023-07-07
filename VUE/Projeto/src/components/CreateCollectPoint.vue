<script>
 import { Loader } from '@googlemaps/js-api-loader';
 import { ref } from 'vue';
 
 let igarassu = { lat: -7.834, lng: -34.906 };

 export const latLngTeste = ref({lat:null, lng:null});

 export default {
    name: 'APImaps',

    data(){
        return{
          map:null,
          takePlace:{lat:null, lng:null},
        }
    },

    mounted(){
      const loader = new Loader({
          apiKey: 'AIzaSyBzrFQCiYK1UTkLVY#IaW76YVZXmF1S1Ai0',
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
      initMap() {

     this.map.controls[google.maps.ControlPosition.TOP_CENTER].push(this.$refs.searchInput);
     this.map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(this.$refs.send);

     const autocomplete = new google.maps.places.Autocomplete(this.$refs.searchInput);
  
      autocomplete.addListener("place_changed", () => {
        const places = autocomplete.getPlace();
        this.takePlace.lat = String(places.geometry.location.lat());
        this.takePlace.lng = String(places.geometry.location.lng());
        latLngTeste.value = this.takePlace;
        markers.setPosition(places.geometry.location);
      });

      const markers = new google.maps.Marker({
        map: this.map
      });
      
    this.map.addListener("click", (e)=>{
        this.takePlace.lat = String(e.latLng.lat());
        this.takePlace.lng = String(e.latLng.lng());
        latLngTeste.value = this.takePlace;
        markers.setPosition(e.latLng);
    });
    

    },


    },  

      
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
#listPoint>ul{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  list-style: none;
  margin-top: 4%;
}
#listPoint>ul>li{
  display: flex;
  width: 50%;
  height: 12vh;
  margin-top: 10px;
  border-radius: 0.5em;
  font-size: 1.3em;
  box-shadow: hsla(0, 0%, 0%, 0.384) 0px 0px 5px;
  background-color: #ededed;
}
#input{
  background-color: #f2f2f2;
  border: none;
  margin-top: 2%;
  border-radius: 20px;
  padding: 10px 20px;
  width: 300px;
  font-size: 16px;
  color: #333;
}

</style>