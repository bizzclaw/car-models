<template>
	<div class="vehicle-types">
		<v-container class="d-flex justify-center flex-column" style="height: 100%;">
			<v-card>
				<v-card-title class="success white--text">
					Find Your Vehicle
				</v-card-title>
				<div class="pa-5">
					<v-select :loading="loading" :disabled="loading" placeholder="What type of Vehicle?">
						
					</v-select>
				</div>
			</v-card>
		</v-container>
	</div>
</template>

<script>
import {mapGetters} from 'vuex'

export default {
	data() {
		return {
			loading: false
		}
	},
	computed: {
		...mapGetters([
			"vehicleTypes"
		])
	},
	methods: {
		async getVehicleTypes() {
			this.loading = true
			await this.$store.dispatch("getVehicleTypes")
			this.loading = false
		}
	},
}
</script>

<style lang="scss" scoped>
	.vehicle-types {
		background-image: url("https://i.imgur.com/Cmnrjfz.jpg");
		background-position: left center;
		background-size: cover;
		width: 100%;
		height: 100%;
	}
</style>