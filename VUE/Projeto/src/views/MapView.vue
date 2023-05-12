<script setup>

</script>

<template>
  <div class="content">
    <div class="map-wrapper">
      <h1 style="padding: 1em;
      font-size: 2em;">Localização do ponto</h1>

      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63239.30764452833!2d-34.9338095553085!3d-7.847173346501153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7ab6ace8ae386b3%3A0xe4bf3f7928d2800b!2sIgarassu%2C%20PE!5e0!3m2!1spt-BR!2sbr!4v1683892172308!5m2!1spt-BR!2sbr"
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    
    <div class="location-wrapper">
      <div class="empresa">
        <h1><a href="https://goo.gl/maps/TrJstgLUFJnNtSq18" target="_blank">Empresa 1</a></h1>
        <p>Email - Empresa 1 </p>
        <p>Telefone - Empresa 1 </p>
        <p>Cnpj - Empresa 1 </p>
      </div>
      <div class="empresa">
        <h1><a href="https://goo.gl/maps/72UZFj2cMix4ReiQ9" target="_blank">Empresa 2</a></h1>
        <p>Email - Empresa 2 </p>
        <p>Telefone - Empresa 2 </p>
        <p>Cnpj - Empresa 2 </p>
      </div>
      <div class="empresa">
        <h1><a href="https://goo.gl/maps/vsmoXCjRMKp1THX86" target="_blank">Empresa 3</a></h1>
        <p>Email - Empresa 3 </p>
        <p>Telefone - Empresa 3 </p>
        <p>Cnpj - Empresa 3 </p>
      </div>
    </div>
  </div>
</template>

<style scoped>
a{
  color: var(--green);
}
div.content {
  width: 100%;
  height: 100%;
  display: flex;
}

iframe {
  border-radius: 1em;
  box-shadow: hsla(0, 0%, 0%, 0.384) 2px 3px 7px;

}

div.location-wrapper,
div.map-wrapper {
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}


div.empresa {
  cursor: default;
  padding: 1em;
  border-radius: 1em;
  width: 50%;
  height: max-content;
  margin-top: 1em;
  box-shadow: hsla(0, 0%, 0%, 0.384) 0px 0px 3px;
}

h1 {
  font-weight: bold;
  font-size: 1.3em;
  color: var(--green);
}

p {
  color: black;
}
</style>