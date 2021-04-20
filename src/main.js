import Vue from 'vue'
import App from './App.vue'
import vuetify from './plugins/vuetify';
import VueSweetAlert from 'vue-sweetalert2';

Vue.config.productionTip = false
Vue.use(VueSweetAlert);
new Vue({
  vuetify,
  render: h => h(App)
}).$mount('#app')
