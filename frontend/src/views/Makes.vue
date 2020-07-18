<template>
	<div class="makes">
		<v-container class="d-flex justify-center flex-column" style="height: 100%;">
			<v-card>
				<v-card-title class="info white--text">
					<v-row pa-0>
						<v-col lg=8>
							<h3>Vehicle Make</h3>
						</v-col>
						<v-col lg=4 class="d-flex justify-end">
							<v-btn color="success" to="/">back</v-btn>
						</v-col>
					</v-row>
				</v-card-title>
				<div class="pa-5">
					<v-autocomplete
						:loading="loading"
						:disabled="loading"
						:items="getTypeMakes()"
						item-text="description"
						item-value="id"
						placeholder="Make"
						v-model="selectedMakeId"
						@change="loadModels"
					/>

					<section v-if="!loading && selectedMake">
						<v-alert v-if="getModels().length == 0" type="error">
							No Car Models Found for {{selectedMake.description}}!
						</v-alert>
						<v-list v-else>
							<v-list-item v-for="(model, index) in getModels()" :key="index">
								<v-list-item-icon>
									<v-avatar color="success">
										<div class="white--text">{{model.description[0]}}</div>
									</v-avatar>
								</v-list-item-icon>
								<v-list-item-content>
									<v-list-item-title>{{model.description}}</v-list-item-title>
								</v-list-item-content>
							</v-list-item>
						</v-list>
					</section>

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
			loadingMakes: false,
			loadingModels: false,
			selectedMakeId: null
		}
	},
	computed: {
		...mapGetters([
			"makes",
			"models"
		]),
		vehicleTypeId() {
			return this.$route.params.type
		},
		loading() {
			return this.loadingMakes || this.loadingModels
		},
		selectedMake() {
			if (!this.selectedMakeId) return null

			return this.getTypeMakes().find(m => m.id == this.selectedMakeId)
		},
		modelPayload() {
			if (!this.selectedMake) return null

			return {
				vehicleTypeId: this.vehicleTypeId,
				makeCode: this.selectedMake.code
			}
		}
	},
	methods: {
		getTypeMakes() {
			return this.makes[this.vehicleTypeId]
		},
		getModels() {
			return this.models[this.selectedMake.code] || [];
		},
		async loadMakes() {
			this.loadingMakes = true
			await this.$store.dispatch("loadMakes", this.vehicleTypeId)
			this.loadingMakes = false
		},
		async loadModels() {
			this.loadingModels = true
			await this.$store.dispatch("loadModels", this.modelPayload)
			this.loadingModels = false
		}
	},
}
</script>

<style lang="scss" scoped>
	.makes {
		background-image: url("https://i.imgur.com/Cmnrjfz.jpg");
		background-position: center center;
		background-size: cover;
		width: 100%;
		height: 100%;
	}
</style>