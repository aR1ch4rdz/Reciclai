<script setup>
import { onMounted, ref } from 'vue';

defineProps({
  modelValue: String,
  label: String,
  type: String,
  iWidth: String
});
defineEmits(['update:modelValue']);

const input = ref(null)

</script>

<template>
  <div :style="{width: iWidth}" class="input-wrapper">
    <input required :type="type" placeholder="" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input">
    <label>{{ label }}</label>
  </div>
</template>
<style scoped>
div.input-wrapper {
  display: flex;
  justify-content: center;
  position: relative;
  width: 100%;
  margin: 0.5em 0;
}

input {
  width: 100%;
  border: solid 1.5px #ccc;
  border-radius: 0.7rem;
  background: none;
  padding: 1rem;
  font-size: 1rem;
  color: black;
  transition: 150ms cubic-bezier(0.4, 0, 0.2, 1);
}

label {
  position: absolute;
  left: 16px;
  color: black;
  background-color: var(--white);
  pointer-events: none;
  transform: translateY(1rem);
  transition: 150ms cubic-bezier(0.4, 0, 0.2, 1);
}

input:focus {
  outline: none;
  border: 1.5px solid var(--green);
}

input:not(:placeholder-shown)~label {
  transform: translateY(-50%) scale(0.9);
  background-color: var(-white);
  padding: 0 0.2em;
}

input:focus~label {
  transform: translateY(-50%) scale(0.9);
  background-color: var(-white);
  padding: 0 0.2em;
}
</style>