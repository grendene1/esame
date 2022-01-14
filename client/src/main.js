import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'

import ListFarmlands from './components/ListFarmlands.vue'
import CreateFarmland from './components/CreateFarmland.vue'
import ViewFarmland from './components/ViewFarmland.vue'

Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    name: 'list_farmlands',
    component: ListFarmlands
  },
  {
    path: '/create',
    name: 'create_farmland',
    component: CreateFarmland
  },
  {
    path: '/edit/:id',
    name: 'edit_farmland',
    component: CreateFarmland
  },
  {
    path: '/view/:id',
    name: 'view_pizza',
    component: ViewFarmland
  },
  {
    path: '',
    redirect: '/',
  }
];

const router = new VueRouter({
  mode: "history",
  routes,
});

Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App),
}).$mount('#app')
