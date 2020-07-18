import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

const api = process.env.VUE_APP_API_URL || ''

export default new Vuex.Store({
  state: {
    vehicleTypes: [],
    makes: {},
    models: {}
  },
  getters: {
    vehicleTypes: state => state.vehicleTypes,
    makes: state => state.makes,
    models: state => state.models,
  },
  mutations: {
    setVehicleTypes(state, vehicleTypes) {
      state.vehicleTypes = vehicleTypes
      state.vehicleTypes.sort((a, b) => a.description < b.description ? -1 : 1)
    },
    syncMakes(state, payload) {
      state.makes[payload.vehicleTypeId] = payload.makes
    },
    syncModels(state, data) {

      state.models[data.vehicleTypeId] = state.models[data.vehicleTypeId] || {}

      state.models[data.vehicleTypeId][data.makeCode] = data.models
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
        vehicleTypeId: parseInt(type),
        makes: response.data.makes
      }

      context.commit("syncMakes", data, type)
    },
    async loadModels(context, payload) {

      const response = await axios.get(`${api}/models/${payload.vehicleTypeId}/${payload.makeCode}`)

      const data = {
        vehicleTypeId: parseInt(payload.vehicleTypeId),
        makeCode: payload.makeCode,
        models: response.data.models
      }

      context.commit("syncModels", data)
    }
  },
  modules: {}
})