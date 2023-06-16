<script>
 import { Loader } from '@googlemaps/js-api-loader';
 
 let res = await fetch("http://localhost:8005/depuracao.php");
 let latLngPonto = await res.json();

 const igarassu = { lat: -7.834, lng: -34.906 };
 const latLngTeste = [
  {lat:-7.8275764, lng:-34.9119809},
  {lat:-7.8011092, lng:-34.9307925},    
  {lat:-7.8801107, lng:-34.9042202},
  {lat:-7.836766, lng:-34.9182181}
]
 export default {
    name: 'APImaps',
    data(){
        return{
          map:null,
          takePlace:null,
          place:[],
        }
    },

    mounted(){
      const loader = new Loader({
          apiKey: 'AIzaSyBYcJ_jyD1F1YMEj-T9G68o8a6uwRstu9Q',
          version: 'weekly',
          libraries: ['places'],
      });

      loader.load().then(()=> {
          this.initMap();
      })
  },

    methods: {
      initMap() {
        this.map = new google.maps.Map(this.$refs.map, {
        center: igarassu ,
        zoom: 10,
      });
     this.map.controls[google.maps.ControlPosition.TOP_CENTER].push(this.$refs.searchInput);
     this.map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(this.$refs.send);
     const autocomplete = new google.maps.places.Autocomplete(this.$refs.searchInput);
  
     const markers = new google.maps.Marker({
        map: this.map
      });

      autocomplete.addListener("place_changed", () => {
        const places = autocomplete.getPlace();
        this.takePlace = places.geometry.location;
        console.log(places);
        markers.setPosition(places.geometry.location);

  });

    this.map.addListener("click", (e)=>{
      this.takePlace = e.latLng;
      markers.setPosition(e.latLng);
    })

    latLngTeste.forEach(position => {
      const pin = new google.maps.Marker({
        position: position, //{lat: position.EMP_LATITUDE, lng: position.EMP_LONGITUDE},
        map: this.map
      });

      const geocoding = new google.maps.Geocoder().geocode({
        location: position, //{lat: parseFloat(position[0].EMP_LATITUDE), lng: parseFLoat(position[0].EMP_LONGITUDE)}
      });
      geocoding.then((e)=>{
        this.place.push(e.results[0].formatted_address)
        // console.log(e.results[0].formatted_address);
      })
    });
    }    
  }
}
</script>

<template>
  <div id="container"> 
    <div ref="map" style="width:100%; height: 80vh;">
      <input id="input" ref="searchInput" style="width: 30%; position: absolute;" type="text" >
      <button id="button" ref="send" @click="" style="position: absolute;">
        Criar Novo Ponto
      </button>
    </div>

      <div id="listPoint">
        <h2>Seus Pontos</h2>
        <ul v-for="ponto in place">
          <li>
            {{ponto}} <br>
            STATUS <br> 
            {{}}
          </li>
        </ul>
      </div>

  </div>
</template>


<style>
#container{
  position: relative;
  display: flex;
  flex-direction: row;
  width: 100vw;
  height: 80%;
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
#button{
  background-color:#23DE45;
  color: white;
  margin-bottom: 2%;
  padding: 10px 20px;
  border-radius: 12px;
  border: none;
  cursor: pointer;
}
</style>