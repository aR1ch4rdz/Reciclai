<script>
import { Loader } from '@googlemaps/js-api-loader';
import { ref } from 'vue';
import { getReverseGeolocation } from '../assets/functions';

let igarassu = { lat: -7.834, lng: -34.906 };
const all = ref([]);

async function teste() {
  await fetch('http://localhost:8005/depuracao.php')
    .then(res => res.json())
    .then(data => all.value = data);
}

export default {
  name: 'APImaps',
  data() {
    return {
      map: null,
      takePlace: { lat: null, lng: null },
      showCard: false,
      selectedMarker: false,
      imageUrl: ""
    }
  },

  mounted() {
    teste();
    const loader = new Loader({
      apiKey: 'AIzaSyAWCp2gRKGL0CEhESSy1KBLkbmjSOmNl2Q',
      version: 'weekly',
      libraries: ['places']
    });

    loader.load().then(() => {
      this.map = new google.maps.Map(this.$refs.map, {
        center: igarassu,
        zoom: 10,
        streetViewControl: false,
        mapTypeControlOptions: {
          mapTypeIds: ['roadmap'] // Mostrar apenas o tipo de mapa "roadmap" (ruas)
        }
      });
      this.initMap();
    })
  },

  methods: {
    initMap() {
      all.value.forEach( async (point) =>{
        const address = await getReverseGeolocation(point.EMP_LATITUDE,point.EMP_LONGITUDE);
        point.street = address.street;
        point.country = address.country;
        point.city = address.city;
        console.log(address)
      })

      all.value.forEach(el => {
        const marker = new google.maps.Marker({
          position: { lat: parseFloat(el.EMP_LATITUDE), lng: parseFloat(el.EMP_LONGITUDE) },
          map: this.map,
          icon: "../public/pin.png"
        });
        marker.addListener('click', () => {
          // Exibir o card personalizado
          console.log(marker)
          this.showMarkerCard(el)
        });
      })
    },
    showMarkerCard(markerData) {
      console.log(markerData);
      // Exibir o card personalizado ou executar ações desejadas com as informações do marcador
      this.selectedMarker = markerData;
      this.showCard = true;
    }
  }
}

</script>

<template>
  <div id="container">
    <div ref="map" style="width:100%; height: 100%; position: relative; ">
      <input id="input" ref="searchInput" style="width: 30%; position: absolute;" type="text">
      <button style="position: absolute;">oi</button>
    </div>
    <div class="marker-card" v-if="this.showCard" @click="this.showCard = !showCard">
      <h3>{{ this.selectedMarker.PDC_ID }}</h3>
      <p>{{ this.selectedMarker.country }}</p>
      <p>{{ this.selectedMarker.street }}</p>
      <p>{{ this.selectedMarker.city }}</p>
      <a target="_blank"
        v-bind:href="'https://www.google.com.br/maps/place/' + this.selectedMarker.EMP_LATITUDE + ',' + this.selectedMarker.EMP_LONGITUDE">Visualize no Google Maps</a>
    </div>
  </div>
</template>

<style>

#container {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
}

#listPoint {
  position: relative;
  text-align: center;
  width: 60%;
  height: 100%;
}

.marker-card {
  display: flex;
  flex-direction: column;
  color: black;
  position: absolute;
  width: 25%;
  height: 50%;
  background-color: white;
  padding: 10px;
  border: 1px solid #ccc;
}

</style>