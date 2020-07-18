import Vue from 'vue'
import VueRouter from 'vue-router'
import VehicleTypes from '../views/VehicleTypes.vue'

Vue.use(VueRouter)

  const routes = [
  {
    path: '/',
    name: 'VehicleTypes',
    component: VehicleTypes
  }
]

const router = new VueRouter({
  routes
})

export default router
