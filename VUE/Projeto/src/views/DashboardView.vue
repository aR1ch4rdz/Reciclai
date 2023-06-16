<script setup>
import { Suspense } from "vue";
import { showHeader } from "../assets/variaveis";
import router from "../router/index"
import DashMenu from "../components/DashMenu.vue"
import TotalCard from "../components/TotalCard.vue"
import Graph from "../components/Graph.vue";
function moveUser() {
	router.push('/dashboard/pontos')
}
</script>

<template>
	<div class="content-wrapper">
		<DashMenu />
		<div class="content">
			<Suspense>
				<div class="dashinfo-wrapper">
					<div class="dash-row">
						<TotalCard icon="build" path="getEmpTotal.php" card="Total de empresa" />
						<TotalCard @click="moveUser()" icon="map" path="getPDCTotal.php" card="Total de Pontos" />
						<TotalCard icon="map" path="getEmpTotal.php" card="Pontos pendentes" />
					</div>
					<div class="graph-wrapper">
						<Graph />
					</div>
				</div>
			</Suspense>
		</div>
	</div>
</template>

<style scoped>
.content{
	margin-left: 15%;
	display: flex;
	width: 100%;
	height: 100%;
	overflow-y: scroll;
}
.content-wrapper {
	display: flex;
	width: 100%;
	height: 100%;
}
div.graph-wrapper{
	text-align: center;
	box-shadow: hsla(0, 0%, 0%, 0.184) 0px 0px 8px;
	width: 100%;
	height: 80%;
	margin-top: 2%;
}

p {
	padding: 1em;
	font-weight: bold;
}

.dashinfo-wrapper {
	width: 100%;
	height: 100%;
	background-color: #ededed;
	display: flex;
	flex-direction: column;
	padding: 2em;
}

.dash-row {
	width: 100%;
	display: flex;
	justify-content: center;
	align-items: center;
	gap: 1em;
	height: 20%;
}

.card {
	background-color: white;
	height: fit-content;
	padding: 0.5em;
	border-bottom: 5px #cccccc solid;
	transition: all ease-in-out 200ms;
	box-shadow: hsla(0, 0%, 0%, 0.184) 0px 0px 8px;
	cursor: pointer;
}

.card:hover {
	transform: scale(1.02);
	border-bottom: 5px var(--green) solid;
}
</style>