import Vue from 'vue'
import VueRouter from 'vue-router'
import VehicleTypes from '../views/VehicleTypes.vue'
import Makes from '../views/Makes.vue'

Vue.use(VueRouter)

  const routes = [
  {
    path: '/',
    name: 'VehicleTypes',
    component: VehicleTypes
  },
  {
    path: '/makes/:type',
    name: 'Makes',
    component: Makes
  },
]

const router = new VueRouter({
  routes
})

export default router
