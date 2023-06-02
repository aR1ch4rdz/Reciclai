<script setup>
import { MapPinIcon, BuildingOfficeIcon } from '@heroicons/vue/24/outline';
let props = defineProps({
	path: '',
	card:'',
	icon: ''
})
const totalEmpresa = await fetch(`http://localhost:8005/${props.path}`)
const total = await totalEmpresa.json()
</script>

<template>
    <div class="card">
		<div class="card-row">
			<h1>{{ props.card }}</h1>
			<BuildingOfficeIcon class="icon" v-if="props.icon == 'build'"/>
			<MapPinIcon class="icon" v-if="props.icon == 'map'"/>
		</div>
        <div class="card-row">
			<p>{{ total[0].TOTAL }}</p>
		</div>
    </div>
</template>

<style scoped>
.icon{
	width: 36px;
}
div.card {
	box-sizing: border-box;
	background-color: white;
	height: fit-content;
	width: 100%;
	border-radius: 0.2em;
	padding: 1em;
	border-bottom: 5px #cccccc solid;
	transition: all ease-in-out 200ms;
	box-shadow: hsla(0, 0%, 0%, 0.184) 0px 0px 8px;
	cursor: pointer;
}

div.card:hover {
	transform: scale(1.02);
	border-bottom: 5px var(--green) solid;
}
h1{
	font-size: clamp(1em,1.5em,2em);

}
p{
	font-weight: 700;
	font-size: clamp(1em,1.5em,2em);
}
div.card-row{
	display: flex;
	justify-content: space-between;
	align-items: center;
}


</style>