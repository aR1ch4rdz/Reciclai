<script>
import { Loader } from '@googlemaps/js-api-loader';
import { ref } from 'vue';
import { createNewCollectPoint } from '../assets/functions.js';

let res = await fetch("http://localhost:8005/depuracao.php");
let latLngPonto = await res.json();

const igarassu = { lat: -7.834, lng: -34.906 };
export const selectedLocation = ref({ lat: null, lng: null });

export default {
  name: 'APImaps',
  data() {
    return {
      map: null,
      takePlace: { lat: null, lng: null },
      place: [],
    }
  },

  mounted() {
    const loader = new Loader({
      apiKey: 'AIzaSyAWCp2gRKGL0CEhESSy1KBLkbmjSOmNl2Q',
      version: 'weekly',
      libraries: ['places'],
    });

    loader.load().then(() => {
      this.initMap();
    })
  },

  methods: {
    initMap() {
      this.map = new google.maps.Map(this.$refs.map, {
        center: igarassu,
        zoom: 10,
        streetViewControl: false,
        mapTypeControlOptions: {
          mapTypeIds: ['roadmap'] // Mostrar apenas o tipo de mapa "roadmap" (ruas)
        }
      });
      this.map.controls[google.maps.ControlPosition.TOP_CENTER].push(this.$refs.searchInput);
      this.map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(this.$refs.send);
      const autocomplete = new google.maps.places.Autocomplete(this.$refs.searchInput);

      const markers = new google.maps.Marker({
        map: this.map
      });

      autocomplete.addListener("place_changed", () => {
        const places = autocomplete.getPlace();
        this.takePlace.lat = String(places.geometry.location.lat());
        this.takePlace.lng = String(places.geometry.location.lng());
        selectedLocation.value = this.takePlace
        markers.setPosition(places.geometry.location);

      });

      this.map.addListener("click", (e) => {
        this.takePlace.lat = String(e.latLng.lat());
        this.takePlace.lng = String(e.latLng.lng());
        selectedLocation.value = this.takePlace;
        markers.setPosition(e.latLng);
      })

    },
  }
}

</script>

<template>
    <div ref="map" class="mapa" >
      <input id="input" ref="searchInput" style="width: 30%; position: absolute;" type="text">
    </div>
</template>


<style>

#input {
  background-color: #f2f2f2;
  border: none;
  margin-top: 2%;
  border-radius: 20px;
  padding: 10px 20px;
  width: 300px;
  font-size: 16px;
  color: #333;
  border: #ccc solid 1px;
}

.mapa{
  position: relative;
  width: 100%;
  height: 100%;
}

</style>