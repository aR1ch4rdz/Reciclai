<script setup>
import { ref } from 'vue';
import router from '../router/index';
let option = ref(router.currentRoute.value.path)

function newPath(path) {
    option = path
    router.push(path)
}
</script>

<template>
    <div class="side-bar-wrapper">
        <p @click="newPath('/dashboard')" :class="[option == '/dashboard' ? 'selected' : '']">Dashboard</p>
        <p @click="newPath('/dashboard/pontos')" :class="[option == '/dashboard/pontos' ? 'selected' : '']">Pendencias</p>
        <p>Dashboard</p>
        <p>Dashboard</p>
    </div>
</template>

<style scoped>
.side-bar-wrapper {
    width: 15%;
    height: 100%;
    position: fixed;
    top: 10%;
    bottom: 0;
    left: 0;
    border-right: solid #ccc 1px;
    background-color: var(--white);
}

p {
    margin-bottom: 5px;
    cursor: pointer;
    padding: 0.5em;
}

.selected {
    border-left: var(--green) 3px solid;
    background-color: #f7f7f7;

}
</style>