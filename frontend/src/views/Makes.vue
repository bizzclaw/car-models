<template>
	<div class="vehicle-types">
		<v-container class="d-flex justify-center flex-column" style="height: 100%;">
			<v-card>
				<v-card-title class="success white--text">
					Find Your Vehicle
				</v-card-title>
				<div class="pa-5">
					<v-select
						:loading="loading"
						:disabled="loading"
						:items="vehicleTypes"
						item-text="description"
						item-value="id"
						placeholder="What type of Vehicle?"
					/>
				</div>
			</v-card>
		</v-container>
	</div>
</template>

<script>
import {mapGetters} from 'vuex'

export default {
	created() {
		this.loadMakes()
	},
	data() {
		return {
			loading: false
		}
	},
	computed: {
		...mapGetters([
			"makes"
		])
	},
	methods: {
		async loadMakes() {
			this.loading = true
			await this.$store.dispatch("loadMakes")
			this.loading = false
		}
	},
}
</script>

<style lang="scss" scoped>
	.vehicle-types {
		background-image: url("https://i.imgur.com/3qKdYt4.jpg");
		background-position: center center;
		background-size: cover;
		width: 100%;
		height: 100%;
	}
</style>