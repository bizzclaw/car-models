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
						:items="typeMakes()"
						item-text="description"
						item-value="id"
						placeholder="Make"
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
			loadingMakes: false,
			loadingModels: false
		}
	},
	computed: {
		...mapGetters([
			"makes",
			"models"
		]),
		typeId () {
			return this.$route.params.type
		},
		loading () {
			return this.loadingMakes || this.loadingModels
		}
	},
	methods: {
		async loadMakes() {
			this.loadingMakes = true
			await this.$store.dispatch("loadMakes", this.typeId)
			this.loadingMakes = false
		},
		typeMakes () {
			return this.makes[this.typeId]
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