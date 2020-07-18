import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

const api = process.env.VUE_APP_API_URL

console.log()

export default new Vuex.Store({
  state: {
    vehicleTypes: [],
    makes: {}
  },
  getters: {
    vehicleTypes: state => state.vehicleTypes,
    makes: state => state.makes
  },
  mutations: {
    setVehicleTypes(state, vehicleTypes) {
      state.vehicleTypes = vehicleTypes
      state.vehicleTypes.sort((a, b) => a.description < b.description ? -1 : 1)
    },
    syncMakes(state, data) {
      state.makes[data.vehicleTypeId] = data.makes

      console.log(state.makes)
    }
  },
  actions: {
    async loadVehicleTypes(context) {
      const response = await axios.get(`${api}/vehicle-types`)
      context.commit("setVehicleTypes", response.data.vehicle_types)
    },
    async loadMakes(context, type) {
      const response = await axios.get(`${api}/makes/${type}`)

      const data = {
        vehicleTypeId: type,
        makes: response.data.makes
      }

      context.commit("syncMakes", data, type)
    }
  },
  modules: {}
})