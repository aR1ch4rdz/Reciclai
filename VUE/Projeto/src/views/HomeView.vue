<script setup>
  import { RouterLink } from 'vue-router';
</script>

<template>
  <div class="content-wrapper">
    <div style="flex-direction: column;">
      <h1 style="text-align: center;">ENCHA A BATERIA DA <br> SUSTENTABILIDADE</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia risus eu aliquet auctor. Phasellus ut fringilla elit, ut fermentum ipsum. Aliquam hendrerit placerat libero eget pellentesque. Ut dictum lectus eget sodales hendrerit. Proin semper felis non diam lacinia, at suscipit dui facilisis. Etiam sit amet purus consectetur, convallis quam id, imperdiet turpis.</p>
      <RouterLink to="/map">Descartar</RouterLink>
    </div>
    <div>
      <img src="/src/assets/recicle.png" alt="">
    </div>
  </div>
</template>

<style scoped>
  div.content-wrapper{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
  }
  div.content-wrapper > div{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 50%;
    height: 100%;
    padding: 0.5em;
    gap: 1em;
    cursor: default;
  }
  div.content-wrapper a{
    display: block;
    text-align: center;
    width: 80%;
    background: var(--green);
    padding: 0.7em;
    color: var(--white);
    font-weight: bold;
    border-radius: 0.7em;
  }
  div.content-wrapper p{
    text-align: center;
    font-weight: bold;
    width: 80%;
  }

  img{
    width: 90%;
  }
  
</style>
