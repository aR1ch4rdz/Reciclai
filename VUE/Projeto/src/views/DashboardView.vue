<script setup>
import { Suspense } from "vue";
import router from "../router/index"
import DashMenu from "../components/DashMenu.vue"
import TotalCard from "../components/TotalCard.vue"
function moveUser() {
	router.push('/dashboard/pontos')
}


</script>

<template>
	<div class="content-wrapper">
		<DashMenu></DashMenu>
		<Suspense>
			<div class="dashinfo-wrapper">
				<div class="dash-row">
					<TotalCard />
					<div @click="moveUser" class="card">
						<h1>Pontos Pendentes</h1>
						<p>20</p>
					</div>
					<div class="card">
						<h1>Total De Empresas</h1>
						<p>100</p>
					</div>
				</div>
			</div>
		</Suspense>
		</div>
</template>


<style scoped>
.content-wrapper {
	display: flex;
	width: 100%;
	height: 90%;
}

p {
	padding: 1em;
	font-weight: bold;
}

.dashinfo-wrapper {
	width: 100%;
	height: 100%;
	background-color: #ededed;
	display: grid;
	padding: 3em;
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