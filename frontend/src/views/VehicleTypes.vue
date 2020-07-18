<template>
	<div class="vehicle-types">
		<v-container class="d-flex justify-center flex-column" style="height: 100%;">
			<v-card>
				<v-card-title class="success white--text">
					Select a Vehicle Type
				</v-card-title>
				<div class="py-5">
					<v-list v-if="loading">
						<v-skeleton-loader v-for="i in 10" :key="i" type="list-item-avatar" class="mx-auto"/>
					</v-list>
					<v-list v-else>
						<v-list-item v-for="(vehiclesType, index) in vehicleTypes" :key="index" :to="`/makes/${vehiclesType.id}`">
							<v-list-item-icon>
								<v-avatar color="success">
									<div class="white--text">{{vehiclesType.code}}</div>
								</v-avatar>
							</v-list-item-icon>
							<v-list-item-content>
								<v-list-item-title>{{vehiclesType.description}}</v-list-item-title>
							</v-list-item-content>
						</v-list-item>
					</v-list>
				</div>
			</v-card>
		</v-container>
	</div>
</template>

<script>
import {mapGetters} from 'vuex'

export default {
	created() {
		this.loadVehicleTypes()
	},
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
		async loadVehicleTypes() {
			this.loading = true
			await this.$store.dispatch("loadVehicleTypes")
			this.loading = false
		}
	},
}
</script>

<style lang="scss" scoped>
	.vehicle-types {
		background-image: url("https://i.imgur.com/3qKdYt4.jpg");
		background-position: left center;
		background-size: cover;
		width: 100%;
		height: 100%;
	}
</style>